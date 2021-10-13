<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Produk_model');
	}

	//data produk
	public function index()
	{
		$produk = $this->Produk_model->listing();
		$data = array('title' => 'Data Produk',
					  			'produk'  => $produk,
					  			'isi'	  => 'admin/produk/list'
					 );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//tambah produk
	public function tambah()
	{
		//validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama lengkap','required',
			array('required' => '%s harus diisi'));

		$valid->set_rules('email','Email','required|valid_email',
			array('required' 		=> '%s harus diisi',
				    'valid_email' 	=> '%s tidak valid'));

		$valid->set_rules('produkname','Produkname','required|min_length[6]|max_length[32]|is_unique[produk.produkname]',
			array('required' 		=> '%s harus diisi',
				    'min_length' 	=> '%s minimal 6 karakter',
				    'max_length'	=> '%s maksimal 32 karakter',
				    'is_unique' 	=> '%s sudah ada. Buat produkname baru.'));

		$valid->set_rules('password','Password','required',
			array('required' => '%s harus diisi'));


		if($valid->run()===FALSE) {
			//end validasi

		$data = array(			'title'   => 'Tambah Produk',
					  			'isi'	  => 'admin/produk/tambah');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//masuk database
		}else{
			$i = $this->input;
			$data = array(				'nama' 			=> $i->post('nama'),
										'email' 		=> $i->post('email'),
										'produkname' 		=> $i->post('produkname'),
										'password' 		=> $i->post('password'),
										'akses_level'   => $i->post('akses_level')
									);
			$this->produk_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/produk'),'refresh');
		}
		//end database
	}


	//edit produk
	public function edit($id_produk)
	{
		$produk = $this->produk_model->detail($id_produk);

		//validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama lengkap','required',
			array('required' => '%s harus diisi'));

		$valid->set_rules('email','Email','required|valid_email',
			array('required' 			=> '%s harus diisi',
				    'valid_email' 	=> '%s tidak valid'));

		$valid->set_rules('password','Password','required',
			array('required' => '%s harus diisi'));

		if($valid->run()===FALSE) {
			//end validasi

		$data = array('title' => 'Edit Produk',
									'produk'	=> $produk,
					  			'isi'	  => 'admin/produk/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//masuk database
		}else{
			$i = $this->input;
			$data = array(				'id_produk'		=> $id_produk,
										'nama' 			=> $i->post('nama'),
										'email' 		=> $i->post('email'),
										'produkname' 		=> $i->post('produkname'),
										'password' 		=> $i->post('password'),
										'akses_level'   => $i->post('akses_level')
									);
			$this->produk_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diubah');
			redirect(base_url('admin/produk'),'refresh');
		}
		//end database
	}

	//delete produk
	public function delete($id_produk)
	{
		$data = array('id_produk' => $id_produk);
		$this->produk_mdel->delete('$data');
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/produk'),'refresh');
	}
}
