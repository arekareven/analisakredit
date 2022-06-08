<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pdf_collateral extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_collateral', 'm_collateral_tanah');
        $this->load->library('Pdf'); // MEMANGGIL LIBRARY YANG KITA BUAT TADI
    }

    function index()
    {
        $pdf = new FPDF('P', 'mm', 'A4');
        // membuat halaman baru
        $pdf->AddPage();
        // margin
        $pdf->SetMargins(10, 10, 10);
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Times', 'B', 12);
        // mencetak string 
        $pdf->Cell(79, 5.5, '6. COLLATERAL (JAMINAN)', 0, 1, '');
        $pdf->Cell(5, 5.5, '', 0, 1);

        $no = 0;
        $id_lb = $_GET['id_lb'];
        $lb = $this->db->get_where('collateral_tanah', array('id_lb' => $id_lb))->result();
        foreach ($lb as $data) {

            $no++;
            $pdf->Cell(79, 5.5, $no . '. Sebidang tanah ' . $data->jenis . ' dengan kondisi :', 0, 1, '');
            $pdf->Cell(5, 5.5, '', 0, 1, '');
            $pdf->SetFont('Times', '', 12);
            $pdf->Cell(49, 5.5, 'Nama Pemilik', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->nama, 0, 1);
            $pdf->Cell(49, 5.5, 'Alamat Pemilik', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->alamat, 0, 1);
            $pdf->Cell(49, 5.5, 'No. SHM', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->no_shm, 0, 1);
            $pdf->Cell(49, 5.5, 'Lokasi Jaminan', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->lokasi, 0, 1);
            $pdf->Cell(49, 5.5, 'Tanggal Surat Ukur', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->tgl_ukur, 0, 1);
            $pdf->Cell(49, 5.5, 'No. di Surat Ukur', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->no_ukur, 0, 1);
            $pdf->Cell(49, 5.5, 'Luas Tanah', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(59, 5.5, $data->luas_t, 0, 1);
            $pdf->Cell(49, 5.5, 'Kepemilikan	', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(59, 5.5, $data->milik, 0, 1);
            $pdf->Cell(49, 5.5, 'Fisik Jaminan', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->MultiCell(0, 5.5, $data->fisik_jaminan);
            $pdf->Cell(5, 5.5, '', 0, 1, '');

            $pdf->Cell(49, 5.5, 'Taksiran Harga', 0, 1, '');
            $pdf->Cell(49, 5.5, '- Sebidang tanah ' . $data->jenis . ' :', 0, 1, '');
            $pdf->Cell(49, 5.5, 'Taksiran harga didasarkan SPPT :', 0, 1, '');
            $pdf->Cell(89, 5.5, 'Luas Tanah ' . $data->luas_t . ' M2 x Rp. ' . number_format($data->harga_t) . ',-', 0, 0, '');
            $pdf->Cell(25, 5.5, '= Rp.', 0, 0, '');
            $pdf->Cell(20, 5.5, number_format($this->taksiran_sppt_tanah()) . ',-', 0, 1, 'R');
            $pdf->Cell(89, 5.5, 'Luas Bangunan ' . $data->luas_b . ' M2 x Rp. ' . number_format($data->harga_b) . ',-', 0, 0, '');
            $pdf->Cell(25, 5.5, '= Rp.', 0, 0, '');
            $pdf->Cell(20, 5.5, number_format($this->taksiran_sppt_bangunan()) . ',-', 0, 1, 'R');
            $pdf->Cell(25, 5.5, '', 0, 1, '');

            $pdf->Cell(49, 5.5, 'Taksiran harga didasarkan Harga Pasar :', 0, 1, '');
            $pdf->Cell(89, 5.5, 'Luas Tanah ' . $data->luas_t . ' M2 x Rp. ' . number_format($data->harga_t2) . ',-', 0, 0, '');
            $pdf->Cell(25, 5.5, '= Rp.', 0, 0, '');
            $pdf->Cell(20, 5.5, number_format($this->taksiran_pasar_tanah()) . ',-', 0, 1, 'R');
            $pdf->Cell(89, 5.5, 'Luas Bangunan ' . $data->luas_b . ' M2 x Rp. ' . number_format($data->harga_b2) . ',-', 0, 0, '');
            $pdf->Cell(25, 5.5, '= Rp.', 0, 0, '');
            $pdf->Cell(20, 5.5, number_format($this->taksiran_pasar_bangunan()) . ',-', 0, 1, 'R');
            $pdf->Cell(25, 5.5, '', 0, 1, '');

            $pdf->Cell(49, 5.5, 'Taksiran Harga Bank adalah', 0, 1, '');
            $pdf->Cell(89, 5.5, 'Rp. ' . number_format($this->taksiran_pasar_tanah()) . ',- x 60%', 0, 0, '');
            $pdf->Cell(25, 5.5, '= Rp.', 0, 0, '');
            $pdf->Cell(20, 5.5, number_format($this->taksasi()) . ',-', 0, 1, 'R');
            $pdf->Cell(25, 5.5, '', 0, 1, '');

            $pdf->Cell(89, 5.5, 'HT Rp. ' . number_format($this->plafond()) . ',- x 125%', 0, 0, '');
            $pdf->Cell(25, 5.5, '= Rp.', 0, 0, '');
            $pdf->Cell(20, 5.5, number_format($this->ht()) . ',-', 0, 1, 'R');
            $pdf->Cell(25, 5.5, '', 0, 1, '');

            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(89, 5.5, 'Harga Tanah Rp. ' . number_format($this->taksiran_pasar_tanah()) . ',-', 0, 1, '');
            $pdf->Cell(89, 5.5, 'SPPT Rp. ' . number_format($this->taksiran_sppt_tanah()) . ',-', 0, 1, '');
            $pdf->Cell(89, 5.5, 'Taksasi Rp. ' . number_format($this->taksasi()) . ',-', 0, 1, '');

            $pdf->SetFont('Times', '', 12);
            $pdf->Cell(49, 5.5, '', 0, 1, '');
            $pdf->Cell(49, 5.5, 'Usulan :', 0, 1, '');
            $pdf->Cell(49, 5.5, $data->usulan, 0, 1, '');
            $pdf->Cell(49, 5.5, '', 0, 1, '');
            $pdf->Cell(49, 5.5, '', 0, 1, '');
        }

        $lb = $this->db->get_where('collateral', array('id_lb' => $id_lb))->result();
        foreach ($lb as $data) {

            $no++;
            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(79, 5.5, $no . '. Kendaraan bermotor roda ' . $data->roda, 0, 1, '');
            $pdf->Cell(5, 5.5, '', 0, 1, '');
            $pdf->SetFont('Times', '', 12);
            $pdf->Cell(49, 5.5, 'Nomor Polisi', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->nopol, 0, 1);
            $pdf->Cell(49, 5.5, 'Nama di STNK', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->nama_stnk, 0, 1);
            $pdf->Cell(49, 5.5, 'Alamat', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->alamat, 0, 1);
            $pdf->Cell(49, 5.5, 'Merk / Type', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->type, 0, 1);
            $pdf->Cell(49, 5.5, 'Jenis / Model', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->jenis, 0, 1);
            $pdf->Cell(49, 5.5, 'Tahun', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->tahun, 0, 1);
            $pdf->Cell(49, 5.5, 'Warna', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(59, 5.5, $data->warna, 0, 1);
            $pdf->Cell(49, 5.5, 'Isi Silinder	', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(59, 5.5, $data->silinder, 0, 1);
            $pdf->Cell(49, 5.5, 'No. Rangka', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(59, 5.5, $data->no_rangka, 0, 1);
            $pdf->Cell(49, 5.5, 'No. Mesin', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(59, 5.5, $data->no_mesin, 0, 1);
            $pdf->Cell(49, 5.5, 'No. BPKB', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(59, 5.5, $data->no_bpkb, 0, 1);
            $pdf->Cell(49, 5.5, 'Kepemilikan', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(59, 5.5, $data->milik, 0, 1);
            $pdf->Cell(5, 5.5, '', 0, 1, '');

            /*
            $pdf->Cell(49, 5.5, 'Taksiran Harga', 0, 1, '');
            $pdf->Cell(49, 5.5, '- Sebidang tanah '.$data->jenis.' :', 0, 1, '');
            $pdf->Cell(49, 5.5, 'Taksiran harga didasarkan SPPT :', 0, 1, '');
            $pdf->Cell(89, 5.5, 'Luas Tanah '.$data->luas_t.' M2 x Rp. '.number_format($data->harga_t).',-', 0, 0, '');
            $pdf->Cell(25, 5.5, '= Rp.', 0, 0, '');
            $pdf->Cell(13, 5.5, number_format($data->harga_t).',-', 0, 1, 'R');
            $pdf->Cell(89, 5.5, 'Luas Bangunan '.$data->luas_b.' M2 x Rp. '.number_format($data->harga_b).',-', 0, 0, '');
            $pdf->Cell(25, 5.5, '= Rp.', 0, 0, '');
            $pdf->Cell(13, 5.5, number_format($data->harga_b).',-', 0, 1, 'R');
            $pdf->Cell(89, 5.5, 'Total', 0, 0, 'C');
            $pdf->Cell(25, 5.5, '= Rp.', 0, 0, '');
            $pdf->Cell(13, 5.5, number_format($data->harga_b).',-', 0, 1, 'R');
            $pdf->Cell(25, 5.5, '', 0, 1, '');
            
            $pdf->Cell(49, 5.5, 'Taksiran harga didasarkan Harga Pasar :', 0, 1, '');
            $pdf->Cell(89, 5.5, 'Luas Tanah '.$data->luas_t.' M2 x Rp. '.number_format($data->harga_t2).',-', 0, 0, '');
            $pdf->Cell(25, 5.5, '= Rp.', 0, 0, '');
            $pdf->Cell(13, 5.5, number_format($data->harga_t).',-', 0, 1, 'R');
            $pdf->Cell(89, 5.5, 'Luas Bangunan '.$data->luas_b.' M2 x Rp. '.number_format($data->harga_b2).',-', 0, 0, '');
            $pdf->Cell(25, 5.5, '= Rp.', 0, 0, '');
            $pdf->Cell(13, 5.5, number_format($data->harga_b2).',-', 0, 1, 'R');
            $pdf->Cell(89, 5.5, 'Total', 0, 0, 'C');
            $pdf->Cell(25, 5.5, '= Rp.', 0, 0, '');
            $pdf->Cell(13, 5.5, number_format($data->harga_b2).',-', 0, 1, 'R');
            $pdf->Cell(25, 5.5, '', 0, 1, '');
            
            $pdf->Cell(49, 5.5, 'Taksiran Harga Tanah adalah', 0, 1, '');
            $pdf->Cell(25, 5.5, '', 0, 1, '');
            $pdf->Cell(89, 5.5, 'Rp. '.number_format($data->luas_b).',-  +  Rp. '.number_format($data->harga_b2).',- x 60%', 0, 0, '');
            $pdf->Cell(25, 5.5, '= Rp.', 0, 0, '');
            $pdf->Cell(13, 5.5, number_format($data->harga_b2).',-', 0, 1, 'R');
            $pdf->Cell(89, 5.5, '2', 0, 0, 'C');
            $pdf->Cell(25, 5.5, '= Rp.', 0, 0, '');
            $pdf->Cell(13, 5.5, number_format($data->harga_b2).',-', 0, 1, 'R');
            $pdf->Cell(25, 5.5, '', 0, 1, '');
            
            $pdf->Cell(49, 5.5, 'Mengusulkan melebihi taksasi Bank sebesar '.$data->taksasi.'% dari harga pasar dengan perhitungan sbb :', 0, 1, '');
            $pdf->Cell(49, 5.5, 'Taksiran Bank Harga Tanah adalah', 0, 1, '');
            $pdf->Cell(89, 5.5, 'Rp. '.number_format($data->luas_b).',-  +  Rp. '.number_format($data->harga_b2).',- x '.$data->taksasi.'%', 0, 0, '');
            $pdf->Cell(25, 5.5, '= Rp.', 0, 0, '');
            $pdf->Cell(13, 5.5, number_format($data->harga_b2).',-', 0, 1, 'R');
            $pdf->Cell(89, 5.5, '2', 0, 1, 'C');
            $pdf->Cell(25, 5.5, '', 0, 1, '');
*/
            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(89, 5.5, 'Harga pasaran Rp. ' . $data->taksiran . ',-', 0, 1, '');
            $pdf->Cell(89, 5.5, 'Taksasi harga bank Rp. ' . number_format($this->taksasi_kendaraan()) . ',-', 0, 1, '');
            $pdf->Cell(89, 5.5, '', 0, 1, '');

            $pdf->SetFont('Times', '', 12);
            $pdf->Cell(89, 5.5, 'NL Rp. ' . $data->nl . ',-', 0, 1, '');
            $pdf->Cell(89, 5.5, '', 0, 1, '');

            $pdf->Cell(49, 5.5, 'Usulan :', 0, 1, '');
            $pdf->Cell(49, 5.5, $data->usulan, 0, 1, '');
            $pdf->Cell(49, 5.5, '', 0, 1, '');
            $pdf->Cell(49, 5.5, '', 0, 1, '');
        }

        $pdf->Output();
    }

    function taksasi_tanah()
    {
        $id_lb = $_GET['id_lb'];
        $lb = $this->db->get('collateral_tanah', array('id_lb' => $id_lb))->result();
        foreach ($lb as $data) {
            $taksasi_tanah = (($data->harga_t + $data->harga_t2) / 2) * (60 / 100);
        }
        return $taksasi_tanah;
    }

    function taksasi_kendaraan()
    {
        $id_lb = $_GET['id_lb'];
        $lb = $this->db->get('collateral', array('id_lb' => $id_lb))->result();
        foreach ($lb as $data) {
            $taksasi_kendaraan = $data->taksiran  * (70 / 100);
        }
        return $taksasi_kendaraan;
    }

    function taksiran_sppt_tanah()
    {
        $id_lb = $_GET['id_lb'];
        $lb = $this->db->get('collateral_tanah', array('id_lb' => $id_lb))->result();
        foreach ($lb as $data) {
            $taksiran_sppt_tanah = $data->luas_t  * $data->harga_t;
        }
        return $taksiran_sppt_tanah;
    }

    function taksiran_sppt_bangunan()
    {
        $id_lb = $_GET['id_lb'];
        $lb = $this->db->get('collateral_tanah', array('id_lb' => $id_lb))->result();
        foreach ($lb as $data) {
            $taksiran_sppt_bangunan = $data->luas_b  * $data->harga_b;
        }
        return $taksiran_sppt_bangunan;
    }

    function taksiran_pasar_tanah()
    {
        $id_lb = $_GET['id_lb'];
        $lb = $this->db->get('collateral_tanah', array('id_lb' => $id_lb))->result();
        foreach ($lb as $data) {
            $taksiran_pasar_tanah = $data->luas_t  * $data->harga_t2;
        }
        return $taksiran_pasar_tanah;
    }

    function taksiran_pasar_bangunan()
    {
        $id_lb = $_GET['id_lb'];
        $lb = $this->db->get('collateral_tanah', array('id_lb' => $id_lb))->result();
        foreach ($lb as $data) {
            $taksiran_pasar_bangunan = $data->luas_b  * $data->harga_b2;
        }
        return $taksiran_pasar_bangunan;
    }

    function taksasi()
    {
        $taksasi = $this->taksiran_pasar_tanah() * (60 / 100);
        return $taksasi;
    }

    function ht()
    {
        $ht = $this->plafond()  * (125 / 100);
        return $ht;
    }

    function plafond()
    {
        $id_lb = $_GET['id_lb'];
        $next = $this->db->query("SELECT * FROM latar_belakang WHERE id_lb='$id_lb'");
        foreach ($next->result() as $row) {
            $ht = $row->plafon;
        }
        return $ht;
    }
}
