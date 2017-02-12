<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class cobaLibrary extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('dikalib');
		
	}

	public function nama(){
		
		$this->dikalib->nama_saya();
		echo "<br/>";
		$this->dikalib->umur(21);
	}
}