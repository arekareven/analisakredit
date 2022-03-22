<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TemplateWord extends CI_Controller
{

	public function index()
	{
		$id_char = $_GET['id_char'];
		$surat = $this->db->query("SELECT * FROM karakter WHERE id_char='$id_char'");
		foreach ($surat->result() as $row) {
			require 'vendor/autoload.php';
			$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('character.docx');

			$templateProcessor->setValues([
				'info_pribadi'            => $row->info_pribadi,
				'info_perilaku'        => $row->info_perilaku,
				'info_keluarga'    => $row->info_keluarga,
				'nm1'                => $row->nm1,
				'nm2'                => $row->nm2,
				'nm3'                => $row->nm3,
				'al1'                => $row->al1,
				'al2'                => $row->al2,
				'al3'                => $row->al3,
				'hp1'                => $row->hp1,
				'hp2'                => $row->hp2,
				'hp3'                => $row->hp3
			]);

			header("Content-Disposition: attachment; filename=cetak.docx");
			$templateProcessor->saveAs('php://output');
		}
		redirect('character/view');
	}
}
