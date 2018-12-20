<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class All extends CI_Controller {
	
	public function __construct()
    {
		parent::__construct();
		$this->load->model('Models_model');
	}
	
	public function index()
	{
		$this->load->view('layouts/header');
		$this->load->view('welcome');
		$this->load->view('layouts/footer');
	}

	public function manager()
	{
		$this->load->view('layouts/header');
		$this->load->view('manager');
		$this->load->view('layouts/footer');
	}

	public function login()
	{
		if ($this->session->userdata('username'))
		{
			redirect('All/manager');
		}

		if (isset($_POST['username']))
		{
			$username = $_POST['username'];
			$password = $_POST['password'];
			if ($this->Models_model->login($username,$password))
			{
				redirect('All/manager');
			}
			else
			{
				redirect('All/login#bad_password');
			}
		}
		
		$this->load->view('layouts/header');
		$this->load->view('login');
		$this->load->view('layouts/footer');
	}

	public function login_close ()
	{
		$this->session->sess_destroy();
		redirect('/');
	}
}

?>