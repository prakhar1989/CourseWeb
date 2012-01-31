<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller
{

  public function index()
  {
    /* $this->login(); */
  }
  
  public function login()
  {
    if($this->__isLoggedIn())
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

		if($this->__ldap_authenticate($username, $password)) // if the user's credentials validated...
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
  
  private function __isLoggedIn()
  {
    return $this->session->userdata('logged_in');
  }
  
  private function __getUserName()
  {
    if($this->__isLoggedIn())
      return $this->session->userdata('username');
    else
      return NULL;
  }
  
  private function __ldap_authenticate($AUTH_USER, $AUTH_PW)
  { 
    
    if($AUTH_USER=="" or $AUTH_PW=="")
    {
      return false;
    }
    
    $ldaphost = "www.iimcal.ac.in";
    $dn = "ou=Person,dc=iimcal,dc=ac,dc=in";
    $justthese = array("dn");
            
    $filter="(&(objectClass=inetOrgPerson)(cn=$AUTH_USER))";
    
    $ds = @ldap_connect($ldaphost) or die("Could not connect to $ldaphost");
    
    if($ds)
    {
      $filter="(&(objectClass=inetOrgPerson)(cn=$AUTH_USER))";
      $sr= ldap_search($ds, $dn, $filter, $justthese);
      $info = ldap_get_entries($ds, $sr); 

      if($info['count']!=1)
        return false;
        
      if (@ldap_bind( $ds, $info[0]['dn'], $AUTH_PW) )
        return true;
      else
        return false;
    } 
    
  }
}
