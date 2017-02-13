<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class cobaApi extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('cobaApi_model');
	}

	public function index(){

	}

	public function getAllData($page, $size)
	{
		$content 		= $this->cobaApi_model->getAllData(($page - 1) * $size, $size);
		$totalHalaman 	= ceil($this->cobaApi_model->jumlahData() / $size);
		
		$hasilJson = array(
			'content' 		=> $content,
			'totalPages' 	=> $totalHalaman
		);


		header(200);
		header('Content-Type: application/json');
		echo json_encode($hasilJson,JSON_PRETTY_PRINT);  
	}

	public function getData($id)
	{
		$data 		= $this->cobaApi_model->getData($id);

		$hasilJson = array(
			'content' 		=> $data
		);

		header(200);
		header('Content-Type: application/json');
		echo json_encode($hasilJson,JSON_PRETTY_PRINT); 

	}
}