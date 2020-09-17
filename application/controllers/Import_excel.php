<?php
if (!defined('BASEPATH')) die ('No access');


class Import_excel extends CI_Controller
{
	
	function __construct()
	{
		parent:: __construct();
		$this->load->model('excel_model');
	}


	public function index()
	{
		$data = array(
			'datacorona' => $this->excel_model->readCorona()
		);

		$this->load->view('corona_excel', $data);
	}

	public function unggah()
	{
		$fileName = $_FILES['file']['name'];

        $config = array(
        	'upload_path' => './assets/'
        	,'allowed_types' => 'xls|xlsx|csv'
        	, 'max_size' => 10000
        );
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('file')) {
        $this->upload->display_errors();
        die();
        }
        $inputfileName ='./assets'.$fileName;


        try {
        	$inputfileType = PHPExcel_IOFactory::identify($inputfileName);
        	$objReader = PHPExcel_IOFactory::createReader($inputfileType);
        	$objPHPExcel = $objReader->load($inputfileName);
        	
        } catch (Exception $e) {
        	die('error');
        }

        $sheet = $objPHPExcel->getSheet(0);
        $highhestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();

        for ($row=2; $row <=$highhestRow ; $row++) { 
        	$rowData = $sheet->rangeToArray('A'.$row.':'.$hifhestColumn.$row,NULL,TRUE,FALSE);
        	$data = array(
        		'id'=>$rowData[0][0]
        		,'kecamatan'=>$rowData[0][1]
        		,'pp'=>$rowData[0][2]
        		,'odp'=>$rowData[0][3]
        		,'pdp'=>$rowData[0][4]
        		,'positif'=>$rowData[0][5]
        		
        	);
        	$this->db->insert('coronajepara',$data); 
        }
        redirect('');
	}
}