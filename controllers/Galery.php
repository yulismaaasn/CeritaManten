<?php
defined('BASEPATH') OR exit("No direct script acces allowed");

class Galery extends CI_Controller {
	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Gallery_model');
	}

	//halaman utama website - homepage
	public function index()
	{	$dokumentasi =$this->Dokumentasi_model->home();	
		$data= array(	'title'			  =>'gallery'
						'gallery'		  => $gallery,
						'isi'             =>'home/list/galery'
		                );
		$this-> load->view('layout/wrapper',$data,FALSE);
	}
