<?php
defined('BASEPATH') OR exit("No direct script acces allowed");

class Paketsilver extends CI_Controller {
	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Silver_model');
	}

	//listing
	public function index()
	{
		$silver =$this->Silver_model->home();
		$data = array(	'title'			  =>'paketsilver',
						'silver'		  =>$silver,
						'isi'             =>'paketpernikahan/paketsilver'
		                );
		$this-> load->view('layout/wrapper',$data,FALSE);
	}
}