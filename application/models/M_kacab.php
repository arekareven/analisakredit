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

class M_kacab extends CI_Model
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

		$lb = $this->db->query("SELECT * FROM pengajuan 
		JOIN `resume` ON pengajuan.id_pengajuan=resume.id_pengajuan
		WHERE pengajuan.kantor='$kantor' AND resume.analis IS NOT NULL AND pengajuan.plafond>=10000000");
		return $lb;
    }
			
    function cek_id($id_resume)
	{
		$query = array('id_resume' => $id_resume);
		return $this->db->get_where('resume', $query);
	}
	
	public function update_resume($id_resume,$kacab)
	{
		$this->db->query("UPDATE `resume` SET kacab='$kacab' WHERE id_resume='$id_resume'");
		redirect('kacab');
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
