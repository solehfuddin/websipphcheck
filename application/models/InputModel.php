<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InputModel extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function getData($kode)
	{
		$result = $this->db->order_by('tgl_input', 'DESC')
						   ->get_where('t_input', array('id_user' => $kode));

		return $result->result_array();
	}
	
	function chooseData($kode)
	{
		$result = $this->db->get_where('t_input', array('id_input' => $kode));

		return $result->row_array();
	}
	
	function insertData($data)
	{
		return $result = $this->db->insert('t_input', $data);
	}
	
	function filterData($kode, $stdate, $eddate)
	{
		$result = $this->db->order_by('tgl_input', 'DESC')
						   ->get_where('t_input', array('id_user' => $kode, 'tgl_input >=' => $stdate, 'tgl_input <=' => $eddate));;
		
		return $result->result_array();
	}
	
	function deleteData($data)
	{
		return $this->db->delete('t_input', $data);
	}
}