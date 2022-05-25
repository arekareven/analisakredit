<?php

class M_cashflow extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session'));
    }

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

    public function add_data($data)
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
