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

class M_kabag extends CI_Model
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

		$lb = $this->db->query("SELECT * FROM pengajuan WHERE kantor='$kantor'");
		return $lb;

		// $lb = $this->db->query("SELECT * FROM pengajuan 
		// JOIN `resume` ON pengajuan.id_pengajuan=resume.id_pengajuan
		// WHERE pengajuan.kantor='$kantor'");
		// WHERE pengajuan.kantor='$kantor' AND resume.analis IS NOT NULL AND pengajuan.plafond>=50000000");
		// return $lb;
    }
		
    function cek_id($id_resume)
	{
		$query = array('id_resume' => $id_resume);
		return $this->db->get_where('resume', $query);
	}
	
	public function update_resume($id_lb,$kabag,$analis)
	{
		if($kabag == 'ACC oleh Kabag'){
			$this->db->query("UPDATE pengajuan SET `status`='$kabag' WHERE id_lb='$id_lb'");
			$this->sendEmail($id_lb,$analis);
		}else{
			$this->db->query("UPDATE pengajuan SET `status`='$kabag' WHERE id_lb='$id_lb'");
		}
		// $this->db->query("UPDATE `resume` SET kabag='$kabag' WHERE id_resume='$id_resume'");
		redirect('kabag');
	}
	   	
	function get_resume_by_kode($id_lb)
	{
		$hsl = $this->db->query("SELECT * FROM `resume` WHERE id_lb='$id_lb'");
		if ($hsl->num_rows() > 0) {
			foreach ($hsl->result() as $data) {
				$hasil = array(
					'id_resume'      => $data->id_resume,
					'id_lb'      => $data->id_lb,
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

	//kirim email ketika pengajuan,dikirimkan ke kabag
	private function sendEmail($id_lb,$analis)
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
		$mail->Subject = 'Info ACC dari Kabag | LAS Ekadharma'; //subject email

		// Add a recipient
		foreach ($this->db->query("SELECT * FROM user WHERE `name`='$analis' AND role_id=3")->result() as $row) {
			$mail->addAddress($row->email); //(analis)
		}

		// Set email format to HTML
		$mail->isHTML(true);

		// Email body content
		foreach ($this->db->query("SELECT * FROM pengajuan WHERE id_lb='$id_lb'")->result() as $pesan) {
			$mailContent = "<p>Hasil analisa kredit AO ".$pesan->nama_ao." a/n ".$pesan->name_debitur." dengan plafond Rp. ".number_format($pesan->plafond)."</b></p>
			<p>Telah disetujui oleh kabag, segera cek dan berikan resume di aplikasi LAS bit.ly/analisa_kredit </b></p>
			<p>Terimakasih, Semangat Pagi !!!</b></p>
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

