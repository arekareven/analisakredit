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
        $data['title'] = 'Analis';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['query'] = $this->m_analisa->tampil_data();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kredit/analisa', $data);
        $this->load->view('templates/footer');
		
    }

    //---

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

	public function zoom_meeting()
	{
		
        $id_pengajuan = $this->input->post('id_pengajuanz');

		$this->m_analisa->createMeeting($id_pengajuan);
	}

}
