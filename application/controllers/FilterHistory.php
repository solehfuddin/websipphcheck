<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FilterHistory extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('FilterHistoryModel');
		$this->load->model('InputModel');
		
		if($this->session->userdata('is_login') == false){
			redirect('/');
		}
	}
	
	public function index()
	{
		$this->load->view('layout/header');
        $this->load->view('v_filterhistory');
        $this->load->view('layout/footer');
	}
	
	public function ajax_list()
    {
        $list = $this->FilterHistoryModel->get_datatables();
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
										   
            $row = array();
            $row[] = $this->session->userdata('username');
            $row[] = date("d-m-Y", strtotime($field->tgl_input));
            $row[] = $field->kode_ph;
			$row[] = $action;
 
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->FilterHistoryModel->count_all(),
            "recordsFiltered" => $this->FilterHistoryModel->count_filtered(),
            "data" => $data,
        );

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
