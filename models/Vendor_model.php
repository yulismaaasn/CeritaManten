<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor_model extends CI_Model {

	public function __construct()
		{
			parent::__construct();
			$this->load->database();
			
		}	

		// Listing all vendor
		public function Listing()
		{
			$this->db->select('*');
			$this->db->from('vendor');
			$this->db->order_by('no',' desc');
			$query = $this->db->get();
			return $query->result();
		}
		//listing home
		public function home()
		{
			$this->db->select('*');
			$this->db->from('vendor');
			$this->db->order_by('no',' desc');
			$query = $this->db->get();
			return $query->result();

		}

		// Detail vendor
		public function detail($no)
		{
			$this->db->select('*');
			$this->db->from('vendor');
			$this->db->where('no', $no);
			$this->db->order_by('no',' desc');
			$query = $this->db->get();
			return $query->row();
		}



		//Tambah
		public function tambah($data)
		{
			$this->db->insert('vendor', $data);
		}


		//Edit
		public function edit($data)
		{
			$this->db->where('no', $data['no']);
			$this->db->update('vendor', $data); 
		} 


		//Delete
		
		public function delete($data)
		{
			$this->db->where('no', $vendor['no']);
			$this->db->delete('vendor', $vendor);
		}

}

/* End of file Vendor_model.php */
/* Location: ./application/models/Vendor_model.php */