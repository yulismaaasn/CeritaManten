<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Silver_model extends CI_Model {

	public function __construct()
		{
			parent::__construct();
			$this->load->database();
			
		}	

		// Listing all silver
		public function Listing()
		{
			$this->db->select('*');
			$this->db->from('silvers');
			$this->db->order_by('id_silver',' desc');
			$query = $this->db->get();
			return $query->result();
		}

		//listing home
		public function home()
		{
			$this->db->select('*');
			$this->db->from('silvers');
			$this->db->order_by('id_silver',' desc');
			$query = $this->db->get();
			return $query->result();

		}
		// Detail silver
		public function detail($id_silver)
		{
			$this->db->select('*');
			$this->db->from('silvers');
			$this->db->where('id_silver', $id_silver);
			$this->db->order_by('id_silver',' desc');
			$query = $this->db->get();
			return $query->row();
		}

		


		//Tambah
		public function tambah($data)
		{
			$this->db->insert('silvers', $data);
		}


		//Edit
		public function edit($data)
		{
			$this->db->where('id_silver', $data['id_silver']);
			$this->db->update('silvers', $data);
		}


		//Delete
		
		public function delete($data)
		{
			$this->db->where('id_silver', $data['id_silver']);
			$this->db->delete('silvers', $data);
		}

}

/* End of file Silver_model.php */
/* Location: ./application/models/Silver_model.php */