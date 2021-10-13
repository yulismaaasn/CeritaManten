<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class Hds extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Hds_model');
	}

	//data hds
	public function index()
	{
		$hds = $this->Hds_model->listing();
		$data = array('title' => 'Data HDS',
					  			'hds'  => $hds,
					  			'isi'	  => 'admin/hds/list'
					 );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//tambah hds
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

		$data = array(			'title'   => 'Tambah HDS',
					  			'isi'	  => 'admin/hds/tambah');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//masuk database
		}else{
			$i = $this->input;
			$data = array(	
									'id_hds' 			=> $i->post('no'),
									'jenislayanan' 		=> $i->post('jenislayanan'),
									'harga' 			=> $i->post('harga'),
									);
			$this->Hds_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/hds'),'refresh');
		}
		//end database
	}


	//edit hds
	public function edit($id_hds)
	{
		$hds = $this->Hds_model->detail($id_hds);

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

		$data = array('title' => 'Edit HDS',
									'hds'	=> $hds,
					  			'isi'	  => 'admin/hds/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//masuk database
		}else{
			$i = $this->input;
			$data = array(				'id_hds'			=> $id_hds,
										'id_hds' 			=> $i->post('no'),
										'jenislayanan' 		=> $i->post('jenislayanan'),
										'harga' 			=> $i->post('harga'),
									);
			$this->Hds_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diubah');
			redirect(base_url('admin/hds'),'refresh');
		}
		//end database
	}

	//delete hds
	public function delete($id_hds)
	{
		$data = array('id_hds' => $id_hds);
		$this->Hds_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/hds'),'refresh');
	}
}
