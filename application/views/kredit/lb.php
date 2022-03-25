<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <!-- Button modal Latar Belakang -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#lb">
        Add
    </button>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#rw">
        Riwayat
    </button>

    <hr>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Nama</th>
                <th scope="col">Plafond</th>
                <th scope="col">Tgl</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($query->result() as $row) {
                echo "<tr>
                        <td>" . $row->nama_debitur . "</td>
                        <td>" . 'Rp. ' . number_format($row->plafon) . "</td>
                        <td>" . date('d-m-Y', strtotime($row->tgl_permohonan)) . "</td>                        
                        <td>
                        <a href='templateword?id_lb=" . $row->id_lb . "' class ='btn btn-success' title='Next'>Next</a>                            
                        </td>							
                    </tr>";
            }
            ?>
        </tbody>
    </table>

    <!--
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Nama</th>
                <th scope="col">Plafond</th>
                <th scope="col">Tgl</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($query->result() as $row) {
                echo "<tr>
                        <td>" . $row->nama_debitur . "</td>
                        <td>" . 'Rp. ' . number_format($row->plafon) . "</td>
                        <td>" . date('d-m-Y', strtotime($row->tgl_permohonan)) . "</td>                        
                        <td>
                        <a href='templateword?id_lb=" . $row->id_lb . "' class ='btn btn-success' title='Next'>Next</a>                            
                        </td>							
                    </tr>";
            }
            ?>
        </tbody>
    </table>
        -->

    <!--

        <a class ='btn btn-warning' data-toggle='modal' data-target='#lb' onClick=\"EditData('" . $row->id_lb . "','" . $row->cif_bank . "','" . $row->tgl_analisa . "'
        ,'" . $row->tgl_permohonan . "','" . $row->plafon . "','" . $row->jangka_waktu . "','" . $row->sifat_kredit . "','" . $row->suku_bunga . "','" . $row->jenis_permohonan . "'
        ,'" . $row->tujuan_permohonan . "','" . $row->ket_penggunaan . "','" . $row->nama_debitur . "','" . $row->status_kawin . "','" . $row->ttl_nasabah . "','" . $row->ktp . "'
        ,'" . $row->alamat_ktp_nasabah . "','" . $row->domisili_nasabah . "','" . $row->hp_nasabah . "','" . $row->status_tt . "','" . $row->pekerjaan_nasabah . "','" . $row->tanggungan . "'
        ,'" . $row->pendidikan . "','" . $row->jenis_kelamin . "','" . $row->masa_laku . "','" . $row->telp_kantor . "','" . $row->lama_tinggal . "','" . $row->nama_pasangan . "'
        ,'" . $row->ttl_pasangan . "','" . $row->alamat_ktp_pasangan . "','" . $row->domisili_pasangan . "','" . $row->pekerjaan_pasangan . "','" . $row->hp_pasangan . "','" . $row->nama_keluarga . "'
        ,'" . $row->hubungan_keluarga . "','" . $row->alamat_keluarga . "','" . $row->hp_keluarga . "')\">Edit</a>
    -->

    <!-- Modal LB-->
    <div class="modal fade" id="lb" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?php echo base_url('kredit/add'); ?>">
                    <div class="modal-body">
                        <div class="col-md-3 mb-3">
                            <label for="cif_bank" class="form-label">CIF Bank</label>
                            <input type="hidden" id="id_lb" name="id_lb">
                            <input type="number" class="form-control" id="cif_bank" name="cif_bank">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="tgl_permohonan" class="form-label">Tgl Permohonan</label>
                            <input type="date" class="form-control" id="tgl_permohonan" name="tgl_permohonan">
                        </div>
                        <div class="col-4 mb-5">
                            <label for="tgl_analisa" class="form-label">Tgl Analisa</label>
                            <input type="date" class="form-control" id="tgl_analisa" name="tgl_analisa">
                        </div>
                        <div class="col-md-12 mb-2">
                            <h4>1. Data Permohonan</h4>
                            <hr>
                        </div>
                        <div class="col-3 mb-3">
                            <label for="plafon" class="form-label">Plafond yang dimohon</label>
                            <input type="text" class="form-control" id="plafon" value="" name="plafon">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="jangka_waktu" class="form-label">Jangka Waktu</label>
                            <input type="text" class="form-control" id="jangka_waktu" value=" Bulan" name="jangka_waktu">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="sifat_kredit" class="form-label">Sifat Kredit</label>
                            <input type="text" class="form-control" id="sifat_kredit" name="sifat_kredit">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="suku_bunga" class="form-label">Suku Bunga</label>
                            <input type="text" class="form-control" id="suku_bunga" name="suku_bunga">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="jenis_permohonan" class="form-label">Jenis Permohonan</label>
                            <input type="text" class="form-control" id="jenis_permohonan" name="jenis_permohonan">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="tujuan_permohonan" class="form-label">Tujuan Penggunaan</label>
                            <input type="text" class="form-control" id="tujuan_permohonan" name="tujuan_permohonan">
                        </div>
                        <div class="col-md-12 mb-5">
                            <label for="ket_penggunaan" class="form-label">Keterangan Penggunaan</label>
                            <textarea class="form-control" id="ket_penggunaan" name="ket_penggunaan"></textarea>
                        </div>
                        <div class="col-md-12 mb-2">
                            <h4>2. Data Diri Nasabah</h4>
                            <hr>
                        </div>
                        <div class="col-3 mb-3">
                            <label for="nama_debitur" class="form-label">Nama Debitur</label>
                            <input type="text" class="form-control" id="nama_debitur" name="nama_debitur">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="status_kawin" class="form-label">Status Perkawinan</label>
                            <input type="text" class="form-control" id="status_kawin" name="status_kawin">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="ttl_nasabah" class="form-label">Tempat, tgl lahir</label>
                            <input type="text" class="form-control" id="ttl_nasabah" name="ttl_nasabah">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="ktp" class="form-label">No. KTP</label>
                            <input type="text" class="form-control" id="ktp" name="ktp">
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="alamat_ktp_nasabah" class="form-label">Alamat Sesuai KTP</label>
                            <textarea class="form-control" id="alamat_ktp_nasabah" name="alamat_ktp_nasabah"></textarea>
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="domisili_nasabah" class="form-label">Alamat Sesuai Domisili</label>
                            <textarea class="form-control" id="domisili_nasabah" name="domisili_nasabah"></textarea>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="hp_nasabah" class="form-label">No. Tlp</label>
                            <input type="text" class="form-control" id="hp_nasabah" name="hp_nasabah">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="status_tt" class="form-label">Status Tempat Tinggal</label>
                            <input type="text" class="form-control" id="status_tt" name="status_tt">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="pekerjaan_nasabah" class="form-label">Pekerjaan</label>
                            <input type="text" class="form-control" id="pekerjaan_nasabah" name="pekerjaan_nasabah">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="tanggungan" class="form-label">Tanggungan</label>
                            <input type="text" class="form-control" id="tanggungan" name="tanggungan" value=" Orang">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="pendidikan" class="form-label">Pendidikan</label>
                            <select class="form-control" aria-label="Default select example" id="pendidikan" name="pendidikan">
                                <option value="SD">SD</option>
                                <option value="SMP">SMP</option>
                                <option value="SMA">SMA</option>
                                <option value="S1">S1</option>
                                <option value="S2">S2</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <select class="form-control" aria-label="Default select example" id="jenis_kelamin" name="jenis_kelamin">
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="masa_laku" class="form-label">Masa Laku</label>
                            <input type="text" class="form-control" id="masa_laku" name="masa_laku" value="Seumur Hidup">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="telp_kantor" class="form-label">No. Tlp Kantor</label>
                            <input type="text" class="form-control" id="telp_kantor" name="telp_kantor">
                        </div>
                        <div class="col-md-3 mb-5">
                            <label for="lama_tinggal" class="form-label">Lama Tinggal</label>
                            <input type="text" class="form-control" id="lama_tinggal" name="lama_tinggal" value=" Tahun">
                        </div>
                        <div class="col-md-12 mb-2">
                            <h4>3. Data Suami/Istri</h4>
                            <hr>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="nama_pasangan" class="form-label">Nama Istri/Suami</label>
                            <input type="text" class="form-control" id="nama_pasangan" name="nama_pasangan">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="ttl_pasangan" class="form-label">Tempat, tgl lahir</label>
                            <input type="text" class="form-control" id="ttl_pasangan" name="ttl_pasangan">
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="alamat_ktp_pasangan" class="form-label">Alamat Sesuai KTP</label>
                            <textarea class="form-control" id="alamat_ktp_pasangan" name="alamat_ktp_pasangan"></textarea>
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="domisili_pasangan" class="form-label">Alamat Sesuai Domisili</label>
                            <textarea class="form-control" id="domisili_pasangan" name="domisili_pasangan"></textarea>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="pekerjaan_pasangan" class="form-label">Profesi Istri/Suami</label>
                            <input type="text" class="form-control" id="pekerjaan_pasangan" name="pekerjaan_pasangan">
                        </div>
                        <div class="col-md-3 mb-5">
                            <label for="hp_pasangan" class="form-label">No. Tlp</label>
                            <input type="text" class="form-control" id="hp_pasangan" name="hp_pasangan">
                        </div>
                        <div class="col-md-12 mb-2">
                            <h4>4. Data Emergency Contact</h4>
                            <hr>
                        </div>
                        <div class="col-3 mb-3">
                            <label for="nama_keluarga" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama_keluarga" name="nama_keluarga">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="hubungan_keluarga" class="form-label">Hubungan Keluarga</label>
                            <input type="text" class="form-control" id="hubungan_keluarga" name="hubungan_keluarga">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="alamat_keluarga" class="form-label">Alamat Rumah</label>
                            <textarea class="form-control" id="alamat_keluarga" name="alamat_keluarga"></textarea>
                        </div>
                        <div class="col-md-3 mb-5">
                            <label for="hp_keluarga" class="form-label">No. Tlp/Hp</label>
                            <input type="text" class="form-control" id="hp_keluarga" name="hp_keluarga">
                        </div>
                        <div class="col-md-12 mb-2">
                            <h4>5. Riwayat Pinjaman</h4>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label">1</label>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="pf1" class="form-label">Plafond (Rp.)</label>
                                <input type="text" class="form-control" id="pf1" name="pf1">
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="st1" class="form-label">Status</label>
                                <select class="form-control" aria-label="Default select example" id="st1" name="st1">
                                    <option value=""></option>
                                    <option value="Lunas">Lunas</option>
                                    <option value="Belum Lunas">Belum Lunas</option>
                                </select>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="sd1" class="form-label">Saldo (Rp.)</label>
                                <input type="text" class="form-control" id="sd1" name="sd1">
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="sj1" class="form-label">Sejarah</label>
                                <select class="form-control" aria-label="Default select example" id="sj1" name="sj1">
                                    <option value=""></option>
                                    <option value="Baik">Baik</option>
                                    <option value="Tidak Baik">Tidak Baik</option>
                                </select>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="dt1" class="form-label">Data</label>
                                <select class="form-control" aria-label="Default select example" id="dt1" name="dt1">
                                    <option value=""></option>
                                    <option value="Terlampir">Terlampir</option>
                                    <option value="Tidak Terlampir">Tidak Terlampir</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label">2</label>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="pf2" class="form-label">Plafond (Rp.)</label>
                                <input type="text" class="form-control" id="pf2" name="pf2">
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="st2" class="form-label">Status</label>
                                <select class="form-control" aria-label="Default select example" id="st2" name="st2">
                                    <option value=""></option>
                                    <option value="Lunas">Lunas</option>
                                    <option value="Belum Lunas">Belum Lunas</option>
                                </select>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="sd2" class="form-label">Saldo (Rp.)</label>
                                <input type="text" class="form-control" id="sd2" name="sd2">
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="sj2" class="form-label">Sejarah</label>
                                <select class="form-control" aria-label="Default select example" id="sj2" name="sj2">
                                    <option value=""></option>
                                    <option value="Baik">Baik</option>
                                    <option value="Tidak Baik">Tidak Baik</option>
                                </select>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="dt2" class="form-label">Data</label>
                                <select class="form-control" aria-label="Default select example" id="dt2" name="dt2">
                                    <option value=""></option>
                                    <option value="Terlampir">Terlampir</option>
                                    <option value="Tidak Terlampir">Tidak Terlampir</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label">3</label>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="pf3" class="form-label">Plafond (Rp.)</label>
                                <input type="text" class="form-control" id="pf3" name="pf3">
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="st3" class="form-label">Status</label>
                                <select class="form-control" aria-label="Default select example" id="st3" name="st3">
                                    <option value=""></option>
                                    <option value="Lunas">Lunas</option>
                                    <option value="Belum Lunas">Belum Lunas</option>
                                </select>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="sd3" class="form-label">Saldo (Rp.)</label>
                                <input type="text" class="form-control" id="sd3" name="sd3">
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="sj3" class="form-label">Sejarah</label>
                                <select class="form-control" aria-label="Default select example" id="sj3" name="sj3">
                                    <option value=""></option>
                                    <option value="Baik">Baik</option>
                                    <option value="Tidak Baik">Tidak Baik</option>
                                </select>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="dt3" class="form-label">Data</label>
                                <select class="form-control" aria-label="Default select example" id="dt3" name="dt3">
                                    <option value=""></option>
                                    <option value="Terlampir">Terlampir</option>
                                    <option value="Tidak Terlampir">Tidak Terlampir</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label">4</label>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="pf4" class="form-label">Plafond (Rp.)</label>
                                <input type="text" class="form-control" id="pf4" name="pf4">
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="st4" class="form-label">Status</label>
                                <select class="form-control" aria-label="Default select example" id="st4" name="st4">
                                    <option value=""></option>
                                    <option value="Lunas">Lunas</option>
                                    <option value="Belum Lunas">Belum Lunas</option>
                                </select>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="sd4" class="form-label">Saldo (Rp.)</label>
                                <input type="text" class="form-control" id="sd4" name="sd4">
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="sj4" class="form-label">Sejarah</label>
                                <select class="form-control" aria-label="Default select example" id="sj4" name="sj4">
                                    <option value=""></option>
                                    <option value="Baik">Baik</option>
                                    <option value="Tidak Baik">Tidak Baik</option>
                                </select>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="dt4" class="form-label">Data</label>
                                <select class="form-control" aria-label="Default select example" id="dt4" name="dt4">
                                    <option value=""></option>
                                    <option value="Terlampir">Terlampir</option>
                                    <option value="Tidak Terlampir">Tidak Terlampir</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label">5</label>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="pf5" class="form-label">Plafond (Rp.)</label>
                                <input type="text" class="form-control" id="pf5" name="pf5">
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="st5" class="form-label">Status</label>
                                <select class="form-control" aria-label="Default select example" id="st5" name="st5">
                                    <option value=""></option>
                                    <option value="Lunas">Lunas</option>
                                    <option value="Belum Lunas">Belum Lunas</option>
                                </select>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="sd5" class="form-label">Saldo (Rp.)</label>
                                <input type="text" class="form-control" id="sd5" name="sd5">
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="sj5" class="form-label">Sejarah</label>
                                <select class="form-control" aria-label="Default select example" id="sj5" name="sj5">
                                    <option value=""></option>
                                    <option value="Baik">Baik</option>
                                    <option value="Tidak Baik">Tidak Baik</option>
                                </select>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="dt5" class="form-label">Data</label>
                                <select class="form-control" aria-label="Default select example" id="dt5" name="dt5">
                                    <option value=""></option>
                                    <option value="Terlampir">Terlampir</option>
                                    <option value="Tidak Terlampir">Tidak Terlampir</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="rw" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Input Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('kredit/add_rw'); ?>" method="post">
                    <div class="modal-body after-add-more">
                        <div class="row">
                            <div class="col-md-2 mb-3">
                                <label for="plafond" class="form-label">Plafond (Rp.)</label>
                                <input type="text" class="form-control" id="plafond" name="plafond[]">
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-control" aria-label="Default select example" id="status" name="status[]">
                                    <option value=""></option>
                                    <option value="Lunas">Lunas</option>
                                    <option value="Belum Lunas">Belum Lunas</option>
                                </select>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="saldo" class="form-label">Saldo (Rp.)</label>
                                <input type="text" class="form-control" id="saldo" name="saldo[]">
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="sejarah" class="form-label">Sejarah</label>
                                <select class="form-control" aria-label="Default select example" id="sejarah" name="sejarah[]">
                                    <option value=""></option>
                                    <option value="Baik">Baik</option>
                                    <option value="Tidak Baik">Tidak Baik</option>
                                </select>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="data" class="form-label">Data</label>
                                <select class="form-control" aria-label="Default select example" id="data" name="data[]">
                                    <option value=""></option>
                                    <option value="Terlampir">Terlampir</option>
                                    <option value="Tidak Terlampir">Tidak Terlampir</option>
                                </select>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="sd5" class="form-label">Tambah data</label>
                                <button class="btn btn-success add-more" type="button">
                                    <i class="glyphicon glyphicon-plus"></i> Add
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="copy invisible">
        <div class="modal-body">
            <div class="row">
                <div class="col-md-2 mb-3">
                    <label for="plafond" class="form-label">Plafond (Rp.)</label>
                    <input type="text" class="form-control" id="plafond" name="plafond[]">
                </div>
                <div class="col-md-2 mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-control" aria-label="Default select example" id="status" name="status[]">
                        <option value=""></option>
                        <option value="Lunas">Lunas</option>
                        <option value="Belum Lunas">Belum Lunas</option>
                    </select>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="saldo" class="form-label">Saldo (Rp.)</label>
                    <input type="text" class="form-control" id="saldo" name="saldo[]">
                </div>
                <div class="col-md-2 mb-3">
                    <label for="sejarah" class="form-label">Sejarah</label>
                    <select class="form-control" aria-label="Default select example" id="sejarah" name="sejarah[]">
                        <option value=""></option>
                        <option value="Baik">Baik</option>
                        <option value="Tidak Baik">Tidak Baik</option>
                    </select>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="data" class="form-label">Data</label>
                    <select class="form-control" aria-label="Default select example" id="data" name="data[]">
                        <option value=""></option>
                        <option value="Terlampir">Terlampir</option>
                        <option value="Tidak Terlampir">Tidak Terlampir</option>
                    </select>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="sd5" class="form-label">Tambah data</label>
                    <button class="btn btn-danger remove" type="button">
                        <i class="glyphicon glyphicon-plus"></i> Remove
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $(".add-more").click(function() {
                var html = $(".copy").html();
                $(".after-add-more").after(html);
            });

            // saat tombol remove dklik control group akan dihapus 
            $("body").on("click", ".remove", function() {
                $(this).parents(".modal-body").remove();
            });
        });
    </script>

    <!--
    <script type="text/javascript">
        function EditData(id_lb, cif_bank, tgl_analisa, tgl_permohonan, plafon, jangka_waktu, sifat_kredit, $suku_bunga, jenis_permohonan, tujuan_permohonan, ket_penggunaan, nama_debitur, status_kawin, ttl_nasabah, ktp, alamat_ktp_nasabah, domisili_nasabah, hp_nasabah, status_tt, pekerjaan_nasabah, tanggungan, pendidikan, jenis_kelamin, masa_laku, telp_kantor, lama_tinggal, nama_pasangan, ttl_pasangan, alamat_ktp_pasangan, domisili_pasangan, pekerjaan_pasangan, hp_pasangan, nama_keluarga, hubungan_keluarga, alamat_keluarga, hp_keluarga) {
            document.getElementById('id_lb').value = id_lb;
            document.getElementById('cif_bank').value = cif_bank;
            document.getElementById('tgl_analisa').value = tgl_analisa;
            document.getElementById('tgl_permohonan').value = tgl_permohonan;
            document.getElementById('plafon').value = plafon;
            document.getElementById('jangka_waktu').value = jangka_waktu;
            document.getElementById('sifat_kredit').value = sifat_kredit;
            document.getElementById('suku_bunga').value = suku_bunga;
            document.getElementById('jenis_permohonan').value = jenis_permohonan;
            document.getElementById('tujuan_permohonan').value = tujuan_permohonan;
            document.getElementById('ket_penggunaan').value = ket_penggunaan;
            document.getElementById('nama_debitur').value = nama_debitur;
            document.getElementById('status_kawin').value = status_kawin;
            document.getElementById('ttl_nasabah').value = ttl_nasabah;
            document.getElementById('ktp').value = ktp;
            document.getElementById('alamat_ktp_nasabah').value = alamat_ktp_nasabah;
            document.getElementById('domisili_nasabah').value = domisili_nasabah;
            document.getElementById('hp_nasabah').value = hp_nasabah;
            document.getElementById('status_tt').value = status_tt;
            document.getElementById('pekerjaan_nasabah').value = pekerjaan_nasabah;
            document.getElementById('tanggungan').value = tanggungan;
            document.getElementById('pendidikan').value = pendidikan;
            document.getElementById('jenis_kelamin').value = jenis_kelamin;
            document.getElementById('masa_laku').value = masa_laku;
            document.getElementById('telp_kantor').value = telp_kantor;
            document.getElementById('lama_tinggal').value = lama_tinggal;
            document.getElementById('nama_pasangan').value = nama_pasangan;
            document.getElementById('ttl_pasangan').value = ttl_pasangan;
            document.getElementById('alamat_ktp_pasangan').value = alamat_ktp_pasangan;
            document.getElementById('domisili_pasangan').value = domisili_pasangan;
            document.getElementById('pekerjaan_pasangan').value = pekerjaan_pasangan;
            document.getElementById('hp_pasangan').value = hp_pasangan;
            document.getElementById('nama_keluarga').value = nama_keluarga;
            document.getElementById('hubungan_keluarga').value = hubungan_keluarga;
            document.getElementById('alamat_keluarga').value = alamat_keluarga;
            document.getElementById('hp_keluarga').value = hp_keluarga;
        }
        */

        function HapusData(idt) {
            document.getElementById('idt2').value = idt;
        }
    </script>
-->

    <script type="text/javascript">
        function EditData(id_lb, cif_bank, tgl_analisa, tgl_permohonan, plafon, jangka_waktu, sifat_kredit, $suku_bunga, jenis_permohonan, tujuan_permohonan, ket_penggunaan, nama_debitur, status_kawin, ttl_nasabah, ktp, alamat_ktp_nasabah, domisili_nasabah, hp_nasabah, status_tt, pekerjaan_nasabah, tanggungan, pendidikan, jenis_kelamin, masa_laku, telp_kantor, lama_tinggal, nama_pasangan, ttl_pasangan, alamat_ktp_pasangan, domisili_pasangan, pekerjaan_pasangan, hp_pasangan, nama_keluarga, hubungan_keluarga, alamat_keluarga, hp_keluarga) {
            document.getElementById('id_lb').value = id_lb;
            document.getElementById('cif_bank').value = cif_bank;
            document.getElementById('tgl_analisa').value = tgl_analisa;
            document.getElementById('tgl_permohonan').value = tgl_permohonan;
            document.getElementById('plafon').value = plafon;
            document.getElementById('jangka_waktu').value = jangka_waktu;
            document.getElementById('sifat_kredit').value = sifat_kredit;
            document.getElementById('suku_bunga').value = suku_bunga;
            document.getElementById('jenis_permohonan').value = jenis_permohonan;
            document.getElementById('tujuan_permohonan').value = tujuan_permohonan;
            document.getElementById('ket_penggunaan').value = ket_penggunaan;
            document.getElementById('nama_debitur').value = nama_debitur;
            document.getElementById('status_kawin').value = status_kawin;
            document.getElementById('ttl_nasabah').value = ttl_nasabah;
            document.getElementById('ktp').value = ktp;
            document.getElementById('alamat_ktp_nasabah').value = alamat_ktp_nasabah;
            document.getElementById('domisili_nasabah').value = domisili_nasabah;
            document.getElementById('hp_nasabah').value = hp_nasabah;
            document.getElementById('status_tt').value = status_tt;
            document.getElementById('pekerjaan_nasabah').value = pekerjaan_nasabah;
            document.getElementById('tanggungan').value = tanggungan;
            document.getElementById('pendidikan').value = pendidikan;
            document.getElementById('jenis_kelamin').value = jenis_kelamin;
            document.getElementById('masa_laku').value = masa_laku;
            document.getElementById('telp_kantor').value = telp_kantor;
            document.getElementById('lama_tinggal').value = lama_tinggal;
            document.getElementById('nama_pasangan').value = nama_pasangan;
            document.getElementById('ttl_pasangan').value = ttl_pasangan;
            document.getElementById('alamat_ktp_pasangan').value = alamat_ktp_pasangan;
            document.getElementById('domisili_pasangan').value = domisili_pasangan;
            document.getElementById('pekerjaan_pasangan').value = pekerjaan_pasangan;
            document.getElementById('hp_pasangan').value = hp_pasangan;
            document.getElementById('nama_keluarga').value = nama_keluarga;
            document.getElementById('hubungan_keluarga').value = hubungan_keluarga;
            document.getElementById('alamat_keluarga').value = alamat_keluarga;
            document.getElementById('hp_keluarga').value = hp_keluarga;
        }

        function HapusData(idt) {
            document.getElementById('idt2').value = idt;
        }
    </script>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->