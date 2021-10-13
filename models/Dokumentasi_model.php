<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokumentasi_model extends CI_Model {

	public function __construct()
		{
			parent::__construct();
			$this->load->database();
			
		}	

		// Listing all dokumentasi
		public function Listing()
		{
			$this->db->select('*');
			$this->db->from('dokumentasis');
			$this->db->order_by('id_dokumentasi',' desc');
			$query = $this->db->get();
			return $query->result();
		}
		//listing home
		public function home()
		{
			$this->db->select('*');
			$this->db->from('dokumentasis');
			$this->db->order_by('id_dokumentasi',' desc');
			$query = $this->db->get();
			return $query->result();

		}

		// Detail dokumentasi
		public function detail($id_dokumentasi)
		{
			$this->db->select('*');
			$this->db->from('dokumentasis');
			$this->db->where('id_dokumentasi', $id_dokumentasi);
			$this->db->order_by('id_dokumentasi',' desc');
			$query = $this->db->get();
			return $query->row();
		}

	

		//Tambah
		public function tambah($data)
		{
			$this->db->insert('dokumentasis', $data);
		}


		//Edit
		public function edit($data)
		{
			$this->db->where('id_dokumentasi', $data['id_dokumentasi']);
			$this->db->update('dokumentasis', $data);
		}


		//Delete
		
		public function delete($data)
		{
			$this->db->where('id_dokumentasi', $data['no']);
			$this->db->delete('dokumentasis', $data);
		}

}
 
/* End of file Dokumentasi_model.php */
/* Location: ./application/models/Dokumentasi_model.php */