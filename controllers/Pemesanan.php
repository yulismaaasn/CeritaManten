
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {
	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pemesanan_model');
	}
	//listing
	public function index()
	{
		$pemesanan =$this->Pemesanan_model->home();
		$data = array(	'title'			=> 'Pemesanan', 
						'Pemesanan'		=> $pemesanan,
						'isi'			=> 'pemesanan/list'
						);
		$this->load->view('layout/wrapper', $data, FALSE);
	}
}