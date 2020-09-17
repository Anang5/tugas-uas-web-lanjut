<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Statistik extends CI_Controller {
public function __construct()
{
parent::__construct();
$this->load->model('M_statistik');
}
public function index()
{
$data['chart'] = $this->M_statistik->getCorona();
$this->load->view('statistik', $data);
}
}