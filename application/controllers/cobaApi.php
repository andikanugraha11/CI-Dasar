<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class cobaApi extends CI_Controller
{
	function __construct(){
		parent::__construct();
		echo "string";
		$this->load->model('cobaApi_model');
	}

	public function index(){

	}
}