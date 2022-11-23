<?php

class M_collateral extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session'));
    }
    
	//CRUD dengan jquery Ajax colta
	function colta_list($id_lb)
	{
		$hasil = $this->db->query("SELECT * FROM collateral_tanah WHERE id_lb=$id_lb");
		return $hasil->result();
	}

	function get_colta_by_kode($id_col2)
	{
		$hsl = $this->db->query("SELECT * FROM collateral_tanah WHERE id_col2='$id_col2'");
		if ($hsl->num_rows() > 0) {
			foreach ($hsl->result() as $data) {
				$hasil = array(
					'id_col2' => $data->id_col2,
					'id_lb' => $data->id_lb,
					'jenis' => $data->jenis,
					'nama' => $data->nama,
					'alamat' => $data->alamat,
					'no_shm' => $data->no_shm,
					'lokasi' => $data->lokasi,
					'tgl_ukur' => $data->tgl_ukur,
					'no_ukur' => $data->no_ukur,
					'milik' => $data->milik,
					'fisik_jaminan' => $data->fisik_jaminan,
					'luas_t' => $data->luas_t,
					'luas_b' => $data->luas_b,
					'harga_t' => $data->harga_t,
					'harga_b' => $data->harga_b,
					'harga_t2' => $data->harga_t2,
					'harga_b2' => $data->harga_b2,
					'ht' => $data->ht,
					'taksasi' => $data->taksasi,
					'usulan' => $data->usulan
				);
			}
		}
		return $hasil;
	}

	public function update_colta($id_col2, $jenis, $nama, $alamat, $no_shm, $lokasi, $tgl_ukur, $no_ukur, $milik, $fisik_jaminan, $luas_t, $luas_b, $harga_t, $harga_b, $harga_t2, $harga_b2, $ht, $taksasi, $usulan)
	{
		$hasil = $this->db->query("UPDATE collateral_tanah SET jenis='$jenis',nama='$nama',alamat='$alamat',
                                                    no_shm='$no_shm',lokasi='$lokasi',tgl_ukur='$tgl_ukur',
                                                    no_ukur='$no_ukur',milik='$milik',fisik_jaminan='$fisik_jaminan',
                                                    luas_t='$luas_t',luas_b='$luas_b',harga_t='$harga_t',
                                                    harga_b='$harga_b',harga_t2='$harga_t2',harga_b2='$harga_b2', 
                                                    ht='$ht',taksasi='$taksasi',usulan='$usulan'
                                                    WHERE id_col2='$id_col2'");
		return $hasil;
	}

	function delete_colta($id_col2)
	{
		$hasil = $this->db->query("DELETE FROM collateral_tanah WHERE id_col2='$id_col2'");
		return $hasil;
	}
	//END CRUD dengan jquery Ajax
	
	//CRUD dengan jquery Ajax colken
	function colken_list($id_lb)
	{
		$hasil = $this->db->query("SELECT * FROM collateral WHERE id_lb=$id_lb");
		return $hasil->result();
	}

	function get_colken_by_kode($id_col)
	{
		$hsl = $this->db->query("SELECT * FROM collateral WHERE id_col='$id_col'");
		if ($hsl->num_rows() > 0) {
			foreach ($hsl->result() as $data) {
				$hasil = array(
					'id_col' => $data->id_col,
					'id_lb' => $data->id_lb,
					'roda' => $data->roda,
					'nopol' => $data->nopol,
					'nama_stnk' => $data->nama_stnk,
					'alamat' => $data->alamat,
					'type' => $data->type,
					'jenis' => $data->jenis,
					'tahun' => $data->tahun,
					'milik' => $data->milik,
					'warna' => $data->warna,
					'silinder' => $data->silinder,
					'no_rangka' => $data->no_rangka,
					'no_mesin' => $data->no_mesin,
					'no_bpkb' => $data->no_bpkb,
					'taksiran' => $data->taksiran,
					'nl' => $data->nl,
					'usulan' => $data->usulan
				);
			}
		}
		return $hasil;
	}

	public function update_colken($id_col, $roda, $nopol, $nama_stnk, $alamat, $type, $jenis, $tahun, $milik, $warna, $silinder, $no_rangka, $no_mesin, $no_bpkb, $taksiran, $nl, $usulan)
	{
		$hasil = $this->db->query("UPDATE collateral SET roda='$roda',nopol='$nopol',
                                                    nama_stnk='$nama_stnk',alamat='$alamat',`type`='$type',jenis='$jenis',
                                                    tahun='$tahun',milik='$milik',warna='$warna',
                                                    silinder='$silinder',no_rangka='$no_rangka',no_mesin='$no_mesin',
                                                    no_bpkb='$no_bpkb',taksiran='$taksiran',nl='$nl', usulan='$usulan'
                                                    WHERE id_col='$id_col'");
		return $hasil;
	}

	function delete_colken($id_col)
	{
		$hasil = $this->db->query("DELETE FROM collateral WHERE id_col='$id_col'");
		return $hasil;
	}
	//END CRUD dengan jquery Ajax

    public function insert($data)
    {
        $insert = $this->db->insert_batch('collateral', $data);
        if ($insert) {
            return true;
        }
    }

    public function tampil_data($id_lb)
    {
        return $this->db->query("SELECT * FROM collateral WHERE id_lb='$id_lb'");
    }

    public function tampil_data2($id_lb)
    {
        return $this->db->query("SELECT * FROM collateral_tanah WHERE id_lb='$id_lb'");
    }

    function cek_id($id_col)
    {
        $query = array('id_col' => $id_col);
        return $this->db->get_where('collateral', $query);
    }

    function cek_id2($id_col2)
    {
        $query = array('id_col2' => $id_col2);
        return $this->db->get_where('collateral_tanah', $query);
    }

    public function add_data($data)
    {
        $id_lb          = $this->input->post('id_lb');
        $roda          = $this->input->post('roda');
        $nopol     = $this->input->post('nopol');
        $nama_stnk         = $this->input->post('nama_stnk');
        $alamat         = $this->input->post('alamat');
        $type   = $this->input->post('type');
        $jenis   = $this->input->post('jenis');
        $tahun      = $this->input->post('tahun');
        $warna      = $this->input->post('warna');
        $silinder    = $this->input->post('silinder');
        $no_rangka           = $this->input->post('no_rangka');
        $no_mesin       = $this->input->post('no_mesin');
        $no_bpkb           = $this->input->post('no_bpkb');
        $milik       = $this->input->post('milik');
        $taksiran     = $this->input->post('taksiran');
        $nl     = $this->input->post('nl');
        $usulan     = $this->input->post('usulan');

        $data = array(
            'id_lb'         => $id_lb,
            'roda'         => $roda,
            'nopol'    => $nopol,
            'nama_stnk'        => $nama_stnk,
            'alamat'        => $alamat,
            'type'  => $type,
            'jenis'  => $jenis,
            'tahun'     => $tahun,
            'warna'     => $warna,
            'silinder'   => $silinder,
            'no_rangka'          => $no_rangka,
            'no_mesin'      => $no_mesin,
            'no_bpkb'          => $no_bpkb,
            'milik'      => $milik,
            'taksiran'    => $taksiran,
            'nl'    => $nl,
            'usulan'    => $usulan
        );
        $this->db->insert('collateral', $data);
    }

    public function edit_data($data)
    {
        $id_col          = $this->input->post('id_col');
        $id_lb          = $this->input->post('id_lb');
        $roda          = $this->input->post('roda');
        $nopol     = $this->input->post('nopol');
        $nama_stnk         = $this->input->post('nama_stnk');
        $alamat         = $this->input->post('alamat');
        $type   = $this->input->post('type');
        $jenis   = $this->input->post('jenis_collk');
        $tahun      = $this->input->post('tahun');
        $warna      = $this->input->post('warna');
        $silinder    = $this->input->post('silinder');
        $no_rangka           = $this->input->post('no_rangka');
        $no_mesin       = $this->input->post('no_mesin');
        $no_bpkb           = $this->input->post('no_bpkb');
        $milik       = $this->input->post('milik_collk');
        $taksiran     = $this->input->post('taksiran');
        $nl     = $this->input->post('nl');
        $usulan     = $this->input->post('usulan');

        $kondisi = array('id_col' => $id_col);

        $data = array(
            'roda'         => $roda,
            'nopol'    => $nopol,
            'nama_stnk'        => $nama_stnk,
            'alamat'        => $alamat,
            'type'  => $type,
            'jenis'  => $jenis,
            'tahun'     => $tahun,
            'warna'     => $warna,
            'silinder'   => $silinder,
            'no_rangka'          => $no_rangka,
            'no_mesin'      => $no_mesin,
            'no_bpkb'          => $no_bpkb,
            'milik'      => $milik,
            'taksiran'    => $taksiran,
            'nl'    => $nl,
            'usulan'    => $usulan
        );
        $this->db->update('collateral', $data, $kondisi);
        redirect('test/edit?id_lb=' . $id_lb);
    }
                
    function hapus($idt, $id_lb)
    {
        $this->db->where(array('id_lb' => $id_lb));
        $this->db->where(array('id_col' => $idt));
        $this->db->delete('collateral');
        redirect('test/edit?id_lb=' . $id_lb);
    }

    public function add_data2($data)
    {
        $id_lb          = $this->input->post('id_lb');
        $jenis     = $this->input->post('jenis');
        $nama         = $this->input->post('nama');
        $alamat         = $this->input->post('alamat');
        $no_shm   = $this->input->post('no_shm');
        $lokasi      = $this->input->post('lokasi');
        $tgl_ukur      = $this->input->post('tgl_ukur');
        $no_ukur    = $this->input->post('no_ukur');
        $milik       = $this->input->post('milik');
        $fisik_jaminan           = $this->input->post('fisik_jaminan');
        $luas_t           = $this->input->post('luas_t');
        $luas_b           = $this->input->post('luas_b');
        $harga_t           = $this->input->post('harga_t');
        $harga_b           = $this->input->post('harga_b');
        $harga_t2           = $this->input->post('harga_t2');
        $harga_b2           = $this->input->post('harga_b2');
        $ht           = $this->input->post('ht');
        $taksasi           = $this->input->post('taksasi');
        $usulan     = $this->input->post('usulan');

        $data = array(
            'id_lb'         => $id_lb,
            'jenis'    => $jenis,
            'nama'        => $nama,
            'alamat'        => $alamat,
            'no_shm'  => $no_shm,
            'lokasi'     => $lokasi,
            'tgl_ukur'     => $tgl_ukur,
            'no_ukur'   => $no_ukur,
            'milik'      => $milik,
            'fisik_jaminan'          => $fisik_jaminan,
            'luas_t'          => $luas_t,
            'luas_b'          => $luas_b,
            'harga_t'          => $harga_t,
            'harga_b'          => $harga_b,
            'harga_t2'          => $harga_t2,
            'harga_b2'          => $harga_b2,
            'ht'          => $ht,
            'taksasi'    => $taksasi,
            'usulan'    => $usulan
        );
        $this->db->insert('collateral_tanah', $data);
    }

    public function edit_data2($data)
    {
        $id_col2          = $this->input->post('id_col2');
        $id_lb          = $this->input->post('id_lb');
        $jenis     = $this->input->post('jenis_collt');
        $nama         = $this->input->post('nama');
        $alamat         = $this->input->post('alamat_collt');
        $no_shm   = $this->input->post('no_shm');
        $lokasi      = $this->input->post('lokasi');
        $tgl_ukur      = $this->input->post('tgl_ukur');
        $no_ukur    = $this->input->post('no_ukur');
        $milik       = $this->input->post('milik_collt');
        $fisik_jaminan           = $this->input->post('fisik_jaminan');
        $luas_t           = $this->input->post('luas_t');
        $luas_b           = $this->input->post('luas_b');
        $harga_t           = $this->input->post('harga_t');
        $harga_b           = $this->input->post('harga_b');
        $harga_t2           = $this->input->post('harga_t2');
        $harga_b2           = $this->input->post('harga_b2');
        $ht           = $this->input->post('ht');
        $taksasi           = $this->input->post('taksasi');
        $usulan     = $this->input->post('usulan_collt');

        $kondisi = array('id_col2' => $id_col2);

        $data = array(
            'jenis'    => $jenis,
            'nama'        => $nama,
            'alamat'        => $alamat,
            'no_shm'  => $no_shm,
            'lokasi'     => $lokasi,
            'tgl_ukur'     => $tgl_ukur,
            'no_ukur'   => $no_ukur,
            'milik'      => $milik,
            'fisik_jaminan'          => $fisik_jaminan,
            'luas_t'          => $luas_t,
            'luas_b'          => $luas_b,
            'harga_t'          => $harga_t,
            'harga_b'          => $harga_b,
            'harga_t2'          => $harga_t2,
            'harga_b2'          => $harga_b2,
            'ht'          => $ht,
            'taksasi'    => $taksasi,
            'usulan'    => $usulan
        );
        $this->db->update('collateral_tanah', $data, $kondisi);
        redirect('test/edit?id_lb=' . $id_lb);
    }
            
    function hapus2($idt, $id_lb)
    {
        $this->db->where(array('id_lb' => $id_lb));
        $this->db->where(array('id_col2' => $idt));
        $this->db->delete('collateral_tanah');
        redirect('test/edit?id_lb=' . $id_lb);
    }

    /*
    public function add_data($data)
    {
        $id_lb          = $_POST['id_lb'];
        $roda          = $_POST['roda'];
        $nopol     = $_POST['nopol'];
        $nama_stnk         = $_POST['nama_stnk'];
        $alamat         = $_POST['alamat'];
        $type   = $_POST['type'];
        $jenis   = $_POST['jenis'];
        $tahun      = $_POST['tahun'];
        $warna      = $_POST['warna'];
        $silinder    = $_POST['silinder'];
        $no_rangka           = $_POST['no_rangka'];
        $no_mesin       = $_POST['no_mesin'];
        $no_bpkb           = $_POST['no_bpkb'];
        $milik       = $_POST['milik'];
        $taksiran     = $_POST['taksiran'];
        $nl     = $_POST['nl'];
        $kondisi     = $_POST['kondisi'];

        $total = count($nopol);

        for ($i = 0; $i < $total; $i++) {
            $data[] = array(
                'id_lb'         => $id_lb[$i],
                'roda'         => $roda[$i],
                'nopol'    => $nopol[$i],
                'nama_stnk'        => $nama_stnk[$i],
                'alamat'        => $alamat[$i],
                'type'  => $type[$i],
                'jenis'  => $jenis[$i],
                'tahun'     => $tahun[$i],
                'warna'     => $warna[$i],
                'silinder'   => $silinder[$i],
                'no_rangka'          => $no_rangka[$i],
                'no_mesin'      => $no_mesin[$i],
                'no_bpkb'          => $no_bpkb[$i],
                'milik'      => $milik[$i],
                'taksiran'    => $taksiran[$i],
                'nl'    => $nl[$i],
                'kondisi'    => $kondisi[$i]
            );
            $this->db->insert('collateral', $data[$i]);
        }
        redirect('collateral/templateword?id_lb=' . $id_lb[0]);
    }
    */

    /*
    public function add_data2($data)
    {
        $id_lb          = $_POST['id_lb'];
        $jenis     = $_POST['jenis'];
        $nama         = $_POST['nama'];
        $alamat         = $_POST['alamat'];
        $no_shm   = $_POST['no_shm'];
        $lokasi      = $_POST['lokasi'];
        $tgl_ukur      = $_POST['tgl_ukur'];
        $no_ukur    = $_POST['no_ukur'];
        $milik       = $_POST['milik'];
        $fisik_jaminan           = $_POST['fisik_jaminan'];
        $luas_t           = $_POST['luas_t'];
        $luas_b           = $_POST['luas_b'];
        $harga_t           = $_POST['harga_t'];
        $harga_b           = $_POST['harga_b'];
        $harga_t2           = $_POST['harga_t2'];
        $harga_b2           = $_POST['harga_b2'];
        $ht           = $_POST['ht'];
        $taksasi           = $_POST['taksasi'];
        $pertimbangan     = $_POST['pertimbangan'];

        $total = count($jenis);

        for ($i = 0; $i < $total; $i++) {
            $data[] = array(
                'id_lb'         => $id_lb[$i],
                'jenis'    => $jenis[$i],
                'nama'        => $nama[$i],
                'alamat'        => $alamat[$i],
                'no_shm'  => $no_shm[$i],
                'lokasi'     => $lokasi[$i],
                'tgl_ukur'     => $tgl_ukur[$i],
                'no_ukur'   => $no_ukur[$i],
                'milik'      => $milik[$i],
                'fisik_jaminan'          => $fisik_jaminan[$i],
                'luas_t'          => $luas_t[$i],
                'luas_b'          => $luas_b[$i],
                'harga_t'          => $harga_t[$i],
                'harga_b'          => $harga_b[$i],
                'harga_t2'          => $harga_t2[$i],
                'harga_b2'          => $harga_b2[$i],
                'ht'          => $ht[$i],
                'taksasi'    => $taksasi[$i],
                'pertimbangan'    => $pertimbangan[$i]
            );
            $this->db->insert('collateral_tanah', $data[$i]);
        }
        /*redirect('collateral?id_lb=' . $id_lb);
        redirect('collateral/templateword2?id_lb=' . $id_lb[0]);
    }
    */

    public function add_data_real($data)
    {
        $id_lb          = $this->input->post('id_lb');
        $roda          = $this->input->post('roda');
        $nopol     = $this->input->post('nopol');
        $nama_stnk         = $this->input->post('nama_stnk');
        $alamat         = $this->input->post('alamat');
        $type   = $this->input->post('type');
        $jenis   = $this->input->post('jenis');
        $tahun      = $this->input->post('tahun');
        $warna      = $this->input->post('warna');
        $silinder    = $this->input->post('silinder');
        $no_rangka           = $this->input->post('no_rangka');
        $no_mesin       = $this->input->post('no_mesin');
        $no_bpkb           = $this->input->post('no_bpkb');
        $milik       = $this->input->post('milik');
        $taksiran     = $this->input->post('taksiran');
        $nl     = $this->input->post('nl');
        $kondisi     = $this->input->post('kondisi');

        $data = array(
            'id_lb'         => $id_lb,
            'roda'         => $roda,
            'nopol'    => $nopol,
            'nama_stnk'        => $nama_stnk,
            'alamat'        => $alamat,
            'type'  => $type,
            'jenis'  => $jenis,
            'tahun'     => $tahun,
            'warna'     => $warna,
            'silinder'   => $silinder,
            'no_rangka'          => $no_rangka,
            'no_mesin'      => $no_mesin,
            'no_bpkb'          => $no_bpkb,
            'milik'      => $milik,
            'taksiran'    => $taksiran,
            'nl'    => $nl,
            'kondisi'    => $kondisi
        );
        $this->db->insert('collateral', $data);
        redirect('collateral/templateword?id_lb=' . $id_lb);
    }
}
