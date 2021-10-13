<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hds extends CI_Controller {
	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Hds_model');
	}
	public function index()
	{	$hds =$this->Hds_model->home();	
		$data = array(	'title'			=> 'hds', 
						'hds'			=> $hds,
						'isi'			=> 'vendor/hds'
						);
		$this->load->view('layout/wrapper', $data, FALSE);
	}
}