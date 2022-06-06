<?php

class M_kredit extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('session'));
	}

	public function insert($data)
	{
		$insert = $this->db->insert_batch('latar_belakang', $data);
		if ($insert) {
			return true;
		}
	}

	function get_no_cif()
	{
		$sql = "SELECT (cif_bank) AS get_no_cif FROM latar_belakang";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) {
			//cek kode jika telah tersedia    
			$data = $query->row();
			$kode = ((int)$data->get_no_cif) + 1;
			$no = sprintf("%'.01d", $kode);
		} else {
			$no = "001";  //cek jika kode belum terdapat pada table
		}
		//$batas = str_pad($kode, 3, "0", STR_PAD_LEFT);    
		$kodetampil = "0000" . $no;  //format kode
		return $kodetampil;
	}

	function cek_id($id_lb)
	{
		$query = array('id_lb' => $id_lb);
		return $this->db->get_where('latar_belakang', $query);
	}

	function cek_id_rw($id_rp)
	{
		$query = array('id_rp' => $id_rp);
		return $this->db->get_where('riwayat_pinjaman', $query);
	}

	public function tampil_data($user)
	{
		return $this->db->query("SELECT * FROM latar_belakang WHERE user='$user'");
	}

	public function add_data($data)
	{
		$cif_bank			= $this->input->post('cif_bank');
		$tgl_analisa		= $this->input->post('tgl_analisa');
		$tgl_permohonan     = $this->input->post('tgl_permohonan');
		$plafon      		= $this->input->post('plafon');
		$jangka_waktu      	= $this->input->post('jangka_waktu');
		$sifat_kredit      	= $this->input->post('sifat_kredit');
		$suku_bunga      	= $this->input->post('suku_bunga');
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
		$user				= $this->input->post('user');

		$data = array(

			'cif_bank'	    	=> $cif_bank,
			'tgl_analisa'	    => $tgl_analisa,
			'tgl_permohonan'	=> $tgl_permohonan,
			'plafon'	    	=> $plafon,
			'jangka_waktu'	    => $jangka_waktu,
			'sifat_kredit'	    => $sifat_kredit,
			'suku_bunga'	    => $suku_bunga,
			'jenis_permohonan'	=> $jenis_permohonan,
			'tujuan_permohonan'	=> $tujuan_permohonan,
			'ket_penggunaan'	=> $ket_penggunaan,
			'nama_debitur'	    => $nama_debitur,
			'status_kawin'	    => $status_kawin,
			'ttl_nasabah'	    => $ttl_nasabah,
			'ktp'	    		=> $ktp,
			'alamat_ktp_nasabah' => $alamat_ktp_nasabah,
			'domisili_nasabah'	=> $domisili_nasabah,
			'hp_nasabah'	    => $hp_nasabah,
			'status_tt'	    	=> $status_tt,
			'pekerjaan_nasabah'	=> $pekerjaan_nasabah,
			'tanggungan'	    => $tanggungan,
			'pendidikan'	    => $pendidikan,
			'jenis_kelamin'	    => $jenis_kelamin,
			'masa_laku'	    	=> $masa_laku,
			'telp_kantor'	    => $telp_kantor,
			'lama_tinggal'	    => $lama_tinggal,
			'nama_pasangan'	    => $nama_pasangan,
			'ttl_pasangan'	    => $ttl_pasangan,
			'alamat_ktp_pasangan' => $alamat_ktp_pasangan,
			'domisili_pasangan'	=> $domisili_pasangan,
			'pekerjaan_pasangan' => $pekerjaan_pasangan,
			'hp_pasangan'	    => $hp_pasangan,
			'nama_keluarga'	    => $nama_keluarga,
			'hubungan_keluarga'	=> $hubungan_keluarga,
			'alamat_keluarga'	=> $alamat_keluarga,
			'hp_keluarga'		=> $hp_keluarga,
			'user'		=> $user
		);
		$this->db->insert('latar_belakang', $data);
		redirect('kredit/lb');
	}

	public function edit_data($data)
	{
		$id_lb		= $this->input->post('id_lb');
		$tgl_analisa		= $this->input->post('tgl_analisa');
		$tgl_permohonan     = $this->input->post('tgl_permohonan');
		$plafon      		= $this->input->post('plafon');
		$jangka_waktu      	= $this->input->post('jangka_waktu');
		$sifat_kredit      	= $this->input->post('sifat_kredit');
		$suku_bunga      	= $this->input->post('suku_bunga');
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
		
		$kondisi = array('id_lb' => $id_lb );

		$data = array(

			'tgl_analisa'	    => $tgl_analisa,
			'tgl_permohonan'	=> $tgl_permohonan,
			'plafon'	    	=> $plafon,
			'jangka_waktu'	    => $jangka_waktu,
			'sifat_kredit'	    => $sifat_kredit,
			'suku_bunga'	    => $suku_bunga,
			'jenis_permohonan'	=> $jenis_permohonan,
			'tujuan_permohonan'	=> $tujuan_permohonan,
			'ket_penggunaan'	=> $ket_penggunaan,
			'nama_debitur'	    => $nama_debitur,
			'status_kawin'	    => $status_kawin,
			'ttl_nasabah'	    => $ttl_nasabah,
			'ktp'	    		=> $ktp,
			'alamat_ktp_nasabah' => $alamat_ktp_nasabah,
			'domisili_nasabah'	=> $domisili_nasabah,
			'hp_nasabah'	    => $hp_nasabah,
			'status_tt'	    	=> $status_tt,
			'pekerjaan_nasabah'	=> $pekerjaan_nasabah,
			'tanggungan'	    => $tanggungan,
			'pendidikan'	    => $pendidikan,
			'jenis_kelamin'	    => $jenis_kelamin,
			'masa_laku'	    	=> $masa_laku,
			'telp_kantor'	    => $telp_kantor,
			'lama_tinggal'	    => $lama_tinggal,
			'nama_pasangan'	    => $nama_pasangan,
			'ttl_pasangan'	    => $ttl_pasangan,
			'alamat_ktp_pasangan' => $alamat_ktp_pasangan,
			'domisili_pasangan'	=> $domisili_pasangan,
			'pekerjaan_pasangan' => $pekerjaan_pasangan,
			'hp_pasangan'	    => $hp_pasangan,
			'nama_keluarga'	    => $nama_keluarga,
			'hubungan_keluarga'	=> $hubungan_keluarga,
			'alamat_keluarga'	=> $alamat_keluarga,
			'hp_keluarga'		=> $hp_keluarga
		);
		$this->db->update('latar_belakang', $data,$kondisi);
		redirect('test/edit?id_lb=' . $id_lb);
	}


	public function add_data_rw($x)
	{
		$id_lb			= $this->input->post('id_lb');
		$plafond			= $this->input->post('plafond');
		$status		= $this->input->post('status');
		$saldo     = $this->input->post('saldo');
		$sejarah      		= $this->input->post('sejarah');
		$data      	= $this->input->post('data');

		$x = array(

			'id_lb'	    	=> $id_lb,
			'plafond'	    	=> $plafond,
			'status'	    => $status,
			'saldo'	=> $saldo,
			'sejarah'	    	=> $sejarah,
			'data'	    => $data
		);
		$this->db->insert('riwayat_pinjaman', $x);
	}

	public function edit_data_rw($data)
	{
		$id_rp			= $this->input->post('id_rp');
		$id_lb			= $this->input->post('id_lb');
		$plafond			= $this->input->post('plafond');
		$status		= $this->input->post('status');
		$saldo     = $this->input->post('saldo');
		$sejarah      		= $this->input->post('sejarah');
		$data      	= $this->input->post('data');

		$kondisi = array('id_rp' => $id_rp );

		$data = array(

			'plafond'	    	=> $plafond,
			'status'	    => $status,
			'saldo'	=> $saldo,
			'sejarah'	    	=> $sejarah,
			'data'	    => $data
		);
		$this->db->update('riwayat_pinjaman', $data,$kondisi);
		redirect('test/edit?id_lb=' . $id_lb);
	}

	/* penambahan data dengan perulangan
	public function add_data_rw($data)
	{
		$id_lb			= $_POST['id_lb'];
		$plafond			= $_POST['plafond'];
		$status		= $_POST['status'];
		$saldo     = $_POST['saldo'];
		$sejarah      		= $_POST['sejarah'];
		$data      	= $_POST['data'];

		$total = count($plafond);

		for ($i = 0; $i < $total; $i++) {
			$x[] = array(

				'id_lb'	    	=> $id_lb[$i],
				'plafond'	    	=> $plafond[$i],
				'status'	    => $status[$i],
				'saldo'	=> $saldo[$i],
				'sejarah'	    	=> $sejarah[$i],
				'data'	    => $data[$i]
			);
			$this->db->insert('riwayat_pinjaman', $x[$i]);
		}
		redirect('kredit/templateword2?id_lb='. $id_lb[0]);
	}
	*/

	function hapus_data($id_lb)
	{
		$this->db->where(array('id_lb' => $id_lb));
		$this->db->delete('latar_belakang');
		redirect('kredit/lb?=id' . $id_lb);
	}

	function hapus_data2($id_rp, $id_lb)
	{
		$this->db->where(array('id_rp' => $id_rp));
		$this->db->delete('riwayat_pinjaman');
		redirect('test/edit?id_lb=' . $id_lb);
	}
}
