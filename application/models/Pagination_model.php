<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Andika Nugraha

*/
class Pagination_model extends CI_Model{

	public function data($number,$offset){
		$query = $this->db->get('mock_data',$number,$offset);
		return $query->result();		
	}
 
	public function jumlah_data(){
		$query = $this->db->get('mock_data')->num_rows();
		return $query;
	}
}