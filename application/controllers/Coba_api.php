<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Coba_api extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Api_model');
	}

	public function banyak_member()
	{
		$jumlah = $this->Api_model->hitungMember();
		echo $jumlah;
	}

	
}