<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Barang extends CI_Model {
	public function getBarang()
	{
		return $this->db->get('datacorona')->result();
	}

	


	public function hapus($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('datacorona');

	}


	
}
