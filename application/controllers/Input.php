<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require 'vendor/autoload.php';

use League\ColorExtractor\Color;
use League\ColorExtractor\ColorExtractor;
use League\ColorExtractor\Palette;

class Input extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->model('InputModel');
	}
	
	function test()
	{
		$palette = Palette::fromFilename('./assets/img/img_cs.png');

		$counter = 0;
		// $palette is an iterator on colors sorted by pixel count
		foreach($palette as $color => $count) {
			// colors are represented by integers
			//echo Color::fromIntToHex($color), ': ', $count, "\n";
			
			if (key($palette)) {
				//var_dump(Color::fromIntToHex($color));
				
				if ($counter == 0) {
					$output = $this->hexToRgb(Color::fromIntToHex($color));
					echo $output;
				}
			}
			
			$counter++;
		}
		

		// it offers some helpers too
		$topFive = $palette->getMostUsedColors(1);

		$colorCount = count($palette);

		$blackCount = $palette->getColorCount(Color::fromHexToInt('#000000'));

		// an extractor is built from a palette
		$extractor = new ColorExtractor($palette);

		// it defines an extract method which return the most “representative” colors
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
	
	function getData()
	{
		$json = json_decode(file_get_contents('php://input'), true);
		$iduser  =  $json['id_user'];

		$data = $this->InputModel->getData($iduser);
		
		if (count($data) > 0)
		{
			$out = array(
				"code" => 200,
				'data' => $data,
			);
			echo json_encode($out);
		}
		else
		{
			$invalid = "invalid";
			$msg = "Data not found";

			$out = array(
					"code" => 404,
					$invalid => $msg
				);
			echo json_encode($out);
		}
	}
	
	function filterData()
	{
		$json = json_decode(file_get_contents('php://input'), true);
		$iduser  =  $json['id_user'];
		$stdate  =  $json['start_date'];
		$eddate  =  $json['end_date'];

		$data = $this->InputModel->filterData($iduser, $stdate, $eddate);
		
		if (count($data) > 0)
		{
			$out = array(
				"code" => 200,
				'data' => $data,
			);
			echo json_encode($out);
		}
		else
		{
			$invalid = "invalid";
			$msg = "Data not found";

			$out = array(
					"code" => 404,
					$invalid => $msg
				);
			echo json_encode($out);
		}
	}
	
	function insertData()
	{
		date_default_timezone_set('Asia/Jakarta');
		
		$json = json_decode(file_get_contents('php://input'), true);
		$iduser  =  $json['id_user'];
		$kdwarna  =  $json['kode_warna'];
		$kdph  =  $json['kode_ph'];
		$katph  =  $json['kategori_ph'];
		$tgl = date('Y-m-d');

		$input = array(
			'id_user'	=> $iduser,
			'kode_warna'=> $kdwarna,
			'kode_ph'	=> $kdph,
			'kategori_ph'=> $katph,
			'tgl_input' => $tgl
		);

		$data = $this->InputModel->insertData($input);
		
		if (count($data) > 0)
		{
			$json = array(
				"code" => 200,
				'status' => 'Sukses',
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
	
	function deleteData()
	{
		$json = json_decode(file_get_contents('php://input'), true);
		$id  =  $json['id_input'];

		$input = array(
			'id_input'	=> $id
		);

		$data = $this->InputModel->deleteData($input);
		
		if (count($data) > 0)
		{
			$json = array(
				"code" => 200,
				'status' => 'Sukses',
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
