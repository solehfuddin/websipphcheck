<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require 'assets/vendor/autoload.php';

use League\ColorExtractor\Color;
use League\ColorExtractor\ColorExtractor;
use League\ColorExtractor\Palette;

class Dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('UserModel');
		$this->load->model('HistoryModel');
		$this->load->model('InputModel');
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

	public function ajax_list()
    {
        $list = $this->HistoryModel->get_datatables();
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
            "recordsTotal" => $this->HistoryModel->count_all(),
            "recordsFiltered" => $this->HistoryModel->count_filtered(),
            "data" => $data,
        );

        echo json_encode($output);
    }

	public function uploadprocess()
	{
		if($this->session->userdata('is_login') == false){
			redirect('/');
		}

		$config['upload_path']          = './assets/img/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 10000;
		$config['max_width']            = 16000;
		$config['max_height']           = 30000;
 
		$this->load->library('upload', $config);

		$camera = $this->upload->do_upload('capture_camera');
		$galery = $this->upload->do_upload('capture_galery');

		if ($camera != '')
		{
			if ($galery != '')
			{
				$data = [
					'error' => [
						'data' => 'Harap pilih salah satu sumber gambar'
						]
					];
			}
			else
			{
				$uploaded_data = $this->upload->data();
				$file_name = $uploaded_data['file_name'];
				//$this->resizeImage($uploaded_data['file_name']);
				$kode_warna = $this->getColorCode($file_name);
				$rgb_code = $this->hexToRgb($kode_warna);
				$splitrgb = explode(",", $rgb_code);

				$kadarph = $this->findNearest($this->colorList(), $splitrgb[0], $splitrgb[1], $splitrgb[2]);
				$kategoriph = $this->getStatus($kadarph);

				$new_data = [
					'id_user' => $this->session->userdata('id_user'),
					'kode_warna' => $kode_warna,
					'kode_ph' => $kadarph,
					'kategori_ph' => $kategoriph,
					'tgl_input' => date('Y-m-d'),
					'path' => $file_name,
				];

				$this->InputModel->insertData($new_data);

				$data = [
					'success' => [
						'kode_warna' => $kode_warna,
						'kode_ph' => $kadarph,
						'kategori_ph' => $kategoriph,
						'data' => 'Eksekusi camera'
						]
					];
			}
		}
		else if ($galery != '')
		{
			if ($camera != '') {
				$data = [
					'error' => [
						'data' => 'Harap pilih salah satu sumber gambar'
						]
					];
			}
			else
			{
				$uploaded_data = $this->upload->data();
				$file_name = $uploaded_data['file_name'];
				//$this->resizeImage($uploaded_data['file_name']);
				$kode_warna = $this->getColorCode($file_name);
				$rgb_code = $this->hexToRgb($kode_warna);
				$splitrgb = explode(",", $rgb_code);

				$kadarph = $this->findNearest($this->colorList(), $splitrgb[0], $splitrgb[1], $splitrgb[2]);
				$kategoriph = $this->getStatus($kadarph);

				$new_data = [
					'id_user' => $this->session->userdata('id_user'),
					'kode_warna' => $kode_warna,
					'kode_ph' => $kadarph,
					'kategori_ph' => $kategoriph,
					'tgl_input' => date('Y-m-d'),
					'path' => $file_name,
				];

				$this->InputModel->insertData($new_data);

				$data = [
					'success' => [
						'kode_warna' => $kode_warna,
						'kode_ph' => $kadarph,
						'kategori_ph' => $kategoriph,
						'data' => 'Eksekusi galeri'
						]
					];
			}
		}
		else
		{
			$data = [
				'error' => [
					'data' => 'Harap pilih salah satu sumber gambar'
					]
				];
		}


		echo json_encode($data);
	}

	function test(){
		$rgb_code = $this->hexToRgb("#000ff9");
		echo $rgb_code;
	}

	function getColorCode($filename)
	{
		$palette = Palette::fromFilename('./assets/img/' . $filename);

		$counter = 0;
		foreach($palette as $color => $count) {
			if (key($palette)) {
				if ($counter == 0) {
					$output = Color::fromIntToHex($color);
					return $output;
				}
			}
			
			$counter++;
		}
		
		$topFive = $palette->getMostUsedColors(1);

		$colorCount = count($palette);

		$blackCount = $palette->getColorCount(Color::fromHexToInt('#000000'));

		$extractor = new ColorExtractor($palette);

		$colors = $extractor->extract(1);
	}

	function hexToRgb($hex, $alpha = false) {
	   $hex      = str_replace('#', '', $hex);
	   $length   = strlen($hex);
	   $rgb['r'] = hexdec($length == 6 ? substr($hex, 0, 2) : ($length == 3 ? str_repeat(substr($hex, 0, 1), 2) : 0));
	   $rgb['g'] = hexdec($length == 6 ? substr($hex, 2, 2) : ($length == 3 ? str_repeat(substr($hex, 1, 1), 2) : 0));
	   $rgb['b'] = hexdec($length == 6 ? substr($hex, 4, 2) : ($length == 3 ? str_repeat(substr($hex, 2, 1), 2) : 0));
	   if ( $alpha ) {
		  $rgb['a'] = $alpha;
	   }
	  // return $rgb;
	  return implode(",", $rgb);;
	}

	function colorList(){
		$colors = [
			0 => [
				'r'  => 185,
				'g'  => 13,
				'b'  => 23,
			],
			1 => [
				'r'  => 205,
				'g'  => 44,
				'b'  => 30,
			],
			2 => [
				'r'  => 193,
				'g'  => 38,
				'b'  => 20,
			],
			3 => [
				'r'  => 212,
				'g'  => 84,
				'b'  => 25,
			],
			4 => [
				'r'  => 215,
				'g'  => 120,
				'b'  => 30,
			],
			5 => [
				'r'  => 215,
				'g'  => 130,
				'b'  => 38,
			],
			6 => [
				'r'  => 180,
				'g'  => 123,
				'b'  => 29,
			],
			7 => [
				'r'  => 60,
				'g'  => 49,
				'b'  => 0,
			],
			8 => [
				'r'  => 40,
				'g'  => 36,
				'b'  => 0,
			],
			9 => [
				'r'  => 25,
				'g'  => 10,
				'b'  => 16,
			],
			10 => [
				'r'  => 25,
				'g'  => 0,
				'b'  => 0,
			],
			11 => [
				'r'  => 5,
				'g'  => 0,
				'b'  => 0,
			],
			12 => [
				'r'  => 60,
				'g'  => 0,
				'b'  => 0,
			],
			13 => [
				'r'  => 18,
				'g'  => 0,
				'b'  => 0,
			],
		];

		return $colors;
		// var_dump($players);
	}

	function findNearest($colors, $currR, $currG, $currB){
		$shortDistance = 2147483647;
		$index = -1;

		for ($i = 0; $i < count($colors); $i++)
		{
			$distance = 0;
			$distance = $this->getDistance($currR, $currG, $currB, 
				$colors[$i]['r'], $colors[$i]['g'], $colors[$i]['b']);

			if ($distance < $shortDistance){
                $index = $i;
                $shortDistance = $distance;
            }
		}

		return $index;
	}

	function getDistance($currR, $currG, $currB, $matchR, $matchG, $matchB){
		$rDiff = $currR - $matchR;
		$gDiff = $currG - $matchG;
		$bDiff = $currB - $matchB;

		return $rDiff * $rDiff + $gDiff * $gDiff + $bDiff * $bDiff;
		// $color = $this->colorList();
		// echo $color[0]['r'];
	}

	function getStatus($phcode){
        switch($phcode) {
            case 1 :
                return "Acid";
                break;
            case 2 :
                return "Acid";
                break;
            case 3 :
                return "Acid";
                break;
            case 4 :
                return "Acid";
                break;
            case 5 :
                return "Acid";
                break;
            case 6 :
                return "Acid";
                break;
            case 7 :
                return "Netral";
                break;
            case 8 :
                return "Alkaline";
                break;
            case 9 :
                return "Alkaline";
                break;
            case 10 :
                return "Alkaline";
                break;
            case 11 :
                return "Alkaline";
                break;
            case 12 :
                return "Alkaline";
                break;
            case 13 :
                return "Alkaline";
                break;
            case 14 :
                return "Alkaline";
                break;
            default : 
                return "Tidak ditemukan";
        }
    }
	
	public function resizeImage($filename)
	{

      $source_path = $_SERVER['DOCUMENT_ROOT'] . '/assets/img/' . $filename;

      $target_path = $_SERVER['DOCUMENT_ROOT'] . '/assets/img/';

      $config_manip = array(

          'image_library' => 'gd2',

          'source_image' => $source_path,

          'new_image' => $target_path,

          'maintain_ratio' => TRUE,

          'width' => 500,

      );

   

      $this->load->library('image_lib', $config_manip);

      if (!$this->image_lib->resize()) {

          echo $this->image_lib->display_errors();

      }

   

      $this->image_lib->clear();

	}
}
