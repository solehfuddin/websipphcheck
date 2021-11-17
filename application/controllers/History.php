<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('HistoryModel');
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
		$arr = array(
			'id_user' => $this->session->userdata('id_user')
		);
		
        $list = $this->HistoryModel->get_datatables($arr);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
			$action = "<td> 
							<button type=\"button\" class=\"btn btn-xs btn-primary\" 
								onclick=\"viewdetail('" .$field->id_input. "')\"><i class=\"dw dw-edit2\"></i>Detail</button> 
						</td>
						<td>
						<div class=\"dropdown\">
							<a class=\"btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle\" 
								href=\"#\" role=\"button\" data-toggle=\"dropdown\">
								<i class=\"dw dw-more\"></i>
							</a>
						<div class=\"dropdown-menu dropdown-menu-right dropdown-menu-icon-list\">
								<button type=\"button\" class=\"dropdown-item\" 
									onclick=\"editarticle('" .$field->id_input. "')\"><i class=\"dw dw-edit2\"></i> Edit</button>
								<button type=\"button\" class=\"dropdown-item\" 
									onclick=\"deletearticle('" .$field->id_input. "')\"><i class=\"dw dw-delete-3\"></i> Delete</button>
								</div>
						</div>
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
            "recordsFiltered" => $this->HistoryModel->count_filtered($arr),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
}
