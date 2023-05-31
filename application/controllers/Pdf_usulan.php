<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pdf_usulan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_usulan');
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
		// setting jenis font yang akan digunakan
		$pdf->SetFont('Times', 'B', 16);
		// mencetak string 
		
		$id_lb = $_GET['id_lb'];
		$lb = $this->db->query("SELECT * FROM usulan JOIN latar_belakang 
                                        ON usulan.id_lb=latar_belakang.id_lb
                                        JOIN cashflow_b 
                                        ON usulan.id_lb=cashflow_b.id_lb
                                        JOIN capital_b 
                                        ON usulan.id_lb=capital_b.id_lb
                                        WHERE usulan.id_lb='$id_lb'");
		foreach ($lb->result() as $data) {
			
			$provisi = $data->plafond_usulan * ($data->provisi / 100);
			$administrasi = $data->plafond_usulan * ($data->administrasi / 100);
			$biaya = $provisi + $administrasi + $data->asuransi + $data->materai + $data->apht + $data->skmht
			+ $data->titipan + $data->fiduciare + $data->legalisasi + $data->roya + $data->lainnya;
			
			$pdf->SetFont('Times', 'B', 12);
			$pdf->Cell(79, 5.5, '7. USULAN KREDIT', 0, 1, '');
			$pdf->Cell(49, 5.5, '', 0, 1, '');
			$pdf->SetFont('Times', '', 12);
			$pdf->Cell(49, 5.5, 'Berdasarkan Hasil Analisa diatas dapat kami simpulkan :', 0, 1, '');
			$pdf->Cell(69, 5.5, '1. Character', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, $data->character, 0, 1);
			$pdf->Cell(69, 5.5, '2.	Capacity', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, $data->capacity, 0, 1);
			$pdf->Cell(69, 5.5, '3.	Capital', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, $data->capital, 0, 1);
			$pdf->Cell(69, 5.5, '4.	Cash Flow', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 1, '');
			if($data->tujuan_permohonan == "Konsumtif"){
				$pdf->Cell(69, 5.5, 'Hutang Rp. ' . number_format($data->total_hutang) . ' atau ' . number_format($this->persenKonsumtif(), 2)  . ' % dari Total Aset Rp. ' . number_format($data->total_aset), 0, 1, '');
				$pdf->SetFont('Times', 'B', 12);
				$pdf->Cell(69, 5.5, $this->statusKonsumtif(), 1, 1, 'C');
				$pdf->SetFont('Times', '', 12);
			}else{
				$pdf->Cell(69, 5.5, 'Hutang Rp. ' . number_format($data->total_hutang) . ' atau ' . number_format($this->persen1(), 2)  . ' % dari Aset Produktif Rp. ' . number_format($data->total_al), 0, 1, '');
				$pdf->SetFont('Times', 'B', 12);
				$pdf->Cell(69, 5.5, $this->status1(), 1, 1, 'C');
				$pdf->SetFont('Times', '', 12);
			}
			$pdf->Cell(69, 5.5, '<= 50 % Layak', 0, 0, '');
			$pdf->Cell(5, 5.5, ' > 50 % Tidak Layak', 0, 0, '');
			$pdf->Cell(69, 5.5, '', 0, 1, '');
			$pdf->Cell(69, 5.5, 'Total Angsuran Pinjaman Rp. ' . number_format($this->angsuran()) . ' atau ' . number_format($this->persen2(), 2)  . ' % dari Laba Operasional/Pendapatan Rp. ' . number_format($this->labaRugi()), 0, 1, '');
			$pdf->SetFont('Times', 'B', 12);
			$pdf->Cell(69, 5.5, $this->status2(), 1, 1, 'C');
			$pdf->SetFont('Times', '', 12);
			$pdf->Cell(69, 5.5, '<= 60 % Layak', 0, 0, '');
			$pdf->Cell(5, 5.5, ' > 60 % Tidak Layak', 0, 0, '');
			$pdf->Cell(69, 5.5, '', 0, 1, '');
			$pdf->Cell(69, 5.5, '5. Condition Of Economy', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, $data->coe, 0, 1);
			$pdf->Cell(69, 5.5, '6.	Collateral', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, $data->collateral, 0, 1);
			$pdf->Cell(5, 5.5, '', 0, 1);
			$pdf->Cell(79, 5.5, 'Sehingga kami mengusulkan sebagai berikut :', 0, 1, '');
			$pdf->Cell(69, 5.5, 'Plafond', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, 'Rp. ' . number_format($data->plafond_usulan), 0, 1);
			$pdf->Cell(69, 5.5, 'Jenis Angsuran', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, $data->sifat_kredit, 0, 1);
			$pdf->Cell(69, 5.5, 'Jenis Kredit', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, $data->jenis_permohonan, 0, 1);
			$pdf->Cell(69, 5.5, 'Tujuan kredit', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, $data->tujuan_permohonan, 0, 1);
			$pdf->Cell(69, 5.5, 'Jangka Waktu', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, $data->waktu . ' Bulan', 0, 1);
			$pdf->Cell(69, 5.5, 'Bunga', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, $data->bunga, 0, 1);
			$pdf->Cell(69, 5.5, 'Tanggal Realisasi', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(5, 5.5, '', 0, 1, '');
			// $pdf->Cell(0, 5.5, date('d-m-Y', strtotime($data->realisasi)), 0, 1);
			/*
            $pdf->Cell(69, 5.5, 'Angsuran', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, 'Rp. ' . number_format($data->angsuran), 0, 1);
            */
			$pdf->Cell(69, 5.5, 'Notaris', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, $data->notaris, 0, 1);
			$pdf->Cell(5, 5.5, '', 0, 1, '');

			$pdf->Cell(55, 5.5, 'Provisi', 0, 0, '');
			$pdf->Cell(14, 5.5, $data->provisi . '%', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, 'Rp. ' . number_format($provisi), 0, 1);
			$pdf->Cell(55, 5.5, 'Administrasi', 0, 0, '');
			$pdf->Cell(14, 5.5, $data->administrasi . '%', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, 'Rp. ' . number_format($administrasi), 0, 1);
			$pdf->Cell(69, 5.5, 'Asuransi', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, 'Rp. ' . number_format($data->asuransi), 0, 1);
			$pdf->Cell(69, 5.5, 'Materai', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, 'Rp. ' . number_format($data->materai), 0, 1);
			$pdf->Cell(69, 5.5, 'APHT', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, 'Rp. ' . number_format($data->apht), 0, 1);
			$pdf->Cell(69, 5.5, 'SKMHT', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, 'Rp. ' . number_format($data->skmht), 0, 1);
			$pdf->Cell(69, 5.5, 'Peningkatan dari SKMHT ke APHT', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, 'Rp. ' . number_format($data->titipan), 0, 1);
			$pdf->Cell(69, 5.5, 'Fiduciare Didaftarkan', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, 'Rp. ' . number_format($data->fiduciare), 0, 1);
			$pdf->Cell(69, 5.5, 'Legalisasi / Perjanjian Kredit Notariil', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, 'Rp. ' . number_format($data->legalisasi), 0, 1);
			$pdf->Cell(69, 5.5, 'Lainnya', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, 'Rp. ' . number_format($data->lainnya), 0, 1);
			$pdf->Cell(69, 5.5, 'Roya', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, 'Rp. ' . number_format($data->roya), 0, 1);
			$pdf->SetFont('Times', 'B', 12);
			$pdf->Cell(69, 5.5, 'Total Biaya', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, 'Rp. ' . number_format($biaya), 0, 1);

			$pdf->Cell(69, 5.5, 'Realisasi oleh', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 1, '');
			$pdf->Cell(5, 5.5, '', 0, 1, '');
			$pdf->SetFont('Times', 'B', 12);
			$pdf->Cell(10, 5.5, 'No', 1, 0, 'C');
			$pdf->Cell(100, 5.5, 'Nama', 1, 0, 'C');
			$pdf->Cell(80, 5.5, 'Sebagai', 1, 1, 'C');
			$pdf->SetFont('Times', '', 12);

			$no = 0;
			$id_lb = $_GET['id_lb'];
			$rp = $this->db->get_where('realisasi', array('id_lb' => $id_lb))->result();
			foreach ($rp as $data) {
				$no++;
				$pdf->Cell(10, 5.5, $no, 1, 0, 'C');
				$pdf->Cell(100, 5.5, $data->oleh, 1, 0, 'L');
				$pdf->Cell(80, 5.5, $data->sebagai, 1, 1, 'L');
			}

			$pdf->Output('Usulan', 'I');
		}
		
	}
	
	function status1()
	{
		if ($this->persen1() <= 50) {
			$status = 'Layak';
		} else {
			$status = 'Tidak Layak';
		}
		return $status;
	}
		
	function statusKonsumtif()
	{
		if ($this->persenKonsumtif() <= 50) {
			$status = 'Layak';
		} else {
			$status = 'Tidak Layak';
		}
		return $status;
	}

	function persen1()
	{
		$id_lb = $_GET['id_lb'];
		$lb = $this->db->query("SELECT * FROM cashflow_b 
                                        JOIN capital_b 
                                        ON cashflow_b.id_lb=capital_b.id_lb
                                        WHERE cashflow_b.id_lb='$id_lb'");
		foreach ($lb->result() as $data) {
			$persen = ($data->total_hutang / $data->total_al) * 100;
			return $persen;
		}
	}
	
	function persenKonsumtif()
	{
		$id_lb = $_GET['id_lb'];
		$lb = $this->db->query("SELECT * FROM cashflow_b 
                                        JOIN capital_b 
                                        ON cashflow_b.id_lb=capital_b.id_lb
                                        WHERE cashflow_b.id_lb='$id_lb'");
		foreach ($lb->result() as $data) {
			$persen = ($data->total_hutang / $data->total_aset) * 100;
			return $persen;
		}
	}

	function angsuran()
	{
		$id_lb = $_GET['id_lb'];
		$angsuran = $this->db->query("SELECT * FROM capital_cache WHERE id_lb='$id_lb'");
		foreach ($angsuran->result() as $data) {
			$angsuran = $data->total_angsuran;
		}
		return $angsuran;
	}

	function labaRugi()
	{
		$id_lb = $_GET['id_lb'];
		$labaRugi = $this->db->query("SELECT * FROM capital_cache WHERE id_lb='$id_lb'");
		foreach ($labaRugi->result() as $data) {
			$labaRugi = $data->laba_rugi;
		}
		return $labaRugi;
	}

	function persen2()
	{
		$persen = ($this->angsuran() / $this->labaRugi()) * 100;
		return $persen;
	}

	function status2()
	{
		if ($this->persen2() <= 60) {
			$status = 'Layak';
		} else {
			$status = 'Tidak Layak';
		}
		return $status;
	}
}
