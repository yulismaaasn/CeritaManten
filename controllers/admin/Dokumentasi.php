<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokumentasi extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dokumentasi_model');
	}

	//data dokumentasi
	public function index()
	{
		$dokumentasi = $this->Dokumentasi_model->listing();
		$data = array('title' => 'Data Dokumentasi',
					  			'dokumentasi'  => $dokumentasi,
					  			'isi'	  => 'admin/dokumentasi/list'
					 );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//tambah dokumentasi
	public function tambah()
	{
		//validasi input
		$valid = $this->form_validation;

		
		$valid->set_rules('no','No','required',
			array('required' => '%s harus diisi'));

		$valid->set_rules('jenislayanan','jenislayanan','required',
			array('required' 		=> '%s harus diisi'));

		$valid->set_rules('harga','Harga','required',
			array('required' 		=> '%s harus diisi'));



		if($valid->run()===FALSE) {
			//end validasi

		$data = array(			'title'   => 'Tambah Dokumentasi',
					  			'isi'	  => 'admin/dokumentasi/tambah');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//masuk database
		}else{
			$i = $this->input;
			$data = array(				'no' 				=> $i->post('id_dokumentasi'),
										'jenislayanan' 		=> $i->post('jenislayanan'),
										'harga' 			=> $i->post('harga'),
									);
			$this->Dokumentasi_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/dokumentasi'),'refresh');
		}
		//end database
	}


	//edit dokumentasi
	public function edit($id_dokumentasi)
	{
		$dokumentasi = $this->Dokumentasi_model->detail($id_dokumentasi);

		//validasi input
		$valid = $this->form_validation;

		$valid->set_rules('no','No','required',
			array('required' => '%s harus diisi'));

		$valid->set_rules('jenislayanan','jenislayanan','required',
			array('required' 		=> '%s harus diisi'));

		$valid->set_rules('harga','Harga','required',
			array('required' 		=> '%s harus diisi'));


		if($valid->run()===FALSE) {
			//end validasi

		$data = array('title' => 'Edit Dokumentasi',
									'dokumentasi'	=> $dokumentasi,
					  			'isi'	  => 'admin/dokumentasi/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//masuk database
		}else{
			$i = $this->input;
			$data = array(				'id_dokumentasi'	=> $id_dokumentasi,
										'id_dokumentasi' 	=> $i->post('no'),
										'jenislayanan' 		=> $i->post('jenislayanan'),
										'harga' 			=> $i->post('harga'),
									);
			$this->Dokumentasi_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diubah');
			redirect(base_url('admin/dokumentasi'),'refresh');
		}
		//end database
	}

	//delete dokumentasi
	public function delete($id_dokumentasi)
	{
		$data = array('id_dokumentasi' => $id_dokumentasi);
		$this->Dokumentasi_model->delete('$data');
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/dokumentasi'),'refresh');
	}
}
