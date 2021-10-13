<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hds_model extends CI_Model {

	public function __construct()
		{
			parent::__construct();
			$this->load->database();
			
		}	

		// Listing all hds
		public function Listing()
		{
			$this->db->select('*');
			$this->db->from('hdss');
			$this->db->order_by('id_hds',' desc');
			$query = $this->db->get();
			return $query->result();
		}
		//listing home
		public function home()
		{
			$this->db->select('*');
			$this->db->from('hdss');
			$this->db->order_by('id_hds',' desc');
			$query = $this->db->get();
			return $query->result();

		}
		// Detail hds
		public function detail($id_hds)
		{
			$this->db->select('*');
			$this->db->from('hdss');
			$this->db->where('id_hds', $id_hds);
			$this->db->order_by('id_hds',' desc');
			$query = $this->db->get();
			return $query->row();
		}


		//Tambah
		public function tambah($data)
		{
			$this->db->insert('hdss', $data);
		}


		//Edit
		public function edit($data)
		{
			$this->db->where('id_hds', $data['id_hds']);
			$this->db->update('hdss', $data);
		}


		//Delete
		
		public function delete($data)
		{
			$this->db->where('id_hds', $data['id_hds']);
			$this->db->delete('hdss', $data);
		}

}

/* End of file Hds_model.php */
/* Location: ./application/models/Hds_model.php */