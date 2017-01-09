<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if($this->form_validation->run())
		{
			$user_data = $this->User_model->getMember();
			if($user_data != null)
			{
				$data = array(
					'userId'  => $user_data->id,
					'logged_in' => TRUE
					);
				$this->session->set_userdata($data);
				redirect('home/admin');
			}
				else
			{
				$this->session->set_flashdata('salah', 'Password atau Username salah');
				redirect('home');
			}
			
		}
			else
		{
			$data['Content'] = 'home/login';
			$this->load->view('home/content',$data);
		}

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
				$this->session->set_flashdata('gagal', 'Gagal Membuat User');
				redirect('home/daftar');
			}
		}else{
			$data['Content'] = 'home/home';
			$this->load->view('home/content',$data);
		}

	}

	public function admin()
	{
		if($this->session->userdata('logged_in')) {
			$data['Content'] = 'admin/dashboard';
			$this->load->view('admin/content',$data);
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