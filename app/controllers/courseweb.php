<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Courseweb extends CI_Controller {

	public function index()
	{
		$this->load->view('index_page');
	}
}

