<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$CI =& get_instance();

if ( ! function_exists('isLoggedIn'))
{
  function isLoggedIn()
  {
    global $CI;
    return $CI->session->userdata('logged_in');
  }
}

if ( ! function_exists('getUserName'))
{
  function getUserName()
  {
    global $CI;
    if(isLoggedIn())
      return $CI->session->userdata('username');
    else
      return NULL;
  }
}

if ( ! function_exists('ldap_authenticate'))
{
  function ldap_authenticate($AUTH_USER, $AUTH_PW)
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


?>