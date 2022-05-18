<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cashflow extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_cashflow');
        $this->load->helper('url');
        $this->load->library(array('session'));
    }

    public function index()
    {
    }

    public function add()
    {
        $id_cf = $this->input->post('id_cf');
        $this->m_cashflow->add_data($id_cf);
    }

    public function cari()
    {
        $kode_perkiraan = $_GET['kode_perkiraan'];
        $cari = $this->m_cashflow->cari($kode_perkiraan)->result();
        echo json_encode($cari);
    }

    public function templateword()
    {
        $id_lb = $_GET['id_lb'];
        $next = $this->db->query("SELECT * FROM latar_belakang WHERE id_lb='$id_lb'");
        foreach ($next->result() as $row) {
            require 'vendor/autoload.php';
            $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor("C:/xampp/htdocs/analisakredit/cache/" . $row->nama_debitur . date('d-m-y') . ".docx");
        }
        $surat = $this->db->query("SELECT * FROM usulan 
                                            JOIN capital_b ON usulan.id_lb=capital_b.id_lb
                                            WHERE usulan.id_lb='$id_lb'");
        foreach ($surat->result() as $row) {

            $hutang = ($row->total_hutang / $row->total_al) * 100;
            if ($hutang <= 50) {
                $status = 'Layak';
            } else {
                $status = 'Tidak Layak';
            }

            /*
            if($hutang <= 50){
                $status = 'Layak';
            } else {
                $status = 'Tidak Layak';
            }
            */
            $user = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();

            $total = $row->provisi + $row->administrasi + $row->asuransi + $row->materai
                + $row->apht + $row->skmht + $row->titipan +
                $row->fiduciare + $row->legalisasi + $row->lain + $row->roya;

            $templateProcessor->setValues([
                'character'    => $row->character,
                'capacity'        => $row->capacity,
                'capital'        => $row->capital,
                'th'        => number_format($row->total_hutang),
                'hutang'        => number_format($hutang, 2, ",", ""),
                'al'        => number_format($row->total_al),
                'st'        => $status,
                'lr'        => number_format($row->laba_rugi),
                'coe'        => $row->coe,
                'collateral'  => $row->collateral,
                'plafond'  => number_format($row->plafond),
                'sifat'     => $row->sifat,
                'jenis'     => $row->jenis,
                'tujuan'   => $row->tujuan,
                'sektor'          => $row->sektor,
                'waktu'      => $row->waktu,
                'bunga'          => $row->bunga,
                'angsuran'      => number_format($row->angsuran),
                'denda'    => number_format($row->denda),
                'realisasi'    => date('d-m-Y', strtotime($row->realisasi)),
                'hak_tanggungan'    => number_format($row->tanggungan),
                'likuidasi'    => number_format($row->likuidasi),
                'lainnya'    => number_format($row->lainnya),
                'jaminan'    => $row->jaminan,
                'notaris'    => $row->notaris,
                'provisi'    => number_format($row->provisi),
                'administrasi'    => number_format($row->administrasi),
                'asuransi'    => number_format($row->asuransi),
                'materai'    => number_format($row->materai),
                'apht'    => number_format($row->apht),
                'skmht'    => number_format($row->skmht),
                'titipan'    => number_format($row->titipan),
                'fiduciare'    => number_format($row->fiduciare),
                'legalisasi'    => number_format($row->legalisasi),
                'lain'    => number_format($row->lain),
                'roya'    => number_format($row->roya),
                'total_notaris'    => number_format($total),
                'proses'    => number_format($row->proses),
                'sertifikat'    => number_format($row->sertifikat),
                'akta_notaris'    => number_format($row->akta),
                'pendaftaran'    => number_format($row->pendaftaran),
                'plotting'    => number_format($row->plotting),
                'user'    => $user['name']
            ]);
            foreach ($next->result() as $row) {
                $pathToSave = "C:/xampp/htdocs/analisakredit/cache/" . $row->nama_debitur . date('d-m-y') . ".docx";
                $templateProcessor->saveAs($pathToSave);
            }
            $surat = array(
                'id_analisis'         => $id_analisis,
                'nama_ao'    => $user['name'],
                'file'        => $row->nama_debitur . date('d-m-y') . ".docx",
                'status'         => 'Diserahkan'
            );
            $this->db->insert('analisis', $surat);
            redirect('analisis');
        }
    }
}
