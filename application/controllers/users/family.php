<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Family extends CI_Controller 
{
	public function Family() // Constructor
	{
		parent::__construct();
	}

	/**** Start Login ****/

	public function index()
	{
		$this->load->view('welcome_message');
	}
}