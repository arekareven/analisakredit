<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Character extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_character');
        $this->load->helper('url');
        $this->load->library(array('session'));
    }

    public function index()
    {
        $data['id_lb'] = $_GET['id_lb'];
        $id_lb = $_GET['id_lb'];
        $data['title'] = 'Character';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['query'] = $this->m_character->tampil_data($id_lb);
        $data['query2'] = $this->m_character->tampil_data2($id_lb);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kredit/character', $data);
        $this->load->view('templates/footer');
    }


    public function add()
    {
        $id_char = $this->input->post('id_char');

        $query = $this->m_character->cek_id($id_char)->num_rows();
        if (empty($query))
            $this->m_character->add_data($id_char);
        else
            $this->m_character->edit_data($id_char);
    }

    public function add_rw()
    {
        $id_lb = $this->input->post('id_lb');
        $this->m_character->add_data_rw($id_lb);
    }

    public function next()
    {
        $id_lb = $_GET['id_lb'];
        redirect('capacity?id_lb=' . $id_lb);
    }

    public function templateword()
    {
        $id_lb = $_GET['id_lb'];
        $next = $this->db->query("SELECT * FROM latar_belakang WHERE id_lb='$id_lb'");
        foreach ($next->result() as $row) {
            require 'vendor/autoload.php';
            $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor("C:/xampp/htdocs/analisakredit/cache/" . $row->nama_debitur . date('d-m-y') . ".docx");
        }
        $surat = $this->db->query("SELECT * FROM karakter WHERE id_lb='$id_lb'");
        foreach ($surat->result() as $row) {

            $templateProcessor->setValues([
                'info_pribadi'            => $row->info_pribadi,
                'info_perilaku'        => $row->info_perilaku,
                'info_keluarga'    => $row->info_keluarga,
                'nm1'                => $row->nm1,
                'nm2'                => $row->nm2,
                'nm3'                => $row->nm3,
                'al1'                => $row->al1,
                'al2'                => $row->al2,
                'al3'                => $row->al3,
                'hp1'                => $row->hp1,
                'hp2'                => $row->hp2,
                'hp3'                => $row->hp3,
            ]);
            foreach ($next->result() as $row) {
                $pathToSave = "C:/xampp/htdocs/analisakredit/cache/" . $row->nama_debitur . date('d-m-y') . ".docx";
                $templateProcessor->saveAs($pathToSave);
            }
        }
        redirect('test?id_lb=' . $row->id_lb);
    }

    /*
    public function templateword2()
	{
		$id_lb = $_GET['id_lb'];
		$surat = $this->db->query("SELECT * FROM riwayat_pinjaman WHERE id_lb='$id_lb'");
		foreach ($surat->result() as $row) {
			require 'vendor/autoload.php';
			$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('Vera.docx');

			$replacements = array();
			$i = 1;
			foreach ($surat->result() as $row) {

				$replacements[] = array(
					'no'    => $i,
					'plafond'    => $row->plafond,
					'status'        => $row->status,
					'saldo'        => $row->saldo,
					'sejarah'  => $row->sejarah,
					'data'  => $row->data
				);
				$i++;
			}
			$templateProcessor->cloneRowAndSetValues('plafond', $replacements);

			$pathToSave = "C:/xampp/htdocs/analisakredit/cache/" . date('d-m-y') . ".docx";
			$templateProcessor->saveAs($pathToSave);
		}
		redirect('test?id_lb=' . $id_lb);
	}
    */
}
