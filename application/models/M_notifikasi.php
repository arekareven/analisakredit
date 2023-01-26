<!-- 
Model ini digunakan untuk kirim email otomatis setiap pagi jam 8 ketika controller auth dibuka karena
sudah dimasukkan ke dalam method construct, walaupun belom diuji coba :)

-->
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
class M_notifikasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('email');
    }


	public function sendEmail()
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
        $mail->Subject = 'Test Notifikasi | LAS Ekadharma'; //subject email

        // Add a recipient
        $mail->addAddress('kadi.hore@gmail.com'); //email tujuan pengiriman email

        // Set email format to HTML
        $mail->isHTML(true);

        // Email body content
        $mailContent = "<p>Hallo Anda punya jadwal untuk melakukan rapat komite a/n </p>";
        $mail->Body = $mailContent;
      
        $this->email->set_time('+1 day 8:00 am');
        
        // Send email
        if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }else{
            echo 'Message has been sent';
        }
	}
}

