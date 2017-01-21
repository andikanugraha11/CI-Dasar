<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Api_model extends CI_Model
{
	
	public function hitungMember()
	{
		return $this->db->count_all_results('member');
	}

	public function getMember($size,$page)
	{
		return $this->db->get('mahasiswa', $size, $page);
	}
}