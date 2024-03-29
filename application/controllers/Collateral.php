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
    
	//CRUD dengan jquery Ajax colta
	function data_colta()
	{
		$id_lb = $this->input->post('id_lb');
		$data = $this->m_collateral->colta_list($id_lb);
		echo json_encode($data);
	}

	function get_colta()
	{
		$id_col2 = $this->input->get('id');
		$data = $this->m_collateral->get_colta_by_kode($id_col2);
		echo json_encode($data);
	}

	public function update_colta()
	{
		$id_col2          = $this->input->post('id_col2');
		$jenis     = $this->input->post('jenis');
		$nama         = $this->input->post('nama');
		$alamat         = $this->input->post('alamat');
		$no_shm   = $this->input->post('no_shm');
		$lokasi      = $this->input->post('lokasi');
		$tgl_ukur      = $this->input->post('tgl_ukur');
		$no_ukur    = $this->input->post('no_ukur');
		$milik       = $this->input->post('milik');
		$fisik_jaminan           = $this->input->post('fisik_jaminan');
		$luas_t           = $this->input->post('luas_t');
		$luas_b           = $this->input->post('luas_b');
		$harga_t           = $this->input->post('harga_t');
		$harga_b           = $this->input->post('harga_b');
		$harga_t2           = $this->input->post('harga_t2');
		$harga_b2           = $this->input->post('harga_b2');
		$ht           = $this->input->post('ht');
		$taksasi           = $this->input->post('taksasi');
		$usulan     = $this->input->post('usulan');
		$data = $this->m_collateral->update_colta($id_col2, $jenis, $nama, $alamat, $no_shm, $lokasi, $tgl_ukur, $no_ukur, $milik, $fisik_jaminan, $luas_t, $luas_b, $harga_t, $harga_b, $harga_t2, $harga_b2, $ht, $taksasi, $usulan);
		echo json_encode($data);
	}

	function delete_colta()
	{
		$id_col2 = $this->input->post('kode');
		$data = $this->m_collateral->delete_colta($id_col2);
		echo json_encode($data);
	}
	//End CRUD Jquery Ajax
    	
	//CRUD dengan jquery Ajax colken
	function data_colken()
	{
		$id_lb = $this->input->post('id_lb');
		$data = $this->m_collateral->colken_list($id_lb);
		echo json_encode($data);
	}

	function get_colken()
	{
		$id_col = $this->input->get('id');
		$data = $this->m_collateral->get_colken_by_kode($id_col);
		echo json_encode($data);
	}

	public function update_colken()
	{
		$id_col          = $this->input->post('id_col');
		$roda     = $this->input->post('roda');
		$nopol         = $this->input->post('nopol');
		$nama_stnk         = $this->input->post('nama_stnk');
		$alamat   = $this->input->post('alamat');
		$type      = $this->input->post('type');
		$jenis      = $this->input->post('jenis');
		$tahun    = $this->input->post('tahun');
		$warna       = $this->input->post('warna');
		$silinder           = $this->input->post('silinder');
		$no_rangka           = $this->input->post('no_rangka');
		$no_mesin           = $this->input->post('no_mesin');
		$no_bpkb           = $this->input->post('no_bpkb');
		$milik           = $this->input->post('milik');
		$taksiran           = $this->input->post('taksiran');
		$nl           = $this->input->post('nl');
		$usulan     = $this->input->post('usulan');
		$data = $this->m_collateral->update_colken($id_col, $roda, $nopol, $nama_stnk, $alamat, $type, $jenis, $tahun, $warna, $silinder, $no_rangka, $no_mesin, $no_bpkb, $milik, $taksiran, $nl, $usulan);
		echo json_encode($data);
	}

	function delete_colken()
	{
		$id_col2 = $this->input->post('kode');
		$data = $this->m_collateral->delete_colken($id_col2);
		echo json_encode($data);
	}
	//End CRUD Jquery Ajax

    public function add()
    {
        $id_col = $this->input->post('id_col');

        $query = $this->m_collateral->cek_id($id_col)->num_rows();
        if (empty($query))
            $this->m_collateral->add_data($id_col);
        else
            $this->m_collateral->edit_data($id_col);
    }
            
    public function hapus()
	{
		$idt = $this->input->post('idcollk');        
		$id_lb = $this->input->post('id_lb');
		$this->m_collateral->hapus($idt, $id_lb);
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
        
    public function hapus2()
	{
		$idt = $this->input->post('idcollt');        
		$id_lb = $this->input->post('id_lb');
		$this->m_collateral->hapus2($idt, $id_lb);
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
