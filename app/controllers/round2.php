<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Round2 extends CI_Controller
{
  public function index(){
    if(isLoggedIn()){
      $data['round_done'] =  $this->__round2_done();
      $this->load->view('round2',$data); 
    }
    else {
      redirect('login/go/round2');
    }
  }  

  public function submit()
  {
    $selectData = $_POST;
    $currentUser = getUserName();
    foreach ($selectData as $slot_id => $course_id)
    {
      $data[] = array(
                      'user_id'=> $currentUser,
                      'course_id'=> $course_id
                      );
    }
    $this->db->insert_batch('round2_users', $data);
    redirect('round2');
  }

  private function __round2_done()
  {
    $this->db->where('user_id',getUserName());
    $this->db->from('round2_users');
    return $this->db->count_all_results() != 0;
  }
}
