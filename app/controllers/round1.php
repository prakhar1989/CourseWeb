<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Round1 extends CI_Controller
{
  public function index(){
    if(isLoggedIn()){
      $data['round_done'] = $this->__round1_done();
      $this->load->view('round1',$data); 
    }
    else {
      redirect('login/go/round1');
    }
  }

  private function __round1_done()
  {
    $this->db->where('user_id',getUserName());
    $this->db->from('round1_users');
    return $this->db->count_all_results() != 0;
  }

  public function submit(){
    $courseData = $_POST;
    foreach ($courseData as $course_id => $selected)
    {
      if($selected)
      {
        $selectedCourses[] = $course_id;
        $whereClauses[] = "`course_id` = '" . $course_id . "'";
      }
    }
    $courseString = join(":",$selectedCourses);
    $whereForEoi = join(" OR ",$whereClauses);

    // update round1_users table
    $this->db->set('user_id',getUserName());
    $this->db->set('courses', $courseString);
    $this->db->insert('round1_users');

    // update courses table and increment EOI count
    $this->db->query('UPDATE `courses` SET `round1` = `round1` + 1 WHERE ' . $whereForEoi);
    redirect('round1');

  }
}
