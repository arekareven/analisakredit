<?php

class M_cashflow extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session'));
    }

    //CRUD dengan jquery Ajax cashflow awal pendapatan
	function get_kode($id_lb)
    {
        $cd = $this->db->query("SELECT MAX(kode) AS kd_max FROM cashflow_b WHERE id_lb='$id_lb' ");
        if ($cd->num_rows() > 0) {
            $data = $cd->row();
            $tmp = ((int)$data->kd_max) + 1;
            
        } else {
            $tmp = "1";
        }
        return $tmp;
    }
	
	function cek_id($id_lb,$kode)
    {
		$query = array('id_lb' => $id_lb,'kode' => $kode);
        return $this->db->get_where('cashflow_b', $query);
    }

	function cashawpend_list($id_lb)
	{
		$hasil = $this->db->query("SELECT * FROM cashflow_b WHERE id_lb=$id_lb AND jenis='pendapatan' AND kode_jenis='K'");
		return $hasil->result();
	}

	function get_cashawpend_by_kode($id_cf)
	{
		$hsl = $this->db->query("SELECT * FROM cashflow_b WHERE id_cf='$id_cf'");
		if ($hsl->num_rows() > 0) {
			foreach ($hsl->result() as $data) {
				$hasil = array(
					'id_cf' => $data->id_cf,
					'id_lb' => $data->id_lb,
					'kode' => $data->kode,
					'kode_perkiraan' => $data->kode_perkiraan,
					'nama_perkiraan' => $data->nama_perkiraan,
					'keterangan' => $data->keterangan,
					'saldo' => $data->saldo,
				);
			}
		}
		return $hasil;
	}
	
	function add_cashawpend($data)
	{
		$id_cf = $this->input->post('id_cf');
		$id_lb = $this->input->post('id_lb');
        $kode = $this->get_kode($id_lb);
		$kode_perkiraan = $this->input->post('kode_perkiraan');
		$kode_perkiraan2 = $this->input->post('kode_perkiraan2');
		$nama_perkiraan = $this->input->post('nama_perkiraan');
		$nama_perkiraan2 = $this->input->post('nama_perkiraan2');
		$keterangan = $this->input->post('keterangan');
		$saldo = $this->input->post('saldo');
		$kode_jenis = 'K';
		$kode_jenis2 = 'D';
		$jenis = $this->input->post('jenis');

		$data = array(
			'id_cf'         => $id_cf,
			'id_lb'         => $id_lb,
			'kode_perkiraan'    => $kode_perkiraan,
			'nama_perkiraan'    => $nama_perkiraan,
			'keterangan'        => $keterangan,
			'saldo'        => $saldo,
			'kode_jenis'        => $kode_jenis,
			'jenis'        => $jenis,
			'kode'        => $kode
		);

		$data2 = array(
			'id_cf'         => $id_cf,
			'id_lb'         => $id_lb,
			'kode_perkiraan'    => $kode_perkiraan2,
			'nama_perkiraan'    => $nama_perkiraan2,
			'keterangan'        => $keterangan,
			'saldo'        => $saldo,
			'kode_jenis'        => $kode_jenis2,
			'jenis'        => $jenis,
			'kode'        => $kode
		);

		$hasil = $this->db->insert('cashflow_b', $data); $this->db->insert('cashflow_b', $data2);
		
		return $hasil;
	}

	function edit_cashawpend($data)
	{ 
		$id_lb = $this->input->post('id_lb');
		$kode = $this->input->post('kode');
		$koper_awpend = $this->input->post('koper_awpend');
		$naper_awpend = $this->input->post('naper_awpend');
		$koper_awpend2 = $this->input->post('koper_awpend2');
		$naper_awpend2 = $this->input->post('naper_awpend2');
		$keterangan = $this->input->post('keterangan');
		$saldo = $this->input->post('saldo');
		$kode_jenis = 'K';
		$kode_jenis2 = 'D';
		$jenis = $this->input->post('jenis');

		$data = array(
			'id_lb'         => $id_lb,
			'kode_perkiraan'    => $koper_awpend,
			'nama_perkiraan'    => $naper_awpend,
			'keterangan'        => $keterangan,
			'saldo'        => $saldo,
			'kode_jenis'        => $kode_jenis,
			'jenis'        => $jenis,
			'kode'        => $kode,
		);

		$data2 = array(
			'id_lb'         => $id_lb,
			'kode_perkiraan'    => $koper_awpend2,
			'nama_perkiraan'    => $naper_awpend2,
			'keterangan'        => $keterangan,
			'saldo'        => $saldo,
			'kode_jenis'        => $kode_jenis2,
			'jenis'        => $jenis,
			'kode'        => $kode
		);
		
		$hasil = $this->db->insert('cashflow_b', $data); $this->db->insert('cashflow_b', $data2);

		return $hasil;

	}

	function delete_cashawpend($kode,$id_lb)
	{
		$hasil = $this->db->query("DELETE FROM cashflow_b WHERE id_lb='$id_lb' AND kode='$kode'");
		return $hasil;
	}
	//END CRUD dengan jquery Ajax
	
    //CRUD dengan jquery Ajax cashflow awal pengeluaran
	function cashawpeng_list($id_lb)
	{
		$hasil = $this->db->query("SELECT * FROM cashflow_b WHERE id_lb=$id_lb AND jenis='pengeluaran' AND kode_jenis='K'");
		return $hasil->result();
	}
	
	function add_cashawpeng($data)
	{
		$id_cf = $this->input->post('id_cf');
		$id_lb = $this->input->post('id_lb');
        $kode = $this->get_kode($id_lb);
		$kode_perkiraan = $this->input->post('kode_perkiraanp');
		$kode_perkiraan2 = $this->input->post('kode_perkiraanp2');
		$nama_perkiraan = $this->input->post('nama_perkiraanp');
		$nama_perkiraan2 = $this->input->post('nama_perkiraanp2');
		$keterangan = $this->input->post('keteranganp');
		$saldo = $this->input->post('saldop');
		$kode_jenis = 'K';
		$kode_jenis2 = 'D';
		$jenis = $this->input->post('jenisp');

		$data = array(
			'id_cf'         => $id_cf,
			'id_lb'         => $id_lb,
			'kode_perkiraan'    => $kode_perkiraan,
			'nama_perkiraan'    => $nama_perkiraan,
			'keterangan'        => $keterangan,
			'saldo'        => $saldo,
			'kode_jenis'        => $kode_jenis,
			'jenis'        => $jenis,
			'kode'        => $kode
		);

		$data2 = array(
			'id_cf'         => $id_cf,
			'id_lb'         => $id_lb,
			'kode_perkiraan'    => $kode_perkiraan2,
			'nama_perkiraan'    => $nama_perkiraan2,
			'keterangan'        => $keterangan,
			'saldo'        => $saldo,
			'kode_jenis'        => $kode_jenis2,
			'jenis'        => $jenis,
			'kode'        => $kode
		);

		$hasil = $this->db->insert('cashflow_b', $data); $this->db->insert('cashflow_b', $data2);

		return $hasil;
	}

	function edit_cashawpeng($data)
	{ 
		$id_lb = $this->input->post('id_lb');
		$kode = $this->input->post('kode');
		$koper_awpeng = $this->input->post('koper_awpeng');
		$naper_awpeng = $this->input->post('naper_awpeng');
		$koper_awpeng2 = $this->input->post('koper_awpeng2');
		$naper_awpeng2 = $this->input->post('naper_awpeng2');
		$keterangan = $this->input->post('keterangan');
		$saldo = $this->input->post('saldo');
		$kode_jenis = 'K';
		$kode_jenis2 = 'D';
		$jenis = $this->input->post('jenis');

		$data = array(
			'id_lb'         => $id_lb,
			'kode_perkiraan'    => $koper_awpeng,
			'nama_perkiraan'    => $naper_awpeng,
			'keterangan'        => $keterangan,
			'saldo'        => $saldo,
			'kode_jenis'        => $kode_jenis,
			'jenis'        => $jenis,
			'kode'        => $kode,
		);

		$data2 = array(
			'id_lb'         => $id_lb,
			'kode_perkiraan'    => $koper_awpeng2,
			'nama_perkiraan'    => $naper_awpeng2,
			'keterangan'        => $keterangan,
			'saldo'        => $saldo,
			'kode_jenis'        => $kode_jenis2,
			'jenis'        => $jenis,
			'kode'        => $kode
		);
		
		$hasil = $this->db->insert('cashflow_b', $data); $this->db->insert('cashflow_b', $data2);

		return $hasil;

	}
	//END CRUD dengan jquery Ajax
	
    //CRUD dengan jquery Ajax cashflow setelah pendapatan
	function get_kode_set($id_lb)
    {
        $cd = $this->db->query("SELECT MAX(kode) AS kd_max FROM cashflow_a WHERE id_lb='$id_lb' ");
        if ($cd->num_rows() > 0) {
            $data = $cd->row();
            $tmp = ((int)$data->kd_max) + 1;
            
        } else {
            $tmp = "1";
        }
        return $tmp;
    }
	
	function cek_id_set($id_lb,$kode)
    {
		$query = array('id_lb' => $id_lb,'kode' => $kode);
        return $this->db->get_where('cashflow_a', $query);
    }

	function cashsetpend_list($id_lb)
	{
		$hasil = $this->db->query("SELECT * FROM cashflow_a WHERE id_lb=$id_lb AND jenis='pendapatan' AND kode_jenis='K'");
		return $hasil->result();
	}

	function get_cashsetpend_by_kode($id_cf)
	{
		$hsl = $this->db->query("SELECT * FROM cashflow_a WHERE id_cf='$id_cf'");
		if ($hsl->num_rows() > 0) {
			foreach ($hsl->result() as $data) {
				$hasil = array(
					'id_cf' => $data->id_cf,
					'id_lb' => $data->id_lb,
					'kode' => $data->kode,
					'kode_perkiraan' => $data->kode_perkiraan,
					'nama_perkiraan' => $data->nama_perkiraan,
					'keterangan' => $data->keterangan,
					'saldo' => $data->saldo,
				);
			}
		}
		return $hasil;
	}
	
	function add_cashsetpend($data)
	{
		$id_cf = $this->input->post('id_cf');
		$id_lb = $this->input->post('id_lb');
        $kode = $this->get_kode_set($id_lb);
        $kode_perkiraan = $this->input->post('kode_perkiraan_cp');
        $kode_perkiraan2 = $this->input->post('kode_perkiraan_cp2');
        $nama_perkiraan = $this->input->post('nama_perkiraan_cp');
        $nama_perkiraan2 = $this->input->post('nama_perkiraan_cp2');
        $keterangan = $this->input->post('keterangan');
        $saldo = $this->input->post('saldo');
        $kode_jenis = 'K';
        $kode_jenis2 = 'D';
        $jenis = $this->input->post('jenis');

		$data = array(
			'id_cf'         	=> $id_cf,
			'id_lb'         	=> $id_lb,
			'kode_perkiraan'    => $kode_perkiraan,
			'nama_perkiraan'    => $nama_perkiraan,
			'keterangan'        => $keterangan,
			'saldo'        		=> $saldo,
			'kode_jenis'        => $kode_jenis,
			'jenis'        		=> $jenis,
			'kode'        		=> $kode
		);

		$data2 = array(
			'id_cf'         	=> $id_cf,
			'id_lb'         	=> $id_lb,
			'kode_perkiraan'    => $kode_perkiraan2,
			'nama_perkiraan'    => $nama_perkiraan2,
			'keterangan'        => $keterangan,
			'saldo'        		=> $saldo,
			'kode_jenis'        => $kode_jenis2,
			'jenis'        		=> $jenis,
			'kode'        		=> $kode
		);

		$hasil = $this->db->insert('cashflow_a', $data); $this->db->insert('cashflow_a', $data2);
		
		return $hasil;
	}

	function edit_cashsetpend($data)
	{ 
		$id_lb = $this->input->post('id_lb');
		$kode = $this->input->post('kode');
		$koper_setpend = $this->input->post('koper_setpend');
		$naper_setpend = $this->input->post('naper_setpend');
		$koper_setpend2 = $this->input->post('koper_setpend2');
		$naper_setpend2 = $this->input->post('naper_setpend2');
		$keterangan = $this->input->post('keterangan');
		$saldo = $this->input->post('saldo');
		$kode_jenis = 'K';
		$kode_jenis2 = 'D';
		$jenis = $this->input->post('jenis');

		$data = array(
			'id_lb'         	=> $id_lb,
			'kode_perkiraan'    => $koper_setpend,
			'nama_perkiraan'    => $naper_setpend,
			'keterangan'        => $keterangan,
			'saldo'        		=> $saldo,
			'kode_jenis'        => $kode_jenis,
			'jenis'        		=> $jenis,
			'kode'        		=> $kode,
		);

		$data2 = array(
			'id_lb'         	=> $id_lb,
			'kode_perkiraan'    => $koper_setpend2,
			'nama_perkiraan'    => $naper_setpend2,
			'keterangan'        => $keterangan,
			'saldo'        		=> $saldo,
			'kode_jenis'        => $kode_jenis2,
			'jenis'        		=> $jenis,
			'kode'        		=> $kode
		);
		
		$hasil = $this->db->insert('cashflow_a', $data); $this->db->insert('cashflow_a', $data2);

		return $hasil;

	}

	function delete_cashsetpend($kode,$id_lb)
	{
		$hasil = $this->db->query("DELETE FROM cashflow_a WHERE id_lb='$id_lb' AND kode='$kode'");
		return $hasil;
	}
	//END CRUD dengan jquery Ajax
		
    //CRUD dengan jquery Ajax cashflow awal pengeluaran
	function cashsetpeng_list($id_lb)
	{
		$hasil = $this->db->query("SELECT * FROM cashflow_a WHERE id_lb=$id_lb AND jenis='pengeluaran' AND kode_jenis='K'");
		return $hasil->result();
	}
	
	function add_cashsetpeng($data)
	{
		$id_cf = $this->input->post('id_cf');
		$id_lb = $this->input->post('id_lb');
        $kode = $this->get_kode_set($id_lb);
        $kode_perkiraan = $this->input->post('kode_perkiraan_cpe');
        $kode_perkiraan2 = $this->input->post('kode_perkiraan_cpe2');
        $nama_perkiraan = $this->input->post('nama_perkiraan_cpe');
        $nama_perkiraan2 = $this->input->post('nama_perkiraan_cpe2');
        $keterangan = $this->input->post('keteranganp');
        $saldo = $this->input->post('saldop');
        $kode_jenis = 'K';
        $kode_jenis2 = 'D';
        $jenis = $this->input->post('jenisp');

		$data = array(
			'id_cf'         => $id_cf,
			'id_lb'         => $id_lb,
			'kode_perkiraan'    => $kode_perkiraan,
			'nama_perkiraan'    => $nama_perkiraan,
			'keterangan'        => $keterangan,
			'saldo'        => $saldo,
			'kode_jenis'        => $kode_jenis,
			'jenis'        => $jenis,
			'kode'        => $kode
		);

		$data2 = array(
			'id_cf'         => $id_cf,
			'id_lb'         => $id_lb,
			'kode_perkiraan'    => $kode_perkiraan2,
			'nama_perkiraan'    => $nama_perkiraan2,
			'keterangan'        => $keterangan,
			'saldo'        => $saldo,
			'kode_jenis'        => $kode_jenis2,
			'jenis'        => $jenis,
			'kode'        => $kode
		);

		$hasil = $this->db->insert('cashflow_a', $data); $this->db->insert('cashflow_a', $data2);

		return $hasil;
	}

	function edit_cashsetpeng($data)
	{ 
		$id_lb = $this->input->post('id_lb');
		$kode = $this->input->post('kode');
		$koper_setpeng = $this->input->post('koper_setpeng');
		$naper_setpeng = $this->input->post('naper_setpeng');
		$koper_setpeng2 = $this->input->post('koper_setpeng2');
		$naper_setpeng2 = $this->input->post('naper_setpeng2');
		$keterangan = $this->input->post('keterangan');
		$saldo = $this->input->post('saldo');
		$kode_jenis = 'K';
		$kode_jenis2 = 'D';
		$jenis = $this->input->post('jenis');

		$data = array(
			'id_lb'         	=> $id_lb,
			'kode_perkiraan'    => $koper_setpeng,
			'nama_perkiraan'    => $naper_setpeng,
			'keterangan'        => $keterangan,
			'saldo'        		=> $saldo,
			'kode_jenis'        => $kode_jenis,
			'jenis'        		=> $jenis,
			'kode'        		=> $kode,
		);

		$data2 = array(
			'id_lb'         	=> $id_lb,
			'kode_perkiraan'    => $koper_setpeng2,
			'nama_perkiraan'    => $naper_setpeng2,
			'keterangan'        => $keterangan,
			'saldo'        		=> $saldo,
			'kode_jenis'        => $kode_jenis2,
			'jenis'        		=> $jenis,
			'kode'        		=> $kode
		);
		
		$hasil = $this->db->insert('cashflow_a', $data); $this->db->insert('cashflow_a', $data2);

		return $hasil;

	}
	//END CRUD dengan jquery Ajax	

    //CRUD dengan jquery Ajax cashflow awal hutang
	function cashsethut_list($id_lb)
	{
		$hasil = $this->db->query("SELECT * FROM cashflow_a WHERE id_lb=$id_lb AND jenis='hutang' AND kode_jenis='K'");
		return $hasil->result();
	}
	
	function add_cashsethut($data)
	{
		$id_cf = $this->input->post('id_cf');
		$id_lb = $this->input->post('id_lb');
        $kode = $this->get_kode_set($id_lb);
        $kode_perkiraan = $this->input->post('kode_perkiraan_hutang');
        $kode_perkiraan2 = $this->input->post('kode_perkiraan_hutang2');
        $nama_perkiraan = $this->input->post('nama_perkiraan_hutang');
        $nama_perkiraan2 = $this->input->post('nama_perkiraan_hutang2');
        $keterangan = $this->input->post('keterangan_hutang');
        $saldo = $this->input->post('saldo_hutang');
        $kode_jenis = 'K';
        $kode_jenis2 = 'D';
        $jenis = $this->input->post('jenis_hutang');

		$data = array(
			'id_cf'         => $id_cf,
			'id_lb'         => $id_lb,
			'kode_perkiraan'    => $kode_perkiraan,
			'nama_perkiraan'    => $nama_perkiraan,
			'keterangan'        => $keterangan,
			'saldo'        => $saldo,
			'kode_jenis'        => $kode_jenis,
			'jenis'        => $jenis,
			'kode'        => $kode
		);

		$data2 = array(
			'id_cf'         => $id_cf,
			'id_lb'         => $id_lb,
			'kode_perkiraan'    => $kode_perkiraan2,
			'nama_perkiraan'    => $nama_perkiraan2,
			'keterangan'        => $keterangan,
			'saldo'        => $saldo,
			'kode_jenis'        => $kode_jenis2,
			'jenis'        => $jenis,
			'kode'        => $kode
		);

		$hasil = $this->db->insert('cashflow_a', $data); $this->db->insert('cashflow_a', $data2);
		return $hasil;
	}

	function edit_cashsethut($data)
	{ 
		$id_lb = $this->input->post('id_lb');
		$kode = $this->input->post('kode');
		$koper_sethut = $this->input->post('koper_sethut');
		$naper_sethut = $this->input->post('naper_sethut');
		$koper_sethut2 = $this->input->post('koper_sethut2');
		$naper_sethut2 = $this->input->post('naper_sethut2');
		$keterangan = $this->input->post('keterangan');
		$saldo = $this->input->post('saldo');
		$kode_jenis = 'K';
		$kode_jenis2 = 'D';
		$jenis = $this->input->post('jenis');

		$data = array(
			'id_lb'         	=> $id_lb,
			'kode_perkiraan'    => $koper_sethut,
			'nama_perkiraan'    => $naper_sethut,
			'keterangan'        => $keterangan,
			'saldo'        		=> $saldo,
			'kode_jenis'        => $kode_jenis,
			'jenis'        		=> $jenis,
			'kode'        		=> $kode,
		);

		$data2 = array(
			'id_lb'         	=> $id_lb,
			'kode_perkiraan'    => $koper_sethut2,
			'nama_perkiraan'    => $naper_sethut2,
			'keterangan'        => $keterangan,
			'saldo'        		=> $saldo,
			'kode_jenis'        => $kode_jenis2,
			'jenis'        		=> $jenis,
			'kode'        		=> $kode
		);
		
		$hasil = $this->db->insert('cashflow_a', $data); $this->db->insert('cashflow_a', $data2);

		return $hasil;

	}
	//END CRUD dengan jquery Ajax

    //CRUD dengan jquery Ajax cashflow lain pendapatan
	function get_kode_lain($id_lb)
    {
        $cd = $this->db->query("SELECT MAX(kode) AS kd_max FROM cashflow_lain WHERE id_lb='$id_lb' ");
        if ($cd->num_rows() > 0) {
            $data = $cd->row();
            $tmp = ((int)$data->kd_max) + 1;
            
        } else {
            $tmp = "1";
        }
        return $tmp;
    }
	
	function cek_id_lain($id_lb,$kode)
    {
		$query = array('id_lb' => $id_lb,'kode' => $kode);
        return $this->db->get_where('cashflow_lain', $query);
    }

	function cashpendlain_list($id_lb)
	{
		$hasil = $this->db->query("SELECT * FROM cashflow_lain WHERE id_lb=$id_lb AND jenis='pendapatan' AND kode_jenis='K'");
		return $hasil->result();
	}

	function get_cashpendlain_by_kode($id_cf)
	{
		$hsl = $this->db->query("SELECT * FROM cashflow_lain WHERE id_cf='$id_cf'");
		if ($hsl->num_rows() > 0) {
			foreach ($hsl->result() as $data) {
				$hasil = array(
					'id_cf' => $data->id_cf,
					'id_lb' => $data->id_lb,
					'kode' => $data->kode,
					'kode_perkiraan' => $data->kode_perkiraan,
					'nama_perkiraan' => $data->nama_perkiraan,
					'keterangan' => $data->keterangan,
					'saldo' => $data->saldo,
				);
			}
		}
		return $hasil;
	}
	
	function add_cashpendlain($data)
	{
		$id_cf = $this->input->post('id_cf');
		$id_lb = $this->input->post('id_lb');
        $kode = $this->get_kode_lain($id_lb);
		$kode_perkiraan = $this->input->post('kode_perkiraan_pendlain');
		$kode_perkiraan2 = $this->input->post('kode_perkiraan_pendlain2');
		$nama_perkiraan = $this->input->post('nama_perkiraan_pendlain');
		$nama_perkiraan2 = $this->input->post('nama_perkiraan_pendlain2');
		$keterangan = $this->input->post('keterangan_pendapatanlain');
		$saldo = $this->input->post('saldo_pendapatanlain');
		$kode_jenis = 'K';
		$kode_jenis2 = 'D';
		$jenis = $this->input->post('jenis_pendapatanlain');

		$data = array(
			'id_cf'         => $id_cf,
			'id_lb'         => $id_lb,
			'kode_perkiraan'    => $kode_perkiraan,
			'nama_perkiraan'    => $nama_perkiraan,
			'keterangan'        => $keterangan,
			'saldo'        => $saldo,
			'kode_jenis'        => $kode_jenis,
			'jenis'        => $jenis,
			'kode'        => $kode
		);

		$data2 = array(
			'id_cf'         => $id_cf,
			'id_lb'         => $id_lb,
			'kode_perkiraan'    => $kode_perkiraan2,
			'nama_perkiraan'    => $nama_perkiraan2,
			'keterangan'        => $keterangan,
			'saldo'        => $saldo,
			'kode_jenis'        => $kode_jenis2,
			'jenis'        => $jenis,
			'kode'        => $kode
		);

		$hasil = $this->db->insert('cashflow_lain', $data); $this->db->insert('cashflow_lain', $data2);
		
		return $hasil;
	}

	function edit_cashpendlain($data)
	{ 
		$id_lb = $this->input->post('id_lb');
		$kode = $this->input->post('kode');
		$koper_pendlain = $this->input->post('koper_pendlain');
		$naper_pendlain = $this->input->post('naper_pendlain');
		$koper_pendlain2 = $this->input->post('koper_pendlain2');
		$naper_pendlain2 = $this->input->post('naper_pendlain2');
		$keterangan = $this->input->post('keterangan');
		$saldo = $this->input->post('saldo');
		$kode_jenis = 'K';
		$kode_jenis2 = 'D';
		$jenis = $this->input->post('jenis');

		$data = array(
			'id_lb'         => $id_lb,
			'kode_perkiraan'    => $koper_pendlain,
			'nama_perkiraan'    => $naper_pendlain,
			'keterangan'        => $keterangan,
			'saldo'        => $saldo,
			'kode_jenis'        => $kode_jenis,
			'jenis'        => $jenis,
			'kode'        => $kode,
		);

		$data2 = array(
			'id_lb'         => $id_lb,
			'kode_perkiraan'    => $koper_pendlain2,
			'nama_perkiraan'    => $naper_pendlain2,
			'keterangan'        => $keterangan,
			'saldo'        => $saldo,
			'kode_jenis'        => $kode_jenis2,
			'jenis'        => $jenis,
			'kode'        => $kode
		);
		
		$hasil = $this->db->insert('cashflow_lain', $data); $this->db->insert('cashflow_lain', $data2);

		return $hasil;

	}

	function delete_cashpendlain($kode,$id_lb)
	{
		$hasil = $this->db->query("DELETE FROM cashflow_lain WHERE id_lb='$id_lb' AND kode='$kode'");
		return $hasil;
	}
	//END CRUD dengan jquery Ajax
	
    //CRUD dengan jquery Ajax cashflow lain pengeluaran
	function cashpenglain_list($id_lb)
	{
		$hasil = $this->db->query("SELECT * FROM cashflow_lain WHERE id_lb=$id_lb AND jenis='pengeluaran' AND kode_jenis='K'");
		return $hasil->result();
	}
	
	function add_cashpenglain($data)
	{
		$id_cf = $this->input->post('id_cf');
		$id_lb = $this->input->post('id_lb');
        $kode = $this->get_kode_lain($id_lb);
		$kode_perkiraan = $this->input->post('kode_perkiraan_penglain');
		$kode_perkiraan2 = $this->input->post('kode_perkiraan_penglain2');
		$nama_perkiraan = $this->input->post('nama_perkiraan_penglain');
		$nama_perkiraan2 = $this->input->post('nama_perkiraan_penglain2');
		$keterangan = $this->input->post('keterangan_pengeluaranlain');
		$saldo = $this->input->post('saldo_pengeluaranlain');
		$kode_jenis = 'K';
		$kode_jenis2 = 'D';
		$jenis = $this->input->post('jenis_pengeluaranlain');

		$data = array(
			'id_cf'         => $id_cf,
			'id_lb'         => $id_lb,
			'kode_perkiraan'    => $kode_perkiraan,
			'nama_perkiraan'    => $nama_perkiraan,
			'keterangan'        => $keterangan,
			'saldo'        => $saldo,
			'kode_jenis'        => $kode_jenis,
			'jenis'        => $jenis,
			'kode'        => $kode
		);

		$data2 = array(
			'id_cf'         => $id_cf,
			'id_lb'         => $id_lb,
			'kode_perkiraan'    => $kode_perkiraan2,
			'nama_perkiraan'    => $nama_perkiraan2,
			'keterangan'        => $keterangan,
			'saldo'        => $saldo,
			'kode_jenis'        => $kode_jenis2,
			'jenis'        => $jenis,
			'kode'        => $kode
		);

		$hasil = $this->db->insert('cashflow_lain', $data); $this->db->insert('cashflow_lain', $data2);

		return $hasil;
	}

	function edit_cashpenglain($data)
	{ 
		$id_lb = $this->input->post('id_lb');
		$kode = $this->input->post('kode');
		$koper_penglain = $this->input->post('koper_penglain');
		$naper_penglain = $this->input->post('naper_penglain');
		$koper_penglain2 = $this->input->post('koper_penglain2');
		$naper_penglain2 = $this->input->post('naper_penglain2');
		$keterangan = $this->input->post('keterangan');
		$saldo = $this->input->post('saldo');
		$kode_jenis = 'K';
		$kode_jenis2 = 'D';
		$jenis = $this->input->post('jenis');

		$data = array(
			'id_lb'         => $id_lb,
			'kode_perkiraan'    => $koper_penglain,
			'nama_perkiraan'    => $naper_penglain,
			'keterangan'        => $keterangan,
			'saldo'        => $saldo,
			'kode_jenis'        => $kode_jenis,
			'jenis'        => $jenis,
			'kode'        => $kode,
		);

		$data2 = array(
			'id_lb'         => $id_lb,
			'kode_perkiraan'    => $koper_penglain2,
			'nama_perkiraan'    => $naper_penglain2,
			'keterangan'        => $keterangan,
			'saldo'        => $saldo,
			'kode_jenis'        => $kode_jenis2,
			'jenis'        => $jenis,
			'kode'        => $kode
		);
		
		$hasil = $this->db->insert('cashflow_lain', $data); $this->db->insert('cashflow_lain', $data2);

		return $hasil;

	}
	//END CRUD dengan jquery Ajax
	







    public function insert($data)
    {
        $insert = $this->db->insert_batch('cashflow', $data);
        if ($insert) {
            return true;
        }
    }

    function cari($id)
    {
        $query = $this->db->get_where('perkiraan', array('kode_perkiraan' => $id));
        return $query;
    }

    function get_kode2($id_lb)
    {
        $cd = $this->db->query("SELECT MAX(kode) AS kd_max FROM cashflow_a WHERE id_lb='$id_lb' ");
        if ($cd->num_rows() > 0) {
            foreach ($cd->result() as $k) {
                $tmp = ((int)$k->kd_max) + 1;
            }
        } else {
            $tmp = "1";
        }
        return $tmp;
    }

    public function add_data($data)
    {
        $id_cf = $this->input->post('id_cf');
        $id_lb = $this->input->post('id_lb');
        $kode = $this->get_kode2($id_lb);
        $kode_perkiraan = $this->input->post('kode_perkiraan_cp');
        $kode_perkiraan2 = $this->input->post('kode_perkiraan_cp2');
        $nama_perkiraan = $this->input->post('nama_perkiraan_cp');
        $nama_perkiraan2 = $this->input->post('nama_perkiraan_cp2');
        $keterangan = $this->input->post('keterangan');
        $saldo = $this->input->post('saldo');
        $kode_jenis = 'K';
        $kode_jenis2 = 'D';
        $jenis = $this->input->post('jenis');

        $data = array(
            'id_cf'         => $id_cf,
            'id_lb'         => $id_lb,
            'kode_perkiraan'    => $kode_perkiraan,
            'nama_perkiraan'    => $nama_perkiraan,
            'keterangan'        => $keterangan,
            'saldo'        => $saldo,
            'kode_jenis'        => $kode_jenis,
            'jenis'        => $jenis,
            'kode'        => $kode
        );

        $data2 = array(
            'id_cf'         => $id_cf,
            'id_lb'         => $id_lb,
            'kode_perkiraan'    => $kode_perkiraan2,
            'nama_perkiraan'    => $nama_perkiraan2,
            'keterangan'        => $keterangan,
            'saldo'        => $saldo,
            'kode_jenis'        => $kode_jenis2,
            'jenis'        => $jenis,
            'kode'        => $kode
        );

        $this->db->insert('cashflow_a', $data);
        $this->db->insert('cashflow_a', $data2);
    }
    
    public function edit_data($data)
    {
        $id_cf = $this->input->post('id_cfcp');
        $id_lb = $this->input->post('id_lbcp');
        $kode = $this->input->post('kodecp');
        $kode_perkiraan = $this->input->post('kode_perkiraan_cp');
        $kode_perkiraan2 = $this->input->post('kode_perkiraan_cp2');
        $nama_perkiraan = $this->input->post('nama_perkiraan_cp');
        $nama_perkiraan2 = $this->input->post('nama_perkiraan_cp2');
        $keterangan = $this->input->post('keterangancp');
        $saldo = $this->input->post('saldocp');
        $kode_jenis = 'K';
        $kode_jenis2 = 'D';
        $jenis = $this->input->post('jeniscp');

        $data = array(
            'id_cf'         => $id_cf,
            'id_lb'         => $id_lb,
            'kode_perkiraan'    => $kode_perkiraan,
            'nama_perkiraan'    => $nama_perkiraan,
            'keterangan'        => $keterangan,
            'saldo'        => $saldo,
            'kode_jenis'        => $kode_jenis,
            'jenis'        => $jenis,
            'kode'        => $kode
        );

        $data2 = array(
            'id_cf'         => $id_cf,
            'id_lb'         => $id_lb,
            'kode_perkiraan'    => $kode_perkiraan2,
            'nama_perkiraan'    => $nama_perkiraan2,
            'keterangan'        => $keterangan,
            'saldo'        => $saldo,
            'kode_jenis'        => $kode_jenis2,
            'jenis'        => $jenis,
            'kode'        => $kode
        );

        $this->db->insert('cashflow_a', $data);
        $this->db->insert('cashflow_a', $data2);
        redirect('test/edit?id_lb='.$id_lb);
    }
        
    function hapusCashflowsPendapatan($kode, $id_lb)
    {
        $this->db->where(array('id_lb' => $id_lb));
        $this->db->where(array('kode' => $kode));
        $this->db->delete('cashflow_a');
        redirect('test/edit?id_lb=' . $id_lb);
    }

    public function add_data_hutang($data)
    {
        $id_cf = $this->input->post('id_cf');
        $id_lb = $this->input->post('id_lb');
        $kode_perkiraan = $this->input->post('kode_perkiraan');
        $kode_perkiraan2 = $this->input->post('kode_perkiraan2');
        $nama_perkiraan = $this->input->post('nama_perkiraan');
        $nama_perkiraan2 = $this->input->post('nama_perkiraan2');
        $keterangan = $this->input->post('keterangan');
        $saldo = $this->input->post('saldo');
        $kode_jenis = 'K';
        $kode_jenis2 = 'D';
        $jenis = $this->input->post('jenis');

        $data = array(
            'id_cf'         => $id_cf,
            'id_lb'         => $id_lb,
            'kode_perkiraan'    => $kode_perkiraan,
            'nama_perkiraan'    => $nama_perkiraan,
            'keterangan'        => $keterangan,
            'saldo'        => $saldo,
            'kode_jenis'        => $kode_jenis,
            'jenis'        => $jenis,
        );

        $data2 = array(
            'id_cf'         => $id_cf,
            'id_lb'         => $id_lb,
            'kode_perkiraan'    => $kode_perkiraan2,
            'nama_perkiraan'    => $nama_perkiraan2,
            'keterangan'        => $keterangan,
            'saldo'        => $saldo,
            'kode_jenis'        => $kode_jenis2,
            'jenis'        => $jenis,
        );

        $this->db->insert('cashflow_a', $data);
        $this->db->insert('cashflow_a', $data2);
    }

    public function add_data2($data)
    {
        $id_cf = $this->input->post('id_cf');
        $id_lb = $this->input->post('id_lb');
        $kode = $this->get_kode2($id_lb);
        $kode_perkiraan = $this->input->post('kode_perkiraan_cpe');
        $kode_perkiraan2 = $this->input->post('kode_perkiraan_cpe2');
        $nama_perkiraan = $this->input->post('nama_perkiraan_cpe');
        $nama_perkiraan2 = $this->input->post('nama_perkiraan_cpe2');
        $keterangan = $this->input->post('keteranganp');
        $saldo = $this->input->post('saldop');
        $kode_jenis = 'K';
        $kode_jenis2 = 'D';
        $jenis = $this->input->post('jenisp');

        $data = array(
            'id_cf'         => $id_cf,
            'id_lb'         => $id_lb,
            'kode_perkiraan'    => $kode_perkiraan,
            'nama_perkiraan'    => $nama_perkiraan,
            'keterangan'        => $keterangan,
            'saldo'        => $saldo,
            'kode_jenis'        => $kode_jenis,
            'jenis'        => $jenis,
            'kode'        => $kode
        );

        $data2 = array(
            'id_cf'         => $id_cf,
            'id_lb'         => $id_lb,
            'kode_perkiraan'    => $kode_perkiraan2,
            'nama_perkiraan'    => $nama_perkiraan2,
            'keterangan'        => $keterangan,
            'saldo'        => $saldo,
            'kode_jenis'        => $kode_jenis2,
            'jenis'        => $jenis,
            'kode'        => $kode
        );

        $this->db->insert('cashflow_a', $data);
        $this->db->insert('cashflow_a', $data2);
    }
        
    public function edit_datap($data)
    {
        $id_cf = $this->input->post('id_cfcpe');
        $id_lb = $this->input->post('id_lbcpe');
        $kode = $this->input->post('kodecpe');
        $kode_perkiraan = $this->input->post('kode_perkiraan_cpe');
        $kode_perkiraan2 = $this->input->post('kode_perkiraan_cpe2');
        $nama_perkiraan = $this->input->post('nama_perkiraan_cpe');
        $nama_perkiraan2 = $this->input->post('nama_perkiraan_cpe2');
        $keterangan = $this->input->post('keterangancpe');
        $saldo = $this->input->post('saldocpe');
        $kode_jenis = 'K';
        $kode_jenis2 = 'D';
        $jenis = $this->input->post('jeniscpe');

        $data = array(
            'id_cf'         => $id_cf,
            'id_lb'         => $id_lb,
            'kode_perkiraan'    => $kode_perkiraan,
            'nama_perkiraan'    => $nama_perkiraan,
            'keterangan'        => $keterangan,
            'saldo'        => $saldo,
            'kode_jenis'        => $kode_jenis,
            'jenis'        => $jenis,
            'kode'        => $kode
        );

        $data2 = array(
            'id_cf'         => $id_cf,
            'id_lb'         => $id_lb,
            'kode_perkiraan'    => $kode_perkiraan2,
            'nama_perkiraan'    => $nama_perkiraan2,
            'keterangan'        => $keterangan,
            'saldo'        => $saldo,
            'kode_jenis'        => $kode_jenis2,
            'jenis'        => $jenis,
            'kode'        => $kode
        );

        $this->db->insert('cashflow_a', $data);
        $this->db->insert('cashflow_a', $data2);
        redirect('test/edit?id_lb='.$id_lb);
    }
            
    function hapusCashflowsPengeluaran($kode, $id_lb)
    {
        $this->db->where(array('id_lb' => $id_lb));
        $this->db->where(array('kode' => $kode));
        $this->db->delete('cashflow_a');
        redirect('test/edit?id_lb=' . $id_lb);
    }

	
/*
    public function add_data($data)
    {
        $id_lb            = $_POST['id_lb'];
        $no            = $_POST['no'];
        $keterangan        = $_POST['keterangan'];
        $pemasukan     = $_POST['pemasukan'];
        $pengeluaran              = $_POST['pengeluaran'];
        $saldo          = $_POST['saldo'];

        $total = count($keterangan);

        for ($i = 0; $i < $total; $i++) {
            $data[] = array(

                'id_lb'            => $id_lb[$i],
                'no'            => $no[$i],
                'keterangan'        => $keterangan[$i],
                'pemasukan'    => $pemasukan[$i],
                'pengeluaran'            => $pengeluaran[$i],
                'saldo'        => $saldo[$i]
            );
            $this->db->insert('cashflow_b', $data[$i]);
        }
        redirect('cashflow/templateword?id_lb=' . $id_lb[0]);
    }
*/
	
}
