<?php

class M_main extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->helper(array('url'));
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

    public function data_analis($kantor)
    {
        // return $this->db->query("SELECT * FROM user WHERE role_id='3' AND kantor='$kantor' ");
        return $this->db->query("SELECT * FROM user WHERE role_id='3' ");
    }
    
    public function data_pengajuan($id_lb)
    {
        return $this->db->query("SELECT * FROM latar_belakang WHERE id_lb=$id_lb");
    }

    public function data_perkiraan()
    {
        return $this->db->query("SELECT * FROM perkiraan WHERE MID(kode_perkiraan,1,1) = '5' && LENGTH(kode_perkiraan) > 3");
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
}
