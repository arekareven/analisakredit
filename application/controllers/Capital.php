<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Capital extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_capital');
        $this->load->helper('url');
        $this->load->library(array('session'));
    }

    public function index()
    {
        $data['id_lb'] = $_GET['id_lb'];
        $data['title'] = 'Capital Sebelum Kredit';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['query'] = $this->m_capital->tampil_data();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kredit/capital', $data);
        $this->load->view('templates/footer');
    }
    
    //CRUD dengan jquery Ajax
    function data_capi()
    {
        $id_lb = $this->input->post('id_lb');
        $data = $this->m_capital->capi_list($id_lb);
        echo json_encode($data);
    }

    function get_capi()
    {
        $id_capi = $this->input->get('id');
        $data = $this->m_capital->get_capi_by_kode($id_capi);
        echo json_encode($data);
    }

    public function update_capi()
    {
        $id_capi          = $this->input->post('id_capi');
        $kas     = $this->input->post('kas');
        $tabungan         = $this->input->post('tabungan');
        $deposito         = $this->input->post('deposito');
        $piutang   = $this->input->post('piutang');
        $peralatan   = $this->input->post('peralatan');
        $barang      = $this->input->post('barang');
        $barang2      = $this->input->post('barang2');
        $barang3      = $this->input->post('barang3');
        $sewa      = $this->input->post('sewa');
        $lahan    = $this->input->post('lahan');
        $gedung           = $this->input->post('gedung');
        $operasional       = $this->input->post('operasional');
        $lain           = $this->input->post('lain');
        $total_al       = $kas + $tabungan + $deposito + $piutang + $peralatan +
            $barang + $barang2 + $barang3 + $sewa + $lahan + $gedung + $operasional + $lain;
        $tanah     = $this->input->post('tanah');
        $bangunan     = $this->input->post('bangunan');
        $kendaraan     = $this->input->post('kendaraan');
        $inventaris     = $this->input->post('inventaris');
        $lain2     = $this->input->post('lain2');
        $total_at     = $tanah + $bangunan + $kendaraan
            + $inventaris + $lain2;
        $hutang_jpk     = $this->input->post('hutang_jpk');
        $hutang_jpg = $this->input->post('hutang_jpg');
        $hutang_lain     = $this->input->post('hutang_lain');
        $hutang_dagang     = $this->input->post('hutang_dagang');
        $total_hutang     = $hutang_jpk + $hutang_jpg + $hutang_lain + $hutang_dagang;
        $total_aset     = $total_al + $total_at;
        $data = $this->m_capital->update_capi($id_capi, $kas, $tabungan, $deposito, $piutang, $peralatan, $barang, $barang2, $barang3, $sewa, $lahan, $gedung, $operasional, $lain, $tanah, $bangunan, $kendaraan, $inventaris, $lain2, $hutang_jpk, $hutang_jpg, $hutang_lain, $hutang_dagang, $total_al,$total_hutang,$total_aset);
        echo json_encode($data);
    }

    function delete_capi()
    {
        $id_capi = $this->input->post('kode');
        $data = $this->m_capital->delete_capi($id_capi);
        echo json_encode($data);
    }
    //End CRUD Jquery Ajax

    public function add()
    {
        $id_capi = $this->input->post('id_capi');
        $query = $this->m_capital->cek_id($id_capi)->num_rows();
        if (empty($query))
            $this->m_capital->add_data($id_capi);
        else
            $this->m_capital->edit_data($id_capi);
    }

    public function add2()
    {
        $id_capi = $this->input->post('id_capi');
        $this->m_capital->add_data2($id_capi);
    }

    public function index2()
    {
        $data['id_lb'] = $_GET['id_lb'];
        $data['title'] = 'Capital Setelah Kredit';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['query'] = $this->m_capital->tampil_data2();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kredit/capital2', $data);
        $this->load->view('templates/footer');
        /*
        $id_lb = $_GET['id_lb'];
        redirect('capital?id_lb=' . $id_lb);
        */
    }

    public function next()
    {
        $id_lb = $_GET['id_lb'];
        redirect('condition?id_lb=' . $id_lb);
    }
}
