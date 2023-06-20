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
		$cek = $this->db->query("SELECT * FROM usulan WHERE id_lb='$id_lb'");
			if ($cek->num_rows() > 0) {
				foreach ($cek->result() as $data) {
					$file_lama = $data->file;
				}
			}
		
		$config['upload_path']          = './upload/file/jaminan/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 1024;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('userfile'))
		{
			echo $this->upload->display_errors();
		}
		else
		{
			if ($file_lama != '') {
					unlink(FCPATH . '/upload/file/jaminan/' . $file_lama);
				}
			$upload_data = $this->upload->data('file_name');
			$this->db->set('file', $upload_data);
			$this->db->where('id_lb', $id_lb);
			$this->db->update('usulan');

			$this->session->set_flashdata('success_upload_gambar', '<div class="alert alert-success" role="alert">Foto jaminan berhasil di upload!</div>');
			redirect('main?id_lb='.$id_lb);
		}
	}
}
