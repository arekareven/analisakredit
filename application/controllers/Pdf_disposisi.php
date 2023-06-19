<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pdf_disposisi extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_usulan');
		$this->load->library('Pdf'); // MEMANGGIL LIBRARY YANG KITA BUAT TADI
	}

	function index()
	{
		$id_lb = $_GET['id_lb'];
        $lb = $this->db->query("SELECT * FROM usulan WHERE id_lb='$id_lb'");
        $nama = $this->db->query("SELECT * FROM latar_belakang 
                                        JOIN user ON latar_belakang.user=user.email
                                        WHERE latar_belakang.id_lb='$id_lb'")->result();
								
        foreach ($nama as $data) {
			$name = $data->name;
			$kantor = $data->kantor;
			// $analis = $data->nama_analis;
		}
		
		$kacabquery = $this->db->query("SELECT * FROM user WHERE role_id=7 AND kantor='$kantor'")->result();
		foreach($kacabquery as $datakacab){
			$kacab = $datakacab->name;
		}
		
		$dirutquery = $this->db->query("SELECT * FROM user WHERE role_id=8")->result();
		foreach($dirutquery as $datadirut){
			$dirut = $datadirut->name;
		}
				
		// die(var_dump($name,$kacab));

        foreach ($lb->result() as $data) {
			$plafon = intval($data->plafond_usulan);
			if($plafon < 100000000){
				$this->disposisi1($name,$kacab,$kantor);
			}elseif($plafon >= 100000000){
				$this->disposisi2($name,$kacab,$kantor,$dirut);
			}
		}

	}

	function disposisi1($name,$kacab,$kantor)
	{

		$pdf = new FPDF('P', 'mm', 'A4');
		$pdf->SetAutoPageBreak(false);
		// membuat halaman baru
		$pdf->AddPage();
		// margin
		$pdf->SetMargins(10, 10, 10);

		$pdf->SetFont('Times', 'B', 12);
		$pdf->Cell(79, 5.5, 'Lembar Disposisi', 0, 1, '');
		//Line($x,$y,$width,$height,$style)
		$pdf->Rect(10,15,190,38);
		$pdf->Rect(10,53,190,38);
		$pdf->Rect(10,91,190,38);
		$pdf->Rect(10,129,190,38);
		$pdf->Rect(10,167,190,38);

		
		// if($data->analis == 'Layak'){

		// 	$pdf->Image('assets/ttd/ttd-hasan.png', 130, 182, 70);//kCU
		// 	$pdf->Image('assets/ttd/ttd-hasan.png', 130, 143, 70);//kabag
		// 	$pdf->Image('assets/ttd/ttd-hasan.png', 130, 105, 70);//analis
		// }

				
		// $ttd_kabag = $this->db->query("SELECT * FROM `resume` WHERE id_lb=$id_lb AND kacab LIKE '%ACC%'")->result();
		// if(isset($ttd_kabag)){
		// 	$pdf->Image('assets/ttd/ttd-hasan.png', 130, 143, 70);//kacab
		// }

		
		//1
		$pdf->SetFont('Times', '', 12);
		$pdf->Cell(5, 2, '', 0, 0, '');
		$pdf->Cell(10, 12, '......................................................................................................................................................................', 0, 1, '');
		$pdf->Cell(140, 2, '', 0, 0, '');
		$pdf->Cell(10, 0, 'Diusulkan oleh', 0, 1, '');
		$pdf->Cell(140, 23, '', 0, 1, '');
		$pdf->Cell(140, 2, '', 0, 0, '');
		$pdf->SetFont('Times', 'B', 12);
		$pdf->Cell(30, 0, '('.$name.')', 0, 1, 'C');
		
		//2
		$pdf->SetFont('Times', '', 12);
		$pdf->Cell(140, 3, '', 0, 1, '');
		$pdf->Cell(5, 2, '', 0, 0, '');
		$pdf->Cell(10, 11, '......................................................................................................................................................................', 0, 1, '');
		$pdf->Cell(5, 2, '', 0, 0, '');
		$pdf->Cell(10, 4, '......................................................................................................................................................................', 0, 1, '');
		$pdf->Cell(138, 2, '', 0, 0, '');
		$pdf->Cell(10, 5, 'Administrasi Kredit', 0, 1, '');
		$pdf->Cell(140, 15, '', 0, 1, '');
		$pdf->Cell(140, 2, '', 0, 0, '');
		$pdf->SetFont('Times', 'B', 12);
		$pdf->Cell(30, 0, '(.............................)', 0, 1, 'C');
		
		//3
		$pdf->SetFont('Times', '', 12);
		$pdf->Cell(140, 3, '', 0, 1, '');
		$pdf->Cell(5, 2, '', 0, 0, '');
		$pdf->Cell(10, 11, '......................................................................................................................................................................', 0, 1, '');
		$pdf->Cell(5, 2, '', 0, 0, '');
		$pdf->Cell(10, 4, '......................................................................................................................................................................', 0, 1, '');
		$pdf->Cell(142, 2, '', 0, 0, '');
		$pdf->Cell(10, 5, 'Analis Kredit', 0, 1, '');
		$pdf->Cell(140, 15, '', 0, 1, '');
		$pdf->Cell(140, 2, '', 0, 0, '');
		$pdf->SetFont('Times', 'B', 12);
		$pdf->Cell(30, 0, '(.............................)', 0, 1, 'C');
		// $pdf->Cell(30, 0, '('.$analis.')', 0, 1, 'C');
		
		if($kantor == 'KCU'){
					
			$kabag = $this->db->query("SELECT * FROM user WHERE role_id=4 AND kantor='$kantor'")->result();
			foreach($kabag as $datakabag){
				$kabag = $datakabag->name;
				//4
				$pdf->SetFont('Times', '', 12);
				$pdf->Cell(140, 3, '', 0, 1, '');
				$pdf->Cell(5, 2, '', 0, 0, '');
				$pdf->Cell(10, 11, '......................................................................................................................................................................', 0, 1, '');
				$pdf->Cell(5, 2, '', 0, 0, '');
				$pdf->Cell(10, 4, '......................................................................................................................................................................', 0, 1, '');
				$pdf->Cell(130, 2, '', 0, 0, '');
				$pdf->Cell(10, 5, 'Kabag Kredit & Marketing', 0, 1, '');
				$pdf->Cell(140, 15, '', 0, 1, '');
				$pdf->Cell(140, 2, '', 0, 0, '');
				$pdf->SetFont('Times', 'B', 12);
				$pdf->Cell(30, 0, '('.$kabag.')', 0, 1, 'C');
			}
		}

		//5
		$pdf->SetFont('Times', '', 12);
		$pdf->Cell(140, 3, '', 0, 1, '');
		$pdf->Cell(5, 2, '', 0, 0, '');
		$pdf->Cell(10, 11, '......................................................................................................................................................................', 0, 1, '');
		$pdf->Cell(5, 2, '', 0, 0, '');
		$pdf->Cell(10, 4, '......................................................................................................................................................................', 0, 1, '');
		$pdf->Cell(135, 2, '', 0, 0, '');
		switch($kantor) {
			case "KCU":
				$kantor ="Kepala Cabang Utama";
				break;
			case "KCMDN":
				$kantor ="Kepala Cabang Madiun";
				break;
			case "KCTRG":
				$kantor ="Kepala Cabang Trenggalek";
				break;
			case "KCNGW":
				$kantor ="Kepala Cabang Ngawi";
				break;
			case "KCPNG":
				$kantor ="Kepala Cabang Ponorogo";
				break;
			case "KCNGJ":
				$kantor ="Kepala Cabang Nganjuk";
				break;
			}
		$pdf->Cell(10, 5, $kantor, 0, 1, '');
		$pdf->Cell(140, 15, '', 0, 1, '');
		$pdf->Cell(140, 2, '', 0, 0, '');
		$pdf->SetFont('Times', 'B', 12);
		$pdf->Cell(30, 0, '('.$kacab.')', 0, 1, 'C');

		$pdf->Output('Disposisi', 'I');
	}

	function disposisi2($name,$kacab,$kantor,$dirut)
	{

		//----Tanda tangan digital----
		//$lokasi_ttd_kabag = "assets/ttd/test.png";
		//$lokasi_ttd_kcu = "assets/ttd/ttd-hasan.png";
		
		$pdf = new FPDF('P', 'mm', 'A4');
		$pdf->SetAutoPageBreak(false);
		// membuat halaman baru
		$pdf->AddPage();
		// margin
		$pdf->SetMargins(10, 10, 10);

		$pdf->SetFont('Times', 'B', 12);
		$pdf->Cell(79, 5.5, 'Lembar Disposisi', 0, 1, '');
		//Line($x,$y,$width,$height,$style)
		$pdf->Rect(10,15,190,38);
		$pdf->Rect(10,53,190,38);
		$pdf->Rect(10,91,190,38);
		$pdf->Rect(10,129,190,38);
		$pdf->Rect(10,167,190,38);
		$pdf->Rect(10,205,190,38);

		
		// if($data->analis == 'Layak'){

		// 	$pdf->Image('assets/ttd/ttd-hasan.png', 130, 182, 70);//kCU
		// 	$pdf->Image('assets/ttd/ttd-hasan.png', 130, 143, 70);//kabag
		// 	$pdf->Image('assets/ttd/ttd-hasan.png', 130, 105, 70);//analis
		// }

				
		// $ttd_kabag = $this->db->query("SELECT * FROM `resume` WHERE id_lb=$id_lb AND kacab LIKE '%ACC%'")->result();
		// if(isset($ttd_kabag)){
		// 	$pdf->Image('assets/ttd/ttd-hasan.png', 130, 143, 70);//kacab
		// }

		
		//1
		$pdf->SetFont('Times', '', 12);
		$pdf->Cell(5, 2, '', 0, 0, '');
		$pdf->Cell(10, 12, '......................................................................................................................................................................', 0, 1, '');
		$pdf->Cell(140, 2, '', 0, 0, '');
		$pdf->Cell(10, 0, 'Diusulkan oleh', 0, 1, '');
		$pdf->Cell(140, 23, '', 0, 1, '');
		$pdf->Cell(140, 2, '', 0, 0, '');
		$pdf->SetFont('Times', 'B', 12);
		$pdf->Cell(30, 0, '('.$name.')', 0, 1, 'C');
		
		//2
		$pdf->SetFont('Times', '', 12);
		$pdf->Cell(140, 3, '', 0, 1, '');
		$pdf->Cell(5, 2, '', 0, 0, '');
		$pdf->Cell(10, 11, '......................................................................................................................................................................', 0, 1, '');
		$pdf->Cell(5, 2, '', 0, 0, '');
		$pdf->Cell(10, 4, '......................................................................................................................................................................', 0, 1, '');
		$pdf->Cell(138, 2, '', 0, 0, '');
		$pdf->Cell(10, 5, 'Administrasi Kredit', 0, 1, '');
		$pdf->Cell(140, 15, '', 0, 1, '');
		$pdf->Cell(140, 2, '', 0, 0, '');
		$pdf->SetFont('Times', 'B', 12);
		$pdf->Cell(30, 0, '(.............................)', 0, 1, 'C');
		
		//3
		$pdf->SetFont('Times', '', 12);
		$pdf->Cell(140, 3, '', 0, 1, '');
		$pdf->Cell(5, 2, '', 0, 0, '');
		$pdf->Cell(10, 11, '......................................................................................................................................................................', 0, 1, '');
		$pdf->Cell(5, 2, '', 0, 0, '');
		$pdf->Cell(10, 4, '......................................................................................................................................................................', 0, 1, '');
		$pdf->Cell(142, 2, '', 0, 0, '');
		$pdf->Cell(10, 5, 'Analis Kredit', 0, 1, '');
		$pdf->Cell(140, 15, '', 0, 1, '');
		$pdf->Cell(140, 2, '', 0, 0, '');
		$pdf->SetFont('Times', 'B', 12);
		$pdf->Cell(30, 0, '(.............................)', 0, 1, 'C');
		
		if($kantor == 'KCU'){
					
			$kabag = $this->db->query("SELECT * FROM user WHERE role_id=4 AND kantor='$kantor'")->result();
			foreach($kabag as $datakabag){
				$kabag = $datakabag->name;
				//4
				$pdf->SetFont('Times', '', 12);
				$pdf->Cell(140, 3, '', 0, 1, '');
				$pdf->Cell(5, 2, '', 0, 0, '');
				$pdf->Cell(10, 11, '......................................................................................................................................................................', 0, 1, '');
				$pdf->Cell(5, 2, '', 0, 0, '');
				$pdf->Cell(10, 4, '......................................................................................................................................................................', 0, 1, '');
				$pdf->Cell(130, 2, '', 0, 0, '');
				$pdf->Cell(10, 5, 'Kabag Kredit & Marketing', 0, 1, '');
				$pdf->Cell(140, 15, '', 0, 1, '');
				$pdf->Cell(140, 2, '', 0, 0, '');
				$pdf->SetFont('Times', 'B', 12);
				$pdf->Cell(30, 0, '('.$kabag.')', 0, 1, 'C');
			}
		}

		//5
		$pdf->SetFont('Times', '', 12);
		$pdf->Cell(140, 3, '', 0, 1, '');
		$pdf->Cell(5, 2, '', 0, 0, '');
		$pdf->Cell(10, 11, '......................................................................................................................................................................', 0, 1, '');
		$pdf->Cell(5, 2, '', 0, 0, '');
		$pdf->Cell(10, 4, '......................................................................................................................................................................', 0, 1, '');
		$pdf->Cell(135, 2, '', 0, 0, '');
		switch($kantor) {
			case "KCU":
				$kantor ="Kepala Cabang Utama";
				break;
			case "KCMDN":
				$kantor ="Kepala Cabang Madiun";
				break;
			case "KCTRG":
				$kantor ="Kepala Cabang Trenggalek";
				break;
			case "KCNGW":
				$kantor ="Kepala Cabang Ngawi";
				break;
			case "KCPNG":
				$kantor ="Kepala Cabang Ponorogo";
				break;
			case "KCNGJ":
				$kantor ="Kepala Cabang Nganjuk";
				break;
			}
		$pdf->Cell(10, 5, $kantor, 0, 1, '');
		$pdf->Cell(140, 15, '', 0, 1, '');
		$pdf->Cell(140, 2, '', 0, 0, '');
		$pdf->SetFont('Times', 'B', 12);
		$pdf->Cell(30, 0, '('.$kacab.')', 0, 1, 'C');

		//6
		$pdf->SetFont('Times', '', 12);
		$pdf->Cell(140, 3, '', 0, 1, '');
		$pdf->Cell(5, 2, '', 0, 0, '');
		$pdf->Cell(10, 11, '......................................................................................................................................................................', 0, 1, '');
		$pdf->Cell(5, 2, '', 0, 0, '');
		$pdf->Cell(10, 4, '......................................................................................................................................................................', 0, 1, '');
		$pdf->Cell(137, 2, '', 0, 0, '');
		$pdf->Cell(10, 5, 'Direktur Utama', 0, 1, '');
		$pdf->Cell(140, 15, '', 0, 1, '');
		$pdf->Cell(140, 2, '', 0, 0, '');
		$pdf->SetFont('Times', 'B', 12);
		$pdf->Cell(30, 0, '('.$dirut.')', 0, 1, 'C');

		$pdf->Output('Usulan', 'I');
	}

}
