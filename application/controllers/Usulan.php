<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usulan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_usulan');
        $this->load->helper('url');
        $this->load->library(array('session'));
    }

    public function index()
    {
        $data['id_lb'] = $_GET['id_lb'];
        $id_lb = $_GET['id_lb'];
        $data['title'] = 'Usulan';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['query'] = $this->m_usulan->tampil_data($id_lb);
        $data['select'] = $this->m_usulan->data_select();
        $data['analis'] = $this->m_usulan->data_analis();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kredit/usulan', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $id_usulan = $this->input->post('id_usulan');
        $this->m_usulan->add_data($id_usulan);
    }

    public function analis()
    {
        $nama = $this->input->post('nama');
        $this->m_usulan->add_analis($nama);
    }

    public function cari()
    {
        $notaris = $_GET['notaris'];
        $cari = $this->m_usulan->cari($notaris)->result();
        echo json_encode($cari);
    }

    public function cari_analis()
    {
        $nama = $_GET['nama'];
        $cari = $this->m_usulan->cari($nama)->result();
        echo json_encode($cari);
    }

    public function templateword()
    {
        $next = $this->db->query("SELECT * FROM latar_belakang ORDER BY id_lb DESC LIMIT 1");
        foreach ($next->result() as $row) {
            require 'vendor/autoload.php';
            $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor("C:/xampp/htdocs/minpro/cache/" . $row->nama_debitur . date('d-m-y') . ".docx");
        }
        $id_usulan = $_GET['id_usulan'];
        $surat = $this->db->query("SELECT * FROM usulan 
                                            JOIN capital_b ON usulan.id_lb=capital_b.id_lb
                                            WHERE id_usulan='$id_usulan'");
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
                $pathToSave = "C:/xampp/htdocs/minpro/cache/" . $row->nama_debitur . date('d-m-y') . ".docx";
                $templateProcessor->saveAs($pathToSave);
            }
            $surat = array(
                'id_analisis'         => $id_analisis,
                'nama_ao'    => $user['name'],
                'file'        => "cache/".$row->nama_debitur.date('d-m-y').".docx",
                'status'         => 'Diserahkan'
            );
            $this->db->insert('analisis', $surat);        
            redirect('analisis');
        }
    }
}
