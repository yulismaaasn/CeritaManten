<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan_model extends CI_Model {

	public function __construct()
		{
			parent::__construct();
			$this->load->database();
			
		}	

		// Listing all pesan
		public function Listing()
		{
			$this->db->select('*');
			$this->db->from('pesan');
			$this->db->order_by('no',' desc');
			$query = $this->db->get();
			return $query->result();
		}
		//listing home
		public function home()
		{
			$this->db->select('*');
			$this->db->from('pesan');
			$this->db->order_by('no',' desc');
			$query = $this->db->get();
			return $query->result();

		}

		// Detail pesan
		public function detail($no)
		{
			$this->db->select('*');
			$this->db->from('pesan');
			$this->db->where('no', $no);
			$this->db->order_by('no',' desc');
			$query = $this->db->get();
			return $query->row();
		}



		//Tambah
		public function tambah($data)
		{
			$this->db->insert('pesan', $data);
		}


		//Edit
		public function edit($data)
		{
			$this->db->where('no', $data['no']);
			$this->db->update('pesan', $data); 
		} 


		//Delete
		
		public function delete($data)
		{
			$this->db->where('no', $pesan['no']);
			$this->db->delete('pesan', $pesan);
		}

}

/* End of file Pesan_model.php */
/* Location: ./application/models/Pesan_model.php */