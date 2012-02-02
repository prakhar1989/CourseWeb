<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller
{

  public function index()
  {
    if(isLoggedIn())
    {
      echo "Hello, ". getUserName() . " ! &nbsp;&nbsp;&nbsp; ";
      echo anchor("logout","logout") ;
      print "\n \n";
      echo anchor('round1', "round1");
      echo anchor('round2', "round2");
      echo anchor('round3', "round3");
    }
    else
    {
      redirect("login");
    }
  }
  
  public function login()
  {
    if(isLoggedIn())
      redirect("home");
    else
      $this->load->view('login');
  }
  
  function logout()
	{
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('username');
		$this->index();
	}
  
  function validate_login()
	{		
    $username = $this->input->post('username');
    $password = $this->input->post('password');

		if(ldap_authenticate($username, $password)) // if the user's credentials validated...
		{
      
			$data = array(
				'username' => $username,
				'logged_in' => true
			);
      
			$this->session->set_userdata($data);
			redirect('home');
		}
		else // incorrect username or password
    {
      $this->session->set_flashdata(
              array(
                   'error'  => 'Incorrect Credentials!',
                   'prev_uname'     => $username,
               ) );
      redirect("home/login");
		}
	}
}
