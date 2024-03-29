<?php

class M_capital extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session'));
    }

    public function insert($data)
    {
        $insert = $this->db->insert_batch('capital', $data);
        if ($insert) {
            return true;
        }
    }
    
    //CRUD dengan jquery Ajax
    function capi_list($id_lb)
    {
        $hasil = $this->db->query("SELECT * FROM capital_b WHERE id_lb=$id_lb");
        return $hasil->result();
    }

    function get_capi_by_kode($id_capi)
    {
        $hsl = $this->db->query("SELECT * FROM capital_b WHERE id_capi='$id_capi'");
        if ($hsl->num_rows() > 0) {
            foreach ($hsl->result() as $data) {
                $hasil = array(
                    'id_capi' => $data->id_capi,
                    'id_lb' => $data->id_lb,
                    'kas' => $data->kas,
                    'tabungan' => $data->tabungan,
                    'deposito' => $data->deposito,
                    'piutang' => $data->piutang,
                    'peralatan' => $data->peralatan,
                    'barang' => $data->barang,
                    'barang2' => $data->barang2,
                    'barang3' => $data->barang3,
                    'sewa' => $data->sewa,
                    'lahan' => $data->lahan,
                    'gedung' => $data->gedung,
                    'operasional' => $data->operasional,
                    'lain' => $data->lain,
                    'tanah' => $data->tanah,
                    'bangunan' => $data->bangunan,
                    'kendaraan' => $data->kendaraan,
                    'inventaris' => $data->inventaris,
                    'lain2' => $data->lain2,
                    'hutang_jpk' => $data->hutang_jpk,
                    'hutang_jpg' => $data->hutang_jpg,
                    'hutang_lain' => $data->hutang_lain,
                    'hutang_dagang' => $data->hutang_dagang,
                );
            }
        }
        return $hasil;
    }

    public function update_capi($id_capi, $kas, $tabungan, $deposito,$piutang, $peralatan, $barang, $barang2, $barang3, $sewa, $lahan, $gedung, $operasional,$lain, $tanah, $bangunan, $kendaraan, $inventaris, $lain2, $hutang_jpk, $hutang_jpg, $hutang_lain,$hutang_dagang, $total_al, $total_hutang,$total_aset)
    {
        $hasil = $this->db->query("UPDATE capital_b SET kas='$kas',tabungan='$tabungan',deposito='$deposito',piutang='$piutang',peralatan='$peralatan',barang='$barang',
                                                    barang2='$barang2',barang3='$barang3',sewa='$sewa',lahan='$lahan',gedung='$gedung',operasional='$operasional',
                                                    lain='$lain',tanah='$tanah',bangunan='$bangunan',kendaraan='$kendaraan',inventaris='$inventaris',lain2='$lain2',
                                                    hutang_jpk='$hutang_jpk',hutang_jpg='$hutang_jpg',hutang_lain='$hutang_lain',hutang_dagang='$hutang_dagang',total_al='$total_al',total_hutang='$total_hutang',total_aset='$total_aset'
                                                    WHERE id_capi='$id_capi'");
        return $hasil;
    }

    function delete_capi($id_capi)
    {
        $hasil = $this->db->query("DELETE FROM capital_b WHERE id_capi='$id_capi'");
        return $hasil;
    }
    //END CRUD dengan jquery Ajax

    public function tampil_data()
    {
        return $this->db->query("SELECT * FROM capital_b ORDER BY id_capi DESC LIMIT 1");
    }

    public function tampil_data2()
    {
        return $this->db->query("SELECT * FROM capital_a ORDER BY id_capi DESC LIMIT 1");
    }

    function cek_id($id_capi)
	{
		$query = array('id_capi' => $id_capi);
		return $this->db->get_where('capital_b', $query);
	}

    public function add_data($data)
    {
        $id_lb          = $this->input->post('id_lb');
        $kas     = $this->input->post('kas');
        $tabungan         = $this->input->post('tabungan');
        $deposito         = $this->input->post('deposito');
        $piutang   = $this->input->post('piutang');
        $peralatan   = $this->input->post('peralatan');
        $barang      = $this->input->post('barang');
        $barang2      = $this->input->post('barang2');
        $barang3      = $this->input->post('barang3');
        $sewa      = $this->input->post('sewa');
        $lahan    = $this->input->post('lahan');
        $gedung           = $this->input->post('gedung');
        $operasional       = $this->input->post('operasional');
        $lain           = $this->input->post('lain');
        $total_al       = $kas + $tabungan + $deposito + $piutang + $peralatan +
            $barang + $barang2 + $barang3 + $sewa + $lahan + $gedung + $operasional + $lain;
        $tanah     = $this->input->post('tanah');
        $bangunan     = $this->input->post('bangunan');
        $kendaraan     = $this->input->post('kendaraan');
        $inventaris     = $this->input->post('inventaris');
        $lain2     = $this->input->post('lain2');
        $total_at     = $tanah + $bangunan + $kendaraan
            + $inventaris + $lain2;
        $hutang_jpk     = $this->input->post('hutang_jpk');
        $hutang_jpg = $this->input->post('hutang_jpg');
        $hutang_lain     = $this->input->post('hutang_lain');
        $hutang_dagang     = $this->input->post('hutang_dagang');
        $total_hutang     = $hutang_jpk + $hutang_jpg + $hutang_lain + $hutang_dagang;
        $total_aset     = $total_al + $total_at;

        $data = array(
            'id_lb'         => $id_lb,
            'kas'    => $kas,
            'tabungan'        => $tabungan,
            'deposito'        => $deposito,
            'piutang'  => $piutang,
            'peralatan'  => $peralatan,
            'barang'     => $barang,
            'barang2'     => $barang2,
            'barang3'     => $barang3,
            'sewa'     => $sewa,
            'lahan'   => $lahan,
            'gedung'          => $gedung,
            'operasional'      => $operasional,
            'lain'          => $lain,
            'total_al'      => $total_al,
            'tanah'    => $tanah,
            'bangunan'    => $bangunan,
            'kendaraan'    => $kendaraan,
            'inventaris'    => $inventaris,
            'lain2'    => $lain2,
            'total_at'    => $total_at,
            'hutang_jpk'    => $hutang_jpk,
            'hutang_jpg'    => $hutang_jpg,
            'hutang_lain'    => $hutang_lain,
            'hutang_dagang'    => $hutang_dagang,
            'total_hutang'    => $total_hutang,
            'total_aset'    => $total_aset
        );
        $this->db->insert('capital_b', $data);
        /*redirect('capital?id_lb=' . $id_lb);
        redirect('capital/templateword?id_lb=' . $id_lb);*/
    }

    public function edit_data($data)
    {
        $id_capi          = $this->input->post('id_capi');
        $id_lb          = $this->input->post('id_lb');
        $kas     = $this->input->post('kas');
        $tabungan         = $this->input->post('tabungan');
        $deposito         = $this->input->post('deposito');
        $piutang   = $this->input->post('piutang');
        $peralatan   = $this->input->post('peralatan');
        $barang      = $this->input->post('barang');
        $barang2      = $this->input->post('barang2');
        $barang3      = $this->input->post('barang3');
        $sewa      = $this->input->post('sewa');
        $lahan    = $this->input->post('lahan');
        $gedung           = $this->input->post('gedung');
        $operasional       = $this->input->post('operasional');
        $lain           = $this->input->post('lain');
        $total_al       = $kas + $tabungan + $deposito + $piutang + $peralatan +
            $barang + $barang2 + $barang3 + $sewa + $lahan + $gedung + $operasional + $lain;
        $tanah     = $this->input->post('tanah');
        $bangunan     = $this->input->post('bangunan');
        $kendaraan     = $this->input->post('kendaraan');
        $inventaris     = $this->input->post('inventaris');
        $lain2     = $this->input->post('lain2');
        $total_at     = $tanah + $bangunan + $kendaraan
            + $inventaris + $lain2;
        $hutang_jpk     = $this->input->post('hutang_jpk');
        $hutang_jpg = $this->input->post('hutang_jpg');
        $hutang_lain     = $this->input->post('hutang_lain');
        $hutang_dagang     = $this->input->post('hutang_dagang');
        $total_hutang     = $hutang_jpk + $hutang_jpg + $hutang_lain + $hutang_dagang;
        $total_aset     = $total_al + $total_at;
        
		$kondisi = array('id_capi' => $id_capi );

        $data = array(
            'id_lb'         => $id_lb,
            'kas'    => $kas,
            'tabungan'        => $tabungan,
            'deposito'        => $deposito,
            'piutang'  => $piutang,
            'peralatan'  => $peralatan,
            'barang'     => $barang,
            'barang2'     => $barang2,
            'barang3'     => $barang3,
            'sewa'     => $sewa,
            'lahan'   => $lahan,
            'gedung'          => $gedung,
            'operasional'      => $operasional,
            'lain'          => $lain,
            'total_al'          => $total_al,
            'tanah'    => $tanah,
            'bangunan'    => $bangunan,
            'kendaraan'    => $kendaraan,
            'inventaris'    => $inventaris,
            'lain2'    => $lain2,
            'total_at'    => $total_at,
            'hutang_jpk'    => $hutang_jpk,
            'hutang_jpg'    => $hutang_jpg,
            'hutang_lain'    => $hutang_lain,
            'hutang_dagang'    => $hutang_dagang,
            'total_hutang'    => $total_hutang,
            'total_aset'    => $total_aset,
        );
        $this->db->update('capital_b', $data,$kondisi);
        redirect('test/edit?id_lb='.$id_lb);
    }

    public function add_data2($data)
    {
        $id_lb          = $this->input->post('id_lb');
        $kas     = $this->input->post('kas');
        $tabungan         = $this->input->post('tabungan');
        $deposito         = $this->input->post('deposito');
        $piutang   = $this->input->post('piutang');
        $peralatan   = $this->input->post('peralatan');
        $barang      = $this->input->post('barang');
        $barang2      = $this->input->post('barang2');
        $barang3      = $this->input->post('barang3');
        $sewa      = $this->input->post('sewa');
        $lahan    = $this->input->post('lahan');
        $gedung           = $this->input->post('gedung');
        $operasional       = $this->input->post('operasional');
        $lain           = $this->input->post('lain');
        $total_al       = $kas + $tabungan + $deposito + $piutang + $peralatan +
            $barang + $barang2 + $barang3 + $sewa + $lahan + $gedung + $operasional + $lain;
        $tanah     = $this->input->post('tanah');
        $bangunan     = $this->input->post('bangunan');
        $kendaraan     = $this->input->post('kendaraan');
        $inventaris     = $this->input->post('inventaris');
        $lain2     = $this->input->post('lain2');
        $total_at     = $tanah + $bangunan + $kendaraan
            + $inventaris + $lain2;
        $hutang_jpk     = $this->input->post('hutang_jpk');
        $hutang_jpg = $this->input->post('hutang_jpg');
        $hutang_lain     = $this->input->post('hutang_lain');
        $hutang_dagang     = $this->input->post('hutang_dagang');
        $total_hutang     = $hutang_jpk + $hutang_jpg + $hutang_lain + $hutang_dagang;
        $laba_rugi     = $this->input->post('laba_rugi');
        $modal     = $this->input->post('modal');
        $harta     = $this->input->post('harta');
        $total_kjb     = $total_hutang + $laba_rugi + $modal + $harta;
        $total_aset     = $total_al + $total_at;

        $data = array(
            'id_lb'         => $id_lb,
            'kas'    => $kas,
            'tabungan'        => $tabungan,
            'deposito'        => $deposito,
            'piutang'  => $piutang,
            'peralatan'  => $peralatan,
            'barang'     => $barang,
            'barang2'     => $barang2,
            'barang3'     => $barang3,
            'sewa'     => $sewa,
            'lahan'   => $lahan,
            'gedung'          => $gedung,
            'operasional'      => $operasional,
            'lain'          => $lain,
            'total_al'      => $total_al,
            'tanah'    => $tanah,
            'bangunan'    => $bangunan,
            'kendaraan'    => $kendaraan,
            'inventaris'    => $inventaris,
            'lain2'    => $lain2,
            'total_at'    => $total_at,
            'hutang_jpk'    => $hutang_jpk,
            'hutang_jpg'    => $hutang_jpg,
            'hutang_lain'    => $hutang_lain,
            'hutang_dagang'    => $hutang_dagang,
            'total_hutang'    => $total_hutang,
            'laba_rugi'    => $laba_rugi,
            'modal'    => $modal,
            'harta'    => $harta,
            'total_kjb'    => $total_kjb,
            'total_aset'    => $total_aset
        );
        $this->db->insert('capital_a', $data);
        /*redirect('capital/index2?id_lb=' . $id_lb);*/
        redirect('capital/templateword2?id_lb=' . $id_lb);
    }

    function cek_nolb($id_lb) {
		$query = array('id_lb' => $id_lb);
		return $this->db->get_where('capital_a', $query);
	}	

    function cek_idlb($id_lb) {
		$query = array('id_lb' => $id_lb);
		return $this->db->get_where('capital_cache', $query);
	}	
}
