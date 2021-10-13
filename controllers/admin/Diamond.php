<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diamond extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Diamond_model');
	}

	//data diamond
	public function index()
	{
		$diamond = $this->Diamond_model->listing();
		$data = array('title' => 'Data Diamond',
					  			'diamond'  => $diamond,
					  			'isi'	  => 'admin/diamond/list'
					 );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//tambah diamond
	public function tambah()
	{
		//validasi input 
		$valid = $this->form_validation;

		$valid->set_rules('no','No','required',
			array('required' => '%s harus diisi'));

		$valid->set_rules('namapaket','Nama paket','required',
			array('required' => '%s harus diisi'));

		$valid->set_rules('harga','Harga','required',
			array('required' => '%s harus diisi'));

		$valid->set_rules('makeup','Makeup','required',
			array('required' => '%s harus diisi'));

		$valid->set_rules('dekorasi','Dekorasi','required',
			array('required' => '%s harus diisi'));

		$valid->set_rules('dokumentasi','Dokumentasi','required',
			array('required' => '%s harus diisi'));

		$valid->set_rules('sound','Sound','required',
			array('required' => '%s harus diisi')); 

		
		if($valid->run()) {
			$config['upload_path'] 		='./assets/upload/image/';
			$config['allowed_types']	='gif|jpg|png|jpeg';
			$config['max_size']			='2400';// dalam kb
			$config['max_width']		='2024';
			$congfig['max_height']		='2024';


		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('gambar')){
			//end validasi
		error_reporting(E_ALL ^ E_WARNING || E_NOTICE);
		$data = array(			'title'   => 'Tambah Diamond',
								'diamond' => $diamond,
								'error'   => $this->upload->display_errors(),
					  			'isi'	  => 'admin/diamond/tambah'
					  		);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//masuk database
		}else{
			$upload_gambar = array('upload_data'=> $this->upload->data());

			//create thumbnail gambar
			$config['image_library'] 	='gd2';
			$config['source_image']		='./assets/upload/image/'.$upload_gambar['upload_data']['file_name'];
			//lokasi folder thumbnail
			$config['new_image']		='./assets/upload/image/thumbs/';
			$config['create_thumb']		=TRUE;
			$confif['maintain_ratio']	=TRUE;
			$config['width']			=250; //pixel
			$config['height']			=250; //pixel
			$config['thumb_marker']		='';

			$this->load->library('image_lib',$config);

			$this->image_lib->resize();
			//end create thumbnail gambar
			$i = $this->input;
			$data = array(				'id_diamond' 		=> $i->post('no'),
										'namapaket' 		=> $i->post('namapaket'),
										'gambar'			=> $upload_gambar['upload_data']['file_name'],
										'harga' 			=> $i->post('harga'),
										'makeup' 			=> $i->post('makeup'),
										'dekorasi'   		=> $i->post('dekorasi'),
										'dokumentasi' 		=> $i->post('dokumentasi'),
										'sound'   			=> $i->post('sound')	
									);
			$this->Diamond_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/diamond'),'refresh');
		}}
		//end database
		$data = array( 'title'			=>'Tambah Diamond',
						'isi'			=>'admin/diamond/tambah',

					  );
			$this->load->view('admin/layout/wrapper',$data,FALSE);
	}


	//edit diamond
	public function edit($id_diamond)
	{
		$diamond = $this->Diamond_model->detail($id_diamond);

		//validasi input
		$valid = $this-> form_validation;
		$valid->set_rules('no','No','required',
			array('required' => '%s harus diisi'));

		$valid->set_rules('namapaket','Nama paket','required',
			array('required' => '%s harus diisi'));


		$valid->set_rules('harga','Harga','required',
			array('required' => '%s harus diisi'));

		$valid->set_rules('makeup','Makeup','required',
			array('required' => '%s harus diisi'));

		$valid->set_rules('dekorasi','Dekorasi','required',
			array('required' => '%s harus diisi'));

		$valid->set_rules('dekorasi','Paragraf3','required',
			array('required' => '%s harus diisi'));

		$valid->set_rules('sound','Sound','required',
			array('required' => '%s harus diisi')); 

		if($valid->run()===FALSE) {
			//end validasi

		$data = array('title' => 'Edit Diamond',
									'diamond'	=> $diamond,
					  			'isi'	  => 'admin/diamond/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//masuk database
		}else{
			$i = $this->input;
			$data = array(
										'id_diamond' 			=> $i->post('no'),
										'namapaket' 		=> $i->post('namapaket'),
										'harga' 			=> $i->post('harga'),
										'makeup' 			=> $i->post('makeup'),
										'dekorasi'   		=> $i->post('dekorasi'),
										'dekorasi' 			=> $i->post('dekorasi'),
										'sound'   			=> $i->post('sound')	
									);
			$this->Diamond_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diubah');
			redirect(base_url('admin/diamond'),'refresh');
		}
		//end database
	}

	//delete diamond
	public function delete($id_diamond)
	{
		$data = array('id_diamond' => $id_diamond);
		$this->Diamond_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/diamond'),'refresh');
	}
}
