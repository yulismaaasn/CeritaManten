<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	// halaman utama website - homepage
	public function index()
	{
		$data = array(	'title'			=> 'UBeauty - Rekomendasi Skincare',
						'isi'			=> 'home/list'
						);
		$this->load->view('layout/wrapper', $data, FALSE);
		
	}
  

}