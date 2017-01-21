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


	//ibacor
	public function DonorDarah()
	{
		$data['url1'] = 'http://ibacor.com/api/ayodonor?view=list_darah';
		$data['url2'] = 'http://ibacor.com/api/ayodonor?view=list_propinsi';
		$this->load->view('core/header');
		$this->load->view('donor',$data);
		$this->load->view('core/footer');
	}
}