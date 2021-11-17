<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('UserModel');
	}
	
	public function index()
	{
		if($this->session->userdata('is_login') == false){
			redirect('/');
		}

		$this->load->view('layout/header');
        $this->load->view('v_admin');
        $this->load->view('layout/footer');
	}
}
