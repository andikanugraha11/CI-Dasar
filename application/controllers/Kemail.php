<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Kemail extends CI_Controller
{
	// public function __construct(){
	// 	parent::__construct();
		
	// }
	public function index()
	{
		// $email = $this->input->post('email');
		// $nama = $this->input->post('nama');
		// $subjek = $this->input->post('subjek');
		// $pesan = $this->input->post('pesan');
		$this->load->library('google');
		
		$config = Array(
		      'protocol' => 'smtp',
		      'smtp_host' => 'smtp.gmail.com',
		      'smtp_port' => 465,
		      //'_smtp_auth'=>TRUE,
		      'smtp_user' => 'kirim.email001@gmail.com', //isi dengan gmailmu!
		      'smtp_pass' => 'qwertyuiopoiuytrewq', //isi dengan password gmailmu!
		      'smtp_crypto'=>'ssl',
		      'mailtype' => 'html',
		      'charset'=>'utf-8',
		      'newline' => "\r\n"
        	  //'validate'=>TRUE
		    );

		$this->load->library('email',$config);

		//$this->email->initialize($config);
		$this->email->from('kirim.email001@gmail.com', 'Andika');
		$this->email->to('m.andika.nugraha@gmail.com');
		//$this->email->cc('another@another-example.com');
		//$this->email->bcc('them@their-example.com');
		$this->email->subject('Email Test');
		$this->email->message('Testing the email class.');

		if($this->email->send()){
			echo 'Email terkirim';
		}else{
			show_error($this->email->print_debugger());
		}
	}
}