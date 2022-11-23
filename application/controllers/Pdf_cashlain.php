<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pdf_cashlain extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_capital');
		$this->load->library('Pdf'); // MEMANGGIL LIBRARY
	}

	function index()
	{
		//PDF CAPITAL
		$pdf = new FPDF('P', 'mm', 'Letter');
		// membuat halaman baru
		$pdf->AddPage();
		// margin
		$pdf->SetMargins(10, 10, 10);
		// setting jenis font yang akan digunakan
		$pdf->SetFont('Times', 'B', 16);
		// mencetak string 

		$id_lb = $_GET['id_lb'];

		$pdf->SetFont('Times', 'B', 12);
		$pdf->Cell(79, 5.5, '* Keuangan Lain', 0, 1, '');
		$pdf->Cell(79, 5.5, '', 0, 1, '');
		$pdf->Cell(7, 5.5, 'No', 1, 0, 'C');
		$pdf->Cell(106, 5.5, 'Keterangan', 1, 0, 'C');
		$pdf->Cell(28, 5.5, 'Pemasukan', 1, 0, 'C');
		$pdf->Cell(28, 5.5, 'Pengeluaran', 1, 0, 'C');
		$pdf->Cell(28, 5.5, 'Jumlah', 1, 1, 'C');

		//Cashflow usaha 1
		$rp = $this->db->query("SELECT * FROM cashflow_lain WHERE kode_perkiraan = '4.1.1' && id_lb='$id_lb'");
		if (!empty($rp->result())) {
			$pdf->SetFont('Times', '', 12);
			$pdf->Cell(7, 5.5, '', 1, 0, 'C');
			$pdf->Cell(106, 5.5, 'USAHA 1', 1, 0, '');
			$pdf->Cell(28, 5.5, '', 1, 0, 'C');
			$pdf->Cell(28, 5.5, '', 1, 0, 'C');
			$pdf->Cell(28, 5.5, '', 1, 1, 'C');

			foreach ($rp->result() as $data) {
				$pdf->Cell(7, 5.5, '', 1, 0, 'C');
				$pdf->Cell(106, 5.5, $data->keterangan, 1, 0, '');
				$pdf->Cell(28, 5.5, number_format($data->saldo), 1, 0, 'R');
				$pdf->Cell(28, 5.5, '', 1, 0, 'R');
				$pdf->Cell(28, 5.5, '', 1, 1, 'R');
			}
			$no = 0;
			$rp = $this->db->query("SELECT * FROM cashflow_lain WHERE MID(kode_perkiraan,1,3) = '5.1' && id_lb='$id_lb'");
			foreach ($rp->result() as $data) {
				$no++;
				$pdf->Cell(7, 5.5, $no, 1, 0, 'C');
				$pdf->Cell(106, 5.5, $data->keterangan, 1, 0, '');
				$pdf->Cell(28, 5.5, '', 1, 0, 'R');
				$pdf->Cell(28, 5.5, number_format($data->saldo), 1, 0, 'R');
				$pdf->Cell(28, 5.5, '', 1, 1, 'R');
			}
			$pdf->Cell(7, 5.5, '', 1, 0, 'C');
			$pdf->Cell(106, 5.5, 'SURPLUS USAHA 1', 1, 0, '');
			$pdf->Cell(28, 5.5, '', 1, 0, 'C');
			$pdf->Cell(28, 5.5, '', 1, 0, 'C');
			$pdf->Cell(28, 5.5, '', 1, 1, 'C');
		} else {
		}

		//Cashflow usaha 2
		$rp2 = $this->db->query("SELECT * FROM cashflow_lain WHERE kode_perkiraan = '4.1.2' && id_lb='$id_lb'");
		if (!empty($rp2->result())) {
			$pdf->SetFont('Times', '', 12);
			$pdf->Cell(7, 5.5, '', 1, 0, 'C');
			$pdf->Cell(106, 5.5, 'USAHA 2', 1, 0, '');
			$pdf->Cell(28, 5.5, '', 1, 0, 'C');
			$pdf->Cell(28, 5.5, '', 1, 0, 'C');
			$pdf->Cell(28, 5.5, '', 1, 1, 'C');

			foreach ($rp2->result() as $data) {
				$pdf->Cell(7, 5.5, '', 1, 0, 'C');
				$pdf->Cell(106, 5.5, $data->keterangan, 1, 0, '');
				$pdf->Cell(28, 5.5, number_format($data->saldo), 1, 0, 'R');
				$pdf->Cell(28, 5.5, '', 1, 0, 'R');
				$pdf->Cell(28, 5.5, '', 1, 1, 'R');
			}
			$no = 0;
			$rp2 = $this->db->query("SELECT * FROM cashflow_lain WHERE MID(kode_perkiraan,1,3) = '5.2' && id_lb='$id_lb'");
			foreach ($rp2->result() as $data) {
				$no++;
				$pdf->Cell(7, 5.5, $no, 1, 0, 'C');
				$pdf->Cell(106, 5.5, $data->keterangan, 1, 0, '');
				$pdf->Cell(28, 5.5, '', 1, 0, 'R');
				$pdf->Cell(28, 5.5, number_format($data->saldo), 1, 0, 'R');
				$pdf->Cell(28, 5.5, '', 1, 1, 'R');
			}
			$pdf->Cell(7, 5.5, '', 1, 0, 'C');
			$pdf->Cell(106, 5.5, 'SURPLUS USAHA 2', 1, 0, '');
			$pdf->Cell(28, 5.5, '', 1, 0, 'C');
			$pdf->Cell(28, 5.5, '', 1, 0, 'C');
			$pdf->Cell(28, 5.5, '', 1, 1, 'C');
		} else {
		}

		//Cashflow usaha 3
		$rp3 = $this->db->query("SELECT * FROM cashflow_lain WHERE kode_perkiraan = '4.1.3' && id_lb='$id_lb'");
		if (!empty($rp3->result())) {
			$pdf->SetFont('Times', '', 12);
			$pdf->Cell(7, 5.5, '', 1, 0, 'C');
			$pdf->Cell(106, 5.5, 'USAHA 3', 1, 0, '');
			$pdf->Cell(28, 5.5, '', 1, 0, 'C');
			$pdf->Cell(28, 5.5, '', 1, 0, 'C');
			$pdf->Cell(28, 5.5, '', 1, 1, 'C');

			foreach ($rp3->result() as $data) {
				$pdf->Cell(7, 5.5, '', 1, 0, 'C');
				$pdf->Cell(106, 5.5, $data->keterangan, 1, 0, '');
				$pdf->Cell(28, 5.5, number_format($data->saldo), 1, 0, 'R');
				$pdf->Cell(28, 5.5, '', 1, 0, 'R');
				$pdf->Cell(28, 5.5, '', 1, 1, 'R');
			}
			$no = 0;
			$rp3 = $this->db->query("SELECT * FROM cashflow_lain WHERE MID(kode_perkiraan,1,3) = '5.3' && id_lb='$id_lb'");
			foreach ($rp3->result() as $data) {
				$no++;
				$pdf->Cell(7, 5.5, $no, 1, 0, 'C');
				$pdf->Cell(106, 5.5, $data->keterangan, 1, 0, '');
				$pdf->Cell(28, 5.5, '', 1, 0, 'R');
				$pdf->Cell(28, 5.5, number_format($data->saldo), 1, 0, 'R');
				$pdf->Cell(28, 5.5, '', 1, 1, 'R');
			}
			$pdf->Cell(7, 5.5, '', 1, 0, 'C');
			$pdf->Cell(106, 5.5, 'SURPLUS USAHA 3', 1, 0, '');
			$pdf->Cell(28, 5.5, '', 1, 0, 'C');
			$pdf->Cell(28, 5.5, '', 1, 0, 'C');
			$pdf->Cell(28, 5.5, '', 1, 1, 'C');
		} else {
		}

		//Cashflow lain/gaji
		$lg = $this->db->query("SELECT * FROM cashflow_lain WHERE kode_perkiraan = '4.1.4' && id_lb='$id_lb'");
		if (!empty($lg->result())) {
			
			$pdf->SetFont('Times', '', 12);
			$pdf->Cell(7, 5.5, '', 1, 0, 'C');
			$pdf->Cell(106, 5.5, 'PENDAPATAN LAIN / GAJI', 1, 0, '');
			$pdf->Cell(28, 5.5, '', 1, 0, 'C');
			$pdf->Cell(28, 5.5, '', 1, 0, 'C');
			$pdf->Cell(28, 5.5, '', 1, 1, 'C');

			foreach ($lg->result() as $data) {
				$pdf->SetFont('Times', '', 12);
				$pdf->Cell(7, 5.5, '', 1, 0, 'C');
				$pdf->Cell(106, 5.5, $data->keterangan, 1, 0, '');
				$pdf->Cell(28, 5.5, number_format($data->saldo), 1, 0, 'R');
				$pdf->Cell(28, 5.5, '', 1, 0, 'R');
				$pdf->Cell(28, 5.5, '', 1, 1, 'R');
			}
			$pdf->Cell(7, 5.5, '', 1, 0, 'C');
			$pdf->Cell(106, 5.5, 'SURPLUS PENDAPATAN LAIN', 1, 0, '');
			$pdf->Cell(28, 5.5, '', 1, 0, 'C');
			$pdf->Cell(28, 5.5, '', 1, 0, 'C');
			$pdf->Cell(28, 5.5, '', 1, 1, 'C');
		} else {
		}

		//Surplus usaha
		
		$pdf->Cell(7, 5.5, '', 1, 0, 'C');
		$pdf->Cell(106, 5.5, 'JUMLAH PENDAPATAN DAN PENGELUARAN USAHA', 1, 0, '');
		$pdf->Cell(28, 5.5, number_format($this->debit()), 1, 0, 'R');
		$pdf->Cell(28, 5.5, number_format($this->tot_kredit()), 1, 0, 'R');
		$pdf->Cell(28, 5.5, number_format($this->surplus()), 1, 1, 'R');

		//Cashflow pengeluaran biaya lain
		$rp4 = $this->db->query("SELECT * FROM cashflow_lain WHERE MID(kode_perkiraan,1,3) = '5.4' && id_lb='$id_lb'");
		if (!empty($rp4->result())) {
			$pdf->SetFont('Times', '', 12);
			$pdf->Cell(7, 5.5, '', 1, 0, 'C');
			$pdf->Cell(106, 5.5, 'BIAYA LAIN-LAIN', 1, 0, '');
			$pdf->Cell(28, 5.5, '', 1, 0, 'C');
			$pdf->Cell(28, 5.5, '', 1, 0, 'C');
			$pdf->Cell(28, 5.5, '', 1, 1, 'C');

			$no = 0;
			foreach ($rp4->result() as $data) {
				$no++;
				$pdf->Cell(7, 5.5, $no, 1, 0, 'C');
				$pdf->Cell(106, 5.5, $data->keterangan, 1, 0, '');
				$pdf->Cell(28, 5.5, '', 1, 0, 'R');
				$pdf->Cell(28, 5.5, number_format($data->saldo), 1, 0, 'R');
				$pdf->Cell(28, 5.5, '', 1, 1, 'R');
			}
			$pdf->Cell(7, 5.5, '', 1, 0, 'C');
			$pdf->Cell(106, 5.5, 'JUMLAH BIAYA LAIN-LAIN', 1, 0, '');
			$pdf->Cell(28, 5.5, '', 1, 0, 'C');
			$pdf->Cell(28, 5.5, '', 1, 0, 'C');
			$pdf->Cell(28, 5.5, number_format($this->kreditLain()), 1, 1, 'R');
		} else {
		}

		//Cashflow pengeluaran angsuran
		$angsuran = $this->db->query("SELECT * FROM cashflow_lain WHERE MID(kode_perkiraan,1,3) = '5.5' && id_lb='$id_lb'");
		if (!empty($angsuran->result())) {
			
			$pdf->Cell(7, 5.5, '', 1, 0, 'C');
			$pdf->Cell(106, 5.5, 'BIAYA ANGSURAN HUTANG', 1, 0, '');
			$pdf->Cell(28, 5.5, '', 1, 0, 'C');
			$pdf->Cell(28, 5.5, '', 1, 0, 'C');
			$pdf->Cell(28, 5.5, '', 1, 1, 'C');

			$no = 0;
			foreach ($angsuran->result() as $data) {
				$no++;
				$pdf->SetFont('Times', '', 12);
				$pdf->Cell(7, 5.5, $no, 1, 0, 'C');
				$pdf->Cell(106, 5.5, $data->keterangan, 1, 0, '');
				$pdf->Cell(28, 5.5, '', 1, 0, 'R');
				$pdf->Cell(28, 5.5, number_format($data->saldo), 1, 0, 'R');
				$pdf->Cell(28, 5.5, '', 1, 1, 'R');
			}
			
			$pdf->Cell(7, 5.5, '', 1, 0, 'C');
			$pdf->Cell(106, 5.5, 'JUMLAH ANGSURAN HUTANG', 1, 0, '');
			$pdf->Cell(28, 5.5, '', 1, 0, 'C');
			$pdf->Cell(28, 5.5, '', 1, 0, 'C');
			$pdf->Cell(28, 5.5, number_format($this->kreditAngsuran()), 1, 1, 'R');
		} else {
		}

		//Cashflow Rugi laba
		$pdf->Cell(7, 5.5, '', 1, 0, 'C');
		$pdf->Cell(106, 5.5, 'RUGI / LABA', 1, 0, '');
		$pdf->Cell(28, 5.5, '', 1, 0, 'C');
		$pdf->Cell(28, 5.5, '', 1, 0, 'C');
		
		$pdf->Cell(28, 5.5, number_format($this->rugiLaba()), 1, 1, 'R');

		$pdf->Output('Capital & Cashflow Setelah', 'I');
	}

	//Cashflow

	function debit()
	{
		//Pemasukan
		$id_lb = $_GET['id_lb'];
		$debit = $this->db->query("SELECT * FROM cashflow_lain WHERE MID(kode_perkiraan,1,3) = '4.1' && id_lb='$id_lb'");
		if (!empty($debit->result())) {

			foreach ($debit->result() as $row) {
				$array_debit[] = $row->saldo;
			}
			$sum_debit = array_sum($array_debit);
		} else
			$sum_debit = 0;
		return $sum_debit;
	}

	function kredit()
	{
		//Pengeluaran
		$id_lb = $_GET['id_lb'];
		$kredit = $this->db->query("SELECT * FROM cashflow_lain WHERE id_lb='$id_lb' && MID(kode_perkiraan,1,3) = '5.1'");
		if (!empty($kredit->result())) {

			foreach ($kredit->result() as $row) {
				$array_kredit[] = $row->saldo;
			}
			$sum_kredit = array_sum($array_kredit);
		} else
			$sum_kredit = 0;
		return $sum_kredit;
	}

	function kredit2()
	{
		//Pengeluaran
		$id_lb = $_GET['id_lb'];
		$kredit = $this->db->query("SELECT * FROM cashflow_lain WHERE id_lb='$id_lb' && MID(kode_perkiraan,1,3) ='5.2'");
		if (!empty($kredit->result())) {

			foreach ($kredit->result() as $row) {
				$array_kredit[] = $row->saldo;
			}
			$sum_kredit = array_sum($array_kredit);
		} else
			$sum_kredit = 0;
		return $sum_kredit;
	}

	function kredit3()
	{
		//Pengeluaran
		$id_lb = $_GET['id_lb'];
		$kredit = $this->db->query("SELECT * FROM cashflow_lain WHERE id_lb='$id_lb' && MID(kode_perkiraan,1,3) = '5.3'");
		if (!empty($kredit->result())) {

			foreach ($kredit->result() as $row) {
				$array_kredit[] = $row->saldo;
			}
			$sum_kredit = array_sum($array_kredit);
		} else
			$sum_kredit = 0;
		return $sum_kredit;
	}

	function tot_kredit()
	{
		$sum_kredit = $this->kredit() + $this->kredit2() + $this->kredit3();
		return $sum_kredit;
	}

	function surplus()
	{
		//Pengeluaran
		$surplus = $this->debit() - $this->tot_kredit();
		return $surplus;
	}

	function kreditLain()
	{
		//Pemasukan
		$id_lb = $_GET['id_lb'];
		$kreditLain = $this->db->query("SELECT * FROM cashflow_lain WHERE MID(kode_perkiraan,1,3) = '5.4' && id_lb='$id_lb'");
		if (!empty($kreditLain->result())) {

			foreach ($kreditLain->result() as $row) {
				$array_kreditLain[] = $row->saldo;
			}
			$sum_kreditLain = array_sum($array_kreditLain);
		} else
			$sum_kreditLain = 0;
		return $sum_kreditLain;
	}

	function kreditAngsuran()
	{
		//Pemasukan
		$id_lb = $_GET['id_lb'];
		$kreditAngsuran = $this->db->query("SELECT * FROM cashflow_lain WHERE MID(kode_perkiraan,1,3) = '5.5' && id_lb='$id_lb'");
		if (!empty($kreditAngsuran->result())) {

			foreach ($kreditAngsuran->result() as $row) {
				$array_kreditAngsuran[] = $row->saldo;
			}
			$sum_kreditAngsuran = array_sum($array_kreditAngsuran);
		} else
			$sum_kreditAngsuran = 0;
		return $sum_kreditAngsuran;
	}

	function rugiLaba()
	{
		//Pemasukan
		$rugiLaba = $this->debit() - ($this->tot_kredit() + $this->kreditLain() + $this->kreditAngsuran());
		return $rugiLaba;
	}

	
}
