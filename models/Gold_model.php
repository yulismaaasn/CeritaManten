<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gold_model extends CI_Model {

	public function __construct()
		{
			parent::__construct();
			$this->load->database();
			
		}	

		// Listing all gold
		public function Listing()
		{
			$this->db->select('*');
			$this->db->from('golds');
			$this->db->order_by('id_gold',' desc');
			$query = $this->db->get();
			return $query->result();
		}
		//listing home
		public function home()
		{
			$this->db->select('*');
			$this->db->from('golds');
			$this->db->order_by('id_gold',' desc');
			$query = $this->db->get();
			return $query->result();

		}
		// Detail gold
		public function detail($id_gold)
		{
			$this->db->select('*');
			$this->db->from('golds');
			$this->db->where('id_gold', $id_gold);
			$this->db->order_by('id_gold',' desc');
			$query = $this->db->get();
			return $query->row();
		}

		// Login gold
		public function login($goldname,$password)
		{
			$this->db->select('*');
			$this->db->from('golds');
			$this->db->where(array(	'goldname'	=> $goldname,
									'password' 	=> SHA1($password)));
			$this->db->order_by('id_gold',' desc');
			$query = $this->db->get();
			return $query->row();
		}


		//Tambah
		public function tambah($data)
		{
			$this->db->insert('golds', $data);
		}


		//Edit
		public function edit($data)
		{
			$this->db->where('id_gold', $data['id_gold']);
			$this->db->update('golds', $data);
		}


		//Delete
		
		public function delete($data)
		{
			$this->db->where('id_gold', $data['id_gold']);
			$this->db->delete('golds', $data);
		}

}

/* End of file Gold_model.php */
/* Location: ./application/models/Gold_model.php */