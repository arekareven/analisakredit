<?php

class M_usulan extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session'));
    }
    
	//CRUD dengan jquery Ajax
	function usul_list($id_lb)
	{
		$hasil = $this->db->query("SELECT * FROM usulan WHERE id_lb=$id_lb");
		return $hasil->result();
	}
	
    public function add_data($data)
    {
        $id_lb          = $this->input->post('id_lb');
        $character     = $this->input->post('character');
        $capacity         = $this->input->post('capacity');
        $capital         = $this->input->post('capital');
        $coe         = $this->input->post('coe');
        $collateral   = $this->input->post('collateral');
        // $realisasi     = $this->input->post('realisasi');
        $notaris     = $this->input->post('notaris');
        $plafond_usulan   = $this->input->post('plafond_usulan');
        $waktu       = $this->input->post('waktu');
        $bunga           = $this->input->post('bunga');
        $provisi     = $this->input->post('provisi');
        $administrasi     = $this->input->post('administrasi');
        $asuransi     = $this->input->post('asuransi');
        $materai     = $this->input->post('materai');
        $apht     = $this->input->post('apht');
        $skmht     = $this->input->post('skmht');
        $titipan     = $this->input->post('titipan');
        $fiduciare     = $this->input->post('fiduciare');
        $legalisasi     = $this->input->post('legalisasi');
        $roya     = $this->input->post('roya');
        $lainnya     = $this->input->post('lainnya');
        /*
        $sifat      = $this->input->post('sifat');
        $jenis      = $this->input->post('jenis');
        $tujuan    = $this->input->post('tujuan');
        $sektor           = $this->input->post('sektor');
        $angsuran       = $this->input->post('angsuran');
        $denda     = $this->input->post('denda');
        $tanggungan     = $this->input->post('tanggungan');
        $likuidasi     = $this->input->post('likuidasi');
        $lainnya     = $this->input->post('lainnya');
        $jaminan     = $this->input->post('jaminan');
        $proses     = $this->input->post('proses');
        $sertifikat     = $this->input->post('sertifikat');
        $akta     = $this->input->post('akta');
        $pendaftaran     = $this->input->post('pendaftaran');
        $plotting     = $this->input->post('plotting');
        */

        $data = array(
            'id_lb'         => $id_lb,
            'character'    => $character,
            'capacity'        => $capacity,
            'capital'        => $capital,
            'coe'        => $coe,
            'collateral'  => $collateral,
            // 'realisasi'    => $realisasi,
            'notaris'    => $notaris,
            'plafond_usulan'  => $plafond_usulan,
            'waktu'      => $waktu,
            'bunga'          => $bunga,
            'provisi'    => $provisi,
            'administrasi'    => $administrasi,
            'asuransi'    => $asuransi,
            'materai'    => $materai,
            'apht'    => $apht,
            'skmht'    => $skmht,
            'titipan'    => $titipan,
            'fiduciare'    => $fiduciare,
            'legalisasi'    => $legalisasi,
            'roya'    => $roya,
            'lainnya'    => $lainnya,
            /*
            'sifat'     => $sifat,
            'jenis'     => $jenis,
            'tujuan'   => $tujuan,
            'sektor'          => $sektor,
            'angsuran'      => $angsuran,
            'denda'    => $denda,
            'tanggungan'    => $tanggungan,
            'likuidasi'    => $likuidasi,
            'lainnya'    => $lainnya,
            'jaminan'    => $jaminan,
            'proses'    => $proses,
            'sertifikat'    => $sertifikat,
            'akta'    => $akta,
            'pendaftaran'    => $pendaftaran,
            'plotting'    => $plotting
            */
        );
        //redirect('test?id_lb='.$id_lb);
        $hasil = $this->db->insert('usulan', $data);
		return $hasil;
    }

	function get_usul_by_kode($id_usulan)
	{
		$hsl = $this->db->query("SELECT * FROM usulan WHERE id_usulan='$id_usulan'");
		if ($hsl->num_rows() > 0) {
			foreach ($hsl->result() as $data) {
				$hasil = array(
					'id_usulan' => $data->id_usulan,
					'id_lb' => $data->id_lb,
					'character' => $data->character,
					'capacity' => $data->capacity,
					'capital' => $data->capital,
					'coe' => $data->coe,
					'collateral' => $data->collateral,
					'notaris' => $data->notaris,
					'plafond_usulan' => $data->plafond_usulan,
					'waktu' => $data->waktu,
					'bunga' => $data->bunga,
					'provisi' => $data->provisi,
					'administrasi' => $data->administrasi,
					'asuransi' => $data->asuransi,
					'materai' => $data->materai,
					'apht' => $data->apht,
					'skmht' => $data->skmht,
					'titipan' => $data->titipan,
					'fiduciare' => $data->fiduciare,
					'legalisasi' => $data->legalisasi,
					'roya' => $data->roya,
					'lainnya' => $data->lainnya
				);
			}
		}
		return $hasil;
	}

	public function update_usul($id_usulan, $character, $capacity, $capital,
	 							$coe, $collateral, $notaris, $plafond_usulan, 
								$waktu, $bunga, $provisi, $administrasi, $asuransi, 
								$materai, $apht, $skmht, $titipan, $fiduciare, 
								$legalisasi, $roya, $lainnya)
	{
		$hasil = $this->db->query("UPDATE usulan SET `character`='$character',
													capacity='$capacity',
													capital='$capital',
													coe='$coe',
													collateral='$collateral',
													notaris='$notaris',
													plafond_usulan='$plafond_usulan',
													waktu='$waktu',
													bunga='$bunga',
													provisi='$provisi',
													administrasi='$administrasi',
													asuransi='$asuransi',
													materai='$materai',
													apht='$apht',
													skmht='$skmht',
													titipan='$titipan',
													fiduciare='$fiduciare',
													legalisasi='$legalisasi',
													roya='$roya',
													lainnya='$lainnya'
													WHERE id_usulan='$id_usulan'");
		return $hasil;
	}

	function delete_usul($id_usulan)
	{
		$hasil = $this->db->query("DELETE FROM usulan WHERE id_usulan='$id_usulan'");
		return $hasil;
	}
	//END CRUD dengan jquery Ajax
    
	//CRUD dengan jquery Ajax
	function real_list($id_lb)
	{
		$hasil = $this->db->query("SELECT * FROM realisasi WHERE id_lb='$id_lb'");
		return $hasil->result();
	}

	function get_real_by_kode($id_real)
	{
		$hsl = $this->db->query("SELECT * FROM realisasi WHERE id_real='$id_real'");
		if ($hsl->num_rows() > 0) {
			foreach ($hsl->result() as $data) {
				$hasil = array(
					'id_real' => $data->id_real,
					'id_lb' => $data->id_lb,
					'oleh' => $data->oleh,
					'sebagai' => $data->sebagai
				);
			}
		}
		return $hasil;
	}

	public function update_real($id_real, $oleh, $sebagai)
	{
		$hasil = $this->db->query("UPDATE realisasi SET `oleh`='$oleh',sebagai='$sebagai' WHERE id_real='$id_real'");
		return $hasil;
	}

	function delete_real($id_real)
	{
		$hasil = $this->db->query("DELETE FROM realisasi WHERE id_real='$id_real'");
		return $hasil;
	}
	//END CRUD dengan jquery Ajax

    public function insert($data)
    {
        $insert = $this->db->insert_batch('usulan', $data);
        if ($insert) {
            return true;
        }
    }

    public function tampil_data($id_lb)
    {
        return $this->db->query("SELECT * FROM usulan WHERE id_lb='$id_lb'");
    }

    public function data_select()
    {
        return $this->db->get('notaris');
    }

    public function data_analis()
    {
        return $this->db->get('analis');
    }

    function cari($id)
    {
        $query = $this->db->get_where('notaris', array('notaris' => $id));
        return $query;
    }

    function cek_id($id_usulan)
	{
		$query = array('id_usulan' => $id_usulan);
		return $this->db->get_where('usulan', $query);
	}
    
    function cek_id_real($id_real)
	{
		$query = array('id_real' => $id_real);
		return $this->db->get_where('realisasi', $query);
	}


    public function edit_data($data)
    {
        $id_usulan          = $this->input->post('id_usulan');
        $id_lb          = $this->input->post('id_lb');
        $character     = $this->input->post('character');
        $capacity         = $this->input->post('capacity');
        $capital         = $this->input->post('capital');
        $coe         = $this->input->post('coe');
        $collateral   = $this->input->post('collateral');
        // $realisasi     = $this->input->post('realisasi');
        $notaris     = $this->input->post('notaris');
        $plafond     = $this->input->post('plafondu');
        $waktu     = $this->input->post('waktu');
        $bunga     = $this->input->post('bunga');
        $provisi     = $this->input->post('provisi');
        $administrasi     = $this->input->post('administrasi');
        $asuransi     = $this->input->post('asuransi');
        $materai     = $this->input->post('materai');
        $apht     = $this->input->post('apht');
        $skmht     = $this->input->post('skmht');
        $titipan     = $this->input->post('titipan');
        $fiduciare     = $this->input->post('fiduciare');
        $legalisasi     = $this->input->post('legalisasi');
        $roya     = $this->input->post('roya');
        $lainnya     = $this->input->post('lainnya');
        
		$kondisi = array('id_usulan' => $id_usulan );

        $data = array(
            'character'    => $character,
            'capacity'        => $capacity,
            'capital'        => $capital,
            'coe'        => $coe,
            'collateral'  => $collateral,
            // 'realisasi'    => $realisasi,
            'notaris'    => $notaris,
            'plafond'    => $plafond,
            'waktu'    => $waktu,
            'bunga'    => $bunga,
            'provisi'    => $provisi,
            'administrasi'    => $administrasi,
            'asuransi'    => $asuransi,
            'materai'    => $materai,
            'apht'    => $apht,
            'skmht'    => $skmht,
            'titipan'    => $titipan,
            'fiduciare'    => $fiduciare,
            'legalisasi'    => $legalisasi,
            'roya'    => $roya,
            'lainnya'    => $lainnya,
        );
        $this->db->update('usulan', $data,$kondisi);
        redirect('test/edit?id_lb='.$id_lb);
    }
    
    public function add_data_real($data)
    {
        $id_lb          = $this->input->post('id_lb');
        $oleh     = $this->input->post('oleh');
        $sebagai         = $this->input->post('sebagai');

        $data = array(
            'id_lb'         => $id_lb,
            'oleh'    => $oleh,
            'sebagai'        => $sebagai
    
        );
        $this->db->insert('realisasi', $data);
        redirect('test/edit?id_lb='.$id_lb);
    }

    public function edit_data_real($data)
    {
        $id_real          = $this->input->post('id_real');
        $id_lb          = $this->input->post('id_lb');
        $oleh     = $this->input->post('oleh');
        $sebagai         = $this->input->post('sebagai');
        
		$kondisi = array('id_real' => $id_real );

        $data = array(
            'oleh'    => $oleh,
            'sebagai'        => $sebagai
        );
        $this->db->update('realisasi', $data,$kondisi);
        redirect('test/edit?id_lb='.$id_lb);
    }
    
	function hapus_data($id_real, $id_lb)
	{
		$this->db->where(array('id_real' => $id_real));
		$this->db->delete('realisasi');
		redirect('test/edit?id_lb=' . $id_lb);
	}

    /*
    public function add_analis($data)
    {
        $id_analisis          = $this->input->post('id_analisis');
        $nama_ao     = $this->input->post('nama_ao');
        $nama         = $this->input->post('nama');
        $file         = "cache/".$row->nama_debitur.date('d-m-y').".docx";
        $coe         = 'coe';

        $data = array(
            'id_analisis'         => $id_analisis,
            'nama_ao'    => $nama_ao,
            'nama'        => $nama,
            'file'        => $file,
            'coe'        => $coe
        );
        $this->db->insert('analisis', $data);
        redirect('analisis');
    }
    */
}
