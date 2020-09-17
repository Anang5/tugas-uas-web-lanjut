<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_barang'); 
		$this->load->model('M_statistik'); 
	}

	public function index()
	{
		$data['datacorona'] = $this->M_barang->getBarang();
		 $data['datacorona'] = $this->M_statistik->getCorona();
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('admin/dashboard', $data);
		$this->load->view('template/footer');
	}


	public function tambah()
	{

		$data = array(
			 // 'id' => $this->input->post('id'),
			'kecamatan' => $this->input->post('kecamatan'),
			'pp' => $this->input->post('pp'),
			'odp' => $this->input->post('odp'),
			'otg' => $this->input->post('otg'),
			'pdp' => $this->input->post('pdp'),
			'positif' => $this->input->post('positif'),

	);

		$this->db->insert('datacorona', $data);
		$this->session->set_flashdata('info', 'Tambah Data Barang Berhasil !');
		redirect('dashboard','refresh');
	}



	public function hapus($id)
	{
		
		$this->M_barang->hapus($id);
		$this->session->set_flashdata('info', 'Data Berhasil Di Hapus' );
		redirect('dashboard','refresh');
	}

	public function datacorona()
	{
		
		 $data['datacorona'] = $this->M_statistik->getCorona();
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('admin/dashboard', $data);
		$this->load->view('template/footer');
	}
	public function update()
	{

		$data = array(
			 // 'id' => $this->input->post('id'),
			'kecamatan' => $this->input->post('kecamatan'),
			'pp' => $this->input->post('pp'),
			'odp' => $this->input->post('odp'),
			'otg' => $this->input->post('otg'),
			'pdp' => $this->input->post('pdp'),
			'positif' => $this->input->post('positif'),

		);

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('datacorona', $data);
		$this->session->set_flashdata('info', 'Update Data  Berhasil !');
		redirect('dashboard','refresh');
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
        $inputfileName ='./assets/'.$fileName;


        try {
        	$inputfileType = PHPExcel_IOFactory::identify($inputfileName);
        	$objReader = PHPExcel_IOFactory::createReader($inputfileType);
        	$objPHPExcel = $objReader->load($inputfileName);
        	
        } catch (Exception $e) {
        	// die('error');
        }

        $sheet = $objPHPExcel->getSheet(0);
        $highhestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();

        for ($row=2; $row <=$highhestRow ; $row++) { 
        	$rowData = $sheet->rangeToArray('A'.$row.':'.$highestColumn.$row,NULL,TRUE,FALSE);
        	$data = array(
        		'id'=>''
        		,'kecamatan'=>$rowData[0][1]
        		,'pp'=>$rowData[0][2]
        		,'odp'=>$rowData[0][3]
        		,'otg'=>$rowData[0][4]
        		,'pdp'=>$rowData[0][5]
        		,'positif'=>$rowData[0][6]
        		
        	);
        	$this->db->insert('datacorona',$data); 
        }
        redirect('');
	}

	public function import()
	{
		$data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

		if ($data['user'] == null) {
            $this->session->set_flashdata('validlogin', 'Anda belum login!');
            redirect('covid/login','refresh');
        }else{
			$fileName  = $_FILES['file']['name'];
			$config = array(
				'upload_path' => './assets/fileupload/',
				'allowed_types' => 'xls|xlsx|csv',
				'max_size' => 10000 
			);
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('file')) {
				$this->upload->display_errors();
				redirect('covid/dashboard','refresh'); die();
			}

			$inputFileName = './assets/fileupload/'.$fileName;

			try {
				$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
				$objReader = PHPExcel_IOFactory::createReader($inputFileType);
				$objPHPExcel = $objReader->load($inputFileName);
			} catch (Exception $e) {
				// die('error');
			}

			$sheet = $objPHPExcel->getSheet(0);
			$highestRow = $sheet->getHighestRow();
			$highestColumn = $sheet->getHighestColumn();

			for ($row = 2; $row <= $highestRow; $row++){
				$rowData = $sheet->rangeToArray('A'.$row.':'.$highestColumn.$row, NULL, TRUE, FALSE);
				$data = array(
					'id' => '',
					'kecamatan' => strtolower($rowData[0][1]),
					'pp' => $rowData[0][2],
					'odp' => $rowData[0][3],
					'pdp' => $rowData[0][4],
					'otg' => $rowData[0][5],
					'positif' => $rowData[0][6],
					'date' => time()
				);
				$this->db->insert('tbl_covid', $data);
			}
			$this->session->set_flashdata('berhasil', 'diimport');
			redirect('covid/dashboard','refresh');
		}
	}

	public function export()
	{
		$ikidata = $this->M_barang->getBarang();

		$object = new PHPExcel();

		$object->getProperties()->setCreator("Anang Ma'ruf");
		$object->getProperties()->setLastModifiedBy("Anang Ma'ruf");
		$object->getProperties()->setTitle('Data Covid-19 Jepara');

		$object->setActiveSheetIndex(0);
		$object->getActiveSheet()->setCellValue('A1', 'No');
		$object->getActiveSheet()->setCellValue('B1', 'Kecamatan');
		$object->getActiveSheet()->setCellValue('C1', 'PP');
		$object->getActiveSheet()->setCellValue('D1', 'ODP');
		$object->getActiveSheet()->setCellValue('E1', 'PDP');
		$object->getActiveSheet()->setCellValue('F1', 'OTG');
		$object->getActiveSheet()->setCellValue('G1', 'Positif');
		

		$row = 2;
		$no = 1;
		foreach ($ikidata as $data => $d) {
			$object->getActiveSheet()->setCellValue('A'.$row, $no++);
			$object->getActiveSheet()->setCellValue('B'.$row, $d->kecamatan);
			$object->getActiveSheet()->setCellValue('C'.$row, $d->pp);
			$object->getActiveSheet()->setCellValue('D'.$row, $d->odp);
			$object->getActiveSheet()->setCellValue('E'.$row, $d->pdp);
			$object->getActiveSheet()->setCellValue('F'.$row, $d->otg);
			$object->getActiveSheet()->setCellValue('G'.$row, $d->positif);
			// $object->getActiveSheet()->setCellValue('H'.$row, date('d-M-Y, H:i', $d->date).' WIB');

			$row++;
		}

		$filename = "Data_COVID-19_Jepara".'.xlsx';
		$object->getActiveSheet()->setTitle('Data COVID-19 Jepara');

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheet.sheet');
		header('Content-Disposition:attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');

		$writer = PHPExcel_IOFactory::createwriter($object, 'Excel2007');
		$writer->save('php://output');
	}
}
