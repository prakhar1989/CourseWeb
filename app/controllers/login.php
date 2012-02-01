<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{

  public function index($redirectTo="home")
  {
    if(isLoggedIn())
      redirect($redirectTo);
    else
    {
      $data['redirectTo']=$redirectTo;
      $this->load->view('login',$data);
    }
  }

  public function go($redirectTo="home")
  {
    $this->index($redirectTo);
  }
 
  function validate_login($redirectTo="home")
	{		
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $redirectTo = $this->input->post('redirectTo');

    $redirectTo= ($redirectTo=="") ? "home":$redirectTo;

		if(ldap_authenticate($username, $password)) // if the user's credentials validated...
		{
      
			$data = array(
				'username' => $username,
				'logged_in' => true
			);
      
			$this->session->set_userdata($data);
			redirect($redirectTo);
		}
		else // incorrect username or password
    {
      $this->session->set_flashdata(
              array(
                   'error'  => 'Incorrect Credentials!',
                   'prev_uname'     => $username,
               ) );
      redirect("login");
		}
	}
}
