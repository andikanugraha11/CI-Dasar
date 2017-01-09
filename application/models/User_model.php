<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class User_model extends CI_Model{

		public function insertMember()
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$email = $this->input->post('email');
			$agama = $this->input->post('agama');
			$gender = $this->input->post('gender');
			$hobi = $this->input->post('hobi');
			$hasil="";
			foreach ($hobi as $isi) {
				$hasil = "$hasil" . "$isi<br>";
			}
			$data = array(
				'username'	=> $username,
				'password'	=> $password,
				'email'		=> $email,
				'agama'		=> $agama,
				'hobi'		=> $hasil,
				'gender'	=> $gender
				);
			$this->db->insert('member',$data);
			$id = $this->db->insert_id();
			return $id;
		}

		public function getMember()
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$query = $this->db->get_where('member', array('username' => $username, 'password' => $password));
			return $query->row();
		}

	}
?>