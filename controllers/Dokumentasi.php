<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokumentasi extends CI_Controller {
	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dokumentasi_model');
	}
	//listing
	public function index()
	{	$dokumentasi =$this->Dokumentasi_model->home();	
		$data = array(	'title'			=> 'dokumentasi',
						'dokumentasi'	=> $dokumentasi, 
						'isi'			=> 'vendor/dokumentasi'
						);
		$this->load->view('layout/wrapper', $data, FALSE);
	}
}