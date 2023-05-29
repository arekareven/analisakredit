<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pdf_scoring extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		//$this->load->model('m_usulan');
		$this->load->library('Pdf'); // MEMANGGIL LIBRARY YANG KITA BUAT TADI
	}

	function index()
	{

		
		$id_lb = $_GET['id_lb'];
		$resume = $this->db->query("SELECT * FROM usulan JOIN pengajuan 
                                        ON usulan.id_lb=pengajuan.id_lb
                                        JOIN user 
                                        ON pengajuan.nama_analis=user.name
                                        JOIN latar_belakang 
                                        ON usulan.id_lb=latar_belakang.id_lb
                                        WHERE usulan.id_lb='$id_lb'")->result();

		$pdf = new FPDF('P', 'mm', 'A4');
		$pdf->SetAutoPageBreak(false);
		// membuat halaman baru
		$pdf->AddPage();
		// margin
		$pdf->SetMargins(10, 10, 10);
		
		$pdf->SetFont('Times', 'BU', 16);
		$pdf->Cell(200, 5, 'RESUME ANALIS KREDIT', 0, 1, 'C');	
		$pdf->Cell(200, 5, '', 0, 1, 'C');	
		$pdf->Cell(200, 5, '', 0, 1, 'C');	
		
		foreach($resume as $resume){
			$pdf->SetFont('Times', 'B', 12);
			$pdf->SetFillColor(220,220,220);
			$pdf->Cell(190,8,'Data Petugas',0,1,'',true);
			$pdf->SetFont('Times', '', 12);
			$pdf->Cell(69, 5.5, 'Nama Analis', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, $resume->nama_analis, 0, 1);
			$pdf->Cell(69, 5.5, 'Email Petugas', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, $resume->email, 0, 1);
			$pdf->Cell(69, 5.5, 'Tanggal Selesai di Analisa AO', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, '**/**/****', 0, 1);
			$pdf->Cell(69, 5.5, 'Tanggal Survey Ulang', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, '**/**/****', 0, 1);
			
			$pdf->SetFont('Times', 'B', 12);
			$pdf->SetFillColor(220,220,220);
			$pdf->Cell(190,8,'Data Nasabah',0,1,'',true);
			$pdf->SetFont('Times', '', 12);
			$pdf->Cell(69, 5.5, 'Nama Debitur', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, $resume->name_debitur, 0, 1);
			$pdf->Cell(69, 5.5, 'Nama Pasangan', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, $resume->nama_pasangan, 0, 1);
			$pdf->Cell(69, 5.5, 'Alamat', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->MultiCell(0, 5.5, $resume->domisili_nasabah, 0, 1);
			$pdf->Cell(69, 5.5, 'Pekerjaan', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, $resume->pekerjaan_nasabah, 0, 1);
			$pdf->Cell(69, 5.5, 'Permohonan Kredit', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, 'Rp. '.number_format($resume->plafon), 0, 1);
			$pdf->Cell(69, 5.5, 'Jangka Waktu', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, $resume->jangka_waktu.' Bulan', 0, 1);
			$pdf->Cell(69, 5.5, 'Usulan AO', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, 'Rp. '.number_format($resume->plafond), 0, 1);
			$pdf->Cell(69, 5.5, 'Tujuan Penggunaan Dana', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, $resume->tujuan_permohonan, 0, 1);
			
			$pdf->SetFont('Times', 'B', 12);
			$pdf->SetFillColor(220,220,220);
			$pdf->Cell(190,8,'Hasil dari 6C survey ulang sebagai berikut',0,1,'',true);
			$pdf->SetFont('Times', '', 12);
			$pdf->Cell(69, 5.5, 'Character / Karakter', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, $resume->character.'/**********************', 0, 1);
			$pdf->Cell(69, 5.5, 'Capacity', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, $resume->capacity.'/***********************', 0, 1);
			$pdf->Cell(69, 5.5, 'Capital / Kondisi Usaha', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, $resume->capital.'/********************', 0, 1);
			$pdf->Cell(69, 5.5, 'Cash Flow', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, '$resume->cashflow/****************', 0, 1);
			$pdf->Cell(69, 5.5, 'Condition Of Economy', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, $resume->coe.'/*******************', 0, 1);
			$pdf->Cell(69, 5.5, 'Collateral', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, $resume->collateral.'/*******************', 0, 1);
			
			$pdf->SetFont('Times', 'B', 12);
			$pdf->SetFillColor(220,220,220);
			$pdf->Cell(190,8,'Dari hasil survey ulang yang saya lakukan, maka saya merekomendasikan',0,1,'',true);
			$pdf->SetFont('Times', '', 12);
			$pdf->Cell(69, 5.5, 'Rekomendasi Plafond', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, 'Rp. '.'********', 0, 1);
			$pdf->Cell(69, 5.5, 'Usulan AO', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, 'Rp. '.number_format($resume->plafond), 0, 1);
			$pdf->Cell(69, 5.5, 'Jangka Waktu', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, '**'.' Bulan', 0, 1);
			$pdf->Cell(69, 5.5, 'Bunga', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, '** % flat pertahun', 0, 1);
			$pdf->Cell(69, 5.5, 'Sistem Angsuran', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, 'Flat ***', 0, 1);
			$pdf->Cell(69, 5.5, 'Pengikatan', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, 'SKMHT ***', 0, 1);
			
			$pdf->SetFont('Times', 'B', 12);
			$pdf->SetFillColor(220,220,220);
			$pdf->Cell(190,8,'Kesimpulan **** untuk disetujui sebagai fasilitas ******',0,1,'',true);
			$pdf->Cell(180, 5.5, '', 0, 1, '');
			$pdf->SetFont('Times', '', 12);
			$pdf->Cell(180, 5.5, 'Tempat, dd/mm/yyyy', 0, 1, 'R');
			$pdf->Cell(180, 5.5, 'Disurvey Ulang Oleh', 0, 1, 'R');
			$pdf->Cell(180, 5.5, '', 0, 1, '');
			$pdf->Cell(180, 5.5, '', 0, 1, '');
			$pdf->Cell(180, 5.5, '', 0, 1, '');
			$pdf->Cell(130, 5.5, '', 0, 0, '');
			$pdf->Cell(60, 5.5, '('.$resume->nama_analis.')', 0, 1, 'C');
			$pdf->Cell(69, 5.5, 'CATATAN', 0, 1, '');
			$pdf->Cell(5, 5.5, '1. ', 0, 0, '');
			$pdf->Cell(0, 5.5, 'saasdas', 0, 1);
			$pdf->Cell(5, 5.5, '2. ', 0, 0, '');
			$pdf->Cell(0, 5.5, 'saasdas', 0, 1);
		}

		// $pdf->Output('Scoring', 'I');

				
		// $pdf = new FPDF('P', 'mm', 'A4');
		// $pdf->SetAutoPageBreak(false);
		// membuat halaman baru
		$pdf->AddPage();
		// margin
		$pdf->SetMargins(10, 10, 10);
		
		//kotak kotak
		$pdf->Rect(10,15,190,275);
		
		$pdf->Line(18, 20, 18, 290);//atas(horizontal),atas(vertikal),bawah(horizontal),bawah(vertikal)
		$pdf->Line(53, 20, 53, 290);
		$pdf->Line(120, 20, 120, 290);
		$pdf->Line(135, 20, 135, 290);
		$pdf->Line(150, 20, 150, 290);
		$pdf->Line(165, 20, 165, 290);
		$pdf->Line(10, 75, 200, 75);//line jumlah character
		$pdf->Line(10, 80, 200, 80);
		$pdf->Line(10, 200, 200, 200);//line jumlah capacity
		$pdf->Line(10, 195, 200, 195);
		$pdf->Line(10, 219, 200, 219);//line jumlah capital
		$pdf->Line(10, 224, 200, 224);
		$pdf->Line(10, 249, 200, 249);//line jumlah collateral
		$pdf->Line(10, 254, 200, 254);
		$pdf->Line(10, 267, 200, 267);//line jumlah condition
		$pdf->Line(10, 272, 200, 272);

		$pdf->SetFont('Times', 'B', 12);
		$pdf->Cell(79, 5, 'Lembar Skoring', 0, 1, '');	
		
		$pdf->SetFillColor(220,220,220);
		$pdf->Cell(8,6,'No',1,0,'C',true);
		$pdf->Cell(35,6,'5 - C',1,0,'C',true);
		$pdf->Cell(67,6,'Aspek & Faktor',1,0,'C',true);
		$pdf->Cell(15,6,'Nilai',1,0,'C',true);
		$pdf->Cell(15,6,'Bobot',1,0,'C',true);
		$pdf->Cell(15,6,'Score',1,0,'C',true);
		$pdf->Cell(35,6,'Keterangan',1,1,'C',true);
		
		$pdf->SetFont('Times', '', 11);
		$scoring = $this->db->get_where('pengajuan', array('id_lb' => $id_lb))->result();
		foreach ($scoring as $data) {
			
			switch($data->itk_nilai) {
				case "1":
					$itk_ket ="Kurang";
					break;
				case "2":
					$itk_ket ="Sedang";
					break;
				case "3":
					$itk_ket ="Cukup";
					break;
				case "4":
					$itk_ket ="Baik";
					break;
				case "5":
					$itk_ket ="Sangat Baik";
					break;
				}
			
				$pdf->Cell(8,6,'1',0,0,'C');
				$pdf->Cell(35,6,'Character',0,0,'C');
				$pdf->Cell(67,6,'- Iktikad thdp kewajiban',0,0);
				$pdf->Cell(15,6,$data->itk_nilai,0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(35,6,$itk_ket,0,1);

			switch($data->mu_nilai) {
				case "1":
					$mu_ket ="Kurang";
					break;
				case "2":
					$mu_ket ="Sedang";
					break;
				case "3":
					$mu_ket ="Cukup";
					break;
				case "4":
					$mu_ket ="Baik";
					break;
				case "5":
					$mu_ket ="Sangat Baik";
					break;
				}
				
				$pdf->Cell(8,6,'',0,0,'C');
				$pdf->Cell(35,6,'',0,0,'C');
				$pdf->Cell(67,6,'- Motivasi usaha',0,0);
				$pdf->Cell(15,6,$data->mu_nilai,0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(35,6,$mu_ket,0,1);

			switch($data->kd_nilai) {
				case "1":
					$kd_ket ="Kurang";
					break;
				case "2":
					$kd_ket ="Sedang";
					break;
				case "3":
					$kd_ket ="Cukup";
					break;
				case "4":
					$kd_ket ="Baik";
					break;
				case "5":
					$kd_ket ="Sangat Baik";
					break;
				}
					
				$pdf->Cell(8,6,'',0,0,'C');
				$pdf->Cell(35,6,'',0,0,'C');
				$pdf->Cell(67,6,'- Kepercayaan diri',0,0);
				$pdf->Cell(15,6,$data->kd_nilai,0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(35,6,$kd_ket,0,1);

			switch($data->kk_nilai) {
				case "1":
					$kk_ket ="Kurang";
					break;
				case "2":
					$kk_ket ="Sedang";
					break;
				case "3":
					$kk_ket ="Cukup";
					break;
				case "4":
					$kk_ket ="Baik";
					break;
				case "5":
					$kk_ket ="Sangat Baik";
					break;
				}
		
				$pdf->Cell(8,6,'',0,0,'C');
				$pdf->Cell(35,6,'',0,0,'C');
				$pdf->Cell(67,6,'- Keharmonisan keluarga',0,0);
				$pdf->Cell(15,6,$data->kk_nilai,0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(35,6,$kk_ket,0,1);

			switch($data->as_nilai) {
				case "1":
					$as_ket ="Kurang";
					break;
				case "2":
					$as_ket ="Sedang";
					break;
				case "3":
					$as_ket ="Cukup";
					break;
				case "4":
					$as_ket ="Baik";
					break;
				case "5":
					$as_ket ="Sangat Baik";
					break;
				}
			
				$pdf->Cell(8,6,'',0,0,'C');
				$pdf->Cell(35,6,'',0,0,'C');
				$pdf->Cell(67,6,'- Aktivitas sosial',0,0);
				$pdf->Cell(15,6,$data->as_nilai,0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(35,6,$as_ket,0,1);

			switch($data->ak_nilai) {
				case "1":
					$ak_ket ="Kurang";
					break;
				case "2":
					$ak_ket ="Sedang";
					break;
				case "3":
					$ak_ket ="Cukup";
					break;
				case "4":
					$ak_ket ="Baik";
					break;
				case "5":
					$ak_ket ="Sangat Baik";
					break;
				}

				$pdf->Cell(8,6,'',0,0,'C');
				$pdf->Cell(35,6,'',0,0,'C');
				$pdf->Cell(67,6,'- Aktivitas keagamaan',0,0);
				$pdf->Cell(15,6,$data->ak_nilai,0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(35,6,$ak_ket,0,1);

			switch($data->t_nilai) {
				case "1":
					$t_ket ="Kurang";
					break;
				case "2":
					$t_ket ="Sedang";
					break;
				case "3":
					$t_ket ="Cukup";
					break;
				case "4":
					$t_ket ="Baik";
					break;
				case "5":
					$t_ket ="Sangat Baik";
					break;
				}

				$pdf->Cell(8,6,'',0,0,'C');
				$pdf->Cell(35,6,'',0,0,'C');
				$pdf->Cell(67,6,'- Temperamen',0,0);
				$pdf->Cell(15,6,$data->t_nilai,0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(35,6,$t_ket,0,1);

			switch($data->hpt_nilai) {
				case "1":
					$hpt_ket ="Kurang";
					break;
				case "2":
					$hpt_ket ="Sedang";
					break;
				case "3":
					$hpt_ket ="Cukup";
					break;
				case "4":
					$hpt_ket ="Baik";
					break;
				case "5":
					$hpt_ket ="Sangat Baik";
					break;
				}

				$pdf->Cell(8,6,'',0,0,'C');
				$pdf->Cell(35,6,'',0,0,'C');
				$pdf->Cell(67,6,'- Hub. pihak terkait',0,0);
				$pdf->Cell(15,6,$data->hpt_nilai,0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(35,6,$hpt_ket,0,1);

			switch($data->tk_nilai) {
				case "1":
					$tk_ket ="Kurang";
					break;
				case "2":
					$tk_ket ="Sedang";
					break;
				case "3":
					$tk_ket ="Cukup";
					break;
				case "4":
					$tk_ket ="Baik";
					break;
				case "5":
					$tk_ket ="Sangat Baik";
					break;
				}

				$pdf->Cell(8,6,'',0,0,'C');
				$pdf->Cell(35,6,'',0,0,'C');
				$pdf->Cell(67,6,'- Tingkat kepatuhan',0,0);
				$pdf->Cell(15,6,$data->tk_nilai,0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(35,6,$tk_ket,0,1);
			
			
			$score_jumlah = $data->jumlah * 0.2;
			if($score_jumlah<=3){
				$ket_jumlah= "Tidak layak";
				}if($score_jumlah > 3 && $score_jumlah <=6){
					$ket_jumlah= "Layak dgn catatan";
				}if($score_jumlah > 6){
					$ket_jumlah= "Layak";
				}

				$pdf->SetFont('Times', 'B', 11);
				$pdf->Cell(8,6,'',0,0,'C');
				$pdf->Cell(35,6,'',0,0,'C');
				$pdf->Cell(67,6,'Sub Jumlah',0,0,'C');
				$pdf->Cell(15,6,$data->jumlah,0,0,'C');
				$pdf->Cell(15,6,'20%',0,0,'C');
				$pdf->Cell(15,6,$score_jumlah,0,0,'C');
				$pdf->Cell(35,6,$ket_jumlah,0,1);
			
						
			switch($data->pengUsa_nilai) {
				case "1":
					$pengUsa_ket ="Kurang";
					break;
				case "2":
					$pengUsa_ket ="Sedang";
					break;
				case "3":
					$pengUsa_ket ="Cukup";
					break;
				case "4":
					$pengUsa_ket ="Baik";
					break;
				case "5":
					$pengUsa_ket ="Sangat Baik";
					break;
				}
			
				$pdf->SetFont('Times', '', 11);
				$pdf->Cell(8,6,'2',0,0,'C');
				$pdf->Cell(35,6,'Capacity',0,0,'C');
				$pdf->Cell(67,6,'- Pengalaman usaha',0,0);
				$pdf->Cell(15,6,$data->pengUsa_nilai,0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(35,6,$pengUsa_ket,0,1);

			switch($data->admUsa_nilai) {
				case "1":
					$admUsa_ket ="Kurang";
					break;
				case "2":
					$admUsa_ket ="Sedang";
					break;
				case "3":
					$admUsa_ket ="Cukup";
					break;
				case "4":
					$admUsa_ket ="Baik";
					break;
				case "5":
					$admUsa_ket ="Sangat Baik";
					break;
				}
				
				$pdf->Cell(8,6,'',0,0,'C');
				$pdf->Cell(35,6,'',0,0,'C');
				$pdf->Cell(67,6,'- Administrasi usaha',0,0);
				$pdf->Cell(15,6,$data->admUsa_nilai,0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(35,6,$admUsa_ket,0,1);

			switch($data->legal_nilai) {
				case "1":
					$legal_ket ="Kurang";
					break;
				case "2":
					$legal_ket ="Sedang";
					break;
				case "3":
					$legal_ket ="Cukup";
					break;
				case "4":
					$legal_ket ="Baik";
					break;
				case "5":
					$legal_ket ="Sangat Baik";
					break;
				}
					
				$pdf->Cell(8,6,'',0,0,'C');
				$pdf->Cell(35,6,'',0,0,'C');
				$pdf->Cell(67,6,'- Legalitas/perijinan',0,0);
				$pdf->Cell(15,6,$data->legal_nilai,0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(35,6,$legal_ket,0,1);

			switch($data->tujUsa_nilai) {
				case "1":
					$tujUsa_ket ="Kurang";
					break;
				case "2":
					$tujUsa_ket ="Sedang";
					break;
				case "3":
					$tujUsa_ket ="Cukup";
					break;
				case "4":
					$tujUsa_ket ="Baik";
					break;
				case "5":
					$tujUsa_ket ="Sangat Baik";
					break;
				}
		
				$pdf->Cell(8,6,'',0,0,'C');
				$pdf->Cell(35,6,'',0,0,'C');
				$pdf->Cell(67,6,'- Tujuan usaha',0,0);
				$pdf->Cell(15,6,$data->tujUsa_nilai,0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(35,6,$tujUsa_ket,0,1);

			switch($data->tingPer_nilai) {
				case "1":
					$tingPer_ket ="Kurang";
					break;
				case "2":
					$tingPer_ket ="Sedang";
					break;
				case "3":
					$tingPer_ket ="Cukup";
					break;
				case "4":
					$tingPer_ket ="Baik";
					break;
				case "5":
					$tingPer_ket ="Sangat Baik";
					break;
				}
			
				$pdf->Cell(8,6,'',0,0,'C');
				$pdf->Cell(35,6,'',0,0,'C');
				$pdf->Cell(67,6,'- Tingkat persaingan',0,0);
				$pdf->Cell(15,6,$data->tingPer_nilai,0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(35,6,$tingPer_ket,0,1);

			switch($data->harPro_nilai) {
				case "1":
					$harPro_ket ="Kurang";
					break;
				case "2":
					$harPro_ket ="Sedang";
					break;
				case "3":
					$harPro_ket ="Cukup";
					break;
				case "4":
					$harPro_ket ="Baik";
					break;
				case "5":
					$harPro_ket ="Sangat Baik";
					break;
				}

				$pdf->Cell(8,6,'',0,0,'C');
				$pdf->Cell(35,6,'',0,0,'C');
				$pdf->Cell(67,6,'- Harga produk',0,0);
				$pdf->Cell(15,6,$data->harPro_nilai,0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(35,6,$harPro_ket,0,1);

			switch($data->sisPem_nilai) {
				case "1":
					$sisPem_ket ="Kurang";
					break;
				case "2":
					$sisPem_ket ="Sedang";
					break;
				case "3":
					$sisPem_ket ="Cukup";
					break;
				case "4":
					$sisPem_ket ="Baik";
					break;
				case "5":
					$sisPem_ket ="Sangat Baik";
					break;
				}

				$pdf->Cell(8,6,'',0,0,'C');
				$pdf->Cell(35,6,'',0,0,'C');
				$pdf->Cell(67,6,'- Sistem pembayaran',0,0);
				$pdf->Cell(15,6,$data->sisPem_nilai,0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(35,6,$sisPem_ket,0,1);

			switch($data->sisDis_nilai) {
				case "1":
					$sisDis_ket ="Kurang";
					break;
				case "2":
					$sisDis_ket ="Sedang";
					break;
				case "3":
					$sisDis_ket ="Cukup";
					break;
				case "4":
					$sisDis_ket ="Baik";
					break;
				case "5":
					$sisDis_ket ="Sangat Baik";
					break;
				}

				$pdf->Cell(8,6,'',0,0,'C');
				$pdf->Cell(35,6,'',0,0,'C');
				$pdf->Cell(67,6,'- Sistem distribusi',0,0);
				$pdf->Cell(15,6,$data->sisDis_nilai,0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(35,6,$sisDis_ket,0,1);

			switch($data->kemBb_nilai) {
				case "1":
					$kemBb_ket ="Kurang";
					break;
				case "2":
					$kemBb_ket ="Sedang";
					break;
				case "3":
					$kemBb_ket ="Cukup";
					break;
				case "4":
					$kemBb_ket ="Baik";
					break;
				case "5":
					$kemBb_ket ="Sangat Baik";
					break;
				}

				$pdf->Cell(8,6,'',0,0,'C');
				$pdf->Cell(35,6,'',0,0,'C');
				$pdf->Cell(67,6,'- Kemudahan bhn baku',0,0);
				$pdf->Cell(15,6,$data->kemBb_nilai,0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(35,6,$kemBb_ket,0,1);

			switch($data->carP_nilai) {
				case "1":
					$carP_ket ="Kurang";
					break;
				case "2":
					$carP_ket ="Sedang";
					break;
				case "3":
					$carP_ket ="Cukup";
					break;
				case "4":
					$carP_ket ="Baik";
					break;
				case "5":
					$carP_ket ="Sangat Baik";
					break;
				}

				$pdf->Cell(8,6,'',0,0,'C');
				$pdf->Cell(35,6,'',0,0,'C');
				$pdf->Cell(67,6,'- Cara pembelian',0,0);
				$pdf->Cell(15,6,$data->carP_nilai,0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(35,6,$carP_ket,0,1);

			switch($data->prosP_nilai) {
				case "1":
					$prosP_ket ="Kurang";
					break;
				case "2":
					$prosP_ket ="Sedang";
					break;
				case "3":
					$prosP_ket ="Cukup";
					break;
				case "4":
					$prosP_ket ="Baik";
					break;
				case "5":
					$prosP_ket ="Sangat Baik";
					break;
				}

				$pdf->Cell(8,6,'',0,0,'C');
				$pdf->Cell(35,6,'',0,0,'C');
				$pdf->Cell(67,6,'- Proses produksi',0,0);
				$pdf->Cell(15,6,$data->prosP_nilai,0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(35,6,$prosP_ket,0,1);

			switch($data->mesP_nilai) {
				case "1":
					$mesP_ket ="Kurang";
					break;
				case "2":
					$mesP_ket ="Sedang";
					break;
				case "3":
					$mesP_ket ="Cukup";
					break;
				case "4":
					$mesP_ket ="Baik";
					break;
				case "5":
					$mesP_ket ="Sangat Baik";
					break;
				}

				$pdf->Cell(8,6,'',0,0,'C');
				$pdf->Cell(35,6,'',0,0,'C');
				$pdf->Cell(67,6,'- Mesin & peralatan',0,0);
				$pdf->Cell(15,6,$data->mesP_nilai,0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(35,6,$mesP_ket,0,1);
				
			switch($data->tenK_nilai) {
				case "1":
					$tenK_ket ="Kurang";
					break;
				case "2":
					$tenK_ket ="Sedang";
					break;
				case "3":
					$tenK_ket ="Cukup";
					break;
				case "4":
					$tenK_ket ="Baik";
					break;
				case "5":
					$tenK_ket ="Sangat Baik";
					break;
				}

				$pdf->Cell(8,6,'',0,0,'C');
				$pdf->Cell(35,6,'',0,0,'C');
				$pdf->Cell(67,6,'- Tenaga kerja',0,0);
				$pdf->Cell(15,6,$data->tenK_nilai,0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(35,6,$tenK_ket,0,1);

			switch($data->damSm_nilai) {
				case "1":
					$damSm_ket ="Kurang";
					break;
				case "2":
					$damSm_ket ="Sedang";
					break;
				case "3":
					$damSm_ket ="Cukup";
					break;
				case "4":
					$damSm_ket ="Baik";
					break;
				case "5":
					$damSm_ket ="Sangat Baik";
					break;
				}

				$pdf->Cell(8,6,'',0,0,'C');
				$pdf->Cell(35,6,'',0,0,'C');
				$pdf->Cell(67,6,'- Dampak sosial masy.',0,0);
				$pdf->Cell(15,6,$data->damSm_nilai,0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(35,6,$damSm_ket,0,1);

			switch($data->damEk_nilai) {
				case "1":
					$damEk_ket ="Kurang";
					break;
				case "2":
					$damEk_ket ="Sedang";
					break;
				case "3":
					$damEk_ket ="Cukup";
					break;
				case "4":
					$damEk_ket ="Baik";
					break;
				case "5":
					$damEk_ket ="Sangat Baik";
					break;
				}

				$pdf->Cell(8,6,'',0,0,'C');
				$pdf->Cell(35,6,'',0,0,'C');
				$pdf->Cell(67,6,'- Dampak ekon. Mikro',0,0);
				$pdf->Cell(15,6,$data->damEk_nilai,0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(35,6,$damEk_ket,0,1);

			switch($data->dampEma_nilai) {
				case "1":
					$dampEma_ket ="Kurang";
					break;
				case "2":
					$dampEma_ket ="Sedang";
					break;
				case "3":
					$dampEma_ket ="Cukup";
					break;
				case "4":
					$dampEma_ket ="Baik";
					break;
				case "5":
					$dampEma_ket ="Sangat Baik";
					break;
				}

				$pdf->Cell(8,6,'',0,0,'C');
				$pdf->Cell(35,6,'',0,0,'C');
				$pdf->Cell(67,6,'- Dampak ekon. Makro',0,0);
				$pdf->Cell(15,6,$data->dampEma_nilai,0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(35,6,$dampEma_ket,0,1);
			
			switch($data->damLi_nilai) {
				case "1":
					$damLi_ket ="Kurang";
					break;
				case "2":
					$damLi_ket ="Sedang";
					break;
				case "3":
					$damLi_ket ="Cukup";
					break;
				case "4":
					$damLi_ket ="Baik";
					break;
				case "5":
					$damLi_ket ="Sangat Baik";
					break;
				}

				$pdf->Cell(8,6,'',0,0,'C');
				$pdf->Cell(35,6,'',0,0,'C');
				$pdf->Cell(67,6,'- Dampak lingkungan',0,0);
				$pdf->Cell(15,6,$data->damLi_nilai,0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(35,6,$damLi_ket,0,1);

			switch($data->kemBa_nilai) {
				case "1":
					$kemBa_ket ="Kurang";
					break;
				case "2":
					$kemBa_ket ="Sedang";
					break;
				case "3":
					$kemBa_ket ="Cukup";
					break;
				case "4":
					$kemBa_ket ="Baik";
					break;
				case "5":
					$kemBa_ket ="Sangat Baik";
					break;
				}

				$pdf->Cell(8,6,'',0,0,'C');
				$pdf->Cell(35,6,'',0,0,'C');
				$pdf->Cell(67,6,'- Kemampuan bayar',0,0);
				$pdf->Cell(15,6,$data->kemBa_nilai,0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(35,6,$kemBa_ket,0,1);

			switch($data->pemLa_nilai) {
				case "1":
					$pemLa_ket ="Kurang";
					break;
				case "2":
					$pemLa_ket ="Sedang";
					break;
				case "3":
					$pemLa_ket ="Cukup";
					break;
				case "4":
					$pemLa_ket ="Baik";
					break;
				case "5":
					$pemLa_ket ="Sangat Baik";
					break;
				}

				$pdf->Cell(8,6,'',0,0,'C');
				$pdf->Cell(35,6,'',0,0,'C');
				$pdf->Cell(67,6,'- Pemupukan laba',0,0);
				$pdf->Cell(15,6,$data->pemLa_nilai,0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(35,6,$pemLa_ket,0,1);
			
			$score_jumlahCapa = $data->jumlah_capa * 0.3;
			if($score_jumlahCapa<=12){
				$ket_jumlahCapa= "Tidak layak";
				}if($score_jumlahCapa > 12 && $score_jumlahCapa <=24){
					$ket_jumlahCapa= "Layak dgn catatan";
				}if($score_jumlahCapa > 24){
					$ket_jumlahCapa= "Layak";
				}

				$pdf->SetFont('Times', 'B', 11);
				$pdf->Cell(8,6,'',0,0,'C');
				$pdf->Cell(35,6,'',0,0,'C');
				$pdf->Cell(67,6,'Sub Jumlah',0,0,'C');
				$pdf->Cell(15,6,$data->jumlah_capa,0,0,'C');
				$pdf->Cell(15,6,'30%',0,0,'C');
				$pdf->Cell(15,6,$score_jumlahCapa,0,0,'C');
				$pdf->Cell(35,6,$ket_jumlahCapa,0,1);

			switch($data->sumDs_nilai) {
				case "1":
					$sumDs_ket ="Kurang";
					break;
				case "2":
					$sumDs_ket ="Sedang";
					break;
				case "3":
					$sumDs_ket ="Cukup";
					break;
				case "4":
					$sumDs_ket ="Baik";
					break;
				case "5":
					$sumDs_ket ="Sangat Baik";
					break;
				}

				$pdf->SetFont('Times', '', 11);
				$pdf->Cell(8,6,'3',0,0,'C');
				$pdf->Cell(35,6,'Capital',0,0,'C');
				$pdf->Cell(67,6,'- Sumber dana sendiri',0,0);
				$pdf->Cell(15,6,$data->sumDs_nilai,0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(35,6,$sumDs_ket,0,1);

			switch($data->sumDk_nilai) {
				case "1":
					$sumDk_ket ="Kurang";
					break;
				case "2":
					$sumDk_ket ="Sedang";
					break;
				case "3":
					$sumDk_ket ="Cukup";
					break;
				case "4":
					$sumDk_ket ="Baik";
					break;
				case "5":
					$sumDk_ket ="Sangat Baik";
					break;
				}

				$pdf->Cell(8,6,'',0,0,'C');
				$pdf->Cell(35,6,'',0,0,'C');
				$pdf->Cell(67,6,'- Sumber dana keluarga',0,0);
				$pdf->Cell(15,6,$data->sumDk_nilai,0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(35,6,$sumDk_ket,0,1);

			switch($data->sumDl_nilai) {
				case "1":
					$sumDl_ket ="Kurang";
					break;
				case "2":
					$sumDl_ket ="Sedang";
					break;
				case "3":
					$sumDl_ket ="Cukup";
					break;
				case "4":
					$sumDl_ket ="Baik";
					break;
				case "5":
					$sumDl_ket ="Sangat Baik";
					break;
				}

				$pdf->Cell(8,6,'',0,0,'C');
				$pdf->Cell(35,6,'',0,0,'C');
				$pdf->Cell(67,6,'- Sumber dana lainnya',0,0);
				$pdf->Cell(15,6,$data->sumDl_nilai,0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(35,6,$sumDl_ket,0,1);
			
			
			$score_jumlahCapi = $data->jumlah_capi * 0.2;
			if($score_jumlahCapi<=1){
				$ket_jumlahCapi= "Tidak layak";
				}if($score_jumlahCapi > 1 && $score_jumlahCapi <=2){
					$ket_jumlahCapi= "Layak dgn catatan";
				}if($score_jumlahCapi > 2){
					$ket_jumlahCapi= "Layak";
				}

				$pdf->SetFont('Times', 'B', 11);
				$pdf->Cell(8,6,'',0,0,'C');
				$pdf->Cell(35,6,'',0,0,'C');
				$pdf->Cell(67,6,'Sub Jumlah',0,0,'C');
				$pdf->Cell(15,6,$data->jumlah_capi,0,0,'C');
				$pdf->Cell(15,6,'20%',0,0,'C');
				$pdf->Cell(15,6,$score_jumlahCapi,0,0,'C');
				$pdf->Cell(35,6,$ket_jumlahCapi,0,1);

			switch($data->UsYd_nilai) {
				case "1":
					$UsYd_ket ="Kurang";
					break;
				case "2":
					$UsYd_ket ="Sedang";
					break;
				case "3":
					$UsYd_ket ="Cukup";
					break;
				case "4":
					$UsYd_ket ="Baik";
					break;
				case "5":
					$UsYd_ket ="Sangat Baik";
					break;
				}

				$pdf->SetFont('Times', '', 11);
				$pdf->Cell(8,6,'4',0,0,'C');
				$pdf->Cell(35,6,'Collateral',0,0,'C');
				$pdf->Cell(67,6,'- Usaha yang dibiayai',0,0);
				$pdf->Cell(15,6,$data->UsYd_nilai,0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(35,6,$UsYd_ket,0,1);

			switch($data->serT_nilai) {
				case "1":
					$serT_ket ="Kurang";
					break;
				case "2":
					$serT_ket ="Sedang";
					break;
				case "3":
					$serT_ket ="Cukup";
					break;
				case "4":
					$serT_ket ="Baik";
					break;
				case "5":
					$serT_ket ="Sangat Baik";
					break;
				}

				$pdf->SetFont('Times', '', 11);
				$pdf->Cell(8,6,'',0,0,'C');
				$pdf->Cell(35,6,'',0,0,'C');
				$pdf->Cell(67,6,'- Sumber dana lainnya',0,0);
				$pdf->Cell(15,6,$data->serT_nilai,0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(35,6,$serT_ket,0,1);

			switch($data->bpkb_nilai) {
				case "1":
					$bpkb_ket ="Kurang";
					break;
				case "2":
					$bpkb_ket ="Sedang";
					break;
				case "3":
					$bpkb_ket ="Cukup";
					break;
				case "4":
					$bpkb_ket ="Baik";
					break;
				case "5":
					$bpkb_ket ="Sangat Baik";
					break;
				}

				$pdf->Cell(8,6,'',0,0,'C');
				$pdf->Cell(35,6,'',0,0,'C');
				$pdf->Cell(67,6,'- BPKB',0,0);
				$pdf->Cell(15,6,$data->bpkb_nilai,0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(35,6,$bpkb_ket,0,1);

			switch($data->market_nilai) {
				case "1":
					$market_ket ="Kurang";
					break;
				case "2":
					$market_ket ="Sedang";
					break;
				case "3":
					$market_ket ="Cukup";
					break;
				case "4":
					$market_ket ="Baik";
					break;
				case "5":
					$market_ket ="Sangat Baik";
					break;
				}

				$pdf->Cell(8,6,'',0,0,'C');
				$pdf->Cell(35,6,'',0,0,'C');
				$pdf->Cell(67,6,'- Marketable',0,0);
				$pdf->Cell(15,6,$data->market_nilai,0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(35,6,$market_ket,0,1);
			
			
			$score_jumlahColl = $data->jumlah_coll * 0.2;
			if($score_jumlahColl<=1){
				$ket_jumlahColl= "Tidak layak";
				}if($score_jumlahColl > 1 && $score_jumlahColl <=2){
					$ket_jumlahColl= "Layak dgn catatan";
				}if($score_jumlahColl > 2){
					$ket_jumlahColl= "Layak";
				}

				$pdf->SetFont('Times', 'B', 11);
				$pdf->Cell(8,6,'',0,0,'C');
				$pdf->Cell(35,6,'',0,0,'C');
				$pdf->Cell(67,6,'Sub Jumlah',0,0,'C');
				$pdf->Cell(15,6,$data->jumlah_coll,0,0,'C');
				$pdf->Cell(15,6,'20%',0,0,'C');
				$pdf->Cell(15,6,$score_jumlahColl,0,0,'C');
				$pdf->Cell(35,6,$ket_jumlahColl,0,1);

			switch($data->kebP_nilai) {
				case "1":
					$kebP_ket ="Kurang";
					break;
				case "2":
					$kebP_ket ="Sedang";
					break;
				case "3":
					$kebP_ket ="Cukup";
					break;
				case "4":
					$kebP_ket ="Baik";
					break;
				case "5":
					$kebP_ket ="Sangat Baik";
					break;
				}

				$pdf->SetFont('Times', '', 11);
				$pdf->Cell(8,6,'5',0,0,'C');
				$pdf->Cell(35,6,'Condition',0,0,'C');
				$pdf->Cell(67,6,'- Kebijakan Pemerintah',0,0);
				$pdf->Cell(15,6,$data->kebP_nilai,0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(35,6,$kebP_ket,0,1);

			switch($data->ekoG_nilai) {
				case "1":
					$ekoG_ket ="Kurang";
					break;
				case "2":
					$ekoG_ket ="Sedang";
					break;
				case "3":
					$ekoG_ket ="Cukup";
					break;
				case "4":
					$ekoG_ket ="Baik";
					break;
				case "5":
					$ekoG_ket ="Sangat Baik";
					break;
				}

				$pdf->Cell(8,6,'',0,0,'C');
				$pdf->Cell(35,6,'',0,0,'C');
				$pdf->Cell(67,6,'- Ekonomi global',0,0);
				$pdf->Cell(15,6,$data->ekoG_nilai,0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(15,6,'',0,0,'C');
				$pdf->Cell(35,6,$ekoG_ket,0,1);
			
			
			$score_jumlahCond = $data->jumlah_cond * 0.1;
			if($score_jumlahCond<0.66){
				$ket_jumlahCond= "Tidak layak";
				}if($score_jumlahCond >= 0.66){
					$ket_jumlahCond= "Layak";
				}

				$pdf->SetFont('Times', 'B', 11);
				$pdf->Cell(8,6,'',0,0,'C');
				$pdf->Cell(35,6,'',0,0,'C');
				$pdf->Cell(67,6,'Sub Jumlah',0,0,'C');
				$pdf->Cell(15,6,$data->jumlah_cond,0,0,'C');
				$pdf->Cell(15,6,'10%',0,0,'C');
				$pdf->Cell(15,6,$score_jumlahCond,0,0,'C');
				$pdf->Cell(35,6,$ket_jumlahCond,0,1);
				
			$total_nilai = $data->jumlah + $data->jumlah_capa + $data->jumlah_capi + $data->jumlah_coll + $data->jumlah_cond;
			$score_total = $score_jumlah + $score_jumlahCapa + $score_jumlahCapi + $score_jumlahColl + $score_jumlahCond;
			if($score_total<=17){
				$ket_total= "Tidak layak";
				}if($score_total > 17 && $score_total <=34){
					$ket_total= "Layak dgn catatan";
				}if($score_total > 34){
					$ket_total= "Layak";
				}
			$pdf->Cell(8,6,'',0,0,'C');
			$pdf->Cell(35,6,'Analis',0,0,'C');
			$pdf->Cell(67,6,'',0,0,'C');
			$pdf->Cell(15,6,'',0,0,'C');
			$pdf->Cell(15,6,'',0,0,'C');
			$pdf->Cell(15,6,'',0,0,'C');
			$pdf->Cell(35,6,'',0,1);

			$pdf->Cell(8,6,'',0,0,'C');
			$pdf->Cell(35,6,'',0,0,'C');
			$pdf->Cell(67,6,'Total',0,0,'C');
			$pdf->Cell(15,6,$total_nilai,0,0,'C');
			$pdf->Cell(15,6,'100%',0,0,'C');
			$pdf->Cell(15,6,$score_total,0,0,'C');
			$pdf->Cell(35,6,$ket_total,0,1);
			
			$pdf->Cell(8,6,'',0,0,'C');
			$pdf->Cell(35,6,'('.$data->nama_analis.')',0,0,'C');
			$pdf->Cell(67,6,'',0,0,'C');
			$pdf->Cell(15,6,'',0,0,'C');
			$pdf->Cell(15,6,'',0,0,'C');
			$pdf->Cell(15,6,'',0,0,'C');
			$pdf->Cell(35,6,'',0,1);

		}

		$pdf->Output('Scoring', 'I');
	}


}
