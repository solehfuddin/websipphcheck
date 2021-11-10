<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function getUser($username, $password)
	{
		$result = $this->db->get_where('m_user', array('username' => $username, 'password' => $password));

		return $result->row_array();
	}
}