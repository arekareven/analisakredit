<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Signature extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// is_logged_in();
		// $this->load->model('m_admin');
	}

	public function index()
	{
		$this->load->view('kredit/signature');
	}

	public function upload()
	{
		$folderPath = FCPATH."/upload/gambar/signature/";
	
		$image_parts = explode(";base64,", $this->input->post('signed'));
			
		$image_type_aux = explode("image/", $image_parts[0]);
		
		$image_type = $image_type_aux[1];
		
		$image_base64 = base64_decode($image_parts[1]);
		
		$file = $folderPath . uniqid() . '.'.$image_type;
		// die(var_dump($file));
		
		file_put_contents($file, $image_base64);
		echo "<h3><i>Upload Tanda Tangan Berhasil..</i><h3>";
	}


}
