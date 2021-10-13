<?php
defined('BASEPATH') OR exit("No direct script acces allowed");

class Galhds extends CI_Controller {

	public function index()
	{
		$data= array(	'title'			  =>'Galery',
						'isi'             =>'Galery/galhds'
		                );
		$this->load->view('layout/wrapper',$data,FALSE);
	}
}