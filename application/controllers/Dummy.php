<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dummy extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_dummy');
    }

    public function index()
    {
        $data['title'] = 'DUMMY';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['query'] = $this->m_dummy->tampil_data();
        $data['query2'] = $this->m_dummy->tampil_data2();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dummy/dummyori', $data);
        $this->load->view('templates/footer');
    }

    public function bismillah()
    {
        $data['title'] = 'DUMMY';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('dummy/bismillah', $data);
    }

    public function add()
    {
        $this->m_dummy->add_data();
    }

    public function add2()
    {
        $this->m_dummy->add_data2();
    }

    public function add3()
    {
        $this->m_dummy->add_data3();
    }

    public function dummy()
    {
        $saldo = $_GET['saldo'];
        $surat = $this->db->query("SELECT * FROM dummy WHERE saldo='$saldo'");


        foreach ($surat->result() as $row) {
            $total[] = $row->pemasukan;
        }
        $sum = array_sum($total);
        var_dump($sum);
        die;
    }


    public function templateword()
    {
        /*
        $saldo ini adalah data dummy dari $id_lb
        */
        $saldo = $_GET['saldo'];
        require 'vendor/autoload.php';
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor("C:/xampp/htdocs/analisakredit/uji.docx");

        $surat = $this->db->query("SELECT * FROM dummy WHERE saldo='$saldo'");

        foreach ($surat->result() as $row) {
            $total[] = $row->pemasukan;
        }
        $sum = array_sum($total);

        foreach ($surat->result() as $row) {

            $replacements = array();
            foreach ($surat->result() as $row) {

                $replacements[] = array(
                    'keterangan'    => $row->keterangan,
                    'pemasukan'        => number_format($row->pemasukan),
                    'pengeluaran'        => number_format($row->pengeluaran),
                    'total'  => number_format($sum)
                );
            }
            $templateProcessor->cloneRowAndSetValues('keterangan', $replacements);

            $pathToSave = "C:/xampp/htdocs/analisakredit/cache/uji.docx";
            $templateProcessor->saveAs($pathToSave);
            redirect('dummy');
        }
    }

    public function templateword2()
    {
        $saldo = $_GET['saldo'];
        require 'vendor/autoload.php';
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor("C:/xampp/htdocs/analisakredit/uji.docx");

        $surat = $this->db->query("SELECT * FROM dummy WHERE saldo='$saldo'");

        /*
        foreach ($surat->result() as $row) {
            $total[] = $row->pemasukan;
        }
        $sum = array_sum($total);
        */

        $replacements = array();
        $i = 1;
        foreach ($surat->result() as $row) {

            $replacements[] = array(
                'no'    => $row->dari
            );
            $i++;
        }
        $templateProcessor->cloneBlock('test', count($replacements), true, false, $replacements);

        $pathToSave = "C:/xampp/htdocs/analisakredit/cache/uji.docx";
        $templateProcessor->saveAs($pathToSave);

        redirect('dummy');
    }

    public function templateword3()
    {
        $id_lb = $_GET['id_lb'];
        require 'vendor/autoload.php';
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor("C:/xampp/htdocs/analisakredit/uji.docx");

        $surat = $this->db->query("SELECT * FROM bismillah WHERE id_lb='$id_lb' AND no1='I' OR no1='II' OR no1='III' OR no1='IV'");

        $replacements = array();
        $i = 1;
        foreach ($surat->result() as $row) {
            $a[] = $row->pemasukan2 + $row->pemasukan3 + $row->pemasukan4 + $row->pemasukan5;
            $b[] = $row->pengeluaran2 + $row->pengeluaran3 + $row->pengeluaran4 + $row->pengeluaran5;

            $replacements[] = array(
                'no1'        => $row->no1,
                'no2'    => $row->no2,
                'no3'            => $row->no3,
                'no4'        => $row->no4,
                'no5'        => $row->no5,
                'keterangan1'        => $row->keterangan1,
                'keterangan2'        => $row->keterangan2,
                'keterangan3'        => $row->keterangan3,
                'keterangan4'        => $row->keterangan4,
                'keterangan5'        => $row->keterangan5,
                'keterangan6'        => $row->keterangan6,
                'pemasukan2'        => number_format($row->pemasukan2),
                'pemasukan3'        => number_format($row->pemasukan3),
                'pemasukan4'        => number_format($row->pemasukan4),
                'pemasukan5'        => number_format($row->pemasukan5),
                'pengeluaran2'        => number_format($row->pengeluaran2),
                'pengeluaran3'        => number_format($row->pengeluaran3),
                'pengeluaran4'        => number_format($row->pengeluaran4),
                'pengeluaran5'        => number_format($row->pengeluaran5),
                'saldo6'        => number_format($row->saldo6),
            );
            $i++;
        }
        $jumlah_pemasukan    = array_sum($a);
        $jumlah_pengeluaran    = array_sum($b);

        $templateProcessor->setValues([
            'a'    => number_format($jumlah_pemasukan),
            'b'        => number_format($jumlah_pengeluaran),
            'c'        => number_format($jumlah_pemasukan - $jumlah_pengeluaran)
        ]);

        $templateProcessor->cloneBlock('bismillah', count($replacements), true, false, $replacements);

        $pathToSave = "C:/xampp/htdocs/analisakredit/cache/uji.docx";
        $templateProcessor->saveAs($pathToSave);

        redirect('dummy');
    }


    public function templateword4()
    {
        $id_lb = $_GET['id_lb'];
        require 'vendor/autoload.php';
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor("C:/xampp/htdocs/analisakredit/uji.docx");

        $surat = $this->db->query("SELECT * FROM bismillah WHERE id_lb='$id_lb' AND no1='V' OR no1='VI' OR no1='VII' OR no1='VIII'");

        $replacements = array();
        $i = 1;
        foreach ($surat->result() as $row) {

            $replacements[] = array(
                'no1'        => $row->no1,
                'no2'    => $row->no2,
                'no3'            => $row->no3,
                'no4'        => $row->no4,
                'no5'        => $row->no5,
                'keterangan1'        => $row->keterangan1,
                'keterangan2'        => $row->keterangan2,
                'keterangan3'        => $row->keterangan3,
                'keterangan4'        => $row->keterangan4,
                'keterangan5'        => $row->keterangan5,
                'keterangan6'        => $row->keterangan6,
                'pemasukan2'        => number_format($row->pemasukan2),
                'pemasukan3'        => number_format($row->pemasukan3),
                'pemasukan4'        => number_format($row->pemasukan4),
                'pemasukan5'        => number_format($row->pemasukan5),
                'pengeluaran2'        => number_format($row->pengeluaran2),
                'pengeluaran3'        => number_format($row->pengeluaran3),
                'pengeluaran4'        => number_format($row->pengeluaran4),
                'pengeluaran5'        => number_format($row->pengeluaran5),
                'saldo6'        => number_format($row->saldo6),
            );
            $i++;
        }
        $templateProcessor->cloneBlock('bismillah2', count($replacements), true, false, $replacements);

        $pathToSave = "C:/xampp/htdocs/analisakredit/cache/uji.docx";
        $templateProcessor->saveAs($pathToSave);
        /*$templateProcessor->saveAs('php://output');*/

        redirect('dummy');
    }



    /* asumsi capital setelah kredit */
    public function templateword_cap()
    {
        $id_lb = $_GET['id_lb'];
        require 'vendor/autoload.php';
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor("C:/xampp/htdocs/analisakredit/uji.docx");

        $surat = $this->db->query("SELECT * FROM capital_b
                                        JOIN dummy ON capital_b.id_lb=dummy.id_lb 
                                        WHERE capital_b.id_lb='$id_lb'");
        $a = $this->kas($id_lb);
        foreach ($surat->result() as $row) {
            $kas = $row->kas + $a;

            $templateProcessor->setValues([
                'kas'    => number_format($kas),
                'tabungan'        => number_format($tabungan),
                'deposito'        => number_format($row->deposito),
                'piutang'  => number_format($row->piutang),
                'peralatan'  => number_format($row->peralatan),
                'barang'     => number_format($row->barang),
                'barang2'     => number_format($row->barang2),
                'barang3'     => number_format($row->barang3),
                'sewa'     => number_format($row->sewa),
                'lahan'   => number_format($row->lahan),
                'gedung'          => number_format($row->gedung),
                'operasional'      => number_format($row->operasional),
                'lain'          => number_format($row->lain),
                'total_al'      => number_format($row->total_al),
                'tanah'    => number_format($row->tanah),
                'bangunan'    => number_format($row->bangunan),
                'kendaraan'    => number_format($row->kendaraan),
                'inventaris'    => number_format($row->inventaris),
                'lain2'    => number_format($row->lain2),
                'total_at'    => number_format($row->total_at),
                'hutang_jpk'    => number_format($row->hutang_jpk),
                'hutang_jpg'    => number_format($row->hutang_jpg),
                'hutang_lain'    => number_format($row->hutang_lain),
                'hutang_dagang'    => number_format($row->hutang_dagang),
                'total_hutang'    => number_format($row->total_hutang),
                'modal'    => number_format($row->modal),
                'harta'    => number_format($row->harta),
                'total_kjb'    => number_format($row->total_kjb),
                'total_aset'    => number_format($row->total_aset)
            ]);

            $pathToSave = "C:/xampp/htdocs/analisakredit/cache/uji.docx";
            $templateProcessor->saveAs($pathToSave);
            redirect('dummy');
        }
    }

    public function kas($id_lb)
    {
        $surat = $this->db->query("SELECT * FROM dummy WHERE id_lb='$id_lb'");

        foreach ($surat->result() as $row) {
            if ($row->untuk = 1) {

                $jumlah[] = $row->pengeluaran;
                $jumlah2[] = $row->pemasukan;
            }
        }
        $jumlah_pengeluaran = array_sum($jumlah);
        $jumlah_pemasukan = array_sum($jumlah2);
        $a = $jumlah_pemasukan - $jumlah_pengeluaran;
        return $a;
    }
}
