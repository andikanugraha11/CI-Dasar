<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Andika Nugraha

*/
class pagination extends CI_Controller{


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pagination_model');
	}


	public function index()
	{
		$jumlah_data = $this->Pagination_model->jumlah_data();
		$this->load->library('pagination');
		$config['base_url'] = base_url().'pagination/index/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 10;
		$from = $this->uri->segment(3);
		$data['uriseg'] = $this->uri->segment(3);
		$this->pagination->initialize($config);		
		$data['user'] = $this->Pagination_model->data($config['per_page'],$from);
		$this->load->view('v_pagination',$data);
	}
}