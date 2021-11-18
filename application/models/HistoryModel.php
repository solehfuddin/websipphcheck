<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HistoryModel extends CI_Model {

	var $table = 't_input'; //nama tabel dari database
    var $column_order = array(null, 'tgl_input','kode_ph'); //field yang ada di table user
    var $column_search = array('tgl_input','kode_ph'); //field yang diizin untuk pencarian 
    var $order = array('tgl_input' => 'desc'); // default order 
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
 
    private function _get_datatables_query($id, $stdate, $eddate)
    {
		/*if ($stdate == '' && $eddate == '')
		{
			$this->db->where($data)->from($this->table);
		}
        else
		{
			$this->db->where($data)->where('tgl_input >=', $stdate)->where('tgl_input <=', $eddate)->from($this->table);
		}*/
		
		$this->db->where('id_user', $id)->where('tgl_input >=', $stdate)->where('tgl_input <=', $eddate)->from($this->table);
 
        $i = 0;
     
        foreach ($this->column_search as $item) // looping awal
        {
            if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {
                 
                if($i===0) // looping awal
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
 
    function get_datatables($data, $stdate, $eddate)
    {
        $this->_get_datatables_query($data, $stdate, $eddate);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered($data, $stdate, $eddate)
    {
        $this->_get_datatables_query($data, $stdate, $eddate);
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
}