<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Round3 extends CI_Controller
{
  public function index(){
    if(isLoggedIn()){
      $data['round_done'] =  $this->__round3_done();
      $this->load->view('round3',$data); 
    }
    else {
      redirect('login/go/round3');
    }
  }  

  public function submit()
  {
    $courseBid = $_POST;
    $currentUser = getUserName();
    foreach ($courseBid as $course_id => $bid)
    {
      $data[] = array(
                      'user_id'=> $currentUser,
                      'course_id'=> $course_id,
                      'bid'=> $bid
                      );
    }
    $this->db->insert_batch('round3_users', $data);
    redirect('round3');
  }

  private function __round3_done()
  {
    $this->db->where('user_id',getUserName());
    $this->db->from('round3_users');
    return $this->db->count_all_results() != 0;
  }
}
