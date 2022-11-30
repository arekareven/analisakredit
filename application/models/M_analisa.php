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
		$name_debitur		= $this->input->post('nama_debitur');
		$plafond		= $this->input->post('plafond');
		$status      		= $this->input->post('status');

		$x = array(

			'id_lb'	    	=> $id_lb,
			'nama_analis'	    	=> $analis,
			'nama_ao'	    => $nama_ao,
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
        /*
        return $this->db->query("SELECT * FROM analisis WHERE nama='$a' AND status='Ditinjau'");
        */
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

//-----------------MENGAKSES ZOOM API TO MAKE MEETING---------------------
	private $zoom_api_key = 'x9RDcJdxRk2pIHI-Pb-shw';
	private $zoom_api_secret = 'AFSpEctqZCncDejPSqCc3Qzs29a8jEYoZQYQ';	
	
	//function to generate JWT
	private function generateJWTKey() 
	{
		$key = $this->zoom_api_key;
		$secret = $this->zoom_api_secret;
		$token = array(
			"iss" => $key,
			"exp" => time() + 3600 //60 seconds as suggested
		);
		return JWT::encode( $token, $secret );
	}	
	
	//function to create meeting
	public function createMeeting($id_pengajuan)
	{
		
		$data_zoom = array();
		$data_zoom['topic'] 		= 'Komite a/n';
		$data_zoom['start_date'] 	= $this->input->post('waktu');
		$data_zoom['duration'] 		= 60;
		$data_zoom['type'] 			= 2;
		$data_zoom['password'] 		= "12345";

		$post_time  = $data_zoom['start_date'];
		$start_time = gmdate("Y-m-d\TH:i:s", strtotime($post_time));

		$createMeetingArray = array();
		if (!empty($data_zoom['alternative_host_ids'])) {
			if (count($data_zoom['alternative_host_ids']) > 1) {
			$alternative_host_ids = implode(",", $data_zoom['alternative_host_ids']);
			} else {
			$alternative_host_ids = $data_zoom['alternative_host_ids'][0];
			}
		}

		$createMeetingArray['topic']      = $data_zoom['topic'];
		$createMeetingArray['agenda']     = !empty($data_zoom['agenda']) ? $data_zoom['agenda'] : "";
		$createMeetingArray['type']       = !empty($data_zoom['type']) ? $data_zoom['type'] : 2; //Scheduled
		$createMeetingArray['start_time'] = $start_time;
		$createMeetingArray['timezone']   = 'Asia/Jakarta';
		$createMeetingArray['password']   = !empty($data_zoom['password']) ? $data_zoom['password'] : "";
		$createMeetingArray['duration']   = !empty($data_zoom['duration']) ? $data_zoom['duration'] : 60;

		$createMeetingArray['settings']   = array(
            		'join_before_host'  => !empty($data_zoom['join_before_host']) ? true : false,
            		'host_video'        => !empty($data_zoom['option_host_video']) ? true : false,
            		'participant_video' => !empty($data_zoom['option_participants_video']) ? true : false,
            		'mute_upon_entry'   => !empty($data_zoom['option_mute_participants']) ? true : false,
            		'enforce_login'     => !empty($data_zoom['option_enforce_login']) ? true : false,
            		'auto_recording'    => !empty($data_zoom['option_auto_recording']) ? $data_zoom['option_auto_recording'] : "none",
            		'alternative_hosts' => isset($alternative_host_ids) ? $alternative_host_ids : ""
        	);

		return $this->sendRequest($createMeetingArray);
	}	
	
	//function to send request
	protected function sendRequest($data_zoom)
	{
		//Enter_Your_Email
		$request_url = "https://api.zoom.us/v2/users/test.app.eka@gmail.com/meetings";
		
		$headers = array(
			"authorization: Bearer ".$this->generateJWTKey(),
			"content-type: application/json",
			"Accept: application/json",
		);
		
		$postFields = json_encode($data_zoom);
		
			$ch = curl_init();
			curl_setopt_array($ch, array(
				CURLOPT_URL => $request_url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => $postFields,
			CURLOPT_HTTPHEADER => $headers,
			));

			$response = curl_exec($ch);
			$err = curl_error($ch);
			curl_close($ch);
			if (!$response) {
				return $err;
		}
//
			$id_pengajuan    = $this->input->post('id_pengajuanz');
			$link     = json_decode($response)->join_url;
			$waktu	= $data_zoom['start_time'];

			$data = array(
				'link_zoom'    => $link,
				'waktu_zoom'		=> $waktu
			);
			
			$this->db->where('id_pengajuan', $id_pengajuan);
			$this->db->update('pengajuan', $data,);
//
	}

}
