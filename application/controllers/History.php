<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
        $this->load->helper('form');
		$this->load->model('HistoryModel');
		$this->load->model('InputModel');
	}
	
	public function index()
	{
		if($this->session->userdata('is_login') == false){
			redirect('/');
		}

		$this->load->view('layout/header');
        $this->load->view('v_history');
        $this->load->view('layout/footer');
	}
	
	function get_data_user()
    {
		//$startdate = $this->input->post('filter_datefrom');
		//$enddate = $this->input->post('filter_dateuntil');
		$id = $this->session->userdata('id_user');
		$startdate = date("Y-m-01");
		$enddate = date("Y-m-d");
		
        $list = $this->HistoryModel->get_datatables($id, $startdate, $enddate);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
			$action = "<td> 
							<button type=\"button\" class=\"btn btn-xs btn-purple\" 
								onclick=\"viewdetail('" .$field->id_input. "')\"><i class=\"fa fa-file-text\"></i> </button> 
							&nbsp;
							<button type=\"button\" class=\"btn btn-xs btn-danger\" 
								onclick=\"deletedetail('" .$field->id_input. "')\"><i class=\"fa fa-times\"></i> </button> 
						</td>";
										   
            $no++;
            $row = array();
            //$row[] = $no;
            $row[] = $this->session->userdata('username');
            $row[] = date("d-m-Y", strtotime($field->tgl_input));
            $row[] = $field->kode_ph;
			$row[] = $action;
 
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->HistoryModel->count_all(),
            "recordsFiltered" => $this->HistoryModel->count_filtered($id, $startdate, $enddate),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
	
	function get_data_user_filter()
    {
		//$startdate = $this->input->post('filter_datefrom');
		//$enddate = $this->input->post('filter_dateuntil');
		$id = $this->session->userdata('id_user');
		$startdate = '2021-11-08';
		$enddate = '2021-11-10';
		
        $list = $this->HistoryModel->get_datatables($id, $startdate, $enddate);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
			$action = "<td> 
							<button type=\"button\" class=\"btn btn-xs btn-purple\" 
								onclick=\"viewdetail('" .$field->id_input. "')\"><i class=\"fa fa-file-text\"></i> </button> 
							&nbsp;
							<button type=\"button\" class=\"btn btn-xs btn-danger\" 
								onclick=\"deletedetail('" .$field->id_input. "')\"><i class=\"fa fa-times\"></i> </button> 
						</td>";
										   
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $this->session->userdata('username');
            $row[] = date("d-m-Y", strtotime($field->tgl_input));
            $row[] = $field->kode_ph;
			$row[] = $action;
 
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->HistoryModel->count_all(),
            "recordsFiltered" => $this->HistoryModel->count_filtered($id, $startdate, $enddate),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
	
	public function pilihdata() {
        $kode = $this->input->post('kode');
        $item = $this->InputModel->chooseData($kode);
    
        $data = [
			'success' => [
				'id_input' => $item['id_input'],
				'id_user' => $item['id_user'],
				'kode_warna' => $item['kode_warna'],
				'kode_ph' => $item['kode_ph'],
				'kategori_ph' => $item['kategori_ph'],
				'tgl_input' => $item['tgl_input'],
            ]
        ];
    
        echo json_encode($data);
    }
	
	public function hapusdata() {
        $kode = $this->input->post('kode');
		$arr = array(
			'id_input' => $kode
		);
        $this->InputModel->deleteData($arr);
    
        $data = [
			'success' => [
				'data' => 'Berhasil menghapus data dengan kode ' . $kode,
                'link' => '/admsettingbenefit'
                ]
            ];
			
		 echo json_encode($data);
    }
}
