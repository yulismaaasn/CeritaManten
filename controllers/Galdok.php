<?php
defined('BASEPATH') OR exit("No direct script acces allowed");

class Galdok extends CI_Controller {

	public function index()
	{
		$data= array(	'title'			  =>'Galery',
						'isi'             =>'Galery/Galdok'
		                );
		$this->load->view('layout/wrapper',$data,FALSE);
	}
}
