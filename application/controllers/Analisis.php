<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Analisis extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_analisis');
        $this->load->helper('url','download');
        $this->load->library(array('session'),'upload');
    }

    public function index()
    {
        $data['title'] = 'Analisis';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['query'] = $this->m_analisis->tampil_data();
        $data['analis'] = $this->m_analisis->data_analis();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kredit/analisis', $data);
        $this->load->view('templates/footer');
    }

    

    public function cari_analis()
    {
        $nama = $_GET['nama'];
        $cari = $this->m_analisis->cari($nama)->result();
        echo json_encode($cari);
    }

    public function edit(){
        $id_analisis = $this->input->post('id_analisis');        
        $this->m_analisis->edit_data($id_analisis);
	}

    public function lakukan_download(){	
        $file = $_GET['file'];			
		force_download('cache/'.$file,NULL);
	}

    public function hapus(){
        $idt = $this->input->post('idt2');        
        $this->m_analisis->hapus_data($idt);
    }

    public function next()
    {
        $id_lb = $_GET['id_lb'];
        redirect('analisis?id_lb=' . $id_lb);
    }

}
