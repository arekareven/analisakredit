<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pdf_scoring2 extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		//$this->load->model('m_usulan');
		$this->load->library('Pdf'); // MEMANGGIL LIBRARY YANG KITA BUAT TADI
	}

	function index()
	{
		
		$pdf = new FPDF('P', 'mm', 'A4');
		$pdf->SetAutoPageBreak(false);
		// membuat halaman baru
		$pdf->AddPage();
		// margin
		$pdf->SetMargins(10, 10, 10);

		$pdf->SetFont('Times', 'B', 12);
		$pdf->Cell(79, 5.5, 'Lembar Disposisi', 0, 1, '');		
		$pdf->Cell(20,6,'',0,1);
		
		$pdf->SetFillColor(220,220,220);
		$pdf->Cell(10,6,'No',1,0,'C',true);
		$pdf->Cell(35,6,'5 - C',1,0,'C',true);
		$pdf->Cell(65,6,'Aspek & Faktor',1,0,'C',true);
		$pdf->Cell(15,6,'Nilai',1,0,'C',true);
		$pdf->Cell(15,6,'Bobot',1,0,'C',true);
		$pdf->Cell(15,6,'Score',1,0,'C',true);
		$pdf->Cell(35,6,'Keterangan',1,1,'C',true);
		
		$pdf->SetFont('Times', '', 12);
		$id_lb = $_GET['id_lb'];
		$scoring = $this->db->get_where('pengajuan', array('id_lb' => $id_lb))->result();
		foreach ($scoring as $data) {

			$pdf->Cell(10,6,'1',1,0,'C');
			$pdf->Cell(35,6,'Character',1,0,'C');
			$pdf->Cell(65,6,'- Iktikad thdp kewajiban',1,0);
			$pdf->Cell(15,6,$data->itk_nilai,1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(35,6,'Keterangan',1,1);

			$pdf->Cell(10,6,'',1,0,'C');
			$pdf->Cell(35,6,'',1,0,'C');
			$pdf->Cell(65,6,'- Motivasi usaha',1,0);
			$pdf->Cell(15,6,$data->mu_nilai,1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(35,6,'Keterangan',1,1);

			$pdf->Cell(10,6,'',1,0,'C');
			$pdf->Cell(35,6,'',1,0,'C');
			$pdf->Cell(65,6,'- Kepercayaan diri',1,0);
			$pdf->Cell(15,6,$data->kd_nilai,1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(35,6,'Keterangan',1,1);

			$pdf->Cell(10,6,'',1,0,'C');
			$pdf->Cell(35,6,'',1,0,'C');
			$pdf->Cell(65,6,'- Keharmonisan keluarga',1,0);
			$pdf->Cell(15,6,$data->kk_nilai,1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(35,6,'Keterangan',1,1);

			$pdf->Cell(10,6,'',1,0,'C');
			$pdf->Cell(35,6,'',1,0,'C');
			$pdf->Cell(65,6,'- Aktivitas sosial',1,0);
			$pdf->Cell(15,6,$data->as_nilai,1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(35,6,'Keterangan',1,1);

			$pdf->Cell(10,6,'',1,0,'C');
			$pdf->Cell(35,6,'',1,0,'C');
			$pdf->Cell(65,6,'- Aktivitas keagamaan',1,0);
			$pdf->Cell(15,6,$data->ak_nilai,1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(35,6,'Keterangan',1,1);

			$pdf->Cell(10,6,'',1,0,'C');
			$pdf->Cell(35,6,'',1,0,'C');
			$pdf->Cell(65,6,'- Temperamen',1,0);
			$pdf->Cell(15,6,$data->t_nilai,1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(35,6,'Keterangan',1,1);

			$pdf->Cell(10,6,'',1,0,'C');
			$pdf->Cell(35,6,'',1,0,'C');
			$pdf->Cell(65,6,'- Hub. pihak terkait',1,0);
			$pdf->Cell(15,6,$data->hpt_nilai,1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(35,6,'Keterangan',1,1);

			$pdf->Cell(10,6,'',1,0,'C');
			$pdf->Cell(35,6,'',1,0,'C');
			$pdf->Cell(65,6,'- Tingkat kepatuhan',1,0);
			$pdf->Cell(15,6,$data->tk_nilai,1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(35,6,'Keterangan',1,1);
			
			$pdf->SetFont('Times', 'B', 12);
			$pdf->Cell(10,6,'',1,0,'C');
			$pdf->Cell(35,6,'',1,0,'C');
			$pdf->Cell(65,6,'Sub Jumlah',1,0,'C');
			$pdf->Cell(15,6,$data->jumlah,1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(35,6,'Keterangan',1,1);
			
			$pdf->SetFont('Times', '', 12);
			$pdf->Cell(10,6,'',1,0,'C');
			$pdf->Cell(35,6,'',1,0,'C');
			$pdf->Cell(65,6,'- Motivasi usaha',1,0);
			$pdf->Cell(15,6,$data->mu_nilai,1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(35,6,'Keterangan',1,1);

			$pdf->Cell(10,6,'',1,0,'C');
			$pdf->Cell(35,6,'',1,0,'C');
			$pdf->Cell(65,6,'- Motivasi usaha',1,0);
			$pdf->Cell(15,6,$data->mu_nilai,1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(35,6,'Keterangan',1,1);

			$pdf->Cell(10,6,'',1,0,'C');
			$pdf->Cell(35,6,'',1,0,'C');
			$pdf->Cell(65,6,'- Motivasi usaha',1,0);
			$pdf->Cell(15,6,$data->mu_nilai,1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(35,6,'Keterangan',1,1);

			$pdf->Cell(10,6,'',1,0,'C');
			$pdf->Cell(35,6,'',1,0,'C');
			$pdf->Cell(65,6,'- Motivasi usaha',1,0);
			$pdf->Cell(15,6,$data->mu_nilai,1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(35,6,'Keterangan',1,1);

			$pdf->Cell(10,6,'',1,0,'C');
			$pdf->Cell(35,6,'',1,0,'C');
			$pdf->Cell(65,6,'- Motivasi usaha',1,0);
			$pdf->Cell(15,6,$data->mu_nilai,1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(35,6,'Keterangan',1,1);

			$pdf->Cell(10,6,'',1,0,'C');
			$pdf->Cell(35,6,'',1,0,'C');
			$pdf->Cell(65,6,'- Motivasi usaha',1,0);
			$pdf->Cell(15,6,$data->mu_nilai,1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(35,6,'Keterangan',1,1);

			$pdf->Cell(10,6,'',1,0,'C');
			$pdf->Cell(35,6,'',1,0,'C');
			$pdf->Cell(65,6,'- Motivasi usaha',1,0);
			$pdf->Cell(15,6,$data->mu_nilai,1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(35,6,'Keterangan',1,1);

			$pdf->Cell(10,6,'',1,0,'C');
			$pdf->Cell(35,6,'',1,0,'C');
			$pdf->Cell(65,6,'- Motivasi usaha',1,0);
			$pdf->Cell(15,6,$data->mu_nilai,1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(35,6,'Keterangan',1,1);

			$pdf->Cell(10,6,'',1,0,'C');
			$pdf->Cell(35,6,'',1,0,'C');
			$pdf->Cell(65,6,'- Motivasi usaha',1,0);
			$pdf->Cell(15,6,$data->mu_nilai,1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(35,6,'Keterangan',1,1);

			$pdf->Cell(10,6,'',1,0,'C');
			$pdf->Cell(35,6,'',1,0,'C');
			$pdf->Cell(65,6,'- Motivasi usaha',1,0);
			$pdf->Cell(15,6,$data->mu_nilai,1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(35,6,'Keterangan',1,1);

			$pdf->Cell(10,6,'',1,0,'C');
			$pdf->Cell(35,6,'',1,0,'C');
			$pdf->Cell(65,6,'- Motivasi usaha',1,0);
			$pdf->Cell(15,6,$data->mu_nilai,1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(35,6,'Keterangan',1,1);

			$pdf->Cell(10,6,'',1,0,'C');
			$pdf->Cell(35,6,'',1,0,'C');
			$pdf->Cell(65,6,'- Motivasi usaha',1,0);
			$pdf->Cell(15,6,$data->mu_nilai,1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(35,6,'Keterangan',1,1);

			$pdf->Cell(10,6,'',1,0,'C');
			$pdf->Cell(35,6,'',1,0,'C');
			$pdf->Cell(65,6,'- Motivasi usaha',1,0);
			$pdf->Cell(15,6,$data->mu_nilai,1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(35,6,'Keterangan',1,1);

			$pdf->Cell(10,6,'',1,0,'C');
			$pdf->Cell(35,6,'',1,0,'C');
			$pdf->Cell(65,6,'- Motivasi usaha',1,0);
			$pdf->Cell(15,6,$data->mu_nilai,1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(35,6,'Keterangan',1,1);

			$pdf->Cell(10,6,'',1,0,'C');
			$pdf->Cell(35,6,'',1,0,'C');
			$pdf->Cell(65,6,'- Motivasi usaha',1,0);
			$pdf->Cell(15,6,$data->mu_nilai,1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(35,6,'Keterangan',1,1);

			$pdf->Cell(10,6,'',1,0,'C');
			$pdf->Cell(35,6,'',1,0,'C');
			$pdf->Cell(65,6,'- Motivasi usaha',1,0);
			$pdf->Cell(15,6,$data->mu_nilai,1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(35,6,'Keterangan',1,1);

			$pdf->Cell(10,6,'',1,0,'C');
			$pdf->Cell(35,6,'',1,0,'C');
			$pdf->Cell(65,6,'- Motivasi usaha',1,0);
			$pdf->Cell(15,6,$data->mu_nilai,1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(35,6,'Keterangan',1,1);

			$pdf->Cell(10,6,'',1,0,'C');
			$pdf->Cell(35,6,'',1,0,'C');
			$pdf->Cell(65,6,'- Motivasi usaha',1,0);
			$pdf->Cell(15,6,$data->mu_nilai,1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(35,6,'Keterangan',1,1);

			$pdf->Cell(10,6,'',1,0,'C');
			$pdf->Cell(35,6,'',1,0,'C');
			$pdf->Cell(65,6,'- Motivasi usaha',1,0);
			$pdf->Cell(15,6,$data->mu_nilai,1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(35,6,'Keterangan',1,1);

			$pdf->Cell(10,6,'',1,0,'C');
			$pdf->Cell(35,6,'',1,0,'C');
			$pdf->Cell(65,6,'- Motivasi usaha',1,0);
			$pdf->Cell(15,6,$data->mu_nilai,1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(35,6,'Keterangan',1,1);

			$pdf->Cell(10,6,'',1,0,'C');
			$pdf->Cell(35,6,'',1,0,'C');
			$pdf->Cell(65,6,'- Motivasi usaha',1,0);
			$pdf->Cell(15,6,$data->mu_nilai,1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(35,6,'Keterangan',1,1);

			$pdf->Cell(10,6,'',1,0,'C');
			$pdf->Cell(35,6,'',1,0,'C');
			$pdf->Cell(65,6,'- Motivasi usaha',1,0);
			$pdf->Cell(15,6,$data->mu_nilai,1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(35,6,'Keterangan',1,1);

			$pdf->Cell(10,6,'',1,0,'C');
			$pdf->Cell(35,6,'',1,0,'C');
			$pdf->Cell(65,6,'- Motivasi usaha',1,0);
			$pdf->Cell(15,6,$data->mu_nilai,1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(35,6,'Keterangan',1,1);

			$pdf->Cell(10,6,'',1,0,'C');
			$pdf->Cell(35,6,'',1,0,'C');
			$pdf->Cell(65,6,'- Motivasi usaha',1,0);
			$pdf->Cell(15,6,$data->mu_nilai,1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(35,6,'Keterangan',1,1);

			$pdf->Cell(10,6,'',1,0,'C');
			$pdf->Cell(35,6,'',1,0,'C');
			$pdf->Cell(65,6,'- Motivasi usaha',1,0);
			$pdf->Cell(15,6,$data->mu_nilai,1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(35,6,'Keterangan',1,1);

			$pdf->Cell(10,6,'',1,0,'C');
			$pdf->Cell(35,6,'',1,0,'C');
			$pdf->Cell(65,6,'- Motivasi usaha',1,0);
			$pdf->Cell(15,6,$data->mu_nilai,1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(35,6,'Keterangan',1,1);

			$pdf->Cell(10,6,'',1,0,'C');
			$pdf->Cell(35,6,'',1,0,'C');
			$pdf->Cell(65,6,'- Motivasi usaha',1,0);
			$pdf->Cell(15,6,$data->mu_nilai,1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(15,6,'',1,0,'C');
			$pdf->Cell(35,6,'Keterangan',1,1);

		}

		$pdf->Output('Scoring', 'I');

	}


}
