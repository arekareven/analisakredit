<!-- Test case 1-->
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <!-- table pemasukan -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-3">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-lb-tab" data-toggle="pill" href="#v-pills-lb" role="tab" aria-controls="v-pills-lb" aria-selected="true">Latar Belakang</a>
                        <a class="nav-link" id="v-pills-rw-tab" data-toggle="pill" href="#v-pills-rw" role="tab" aria-controls="v-pills-rw" aria-selected="false">Riwayat Pinjaman</a>
                        <a class="nav-link" id="v-pills-character-tab" data-toggle="pill" href="#v-pills-character" role="tab" aria-controls="v-pills-character" aria-selected="false">Character</a>
                        <a class="nav-link" id="v-pills-capacity-tab" data-toggle="pill" href="#v-pills-capacity" role="tab" aria-controls="v-pills-capacity" aria-selected="false">Capacity</a>
                        <a class="nav-link" id="v-pills-capital-tab" data-toggle="pill" href="#v-pills-capital" role="tab" aria-controls="v-pills-capital" aria-selected="false">Capital</a>
                        <a class="nav-link" id="v-pills-cashflow-tab" data-toggle="pill" href="#v-pills-cashflow" role="tab" aria-controls="v-pills-cashflow" aria-selected="false">Cashflow Awal</a>
                        <a class="nav-link" id="v-pills-cashflows-tab" data-toggle="pill" href="#v-pills-cashflows" role="tab" aria-controls="v-pills-cashflows" aria-selected="false">Cashflow Setelah</a>
                        <a class="nav-link" id="v-pills-condition-tab" data-toggle="pill" href="#v-pills-condition" role="tab" aria-controls="v-pills-condition" aria-selected="false">Condition</a>
                        <a class="nav-link" id="v-pills-collateralt-tab" data-toggle="pill" href="#v-pills-collateralt" role="tab" aria-controls="v-pills-collateralt" aria-selected="false">Collateral Tanah</a>
                        <a class="nav-link" id="v-pills-collateralk-tab" data-toggle="pill" href="#v-pills-collateralk" role="tab" aria-controls="v-pills-collateralk" aria-selected="false">Collateral Kendaraan</a>
                        <a class="nav-link" id="v-pills-usulan-tab" data-toggle="pill" href="#v-pills-usulan" role="tab" aria-controls="v-pills-usulan" aria-selected="false">Usulan</a>
                    </div>
                </div>
                <div class="col-9">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-lb" role="tabpanel" aria-labelledby="v-pills-lb-tab">
                            <?php
                            foreach ($lb->result() as $row) {
                            ?>
                                <form method="post" action="<?php echo base_url('kredit/add'); ?>">
                                    <div class="modal-body">
                                        <div class="col-md-8 mb-3">
                                            <label for="tgl_permohonan" class="form-label">Tgl Permohonan</label>
                                            <input type="date" class="form-control" id="tgl_permohonan" name="tgl_permohonan" value="<?php echo $row->tgl_permohonan; ?>">
                                        </div>
                                        <div class="col-md-8 mb-5">
                                            <label for="tgl_analisa" class="form-label">Tgl Analisa</label>
                                            <input type="date" class="form-control" id="tgl_analisa" name="tgl_analisa" value="<?php echo $row->tgl_analisa; ?>">
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <h4>1. Data Permohonan</h4>
                                            <hr>
                                        </div>
                                        <div class="col-md-8 mb-3">
                                            <label for="plafon" class="form-label">Plafond yang dimohon</label>
                                            <input type="hidden" class="form-control" id="id_lb" name="id_lb" value="<?php echo $row->id_lb; ?>">
                                            <input type="text" class="form-control" id="plafon" name="plafon" value="<?php echo $row->plafon; ?>">
                                        </div>
                                        <div class="col-md-8 mb-3">
                                            <label for="jangka_waktu" class="form-label">Jangka Waktu (Bulan)</label>
                                            <input type="text" class="form-control" id="jangka_waktu" name="jangka_waktu" value="<?php echo $row->jangka_waktu; ?>">
                                        </div>
                                        <div class="col-md-8 mb-3">
                                            <label for="sifat_kredit" class="form-label">Sifat Kredit</label>
                                            <select class="form-control" aria-label="Default select example" id="sifat_kredit" name="sifat_kredit">
                                                <option value="<?php echo $row->sifat_kredit; ?>"><?php echo $row->sifat_kredit; ?></option>
                                                <option value="Pokok bunga tiap bulan">Pokok bunga tiap bulan</option>
                                                <option value="Pokok tiap 3 bulan bunga tiap bulan">Pokok tiap 3 bulan bunga tiap bulan</option>
                                                <option value="Pokok tiap 4 bulan bunga tiap bulan">Pokok tiap 4 bulan bunga tiap bulan</option>
                                                <option value="Pokok tiap 6 bulan bunga tiap bulan">Pokok tiap 6 bulan bunga tiap bulan</option>
                                                <option value="Pokok tiap 12 bulan bunga tiap bulan">Pokok tiap 12 bulan bunga tiap bulan</option>
                                                <option value="Pokok terakhir bunga tiap bulan">Pokok terakhir bunga tiap bulan</option>
                                                <option value="Pokok bunga terakhir">Pokok bunga terakhir</option>
                                                <option value="Musiman">Musiman</option>
                                                <option value="Anuitas">Anuitas</option>
                                                <option value="Efektif">Efektif</option>
                                            </select>
                                        </div>
                                        <div class="col-md-8 mb-3">
                                            <label for="suku_bunga" class="form-label">Suku Bunga</label>
                                            <input type="text" class="form-control" id="suku_bunga" name="suku_bunga" value="<?php echo $row->suku_bunga; ?>">
                                        </div>
                                        <div class="col-md-8 mb-3">
                                            <label for="jenis_permohonan" class="form-label">Jenis Permohonan</label>
                                            <select class="form-control" aria-label="Default select example" id="jenis_permohonan" name="jenis_permohonan">
                                                <option value="<?php echo $row->jenis_permohonan; ?>"><?php echo $row->jenis_permohonan; ?></option>
                                                <option value="Baru">Baru</option>
                                                <option value="Ulangan">Ulangan</option>
                                                <option value="Top Up">Top Up / Perpanjangan</option>
                                                <option value="Restrukturisasi">Restrukturisasi</option>
                                            </select>
                                        </div>
                                        <div class="col-md-8 mb-3">
                                            <label for="tujuan_permohonan" class="form-label">Tujuan Penggunaan</label>
                                            <select class="form-control" aria-label="Default select example" id="tujuan_permohonan" name="tujuan_permohonan">
                                                <option value="<?php echo $row->tujuan_permohonan; ?>"><?php echo $row->tujuan_permohonan; ?></option>
                                                <option value="Modal Kerja">Modal Kerja</option>
                                                <option value="Investasi">Investasi</option>
                                                <option value="Konsumsi">Konsumsi</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12 mb-5">
                                            <label for="ket_penggunaan" class="form-label">Keterangan Penggunaan</label>
                                            <textarea class="form-control" id="ket_penggunaan" name="ket_penggunaan"><?php echo $row->ket_penggunaan; ?></textarea>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <h4>2. Data Diri Nasabah</h4>
                                            <hr>
                                        </div>
                                        <div class="col-md-8 mb-3">
                                            <label for="nama_debitur" class="form-label">Nama Debitur</label>
                                            <input type="text" class="form-control" id="nama_debitur" name="nama_debitur" value="<?php echo $row->nama_debitur; ?>">
                                        </div>
                                        <div class="col-md-8 mb-3">
                                            <label for="status_kawin" class="form-label">Status Perkawinan</label>
                                            <select class="form-control" aria-label="Default select example" id="status_kawin" name="status_kawin">
                                                <option value="<?php echo $row->status_kawin; ?>"><?php echo $row->status_kawin; ?></option>
                                                <option value="Tidak Menikah">Tidak Menikah</option>
                                                <option value="Menikah">Menikah</option>
                                                <option value="Duda">Duda</option>
                                                <option value="Janda">Janda</option>
                                            </select>
                                        </div>
                                        <div class="col-md-8 mb-3">
                                            <label for="ttl_nasabah" class="form-label">Tempat, tgl lahir</label>
                                            <input type="text" class="form-control" id="ttl_nasabah" name="ttl_nasabah" value="<?php echo $row->ttl_nasabah; ?>">
                                        </div>
                                        <div class="col-md-8 mb-3">
                                            <label for="ktp" class="form-label">No. KTP</label>
                                            <input type="text" class="form-control" id="ktp" name="ktp" value="<?php echo $row->ktp; ?>">
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="alamat_ktp_nasabah" class="form-label">Alamat Sesuai KTP</label>
                                            <textarea class="form-control" id="alamat_ktp_nasabah" name="alamat_ktp_nasabah"><?php echo $row->alamat_ktp_nasabah; ?></textarea>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="domisili_nasabah" class="form-label">Alamat Sesuai Domisili</label>
                                            <textarea class="form-control" id="domisili_nasabah" name="domisili_nasabah"><?php echo $row->domisili_nasabah; ?></textarea>
                                        </div>
                                        <div class="col-md-8 mb-3">
                                            <label for="hp_nasabah" class="form-label">No. Tlp</label>
                                            <input type="text" class="form-control" id="hp_nasabah" name="hp_nasabah" value="<?php echo $row->hp_nasabah; ?>">
                                        </div>
                                        <div class="col-md-8 mb-3">
                                            <label for="status_tt" class="form-label">Status Tempat Tinggal</label>
                                            <select class="form-control" aria-label="Default select example" id="status_tt" name="status_tt">
                                                <option value="<?php echo $row->status_tt; ?>"><?php echo $row->status_tt; ?></option>
                                                <option value="Milik Sendiri">Milik Sendiri</option>
                                                <option value="Milik Keluarga/Ortu">Milik Keluarga/Ortu</option>
                                                <option value="Instansi">Instansi</option>
                                                <option value="Kontrak">Kontrak</option>
                                                <option value="Kredit">Kredit</option>
                                            </select>
                                        </div>
                                        <div class="col-md-8 mb-3">
                                            <label for="pekerjaan_nasabah" class="form-label">Pekerjaan</label>
                                            <input type="text" class="form-control" id="pekerjaan_nasabah" name="pekerjaan_nasabah" value="<?php echo $row->pekerjaan_nasabah; ?>">
                                        </div>
                                        <div class="col-md-8 mb-3">
                                            <label for="tanggungan" class="form-label">Tanggungan (Orang)</label>
                                            <input type="text" class="form-control" id="tanggungan" name="tanggungan" value="<?php echo $row->tanggungan; ?>">
                                        </div>
                                        <div class="col-md-8 mb-3">
                                            <label for="pendidikan" class="form-label">Pendidikan</label>
                                            <select class="form-control" aria-label="Default select example" id="pendidikan" name="pendidikan">
                                                <option value="<?php echo $row->pendidikan; ?>"><?php echo $row->pendidikan; ?></option>
                                                <option value="SD">SD</option>
                                                <option value="SMP">SMP</option>
                                                <option value="SMA">SMA</option>
                                                <option value="Diploma">Diploma</option>
                                                <option value="S1">S1</option>
                                                <option value="S2">S2</option>
                                                <option value="S3">S3</option>
                                            </select>
                                        </div>
                                        <div class="col-md-8 mb-3">
                                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                            <select class="form-control" aria-label="Default select example" id="jenis_kelamin" name="jenis_kelamin" value="<?php echo $row->jenis_kelamin; ?>">
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="col-md-8 mb-3">
                                            <label for="masa_laku" class="form-label">Masa Laku</label>
                                            <input type="text" class="form-control" id="masa_laku" name="masa_laku" value="Seumur Hidup" value="<?php echo $row->masa_laku; ?>">
                                        </div>
                                        <div class="col-md-8 mb-3">
                                            <label for="telp_kantor" class="form-label">No. Tlp Kantor</label>
                                            <input type="text" class="form-control" id="telp_kantor" name="telp_kantor" value="<?php echo $row->telp_kantor; ?>">
                                        </div>
                                        <div class="col-md-8 mb-5">
                                            <label for="lama_tinggal" class="form-label">Lama Tinggal (Tahun)</label>
                                            <input type="text" class="form-control" id="lama_tinggal" name="lama_tinggal" value="<?php echo $row->lama_tinggal; ?>">
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <h4>3. Data Suami/Istri</h4>
                                            <hr>
                                        </div>
                                        <div class="col-md-8 mb-3">
                                            <label for="nama_pasangan" class="form-label">Nama Istri/Suami</label>
                                            <input type="text" class="form-control" id="nama_pasangan" name="nama_pasangan" value="<?php echo $row->nama_pasangan; ?>">
                                        </div>
                                        <div class="col-md-8 mb-3">
                                            <label for="ttl_pasangan" class="form-label">Tempat, tgl lahir</label>
                                            <input type="text" class="form-control" id="ttl_pasangan" name="ttl_pasangan" value="<?php echo $row->ttl_pasangan; ?>">
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="alamat_ktp_pasangan" class="form-label">Alamat Sesuai KTP</label>
                                            <textarea class="form-control" id="alamat_ktp_pasangan" name="alamat_ktp_pasangan"><?php echo $row->alamat_ktp_pasangan; ?></textarea>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="domisili_pasangan" class="form-label">Alamat Sesuai Domisili</label>
                                            <textarea class="form-control" id="domisili_pasangan" name="domisili_pasangan"><?php echo $row->domisili_pasangan; ?></textarea>
                                        </div>
                                        <div class="col-md-8 mb-3">
                                            <label for="pekerjaan_pasangan" class="form-label">Profesi Istri/Suami</label>
                                            <input type="text" class="form-control" id="pekerjaan_pasangan" name="pekerjaan_pasangan" value="<?php echo $row->pekerjaan_pasangan; ?>">
                                        </div>
                                        <div class="col-md-8 mb-5">
                                            <label for="hp_pasangan" class="form-label">No. Tlp</label>
                                            <input type="text" class="form-control" id="hp_pasangan" name="hp_pasangan" value="<?php echo $row->hp_pasangan; ?>">
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <h4>4. Data Emergency Contact</h4>
                                            <hr>
                                        </div>
                                        <div class="col-md-8 mb-3">
                                            <label for="nama_keluarga" class="form-label">Nama Lengkap</label>
                                            <input type="text" class="form-control" id="nama_keluarga" name="nama_keluarga" value="<?php echo $row->nama_keluarga; ?>">
                                        </div>
                                        <div class="col-md-8 mb-3">
                                            <label for="hubungan_keluarga" class="form-label">Hubungan Keluarga</label>
                                            <select class="form-control" aria-label="Default select example" id="hubungan_keluarga" name="hubungan_keluarga">
                                                <option value="<?php echo $row->hubungan_keluarga; ?>"><?php echo $row->hubungan_keluarga; ?></option>
                                                <option value="Anak Kandung">Anak Kandung</option>
                                                <option value="Saudara Kandung">Saudara Kandung</option>
                                                <option value="Orang Tua">Orang Tua</option>
                                                <option value="Saudara Tidak Sekandung">Saudara Tidak Sekandung</option>
                                                <option value="Rekan Kerja">Rekan Kerja</option>
                                                <option value="Tetangga">Tetangga</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="alamat_keluarga" class="form-label">Alamat Rumah</label>
                                            <textarea class="form-control" id="alamat_keluarga" name="alamat_keluarga"><?php echo $row->alamat_keluarga; ?></textarea>
                                        </div>
                                        <div class="col-md-8 mb-5">
                                            <label for="hp_keluarga" class="form-label">No. Tlp/Hp</label>
                                            <input type="text" class="form-control" id="hp_keluarga" name="hp_keluarga" value="<?php echo $row->hp_keluarga; ?>">
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="tab-pane fade" id="v-pills-rw" role="tabpanel" aria-labelledby="v-pills-rw-tab">
                            <div class="table-responsive">
                                <table class="table table-hover" width="100%" cellspacing="0">
                                    <thead class="thead">
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Plafond</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Saldo</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($rw->result() as $row) {
                                            echo "<tr>
                                            <td>" . $no . "</td>
                                                <td>" . number_format($row->plafond) . "</td>
                                                <td>" . $row->status . "</td>
                                                <td>" . number_format($row->saldo) . "</td>                      
                                                <td>
                                                <a href='#' class ='btn btn-warning btn-circle' data-toggle='modal' title='Edit' data-target='#edit' onClick=\"EditData('" . $row->id_rp . "', '" . $row->plafond . "', '" . $row->status . "', '" . $row->saldo . "', '" . $row->sejarah . "', '" . $row->data . "')\"><i class='fas fa-edit'></i></a>                               
                                                <a href='#' class='btn btn-danger btn-circle' data-toggle='modal' title='Hapus' data-target='#hapus' onClick=\"HapusData('" . $row->id_rp . "')\"><i class='fas fa-trash'></i></a>
                                                </td>							
                                                </tr>";
                                            $no++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-character" role="tabpanel" aria-labelledby="v-pills-character-tab">
                            <?php
                            foreach ($character->result() as $row) {
                            ?>
                                <form method="post" action="<?php echo base_url('character/add'); ?>">
                                    <div class="modal-body">
                                        <div class="col-md-12 mb-4">
                                            <label for="info_pribadi" class="form-label">Informasi Pribadi</label>
                                            <input type="hidden" class="form-control" id="id_lb" name="id_lb" value="<?php echo $id_lb; ?>">
                                            <input type="hidden" class="form-control" id="id_char" name="id_char" value="<?php echo $row->id_char; ?>">
                                            <textarea class="form-control" id="info_pribadi" name="info_pribadi"><?php echo $row->info_pribadi; ?></textarea>
                                        </div>
                                        <div class="col-md-12 mb-4">
                                            <label for="info_perilaku" class="form-label">Informasi Perilaku</label>
                                            <textarea class="form-control" id="info_perilaku" name="info_perilaku"><?php echo $row->info_perilaku; ?></textarea>
                                        </div>
                                        <div class="col-md-12 mb-5">
                                            <label for="info_keluarga" class="form-label">Informasi Keluarga</label>
                                            <textarea class="form-control" id="info_keluarga" name="info_keluarga"><?php echo $row->info_keluarga; ?></textarea>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <h5>Informasi Karakter</h5>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 mb-3">
                                                <label for="nm1" class="form-label">Nama</label>
                                                <input type="text" class="form-control" id="nm1" name="nm1" value="<?php echo $row->nm1; ?>">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="al1" class="form-label">Alamat</label>
                                                <textarea class="form-control" id="al1" name="al1"><?php echo $row->al1; ?></textarea>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="hp1" class="form-label">Tlp./HP</label>
                                                <input type="text" class="form-control" id="hp1" name="hp1" value="<?php echo $row->hp1; ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 mb-3">
                                                <label for="nm2" class="form-label">Nama</label>
                                                <input type="text" class="form-control" id="nm2" name="nm2" value="<?php echo $row->nm2; ?>">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="al2" class="form-label">Alamat</label>
                                                <textarea class="form-control" id="al2" name="al2"><?php echo $row->al2; ?></textarea>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="hp2" class="form-label">Tlp. /HP</label>
                                                <input type="text" class="form-control" id="hp2" name="hp2" value="<?php echo $row->hp2; ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 mb-3">
                                                <label for="nm3" class="form-label">Nama</label>
                                                <input type="text" class="form-control" id="nm3" name="nm3" value="<?php echo $row->nm3; ?>">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="al3" class="form-label">Alamat</label>
                                                <textarea class="form-control" id="al3" name="al3"><?php echo $row->al3; ?></textarea>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="hp3" class="form-label">Tlp. /HP</label>
                                                <input type="text" class="form-control" id="hp3" name="hp3" value="<?php echo $row->hp3; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" id="btn_character" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="tab-pane fade" id="v-pills-capacity" role="tabpanel" aria-labelledby="v-pills-capacity-tab">
                            <?php
                            foreach ($capacity->result() as $row) {
                            ?>
                                <form method="post" action="<?php echo base_url('capacity/add'); ?>">
                                    <div class="modal-body">
                                        <div class="col-md-4 mb-3">
                                            <label for="nama_usaha" class="form-label">Nama Bidang Usaha</label>
                                            <input type="hidden" class="form-control" id="id_lb" name="id_lb" value="<?php echo $row->id_lb; ?>">
                                            <input type="hidden" class="form-control" id="id_cap" name="id_cap" value="<?php echo $row->id_cap; ?>">
                                            <input type="text" class="form-control" id="nama_usaha" name="nama_usaha" value="<?php echo $row->nama_usaha; ?>">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="sektor" class="form-label">Sektor Usaha</label>
                                            <select class="form-control" aria-label="Default select example" id="sektor" name="sektor">
                                                <option value="<?php echo $row->sektor; ?>"><?php echo $row->sektor; ?></option>
                                                <option value="Industri">Industri</option>
                                                <option value="Jasa">Jasa</option>
                                                <option value="Kontraktor">Kontraktor</option>
                                                <option value="Pegawai">Pegawai</option>
                                                <option value="Perdagangan">Perdagangan</option>
                                                <option value="Pertanian">Pertanian</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="bidang" class="form-label">Bidang Usaha</label>
                                            <input type="text" class="form-control" id="bidang" name="bidang" value="<?php echo $row->bidang; ?>">
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="alamat_usaha" class="form-label">Alamat Usaha</label>
                                            <textarea class="form-control" id="alamat_usaha" name="alamat_usaha"><?php echo $row->alamat_usaha; ?></textarea>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="status_usaha" class="form-label">Status Tempat Usaha</label>
                                            <select class="form-control" aria-label="Default select example" id="status_usaha" name="status_usaha">
                                                <option value="<?php echo $row->status_usaha; ?>"><?php echo $row->status_usaha; ?></option>
                                                <option value="Milik Sendiri">Milik Sendiri</option>
                                                <option value="Milik Keluarga/Ortu">Milik Keluarga/Ortu</option>
                                                <option value="Instansi">Instansi</option>
                                                <option value="Kontrak">Kontrak</option>
                                                <option value="Kredit">Kredit</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="tlp_usaha" class="form-label">No. Tlp Usaha</label>
                                            <input type="text" class="form-control" id="tlp_usaha" name="tlp_usaha" value="<?php echo $row->tlp_usaha; ?>">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="tgl_mulai" class="form-label">Tanggal Mulai Usaha</label>
                                            <input type="date" class="form-control" id="tgl_mulai" name="tgl_mulai" value="<?php echo $row->tgl_mulai; ?>">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="tgl_nasabah" class="form-label">Jadi Nasabah Sejak</label>
                                            <input type="date" class="form-control" id="tgl_nasabah" name="tgl_nasabah" value="<?php echo $row->tgl_nasabah; ?>">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="akta" class="form-label">No. Akta</label>
                                            <input type="text" class="form-control" id="akta" name="akta" value="<?php echo $row->akta; ?>">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="tgl_akta" class="form-label">Tanggal Akta</label>
                                            <input type="date" class="form-control" id="tgl_akta" name="tgl_akta" value="<?php echo $row->tgl_akta; ?>">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="npwp" class="form-label">NPWP</label>
                                            <input type="text" class="form-control" id="npwp" name="npwp" value="<?php echo $row->npwp; ?>">
                                        </div>
                                        <div class="col-md-4 mb-5">
                                            <label for="tgl_npwp" class="form-label">Tgl NPWP</label>
                                            <input type="date" class="form-control" id="tgl_npwp" name="tgl_npwp" value="<?php echo $row->tgl_npwp; ?>">
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <h5>Alokasi Dana</h5>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="alokasi1" class="form-label">Penggunaan</label>
                                                <input type="text" class="form-control" id="alokasi1" name="alokasi1" value="<?php echo $row->alokasi1; ?>">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="dana1" class="form-label">Dana</label>
                                                <input type="number" class="form-control" id="dana1" name="dana1" value="<?php echo $row->dana1; ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="alokasi2" class="form-label">Penggunaan</label>
                                                <input type="text" class="form-control" id="alokasi2" name="alokasi2" value="<?php echo $row->alokasi2; ?>">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="dana2" class="form-label">Dana</label>
                                                <input type="number" class="form-control" id="dana2" name="dana2" value="<?php echo $row->dana2; ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="alokasi3" class="form-label">Penggunaan</label>
                                                <input type="text" class="form-control" id="alokasi3" name="alokasi3" value="<?php echo $row->alokasi3; ?>">
                                            </div>
                                            <div class="col-md-4 mb-5">
                                                <label for="dana3" class="form-label">Dana</label>
                                                <input type="number" class="form-control" id="dana3" name="dana3" value="<?php echo $row->dana3; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="usaha_skrg" class="form-label">Usaha Saat Ini</label>
                                            <textarea class="form-control" id="usaha_skrg" name="usaha_skrg"><?php echo $row->usaha_skrg; ?></textarea>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="usaha_realisasi" class="form-label">Usaha Setelah Realisasi</label>
                                            <textarea class="form-control" id="usaha_realisasi" name="usaha_realisasi"><?php echo $row->usaha_realisasi; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" id="btn_capacity" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="tab-pane fade" id="v-pills-capital" role="tabpanel" aria-labelledby="v-pills-capital-tab">
                            <?php
                            foreach ($capital->result() as $row) {
                            ?>
                                <form method="post" action="<?php echo base_url('capital/add'); ?>">
                                    <div class="modal-body">
                                        <div class="col-md-12 mb-3">
                                            <h5>Aktiva lancar</h5>
                                        </div>
                                        <div class="form-group row">
                                            <label for="kas" class="col-sm-6 col-form-label">Kas</label>
                                            <div class="col-sm-6">
                                                <input type="hidden" class="form-control" id="id_lb" name="id_lb" value="<?php echo $row->id_lb; ?>">
                                                <input type="hidden" class="form-control" id="id_capi" name="id_capi" value="<?php echo $row->id_capi; ?>">
                                                <input type="number" class="form-control" id="kas" name="kas" value="<?php echo $row->kas; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tabungan" class="col-sm-6 col-form-label">Tabungan</label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control" id="tabungan" name="tabungan" value="<?php echo $row->tabungan; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="deposito" class="col-sm-6 col-form-label">Deposito</label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control" id="deposito" name="deposito" value="<?php echo $row->deposito; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="piutang" class="col-sm-6 col-form-label">Piutang</label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control" id="piutang" name="piutang" value="<?php echo $row->piutang; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="peralatan" class="col-sm-6 col-form-label">Peralatan</label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control" id="peralatan" name="peralatan" value="<?php echo $row->peralatan; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="barang" class="col-sm-6 col-form-label">Persediaan Barang Usaha 1</label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control" id="barang" name="barang" value="<?php echo $row->barang; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="barang2" class="col-sm-6 col-form-label">Persediaan Barang Usaha 2</label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control" id="barang2" name="barang2" value="<?php echo $row->barang2; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="barang3" class="col-sm-6 col-form-label">Persediaan Barang Usaha 3</label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control" id="barang3" name="barang3" value="<?php echo $row->barang3; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="sewa" class="col-sm-6 col-form-label">Sewa Dibayar Dimuka</label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control" id="sewa" name="sewa" value="<?php echo $row->sewa; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="lahan" class="col-sm-6 col-form-label">Lahan Garap</label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control" id="lahan" name="lahan" value="<?php echo $row->lahan; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="gedung" class="col-sm-6 col-form-label">Gedung / Ruko</label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control" id="gedung" name="gedung" value="<?php echo $row->gedung; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="operasional" class="col-sm-6 col-form-label">Kendaraan Operasional</label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control" id="operasional" name="operasional" value="<?php echo $row->operasional; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-5">
                                            <label for="lain" class="col-sm-6 col-form-label">Lain-lain</label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control" id="lain" name="lain" value="<?php echo $row->lain; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <h5>Aktiva Tetap</h5>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tanah" class="col-sm-6 col-form-label">Tanah</label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control" id="tanah" name="tanah" value="<?php echo $row->tanah; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="bangunan" class="col-sm-6 col-form-label">Bangunan</label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control" id="bangunan" name="bangunan" value="<?php echo $row->bangunan; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="kendaraan" class="col-sm-6 col-form-label">Kendaraan</label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control" id="kendaraan" name="kendaraan" value="<?php echo $row->kendaraan; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inventaris" class="col-sm-6 col-form-label">Inventaris</label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control" id="inventaris" name="inventaris" value="<?php echo $row->inventaris; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-5">
                                            <label for="lain2" class="col-sm-6 col-form-label">Lain-lain</label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control" id="lain2" name="lain2" value="<?php echo $row->lain2; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <h5>Hutang</h5>
                                        </div>
                                        <div class="form-group row">
                                            <label for="hutang_jpk" class="col-sm-6 col-form-label">Hutang Jangka Pendek</label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control" id="hutang_jpk" name="hutang_jpk" value="<?php echo $row->hutang_jpk; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="hutang_jpg" class="col-sm-6 col-form-label">Hutang Jangka Panjang</label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control" id="hutang_jpg" name="hutang_jpg" value="<?php echo $row->hutang_jpg; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="hutang_lain" class="col-sm-6 col-form-label">Hutang Lain</label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control" id="hutang_lain" name="hutang_lain" value="<?php echo $row->hutang_lain; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="hutang_dagang" class="col-sm-6 col-form-label">Hutang Dagang</label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control" id="hutang_dagang" name="hutang_dagang" value="<?php echo $row->hutang_dagang; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" id="btn_capital" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="tab-pane fade" id="v-pills-cashflow" role="tabpanel" aria-labelledby="v-pills-cashflow-tab">
                            <div class="modal-body">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Pendapatan</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Pengeluaran</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                        <div class="table-responsive">
                                            <table class="table table-hover" width="100%" cellspacing="0">
                                                <thead class="thead">
                                                    <tr>
                                                        <th scope="col">No</th>
                                                        <th scope="col">Keterangan</th>
                                                        <th scope="col">Saldo</th>
                                                        <th scope="col">kode</th>
                                                        <th scope="col">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach ($cashflow->result() as $row) {
                                                        echo "<tr>
                                                                <td>" . $no . "</td>
                                                                <td>" . $row->keterangan . "</td>
                                                                <td>" . number_format($row->saldo) . "</td>                      
                                                                <td>" . $row->kode . "</td>
                                                                <td>
                                                                <a href='#' class ='btn btn-warning btn-circle' data-toggle='modal' title='Edit' data-target='#editCashflow' onClick=\"EditDataCashflow('" . $row->id_cf . "','" . $row->kode . "', '" . $row->kode_perkiraan . "', '" . $row->nama_perkiraan . "', '" . $row->keterangan . "', '" . $row->saldo . "')\"><i class='fas fa-edit'></i></a>                               
                                                                <a href='#' class='btn btn-danger btn-circle' data-toggle='modal' title='Hapus' data-target='#hapusCashflow' onClick=\"HapusDataCashflow('" . $row->kode . "')\"><i class='fas fa-trash'></i></a>
                                                                </td>							    
                                                                </tr>";
                                                        $no++;
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                        <div class="table-responsive">
                                            <table class="table table-hover" width="100%" cellspacing="0">
                                                <thead class="thead">
                                                    <tr>
                                                        <th scope="col">No</th>
                                                        <th scope="col">Keterangan</th>
                                                        <th scope="col">Saldo</th>
                                                        <th scope="col">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach ($cashflowp->result() as $row) {
                                                        echo "<tr>
                                                                <td>" . $no . "</td>
                                                                <td>" . $row->keterangan . "</td>
                                                                <td>" . number_format($row->saldo) . "</td>                      
                                                                <td>
                                                                <a href='#' class ='btn btn-warning btn-circle' data-toggle='modal' title='Edit' data-target='#editCashflowp' onClick=\"EditDataCashflowp('" . $row->id_cf . "','" . $row->kode . "', '" . $row->kode_perkiraan . "', '" . $row->nama_perkiraan . "', '" . $row->keterangan . "', '" . $row->saldo . "')\"><i class='fas fa-edit'></i></a>                               
                                                                <a href='#' class='btn btn-danger btn-circle' data-toggle='modal' title='Hapus' data-target='#hapusCashflowp' onClick=\"HapusDataCashflowp('" . $row->kode . "')\"><i class='fas fa-trash'></i></a>
                                                                </td>							
                                                                </tr>";
                                                        $no++;
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-cashflows" role="tabpanel" aria-labelledby="v-pills-cashflows-tab">
                            <div class="modal-body">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="pills-home_c-tab" data-toggle="pill" href="#pills-home_c" role="tab" aria-controls="pills-home_c" aria-selected="true">Pendapatan</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="pills-profile_c-tab" data-toggle="pill" href="#pills-profile_c" role="tab" aria-controls="pills-profile_c" aria-selected="false">Pengeluaran</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="pills-hutang-tab" data-toggle="pill" href="#pills-hutang" role="tab" aria-controls="pills-hutang" aria-selected="false">Hutang</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-home_c" role="tabpanel" aria-labelledby="pills-home_c-tab">
                                        <div class="table-responsive">
                                            <table class="table table-hover" width="100%" cellspacing="0">
                                                <thead class="thead">
                                                    <tr>
                                                        <th scope="col">No</th>
                                                        <th scope="col">Keterangan</th>
                                                        <th scope="col">Saldo</th>
                                                        <th scope="col">kode</th>
                                                        <th scope="col">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach ($cashflows->result() as $row) {
                                                        echo "<tr>
                                                                <td>" . $no . "</td>
                                                                <td>" . $row->keterangan . "</td>
                                                                <td>" . number_format($row->saldo) . "</td>                      
                                                                <td>" . $row->kode . "</td>
                                                                <td>
                                                                <a href='#' class ='btn btn-warning btn-circle' data-toggle='modal' title='Edit' data-target='#editCashflows' onClick=\"EditDataCashflows('" . $row->id_cf . "','" . $row->kode . "', '" . $row->kode_perkiraan . "', '" . $row->nama_perkiraan . "', '" . $row->keterangan . "', '" . $row->saldo . "')\"><i class='fas fa-edit'></i></a>                               
                                                                <a href='#' class='btn btn-danger btn-circle' data-toggle='modal' title='Hapus' data-target='#hapusCashflows' onClick=\"HapusDataCashflows('" . $row->kode . "')\"><i class='fas fa-trash'></i></a>
                                                                </td>							    
                                                                </tr>";
                                                        $no++;
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-profile_c" role="tabpanel" aria-labelledby="pills-profile_c-tab">
                                        <div class="table-responsive">
                                            <table class="table table-hover" width="100%" cellspacing="0">
                                                <thead class="thead">
                                                    <tr>
                                                        <th scope="col">No</th>
                                                        <th scope="col">Keterangan</th>
                                                        <th scope="col">Saldo</th>
                                                        <th scope="col">kode</th>
                                                        <th scope="col">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach ($cashflowsp->result() as $row) {
                                                        echo "<tr>
                                                                <td>" . $no . "</td>
                                                                <td>" . $row->keterangan . "</td>
                                                                <td>" . number_format($row->saldo) . "</td>                      
                                                                <td>" . $row->kode . "</td>
                                                                <td>
                                                                <a href='#' class ='btn btn-warning btn-circle' data-toggle='modal' title='Edit' data-target='#editCashflowsp' onClick=\"EditDataCashflowsp('" . $row->id_cf . "','" . $row->kode . "', '" . $row->kode_perkiraan . "', '" . $row->nama_perkiraan . "', '" . $row->keterangan . "', '" . $row->saldo . "')\"><i class='fas fa-edit'></i></a>                               
                                                                <a href='#' class='btn btn-danger btn-circle' data-toggle='modal' title='Hapus' data-target='#hapusCashflowsp' onClick=\"HapusDataCashflowsp('" . $row->kode . "')\"><i class='fas fa-trash'></i></a>
                                                                </td>							    
                                                                </tr>";
                                                        $no++;
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-hutang" role="tabpanel" aria-labelledby="pills-hutang-tab">
                                        <div class="table-responsive">
                                            <table class="table table-hover" width="100%" cellspacing="0">
                                                <thead class="thead">
                                                    <tr>
                                                        <th scope="col">No</th>
                                                        <th scope="col">Keterangan</th>
                                                        <th scope="col">Saldo</th>
                                                        <th scope="col">kode</th>
                                                        <th scope="col">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach ($hutang->result() as $row) {
                                                        echo "<tr>
                                                                <td>" . $no . "</td>
                                                                <td>" . $row->keterangan . "</td>
                                                                <td>" . number_format($row->saldo) . "</td>                      
                                                                <td>" . $row->kode . "</td>
                                                                <td>
                                                                <a href='#' class ='btn btn-warning btn-circle' data-toggle='modal' title='Edit' data-target='#editHutang' onClick=\"EditDataHutang('" . $row->id_cf . "','" . $row->kode . "', '" . $row->kode_perkiraan . "', '" . $row->nama_perkiraan . "', '" . $row->keterangan . "', '" . $row->saldo . "')\"><i class='fas fa-edit'></i></a>                               
                                                                <a href='#' class='btn btn-danger btn-circle' data-toggle='modal' title='Hapus' data-target='#hapusHutang' onClick=\"HapusDataHutang('" . $row->kode . "')\"><i class='fas fa-trash'></i></a>
                                                                </td>							    
                                                                </tr>";
                                                        $no++;
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-condition" role="tabpanel" aria-labelledby="v-pills-condition-tab">
                            <?php
                            foreach ($condition->result() as $row) {
                            ?>
                                <form method="post" action="<?php echo base_url('condition/add'); ?>">
                                    <div class="modal-body">
                                        <div class="form-group row">
                                            <label for="kekuatan" class="col-sm-2 col-form-label">Kekuatan</label>
                                            <div class="col-sm-10">
                                                <input type="hidden" class="form-control" id="id_lb" name="id_lb" value="<?php echo $row->id_lb; ?>">
                                                <input type="hidden" class="form-control" id="id_con" name="id_con" value="<?php echo $row->id_con; ?>">
                                                <textarea class="form-control" id="kekuatan" name="kekuatan"><?php echo $row->kekuatan; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="kelemahan" class="col-sm-2 col-form-label">Kelemahan</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" id="kelemahan" name="kelemahan"><?php echo $row->kelemahan; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="peluang" class="col-sm-2 col-form-label">Peluang</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" id="peluang" name="peluang"><?php echo $row->peluang; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="ancaman" class="col-sm-2 col-form-label">Ancaman</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" id="ancaman" name="ancaman"><?php echo $row->ancaman; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" id="btn_condition" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="tab-pane fade" id="v-pills-collateralt" role="tabpanel" aria-labelledby="v-pills-collateralt-tab">
                            <?php
                            foreach ($collateralt->result() as $row) {
                            ?>
                                <form method="post" action="<?php echo base_url('collateral/add2'); ?>">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-4 mb-4">
                                                <label for="jenis" class="form-label">Jenis</label>
                                                <input type="hidden" class="form-control" id="id_lb" name="id_lb" value="<?php echo $row->id_lb; ?>">
                                                <input type="hidden" class="form-control" id="id_col2" name="id_col2" value="<?php echo $row->id_col2; ?>">
                                                <input type="text" class="form-control" id="jenis" name="jenis" value="<?php echo $row->jenis; ?>">
                                            </div>
                                            <div class="col-md-4 mb-4">
                                                <label for="nama" class="form-label">Nama Pemilik</label>
                                                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row->nama; ?>">
                                            </div>
                                            <div class="col-md-4 mb-4">
                                                <label for="no_shm" class="form-label">No. SHM</label>
                                                <input type="text" class="form-control" id="no_shm" name="no_shm" value="<?php echo $row->no_shm; ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 mb-4">
                                                <label for="luas_t" class="form-label">Luas Tanah (M2)</label>
                                                <input type="text" class="form-control" id="luas_t" name="luas_t" value="<?php echo $row->luas_t; ?>">
                                            </div>
                                            <div class="col-md-4 mb-4">
                                                <label for="luas_b" class="form-label">Luas Bangunan (M2)</label>
                                                <input type="text" class="form-control" id="luas_b" name="luas_b" value="<?php echo $row->luas_b; ?>">
                                            </div>
                                            <div class="col-md-4 mb-4">
                                                <label for="harga_t" class="form-label">Harga Tanah SPPT (Rp.)</label>
                                                <input type="text" class="form-control" id="harga_t" name="harga_t" value="<?php echo $row->harga_t; ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 mb-4">
                                                <label for="harga_b" class="form-label">Harga Bangunan SPPT (Rp.)</label>
                                                <input type="text" class="form-control" id="harga_b" name="harga_b" value="<?php echo $row->harga_b; ?>">
                                            </div>
                                            <div class="col-md-4 mb-4">
                                                <label for="harga_t2" class="form-label">Harga Tanah Pasar (Rp.)</label>
                                                <input type="text" class="form-control" id="harga_t2" name="harga_t2" value="<?php echo $row->harga_t2; ?>">
                                            </div>
                                            <div class="col-md-4 mb-4">
                                                <label for="harga_b2" class="form-label">Harga Bangunan Pasar (Rp.)</label>
                                                <input type="text" class="form-control" id="harga_b2" name="harga_b2" value="<?php echo $row->harga_b2; ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 mb-4">
                                                <label for="tgl_ukur" class="form-label">Tgl Surat Ukur</label>
                                                <input type="date" class="form-control" id="tgl_ukur" name="tgl_ukur" value="<?php echo $row->tgl_ukur; ?>">
                                            </div>
                                            <div class="col-md-4 mb-4">
                                                <label for="no_ukur" class="form-label">No. Surat Ukur</label>
                                                <input type="text" class="form-control" id="no_ukur" name="no_ukur" value="<?php echo $row->no_ukur; ?>">
                                            </div>
                                            <div class="col-md-4 mb-4">
                                                <label for="milik" class="form-label">Kepemilikan</label>
                                                <input type="text" class="form-control" id="milik" name="milik" value="<?php echo $row->milik; ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 mb-4">
                                                <label for="ht" class="form-label">Nilai HT (Rp.)</label>
                                                <input type="number" class="form-control" id="ht" name="ht" value="<?php echo $row->ht; ?>">
                                            </div>
                                            <div class="col-md-4 mb-4">
                                                <label for="taksasi" class="form-label">Taksasi (%)</label>
                                                <input type="number" class="form-control" id="taksasi" name="taksasi" value="<?php echo $row->taksasi; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-4">
                                            <label for="alamat" class="form-label">Alamat Pemilik</label>
                                            <textarea class="form-control" id="alamat" name="alamat"><?php echo $row->alamat; ?></textarea>
                                        </div>
                                        <div class="col-md-12 mb-4">
                                            <label for="lokasi" class="form-label">Lokasi Jaminan</label>
                                            <textarea class="form-control" id="lokasi" name="lokasi"><?php echo $row->lokasi; ?></textarea>
                                        </div>
                                        <div class="col-md-12 mb-4">
                                            <label for="fisik_jaminan" class="form-label">Keterangan</label>
                                            <textarea class="form-control" id="fisik_jaminan" name="fisik_jaminan"><?php echo $row->fisik_jaminan; ?></textarea>
                                        </div>
                                        <div class="col-md-12 mb-4">
                                            <label for="pertimbangan" class="form-label">Pertimbangan</label>
                                            <textarea class="form-control" id="usulan" name="usulan"><?php echo $row->usulan; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" id="btn_collateralt" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="tab-pane fade" id="v-pills-collateralk" role="tabpanel" aria-labelledby="v-pills-collateralk-tab">
                            <?php
                            foreach ($collateralk->result() as $row) {
                            ?>
                                <form method="post" action="<?php echo base_url('collateral/add'); ?>">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-3 mb-4">
                                                <label for="status" class="form-label">Roda</label>
                                                <select class="form-control" aria-label="Default select example" id="roda" name="roda">
                                                    <option value="<?php echo $row->roda; ?>"><?php echo substr($row->roda, 0, 1); ?></option>
                                                    <option value="2 (Dua)">2</option>
                                                    <option value="4 (Empat)">4</option>
                                                    <option value="6 (Enam)">6</option>
                                                    <option value="8 (Delapan)">8</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3 mb-4">
                                                <label for="nopol" class="form-label">Nomor Polisi</label>
                                                <input type="hidden" class="form-control" id="id_lb" name="id_lb" value="<?php echo $row->id_lb; ?>">
                                                <input type="hidden" class="form-control" id="id_col" name="id_col" value="<?php echo $row->id_col; ?>">
                                                <input type="text" class="form-control" id="nopol" name="nopol" value="<?php echo $row->nopol; ?>">
                                            </div>
                                            <div class="col-md-3 mb-4">
                                                <label for="nama_stnk" class="form-label">Nama di STNK</label>
                                                <input type="text" class="form-control" id="nama_stnk" name="nama_stnk" value="<?php echo $row->nama_stnk; ?>">
                                            </div>
                                            <div class="col-md-3 mb-4">
                                                <label for="tahun" class="form-label">Tahun</label>
                                                <input type="year" class="form-control" id="tahun" name="tahun" value="<?php echo $row->tahun; ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 mb-4">
                                                <label for="silinder" class="form-label">Isi Silinder</label>
                                                <input type="text" class="form-control" id="silinder" name="silinder" value="<?php echo $row->silinder; ?>">
                                            </div>
                                            <div class="col-md-3 mb-4">
                                                <label for="no_rangka" class="form-label">No. Rangka</label>
                                                <input type="text" class="form-control" id="no_rangka" name="no_rangka" value="<?php echo $row->no_rangka; ?>">
                                            </div>
                                            <div class="col-md-3 mb-4">
                                                <label for="no_mesin" class="form-label">No. Mesin</label>
                                                <input type="text" class="form-control" id="no_mesin" name="no_mesin" value="<?php echo $row->no_mesin; ?>">
                                            </div>
                                            <div class="col-md-3 mb-4">
                                                <label for="no_bpkb" class="form-label">No. BPKB</label>
                                                <input type="text" class="form-control" id="no_bpkb" name="no_bpkb" value="<?php echo $row->no_bpkb; ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 mb-4">
                                                <label for="type" class="form-label">Merk / Type</label>
                                                <input type="text" class="form-control" id="type" name="type" value="<?php echo $row->type; ?>">
                                            </div>
                                            <div class="col-md-4 mb-4">
                                                <label for="jenis" class="form-label">Jenis / Model</label>
                                                <input type="text" class="form-control" id="jenis" name="jenis" value="<?php echo $row->jenis; ?>">
                                            </div>
                                            <div class="col-md-4 mb-4">
                                                <label for="warna" class="form-label">Warna</label>
                                                <input type="text" class="form-control" id="warna" name="warna" value="<?php echo $row->warna; ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 mb-4">
                                                <label for="taksiran" class="form-label">Harga Pasaran</label>
                                                <input type="number" class="form-control" id="taksiran" name="taksiran" value="<?php echo $row->taksiran; ?>">
                                            </div>
                                            <div class="col-md-4 mb-4">
                                                <label for="nl" class="form-label">NL</label>
                                                <input type="number" class="form-control" id="nl" name="nl" value="<?php echo $row->nl; ?>">
                                            </div>
                                            <div class="col-md-4 mb-4">
                                                <label for="milik" class="form-label">Kepemilikan</label>
                                                <input type="text" class="form-control" id="milik" name="milik" value="<?php echo $row->milik; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-4">
                                            <label for="alamat" class="form-label">Alamat</label>
                                            <textarea class="form-control" id="alamat" name="alamat"><?php echo $row->alamat; ?></textarea>
                                        </div>
                                        <div class="col-md-12 mb-4">
                                            <label for="kondisi" class="form-label">Usulan</label>
                                            <textarea class="form-control" id="usulan" name="usulan"><?php echo $row->usulan; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" id="btn_collateralk" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="tab-pane fade" id="v-pills-usulan" role="tabpanel" aria-labelledby="v-pills-usulan-tab">
                            <?php
                            foreach ($usulan->result() as $row) {
                            ?>
                                <form method="post" action="<?php echo base_url('usulan/add'); ?>">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-3 mb-4">
                                                <label for="character" class="form-label">Character</label>
                                                <input type="hidden" class="form-control" id="id_lb" name="id_lb" value="<?php echo $row->id_lb; ?>">
                                                <input type="hidden" class="form-control" id="id_usulan" name="id_usulan" value="<?php echo $row->id_usulan; ?>">
                                                <input type="text" class="form-control" id="character" name="character" value="<?php echo $row->character; ?>">
                                            </div>
                                            <div class="col-md-3 mb-4">
                                                <label for="capacity" class="form-label">Capacity</label>
                                                <input type="text" class="form-control" id="capacity" name="capacity" value="<?php echo $row->capacity; ?>">
                                            </div>
                                            <div class="col-md-3 mb-4">
                                                <label for="capital" class="form-label">Capital</label>
                                                <input type="text" class="form-control" id="capital" name="capital" value="<?php echo $row->capital; ?>">
                                            </div>
                                            <div class="col-md-3 mb-4">
                                                <label for="coe" class="form-label">Condition of Economy</label>
                                                <input type="text" class="form-control" id="coe" name="coe" value="<?php echo $row->coe; ?>">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-3 mb-4">
                                                <label for="collateral" class="form-label">Collateral</label>
                                                <input type="text" class="form-control" id="collateral" name="collateral" value="<?php echo $row->collateral; ?>">
                                            </div>
                                            <div class="col-md-4 mb-4">
                                                <label for="realisasi" class="form-label">Tanggal Ralisasi</label>
                                                <input type="date" class="form-control" id="realisasi" name="realisasi" value="<?php echo $row->realisasi; ?>">
                                            </div>
                                            <div class="col-md-4 mb-4">
                                                <label for="notaris" class="form-label">Notaris</label>
                                                <select class="custom-select" id="notaris" name="notaris" onchange="autofill()">
                                                    <option value="<?php echo $row->notaris; ?>">-- Pilih Notaris --</option>
                                                    <?php
                                                    foreach ($select->result() as $row) {
                                                        echo "<option name='notaris' value='$row->notaris'>$row->notaris</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" id="btn_usulan" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>


<!-- Modal edit riwayat pinjaman-->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Riwayat Pinjaman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?php echo base_url('kredit/add_rw'); ?>">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="plafond" class="form-label">Plafond (Rp.)</label>
                            <input type="text" class="form-control" id="plafond" name="plafond">
                            <input type="hidden" class="form-control" id="id_rp" name="id_rp">
                            <input type="hidden" class="form-control" id="id_lb" name="id_lb" value="<?php echo $id_lb; ?>">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-control" aria-label="Default select example" id="status" name="status">
                                <option value=""></option>
                                <option value="Lunas">Lunas</option>
                                <option value="Belum Lunas">Belum Lunas</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="saldo" class="form-label">Saldo (Rp.)</label>
                            <input type="text" class="form-control" id="saldo" name="saldo">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="sejarah" class="form-label">Sejarah</label>
                            <select class="form-control" aria-label="Default select example" id="sejarah" name="sejarah">
                                <option value=""></option>
                                <option value="Baik">Baik</option>
                                <option value="Tidak Baik">Tidak Baik</option>
                            </select>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="data" class="form-label">Data</label>
                            <select class="form-control" aria-label="Default select example" id="data" name="data">
                                <option value=""></option>
                                <option value="Terlampir">Terlampir</option>
                                <option value="Tidak Terlampir">Tidak Terlampir</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btn_rp" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- /.modal hapus riwayat pinjaman -->
<div id="hapus" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="custom-width-modalLabel">Konfirmasi Hapus</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="<?php echo base_url() . 'kredit/hapus2'; ?>" method="post" class="form-horizontal" role="form">
                <div class="modal-body">
                    <p>Apakah anda yakin ingin menghapus?</p>
                    <div>
                        <input type="hidden" id="idt2" name="idt2">
                        <input type="hidden" id="id_lb" name="id_lb" value="<?php echo $id_lb; ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-success waves-effect waves-light">Ya</button>
                </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<!-- Modal edit cashflow awal,pendapatan-->
<div class="modal fade" id="editCashflow" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cashflow</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?php echo base_url('test/editca'); ?>">
                <div class="modal-body">
                    <div class="col-md-8 mb-4">
                        <label for="dari" class="form-label">Pendapatan dari</label>
                        <select class="form-control" aria-label="Default select example" id="kode_perkiraan" name="kode_perkiraan" onchange="return nama_p();">
                            <option value=""></option>
                            <option value="4.1.1">Pendapatan Usaha 1</option>
                            <option value="4.1.2">Pendapatan Usaha 2</option>
                            <option value="4.1.3">Pendapatan Usaha 3</option>
                            <option value="4.1.4">Pendapatan Lain / Gaji</option>
                        </select>
                    </div>
                    <div class="col-md-8 mb-4">
                        <label for="nopol" class="form-label">Untuk</label>
                        <select class="form-control" aria-label="Default select example" id="kode_perkiraan2" name="kode_perkiraan2" onchange="return nama_p2();">
                            <option value=""></option>
                            <option value="1.1.1">Kas</option>
                            <option value="1.1.2">Tabungan</option>
                            <option value="1.1.3">Deposito</option>
                            <option value="1.1.4">Piutang</option>
                            <option value="1.1.5">Peralatan</option>
                            <option value="1.1.6">Persediaan Barang Usaha 1</option>
                            <option value="1.1.12">Persediaan Barang Usaha 2</option>
                            <option value="1.1.13">Persediaan Barang Usaha 3</option>
                            <option value="1.1.7">Sewa Dibayar Dimuka</option>
                            <option value="1.1.8">Lahan Garap</option>
                            <option value="1.1.9">Gedung / Ruko</option>
                            <option value="1.1.10">Kendaraan Operasional</option>
                            <option value="1.1.11">Lain - Lain</option>
                        </select>
                    </div>
                    <div class="col-md-12 mb-4">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan">
                        <input type="hidden" class="form-control" id="id_cf" name="id_cf">
                        <input type="hidden" class="form-control" id="id_lb" name="id_lb" value="<?php echo $id_lb; ?>">
                        <input type="hidden" class="form-control" id="nama_perkiraan" name="nama_perkiraan">
                        <input type="hidden" class="form-control" id="nama_perkiraan2" name="nama_perkiraan2">
                        <input type="hidden" class="form-control" id="jenis" name="jenis" value="pendapatan">
                    </div>
                    <div class="col-md-8 mb-4">
                        <label for="nama_stnk" class="form-label">Sebesar</label>
                        <input type="text" class="form-control" id="saldoq" name="saldoq">
                        <input type="hidden" class="form-control" id="kode" name="kode">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- /.modal hapus cashflow awal,pendapatan -->
<div id="hapusCashflow" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="custom-width-modalLabel">Konfirmasi Hapus</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="<?php echo base_url() . 'test/hapusCashflowPendapatan'; ?>" method="post" class="form-horizontal" role="form">
                <div class="modal-body">
                    <p>Apakah anda yakin ingin menghapus?</p>
                    <div>
                        <input type="hidden" id="idHapusCashflowPendapatan" name="idHapusCashflowPendapatan">
                        <input type="hidden" id="id_lb" name="id_lb" value="<?php echo $id_lb; ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-success waves-effect waves-light">Ya</button>
                </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<!-- Modal edit cashflow awal, pengeluaran-->
<div class="modal fade" id="editCashflowp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cashflow</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?php echo base_url('test/editcap'); ?>">
                <div class="modal-body">
                    <div class="col-md-8 mb-4">
                        <label for="dari" class="form-label">Menggunakan uang dari</label>
                        <select class="form-control" aria-label="Default select example" id="kode_perkiraanp" name="kode_perkiraanp" onchange="return perkiraan();">
                            <option value=""></option>
                            <option value="1.1.1">Kas</option>
                            <option value="1.1.2">Tabungan</option>
                            <option value="1.1.3">Deposito</option>
                            <option value="1.1.4">Piutang</option>
                            <option value="1.1.5">Peralatan</option>
                            <option value="1.1.6">Persediaan Barang Usaha 1</option>
                            <option value="1.1.12">Persediaan Barang Usaha 2</option>
                            <option value="1.1.13">Persediaan Barang Usaha 3</option>
                            <option value="1.1.7">Sewa Dibayar Dimuka</option>
                            <option value="1.1.8">Lahan Garap</option>
                            <option value="1.1.9">Gedung / Ruko</option>
                            <option value="1.1.10">Kendaraan Operasional</option>
                            <option value="1.1.11">Lain - Lain</option>
                        </select>
                    </div>
                    <div class="col-md-8 mb-4">
                        <label for="nopol" class="form-label">Untuk</label>
                        <select class="form-control" aria-label="Default select example" id="kode_perkiraanp2" name="kode_perkiraanp2" onchange="return perkiraan2();">
                            <option value=""></option>
                            <?php
                            foreach ($perkiraan->result() as $row) {
                                echo "<option value='$row->kode_perkiraan'>$row->nama_perkiraan</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-12 mb-4">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <input type="text" class="form-control" id="keteranganp" name="keteranganp">
                        <input type="hidden" class="form-control" id="id_cfp" name="id_cfp">
                        <input type="hidden" class="form-control" id="id_lbp" name="id_lbp" value="<?php echo $id_lb; ?>">
                        <input type="hidden" class="form-control" id="nama_perkiraanp" name="nama_perkiraanp">
                        <input type="hidden" class="form-control" id="nama_perkiraanp2" name="nama_perkiraanp2">
                        <input type="hidden" class="form-control" id="kodep" name="kodep">
                        <input type="hidden" class="form-control" id="jenisp" name="jenisp" value="pengeluaran">
                    </div>
                    <div class="col-md-8 mb-4">
                        <label class="form-label">Sebesar</label>
                        <input type="number" class="form-control" id="saldop" name="saldop">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="simpanp" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- /.modal hapus cashflow awal,pendapatan -->
<div id="hapusCashflowp" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="custom-width-modalLabel">Konfirmasi Hapus</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="<?php echo base_url() . 'test/hapusCashflowPengeluaran'; ?>" method="post" class="form-horizontal" role="form">
                <div class="modal-body">
                    <p>Apakah anda yakin ingin menghapus?</p>
                    <div>
                        <input type="hidden" id="idHapusCashflowPengeluaran" name="idHapusCashflowPengeluaran">
                        <input type="hidden" id="id_lb" name="id_lb" value="<?php echo $id_lb; ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-success waves-effect waves-light">Ya</button>
                </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<!-- Modal edit cashflow setelah, pendapatan-->
<div class="modal fade" id="editCashflows" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cashflow</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?php echo base_url('cashflow/edit'); ?>">
                <div class="modal-body">
                    <div class="col-md-8 mb-4">
                        <label for="dari" class="form-label">Pendapatan dari</label>
                        <select class="form-control" aria-label="Default select example" id="kode_perkiraan_cp" name="kode_perkiraan_cp" onchange="return c_pendapatan();">
                            <option value=""></option>
                            <option value="4.1.1">Pendapatan Usaha 1</option>
                            <option value="4.1.2">Pendapatan Usaha 2</option>
                            <option value="4.1.3">Pendapatan Usaha 3</option>
                            <option value="4.1.4">Pendapatan Lain / Gaji</option>
                        </select>
                    </div>
                    <div class="col-md-8 mb-4">
                        <label for="nopol" class="form-label">Untuk</label>
                        <select class="form-control" aria-label="Default select example" id="kode_perkiraan_cp2" name="kode_perkiraan_cp2" onchange="return c_pendapatan2();">
                            <option value=""></option>
                            <option value="1.1.1">Kas</option>
                            <option value="1.1.2">Tabungan</option>
                            <option value="1.1.3">Deposito</option>
                            <option value="1.1.4">Piutang</option>
                            <option value="1.1.5">Peralatan</option>
                            <option value="1.1.6">Persediaan Barang Usaha 1</option>
                            <option value="1.1.12">Persediaan Barang Usaha 2</option>
                            <option value="1.1.13">Persediaan Barang Usaha 3</option>
                            <option value="1.1.7">Sewa Dibayar Dimuka</option>
                            <option value="1.1.8">Lahan Garap</option>
                            <option value="1.1.9">Gedung / Ruko</option>
                            <option value="1.1.10">Kendaraan Operasional</option>
                            <option value="1.1.11">Lain - Lain</option>
                        </select>
                    </div>
                    <div class="col-md-12 mb-4">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <input type="text" class="form-control" id="keterangancp" name="keterangancp">
                        <input type="hidden" class="form-control" id="id_cfcp" name="id_cfcp">
                        <input type="hidden" class="form-control" id="id_lbcp" name="id_lbcp" value="<?php echo $id_lb; ?>">
                        <input type="hidden" class="form-control" id="nama_perkiraan_cp" name="nama_perkiraan_cp">
                        <input type="hidden" class="form-control" id="nama_perkiraan_cp2" name="nama_perkiraan_cp2">
                        <input type="hidden" class="form-control" id="jeniscp" name="jeniscp" value="pendapatan">
                        <input type="hidden" class="form-control" id="kodecp" name="kodecp">
                    </div>
                    <div class="col-md-8 mb-4">
                        <label for="saldo" class="form-label">Sebesar</label>
                        <input type="number" class="form-control" id="saldocp" name="saldocp">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="simpan2" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- /.modal hapus cashflow setelah,pendapatan -->
<div id="hapusCashflows" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="custom-width-modalLabel">Konfirmasi Hapus</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="<?php echo base_url() . 'cashflow/hapusCashflowsPendapatan'; ?>" method="post" class="form-horizontal" role="form">
                <div class="modal-body">
                    <p>Apakah anda yakin ingin menghapus?</p>
                    <div>
                        <input type="hidden" id="idHapusCashflowsPendapatan" name="idHapusCashflowsPendapatan">
                        <input type="hidden" id="id_lb" name="id_lb" value="<?php echo $id_lb; ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-success waves-effect waves-light">Ya</button>
                </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<!-- Modal edit cashflows setelah, pengeluaran-->
<div class="modal fade" id="editCashflowsp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cashflow</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?php echo base_url('cashflow/editp'); ?>">
                <div class="modal-body">
                    <div class="col-md-8 mb-4">
                        <label for="dari" class="form-label">Menggunakan uang dari</label>
                        <select class="form-control" aria-label="Default select example" id="kode_perkiraan_cpe" name="kode_perkiraan_cpe" onchange="return c_pengeluaran();">
                            <option value=""></option>
                            <option value="1.1.1">Kas</option>
                            <option value="1.1.2">Tabungan</option>
                            <option value="1.1.3">Deposito</option>
                            <option value="1.1.4">Piutang</option>
                            <option value="1.1.5">Peralatan</option>
                            <option value="1.1.6">Persediaan Barang Usaha 1</option>
                            <option value="1.1.12">Persediaan Barang Usaha 2</option>
                            <option value="1.1.13">Persediaan Barang Usaha 3</option>
                            <option value="1.1.7">Sewa Dibayar Dimuka</option>
                            <option value="1.1.8">Lahan Garap</option>
                            <option value="1.1.9">Gedung / Ruko</option>
                            <option value="1.1.10">Kendaraan Operasional</option>
                            <option value="1.1.11">Lain - Lain</option>
                        </select>
                    </div>
                    <div class="col-md-8 mb-4">
                        <label for="nopol" class="form-label">Untuk</label>
                        <select class="form-control" aria-label="Default select example" id="kode_perkiraan_cpe2" name="kode_perkiraan_cpe2" onchange="return c_pengeluaran2();">
                            <option value=""></option>
                            <?php
                            foreach ($perkiraan->result() as $row) {
                                echo "<option value='$row->kode_perkiraan'>$row->nama_perkiraan</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-12 mb-4">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <input type="text" class="form-control" id="keterangancpe" name="keterangancpe">
                        <input type="hidden" class="form-control" id="id_cfcpe" name="id_cfcpe">
                        <input type="hidden" class="form-control" id="id_lbcpe" name="id_lbcpe" value="<?php echo $id_lb; ?>">
                        <input type="hidden" class="form-control" id="nama_perkiraan_cpe" name="nama_perkiraan_cpe">
                        <input type="hidden" class="form-control" id="nama_perkiraan_cpe2" name="nama_perkiraan_cpe2">
                        <input type="hidden" class="form-control" id="jeniscpe" name="jeniscpe" value="pengeluaran">
                        <input type="hidden" class="form-control" id="kodecpe" name="kodecpe">
                    </div>
                    <div class="col-md-8 mb-4">
                        <label for="nama_stnk" class="form-label">Sebesar</label>
                        <input type="number" class="form-control" id="saldocpe" name="saldocpe">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="simpanp2" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- /.modal hapus cashflow setelah,pendapatan -->
<div id="hapusCashflowsp" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="custom-width-modalLabel">Konfirmasi Hapus</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="<?php echo base_url() . 'cashflow/hapusCashflowsPengeluaran'; ?>" method="post" class="form-horizontal" role="form">
                <div class="modal-body">
                    <p>Apakah anda yakin ingin menghapus?</p>
                    <div>
                        <input type="hidden" id="idHapusCashflowsPengeluaran" name="idHapusCashflowsPengeluaran">
                        <input type="hidden" id="id_lb" name="id_lb" value="<?php echo $id_lb; ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-success waves-effect waves-light">Ya</button>
                </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<!-- Modal edit hutang-->
<div class="modal fade" id="editHutang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cashflow</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?php echo base_url('test/edith'); ?>">
                <div class="modal-body">
                    <div class="col-md-8 mb-4">
                        <label for="dari" class="form-label">Akun asal</label>
                        <select class="form-control" aria-label="Default select example" id="kode_perkiraan_hutang" name="kode_perkiraan_hutang" onchange="return hutangp();">
                            <option value=""></option>
                            <option value="2.1.1">Hutang Jangka Pendek</option>
                            <option value="2.1.2">Hutang Jangka Panjang</option>
                            <option value="2.1.3">Hutang Dagang</option>
                            <option value="2.1.4">Hutang Lain</option>
                        </select>
                    </div>
                    <div class="col-md-8 mb-4">
                        <label for="nopol" class="form-label">Akun untuk</label>
                        <select class="form-control" aria-label="Default select example" id="kode_perkiraan_hutang2" name="kode_perkiraan_hutang2" onchange="return hutangp2();">
                            <option value=""></option>
                            <option value="1.1.1">Kas</option>
                            <option value="1.1.2">Tabungan</option>
                            <option value="1.1.3">Deposito</option>
                            <option value="1.1.4">Piutang</option>
                            <option value="1.1.5">Peralatan</option>
                            <option value="1.1.6">Persediaan Barang Usaha 1</option>
                            <option value="1.1.12">Persediaan Barang Usaha 2</option>
                            <option value="1.1.13">Persediaan Barang Usaha 3</option>
                            <option value="1.1.7">Sewa Dibayar Dimuka</option>
                            <option value="1.1.8">Lahan Garap</option>
                            <option value="1.1.9">Gedung / Ruko</option>
                            <option value="1.1.10">Kendaraan Operasional</option>
                            <option value="1.1.11">Lain - Lain</option>
                            <option value="1.2.1">Tanah</option>
                            <option value="1.2.2">Bangunan</option>
                            <option value="1.2.3">Kendaraan Pribadi</option>
                            <option value="1.2.4">Inventaris</option>
                            <option value="1.2.5">Lain - lain</option>
                            <option value="2.1.1">Hutang Jangka Pendek</option>
                            <option value="2.1.2">Hutang Jangka Panjang</option>
                            <option value="2.1.3">Hutang Dagang</option>
                            <option value="2.1.4">Hutang Lain</option>
                        </select>
                    </div>
                    <div class="col-md-12 mb-4">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <input type="text" class="form-control" id="keteranganh" name="keteranganh">
                        <input type="hidden" class="form-control" id="id_cfh" name="id_cfh">
                        <input type="hidden" class="form-control" id="kodeh" name="kodeh">
                        <input type="hidden" class="form-control" id="id_lbh" name="id_lbh" value="<?php echo $id_lb; ?>">
                        <input type="text" class="form-control" id="nama_perkiraan_hutang" name="nama_perkiraan_hutang">
                        <input type="hidden" class="form-control" id="nama_perkiraan_hutang2" name="nama_perkiraan_hutang2">
                        <input type="hidden" class="form-control" id="jenish" name="jenish" value="hutang">
                    </div>
                    <div class="col-md-8 mb-4">
                        <label class="form-label">Sebesar</label>
                        <input type="number" class="form-control" id="saldoh" name="saldoh">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btn_hutang" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- /.modal hapus cashflow setelah,pendapatan -->
<div id="hapusHutang" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="custom-width-modalLabel">Konfirmasi Hapus</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="<?php echo base_url() . 'test/hapusHutang'; ?>" method="post" class="form-horizontal" role="form">
                <div class="modal-body">
                    <p>Apakah anda yakin ingin menghapus?</p>
                    <div>
                        <input type="hidden" id="idHapusHutang" name="idHapusHutang">
                        <input type="hidden" id="id_lb" name="id_lb" value="<?php echo $id_lb; ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-success waves-effect waves-light">Ya</button>
                </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>


<!-- data untuk riwayat pinjaman -->
<script type="text/javascript">
    function EditData(id_rp, plafond, status, saldo, sejarah, data) {
        document.getElementById('id_rp').value = id_rp;
        document.getElementById('plafond').value = plafond;
        document.getElementById('status').value = status;
        document.getElementById('saldo').value = saldo;
        document.getElementById('sejarah').value = sejarah;
        document.getElementById('data').value = data
    }

    function HapusData(idt) {
        document.getElementById('idt2').value = idt;
    }
</script>

<!-- untuk menampilkan data edit cashflow-->
<script type="text/javascript">
    //menampilkan data edit ke modal cashflow awal, pendapatan
    function EditDataCashflow(id_cf, kode, kode_perkiraan, nama_perkiraan, keterangan, saldo) {

        document.getElementById('id_cf').value = '';
        document.getElementById('kode').value = kode;
        document.getElementById('kode_perkiraan').value = kode_perkiraan;
        document.getElementById('nama_perkiraan').value = nama_perkiraan;
        document.getElementById('keterangan').value = keterangan;
        document.getElementById('saldoq').value = saldo
    }

    //hapus data cashflow awal, pendapatan
    function HapusDataCashflow(kode) {
        document.getElementById('idHapusCashflowPendapatan').value = kode;
    }

    //menampilkan data edit ke modal cashflow awal, pengeluaran
    function EditDataCashflowp(id_cf, kode, kode_perkiraan, nama_perkiraan, keterangan, saldo) {

        document.getElementById('id_cfp').value = '';
        document.getElementById('kodep').value = kode;
        document.getElementById('kode_perkiraanp2').value = kode_perkiraan;
        document.getElementById('nama_perkiraanp2').value = nama_perkiraan;
        document.getElementById('keteranganp').value = keterangan;
        document.getElementById('saldop').value = saldo
    }
    
    //hapus data cashflow awal, pengeluaran
    function HapusDataCashflowp(kode) {
        document.getElementById('idHapusCashflowPengeluaran').value = kode;
    }

    //menampilkan data edit ke modal cashflow setelah, pendapatan
    function EditDataCashflows(id_cf, kode, kode_perkiraan, nama_perkiraan, keterangan, saldo) {

        document.getElementById('id_cfcp').value = '';
        document.getElementById('kodecp').value = kode;
        document.getElementById('kode_perkiraan_cp').value = kode_perkiraan;
        document.getElementById('nama_perkiraan_cp').value = nama_perkiraan;
        document.getElementById('keterangancp').value = keterangan;
        document.getElementById('saldocp').value = saldo
    }
        
    //hapus data cashflow setelah, pendapatan
    function HapusDataCashflows(kode) {
        document.getElementById('idHapusCashflowsPendapatan').value = kode;
    }

    //menampilkan data edit ke modal cashflow awal, pengeluaran
    function EditDataCashflowsp(id_cf, kode, kode_perkiraan, nama_perkiraan, keterangan, saldo) {

        document.getElementById('id_cfcpe').value = '';
        document.getElementById('kodecpe').value = kode;
        document.getElementById('kode_perkiraan_cpe2').value = kode_perkiraan;
        document.getElementById('nama_perkiraan_cpe2').value = nama_perkiraan;
        document.getElementById('keterangancpe').value = keterangan;
        document.getElementById('saldocpe').value = saldo
    }
            
    //hapus data cashflow setelah, pendapatan
    function HapusDataCashflowsp(kode) {
        document.getElementById('idHapusCashflowsPengeluaran').value = kode;
    }

    //menampilkan data edit ke modal hutang
    function EditDataHutang(id_cf, kode, kode_perkiraan, nama_perkiraan, keterangan, saldo) {

        document.getElementById('id_cfh').value = '';
        document.getElementById('kodeh').value = kode;
        document.getElementById('kode_perkiraan_hutang2').value = kode_perkiraan;
        document.getElementById('nama_perkiraan_hutang2').value = nama_perkiraan;
        document.getElementById('keteranganh').value = keterangan;
        document.getElementById('saldoh').value = saldo
    }
                
    //hapus data cashflow setelah, pendapatan
    function HapusDataHutang(kode) {
        document.getElementById('idHapusHutang').value = kode;
    }
</script>

<script>
    //cashflow awal, pendapatan
    function nama_p() {
        var kode_perkiraan = document.getElementById('kode_perkiraan').value;
        $.ajax({
            url: "<?php echo base_url(); ?>test/cari",
            data: '&kode_perkiraan=' + kode_perkiraan,
            success: function(data) {
                var hasil = JSON.parse(data);

                $.each(hasil, function(key, val) {

                    document.getElementById('kode_perkiraan').value = val.kode_perkiraan;
                    document.getElementById('nama_perkiraan').value = val.nama_perkiraan;

                });
            }
        });

    }

    function nama_p2() {
        var kode_perkiraan2 = document.getElementById('kode_perkiraan2').value;
        $.ajax({
            url: "<?php echo base_url(); ?>test/cari",
            data: '&kode_perkiraan=' + kode_perkiraan2,
            success: function(data) {
                var hasil = JSON.parse(data);

                $.each(hasil, function(key, val) {

                    document.getElementById('kode_perkiraan2').value = val.kode_perkiraan;
                    document.getElementById('nama_perkiraan2').value = val.nama_perkiraan;

                });
            }
        });

    }

    //cashflow awal, pengeluaran
    function perkiraan() {
        var kode_perkiraanp = document.getElementById('kode_perkiraanp').value;
        $.ajax({
            url: "<?php echo base_url(); ?>test/cari",
            data: '&kode_perkiraan=' + kode_perkiraanp,
            success: function(data) {
                var hasil = JSON.parse(data);

                $.each(hasil, function(key, val) {

                    document.getElementById('kode_perkiraanp').value = val.kode_perkiraan;
                    document.getElementById('nama_perkiraanp').value = val.nama_perkiraan;

                });
            }
        });

    }

    function perkiraan2() {
        var kode_perkiraanp2 = document.getElementById('kode_perkiraanp2').value;
        $.ajax({
            url: "<?php echo base_url(); ?>test/cari",
            data: '&kode_perkiraan=' + kode_perkiraanp2,
            success: function(data) {
                var hasil = JSON.parse(data);

                $.each(hasil, function(key, val) {

                    document.getElementById('kode_perkiraanp2').value = val.kode_perkiraan;
                    document.getElementById('nama_perkiraanp2').value = val.nama_perkiraan;

                });
            }
        });

    }

    //cashflow setelah, pendapatan 
    function c_pendapatan() {
        var kode_perkiraan = document.getElementById('kode_perkiraan_cp').value;
        $.ajax({
            url: "<?php echo base_url(); ?>test/cari",
            data: '&kode_perkiraan=' + kode_perkiraan,
            success: function(data) {
                var hasil = JSON.parse(data);

                $.each(hasil, function(key, val) {

                    document.getElementById('kode_perkiraan_cp').value = val.kode_perkiraan;
                    document.getElementById('nama_perkiraan_cp').value = val.nama_perkiraan;

                });
            }
        });

    }

    function c_pendapatan2() {
        var kode_perkiraan2 = document.getElementById('kode_perkiraan_cp2').value;
        $.ajax({
            url: "<?php echo base_url(); ?>test/cari",
            data: '&kode_perkiraan=' + kode_perkiraan2,
            success: function(data) {
                var hasil = JSON.parse(data);

                $.each(hasil, function(key, val) {

                    document.getElementById('kode_perkiraan_cp2').value = val.kode_perkiraan;
                    document.getElementById('nama_perkiraan_cp2').value = val.nama_perkiraan;

                });
            }
        });

    }

    //cashflow setelah, pengeluaran 
    function c_pengeluaran() {
        var kode_perkiraan = document.getElementById('kode_perkiraan_cpe').value;
        $.ajax({
            url: "<?php echo base_url(); ?>test/cari",
            data: '&kode_perkiraan=' + kode_perkiraan,
            success: function(data) {
                var hasil = JSON.parse(data);

                $.each(hasil, function(key, val) {

                    document.getElementById('kode_perkiraan_cpe').value = val.kode_perkiraan;
                    document.getElementById('nama_perkiraan_cpe').value = val.nama_perkiraan;

                });
            }
        });

    }

    function c_pengeluaran2() {
        var kode_perkiraan2 = document.getElementById('kode_perkiraan_cpe2').value;
        $.ajax({
            url: "<?php echo base_url(); ?>test/cari",
            data: '&kode_perkiraan=' + kode_perkiraan2,
            success: function(data) {
                var hasil = JSON.parse(data);

                $.each(hasil, function(key, val) {

                    document.getElementById('kode_perkiraan_cpe2').value = val.kode_perkiraan;
                    document.getElementById('nama_perkiraan_cpe2').value = val.nama_perkiraan;

                });
            }
        });

    }

    //cashflow hutang
    function hutangp() {
        var kode_perkiraan = document.getElementById('kode_perkiraan_hutang').value;
        $.ajax({
            url: "<?php echo base_url(); ?>test/cari",
            data: '&kode_perkiraan=' + kode_perkiraan,
            success: function(data) {
                var hasil = JSON.parse(data);

                $.each(hasil, function(key, val) {

                    document.getElementById('kode_perkiraan_hutang').value = val.kode_perkiraan;
                    document.getElementById('nama_perkiraan_hutang').value = val.nama_perkiraan;

                });
            }
        });

    }

    function hutangp2() {
        var kode_perkiraan2 = document.getElementById('kode_perkiraan_hutang2').value;
        $.ajax({
            url: "<?php echo base_url(); ?>test/cari",
            data: '&kode_perkiraan=' + kode_perkiraan2,
            success: function(data) {
                var hasil = JSON.parse(data);

                $.each(hasil, function(key, val) {

                    document.getElementById('kode_perkiraan_hutang2').value = val.kode_perkiraan;
                    document.getElementById('nama_perkiraan_hutang2').value = val.nama_perkiraan;

                });
            }
        });

    }
</script>

<script>
    function autofill() {
        var notaris = document.getElementById('notaris').value;
        $.ajax({
            url: "<?php echo base_url(); ?>usulan/cari",
            data: '&notaris=' + notaris,
            success: function(data) {
                var hasil = JSON.parse(data);

                $.each(hasil, function(key, val) {

                    document.getElementById('notaris').value = val.notaris;
                    document.getElementById('provisi').value = val.provisi;
                    document.getElementById('administrasi').value = val.administrasi;
                    document.getElementById('asuransi').value = val.asuransi;
                    document.getElementById('materai').value = val.materai;
                    document.getElementById('apht').value = val.apht;
                    document.getElementById('skmht').value = val.skmht;
                    document.getElementById('titipan').value = val.titipan;
                    document.getElementById('fiduciare').value = val.fiduciare;
                    document.getElementById('legalisasi').value = val.legalisasi;
                    document.getElementById('lain').value = val.lain;
                    document.getElementById('roya').value = val.roya;
                    document.getElementById('proses').value = val.proses;
                    document.getElementById('sertifikat').value = val.sertifikat;
                    document.getElementById('akta').value = val.akta;
                    document.getElementById('pendaftaran').value = val.pendaftaran;
                    document.getElementById('plotting').value = val.plotting;

                });
            }
        });

    }
</script>

<script src="<?php echo base_url(); ?>assets/ajax.js"></script>
<script src="<?php echo base_url(); ?>assets/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>assets/jquery.min.js"></script>