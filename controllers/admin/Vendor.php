<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Vendor_model');
	}

	//data vendor
	public function index()
	{
		$vendor = $this->Vendor_model->listing();
		$data = array(			'title' => 'Data GRL',
					  			'vendor'  => $vendor,
					  			'isi'	  => 'admin/vendor/list'
					 );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//tambah vendor
	public function tambah()
	{
		//validasi input
		$valid = $this->form_validation;

		$valid->set_rules('no','No','required',
			array('required' => '%s harus diisi'));

		$valid->set_rules('jenislayanan','Jenis Layanan','required',
			array('required' 		=> '%s harus diisi'));

		$valid->set_rules('harga','Harga','required',
			array('required' 		=> '%s harus diisi'));



		if($valid->run()===FALSE) { 
			//end validasi
		
		$data = array(			'title'   => 'Tambah GRL',
					  			'isi'	  => 'admin/vendor/tambah');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//masuk database
		}else{
			$i = $this->input;
			$data = array(				'no' 				=> $i->post('no'),
										'jenislayanan' 		=> $i->post('jenislayanan'),
										'harga' 			=> $i->post('harga'),
									);
			$this->Vendor_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/vendor'),'refresh');
		}
		//end database
	}


	//edit vendor
	public function edit($id_vendor)
	{
		$vendor = $this->Vendor_model->detail($id_vendor);

		//validasi input
		$valid = $this->form_validation;

		$valid->set_rules('no','No','required',
			array('required' => '%s harus diisi'));

		$valid->set_rules('jenislayanan','Jenis Layanan','required',
			array('required' 		=> '%s harus diisi'));

		$valid->set_rules('harga','Harga','required',
			array('required' 		=> '%s harus diisi'));


		if($valid->run()===FALSE) {
			//end validasi

		$data = array('title' => 'Edit Daftar Harga',
									'vendor'	=> $vendor,
					  			'isi'	  => 'admin/vendor/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//masuk database
		}else{
			$i = $this->input;
			$data = array(			
									'no' 			=> $i->post('no'),
									'jenislayanan' 	=> $i->post('jenislayanan'),
									'harga' 		=> $i->post('harga'),
									);
			$this->Vendor_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diubah');
			redirect(base_url('admin/vendor'),'refresh');
		}
		//end database
	}

	//delete vendor
	public function delete($id_vendor)
	{
		$data = array('no ' => $id_vendor);
		$this->Vendor_model->delete('$data');
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/vendor'),'refresh');
	}
} 
