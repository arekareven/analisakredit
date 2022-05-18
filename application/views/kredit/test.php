<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <!--
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">1</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">2</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">3</a>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#rw">
                Riwayat Pinjaman
            </button>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#character">
                Character
            </button>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#capacity">
                Capacity
            </button>
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#capital">
                Capital Sebelum
            </button>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#capital2">
                Capital Sesudah
            </button>
            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#condition">
                Condition
            </button>
        </div>
        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#collateralTanah">
                Collateral Tanah
            </button>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#collateral">
                Collateral Kendaran
            </button>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#usulan">
                Usulan Kredit
            </button>
        </div>
    </div>
    -->

    <table class="table table-bordered" width="100%" cellspacing="0">
        <thead class="thead-dark">
            <tr>
                <th scope="col">1</th>
                <th scope="col">2</th>
                <th scope="col">3</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <button type="button" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#rw">
                        <span class="icon text-white-50">
                            <i class="fas fa-arrow-down"></i>
                        </span>
                        <span class="text">Riwayat Pinjaman</span>
                    </button>
                    <!--
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#rw">
                        Riwayat Pinjaman
                    </button>
                    -->
                </td>
                <td>
                    <button type="button" class="btn btn-info btn-icon-split" data-toggle="modal" data-target="#cashflow1">
                        <span class="icon text-white-50">
                            <i class="fas fa-arrow-down"></i>
                        </span>
                        <span class="text">Cashflow Sebelum</span>
                    </button>
                    <!--
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#character">
                        Character
                    </button>
                    -->
                </td>
                <td>
                    <button type="button" class="btn btn-warning btn-icon-split" data-toggle="modal" data-target="#collateralTanah">
                        <span class="icon text-white-50">
                            <i class="fas fa-arrow-down"></i>
                        </span>
                        <span class="text">Collateral Tanah</span>
                    </button>
                    <!--
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#capacity">
                        Capacity
                    </button>
                    -->
                </td>
            </tr>
            <tr>
                <td>
                    <button type="button" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#character">
                        <span class="icon text-white-50">
                            <i class="fas fa-arrow-down"></i>
                        </span>
                        <span class="text">Character</span>
                    </button>
                    <!--
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#capital">
                        Capital Sebelum
                    </button>
                    -->
                </td>
                <td>
                    <button type="button" class="btn btn-info btn-icon-split" data-toggle="modal" data-target="#cashflow2">
                        <span class="icon text-white-50">
                            <i class="fas fa-arrow-down"></i>
                        </span>
                        <span class="text">Cashflow Sesudah</span>
                    </button>
                    <!--
                    <button type="button" class="btn btn-info btn-icon-split" data-toggle="modal" data-target="#capital2">
                        <span class="icon text-white-50">
                            <i class="fas fa-arrow-down"></i>
                        </span>
                        <span class="text">Capital Sesudah</span>
                    </button>
                    -->
                    <!--
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#cashflow1">
                        Cashflow Sebelum
                    </button>
                    -->
                </td>
                <td>
                    <button type="button" class="btn btn-warning btn-icon-split" data-toggle="modal" data-target="#collateral">
                        <span class="icon text-white-50">
                            <i class="fas fa-arrow-down"></i>
                        </span>
                        <span class="text">Collateral Kendaran</span>
                    </button>
                    <!--
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#capital2">
                        Capital Sesudah
                    </button>
                    -->
                </td>
            </tr>
            <tr>
                <td>
                    <button type="button" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#capacity">
                        <span class="icon text-white-50">
                            <i class="fas fa-arrow-down"></i>
                        </span>
                        <span class="text">Capacity</span>
                    </button>
                    <!--
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#cashflow2">
                        Cashflow Sesudah
                    </button>
                    -->
                </td>
                <td>
                    <button type="button" class="btn btn-info btn-icon-split" data-toggle="modal" data-target="#condition">
                        <span class="icon text-white-50">
                            <i class="fas fa-arrow-down"></i>
                        </span>
                        <span class="text">Condition</span>
                    </button>
                    <!--
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#condition">
                        Condition
                    </button>
                    -->
                </td>
                <td>
                    <button type="button" class="btn btn-warning btn-icon-split" data-toggle="modal" data-target="#usulan">
                        <span class="icon text-white-50">
                            <i class="fas fa-arrow-down"></i>
                        </span>
                        <span class="text">Usulan Kredit</span>
                    </button>
                    <!--
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#collateralTanah">
                        Collateral Tanah
                    </button>
                    -->
                </td>
            </tr>
            <tr>
                <td>
                    <button type="button" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#capital">
                        <span class="icon text-white-50">
                            <i class="fas fa-arrow-down"></i>
                        </span>
                        <span class="text">Capital Sebelum</span>
                    </button>
                    <!--
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#collateral">
                        Collateral Kendaran
                    </button>
                    -->
                </td>
                <td>
                    <!--
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#usulan">
                        Usulan Kredit
                    </button>
                    -->
                </td>
            </tr>
        </tbody>
    </table>


    <!-- Modal -->
    <div class="modal fade" id="rw" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Riwayat Pinjaman</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('kredit/add_rw'); ?>" method="post">
                    <div class="modal-body after-add-more">
                        <div class="row">
                            <div class="col-md-1 mb-3">
                                <label for="sd5" class="form-label">Tambah</label>
                                <button class="btn btn-success add-more" type="button">
                                    <i class="fas fa-plus"></i>
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
                <div class="col-md-3 mb-3">
                    <label for="plafond" class="form-label">Plafond (Rp.)</label>
                    <input type="text" class="form-control" id="plafond" name="plafond[]">
                    <input type="hidden" class="form-control" id="id_lb" name="id_lb[]" value="<?php echo $id_lb; ?>">
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
                <div class="col-md-1 mb-3">
                    <label for="sd5" class="form-label">Hapus</label>
                    <button class="btn btn-danger remove" type="button">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal character -->
    <div class="modal fade" id="character" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Character</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('character/add'); ?>" method="post">
                    <div class="modal-body">
                        <div class="col-md-12 mb-4">
                            <label for="info_pribadi" class="form-label">Informasi Pribadi</label>
                            <input type="hidden" class="form-control" id="id_lb" name="id_lb" value="<?php echo $id_lb; ?>">
                            <textarea class="form-control" id="info_pribadi" name="info_pribadi"></textarea>
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="info_perilaku" class="form-label">Informasi Perilaku</label>
                            <textarea class="form-control" id="info_perilaku" name="info_perilaku"></textarea>
                        </div>
                        <div class="col-md-12 mb-5">
                            <label for="info_keluarga" class="form-label">Informasi Keluarga</label>
                            <textarea class="form-control" id="info_keluarga" name="info_keluarga"></textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <h5>Informasi Karakter</h5>
                        </div>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="nm1" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nm1" name="nm1">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="al1" class="form-label">Alamat</label>
                                <textarea class="form-control" id="al1" name="al1"></textarea>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="hp1" class="form-label">Tlp./HP</label>
                                <input type="text" class="form-control" id="hp1" name="hp1">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="nm2" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nm2" name="nm2">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="al2" class="form-label">Alamat</label>
                                <textarea class="form-control" id="al2" name="al2"></textarea>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="hp2" class="form-label">Tlp. /HP</label>
                                <input type="text" class="form-control" id="hp2" name="hp2">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="nm3" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nm3" name="nm3">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="al3" class="form-label">Alamat</label>
                                <textarea class="form-control" id="al3" name="al3"></textarea>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="hp3" class="form-label">Tlp. /HP</label>
                                <input type="text" class="form-control" id="hp3" name="hp3">
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

    <!-- Modal capacity -->
    <div class="modal fade" id="capacity" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Capacity</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('capacity/add'); ?>" method="post">
                    <div class="modal-body">
                        <div class="col-md-4 mb-3">
                            <label for="nama_usaha" class="form-label">Nama Bidang Usaha</label>
                            <input type="hidden" class="form-control" id="id_lb" name="id_lb" value="<?php echo $id_lb; ?>">
                            <input type="text" class="form-control" id="nama_usaha" name="nama_usaha">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="sektor" class="form-label">Sektor Usaha</label>
                            <select class="form-control" aria-label="Default select example" id="sektor" name="sektor">
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
                            <input type="text" class="form-control" id="bidang" name="bidang">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="alamat_usaha" class="form-label">Alamat Usaha</label>
                            <textarea class="form-control" id="alamat_usaha" name="alamat_usaha"></textarea>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="status_usaha" class="form-label">Status Tempat Usaha</label>
                            <select class="form-control" aria-label="Default select example" id="status_usaha" name="status_usaha">
                                <option value="Milik Sendiri">Milik Sendiri</option>
                                <option value="Milik Keluarga/Ortu">Milik Keluarga/Ortu</option>
                                <option value="Instansi">Instansi</option>
                                <option value="Kontrak">Kontrak</option>
                                <option value="Kredit">Kredit</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="tlp_usaha" class="form-label">No. Tlp Usaha</label>
                            <input type="text" class="form-control" id="tlp_usaha" name="tlp_usaha">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="tgl_mulai" class="form-label">Tanggal Mulai Usaha</label>
                            <input type="date" class="form-control" id="tgl_mulai" name="tgl_mulai">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="tgl_nasabah" class="form-label">Jadi Nasabah Sejak</label>
                            <input type="date" class="form-control" id="tgl_nasabah" name="tgl_nasabah">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="akta" class="form-label">No. Akta</label>
                            <input type="text" class="form-control" id="akta" name="akta">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="tgl_akta" class="form-label">Tanggal Akta</label>
                            <input type="date" class="form-control" id="tgl_akta" name="tgl_akta">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="npwp" class="form-label">NPWP</label>
                            <input type="text" class="form-control" id="npwp" name="npwp">
                        </div>
                        <div class="col-md-4 mb-5">
                            <label for="tgl_npwp" class="form-label">Tgl NPWP</label>
                            <input type="date" class="form-control" id="tgl_npwp" name="tgl_npwp">
                        </div>
                        <div class="col-md-12 mb-3">
                            <h5>Alokasi Dana</h5>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="alokasi1" class="form-label">Penggunaan</label>
                                <input type="text" class="form-control" id="alokasi1" name="alokasi1">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="dana1" class="form-label">Dana</label>
                                <input type="number" class="form-control" id="dana1" name="dana1">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="alokasi2" class="form-label">Penggunaan</label>
                                <input type="text" class="form-control" id="alokasi2" name="alokasi2">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="dana2" class="form-label">Dana</label>
                                <input type="number" class="form-control" id="dana2" name="dana2">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="alokasi3" class="form-label">Penggunaan</label>
                                <input type="text" class="form-control" id="alokasi3" name="alokasi3">
                            </div>
                            <div class="col-md-4 mb-5">
                                <label for="dana3" class="form-label">Dana</label>
                                <input type="number" class="form-control" id="dana3" name="dana3">
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="usaha_skrg" class="form-label">Usaha Saat Ini</label>
                            <textarea class="form-control" id="usaha_skrg" name="usaha_skrg"></textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="usaha_realisasi" class="form-label">Usaha Setelah Realisasi</label>
                            <textarea class="form-control" id="usaha_realisasi" name="usaha_realisasi"></textarea>
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

    <!-- Modal capital -->
    <div class="modal fade" id="capital" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Capital</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('capital/add'); ?>" method="post">
                    <div class="modal-body">
                        <div class="col-md-12 mb-3">
                            <h5>Aktiva lancar</h5>
                        </div>
                        <div class="form-group row">
                            <label for="kas" class="col-sm-6 col-form-label">Kas</label>
                            <div class="col-sm-6">
                                <input type="hidden" class="form-control" id="id_lb" name="id_lb" value="<?php echo $id_lb; ?>">
                                <input type="hidden" class="form-control" id="type" name="type" value="before">
                                <input type="number" class="form-control" id="kas" name="kas">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tabungan" class="col-sm-6 col-form-label">Tabungan</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="tabungan" name="tabungan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="deposito" class="col-sm-6 col-form-label">Deposito</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="deposito" name="deposito">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="piutang" class="col-sm-6 col-form-label">Piutang</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="piutang" name="piutang">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="peralatan" class="col-sm-6 col-form-label">Peralatan</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="peralatan" name="peralatan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="barang" class="col-sm-6 col-form-label">Persediaan Barang Usaha 1</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="barang" name="barang">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="barang2" class="col-sm-6 col-form-label">Persediaan Barang Usaha 2</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="barang2" name="barang2">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="barang3" class="col-sm-6 col-form-label">Persediaan Barang Usaha 3</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="barang3" name="barang3">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sewa" class="col-sm-6 col-form-label">Sewa Dibayar Dimuka</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="sewa" name="sewa">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lahan" class="col-sm-6 col-form-label">Lahan Garap</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="lahan" name="lahan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="gedung" class="col-sm-6 col-form-label">Gedung / Ruko</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="gedung" name="gedung">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="operasional" class="col-sm-6 col-form-label">Kendaraan Operasional</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="operasional" name="operasional">
                            </div>
                        </div>
                        <div class="form-group row mb-5">
                            <label for="lain" class="col-sm-6 col-form-label">Lain-lain</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="lain" name="lain">
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <h5>Aktiva Tetap</h5>
                        </div>
                        <div class="form-group row">
                            <label for="tanah" class="col-sm-6 col-form-label">Tanah</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="tanah" name="tanah">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bangunan" class="col-sm-6 col-form-label">Bangunan</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="bangunan" name="bangunan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kendaraan" class="col-sm-6 col-form-label">Kendaraan</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="kendaraan" name="kendaraan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inventaris" class="col-sm-6 col-form-label">Inventaris</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="inventaris" name="inventaris">
                            </div>
                        </div>
                        <div class="form-group row mb-5">
                            <label for="lain2" class="col-sm-6 col-form-label">Lain-lain</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="lain2" name="lain2">
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <h5>Hutang</h5>
                        </div>
                        <div class="form-group row">
                            <label for="hutang_jpk" class="col-sm-6 col-form-label">Hutang Jangka Pendek</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="hutang_jpk" name="hutang_jpk">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="hutang_jpg" class="col-sm-6 col-form-label">Hutang Jangka Panjang</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="hutang_jpg" name="hutang_jpg">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="hutang_lain" class="col-sm-6 col-form-label">Hutang Lain</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="hutang_lain" name="hutang_lain">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="hutang_dagang" class="col-sm-6 col-form-label">Hutang Dagang</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="hutang_dagang" name="hutang_dagang">
                            </div>
                        </div>
                        <!--
                        <div class="form-group row">
                            <label for="harta" class="col-sm-6 col-form-label">Harta</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="harta" name="harta">
                            </div>
                        </div>
                        -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="cashflow1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pendapatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="cashflow">
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
                            <input type="hidden" class="form-control" id="id_lb" name="id_lb" value="<?php echo $id_lb; ?>">
                            <input type="hidden" class="form-control" id="nama_perkiraan" name="nama_perkiraan">
                            <input type="hidden" class="form-control" id="nama_perkiraan2" name="nama_perkiraan2">
                            <input type="hidden" class="form-control" id="jenis" name="jenis" value="pendapatan">
                        </div>
                        <div class="col-md-8 mb-4">
                            <label for="nama_stnk" class="form-label">Sebesar</label>
                            <input type="number" class="form-control" id="saldo" name="saldo">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" id="simpan" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="copy_cf invisible">
        <div class="modal-body">
            <div class="row">
                <div class="col-md-1 mb-3">
                    <label for="no" class="form-label">No</label>
                    <input type="text" class="form-control" id="no" name="no[]">
                    <input type="hidden" class="form-control" id="id_lb" name="id_lb[]" value="<?php echo $id_lb; ?>">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <input type="text" class="form-control" id="keterangan" name="keterangan[]">
                </div>
                <div class="col-md-2 mb-3">
                    <label for="pemasukan" class="form-label">Pemasukan(Rp.)</label>
                    <input type="text" class="form-control" id="pemasukan" name="pemasukan[]">
                </div>
                <div class="col-md-2 mb-3">
                    <label for="pengeluaran" class="form-label">Pengeluaran(Rp.)</label>
                    <input type="text" class="form-control" id="pengeluaran" name="pengeluaran[]">
                </div>
                <div class="col-md-2 mb-3">
                    <label for="saldo" class="form-label">Saldo(Rp.)</label>
                    <input type="text" class="form-control" id="saldo" name="saldo[]">
                </div>
                <div class="col-md-1 mb-3">
                    <label for="sd5" class="form-label">Hapus</label>
                    <button class="btn btn-danger remove_cf" type="button">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="cashflow2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cashflow Sesudah</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('cashflow/add2'); ?>" method="post">
                    <div class="modal-body after-add-more_cf2">
                        <div class="row">

                            <div class="col-md-1 mb-3">
                                <label for="sd5" class="form-label">Tambah</label>
                                <button class="btn btn-success add-more_cf2" type="button">
                                    <i class="fas fa-plus"></i>
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

    <div class="copy_cf2 invisible">
        <div class="modal-body">
            <div class="row">
                <div class="col-md-1 mb-3">
                    <label for="no" class="form-label">No</label>
                    <input type="text" class="form-control" id="no" name="no[]">
                    <input type="hidden" class="form-control" id="id_lb" name="id_lb[]" value="<?php echo $id_lb; ?>">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <input type="text" class="form-control" id="keterangan" name="keterangan[]">
                </div>
                <div class="col-md-2 mb-3">
                    <label for="pemasukan" class="form-label">Pemasukan(Rp.)</label>
                    <input type="text" class="form-control" id="pemasukan" name="pemasukan[]">
                </div>
                <div class="col-md-2 mb-3">
                    <label for="pengeluaran" class="form-label">Pengeluaran(Rp.)</label>
                    <input type="text" class="form-control" id="pengeluaran" name="pengeluaran[]">
                </div>
                <div class="col-md-2 mb-3">
                    <label for="saldo" class="form-label">Saldo(Rp.)</label>
                    <input type="text" class="form-control" id="saldo" name="saldo[]">
                </div>
                <div class="col-md-1 mb-3">
                    <label for="sd5" class="form-label">Hapus</label>
                    <button class="btn btn-danger remove_cf2" type="button">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal capital2 -->
    <div class="modal fade" id="capital2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Input Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('capital/add2'); ?>" method="post">
                    <div class="modal-body">
                        <div class="col-md-12 mb-2">
                            <h4>Aktiva lancar</h4>
                            <br>
                        </div>
                        <div class="form-group row">
                            <label for="kas" class="col-sm-6 col-form-label">Kas</label>
                            <div class="col-sm-6">
                                <input type="hidden" class="form-control" id="id_lb" name="id_lb" value="<?php echo $id_lb; ?>">
                                <input type="hidden" class="form-control" id="type" name="type" value="after">
                                <input type="number" class="form-control" id="kas" name="kas">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tabungan" class="col-sm-6 col-form-label">Tabungan</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="tabungan" name="tabungan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="deposito" class="col-sm-6 col-form-label">Deposito</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="deposito" name="deposito">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="piutang" class="col-sm-6 col-form-label">Piutang</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="piutang" name="piutang">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="peralatan" class="col-sm-6 col-form-label">Peralatan</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="peralatan" name="peralatan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="barang" class="col-sm-6 col-form-label">Persediaan Barang Usaha 1</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="barang" name="barang">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="barang2" class="col-sm-6 col-form-label">Persediaan Barang Usaha 2</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="barang2" name="barang2">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="barang3" class="col-sm-6 col-form-label">Persediaan Barang Usaha 3</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="barang3" name="barang3">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sewa" class="col-sm-6 col-form-label">Sewa Dibayar Dimuka</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="sewa" name="sewa">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lahan" class="col-sm-6 col-form-label">Lahan Garap</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="lahan" name="lahan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="gedung" class="col-sm-6 col-form-label">Gedung / Ruko</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="gedung" name="gedung">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="operasional" class="col-sm-6 col-form-label">Kendaraan Operasional</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="operasional" name="operasional">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="lain" class="col-sm-6 col-form-label">Lain-lain</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="lain" name="lain">
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <h4>Aktiva Tetap</h4>
                            <br>
                        </div>
                        <div class="form-group row">
                            <label for="tanah" class="col-sm-6 col-form-label">Tanah</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="tanah" name="tanah">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bangunan" class="col-sm-6 col-form-label">Bangunan</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="bangunan" name="bangunan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kendaraan" class="col-sm-6 col-form-label">Kendaraan</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="kendaraan" name="kendaraan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inventaris" class="col-sm-6 col-form-label">Inventaris</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="inventaris" name="inventaris">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="lain2" class="col-sm-6 col-form-label">Lain-lain</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="lain2" name="lain2">
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <h4>Hutang</h4>
                            <br>
                        </div>
                        <div class="form-group row">
                            <label for="hutang_jpk" class="col-sm-6 col-form-label">Hutang Jangka Pendek</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="hutang_jpk" name="hutang_jpk">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="hutang_jpg" class="col-sm-6 col-form-label">Hutang Jangka Panjang</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="hutang_jpg" name="hutang_jpg">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="hutang_lain" class="col-sm-6 col-form-label">Hutang Lain</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="hutang_lain" name="hutang_lain">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="hutang_dagang" class="col-sm-6 col-form-label">Hutang Dagang</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="hutang_dagang" name="hutang_dagang">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="laba_rugi" class="col-sm-6 col-form-label">Laba / Rugi</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="laba_rugi" name="laba_rugi">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="modal" class="col-sm-6 col-form-label">Modal Usaha</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="modal" name="modal">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="harta" class="col-sm-6 col-form-label">Harta</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="harta" name="harta">
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

    <!-- Modal condition -->
    <div class="modal fade" id="condition" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Input Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('condition/add'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="kekuatan" class="col-sm-2 col-form-label">Kekuatan</label>
                            <div class="col-sm-10">
                                <input type="hidden" class="form-control" id="id_lb" name="id_lb" value="<?php echo $id_lb; ?>">
                                <textarea class="form-control" id="kekuatan" name="kekuatan"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kelemahan" class="col-sm-2 col-form-label">Kelemahan</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="kelemahan" name="kelemahan"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="peluang" class="col-sm-2 col-form-label">Peluang</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="peluang" name="peluang"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ancaman" class="col-sm-2 col-form-label">Ancaman</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="ancaman" name="ancaman"></textarea>
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

    <!-- Modal collateral Tanah -->
    <div class="modal fade" id="collateralTanah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Input Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('collateral/add2'); ?>" method="post">
                    <div class="modal-body after-add-more3">
                        <div class="col-md-1 mb-3">
                            <label for="sd5" class="form-label">Tambah</label>
                            <button class="btn btn-success add-more3" type="button">
                                <i class="fas fa-plus"></i>
                            </button>
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

    <div class="copy3 invisible">
        <div class="modal-body">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <label for="jenis" class="form-label">Jenis</label>
                    <input type="hidden" class="form-control" id="id_lb" name="id_lb[]" value="<?php echo $id_lb; ?>">
                    <input type="text" class="form-control" id="jenis" name="jenis[]">
                </div>
                <div class="col-md-4 mb-4">
                    <label for="nama" class="form-label">Nama Pemilik</label>
                    <input type="text" class="form-control" id="nama" name="nama[]">
                </div>
                <div class="col-md-4 mb-4">
                    <label for="no_shm" class="form-label">No. SHM</label>
                    <input type="text" class="form-control" id="no_shm" name="no_shm[]">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <label for="luas_t" class="form-label">Luas Tanah (M2)</label>
                    <input type="text" class="form-control" id="luas_t" name="luas_t[]">
                </div>
                <div class="col-md-4 mb-4">
                    <label for="luas_b" class="form-label">Luas Bangunan (M2)</label>
                    <input type="text" class="form-control" id="luas_b" name="luas_b[]">
                </div>
                <div class="col-md-4 mb-4">
                    <label for="harga_t" class="form-label">Harga Tanah SPPT (Rp.)</label>
                    <input type="text" class="form-control" id="harga_t" name="harga_t[]">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <label for="harga_b" class="form-label">Harga Bangunan SPPT (Rp.)</label>
                    <input type="text" class="form-control" id="harga_b" name="harga_b[]">
                </div>
                <div class="col-md-4 mb-4">
                    <label for="harga_t2" class="form-label">Harga Tanah Pasar (Rp.)</label>
                    <input type="text" class="form-control" id="harga_t2" name="harga_t2[]">
                </div>
                <div class="col-md-4 mb-4">
                    <label for="harga_b2" class="form-label">Harga Bangunan Pasar (Rp.)</label>
                    <input type="text" class="form-control" id="harga_b2" name="harga_b2[]">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <label for="tgl_ukur" class="form-label">Tgl Surat Ukur</label>
                    <input type="date" class="form-control" id="tgl_ukur" name="tgl_ukur[]">
                </div>
                <div class="col-md-4 mb-4">
                    <label for="no_ukur" class="form-label">No. Surat Ukur</label>
                    <input type="text" class="form-control" id="no_ukur" name="no_ukur[]">
                </div>
                <div class="col-md-4 mb-4">
                    <label for="milik" class="form-label">Kepemilikan</label>
                    <input type="text" class="form-control" id="milik" name="milik[]">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <label for="ht" class="form-label">Nilai HT (Rp.)</label>
                    <input type="number" class="form-control" id="ht" name="ht[]">
                </div>
                <div class="col-md-4 mb-4">
                    <label for="taksasi" class="form-label">Taksasi (%)</label>
                    <input type="number" class="form-control" id="taksasi" name="taksasi[]">
                </div>
            </div>
            <div class="col-md-12 mb-4">
                <label for="alamat" class="form-label">Alamat Pemilik</label>
                <textarea class="form-control" id="alamat" name="alamat[]"></textarea>
            </div>
            <div class="col-md-12 mb-4">
                <label for="lokasi" class="form-label">Lokasi Jaminan</label>
                <textarea class="form-control" id="lokasi" name="lokasi[]"></textarea>
            </div>
            <div class="col-md-12 mb-4">
                <label for="fisik_jaminan" class="form-label">Fisik Jaminan</label>
                <textarea class="form-control" id="fisik_jaminan" name="fisik_jaminan[]"></textarea>
            </div>
            <div class="col-md-12 mb-4">
                <label for="pertimbangan" class="form-label">Pertimbangan</label>
                <textarea class="form-control" id="pertimbangan" name="pertimbangan[]"></textarea>
            </div>
            <div class="col-md-1 mb-3">
                <label for="sd5" class="form-label">Hapus</label>
                <button class="btn btn-danger remove3" type="button">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Modal collateral Kendaraan-->
    <div class="modal fade" id="collateral" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Input Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('collateral/add'); ?>" method="post">
                    <div class="modal-body after-add-more2">
                        <div class="col-md-1 mb-3">
                            <label for="sd5" class="form-label">Tambah</label>
                            <button class="btn btn-success add-more2" type="button">
                                <i class="fas fa-plus"></i>
                            </button>
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

    <div class="copy2 invisible">
        <div class="modal-body">
            <div class="row">
                <div class="col-md-3 mb-4">
                    <label for="status" class="form-label">Roda</label>
                    <select class="form-control" aria-label="Default select example" id="roda" name="roda[]">
                        <option value=""></option>
                        <option value="2 (Dua)">2</option>
                        <option value="4 (Empat)">4</option>
                        <option value="6 (Enam)">6</option>
                        <option value="8 (Delapan)">8</option>
                    </select>
                </div>
                <div class="col-md-3 mb-4">
                    <label for="nopol" class="form-label">Nomor Polisi</label>
                    <input type="hidden" class="form-control" id="id_lb" name="id_lb[]" value="<?php echo $id_lb; ?>">
                    <input type="text" class="form-control" id="nopol" name="nopol[]">
                </div>
                <div class="col-md-3 mb-4">
                    <label for="nama_stnk" class="form-label">Nama di STNK</label>
                    <input type="text" class="form-control" id="nama_stnk" name="nama_stnk[]">
                </div>
                <div class="col-md-3 mb-4">
                    <label for="tahun" class="form-label">Tahun</label>
                    <input type="year" class="form-control" id="tahun" name="tahun[]">
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 mb-4">
                    <label for="silinder" class="form-label">Isi Silinder</label>
                    <input type="text" class="form-control" id="silinder" name="silinder[]">
                </div>
                <div class="col-md-3 mb-4">
                    <label for="no_rangka" class="form-label">No. Rangka</label>
                    <input type="text" class="form-control" id="no_rangka" name="no_rangka[]">
                </div>
                <div class="col-md-3 mb-4">
                    <label for="no_mesin" class="form-label">No. Mesin</label>
                    <input type="text" class="form-control" id="no_mesin" name="no_mesin[]">
                </div>
                <div class="col-md-3 mb-4">
                    <label for="no_bpkb" class="form-label">No. BPKB</label>
                    <input type="text" class="form-control" id="no_bpkb" name="no_bpkb[]">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <label for="type" class="form-label">Merk / Type</label>
                    <input type="text" class="form-control" id="type" name="type[]">
                </div>
                <div class="col-md-4 mb-4">
                    <label for="jenis" class="form-label">Jenis / Model</label>
                    <input type="text" class="form-control" id="jenis" name="jenis[]">
                </div>
                <div class="col-md-4 mb-4">
                    <label for="warna" class="form-label">Warna</label>
                    <input type="text" class="form-control" id="warna" name="warna[]">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <label for="taksiran" class="form-label">Taksiran Harga</label>
                    <input type="number" class="form-control" id="taksiran" name="taksiran[]">
                </div>
                <div class="col-md-4 mb-4">
                    <label for="nl" class="form-label">NL</label>
                    <input type="number" class="form-control" id="nl" name="nl[]">
                </div>
                <div class="col-md-4 mb-4">
                    <label for="milik" class="form-label">Kepemilikan</label>
                    <input type="text" class="form-control" id="milik" name="milik[]">
                </div>
            </div>
            <div class="col-md-12 mb-4">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat[]"></textarea>
            </div>
            <div class="col-md-12 mb-4">
                <label for="kondisi" class="form-label">Kondisi Jaminan</label>
                <textarea class="form-control" id="kondisi" name="kondisi[]"></textarea>
            </div>
            <div class="col-md-1 mb-4">
                <label for="sd5" class="form-label">Hapus</label>
                <button class="btn btn-danger remove2" type="button">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Modal usulan -->
    <div class="modal fade" id="usulan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Usulan Kredit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('usulan/add'); ?>" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-3 mb-4">
                                <label for="character" class="form-label">Character</label>
                                <input type="hidden" class="form-control" id="id_lb" name="id_lb" value="<?php echo $id_lb; ?>">
                                <input type="text" class="form-control" id="character" name="character">
                            </div>
                            <div class="col-md-3 mb-4">
                                <label for="capacity" class="form-label">Capacity</label>
                                <input type="text" class="form-control" id="capacity" name="capacity">
                            </div>
                            <div class="col-md-3 mb-4">
                                <label for="capital" class="form-label">Capital</label>
                                <input type="text" class="form-control" id="capital" name="capital">
                            </div>
                            <div class="col-md-3 mb-4">
                                <label for="coe" class="form-label">Condition of Economy</label>
                                <input type="text" class="form-control" id="coe" name="coe">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3 mb-4">
                                <label for="collateral" class="form-label">Collateral</label>
                                <input type="text" class="form-control" id="collateral" name="collateral">
                            </div>
                            <div class="col-md-3 mb-4">
                                <label for="plafond" class="form-label">Plafond</label>
                                <input type="text" class="form-control" id="plafond" name="plafond">
                            </div>
                            <div class="col-md-3 mb-4">
                                <label for="sifat" class="form-label">Sifat Kredit</label>
                                <input type="text" class="form-control" id="sifat" name="sifat">
                            </div>
                            <div class="col-md-3 mb-4">
                                <label for="jenis" class="form-label">Jenis Kredit</label>
                                <input type="text" class="form-control" id="jenis" name="jenis">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4 mb-4">
                                <label for="tujuan" class="form-label">Tujuan Kredit</label>
                                <input type="text" class="form-control" id="tujuan" name="tujuan">
                            </div>
                            <div class="col-md-4 mb-4">
                                <label for="sektor" class="form-label">Sektor Kredit</label>
                                <input type="text" class="form-control" id="sektor" name="sektor">
                            </div>
                            <div class="col-md-4 mb-4">
                                <label for="waktu" class="form-label">Jangka Waktu</label>
                                <input type="text" class="form-control" id="waktu" name="waktu">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4 mb-4">
                                <label for="bunga" class="form-label">Bunga (%)</label>
                                <input type="text" class="form-control" id="bunga" name="bunga">
                            </div>
                            <div class="col-md-4 mb-4">
                                <label for="angsuran" class="form-label">Angsuran</label>
                                <input type="text" class="form-control" id="angsuran" name="angsuran">
                            </div>
                            <div class="col-md-4 mb-4">
                                <label for="denda" class="form-label">Denda 0.2 % per Hari</label>
                                <input type="text" class="form-control" id="denda" name="denda">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4 mb-4">
                                <label for="realisasi" class="form-label">Tanggal Ralisasi</label>
                                <input type="date" class="form-control" id="realisasi" name="realisasi">
                            </div>
                            <div class="col-md-4 mb-4">
                                <label for="tanggungan" class="form-label">Hak Tanggungan</label>
                                <input type="text" class="form-control" id="tanggungan" name="tanggungan">
                            </div>
                            <div class="col-md-4 mb-4">
                                <label for="likuidasi" class="form-label">Nilai Likuidasi</label>
                                <input type="text" class="form-control" id="likuidasi" name="likuidasi">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4 mb-4">
                                <label for="lainnya" class="form-label">Nilai Lainnya</label>
                                <input type="text" class="form-control" id="lainnya" name="lainnya">
                            </div>
                            <div class="col-md-4 mb-4">
                                <label for="jaminan" class="form-label">Jaminan</label>
                                <input type="text" class="form-control" id="jaminan" name="jaminan">
                            </div>
                            <div class="col-md-4 mb-4">
                                <label for="notaris" class="form-label">Notaris</label>
                                <select class="custom-select" id="notaris" name="notaris" onchange="autofill()">
                                    <option value="">-- Pilih Notaris --</option>
                                    <?php
                                    foreach ($select->result() as $row) {
                                        echo "<option name='notaris' value='$row->notaris'>$row->notaris</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <input type="hidden" class="form-control" id="provisi" name="provisi">
                            <input type="hidden" class="form-control" id="administrasi" name="administrasi">
                            <input type="hidden" class="form-control" id="asuransi" name="asuransi">
                            <input type="hidden" class="form-control" id="materai" name="materai">
                            <input type="hidden" class="form-control" id="apht" name="apht">
                            <input type="hidden" class="form-control" id="skmht" name="skmht">
                            <input type="hidden" class="form-control" id="titipan" name="titipan">
                            <input type="hidden" class="form-control" id="fiduciare" name="fiduciare">
                            <input type="hidden" class="form-control" id="legalisasi" name="legalisasi">
                            <input type="hidden" class="form-control" id="lain" name="lain">
                            <input type="hidden" class="form-control" id="roya" name="roya">
                            <input type="hidden" class="form-control" id="proses" name="proses">
                            <input type="hidden" class="form-control" id="sertifikat" name="sertifikat">
                            <input type="hidden" class="form-control" id="akta" name="akta">
                            <input type="hidden" class="form-control" id="pendaftaran" name="pendaftaran">
                            <input type="hidden" class="form-control" id="plotting" name="plotting">
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


    <script src="<?php echo base_url(); ?>assets/ajax.js"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $(".add-more").click(function() {
                var html = $(".copy").html();
                $(".after-add-more").before(html);
            });

            // saat tombol remove dklik control group akan dihapus 
            $("body").on("click", ".remove", function() {
                $(this).parents(".modal-body").remove();
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $(".add-more_cf").click(function() {
                var html = $(".copy_cf").html();
                $(".after-add-more_cf").before(html);
            });

            // saat tombol remove dklik control group akan dihapus 
            $("body").on("click", ".remove_cf", function() {
                $(this).parents(".modal-body").remove();
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $(".add-more2").click(function() {
                var html = $(".copy2").html();
                $(".after-add-more2").before(html);
            });

            // saat tombol remove dklik control group akan dihapus 
            $("body").on("click", ".remove2", function() {
                $(this).parents(".modal-body").remove();
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $(".add-more_cf2").click(function() {
                var html = $(".copy_cf2").html();
                $(".after-add-more_cf2").before(html);
            });

            // saat tombol remove dklik control group akan dihapus 
            $("body").on("click", ".remove_cf2", function() {
                $(this).parents(".modal-body").remove();
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $(".add-more3").click(function() {
                var html = $(".copy3").html();
                $(".after-add-more3").before(html);
            });

            // saat tombol remove dklik control group akan dihapus 
            $("body").on("click", ".remove3", function() {
                $(this).parents(".modal-body").remove();
            });
        });
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

    <script>
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
    </script>

    <script>
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
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#simpan').on('click', function() {
                var cashflow = $('#cashflow').serialize();
                $.ajax({
                    url: "<?php echo base_url(); ?>test/add",
                    type: "POST",
                    data: cashflow,
                    dataType: "JSON",
                    success: function(data) {
                        console.log(data)
                    }
                })
            })
        });
    </script>


</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->