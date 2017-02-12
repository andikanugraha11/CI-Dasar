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
		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";
		$config['last_link'] = 'terakhir';
		$config['first_link'] = 'pertama';
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