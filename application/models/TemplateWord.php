<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TemplateWord extends CI_Controller {

	public function index()
	{
		$id = $_GET['id'];
        $surat = $this->db->query("SELECT * FROM latar_belakang WHERE id='$id'");
        foreach ($surat->result() as $row){
        require 'vendor/autoload.php';
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('test.docx');

        $templateProcessor->setValues([
            'cif_bank'	    	=> $row->cif_bank,
			'tgl_analisa'	    => number_format($row->tgl_analisa),
			'tgl_permohonan'	=> number_format($row->tgl_permohonan),
			'plafon'	    	=> $row->plafon,
			'jangka_waktu'	    => $row->jangka_waktu,
			'sifat_kredit'	    => $row->sifat_kredit,
			'suku_bunga'	    => $row->suku_bunga,
			'jenis_permohonan'	=> $row->jenis_permohonan,
			'tujuan_permohonan'	=> $row->tujuan_permohonan,
			'ket_penggunaan'	=> $row->ket_penggunaan,
			'nama_debitur'	    => $row->nama_debitur,
			'status_kawin'	    => $row->status_kawin,
			'ttl_nasabah'	    => $row->ttl_nasabah,
			'ktp'	    		=> $row->ktp,
			'alamat_ktp_nasabah'=> $row->alamat_ktp_nasabah,
			'domisili_nasabah'	=> $row->domisili_nasabah,
			'hp_nasabah'	    => $row->hp_nasabah,
			'status_tt'	    	=> $row->status_tt,
			'pekerjaan_nasabah'	=> $row->pekerjaan_nasabah,
			'tanggungan'	    => $row->tanggungan,
			'pendidikan'	    => $row->pendidikan,
			'jenis_kelamin'	    => $row->jenis_kelamin,
			'masa_laku'	    	=> $row->masa_laku,
			'telp_kantor'	    => $row->$telp_kantor,
			'lama_tinggal'	    => $row->lama_tinggal,
			'nama_pasangan'	    => $row->nama_pasangan,
			'ttl_pasangan'	    => $row->ttl_pasangan,
			'alamat_ktp_pasangan'=> $row->alamat_ktp_pasangan,
			'domisili_pasangan'	=> $row->domisili_pasangan,
			'pekerjaan_pasangan'=> $row->pekerjaan_pasangan,
			'hp_pasangan'	    => $row->hp_pasangan,
			'nama_keluarga'	    => $row->$nama_keluarga,
			'hubungan_keluarga'	=> $row->hubungan_keluarga,
			'alamat_keluarga'	=> $row->alamat_keluarga,
			'hp_keluarga'		=> $row->hp_keluarga
        ]);

        header("Content-Disposition: attachment; filename=$row->nama_debitur.docx");

        $templateProcessor->saveAs('php://output');
		}

    }
}