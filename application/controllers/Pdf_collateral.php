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

            $taksiran_sppt_tanah = $data->luas_t * $data->harga_t;

            $taksiran_sppt_bangunan = $data->luas_b  * $data->harga_b;

            $taksiran_pasar_tanah = $data->luas_t  * $data->harga_t2;

            $taksiran_pasar_bangunan = $data->luas_b  * $data->harga_b2;

            $taksasi = ($taksiran_pasar_tanah + $taksiran_pasar_bangunan) * ($data->taksasi/100);

            $ht = $data->ht  * (125 / 100);

            $no++;
            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(79, 5.5, $no . '. Sebidang tanah ' . $data->jenis . ' dengan kondisi :', 0, 1, '');
            $pdf->Cell(5, 5.5, '', 0, 1, '');
            $pdf->SetFont('Times', '', 12);
            $pdf->Cell(49, 5.5, 'Nama Pemilik', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->nama, 0, 1);
            $pdf->Cell(49, 5.5, 'Alamat Pemilik', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->MultiCell(0, 5.5, $data->alamat, 0, 1);
            $pdf->Cell(49, 5.5, 'No. SHM', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->no_shm, 0, 1);
            $pdf->Cell(49, 5.5, 'Lokasi Jaminan', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->lokasi, 0, 1);
            $pdf->Cell(49, 5.5, 'Tanggal Surat Ukur', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, date('d-m-Y', strtotime($data->tgl_ukur)), 0, 1);
            $pdf->Cell(49, 5.5, 'No. di Surat Ukur', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->no_ukur, 0, 1);
            $pdf->Cell(49, 5.5, 'Luas Tanah', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(10, 5.5, $data->luas_t, 0, 0);
            $pdf->Cell(49, 5.5, 'M2', 0, 1, '');
            $pdf->Cell(49, 5.5, 'Kepemilikan	', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(59, 5.5, $data->milik, 0, 1);
            $pdf->Cell(49, 5.5, 'Keterangan', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->MultiCell(0, 5.5, $data->fisik_jaminan);
            $pdf->Cell(5, 5.5, '', 0, 1, '');

            $pdf->Cell(49, 5.5, 'Taksiran Harga', 0, 1, '');
            $pdf->Cell(49, 5.5, '- Sebidang tanah ' . $data->jenis . ' :', 0, 1, '');
            $pdf->Cell(49, 5.5, 'Taksiran harga didasarkan SPPT :', 0, 1, '');
            $pdf->Cell(89, 5.5, 'Luas Tanah ' . $data->luas_t . ' M2 x Rp. ' . number_format($data->harga_t) . ',-', 0, 0, '');
            $pdf->Cell(25, 5.5, '= Rp.', 0, 0, '');
            $pdf->Cell(20, 5.5, number_format($taksiran_sppt_tanah) . ',-', 0, 1, 'R');
            $pdf->Cell(89, 5.5, 'Luas Bangunan ' . $data->luas_b . ' M2 x Rp. ' . number_format($data->harga_b) . ',-', 0, 0, '');
            $pdf->Cell(25, 5.5, '= Rp.', 0, 0, '');
            $pdf->Cell(20, 5.5, number_format($taksiran_sppt_bangunan) . ',-', 0, 1, 'R');
            $pdf->Cell(25, 5.5, '', 0, 1, '');

            $pdf->Cell(49, 5.5, 'Taksiran harga didasarkan Harga Pasar :', 0, 1, '');
            $pdf->Cell(89, 5.5, 'Luas Tanah ' . $data->luas_t . ' M2 x Rp. ' . number_format($data->harga_t2) . ',-', 0, 0, '');
            $pdf->Cell(25, 5.5, '= Rp.', 0, 0, '');
            $pdf->Cell(20, 5.5, number_format($taksiran_pasar_tanah) . ',-', 0, 1, 'R');
            $pdf->Cell(89, 5.5, 'Luas Bangunan ' . $data->luas_b . ' M2 x Rp. ' . number_format($data->harga_b2) . ',-', 0, 0, '');
            $pdf->Cell(25, 5.5, '= Rp.', 0, 0, '');
            $pdf->Cell(20, 5.5, number_format($taksiran_pasar_bangunan) . ',-', 0, 1, 'R');
            $pdf->Cell(25, 5.5, '', 0, 1, '');

            $pdf->Cell(49, 5.5, 'Taksiran Harga Bank adalah', 0, 1, '');
            $pdf->Cell(89, 5.5, 'Rp. ' . number_format($taksiran_pasar_tanah + $taksiran_pasar_bangunan) . ',- x '. $data->taksasi.' %', 0, 0, '');
            $pdf->Cell(25, 5.5, '= Rp.', 0, 0, '');
            $pdf->Cell(20, 5.5, number_format($taksasi) . ',-', 0, 1, 'R');
            $pdf->Cell(25, 5.5, '', 0, 1, '');

            $pdf->Cell(89, 5.5, 'HT Rp. ' . number_format($data->ht) . ',- x 125%', 0, 0, '');
            $pdf->Cell(25, 5.5, '= Rp.', 0, 0, '');
            $pdf->Cell(20, 5.5, number_format($ht) . ',-', 0, 1, 'R');
            $pdf->Cell(25, 5.5, '', 0, 1, '');

            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(89, 5.5, 'Harga Tanah Rp. ' . number_format($taksiran_pasar_tanah) . ',-', 0, 1, '');
            $pdf->Cell(89, 5.5, 'SPPT Rp. ' . number_format($taksiran_sppt_tanah) . ',-', 0, 1, '');
            $pdf->Cell(89, 5.5, 'Taksasi Rp. ' . number_format($taksasi) . ',-', 0, 1, '');

            $pdf->SetFont('Times', '', 12);
            $pdf->Cell(49, 5.5, '', 0, 1, '');
            $pdf->Cell(49, 5.5, 'Usulan :', 0, 1, '');
            $pdf->MultiCell(0, 5.5, $data->usulan);
            $pdf->Cell(49, 5.5, '', 0, 1, '');
            $pdf->Cell(49, 5.5, '', 0, 1, '');

        }

        $lb = $this->db->get_where('collateral', array('id_lb' => $id_lb))->result();
        foreach ($lb as $data) {
            
            $taksasi_kendaraan = $data->taksiran  * (70 / 100);

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
            $pdf->MultiCell(0, 5.5, $data->alamat, 0, 1);
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
            $pdf->Cell(89, 5.5, 'Harga pasaran Rp. ' . number_format($data->taksiran) . ',-', 0, 1, '');
            $pdf->Cell(89, 5.5, 'Taksasi harga bank Rp. ' . number_format($taksasi_kendaraan) . ',-', 0, 1, '');
            $pdf->Cell(89, 5.5, '', 0, 1, '');

            $pdf->SetFont('Times', '', 12);
            $pdf->Cell(89, 5.5, 'NL Rp. ' . number_format($data->nl) . ',-', 0, 1, '');
            $pdf->Cell(89, 5.5, '', 0, 1, '');

            $pdf->Cell(49, 5.5, 'Usulan :', 0, 1, '');
            $pdf->MultiCell(0, 5.5, $data->usulan);
            $pdf->Cell(49, 5.5, '', 0, 1, '');
            $pdf->Cell(49, 5.5, '', 0, 1, '');
        }

        $pdf->Output('Collateral','I');
    }


}
