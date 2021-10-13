<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diamond_model extends CI_Model {

	public function __construct()
		{
			parent::__construct();
			$this->load->database();
			
		}	

		// Listing all diamond
		public function Listing()
		{
			$this->db->select('*');
			$this->db->from('diamonds');
			$this->db->order_by('id_diamond',' desc');
			$query = $this->db->get();
			return $query->result();
		}
		//listing home
		public function home()
		{
			$this->db->select('*');
			$this->db->from('diamonds');
			$this->db->order_by('id_diamond',' desc');
			$query = $this->db->get();
			return $query->result();

		}

		// Detail diamond
		public function detail($id_diamond)
		{
			$this->db->select('*');
			$this->db->from('diamonds');
			$this->db->where('id_diamond', $id_diamond);
			$this->db->order_by('id_diamond',' desc');
			$query = $this->db->get();
			return $query->row();
		}

	

		//Tambah
		public function tambah($data)
		{
			$this->db->insert('diamonds', $data);
		}


		//Edit
		public function edit($data)
		{
			$this->db->where('id_diamond', $data['id_diamond']);
			$this->db->update('diamonds', $data);
		}


		//Delete
		
		public function delete($data)
		{
			$this->db->where('id_diamond', $data['id_diamond']);
			$this->db->delete('diamonds', $data);
		}

} 

/* End of file Diamond_model.php */
/* Location: ./application/models/Diamond_model.php */