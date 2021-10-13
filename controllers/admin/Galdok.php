<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galdok extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Galdok_model');
	}

	//data galdok
	public function index()
	{
		$galdok = $this->Galdok_model->listing();
		$data = array('title' => 'Data Galdok',
					  			'galdok'  => $galdok,
					  			'isi'	  => 'admin/galdok/list'
					 );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//tambah galdok
	public function tambah()
	{
		
		//validasi input
		$valid = $this->form_validation;

		$valid->set_rules('no','No','required',
			array('required' => '%s harus diisi'));

		$valid->set_rules('keterangan','Keterangan','required',
			array('required' 		=> '%s harus diisi'));
				    


		if($valid->run()) {
			$config['upload_path'] 		='./assets/upload/image/';
			$config['allowed_types']	='.gif|jpg|png|jpeg';
			$config['max_size']			='2400';// dalam kb
			$config['max_width']		='2024';
			$congfig['max_height']		='2024';


		$this->load->library('upload',$config);
		if( ! $this->upload->do_upload('gambar')){
		
		//end validasi
		error_reporting(E_ALL ^ E_WARNING || E_NOTICE);
		$data = array(			'title'   => 'Tambah Galdok',
								'galdok' => $galdok,
								'error'   => $this->upload->display_errors(),
					  			'isi'	  => 'admin/galdok/tambah'
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
			$data = array(	//disimpan nama file gambar
										'id_galdok' 		=> $i->post('no'),
										'gambar' 		=> $upload_gambar['upload_data']['file_name'],
										'keterangan' 		=> $i->post('keterangan'),
									);
			$this->Galdok_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/galdok'),'refresh');
		}}
		//end database
		$data = array( 'title'			=>'Tambah Galdok',
						'isi'			=>'admin/galdok/tambah',

					  );
			$this->load->view('admin/layout/wrapper',$data,FALSE);	

}
	//edit galdok
	public function edit($id_galdok)
	{
		$galdok = $this->Galdok_model->detail($id_galdok);

		//validasi input
		$valid = $this->form_validation;

		$valid->set_rules('id_galdok','No','required',
			array('required' => '%s harus diisi'));

		$valid->set_rules('keterangan','Keterangan','required',
			array('required' => '%s harus diisi'));

		if($valid->run()===FALSE) {
			//end validasi

		$data = array('title' => 'Edit Galdok',
									'galdok'	=> $galdok,
					  			'isi'	  => 'admin/galdok/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//masuk database
		}else{
			$i = $this->input;
			$data = array(				'id_galdok' 			=> $i->post('no'),
										'keterangan' 		=> $i->post('keterangan'),
									);
			$this->Galdok_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diubah');
			redirect(base_url('admin/galdok'),'refresh');
		}
		//end database
	}

	//delete galdok
	public function delete($id_galdok)
	{
		$data = array('id_galdok' => $id_galdok);
		$this->Galdok_model->delete('$data');
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/galdok'),'refresh');
	}
}
