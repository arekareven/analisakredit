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
    	
    //CRUD dengan jquery Ajax
    function data_usul()
    {
        $id_lb = $this->input->post('id_lb');
        $data = $this->m_usulan->usul_list($id_lb);
        echo json_encode($data);
    }

    function get_usul()
    {
        $id_usulan = $this->input->get('id');
        $data = $this->m_usulan->get_usul_by_kode($id_usulan);
        echo json_encode($data);
    }
	
    public function add()
    {
        $id_usulan = $this->input->post('id_usulan');

        $query = $this->m_usulan->cek_id($id_usulan)->num_rows();
        if (empty($query))
            $this->m_usulan->add_data($id_usulan);
        else
            $this->m_usulan->edit_data($id_usulan);
    }

    public function update_usul()
    {
        $id_usulan = $this->input->post('id_usulan');
        $character        = $this->input->post('character');
        $capacity         = $this->input->post('capacity');
        $capital     	  = $this->input->post('capital');
        $coe              = $this->input->post('coe');
        $collateral       = $this->input->post('collateral');
        // $realisasi        = $this->input->post('realisasi');
        $notaris          = $this->input->post('notaris');
        $plafond_usulan          = $this->input->post('plafond_usulan');
        $waktu          = $this->input->post('waktu');
        $bunga          = $this->input->post('bunga');
        $provisi          = $this->input->post('provisi');
        $administrasi          = $this->input->post('administrasi');
        $asuransi          = $this->input->post('asuransi');
        $materai          = $this->input->post('materai');
        $apht          = $this->input->post('apht');
        $skmht          = $this->input->post('skmht');
        $titipan          = $this->input->post('titipan');
        $fiduciare          = $this->input->post('fiduciare');
        $legalisasi          = $this->input->post('legalisasi');
        $roya          = $this->input->post('roya');
        $lainnya          = $this->input->post('lainnya');
        $hasil = $this->m_usulan->update_usul($id_usulan, $character, $capacity, $capital, $coe, 
												$collateral,  $notaris,$plafond_usulan, 
												$waktu, $bunga, $provisi, $administrasi, $asuransi, 
												$materai, $apht, $skmht, $titipan, $fiduciare, 
												$legalisasi, $roya, $lainnya);
        echo json_encode($hasil);
    }

    function delete_usul()
    {
        $id_usulan = $this->input->post('kode');
        $data = $this->m_usulan->delete_usul($id_usulan);
        echo json_encode($data);
    }
    //End CRUD Jquery Ajax
        	
    //CRUD realisasi dengan jquery Ajax
    function data_real()
    {
        $id_lb = $this->input->post('id_lb');
        $data = $this->m_usulan->real_list($id_lb);
        echo json_encode($data);
    }

    function get_real()
    {
        $id_real = $this->input->get('id');
        $data = $this->m_usulan->get_real_by_kode($id_real);
        echo json_encode($data);
    }
	    
    public function add_real()
    {
        $id_real = $this->input->post('id_real');

        $query = $this->m_usulan->cek_id_real($id_real)->num_rows();
        if (empty($query))
            $this->m_usulan->add_data_real($id_real);
        else
            $this->m_usulan->edit_data_real($id_real);
    }

    public function update_real()
    {
        $id_real = $this->input->post('id_real');
        $oleh            = $this->input->post('oleh');
        $sebagai        = $this->input->post('sebagai');
        $hasil = $this->m_usulan->update_real($id_real, $oleh, $sebagai);
        echo json_encode($hasil);
    }

    function delete_real()
    {
        $id_real = $this->input->post('kode');
        $data = $this->m_usulan->delete_real($id_real);
        echo json_encode($data);
    }
    //End CRUD realisasi Jquery Ajax


    
	public function hapus()
	{
		$idt = $this->input->post('idreal');
		$id_lb = $this->input->post('id_lb');
		$this->m_usulan->hapus_data($idt, $id_lb);
	}
		
    function data_jaminan(){
        $id_lb=$this->input->post('id_lb');
		$data=$this->m_usulan->jaminan_list($id_lb);
		echo json_encode($data);
	}



}
