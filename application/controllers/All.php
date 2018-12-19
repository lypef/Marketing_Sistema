<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class All extends CI_Controller {
	public function index()
	{
		$this->load->view('header');
		$this->load->view('welcome');
		$this->load->view('footer');
	}

	public function login()
	{
		$this->load->view('header');
		$this->load->view('login');
		$this->load->view('footer');
	}

}

?>