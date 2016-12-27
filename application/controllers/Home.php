<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

	public function index()
	{
		$data['Content'] = 'home/home';
		$this->load->view('home/content',$data);
	}

	public function daftar()
	{

		$this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[5]|is_unique[member.Username ]');
		$this->form_validation->set_rules('email', 'E-Mail','required|trim|valid_email|is_unique[member.Email ]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|');
		$this->form_validation->set_rules('repassword', 'Konfirmasi Password', 'required|matches[password]');

		if($this->form_validation->run()){
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$email = $this->input->post('email');

			echo "$username";
			echo "$password";
			echo "$email";
		}else{
			$data['Content'] = 'home/home';
			$this->load->view('home/content',$data);
		}

	}
}