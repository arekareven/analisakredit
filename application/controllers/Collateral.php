<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Collateral extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_collateral');
        $this->load->helper('url');
        $this->load->library(array('session'));
    }

    public function index()
    {
        $data['id_lb'] = $_GET['id_lb'];
        $id_lb = $_GET['id_lb'];
        $data['title'] = 'Collateral';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['query'] = $this->m_collateral->tampil_data($id_lb);
        $data['query2'] = $this->m_collateral->tampil_data2($id_lb);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kredit/collateral', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $id_col = $this->input->post('id_col');

        $query = $this->m_collateral->cek_id($id_col)->num_rows();
        if (empty($query))
            $this->m_collateral->add_data($id_col);
        else
            $this->m_collateral->edit_data($id_col);
    }

    public function add2()
    {
        $id_col2 = $this->input->post('id_col2');

        $query = $this->m_collateral->cek_id2($id_col2)->num_rows();
        if (empty($query))
            $this->m_collateral->add_data2($id_col2);
        else
            $this->m_collateral->edit_data2($id_col2);
    }

    public function next()
    {
        $id_lb = $_GET['id_lb'];
        redirect('usulan?id_lb=' . $id_lb);
    }

    public function templateword()
    {
        $id_lb = $_GET['id_lb'];
        $next = $this->db->query("SELECT * FROM latar_belakang WHERE id_lb='$id_lb'");
        foreach ($next->result() as $row) {
            require 'vendor/autoload.php';
            $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor("C:/xampp/htdocs/analisakredit/cache/" . $row->nama_debitur . date('d-m-y') . ".docx");
        }
        $surat = $this->db->query("SELECT * FROM collateral WHERE id_lb='$id_lb'");
        if ($surat == 0) {
            $templateProcessor->deleteBlock('test');
        } else {
            $replacements = array();
            foreach ($surat->result() as $row) {

                $replacements[] = array(
                    'roda'    => $row->roda,
                    'nopol'    => $row->nopol,
                    'nama_stnk'        => $row->nama_stnk,
                    'alamat'        => $row->alamat,
                    'type'  => $row->type,
                    'jenis'  => $row->jenis,
                    'tahun'     => $row->tahun,
                    'warna'     => $row->warna,
                    'silinder'   => $row->silinder,
                    'no_rangka'          => $row->no_rangka,
                    'no_mesin'      => $row->no_mesin,
                    'no_bpkb'          => $row->no_bpkb,
                    'milik'      => $row->milik,
                    'taksiran'    => number_format($row->taksiran),
                    'nl'    => number_format($row->nl),
                    'hb'    => number_format($row->taksiran * 0.7),
                    'kondisi'    => $row->kondisi
                );
            }
            $templateProcessor->cloneBlock('test', count($replacements), true, false, $replacements);

            foreach ($next->result() as $row) {
                $pathToSave = "C:/xampp/htdocs/analisakredit/cache/" . $row->nama_debitur . date('d-m-y') . ".docx";
                $templateProcessor->saveAs($pathToSave);
            }
        }
        redirect('test?id_lb=' . $row->id_lb);
    }

    public function templateword2()
    {
        $id_lb = $_GET['id_lb'];
        $next = $this->db->query("SELECT * FROM latar_belakang WHERE id_lb='$id_lb'");
        foreach ($next->result() as $row) {
            require 'vendor/autoload.php';
            $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor("C:/xampp/htdocs/analisakredit/cache/" . $row->nama_debitur . date('d-m-y') . ".docx");
        }
        $surat = $this->db->query("SELECT * FROM collateral_tanah WHERE id_lb=$id_lb");
        if ($surat == 0) {
            $templateProcessor->deleteBlock('test2');
        } else {
            $replacements = array();
            foreach ($surat->result() as $row) {

                $replacements[] = array(
                    $total1 = ($row->luas_t * $row->harga_t) + ($row->luas_b * $row->harga_b),
                    $total2 = ($row->luas_t * $row->harga_t2) + ($row->luas_b * $row->harga_b2),
                    'jenis'    => $row->jenis,
                    'nama'        => $row->nama,
                    'alamat'        => $row->alamat,
                    'no_shm'  => $row->no_shm,
                    'lokasi'     => $row->lokasi,
                    'tgl_ukur'     => $row->tgl_ukur,
                    'no_ukur'   => $row->no_ukur,
                    'milik'      => $row->milik,
                    'fisik_jaminan'          => $row->fisik_jaminan,
                    'luas_t'          => $row->luas_t,
                    'luas_b'          => $row->luas_b,
                    'harga_t'          => number_format($row->harga_t),
                    'harga_b'          => number_format($row->harga_b),
                    'harga_t2'          => number_format($row->harga_t2),
                    'harga_b2'          => number_format($row->harga_b2),
                    'ht1'          => number_format($row->luas_t * $row->harga_t),
                    'hb1'          => number_format($row->luas_b * $row->harga_b),
                    'ht2'          => number_format($row->luas_t * $row->harga_t2),
                    'hb2'          => number_format($row->luas_b * $row->harga_b2),
                    't'          => number_format(($row->luas_t * $row->harga_t) + ($row->luas_b * $row->harga_b)),
                    't2'          => number_format(($row->luas_t * $row->harga_t2) + ($row->luas_b * $row->harga_b2)),
                    'tb'    => number_format(($total1 + $total2) * 0.3),
                    'ht'    => number_format($row->ht),
                    'taksasi'    => $row->taksasi,
                    'ut'    => number_format((($total1 + $total2) / 2) * ($row->taksasi / 100)),
                    'pertimbangan'    => $row->pertimbangan
                );
            }
            $templateProcessor->cloneBlock('test2', count($replacements), true, false, $replacements);

            foreach ($next->result() as $row) {
                $pathToSave = "C:/xampp/htdocs/analisakredit/cache/" . $row->nama_debitur . date('d-m-y') . ".docx";
                $templateProcessor->saveAs($pathToSave);
            }
        }
        redirect('test?id_lb=' . $row->id_lb);
    }
}
