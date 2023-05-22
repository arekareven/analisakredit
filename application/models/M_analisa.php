<?php

require_once('assets/php-jwt-master/src/BeforeValidException.php');
require_once('assets/php-jwt-master/src/ExpiredException.php');
require_once('assets/php-jwt-master/src/SignatureInvalidException.php');
require_once('assets/php-jwt-master/src/JWT.php');

use \Firebase\JWT\JWT;

class M_analisa extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->helper(array('url', 'download'));
    }

    //-----
	public function add_data_pengajuan($x)
	{
		$id_lb			= $this->input->post('id_lb');
		$analis			= $this->input->post('analis');
		$nama_ao		= $this->input->post('nama_ao');
		$kantor		= $this->input->post('kantor');
		$name_debitur		= $this->input->post('nama_debitur');
		$plafond		= $this->input->post('plafond');
		$status      		= $this->input->post('status');

		$x = array(

			'id_lb'	    	=> $id_lb,
			'nama_analis'	    	=> $analis,
			'nama_ao'	    => $nama_ao,
			'kantor'	    => $kantor,
			'name_debitur'	    => $name_debitur,
			'plafond'	    => $plafond,
			'status'	    	=> $status,
		);
		$this->db->insert('pengajuan', $x);
	}
    
	function pengajuan_list($id_lb)
	{
		$hasil=$this->db->query("SELECT * FROM pengajuan WHERE id_lb='$id_lb'");
		return $hasil->result();
	}
    		
	public function update_pengajuan($id_pengajuan,$name_debitur,$plafond, $status, $catatan)
	{
		$this->db->query("UPDATE pengajuan SET 
		name_debitur='$name_debitur',
		plafond='$plafond',
		`status`='$status', 
		catatan='$catatan' 
		WHERE id_pengajuan='$id_pengajuan'");
		redirect('analisa');
	}

    public function tampil_data()
    {
        $user = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $a = $user['name'];
        return $this->db->query("SELECT * FROM pengajuan WHERE nama_analis='$a' ORDER BY id_lb DESC");
    }
   	
	function get_pengajuan_by_kode($id_pengajuan)
	{
		$hsl = $this->db->query("SELECT * FROM pengajuan WHERE id_pengajuan='$id_pengajuan'");
		if ($hsl->num_rows() > 0) {
			foreach ($hsl->result() as $data) {
				$hasil = array(
					'id_pengajuan'      => $data->id_pengajuan,
					'name_debitur'      => $data->name_debitur,
					'plafon'      => $data->plafond,
					// 'catatan'      => $data->catatan,
					'itk_nilai'      => $data->itk_nilai,
					'mu_nilai'      => $data->mu_nilai,
					'kd_nilai'      => $data->kd_nilai,
					'kk_nilai'      => $data->kk_nilai,
					'as_nilai'      => $data->as_nilai,
					'ak_nilai'	      => $data->ak_nilai,
					't_nilai'      => $data->t_nilai,
					'hpt_nilai'      => $data->hpt_nilai,
					'tk_nilai'      => $data->tk_nilai,
					'jumlah'      => $data->jumlah,
					'pengUsa_nilai'      => $data->pengUsa_nilai,
					'admUsa_nilai'      => $data->admUsa_nilai,
					'legal_nilai'      => $data->legal_nilai,
					'tujUsa_nilai'      => $data->tujUsa_nilai,
					'tingPer_nilai'      => $data->tingPer_nilai,
					'harPro_nilai'      => $data->harPro_nilai,
					'sisPem_nilai'      => $data->sisPem_nilai,
					'sisDis_nilai'      => $data->sisDis_nilai,
					'kemBb_nilai'	      => $data->kemBb_nilai,
					'carP_nilai'	      => $data->carP_nilai,
					'prosP_nilai'	      => $data->prosP_nilai,
					'mesP_nilai'	      => $data->mesP_nilai,
					'tenK_nilai'	      => $data->tenK_nilai,
					'damSm_nilai'	      => $data->damSm_nilai,
					'damEk_nilai'	      => $data->damEk_nilai,
					'dampEma_nilai'	      => $data->dampEma_nilai,
					'damLi_nilai'	      => $data->damLi_nilai,
					'kemBa_nilai'	      => $data->kemBa_nilai,
					'pemLa_nilai'	      => $data->pemLa_nilai,
					'jumlah_capa'      => $data->jumlah_capa,
					'sumDs_nilai'      => $data->sumDs_nilai,
					'sumDk_nilai'      => $data->sumDk_nilai,
					'sumDl_nilai'      => $data->sumDl_nilai,
					'jumlah_capi'      => $data->jumlah_capi,
					'UsYd_nilai'      => $data->UsYd_nilai,
					'serT_nilai'      => $data->serT_nilai,
					'bpkb_nilai'      => $data->bpkb_nilai,
					'market_nilai'      => $data->market_nilai,
					'jumlah_coll'      => $data->jumlah_coll,
					'kebP_nilai'      => $data->kebP_nilai,
					'ekoG_nilai'      => $data->ekoG_nilai,
					'jumlah_cond'	      => $data->jumlah_cond
				);
			}
		}
		return $hasil;
	}	
	//-----

	public function add_scoring($id_pengajuan,$name_debitur,$plafond, $status, $catatan,$itk_nilai,$mu_nilai,$kd_nilai,$kk_nilai,$as_nilai,$ak_nilai,$t_nilai,$hpt_nilai,$tk_nilai,$jumlah,$pengUsa_nilai,$admUsa_nilai,$legal_nilai,$tujUsa_nilai,$tingPer_nilai,$harPro_nilai,$sisPem_nilai,$sisDis_nilai,$kemBb_nilai,$carP_nilai,$prosP_nilai,$mesP_nilai,$tenK_nilai,$damSm_nilai,$damEk_nilai,$dampEma_nilai,$damLi_nilai,$kemBa_nilai,$pemLa_nilai,$jumlah_capa,$sumDs_nilai,$sumDk_nilai,$sumDl_nilai,$jumlah_capi,$UsYd_nilai,$serT_nilai,$bpkb_nilai,$market_nilai,$jumlah_coll,$kebP_nilai,$ekoG_nilai,$jumlah_cond)
	{
		$this->db->query("UPDATE pengajuan SET 
		name_debitur='$name_debitur',
		plafond='$plafond',
		`status`='$status', 
		catatan='$catatan',
		itk_nilai     = $itk_nilai,
		mu_nilai     = $mu_nilai,
		kd_nilai     = $kd_nilai,
		kk_nilai     = $kk_nilai,
		as_nilai     = $as_nilai,
		ak_nilai	     = $ak_nilai,
		t_nilai     = $t_nilai,
		hpt_nilai     = $hpt_nilai,
		tk_nilai     = $tk_nilai,
		jumlah     = $jumlah,
		pengUsa_nilai     = $pengUsa_nilai,
		admUsa_nilai     = $admUsa_nilai,
		legal_nilai     = $legal_nilai,
		tujUsa_nilai     = $tujUsa_nilai,
		tingPer_nilai     = $tingPer_nilai,
		harPro_nilai     = $harPro_nilai,
		sisPem_nilai     = $sisPem_nilai,
		sisDis_nilai     = $sisDis_nilai,
		kemBb_nilai	     = $kemBb_nilai,
		carP_nilai	     = $carP_nilai,
		prosP_nilai	     = $prosP_nilai,
		mesP_nilai	     = $mesP_nilai,
		tenK_nilai	     = $tenK_nilai,
		damSm_nilai	     = $damSm_nilai,
		damEk_nilai	     = $damEk_nilai,
		dampEma_nilai	     = $dampEma_nilai,
		damLi_nilai	     = $damLi_nilai,
		kemBa_nilai	     = $kemBa_nilai,
		pemLa_nilai	     = $pemLa_nilai,
		jumlah_capa     = $jumlah_capa,
		sumDs_nilai     = $sumDs_nilai,
		sumDk_nilai     = $sumDk_nilai,
		sumDl_nilai     = $sumDl_nilai,
		jumlah_capi     = $jumlah_capi,
		UsYd_nilai     = $UsYd_nilai,
		serT_nilai     = $serT_nilai,
		bpkb_nilai     = $bpkb_nilai,
		market_nilai     = $market_nilai,
		jumlah_coll     = $jumlah_coll,
		kebP_nilai     = $kebP_nilai,
		ekoG_nilai     = $ekoG_nilai,
		jumlah_cond	     = $jumlah_cond
		WHERE id_pengajuan='$id_pengajuan'");
		redirect('analisa');
	}


	
    function cek_id($id_resume)
	{
		$query = array('id_resume' => $id_resume);
		return $this->db->get_where('resume', $query);
	}
	
	public function store_resume($id_pengajuan,$analis)
	{

		$data = array(

			'id_pengajuan'	    	=> $id_pengajuan,
			'analis'	    	=> $analis
			// 'kabag'	    => $kabag,
			// 'kacab'	    => $kacab,
			// 'dirut'	    => $dirut,
		);
		$this->db->insert('resume', $data);
		redirect('analisa');
	}
	
	public function update_resume($id_resume,$analis)
	{
		$this->db->query("UPDATE `resume` SET analis='$analis' WHERE id_resume='$id_resume'");
		redirect('analisa');
	}
	   	
	function get_resume_by_kode($id_resume)
	{
		$hsl = $this->db->query("SELECT * FROM `resume` WHERE id_resume='$id_resume'");
		if ($hsl->num_rows() > 0) {
			foreach ($hsl->result() as $data) {
				$hasil = array(
					'id_resume'      => $data->id_resume,
					'id_pengajuan'      => $data->id_pengajuan,
					'analis'      => $data->analis,
					'kabag'      => $data->kabag,
					'kacab'      => $data->kacab,
					'dirut'      => $data->dirut
				);
			}
		}else{
			$hasil = 'Data dengan id ini kosong';
		}
		return $hasil;
	}
}
