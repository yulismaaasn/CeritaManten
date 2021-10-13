<?php
defined('BASEPATH') OR exit("No direct script acces allowed");

class Paketdiamond extends CI_Controller {
	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Diamond_model');
	}

	//listing
	public function index()
	{	$diamond =$this->Diamond_model->home();
		$data = array(	'title'			  =>'Paketpernikahan',
						'diamond'		  => $diamond,
						'isi'             =>'Paketpernikahan/paketdiamond'
		                );
		$this-> load->view('layout/wrapper',$data,FALSE);
	}
}