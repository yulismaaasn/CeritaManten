<?php
defined('BASEPATH') OR exit("No direct script acces allowed");

class Paketgold extends CI_Controller {
	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Gold_model');
	}

	//listing
	public function index()
	{	$gold =$this->Gold_model->home();
		$data = array(	'title'			  =>'Paketpernikahan',
						'gold'			  =>$gold,
						'isi'             =>'Paketpernikahan/paketgold'
		                );
		$this-> load->view('layout/wrapper',$data,FALSE);
	}
}