<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_model extends CI_Model {

	public function __construct()
		{
			parent::__construct();
			$this->load->database();
			
		}	

		// Listing all produk
		public function Listing()
		{
			$this->db->select('*');
			$this->db->from('produk');
			$this->db->order_by('id_produk',' desc');
			$query = $this->db->get();
			return $query->result();
		}

		// Detail produk
		public function detail($id_produk)
		{
			$this->db->select('*');
			$this->db->from('produk');
			$this->db->where('id_produk', $id_produk);
			$this->db->order_by('id_produk',' desc');
			$query = $this->db->get();
			return $query->row();
		}

		// Login produk
		public function login($produkname,$password)
		{
			$this->db->select('*');
			$this->db->from('produk');
			$this->db->where(array(	'produkname'	=> $produkname,
									'password' 	=> SHA1($password)));
			$this->db->order_by('id_produk',' desc');
			$query = $this->db->get();
			return $query->row();
		}


		//Tambah
		public function tambah($data)
		{
			$this->db->insert('produk', $data);
		}


		//Edit
		public function edit($data)
		{
			$this->db->where('id_produk', $data['id_produk']);
			$this->db->update('produk', $data);
		}


		//Delete
		
		public function delete($data)
		{
			$this->db->where('id_produk', $data['id_produk']);
			$this->db->delete('produk', $data);
		}

}

/* End of file Produk_model.php */
/* Location: ./application/models/Produk_model.php */