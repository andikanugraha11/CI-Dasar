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
		$this->form_validation->set_rules('email', 'E-Mail','required|trim|valid_email|is_unique[member.Email]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
		$this->form_validation->set_rules('repassword', 'Konfirmasi_Password', 'required|matches[password]');
		$this->form_validation->set_rules('hobi[]', 'Hobi', 'required');
		if($this->form_validation->run()){
			$id = $this->User_model->insertMember();
			if($id >= 1){
				$data = array(
					'userId'  => $id,
					'logged_in' => TRUE
					);
				$this->session->set_userdata($data);
				redirect('home/admin');
			}else{
				redirect('http://google.co.id');
			}
		}else{
			$data['Content'] = 'home/home';
			$this->load->view('home/content',$data);
		}

	}

	public function admin()
	{
		if($this->session->userdata('logged_in')) {
			$this->load->view('home/dashboard');
		}else{
			$this->session->set_flashdata('noLogin', 'Harus Login terlebih dahulu');
			redirect('home');
		}
		
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('home');
	}
}