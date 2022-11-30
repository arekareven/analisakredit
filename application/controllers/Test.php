<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Test extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_test');
    }

    public function cari()
    {
        $kode_perkiraan = $_GET['kode_perkiraan'];
        $cari = $this->m_test->cari($kode_perkiraan)->result();
        echo json_encode($cari);
    }

    public function index()
    {
        $id_lb = $_GET['id_lb'];
        $data['id_lb'] = $_GET['id_lb'];
        $data['title'] = 'Halaman Input Data';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['select'] = $this->m_test->data_select();
        $data['analis'] = $this->m_test->data_analis();
        $data['pengajuan'] = $this->m_test->data_pengajuan($id_lb);
        $data['perkiraan'] = $this->m_test->data_perkiraan();
        $data['cashflow'] = $this->m_test->edit_cash($id_lb);
        $data['cashflowp'] = $this->m_test->edit_cashp($id_lb);

        $data['kode'] = $this->m_test->get_kode($id_lb);
        $data['kode2'] = $this->m_test->get_kode2($id_lb);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kredit/dummy', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $data['id_lb'] = $_GET['id_lb'];
        $id_lb = $_GET['id_lb'];
        $data['title'] = 'Halaman Edit';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['select'] = $this->m_test->data_select();
        $data['perkiraan'] = $this->m_test->data_perkiraan();
        $data['lb'] = $this->m_test->edit_lb($id_lb);
        $data['rw'] = $this->m_test->edit_rw($id_lb);
        $data['character'] = $this->m_test->edit_char($id_lb);
        $data['capacity'] = $this->m_test->edit_capa($id_lb);
        $data['capital'] = $this->m_test->edit_capi($id_lb);
        $data['cashflow'] = $this->m_test->edit_cash($id_lb);//cashflow awal, pendapatan 
        $data['cashflowp'] = $this->m_test->edit_cashp($id_lb);//cashflow awal, pengeluaran
        $data['cashflows'] = $this->m_test->edit_cashs($id_lb);//cashflow setelah, pendapatan
        $data['cashflowsp'] = $this->m_test->edit_cashsp($id_lb);//cashflow setelah, pengeluaran
        $data['hutang'] = $this->m_test->edit_hut($id_lb);//hutang
        $data['collateralt'] = $this->m_test->edit_collt($id_lb);
        $data['collateralk'] = $this->m_test->edit_collk($id_lb);
        $data['condition'] = $this->m_test->edit_cond($id_lb);
        $data['realisasi'] = $this->m_test->edit_real($id_lb);
        $data['usulan'] = $this->m_test->edit_usulan($id_lb);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kredit/edit', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $id_cf = $this->input->post('id_cf');

        $this->m_test->add_data($id_cf);
    }

    public function editca()
    {
        $id_lb = $this->input->post('id_lb');
        $kode = $this->input->post('kode');

        $this->db->where(array('id_lb' => $id_lb));
        $this->db->where(array('kode' => $kode));
        $this->db->delete('cashflow_b');

        $this->m_test->edit_data($kode);
    }

    public function hapusCashflowPendapatan()
	{
		$idt = $this->input->post('idHapusCashflowPendapatan');        
		$id_lb = $this->input->post('id_lb');
		$this->m_test->hapusCashflowPendapatan($idt, $id_lb);
	}
    
    public function editcap()
    {
        $id_lb = $this->input->post('id_lbp');
        $kode = $this->input->post('kodep');

        $this->db->where(array('id_lb' => $id_lb));
        $this->db->where(array('kode' => $kode));
        $this->db->delete('cashflow_b');

        $this->m_test->edit_datap($kode);
    }

    public function hapusCashflowPengeluaran()
	{
		$idt = $this->input->post('idHapusCashflowPengeluaran');        
		$id_lb = $this->input->post('id_lb');
		$this->m_test->hapusCashflowPengeluaran($idt, $id_lb);
	}
        
    public function edith()
    {
        $id_lb = $this->input->post('id_lbh');
        $kode = $this->input->post('kodeh');

        $this->db->where(array('id_lb' => $id_lb));
        $this->db->where(array('kode' => $kode));
        $this->db->delete('cashflow_a');

        $this->m_test->edit_datah($kode);
    }
    
    public function hapusHutang()
	{
		$idt = $this->input->post('idHapusHutang');        
		$id_lb = $this->input->post('id_lb');
		$this->m_test->hapusHutang($idt, $id_lb);
	}

    public function add_hutang()
    {
        $id_cf = $this->input->post('id_cf');
        $this->m_test->add_data_hutang($id_cf);
    }

    public function add2()
    {
        $id_cf = $this->input->post('id_cf');
        $this->m_test->add_data2($id_cf);
    }

    public function add_usulan()
    {
        $id_usulan = $this->input->post('id_usulan');
        $this->m_test->add_data_usulan($id_usulan);
    }

    /*
    function get_autocomplete(){
        if (isset($_GET['term'])) {
            $result = $this->m_test->search_notaris($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = $row->notaris;
                echo json_encode($arr_result);
            }
        }
    }
    */

    public function cetak_char()
    {
        $id_char = $_GET['id_char'];
        redirect('pdf_char?id_char=' . $id_char);
    }
}
