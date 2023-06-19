<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Upload_jaminan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
        $this->load->helper('url', 'download');
        $this->load->library(array('session'));
	}

	// Upload file
	public function upload()
	{
		$id_lb = $this->input->post('id_lb');
		// $cek = $this->db->query("SELECT * FROM pengajuan WHERE id_lb='$id_lb'");
		// 	if ($cek->num_rows() > 0) {
		// 		foreach ($cek->result() as $data) {
		// 			$file_lama = $data->file;
		// 		}

		// 	// 	$file_name = 'file-'.$id_lb;
		// 	// 	$config['upload_path']          = FCPATH.'/upload/file/jaminan/';
		// 	// 	$config['allowed_types']        = 'jpg|png';
		// 	// 	$config['file_name']            = $file_name;
		// 	// 	$config['overwrite']            = true;
		// 	// 	$config['max_size']             = 2048; // 1MB

		// 	// 	$this->load->library('upload', $config);

		// 	// 	if ($this->upload->do_upload('upload')) {
		// 	// 		if ($file_lama != null) {
		// 	// 			unlink(FCPATH . '/upload/file/jaminan/' . $file_lama);
		// 	// 		}
		// 	// 		$new_file = $this->upload->data('file_name');
		// 	// 		$this->db->set('file', $new_file);
		// 	// 		$this->db->where('id_lb', $id_lb);
		// 	// 		$this->db->update('pengajuan');
		// 	// 	} else {
		// 	// 		echo $this->upload->display_errors();
		// 	// 	}

		// 	// 	redirect('main?id_lb='.$id_lb);

		// 	// }else
		// 	// redirect('main?id_lb='.$id_lb);

		// 	// cek jika ada gambar yang akan diupload
		// 	$upload_file = $_FILES['file']['name'];
		// 	// die(var_dump($upload_file));
		// 	if ($upload_file) {
		// 		$config['allowed_types'] = 'gif|jpg|png';
		// 		$config['max_size'] = '2048';
		// 		$config['upload_path'] = './upload/file/jaminan/';

		// 		$this->load->library('upload', $config);

		// 		if ($this->upload->do_upload('file')) {
		// 			$old_file = $file_lama;
		// 			if ($old_file != 'default.jpg') {
		// 				unlink(FCPATH . '/upload/file/jaminan/' . $old_file);
		// 			}
		// 			$new_file = $this->upload->data('file_name');
		// 			$this->db->set('file', $new_file);
		// 		} else {
		// 			echo $this->upload->display_errors();
		// 		}
		// 	}

		// 	$this->db->where('id_lb', $id_lb);
		// 	$this->db->update('pengajuan');

		// 	// $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
		// 	redirect('main?id_lb='.$id_lb);
		// }

		
		$config['upload_path']          = './upload/file/jaminan/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 1024;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('userfile'))
		{
				$error = array('error' => $this->upload->display_errors());

				$this->load->view('upload_form', $error);
		}
		else
		{
				$upload_data = $this->upload->data('file_name');
				$this->db->set('file', $upload_data);
				$this->db->where('id_lb', $id_lb);
				$this->db->update('pengajuan');

				redirect('main?id_lb='.$id_lb);
		}
	}
}
