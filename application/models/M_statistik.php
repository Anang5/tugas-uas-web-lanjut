<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Statistik extends CI_Model {
	public function getcorona()
	{
		return $this->db->get('chart')->result();

	}
}