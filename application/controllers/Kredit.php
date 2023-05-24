<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kredit extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_kredit');
		$this->load->helper('url');
		$this->load->library(array('session'));
	}
	    
	//RIWAYAT PINJAMAN
    function data_rw(){
        $id_lb=$this->input->post('id_lb');
		$data=$this->m_kredit->rw_list($id_lb);
		echo json_encode($data);
	}
	
	public function add_rw()
	{
		$id_rp = $this->input->post('id_rp');

		$query = $this->m_kredit->cek_id_rw($id_rp)->num_rows();
		if (empty($query))
			$this->m_kredit->add_data_rw($id_rp);
		else
			$this->m_kredit->edit_data_rw($id_rp);
	}
        
	function get_rp(){
		$id_rp=$this->input->get('id');
		$data=$this->m_kredit->get_rp_by_kode($id_rp);
		echo json_encode($data);
	}
	
	public function update_rp()
	{
		$id_rp = $this->input->post('id_rp');
		$plafond			= $this->input->post('plafond');
		$status		= $this->input->post('status');
		$saldo     = $this->input->post('saldo');
		$sejarah      		= $this->input->post('sejarah');
		$data      	= $this->input->post('data');
		$hasil = $this->m_kredit->update_rp($id_rp, $plafond, $status, $saldo, $sejarah, $data);
		echo json_encode($hasil);
	}
	
	function delete_rp(){
		$id_rp=$this->input->post('kode');
		$data=$this->m_kredit->delete_rp($id_rp);
		echo json_encode($data);
	}

	//DATA LATAR BELAKANG
	public function add_latar_belakang()
	{
		$id_lb = $this->input->post('id_lb');

		$query = $this->m_kredit->cek_id($id_lb)->num_rows();
		if (empty($query))
			$this->m_kredit->add_data($id_lb);
		else
			$this->m_kredit->edit_data($id_lb);
	}


	public function to_rp()
	{
		$id_lb = $_GET['id_lb'];
		redirect('main?id_lb=' . $id_lb);
	}


	public function cetak()
	{
		$id_lb = $_GET['id_lb'];
		redirect('pdf_lb?id_lb=' . $id_lb);
	}

	public function lb()
	{
		$data['cif'] = $this->m_kredit->get_no_cif();
		$data['title'] = 'Latar Belakang';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$user = $this->session->userdata('email');
		$data['query'] = $this->m_kredit->tampil_data($user);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('kredit/latar_belakang', $data);
		$this->load->view('templates/footer');
	}

	public function kalender()
	{
		$data['title'] = 'Kalender';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$name = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $a = $name['name'];
		// die(var_dump($a));
		
		
		$data['result'] = $this->db->query("SELECT * FROM pengajuan WHERE nama_ao='$a'")->result();	
		// die(var_dump($data['result']));
		
		// $data['result'] = $this->db->get("pengajuan")->result();	

		foreach ($data['result'] as $key => $value) {
			$data['data'][$key]['title'] = $value->name_debitur;
			$data['data'][$key]['start'] = $value->waktu_zoom;
			$data['data'][$key]['url'] = $value->link_zoom;
			$data['data'][$key]['backgroundColor'] = "#00a65a";
		}
		

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('kredit/calendar', $data);
		$this->load->view('templates/footer');
	}

	public function hapus()
	{
		$idt = $this->input->post('idt2');
		$this->m_kredit->hapus_data($idt);
	}

	public function hapus2()
	{
		$idt = $this->input->post('idt2');
		$id_lb = $this->input->post('id_lb');
		$this->m_kredit->hapus_data2($idt, $id_lb);
	}


	//LATAR BELAKANG
	function show_latar_belakang(){
		$user = $this->session->userdata('email');
		$data = $this->m_kredit->show_latar_belakang($user);
		echo json_encode($data);
	}
        
	function edit_latar_belakang(){
		$id_lb=$this->input->get('id');
		$data=$this->m_kredit->edit_latar_belakang($id_lb);
		echo json_encode($data);
	}
	
	function update_latar_belakang()
	{
		$id_lb				= $this->input->post('id_lb');
		$tgl_analisa		= $this->input->post('tgl_analisa');
		$tgl_permohonan     = $this->input->post('tgl_permohonan');
		$plafon      		= $this->input->post('plafon');
		$jangka_waktu      	= $this->input->post('jangka_waktu');
		$sifat_kredit      	= $this->input->post('sifat_kredit');
		$suku_bunga      	= $this->input->post('suku_bunga');
		$musiman      		= $this->input->post('musiman');
		$jenis_permohonan   = $this->input->post('jenis_permohonan');
		$tujuan_permohonan  = $this->input->post('tujuan_permohonan');
		$ket_penggunaan     = $this->input->post('ket_penggunaan');
		$nama_debitur      	= $this->input->post('nama_debitur');
		$status_kawin      	= $this->input->post('status_kawin');
		$ttl_nasabah      	= $this->input->post('ttl_nasabah');
		$ktp      			= $this->input->post('ktp');
		$alamat_ktp_nasabah = $this->input->post('alamat_ktp_nasabah');
		$domisili_nasabah   = $this->input->post('domisili_nasabah');
		$hp_nasabah      	= $this->input->post('hp_nasabah');
		$status_tt      	= $this->input->post('status_tt');
		$pekerjaan_nasabah  = $this->input->post('pekerjaan_nasabah');
		$tanggungan      	= $this->input->post('tanggungan');
		$pendidikan      	= $this->input->post('pendidikan');
		$jenis_kelamin      = $this->input->post('jenis_kelamin');
		$masa_laku      	= $this->input->post('masa_laku');
		$telp_kantor      	= $this->input->post('telp_kantor');
		$lama_tinggal      	= $this->input->post('lama_tinggal');
		$nama_pasangan      = $this->input->post('nama_pasangan');
		$ttl_pasangan      	= $this->input->post('ttl_pasangan');
		$alamat_ktp_pasangan = $this->input->post('alamat_ktp_pasangan');
		$domisili_pasangan  = $this->input->post('domisili_pasangan');
		$pekerjaan_pasangan = $this->input->post('pekerjaan_pasangan');
		$hp_pasangan      	= $this->input->post('hp_pasangan');
		$nama_keluarga      = $this->input->post('nama_keluarga');
		$hubungan_keluarga	= $this->input->post('hubungan_keluarga');
		$alamat_keluarga	= $this->input->post('alamat_keluarga');
		$hp_keluarga		= $this->input->post('hp_keluarga');

		$this->m_kredit->update_latar_belakang($id_lb,$tgl_analisa,$tgl_permohonan,$plafon,$jangka_waktu,$sifat_kredit,$suku_bunga,$musiman,$jenis_permohonan,$tujuan_permohonan,$ket_penggunaan,$nama_debitur,$status_kawin,$ttl_nasabah,$ktp,$alamat_ktp_nasabah,$domisili_nasabah,$hp_nasabah,$status_tt,$pekerjaan_nasabah,$tanggungan,$pendidikan,$jenis_kelamin,$masa_laku,$telp_kantor,$lama_tinggal,$nama_pasangan,$ttl_pasangan,$alamat_ktp_pasangan,$domisili_pasangan,$pekerjaan_pasangan,$hp_pasangan,$nama_keluarga,$hubungan_keluarga,$alamat_keluarga,$hp_keluarga);
	
	}
	
	function destroy_latar_belakang(){
		$id_lb=$this->input->post('kode');
		$data=$this->m_kredit->destroy_latar_belakang($id_lb);
		echo json_encode($data);
	}
}
