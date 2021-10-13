<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {
	// load model 
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pemesanan_model');
	}
	//data pesanan
	public function index()
	{
		$Pemesanan = $this->Pemesanan_model->listing();
		$data = array(			'title' => 'Data Pemesanan',
					  			'Pemesanan'  => $Pemesanan,
					  			'isi'	  => 'admin/pemesanan/list'
					 );
		$data['pesanan'] = $this->db->get('pemesanan')->result_array();
		
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

 //tambah pesan
	public function tambah()
	{
		//validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama','required',
			array('required' => '%s harus diisi'));

		$valid->set_rules('alamat','Alamat','required',
			array('required' 		=> '%s harus diisi'));

		$valid->set_rules('no_telp','no_telp','required',
			array('required' 		=> '%s harus diisi'));
			

		$valid->set_rules('email','email','required',
			array('required' 		=> '%s harus diisi'));

		$valid->set_rules('tgl_pernikahan','tgl_pernikahan','required',
			array('required' 		=> '%s harus diisi'));



		if($valid->run()===FALSE) { 
			//end validasi
		
		$data = array(			'title'   => 'Tambah pesanan',
					  			'isi'	  => 'admin/pemesanan/tambah');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//masuk database
		}else{
			$i = $this->input;
			$data = array(				'nama' 				=> $i->post('nama'),
										'alamat' 			=> $i->post('alamat'),
										'no_telp' 			=> $i->post('no_telp'),
										'email'				=>$i->post('email'),
										'pesanan'			=>$i->post('pesanan'),
										'tgl_pernikahan'  =>$i->post('tgl_pernikahan')
									);
			$this->Pemesanan_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/pemesanan'),'refresh');
		}
		//end database
	}

//kirim pesan
	public function kirim()
	{
		//validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama','required',
			array('required' => '%s harus diisi'));

		$valid->set_rules('alamat','Alamat','required',
			array('required' 		=> '%s harus diisi'));

		$valid->set_rules('no_telp','no_telp','required',
			array('required' 		=> '%s harus diisi'));
			

		$valid->set_rules('email','email','required',
			array('required' 		=> '%s harus diisi'));

		$valid->set_rules('tgl_pernikahan','tgl_pernikahan','required',
			array('required' 		=> '%s harus diisi'));



		if($valid->run()===FALSE) { 
			//end validasi
		
		$data = array(			'title'   => 'Kirim pesanan',
					  			'isi'	  => 'admin/pemesanan/tambah');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//masuk database
		}else{
			$i = $this->input;
			$data = array(				'nama' 				=> $i->post('nama'),
										'alamat' 			=> $i->post('alamat'),
										'no_telp' 			=> $i->post('no_telp'),
										'email'				=>$i->post('email'),
										'pesanan'			=>$i->post('pesanan'),
										'tgl_pernikahan'  =>$i->post('tgl_pernikahan')
									);
			$this->Pemesanan_model->kirim($data);
			$this->session->set_flashdata('sukses', 'Pesan telah Dikirim');
			redirect(base_url('berhasil'),'refresh'); 
		}
		//end database
	}
//delete pesanan
	public function delete($id_pesanan)
	{
		$where = array('id_pesanan' => $id_pesanan);
		$this->Pemesanan_model->delete($where, 'pemesanan'); 
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/Pemesanan'),'refresh');
	}
}
 