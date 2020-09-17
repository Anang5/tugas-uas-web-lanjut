<?php 
if(!defined('BASEPATH')) die('No access');


/**
 * 
 */
class Excel_model extends CI_Model
{
	
	public function readCorona()
	{
		$qry = $this->db->get('datacorona');
		$data = $qry->result_array();
		$qry->free_result();

		return $data;
	}
}