<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class cobaHelper extends CI_Controller
{

	public function index(){
		$this->load->helper('dika');

		$coba = penjumlahan(2,3);

		echo $coba;
	}

	public function halaman($halaman=null){
		$this->load->library('pagination');
		$config['base_url'] = 'http://Localhost:/BelajarRD/cobaHelper/halaman/';
		$config['total_rows'] = 200;
		$config['per_page'] = 5;

		$this->pagination->initialize($config);
		echo "Anda berada pada halaman $halaman <br/>";
		echo $this->pagination->create_links();
	}
}
