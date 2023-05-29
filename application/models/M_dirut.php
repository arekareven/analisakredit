<?php

require_once('assets/php-jwt-master/src/BeforeValidException.php');
require_once('assets/php-jwt-master/src/ExpiredException.php');
require_once('assets/php-jwt-master/src/SignatureInvalidException.php');
require_once('assets/php-jwt-master/src/JWT.php');

require APPPATH.'libraries/phpmailer/src/Exception.php';
require APPPATH.'libraries/phpmailer/src/PHPMailer.php';
require APPPATH.'libraries/phpmailer/src/SMTP.php';

use \Firebase\JWT\JWT;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class M_dirut extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->helper(array('url', 'download'));
    }

    public function tampil_data()
    {
        
		$data = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $kantor = $data['kantor'];

		// $lb = $this->db->query("SELECT * FROM pengajuan 
		// JOIN `resume` ON pengajuan.id_pengajuan=resume.id_pengajuan
		// WHERE pengajuan.kantor='$kantor' AND resume.kacab IS NOT NULL AND pengajuan.plafond>=10000000");

		$lb = $this->db->query("SELECT * FROM pengajuan WHERE plafond>=10000000");
		return $lb;

		// $lb = $this->db->query("SELECT * FROM pengajuan 
		// JOIN `resume` ON pengajuan.id_pengajuan=resume.id_pengajuan
		// WHERE resume.kacab IS NOT NULL AND pengajuan.plafond>=100000000");
		// return $lb;
    }
			
    function cek_id($id_resume)
	{
		$query = array('id_resume' => $id_resume);
		return $this->db->get_where('resume', $query);
	}
	
	public function update_resume($id_resume,$dirut)
	{
		$this->db->query("UPDATE `resume` SET dirut='$dirut' WHERE id_resume='$id_resume'");
		redirect('dirut');
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
    
//-----------------MENGAKSES ZOOM API TO MAKE MEETING---------------------
	private $zoom_api_key = 'x9RDcJdxRk2pIHI-Pb-shw';
	private $zoom_api_secret = 'AFSpEctqZCncDejPSqCc3Qzs29a8jEYoZQYQ';	

	//function to generate JWT
	public function generateJWTKey() 
	{
		$key = $this->zoom_api_key;
		$secret = $this->zoom_api_secret;
		$token = array(
			"iss" => $key,
			"exp" => time() + 3600 //60 seconds as suggested
		);
		// die(var_dump(JWT::encode( $token, $secret )));
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
		$start_time = date("Y-m-d\TH:i:s", strtotime($post_time));

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

	//input tanggal dan link zoom ke database
		$id_pengajuan    = $this->input->post('id_pengajuan');
		$link     = json_decode($response)->join_url;
		$waktu	= $data_zoom['start_time'];

		$data = array(
			'link_zoom'    => $link,
			'waktu_zoom'		=> $waktu
		);
		
		$this->db->where('id_pengajuan', $id_pengajuan);
		$this->db->update('pengajuan', $data);

		$this->sendEmail($link,$waktu);
//
	}

	private function sendEmail($link,$waktu)
	{
		// PHPMailer object
        $response = false;
        $mail = new PHPMailer();

        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'test.app.eka@gmail.com'; // user email anda
        $mail->Password = 'lbjvdzngxujqolli'; // diisi dengan App Password yang sudah di generate
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;

        $mail->setFrom('test.app.eka@gmail.com', 'LAS'); // user email anda
        $mail->addReplyTo('test.app.eka@gmail.com', ''); //user email anda

        // Email subject
        $mail->Subject = 'Info Meeting Komite | LAS Ekadharma'; //subject email

        // Add a recipient
				
		$id_pengajuan = $this->input->post('id_pengajuan');
		foreach ($this->db->query("SELECT * FROM pengajuan WHERE id_pengajuan=$id_pengajuan")->result() as $row) {
			
			$id_lb = $row->id_lb;
			$nama_analis = $row->nama_analis;
			$kantor = $row->kantor;

			foreach ($this->db->query("SELECT * FROM latar_belakang WHERE id_lb=$id_lb")->result() as $row) {
				$mail->addAddress($row->user); //(AO)
			}

			foreach ($this->db->query("SELECT * FROM user WHERE `name`='$nama_analis'")->result() as $row) {
				$mail->addAddress($row->email); //(analis)
			}
			
			foreach ($this->db->query("SELECT * FROM user WHERE kantor='$kantor' AND role_id=4")->result() as $row) {
				$mail->addAddress($row->email); //(kabag)
			}
			
			foreach ($this->db->query("SELECT * FROM user WHERE kantor='$kantor' AND role_id=7")->result() as $row) {
				$mail->addAddress($row->email); //(kacab)
			}
			
			foreach ($this->db->query("SELECT * FROM user WHERE role_id=8")->result() as $row) {
				$mail->addAddress($row->email); //(dirut)
			}
		}

        // Set email format to HTML
        $mail->isHTML(true);

		foreach ($this->db->query("SELECT * FROM pengajuan WHERE id_lb=$id_lb")->result() as $row) {
        // Email body content
        $mailContent = "<p>Hallo Anda punya jadwal untuk melakukan rapat komite a/n ".$row->name_debitur." pada : <b>".date('d M Y',strtotime($waktu))." jam ".date('H:i',strtotime($waktu))."</b></p>
		<p>Anda dapat mengakses zoom meeting pada link berikut : <b>".$link."</b></p>
		<p>Terimakasih, semangat pagi !!!</b></p>
		<p>Email ini terkirim otomatis, harap untuk tidak membalas email ini.</b></p>";
		}
        $mail->Body = $mailContent;

        // Send email
        if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }else{
            echo 'Message has been sent';
        }
	}
}
