<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berhasil extends CI_Controller {

	// halaman utama website - homepage
	public function index()
	{
		$data = array(	'title'			=> 'berhasil',
						'isi'			=> 'berhasil/list'
						);
		$this->load->view('layout/wrapper', $data, FALSE);
		
	}
  

}