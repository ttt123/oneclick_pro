<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller 
{
	public function Admin() // Constructor
	{
		parent::__construct(); 
		$this->load->library('session');
		session_start();
		$this->load->model('admin/messages_model');
	}

	/**** Start Login ****/

	public function index()
	{
		if($this->session->userdata('is_logged_in'))
		{
			$email_address = $this->messages_model->get_admin();

			if($this->session->userdata['is_logged_in']['email_address'] == $email_address)
			{
				$messages = $this->messages_model->get_all_entries();
				$data['messages'] = $messages;
				$this->load->view('admin/header', $data);
				$this->load->view('admin/leftbar', $data);
				$this->load->view('admin/welcome_message', $data);
				$this->load->view('admin/footer', $data);
			}
			
		}
		else
		{
			$this->load->view('admin/index_admin');
		}
	}
	
	public function signin_form()
	{
	
		$email_address = $_POST['email_address'];
		$password = $_POST['password'];
		$valid_check = $this->messages_model->check_credentials($email_address,$password);
		if($valid_check == true)
		{
			$data = array(
			'email_address' => $email_address,
			'is_logged_in' => true);
		    $this->session->set_userdata('is_logged_in', $data);
			echo 1;
		}
		else
		{
			echo 2;
		}
	}

	function logout()
	{
		$this->session->unset_userdata('is_logged_in');
		$this->load->view('admin/index_admin');	
	}	

	/**** End Login ****/

	
}