<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pesan_model');
	}

	//data pesan
	public function index()
	{
		$pesan = $this->Pesan_model->listing();
		$data = array(			'title' => 'Data GRL',
					  			'pesan'  => $pesan,
					  			'isi'	  => 'admin/pesan/list'
					 );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//tambah pesan
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
					  			'isi'	  => 'admin/pesan/tambah');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//masuk database
		}else{
			$i = $this->input;
			$data = array(				'no' 				=> $i->post('no'),
										'jenislayanan' 		=> $i->post('jenislayanan'),
										'harga' 			=> $i->post('harga'),
									);
			$this->Pesan_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/pesan'),'refresh');
		}
		//end database
	}


	//edit pesan
	public function edit($id_pesan)
	{
		$pesan = $this->Pesan_model->detail($id_pesan);

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
									'pesan'	=> $pesan,
					  			'isi'	  => 'admin/pesan/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//masuk database
		}else{
			$i = $this->input;
			$data = array(			
									'no' 			=> $i->post('no'),
									'jenislayanan' 	=> $i->post('jenislayanan'),
									'harga' 		=> $i->post('harga'),
									);
			$this->Pesan_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diubah');
			redirect(base_url('admin/pesan'),'refresh');
		}
		//end database
	}

	//delete pesan
	public function delete($id_pesan)
	{
		$data = array('no ' => $id_pesan);
		$this->Pesan_model->delete('$data');
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/pesan'),'refresh');
	}
}  
