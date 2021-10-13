<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galhds_model extends CI_Model {

	public function __construct()
		{
			parent::__construct();
			$this->load->database();
			
		}	

		// Listing all galhds
		public function Listing()
		{
			$this->db->select('*');
			$this->db->from('galhdss');
			$this->db->order_by('id_galhds',' desc');
			$query = $this->db->get();
			return $query->result();
		}

		// Detail galhds
		public function detail($id_galhds)
		{
			$this->db->select('*');
			$this->db->from('galhdss');
			$this->db->where('id_galhds', $id_galhds);
			$this->db->order_by('id_galhds',' desc');
			$query = $this->db->get();
			return $query->row();
		}

		// Login galhds
		public function login($galhdsname,$password)
		{
			$this->db->select('*');
			$this->db->from('galhdss');
			$this->db->where(array(	'galhdsname'	=> $galhdsname,
									'password' 	=> SHA1($password)));
			$this->db->order_by('id_galhds',' desc');
			$query = $this->db->get();
			return $query->row();
		}


		//Tambah
		public function tambah($data)
		{
			$this->db->insert('galhdss', $data);
		}


		//Edit
		public function edit($data)
		{
			$this->db->where('id_galhds', $data['id_galhds']);
			$this->db->update('galhdss', $data);
		}


		//Delete
		
		public function delete($data)
		{
			$this->db->where('id_galhds', $data['id_galhds']);
			$this->db->delete('galhdss', $data);
		}

}

/* End of file Galhds_model.php */
/* Location: ./application/models/Galhds_model.php */