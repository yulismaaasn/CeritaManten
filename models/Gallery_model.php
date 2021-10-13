<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery_model extends CI_Model {

	public function __construct()
		{
			parent::__construct();
			$this->load->database();
			
		}	

		// Listing all gallery
		public function Listing()
		{
			$this->db->select('*');
			$this->db->from('gallery');
			$this->db->order_by('no',' desc');
			$query = $this->db->get();
			return $query->result();
		}
		//listing home
		public function home()
		{
			$this->db->select('*');
			$this->db->from('gallery');
			$this->db->order_by('no',' desc');
			$query = $this->db->get();
			return $query->result();

		}

		// Detail gallery
		public function detail($no)
		{
			$this->db->select('*');
			$this->db->from('gallery');
			$this->db->where('no', $no);
			$this->db->order_by('no',' desc');
			$query = $this->db->get();
			return $query->row();
		}

		//Tambah
		public function tambah($data)
		{
			$this->db->insert('gallery', $data);
		} 


		//Edit
		public function edit($data)
		{
			$this->db->where('no', $data['no']);
			$this->db->update('gallery', $data);
		}


		//Delete
		
		public function delete($data)
		{
			$this->db->where('id_gallery', $data['id_gallery']);
			$this->db->delete('gallery', $data);
		}

}

/* End of file Gallery_model.php */
/* Location: ./application/models/Gallery_model.php */