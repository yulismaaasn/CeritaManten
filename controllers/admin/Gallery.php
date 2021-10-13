<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Gallery_model');
	}

	//data gallery
	public function index()
	{
		$gallery = $this->Gallery_model->listing();

		$data = array(			'title' => 'Data Gallery',
					  			'gallery'  => $gallery,
					  			'isi'	  => 'admin/gallery/list'
					 );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//tambah gallery
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
			$config['allowed_types']	='gif|jpg|png|jpeg';
			$config['max_size']			='2400';// dalam kb
			$config['max_width']		='2024';
			$congfig['max_height']		='2024';


		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('gambar')){
		
		//end validasi
		$data = array(			'title'   => 'Tambah Gallery',
								'gallery' => $gallery,
								'error'   => $this->upload->display_errors(),
					  			'isi'	  => 'admin/gallery/tambah'
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

										'gambar' 		=> $upload_gambar['upload_data']['file_name'],
										'keterangan' 		=> $i->post('keterangan'),
									);
			$this->Gallery_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah diTambah');
			redirect(base_url('admin/gallery'),'refresh');
		}}
		//end database
		$data = array( 'title'			=>'Tambah Gallery',
						'isi'			=>'admin/gallery/tambah',

					  );
			$this->load->view('admin/layout/wrapper',$data,FALSE);	
	}


	//edit gallery
	public function edit($id_gallery)
	{
		//ambil data galeri diedit
		$gallery = $this->Gallery_model->detail($id_gallery);

		//validasi input
		$valid = $this->form_validation;

		$valid->set_rules('no','No','required',
			array('required' => '%s harus diisi'));

		$valid->set_rules('keterangan','Keterangan','required',
			array('required' => '%s harus diisi'));

		if($valid->run()===FALSE) {
			//end validasi

		$data = array(				'title' => 'Edit Gallery',
									'gallery'	=> $gallery,
					  				'isi'	  => 'admin/gallery/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//masuk database
		}else{
			$i = $this->input;
			$data = array(				'id_gallery'		=> $id_gallery,
										'no' 			=> $i->post('no'),
										'keterangan' 		=> $i->post('keterangan'),

									);
			$this->Gallery_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diubah');
			redirect(base_url('admin/gallery'),'refresh');
		}
		//end database
	}

	//delete gallery
	public function delete($id_gallery)
	{
		$data = array('id_gallery' => $id_gallery);
		$this->Gallery_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/gallery'),'refresh');
	}
}
