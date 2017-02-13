<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class cobaApi_model extends CI_Model
{

	public function getData($number,$offset){
		$query = $this->db->get('mock_data',$number,$offset);
		return $query->result();		
	}
 
	public function jumlahData(){
		$query = $this->db->get('mock_data')->num_rows();
		return $query;
	}


	public function insertData($dataSaya)
	{
      $data = array(
        'first_name' 	=> $dataSaya['npm'],
        'last_name' 	=> $dataSaya['nama'],
        'email' 		=> $dataSaya['kelas'],
        'gender' 		=> $dataSaya['tanggalLahir'],
        'Skill'			=> $dataSaya['tanggalLahir']
      );
      $this->db->insert('mock_data', $data);
  	}

  	public function updateData($dataSaya, $id)
  	{
		$data = array(
			'first_name' 	=> $dataSaya['npm'],
			'last_name' 	=> $dataSaya['nama'],
			'email' 		=> $dataSaya['kelas'],
			'gender' 		=> $dataSaya['tanggalLahir'],
			'Skill'			=> $dataSaya['tanggalLahir']
		);
    	$this->db->where('id', $id);
    	$this->db->update('mock_data', $data);
	}

	public function deleteData($id)
	{
		$data = array(
			'id' => $id
		);
	$this->db->delete('mock_data', $data);
	}
}