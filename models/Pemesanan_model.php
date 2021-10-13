<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan_model extends CI_Model 
{
	public function index()
	{
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');

		$pemesanan = array(
			'nama'  =>$nama,
			'alamat' =>$alamat,
			'no_telp' =>$no_telp,
			'email' =>$email,
			'pesanan' =>$pesanan,
			'tgl_pernikahan' =>$tgl_pernikahan,
		);
	$this->db->insert('pemesanan', $pemesanan);
	$id_pesanan = $this->db->insert_id();
		}
	
	public function __construct()
		{
			parent::__construct();
			$this->load->database();
			
		}	

		// Listing all gallery
		public function Listing()
		{
			$this->db->select('*');
			$this->db->from('pemesanan');
			$this->db->order_by('id_pesanan',' desc');
			$query = $this->db->get();
			return $query->result();
		}
		//listing home
		public function home()
		{
			$this->db->select('*');
			$this->db->from('pemesanan');
			$this->db->order_by('id_pesanan',' desc');
			$query = $this->db->get();
			return $query->result();

		}

		// Detail gallery
		public function detail($no)
		{
			$this->db->select('*');
			$this->db->from('pemesanan');
			$this->db->where('id_pesanan', $no);
			$this->db->order_by('no',' desc');
			$query = $this->db->get();
			return $query->row();
		}

		//Tambah
		public function tambah($data)
		{
			$this->db->insert('pemesanan', $data);
		} 
		//kirim
		public function Kirim($data)
		{
			$this->db->insert('pemesanan', $data);
		} 


		//Edit
		public function edit($data)
		{
	
			$this->db->where('nama', $data['nama']);
			$this->db->update('pemesanan', $data);
		}


		//Delete
		
		public function delete($where, $table)
		{
			$this->db->where($where);
			$this->db->delete($table);
		}
}
 

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */