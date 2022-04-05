<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kredit extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_kredit');
		$this->load->helper('url');
		$this->load->library(array('session'));
	}

	public function index()
	{
	}

	public function add()
	{
		$id_lb = $this->input->post('id_lb');
		$this->m_kredit->add_data($id_lb);
	}

	public function add_rw()
	{
		$id_lb = $this->input->post('id_lb');
		$this->m_kredit->add_data_rw($id_lb);
	}

	public function next()
	{
		$id_lb = $_GET['id_lb'];
		redirect('character?id_lb=' . $id_lb);
	}

	public function lb()
	{
		$data['title'] = 'Latar Belakang';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['query'] = $this->m_kredit->tampil_data();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('kredit/lb', $data);
		$this->load->view('templates/footer');
	}

	public function templateword()
	{
		$id_lb = $_GET['id_lb'];
		$surat = $this->db->query("SELECT * FROM latar_belakang WHERE id_lb='$id_lb'");
		foreach ($surat->result() as $row) {
			require 'vendor/autoload.php';
			$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('master.docx');

			$templateProcessor->setValues([
				'cif_bank'	    	=> $row->cif_bank,
				'tgl_analisa'	    => date('d-m-Y', strtotime($row->tgl_analisa)),
				'tgl_permohonan'	=> date('d-m-Y', strtotime($row->tgl_permohonan)),
				'plafon'	    	=> number_format($row->plafon),
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
				'alamat_ktp_nasabah' => $row->alamat_ktp_nasabah,
				'domisili_nasabah'	=> $row->domisili_nasabah,
				'hp_nasabah'	    => $row->hp_nasabah,
				'status_tt'	    	=> $row->status_tt,
				'pekerjaan_nasabah'	=> $row->pekerjaan_nasabah,
				'tanggungan'	    => $row->tanggungan,
				'pendidikan'	    => $row->pendidikan,
				'jenis_kelamin'	    => $row->jenis_kelamin,
				'masa_laku'	    	=> $row->masa_laku,
				'telp_kantor'	    => $row->telp_kantor,
				'lama_tinggal'	    => $row->lama_tinggal,
				'nama_pasangan'	    => $row->nama_pasangan,
				'ttl_pasangan'	    => $row->ttl_pasangan,
				'alamat_ktp_pasangan' => $row->alamat_ktp_pasangan,
				'domisili_pasangan'	=> $row->domisili_pasangan,
				'pekerjaan_pasangan' => $row->pekerjaan_pasangan,
				'hp_pasangan'	    => $row->hp_pasangan,
				'nama_keluarga'	    => $row->nama_keluarga,
				'hubungan_keluarga'	=> $row->hubungan_keluarga,
				'alamat_keluarga'	=> $row->alamat_keluarga,
				'hp_keluarga'		=> $row->hp_keluarga
			]);

			$pathToSave = "C:/xampp/htdocs/minpro/cache/" . $row->nama_debitur . date('d-m-y') . ".docx";
			$templateProcessor->saveAs($pathToSave);
		}
		redirect('character?id_lb=' . $id_lb);
	}

	public function templateword2()
	{
		$id_lb = $_GET['id_lb'];
		$next = $this->db->query("SELECT * FROM latar_belakang WHERE id_lb='$id_lb'");
        foreach ($next->result() as $row) {
            require 'vendor/autoload.php';
            $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor("C:/xampp/htdocs/minpro/cache/" . $row->nama_debitur . date('d-m-y') . ".docx");
        }
		$surat = $this->db->query("SELECT * FROM riwayat_pinjaman WHERE id_lb='$id_lb'");
		foreach ($surat->result() as $row) {

			$replacements = array();
			$i = 1;
			foreach ($surat->result() as $row) {

				$replacements[] = array(
					'no'    => $i,
					'plafond'    => number_format($row->plafond),
					'status'        => $row->status,
					'saldo'        => $row->saldo,
					'sejarah'  => $row->sejarah,
					'data'  => $row->data
				);
				$i++;
			}
			$templateProcessor->cloneRowAndSetValues('plafond', $replacements);

			foreach ($next->result() as $row) {
                $pathToSave = "C:/xampp/htdocs/minpro/cache/" . $row->nama_debitur . date('d-m-y') . ".docx";
                $templateProcessor->saveAs($pathToSave);
            }
			redirect('character?id_lb=' . $id_lb);
		}
	}

	public function hapus(){
        $idt = $this->input->post('idt2');        
        $this->m_kredit->hapus_data($idt);
    }

	/*
    public function add()
	{
		setlocale(LC_ALL, 'id-ID', 'id_ID');

        $cif_bank			= $this->input->post('cif_bank');
		$tgl_analisa		= $this->input->post('tgl_analisa');
		$tgl_permohonan     = $this->input->post('tgl_permohonan');
		$plafon      		= $this->input->post('plafon');
		$jangka_waktu      	= $this->input->post('jangka_waktu');
		$sifat_kredit      	= $this->input->post('sifat_kredit');
		$suku_bunga      	= $this->input->post('suku_bunga');
		$jenis_permohonan   = $this->input->post('jenis_permohonan');
		$tujuan_permohonan  = $this->input->post('tujuan_permohonan');
		$ket_penggunaan     = $this->input->post('ket_penggunaan');
		$nama_debitur      	= $this->input->post('nama_debitur');
		$status_kawin      	= $this->input->post('status_kawin');
		$ttl_nasabah      	= $this->input->post('ttl_nasabah');
		$ktp      			= $this->input->post('ktp');
		$alamat_ktp_nasabah = $this->input->post('alamat_ktp_nasabah');
		$domisili_nasabah   = $this->input->post('domisili_nasabah');
		$hp_nasabah      	= $this->input->post('hp_nasabah');
		$status_tt      	= $this->input->post('status_tt');
		$pekerjaan_nasabah  = $this->input->post('pekerjaan_nasabah');
		$tanggungan      	= $this->input->post('tanggungan');
		$pendidikan      	= $this->input->post('pendidikan');
		$jenis_kelamin      = $this->input->post('jenis_kelamin');
		$masa_laku      	= $this->input->post('masa_laku');
		$telp_kantor      	= $this->input->post('telp_kantor');
		$lama_tinggal      	= $this->input->post('lama_tinggal');
		$nama_pasangan      = $this->input->post('nama_pasangan');
		$ttl_pasangan      	= $this->input->post('ttl_pasangan');
		$alamat_ktp_pasangan= $this->input->post('alamat_ktp_pasangan');
		$domisili_pasangan  = $this->input->post('domisili_pasangan');
		$pekerjaan_pasangan = $this->input->post('pekerjaan_pasangan');
		$hp_pasangan      	= $this->input->post('hp_pasangan');
		$nama_keluarga      = $this->input->post('nama_keluarga');
		$hubungan_keluarga	= $this->input->post('hubungan_keluarga');
		$alamat_keluarga	= $this->input->post('alamat_keluarga');
		$hp_keluarga		= $this->input->post('hp_keluarga');
		$pf1		= $this->input->post('pf1');
		$pf2		= $this->input->post('pf2');
		$pf3		= $this->input->post('pf3');
		$pf4		= $this->input->post('pf4');
		$pf5		= $this->input->post('pf5');
		$st1		= $this->input->post('st1');
		$st2		= $this->input->post('st2');
		$st3		= $this->input->post('st3');
		$st4		= $this->input->post('st4');
		$st5		= $this->input->post('st5');
		$sd1		= $this->input->post('sd1');
		$sd2		= $this->input->post('sd2');
		$sd3		= $this->input->post('sd3');
		$sd4		= $this->input->post('sd4');
		$sd5		= $this->input->post('sd5');
		$sj1		= $this->input->post('sj1');
		$sj2		= $this->input->post('sj2');
		$sj3		= $this->input->post('sj3');
		$sj4		= $this->input->post('sj4');
		$sj5		= $this->input->post('sj5');
		$dt1		= $this->input->post('dt1');
		$dt2		= $this->input->post('dt2');
		$dt3		= $this->input->post('dt3');
		$dt4		= $this->input->post('dt4');
		$dt5		= $this->input->post('dt5');

        require 'vendor/autoload.php';
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('test.docx');


        $templateProcessor->setValues([
            'cif_bank'	    	=> $cif_bank,
			'tgl_analisa'	    => date('d-m-Y',$tgl_analisa),
			'tgl_permohonan'	=> date('d-m-Y',$tgl_permohonan),
			'plafon'	    	=> number_format($plafon),
			'jangka_waktu'	    => $jangka_waktu,
			'sifat_kredit'	    => $sifat_kredit,
			'suku_bunga'	    => $suku_bunga,
			'jenis_permohonan'	=> $jenis_permohonan,
			'tujuan_permohonan'	=> $tujuan_permohonan,
			'ket_penggunaan'	=> $ket_penggunaan,
			'nama_debitur'	    => $nama_debitur,
			'status_kawin'	    => $status_kawin,
			'ttl_nasabah'	    => $ttl_nasabah,
			'ktp'	    		=> $ktp,
			'alamat_ktp_nasabah'=> $alamat_ktp_nasabah,
			'domisili_nasabah'	=> $domisili_nasabah,
			'hp_nasabah'	    => $hp_nasabah,
			'status_tt'	    	=> $status_tt,
			'pekerjaan_nasabah'	=> $pekerjaan_nasabah,
			'tanggungan'	    => $tanggungan,
			'pendidikan'	    => $pendidikan,
			'jenis_kelamin'	    => $jenis_kelamin,
			'masa_laku'	    	=> $masa_laku,
			'telp_kantor'	    => $telp_kantor,
			'lama_tinggal'	    => $lama_tinggal,
			'nama_pasangan'	    => $nama_pasangan,
			'ttl_pasangan'	    => $ttl_pasangan,
			'alamat_ktp_pasangan'=> $alamat_ktp_pasangan,
			'domisili_pasangan'	=> $domisili_pasangan,
			'pekerjaan_pasangan'=> $pekerjaan_pasangan,
			'hp_pasangan'	    => $hp_pasangan,
			'nama_keluarga'	    => $nama_keluarga,
			'hubungan_keluarga'	=> $hubungan_keluarga,
			'alamat_keluarga'	=> $alamat_keluarga,
			'hp_keluarga'		=> $hp_keluarga
        ]);

        header("Content-Disposition: attachment; filename=$nama_debitur.pdf");

        $templateProcessor->saveAs('php://output');

        }
*/
}
