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

    public function add_data2($data)
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
            $this->db->insert('cashflow_a', $data[$i]);
        }
        redirect('cashflow/templateword2?id_lb=' . $id_lb[0]);
    }
}
