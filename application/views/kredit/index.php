<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <hr>

    <form method="post" action="<?php echo base_url('kredit/add'); ?>" class="row g-3">
        <div class="col-md-3 mb-3">
            <label for="cif_bank" class="form-label">CIF Bank</label>
            <input type="hidden" id="id_lb" name="id_lb">
            <input type="number" class="form-control" id="cif_bank" name="cif_bank">
        </div>
        <div class="col-md-3 mb-3">
            <label for="tgl_permohonan" class="form-label">Tgl Permohonan</label>
            <input type="date" class="form-control" id="tgl_permohonan" name="tgl_permohonan">
        </div>
        <div class="col-3 mb-5">
            <label for="tgl_analisa" class="form-label">Tgl Analisa</label>
            <input type="date" class="form-control" id="tgl_analisa" name="tgl_analisa">
        </div>
        <div class="col-md-12 mb-2">
            <h4>1. Data Permohonan</h4>
            <hr>
        </div>
        <div class="col-4 mb-3">
            <label for="plafon" class="form-label">Plafond yang dimohon</label>
            <input type="text" class="form-control" id="plafon" value="Rp. " name="plafon">
        </div>
        <div class="col-md-2 mb-3">
            <label for="jangka_waktu" class="form-label">Jangka Waktu</label>
            <input type="text" class="form-control" id="jangka_waktu" value=" Bulan" name="jangka_waktu">
        </div>
        <div class="col-md-3 mb-3">
            <label for="sifat_kredit" class="form-label">Sifat Kredit</label>
            <input type="text" class="form-control" id="sifat_kredit" name="sifat_kredit">
        </div>
        <div class="col-md-2 mb-3">
            <label for="suku_bunga" class="form-label">Suku Bunga</label>
            <input type="text" class="form-control" id="suku_bunga" name="suku_bunga" value=" % Pertahun">
        </div>
        <div class="col-md-2 mb-3">
            <label for="jenis_permohonan" class="form-label">Jenis Permohonan</label>
            <input type="text" class="form-control" id="jenis_permohonan" name="jenis_permohonan">
        </div>
        <div class="col-md-2 mb-3">
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
        <div class="col-4 mb-3">
            <label for="nama_debitur" class="form-label">Nama Debitur</label>
            <input type="text" class="form-control" id="nama_debitur" name="nama_debitur">
        </div>
        <div class="col-md-2 mb-3">
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
        <div class="col-md-2 mb-3">
            <label for="hp_nasabah" class="form-label">No. Tlp</label>
            <input type="text" class="form-control" id="hp_nasabah" name="hp_nasabah">
        </div>
        <div class="col-md-3 mb-3">
            <label for="status_tt" class="form-label">Status Tempat Tinggal</label>
            <input type="text" class="form-control" id="status_tt" name="status_tt">
        </div>
        <div class="col-md-2 mb-3">
            <label for="pekerjaan_nasabah" class="form-label">Pekerjaan</label>
            <input type="text" class="form-control" id="pekerjaan_nasabah" name="pekerjaan_nasabah">
        </div>
        <div class="col-md-12 mb-4">
            <label for="alamat_ktp_nasabah" class="form-label">Alamat Sesuai KTP</label>
            <textarea class="form-control" id="alamat_ktp_nasabah" name="alamat_ktp_nasabah"></textarea>
        </div>
        <div class="col-md-12 mb-4">
            <label for="domisili_nasabah" class="form-label">Alamat Sesuai Domisili</label>
            <textarea class="form-control" id="domisili_nasabah" name="domisili_nasabah"></textarea>
        </div>
        <div class="col-md-2 mb-3">
            <label for="tanggungan" class="form-label">Tanggungan</label>
            <input type="text" class="form-control" id="tanggungan" name="tanggungan" value=" Orang">
        </div>
        <div class="col-md-2 mb-3">
            <label for="pendidikan" class="form-label">Pendidikan</label>
            <select class="form-control" aria-label="Default select example" id="pendidikan" name="pendidikan">
                <option value="SD">SD</option>
                <option value="SMP">SMP</option>
                <option value="SMA">SMA</option>
                <option value="S1">S1</option>
                <option value="S2">S2</option>
            </select>
        </div>
        <div class="col-md-2 mb-3">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
            <select class="form-control" aria-label="Default select example" id="jenis_kelamin" name="jenis_kelamin">
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>
        <div class="col-md-2 mb-3">
            <label for="masa_laku" class="form-label">Masa Laku</label>
            <input type="text" class="form-control" id="masa_laku" name="masa_laku" value="Seumur Hidup">
        </div>
        <div class="col-md-2 mb-3">
            <label for="telp_kantor" class="form-label">No. Tlp Kantor</label>
            <input type="text" class="form-control" id="telp_kantor" name="telp_kantor">
        </div>
        <div class="col-md-2 mb-5">
            <label for="lama_tinggal" class="form-label">Lama Tinggal</label>
            <input type="text" class="form-control" id="lama_tinggal" name="lama_tinggal" value=" Tahun">
        </div>
        <div class="col-md-12 mb-2">
            <h4>3. Data Suami/Istri</h4>
            <hr>
        </div>
        <div class="col-4 mb-3">
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
        <div class="col-md-2 mb-3">
            <label for="pekerjaan_pasangan" class="form-label">Profesi Istri/Suami</label>
            <input type="text" class="form-control" id="pekerjaan_pasangan" name="pekerjaan_pasangan">
        </div>
        <div class="col-md-2 mb-5">
            <label for="hp_pasangan" class="form-label">No. Tlp</label>
            <input type="text" class="form-control" id="hp_pasangan" name="hp_pasangan">
        </div>
        <div class="col-md-12 mb-2">
            <h4>4. Data Emergency Contact</h4>
            <hr>
        </div>
        <div class="col-4 mb-3">
            <label for="nama_keluarga" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama_keluarga" name="nama_keluarga">
        </div>
        <div class="col-md-3 mb-3">
            <label for="hubungan_keluarga" class="form-label">Hubungan Keluarga</label>
            <input type="text" class="form-control" id="hubungan_keluarga" name="hubungan_keluarga">
        </div>
        <div class="col-md-12 mb-4">
            <label for="alamat_keluarga" class="form-label">Alamat Rumah</label>
            <textarea class="form-control" id="alamat_keluarga" name="alamat_keluarga"></textarea>
        </div>
        <div class="col-md-2 mb-5">
            <label for="hp_keluarga" class="form-label">No. Tlp/Hp</label>
            <input type="text" class="form-control" id="hp_keluarga" name="hp_keluarga">
        </div>
        <div class="col-md-12 mb-2">
            <h4>5. Riwayat Pinjaman</h4>
            <hr>
        </div>
        <div class="row">
            <div class="col-md mb-3">
                <label class="form-label">1</label>
            </div>
            <div class="col-md-3 mb-3">
                <label for="pf1" class="form-label">Plafond (Rp.)</label>
                <input type="text" class="form-control" id="pf1" name="pf1">
            </div>
            <div class="col-md-2 mb-3">
                <label for="st1" class="form-label">Status</label>
                <select class="form-control" aria-label="Default select example" id="st1" name="st1">
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
                    <option value="Baik">Baik</option>
                    <option value="Tidak Baik">Tidak Baik</option>
                </select>
            </div>
            <div class="col-md-2 mb-3">
                <label for="dt1" class="form-label">Data</label>
                <select class="form-control" aria-label="Default select example" id="dt1" name="dt1">
                    <option value="Terlampir">Terlampir</option>
                    <option value="Tidak Terlampir">Tidak Terlampir</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md mb-3">
                <label class="form-label">2</label>
            </div>
            <div class="col-md-3 mb-3">
                <label for="pf2" class="form-label">Plafond (Rp.)</label>
                <input type="text" class="form-control" id="pf2" name="pf2">
            </div>
            <div class="col-md-2 mb-3">
                <label for="st2" class="form-label">Status</label>
                <select class="form-control" aria-label="Default select example" id="st2" name="st2">
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
                    <option value="Baik">Baik</option>
                    <option value="Tidak Baik">Tidak Baik</option>
                </select>
            </div>
            <div class="col-md-2 mb-3">
                <label for="dt2" class="form-label">Data</label>
                <select class="form-control" aria-label="Default select example" id="dt2" name="dt2">
                    <option value="Terlampir">Terlampir</option>
                    <option value="Tidak Terlampir">Tidak Terlampir</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md mb-3">
                <label class="form-label">3</label>
            </div>
            <div class="col-md-3 mb-3">
                <label for="pf3" class="form-label">Plafond (Rp.)</label>
                <input type="text" class="form-control" id="pf3" name="pf3">
            </div>
            <div class="col-md-2 mb-3">
                <label for="st3" class="form-label">Status</label>
                <select class="form-control" aria-label="Default select example" id="st3" name="st3">
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
                    <option value="Baik">Baik</option>
                    <option value="Tidak Baik">Tidak Baik</option>
                </select>
            </div>
            <div class="col-md-2 mb-3">
                <label for="dt3" class="form-label">Data</label>
                <select class="form-control" aria-label="Default select example" id="dt3" name="dt3">
                    <option value="Terlampir">Terlampir</option>
                    <option value="Tidak Terlampir">Tidak Terlampir</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md mb-3">
                <label class="form-label">4</label>
            </div>
            <div class="col-md-3 mb-3">
                <label for="pf4" class="form-label">Plafond (Rp.)</label>
                <input type="text" class="form-control" id="pf4" name="pf4">
            </div>
            <div class="col-md-2 mb-3">
                <label for="st4" class="form-label">Status</label>
                <select class="form-control" aria-label="Default select example" id="st4" name="st4">
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
                    <option value="Baik">Baik</option>
                    <option value="Tidak Baik">Tidak Baik</option>
                </select>
            </div>
            <div class="col-md-2 mb-3">
                <label for="dt4" class="form-label">Data</label>
                <select class="form-control" aria-label="Default select example" id="dt4" name="dt4">
                    <option value="Terlampir">Terlampir</option>
                    <option value="Tidak Terlampir">Tidak Terlampir</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md mb-3">
                <label class="form-label">5</label>
            </div>
            <div class="col-md-3 mb-3">
                <label for="pf5" class="form-label">Plafond (Rp.)</label>
                <input type="text" class="form-control" id="pf5" name="pf5">
            </div>
            <div class="col-md-2 mb-3">
                <label for="st5" class="form-label">Status</label>
                <select class="form-control" aria-label="Default select example" id="st5" name="st5">
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
                    <option value="Baik">Baik</option>
                    <option value="Tidak Baik">Tidak Baik</option>
                </select>
            </div>
            <div class="col-md-2 mb-3">
                <label for="dt5" class="form-label">Data</label>
                <select class="form-control" aria-label="Default select example" id="dt5" name="dt5">
                    <option value="Terlampir">Terlampir</option>
                    <option value="Tidak Terlampir">Tidak Terlampir</option>
                </select>
            </div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Sign in</button>
        </div>
    </form>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->