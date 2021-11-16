<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();

		$this->load->model('UserModel');
	}
	
	public function index()
	{
		if($this->session->userdata('is_login')){
			redirect('dashpanel');
		}
		
		$this->load->view('v_login');
	}
	
	function loginacc()
	{
		$username = $this->input->post('username');
        $password = $this->input->post('password');

        $cek = $this->UserModel->getUser($username, $password);

        if(!empty($cek)){
			$session_data = array(
                    'id_user'   => $cek['id_user'],
                    'username'  => $cek['username'],
					'is_login' => true
                );
            $this->session->set_userdata($session_data);

			$msg = [
				'success' => [
					'info' => 'Berhasil Login'
				]
			];

        } else {
            
            $msg = [
				'error' => [
					'info' => 'Username dan password salah'
				]
			];
        }
		
		echo json_encode($msg);
	}
	function logoutacc()
	{
		$array_items = array('id_user', 'username', 'is_login');
		$this->session->unset_userdata($array_items);
		redirect('login');
	}
}
