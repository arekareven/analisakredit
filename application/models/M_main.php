<?php

class M_main extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->helper(array('url'));
    }
        
	function rw_list($id_lb){
		$hasil=$this->db->query("SELECT * FROM riwayat_pinjaman WHERE id_lb=$id_lb");
		return $hasil->result();
	}
        
	function get_rp_by_kode($id_rp){
		$hsl=$this->db->query("SELECT * FROM riwayat_pinjaman WHERE id_rp='$id_rp'");
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'id_rp' => $data->id_rp,
					'id_lb' => $data->id_lb,
					'plafond' => $data->plafond,
					'status' => $data->status,
					'saldo' => $data->saldo,
					'sejarah' => $data->sejarah,
					'data' => $data->data,
					);
			}
		}
		return $hasil;
	}

    public function data_select()
    {
        return $this->db->get('notaris');
    }

    public function data_analis()
    {
        return $this->db->get('analis');
    }
    
    public function data_pengajuan($id_lb)
    {
        return $this->db->query("SELECT * FROM latar_belakang WHERE id_lb=$id_lb");
    }

    public function data_perkiraan()
    {
        return $this->db->query("SELECT * FROM perkiraan WHERE MID(kode_perkiraan,1,1) = '5' && LENGTH(kode_perkiraan) > 3");
    }

    public function edit_lb($id_lb)
    {
        return $this->db->query("SELECT * FROM latar_belakang WHERE id_lb=$id_lb");
    }

    public function edit_rw($id_lb)
    {
        return $this->db->query("SELECT * FROM riwayat_pinjaman WHERE id_lb=$id_lb");
    }

    public function edit_char($id_lb)
    {
        return $this->db->query("SELECT * FROM karakter WHERE id_lb=$id_lb");
    }

    public function edit_capa($id_lb)
    {
        return $this->db->query("SELECT * FROM capacity WHERE id_lb=$id_lb");
    }

    public function edit_capi($id_lb)
    {
        return $this->db->query("SELECT * FROM capital_b WHERE id_lb=$id_lb");
    }

    public function edit_cash($id_lb)
    {
        return $this->db->query("SELECT * FROM cashflow_b WHERE id_lb=$id_lb AND jenis='pendapatan' AND kode_jenis='K'");
    }

    public function edit_cashp($id_lb)
    {
        return $this->db->query("SELECT * FROM cashflow_b WHERE id_lb=$id_lb AND jenis='pengeluaran' AND kode_jenis='D'");
    }

    public function edit_cashs($id_lb)
    {
        return $this->db->query("SELECT * FROM cashflow_a WHERE id_lb=$id_lb AND jenis='pendapatan' AND kode_jenis='K'");
    }

    public function edit_cashsp($id_lb)
    {
        return $this->db->query("SELECT * FROM cashflow_a WHERE id_lb=$id_lb AND jenis='pengeluaran' AND kode_jenis='D'");
    }

    public function edit_hut($id_lb)
    {
        return $this->db->query("SELECT * FROM cashflow_a WHERE id_lb=$id_lb AND jenis='hutang' AND kode_jenis='D'");
    }

    public function edit_collt($id_lb)
    {
        return $this->db->query("SELECT * FROM collateral_tanah WHERE id_lb=$id_lb");
    }

    public function edit_collk($id_lb)
    {
        return $this->db->query("SELECT * FROM collateral WHERE id_lb=$id_lb");
    }

    public function edit_cond($id_lb)
    {
        return $this->db->query("SELECT * FROM `condition` WHERE id_lb=$id_lb");
    }
    
    public function edit_real($id_lb)
    {
        return $this->db->query("SELECT * FROM realisasi WHERE id_lb='$id_lb'");
    }

    public function edit_usulan($id_lb)
    {
        return $this->db->query("SELECT * FROM usulan WHERE id_lb='$id_lb'");
    }

    function cari($id)
    {
        $query = $this->db->get_where('perkiraan', array('kode_perkiraan' => $id));
        return $query;
    }

    function get_kode($id_lb)
    {
        $cd = $this->db->query("SELECT MAX(kode) AS kd_max FROM cashflow_b WHERE id_lb='$id_lb' ");
        if ($cd->num_rows() > 0) {
            foreach ($cd->result() as $k) {
                $tmp = ((int)$k->kd_max) + 1;
            }
        } else {
            $tmp = "1";
        }
        return $tmp;
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
        $kode =  $this->get_kode($id_lb);
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

        $this->db->insert('cashflow_b', $data);
        $this->db->insert('cashflow_b', $data2);
    }

    public function edit_data($data)
    {
        $id_cf = $this->input->post('id_cf');
        $id_lb = $this->input->post('id_lb');
        $kode = $this->input->post('kode');
        $kode_perkiraan = $this->input->post('kode_perkiraan');
        $nama_perkiraan = $this->input->post('nama_perkiraan');
        $kode_perkiraan2 = $this->input->post('kode_perkiraan2');
        $nama_perkiraan2 = $this->input->post('nama_perkiraan2');
        $keterangan = $this->input->post('keterangan');
        $saldo = $this->input->post('saldoq');
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
            'kode'        => $kode,
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
            'kode'        => $kode,
        );

        $this->db->insert('cashflow_b', $data);
        $this->db->insert('cashflow_b', $data2);
        redirect('test/edit?id_lb=' . $id_lb);
    }

    function hapusCashflowPendapatan($kode, $id_lb)
    {
        $this->db->where(array('id_lb' => $id_lb));
        $this->db->where(array('kode' => $kode));
        $this->db->delete('cashflow_b');
        redirect('test/edit?id_lb=' . $id_lb);
    }

    public function add_data2($data)
    {
        $id_cf = $this->input->post('id_cf');
        $id_lb = $this->input->post('id_lb');
        $kode_perkiraan = $this->input->post('kode_perkiraanp');
        $kode_perkiraan2 = $this->input->post('kode_perkiraanp2');
        $nama_perkiraan = $this->input->post('nama_perkiraanp');
        $nama_perkiraan2 = $this->input->post('nama_perkiraanp2');
        $keterangan = $this->input->post('keteranganp');
        $saldo = $this->input->post('saldop');
        $kode_jenis = 'K';
        $kode_jenis2 = 'D';
        $jenis = $this->input->post('jenisp');
        $kode =  $this->get_kode($id_lb);

        $data = array(
            'id_cf'         => $id_cf,
            'id_lb'         => $id_lb,
            'kode_perkiraan'    => $kode_perkiraan,
            'nama_perkiraan'    => $nama_perkiraan,
            'keterangan'        => $keterangan,
            'saldo'        => $saldo,
            'kode_jenis'        => $kode_jenis,
            'jenis'        => $jenis,
            'kode'        => $kode,
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
            'kode'        => $kode,
        );

        $this->db->insert('cashflow_b', $data);
        $this->db->insert('cashflow_b', $data2);
    }

    public function edit_datap($data)
    {
        $id_cf = $this->input->post('id_cfp');
        $kode = $this->input->post('kodep');
        $id_lb = $this->input->post('id_lbp');
        $kode_perkiraan = $this->input->post('kode_perkiraanp');
        $nama_perkiraan = $this->input->post('nama_perkiraanp');
        $kode_perkiraan2 = $this->input->post('kode_perkiraanp2');
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
            'kode'        => $kode,
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
            'kode'        => $kode,
        );

        $this->db->insert('cashflow_b', $data);
        $this->db->insert('cashflow_b', $data2);
        redirect('test/edit?id_lb=' . $id_lb);
    }
    
    function hapusCashflowPengeluaran($kode, $id_lb)
    {
        $this->db->where(array('id_lb' => $id_lb));
        $this->db->where(array('kode' => $kode));
        $this->db->delete('cashflow_b');
        redirect('test/edit?id_lb=' . $id_lb);
    }

    public function add_data_hutang($data)
    {
        $id_cf = $this->input->post('id_cf');
        $id_lb = $this->input->post('id_lb');
        $kode = $this->get_kode2($id_lb);
        $kode_perkiraan = $this->input->post('kode_perkiraan_hutang');
        $kode_perkiraan2 = $this->input->post('kode_perkiraan_hutang2');
        $nama_perkiraan = $this->input->post('nama_perkiraan_hutang');
        $nama_perkiraan2 = $this->input->post('nama_perkiraan_hutang2');
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

    public function edit_datah($data)
    {
        $id_cf = $this->input->post('id_cfh');
        $kode = $this->input->post('kodeh');
        $id_lb = $this->input->post('id_lbh');
        $kode_perkiraan = $this->input->post('kode_perkiraan_hutang');
        $nama_perkiraan = $this->input->post('nama_perkiraan_hutang');
        $kode_perkiraan2 = $this->input->post('kode_perkiraan_hutang2');
        $nama_perkiraan2 = $this->input->post('nama_perkiraan_hutang2');
        $keterangan = $this->input->post('keteranganh');
        $saldo = $this->input->post('saldoh');
        $kode_jenis = 'K';
        $kode_jenis2 = 'D';
        $jenis = $this->input->post('jenish');


        $data = array(
            'id_cf'         => $id_cf,
            'id_lb'         => $id_lb,
            'kode_perkiraan'    => $kode_perkiraan,
            'nama_perkiraan'    => $nama_perkiraan,
            'keterangan'        => $keterangan,
            'saldo'        => $saldo,
            'kode_jenis'        => $kode_jenis,
            'jenis'        => $jenis,
            'kode'        => $kode,
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
            'kode'        => $kode,
        );

        $this->db->insert('cashflow_a', $data);
        $this->db->insert('cashflow_a', $data2);
        redirect('test/edit?id_lb=' . $id_lb);
    }
        
    function hapusHutang($kode, $id_lb)
    {
        $this->db->where(array('id_lb' => $id_lb));
        $this->db->where(array('kode' => $kode));
        $this->db->delete('cashflow_a');
        redirect('test/edit?id_lb=' . $id_lb);
    }

    public function add_data_usulan($data)
    {
        $id_lb          = $this->input->post('id_lb');
        $character     = $this->input->post('character');
        $capacity         = $this->input->post('capacity');
        $capital         = $this->input->post('capital');
        $coe         = $this->input->post('coe');
        $collateral   = $this->input->post('collateral');
        $realisasi     = $this->input->post('realisasi');
        $notaris     = $this->input->post('notaris');

        $data = array(
            'id_lb'         => $id_lb,
            'character'    => $character,
            'capacity'        => $capacity,
            'capital'        => $capital,
            'coe'        => $coe,
            'collateral'  => $collateral,
            'realisasi'    => $realisasi,
            'notaris'    => $notaris
        );
        $this->db->insert('usulan', $data);
    }
 
    /*
    function search_notaris($notaris){
        $this->db->like('notaris', $notaris , 'both');
        $this->db->order_by('notaris', 'ASC');
        $this->db->limit(10);
        return $this->db->get('notaris')->result();
    }
    */
}
