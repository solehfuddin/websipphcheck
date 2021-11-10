<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->model('UserModel');
	}
	
	function loginUser()
	{
		//$username = $this->input->post('username');
		//$password = $this->input->post('password');
		$json = json_decode(file_get_contents('php://input'), true);
		$username  =  $json['username'];
		$password  =  $json['password'];

		$data = $this->UserModel->getUser($username, $password);
		
		if (count($data) > 0)
		{
			$json = array(
				"code" => 200,
				"username" => $data['username'],
				"id_user" => $data['id_user']
			);
			echo json_encode($json);
		}
		else
		{
			$invalid = "invalid";
			$msg = "Data not found";

			$json = array(
					"code" => 404,
					$invalid => $msg
				);
			echo json_encode($json);
		}
	}
}
