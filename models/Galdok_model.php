<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galdok_model extends CI_Model {

	public function __construct()
		{
			parent::__construct();
			$this->load->database();
			
		}	

		// Listing all galdok
		public function Listing()
		{
			$this->db->select('*');
			$this->db->from('galdoks');
			$this->db->order_by('id_galdok',' desc');
			$query = $this->db->get();
			return $query->result();
		}

		// Detail galdok
		public function detail($id_galdok)
		{
			$this->db->select('*');
			$this->db->from('galdoks');
			$this->db->where('id_galdok', $id_galdok);
			$this->db->order_by('id_galdok',' desc');
			$query = $this->db->get();
			return $query->row();
		}

		// Login galdok
		public function login($galdokname,$password)
		{
			$this->db->select('*');
			$this->db->from('galdoks');
			$this->db->where(array(	'galdokname'	=> $galdokname,
									'password' 	=> SHA1($password)));
			$this->db->order_by('id_galdok',' desc');
			$query = $this->db->get();
			return $query->row();
		}


		//Tambah
		public function tambah($data)
		{
			$this->db->insert('galdoks', $data);
		}


		//Edit
		public function edit($data)
		{
			$this->db->where('id_galdok', $data['id_galdok']);
			$this->db->update('galdoks', $data);
		}


		//Delete
		
		public function delete($data)
		{
			$this->db->where('id_galdok', $data['id_galdok']);
			$this->db->delete('galdoks', $data);
		}

}

/* End of file Galdok_model.php */
/* Location: ./application/models/Galdok_model.php */