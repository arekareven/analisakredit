<?php

class M_dummy extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper(array('url'));
	}

	public function tampil_data()
	{
		return $this->db->query("SELECT * FROM bismillah WHERE no1='I' OR no1='II' OR no1='III' OR no1='IV'");
	}

	public function tampil_data2()
	{
		return $this->db->query("SELECT * FROM bismillah WHERE no1='V' OR no1='VI' OR no1='VII' OR no1='VIII'");
	}

	public function add_data()
	{
		$id_cf			= $this->input->post('id_cf');
		$dari		= $this->input->post('dari');
		$untuk     = $this->input->post('untuk');
		$keterangan      		= $this->input->post('keterangan');
		$pemasukan      	= $this->input->post('pemasukan');

		$data = array(

			'id_cf'	    	=> $id_cf,
			'dari'	    => $dari,
			'untuk'	=> $untuk,
			'keterangan'	    	=> $keterangan,
			'pemasukan'	    => $pemasukan
		);
		$this->db->insert('dummy', $data);
		redirect('dummy');
	}

	public function add_data2()
	{
		$id			= $this->input->post('id');
		$no1		= $this->input->post('no1');
		$no2     = $this->input->post('no2');
		$no3      		= $this->input->post('no3');
		$no4      	= $this->input->post('no4');
		$no5      	= $this->input->post('no5');
		$keterangan1      	= $this->input->post('keterangan1');
		$keterangan2      	= $this->input->post('keterangan2');
		$keterangan3      	= $this->input->post('keterangan3');
		$keterangan4      	= $this->input->post('keterangan4');
		$keterangan5      	= $this->input->post('keterangan5');
		$keterangan6      	= $this->input->post('keterangan6');
		$pemasukan2      	= $this->input->post('pemasukan2');
		$pemasukan3      	= $this->input->post('pemasukan3');
		$pemasukan4      	= $this->input->post('pemasukan4');
		$pemasukan5      	= $this->input->post('pemasukan5');
		$pengeluaran2      	= $this->input->post('pengeluaran2');
		$pengeluaran3      	= $this->input->post('pengeluaran3');
		$pengeluaran4      	= $this->input->post('pengeluaran4');
		$pengeluaran5      	= $this->input->post('pengeluaran5');
		$saldo6      	= ($pemasukan2+$pemasukan3+$pemasukan4+$pemasukan5)-($pengeluaran2+$pengeluaran3+$pengeluaran4+$pengeluaran5);
		/*$saldo6      	= $this->input->post('saldo6');*/
		$data = array(

			'id'	    	=> $id,
			'no1'	    => $no1,
			'no2'	=> $no2,
			'no3'	    	=> $no3,
			'no4'	    => $no4,
			'no5'	    => $no5,
			'keterangan1'	    => $keterangan1,
			'keterangan2'	    => $keterangan2,
			'keterangan3'	    => $keterangan3,
			'keterangan4'	    => $keterangan4,
			'keterangan5'	    => $keterangan5,
			'keterangan6'	    => $keterangan6,
			'pemasukan2'	    => $pemasukan2,
			'pemasukan3'	    => $pemasukan3,
			'pemasukan4'	    => $pemasukan4,
			'pemasukan5'	    => $pemasukan5,
			'pengeluaran2'	    => $pengeluaran2,
			'pengeluaran3'	    => $pengeluaran3,
			'pengeluaran4'	    => $pengeluaran4,
			'pengeluaran5'	    => $pengeluaran5,
			'saldo6'	    => $saldo6,
		);
		$this->db->insert('bismillah', $data);
		redirect('dummy');
	}

	public function add_data3()
	{
		$id			= $this->input->post('id');
		$no1		= $this->input->post('no1');
		$no2     = $this->input->post('no2');
		$no3      		= $this->input->post('no3');
		$no4      	= $this->input->post('no4');
		$no5      	= $this->input->post('no5');
		$keterangan1      	= $this->input->post('keterangan1');
		$keterangan2      	= $this->input->post('keterangan2');
		$keterangan3      	= $this->input->post('keterangan3');
		$keterangan4      	= $this->input->post('keterangan4');
		$keterangan5      	= $this->input->post('keterangan5');
		$keterangan6      	= $this->input->post('keterangan6');
		$pemasukan2      	= $this->input->post('pemasukan2');
		$pemasukan3      	= $this->input->post('pemasukan3');
		$pemasukan4      	= $this->input->post('pemasukan4');
		$pemasukan5      	= $this->input->post('pemasukan5');
		$pengeluaran2      	= $this->input->post('pengeluaran2');
		$pengeluaran3      	= $this->input->post('pengeluaran3');
		$pengeluaran4      	= $this->input->post('pengeluaran4');
		$pengeluaran5      	= $this->input->post('pengeluaran5');
		$saldo6      	= ($pengeluaran2+$pengeluaran3+$pengeluaran4+$pengeluaran5);
		/*$saldo6      	= $this->input->post('saldo6');*/
		$data = array(

			'id'	    	=> $id,
			'no1'	    => $no1,
			'no2'	=> $no2,
			'no3'	    	=> $no3,
			'no4'	    => $no4,
			'no5'	    => $no5,
			'keterangan1'	    => $keterangan1,
			'keterangan2'	    => $keterangan2,
			'keterangan3'	    => $keterangan3,
			'keterangan4'	    => $keterangan4,
			'keterangan5'	    => $keterangan5,
			'keterangan6'	    => $keterangan6,
			'pemasukan2'	    => $pemasukan2,
			'pemasukan3'	    => $pemasukan3,
			'pemasukan4'	    => $pemasukan4,
			'pemasukan5'	    => $pemasukan5,
			'pengeluaran2'	    => $pengeluaran2,
			'pengeluaran3'	    => $pengeluaran3,
			'pengeluaran4'	    => $pengeluaran4,
			'pengeluaran5'	    => $pengeluaran5,
			'saldo6'	    => $saldo6,
		);
		$this->db->insert('bismillah', $data);
		redirect('dummy');
	}
}
