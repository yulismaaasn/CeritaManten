<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor extends CI_Controller {
	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Vendor_model');
	}
	//listing
	public function index()
	{
		$vendor =$this->Vendor_model->home();
		$data = array(	'title'			=> 'vendor', 
						'vendor'		=> $vendor,
						'isi'			=> 'vendor/grl'
						);
		$this->load->view('layout/wrapper', $data, FALSE);
	}
}
/* End of file Vendor.php */
/* Location: ./application/controllers/Vendor.php */