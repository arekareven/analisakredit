<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Analisa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_analisa');
        $this->load->helper('url', 'download');
        $this->load->library(array('session'));
    }

    public function index()
    {
        $data['title'] = 'ANALIS';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['query'] = $this->m_analisa->tampil_data();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kredit/analisa', $data);
        $this->load->view('templates/footer');
		
    }

	public function kalender()
	{
		$data['title'] = 'Kalender';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$name = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $a = $name['name'];
		// die(var_dump($a));
		
		
		$data['result'] = $this->db->query("SELECT * FROM pengajuan WHERE nama_analis='$a'")->result();	
		// die(var_dump($data['result']));
		
		// $data['result'] = $this->db->get("pengajuan")->result();	

		foreach ($data['result'] as $key => $value) {
			$data['data'][$key]['title'] = "Komite ".$value->name_debitur;
			$data['data'][$key]['start'] = $value->waktu_zoom;
			$data['data'][$key]['url'] = $value->link_zoom;
			$data['data'][$key]['backgroundColor'] = "#00a65a";
		}
		

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('kredit/calendar', $data);
		$this->load->view('templates/footer');
	}

    //---Pengajuan
	public function add_pengajuan()
	{
		$id_pengajuan = $this->input->post('id_pengajuan');

		$this->m_analisa->add_data_pengajuan($id_pengajuan);
	}

    function data_pengajuan(){
        $id_lb=$this->input->post('id_lb');
		$data=$this->m_analisa->pengajuan_list($id_lb);
		echo json_encode($data);
	}
	
	function get_pengajuan()
	{
		$id_pengajuan = $this->input->get('id');
		$data = $this->m_analisa->get_pengajuan_by_kode($id_pengajuan);
		echo json_encode($data);
	}

	//---
	public function add_scoring()
	{
		$id_pengajuan = $this->input->post('id_pengajuan');
		$name_debitur = $this->input->post('name_debitur');
		$plafond = $this->input->post('plafon');
		$catatan     = $this->input->post('catatan');
		$itk_nilai     = $this->input->post('itk_nilai');
		$mu_nilai     = $this->input->post('mu_nilai');
		$kd_nilai     = $this->input->post('kd_nilai');
		$kk_nilai     = $this->input->post('kk_nilai');
		$as_nilai     = $this->input->post('as_nilai');
		$ak_nilai	     = $this->input->post('ak_nilai');
		$t_nilai     = $this->input->post('t_nilai');
		$hpt_nilai     = $this->input->post('hpt_nilai');
		$tk_nilai     = $this->input->post('tk_nilai');
		$jumlah     = $itk_nilai+$mu_nilai+$kd_nilai+$kk_nilai+$as_nilai+$ak_nilai+$t_nilai+$hpt_nilai+$tk_nilai;
		$pengUsa_nilai     = $this->input->post('pengUsa_nilai');
		$admUsa_nilai     = $this->input->post('admUsa_nilai');
		$legal_nilai     = $this->input->post('legal_nilai');
		$tujUsa_nilai     = $this->input->post('tujUsa_nilai');
		$tingPer_nilai     = $this->input->post('tingPer_nilai');
		$harPro_nilai     = $this->input->post('harPro_nilai');
		$sisPem_nilai     = $this->input->post('sisPem_nilai');
		$sisDis_nilai     = $this->input->post('sisDis_nilai');
		$kemBb_nilai	     = $this->input->post('kemBb_nilai');
		$carP_nilai	     = $this->input->post('carP_nilai');
		$prosP_nilai	     = $this->input->post('prosP_nilai');
		$mesP_nilai	     = $this->input->post('mesP_nilai');
		$tenK_nilai	     = $this->input->post('tenK_nilai');
		$damSm_nilai	     = $this->input->post('damSm_nilai');
		$damEk_nilai	     = $this->input->post('damEk_nilai');
		$dampEma_nilai	     = $this->input->post('dampEma_nilai');
		$damLi_nilai	     = $this->input->post('damLi_nilai');
		$kemBa_nilai	     = $this->input->post('kemBa_nilai');
		$pemLa_nilai	     = $this->input->post('pemLa_nilai');
		$jumlah_capa     = $pengUsa_nilai+$admUsa_nilai+$legal_nilai+$tujUsa_nilai+$tingPer_nilai+$harPro_nilai+$sisPem_nilai+$sisDis_nilai+$kemBb_nilai+$carP_nilai+$prosP_nilai+$mesP_nilai+$tenK_nilai+$damSm_nilai+$damEk_nilai+$dampEma_nilai+$damLi_nilai+$kemBa_nilai+$pemLa_nilai;
		$sumDs_nilai     = $this->input->post('sumDs_nilai');
		$sumDk_nilai     = $this->input->post('sumDk_nilai');
		$sumDl_nilai     = $this->input->post('sumDl_nilai');
		$jumlah_capi     = $sumDs_nilai+$sumDk_nilai+$sumDl_nilai;
		$UsYd_nilai     = $this->input->post('UsYd_nilai');
		$serT_nilai     = $this->input->post('serT_nilai');
		$bpkb_nilai     = $this->input->post('bpkb_nilai');
		$market_nilai     = $this->input->post('market_nilai');
		$jumlah_coll     = $UsYd_nilai+$serT_nilai+$bpkb_nilai+$market_nilai;
		$kebP_nilai     = $this->input->post('kebP_nilai');
		$ekoG_nilai     = $this->input->post('ekoG_nilai');
		$jumlah_cond	     = $kebP_nilai+$ekoG_nilai;		
		$score		= ($jumlah * 0.2)+($jumlah_capa * 0.3)+($jumlah_capi * 0.2)+($jumlah_coll * 0.2)+($jumlah_cond * 0.1);
		if($score<=17){
		$status= "Tidak layak";
		}if($score > 17 && $score <=34){
			$status= "Layak dgn catatan";
			}if($score > 34){
				$status= "Layak";
			}
		$this->m_analisa->add_scoring($id_pengajuan,$name_debitur,$plafond, $status,$catatan,$itk_nilai,$mu_nilai,$kd_nilai,$kk_nilai,$as_nilai,$ak_nilai,$t_nilai,$hpt_nilai,$tk_nilai,$jumlah,$pengUsa_nilai,$admUsa_nilai,$legal_nilai,$tujUsa_nilai,$tingPer_nilai,$harPro_nilai,$sisPem_nilai,$sisDis_nilai,$kemBb_nilai,$carP_nilai,$prosP_nilai,$mesP_nilai,$tenK_nilai,$damSm_nilai,$damEk_nilai,$dampEma_nilai,$damLi_nilai,$kemBa_nilai,$pemLa_nilai,$jumlah_capa,$sumDs_nilai,$sumDk_nilai,$sumDl_nilai,$jumlah_capi,$UsYd_nilai,$serT_nilai,$bpkb_nilai,$market_nilai,$jumlah_coll,$kebP_nilai,$ekoG_nilai,$jumlah_cond);
	}
	
	public function update_resume()
	{
		$id_resume = $this->input->post('id_resume');
		$id_pengajuan = $this->input->post('id_pengajuan');
		$analis = $this->input->post('analis');
		// $kabag = $this->input->post('kabag');
		// $kacab = $this->input->post('kacab');
		// $dirut = $this->input->post('dirut');

        $query = $this->m_analisa->cek_id($id_resume)->num_rows();
        if (empty($query))
            $this->m_analisa->store_resume($id_pengajuan,$analis);
        else
            $this->m_analisa->update_resume($id_resume,$analis);
	}
		
	function get_resume()
	{
		// $id_resume = $this->input->get('id');
		$id_resume = $this->input->post('id_resume');
		$data = $this->m_analisa->get_resume_by_kode($id_resume);
		echo json_encode($data);
	}

	// Upload file
	public function upload()
	{
		$id_lb = $this->input->post('id_lb');
		$cek = $this->db->query("SELECT * FROM pengajuan WHERE id_lb='$id_lb'");
			if ($cek->num_rows() > 0) {
				foreach ($cek->result() as $data) {
					$file_lama = $data->file;
				}

				$file_name = 'file-'.$id_lb;
				$config['upload_path']          = FCPATH.'/upload/file/kredit/';
				$config['allowed_types']        = 'pdf|doc|docx';
				$config['file_name']            = $file_name;
				$config['overwrite']            = true;
				$config['max_size']             = 1024; // 1MB

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('upload')) {
					if ($file_lama != '') {
						unlink(FCPATH . '/upload/file/kredit/' . $file_lama);
					}
					$new_file = $this->upload->data('file_name');
					$this->db->set('file', $new_file);
					$this->db->where('id_lb', $id_lb);
					$this->db->update('pengajuan');
				} else {
					echo $this->upload->display_errors();
				}

				redirect('main?id_lb='.$id_lb);

			}else
			redirect('main?id_lb='.$id_lb);

		
	}


}
