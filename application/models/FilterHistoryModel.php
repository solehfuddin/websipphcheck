<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FilterHistoryModel extends CI_Model {

	var $table = 't_input';
    var $column_order = array(null, 'tgl_input','kode_ph');
    var $column_search = array('tgl_input','kode_ph');
    var $order = array('tgl_input' => 'desc');
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
 
    private function _get_datatables_query()
    {
        if($this->input->post('filter_datefrom') && $this->input->post('filter_dateuntil'))
        {
			$arr = array(
				'id_user' => $this->session->userdata('id_user'), 
				'tgl_input >=' => date("Y-m-d", strtotime($this->input->post('filter_datefrom'))), 
				'tgl_input <=' => date("Y-m-d", strtotime($this->input->post('filter_dateuntil')))
			);
            $this->db->where($arr);
        }
		else
		{
			$arr = array(
				'id_user' => $this->session->userdata('id_user')
			);
            $this->db->where($arr);
		}
 
        $this->db->from($this->table);
        $i = 0;
     
        foreach ($this->column_search as $item)
        {
            if($_POST['search']['value'])
            {
                 
                if($i===0)
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
         
        if(isset($_POST['order']))
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    public function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    public function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
}