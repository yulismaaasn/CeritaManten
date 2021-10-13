<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor extends CI_Controller {

	public function index()
	{
		$data = array(	'title'			=> 'Our Wedding', /*INI CONTOH , GANTI AJA YUL*/
						'isi'			=> 'vendor/makeup'
						);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

		public function dekorasi()
	{
		$data = array(	'title'			=> 'Our Wedding', /*INI CONTOH , GANTI AJA YUL*/
						'isi'			=> 'vendor/dekorasi'
						);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

		public function fotovideo()
	{
		$data = array(	'title'			=> 'Our Wedding', /*INI CONTOH , GANTI AJA YUL*/
						'isi'			=> 'vendor/dekorasi'
						);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

		public function mc()
	{
		$data = array(	'title'			=> 'Our Wedding', /*INI CONTOH , GANTI AJA YUL*/
						'isi'			=> 'vendor/dekorasi'
						);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

}

/* End of file Vendor.php */
/* Location: ./application/controllers/Vendor.php */