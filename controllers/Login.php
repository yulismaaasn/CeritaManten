<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	// load model
	public function __construct()
	{
		parent:: __construct();
		$this->load->model('user_model');
	}

	//load login page
	public function index()
	{
		//validasi
		$valid = $this->form_validation;

		$valid->set_rules('username','Username','required|min_length[6]|max_length[32]',
			array(	'required' 		=> '%s harus diisi',
				    'min_length' 	=> '%s minimal 6 karakter',
				    'max_length'	=> '%s maksimal 32 karakter'));

		$valid->set_rules('password','Password','required',
			array('required' => '%s harus diisi'));

		if($valid->run()) {
			$username           = $this->input->post('username');
			$password 			= $this->input->post('password');
			//compare dengan database
			$check_login		= $this->user_model->login($username,$password);
			redirect(base_url('admin/dashboard'),'refresh');
			//data yang cocok create session
					}


		//end validasi
		$data = array(	'title'		=> 'Login Cerita Manten');
		$this->load->view('admin/login/list', $data, FALSE);
		
	}
	public function logout()
	{
		
		return redirect()->to(base_url('login'));
	}
 
}
