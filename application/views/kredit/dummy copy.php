<!-- Test case 1-->
<div class="container-fluid">

    <div class="row">
        <div class="col-md-11 mb-2">
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
        </div>
        <div class="col-md-1 mb-2">
            <a href="test/edit?id_lb=<?php echo $id_lb; ?>" type="button" class="btn btn-warning" target="_blank">
                Edit
            </a>
        </div>
    </div>

    <!-- table pemasukan -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-3">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						<!-- sementara dihilangkan dulu untuk mengerjakan edit chasflow
                        <a class="nav-link active" id="v-pills-rw-tab" data-toggle="pill" href="#v-pills-rw" role="tab" aria-controls="v-pills-rw" aria-selected="true">Riwayat Pinjaman</a>
                        <a class="nav-link" id="v-pills-character-tab" data-toggle="pill" href="#v-pills-character" role="tab" aria-controls="v-pills-character" aria-selected="false">Character</a>
                        <a class="nav-link" id="v-pills-capacity-tab" data-toggle="pill" href="#v-pills-capacity" role="tab" aria-controls="v-pills-capacity" aria-selected="false">Capacity</a>
                        <a class="nav-link" id="v-pills-capital-tab" data-toggle="pill" href="#v-pills-capital" role="tab" aria-controls="v-pills-capital" aria-selected="false">Capital</a>
						<a class="nav-link" id="v-pills-cashflow-tab" data-toggle="pill" href="#v-pills-cashflow" role="tab" aria-controls="v-pills-cashflow" aria-selected="false">Cashflow Setelah</a>
                        <a class="nav-link" id="v-pills-condition-tab" data-toggle="pill" href="#v-pills-condition" role="tab" aria-controls="v-pills-condition" aria-selected="false">Condition</a>
                        <a class="nav-link" id="v-pills-collateralt-tab" data-toggle="pill" href="#v-pills-collateralt" role="tab" aria-controls="v-pills-collateralt" aria-selected="false">Collateral Tanah</a>
                        <a class="nav-link" id="v-pills-collateralk-tab" data-toggle="pill" href="#v-pills-collateralk" role="tab" aria-controls="v-pills-collateralk" aria-selected="false">Collateral Kendaraan</a>
                        <a class="nav-link" id="v-pills-usulan-tab" data-toggle="pill" href="#v-pills-usulan" role="tab" aria-controls="v-pills-usulan" aria-selected="false">Usulan</a>
                        <a class="nav-link" id="v-pills-print-tab" data-toggle="pill" href="#v-pills-print" role="tab" aria-controls="v-pills-print" aria-selected="false">Cetak</a>
						-->
						<a class="nav-link active" id="v-pills-cashflowa-tab" data-toggle="pill" href="#v-pills-cashflowa" role="tab" aria-controls="v-pills-cashflowa" aria-selected="false">Cashflow Awal</a>
                    </div>
                </div>
                <div class="col-9">
                    <div class="tab-content" id="v-pills-tabContent">
						<!-- sementara dihilangkan dulu untuk mengerjakan edit chasflow
                        <div class="tab-pane fade show active" id="v-pills-rw" role="tabpanel" aria-labelledby="v-pills-rw-tab">
                            <form id="rp">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3 mb-3">
                                            <label for="plafond" class="form-label">Plafond (Rp.)</label>
                                            <input type="text" class="form-control" id="plafond" name="plafond" placeholder="Cth : 12000000">
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
                                        <div class="col-md-2 mb-3">
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
                                        //untuk menampilkan pesan error ketika kosong
                                        <p class="text-danger" id="err_sejarah"></p>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="btn_rp" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
							<p class="box">* Jika tidak ada riwayat pinjaman, maka silahkan dikosongi dan lanjut ke character</p>
							<br>
							<div id="reload">
								<table class="table" id="dataRw">
									<thead>
										<tr>
											<th scope="col">Plafond</th>
											<th scope="col">Status</th>
											<th scope="col">Saldo</th>
											<th scope="col">Aksi</th>
										</tr>
									</thead>
									<tbody id="show_data">
									</tbody>
								</table>
							</div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-character" role="tabpanel" aria-labelledby="v-pills-character-tab">
                            <form id="character">
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
                                    <button type="button" id="btn_character" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
							<p class="box">* Untuk informasi karakter jika hanya 1 atau 2 saja, kolom yang lain dikosongi saja</p>
							<br>
							<div id="reload">
								<table class="table" id="dataChar">
									<thead>
										<tr>
											<th scope="col">Info Pribadi</th>
											<th scope="col">Info Perilaku</th>
											<th scope="col">Info Keluarga</th>
											<th scope="col">Aksi</th>
										</tr>
									</thead>
									<tbody id="show_data_char">
									</tbody>
								</table>
							</div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-capacity" role="tabpanel" aria-labelledby="v-pills-capacity-tab">
                            <form id="capacity" class="box">
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
                                            <option value="Konsumtif">Konsumtif</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="bidang" class="form-label">Bidang Usaha</label>
                                        <input type="text" class="form-control" id="bidang" name="bidang">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="alamat_usaha" class="form-label">Alamat Usaha / Kantor</label>
                                        <textarea class="form-control" id="alamat_usaha" name="alamat_usaha"></textarea>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="status_usaha" class="form-label">Status Tempat Usaha / Kantor</label>
                                        <select class="form-control" aria-label="Default select example" id="status_usaha" name="status_usaha">
                                            <option value="Milik Sendiri">Milik Sendiri</option>
                                            <option value="Milik Keluarga/Ortu">Milik Keluarga/Ortu</option>
                                            <option value="Instansi">Instansi</option>
                                            <option value="Kontrak">Kontrak</option>
                                            <option value="Kredit">Kredit</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="tlp_usaha" class="form-label">No. Tlp Usaha / Kantor</label>
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
                                    <button type="button" id="btn_capacity" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
							<div id="reload">
								<table class="table" id="dataCapa">
									<thead>
										<tr>
											<th scope="col">Nama Usaha</th>
											<th scope="col">Sektor</th>
											<th scope="col">Tgl Mulai Usaha</th>
											<th scope="col">Aksi</th>
										</tr>
									</thead>
									<tbody id="show_data_capa">
									</tbody>
								</table>
							</div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-capital" role="tabpanel" aria-labelledby="v-pills-capital-tab">
                            <form id="capital">
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
                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="btn_capital" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
							<p class="box">* Tidak boleh kosong, isi dengan 0</p>
							<div id="reload">
								<table class="table" id="dataCapi">
									<thead>
										<tr>
											<th scope="col">Kas</th>
											<th scope="col">Tanah</th>
											<th scope="col">Hutang Jangka Pendek</th>
											<th scope="col">Aksi</th>
										</tr>
									</thead>
									<tbody id="show_data_capi">
									</tbody>
								</table>
							</div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-cashflow" role="tabpanel" aria-labelledby="v-pills-cashflow-tab">
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
                                        <form id="cashflow2">
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
                                                    <label for="nopol" class="form-label">Digunakan Untuk</label>
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
                                                    <input type="text" class="form-control" id="keterangan" name="keterangan">
                                                    <input type="hidden" class="form-control" id="id_lb" name="id_lb" value="<?php echo $id_lb; ?>">
                                                    <input type="hidden" class="form-control" id="nama_perkiraan_cp" name="nama_perkiraan_cp">
                                                    <input type="hidden" class="form-control" id="nama_perkiraan_cp2" name="nama_perkiraan_cp2">
                                                    <input type="hidden" class="form-control" id="jenis" name="jenis" value="pendapatan">
                                                </div>
                                                <div class="col-md-8 mb-4">
                                                    <label for="saldo" class="form-label">Sebesar</label>
                                                    <input type="number" class="form-control" id="saldo" name="saldo">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" id="simpan2" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="pills-profile_c" role="tabpanel" aria-labelledby="pills-profile_c-tab">
                                        <form id="cashflowp2">
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
                                                    <label for="nopol" class="form-label">Digunakan Untuk</label>
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
                                                    <input type="text" class="form-control" id="keteranganp" name="keteranganp">
                                                    <input type="hidden" class="form-control" id="id_lb" name="id_lb" value="<?php echo $id_lb; ?>">
                                                    <input type="hidden" class="form-control" id="nama_perkiraan_cpe" name="nama_perkiraan_cpe">
                                                    <input type="hidden" class="form-control" id="nama_perkiraan_cpe2" name="nama_perkiraan_cpe2">
                                                    <input type="hidden" class="form-control" id="jenisp" name="jenisp" value="pengeluaran">
                                                </div>
                                                <div class="col-md-8 mb-4">
                                                    <label class="form-label">Sebesar</label>
                                                    <input type="number" class="form-control" id="saldop" name="saldop">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" id="simpanp2" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="pills-hutang" role="tabpanel" aria-labelledby="pills-hutang-tab">
                                        <form id="hutang">
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
                                                    <input type="text" class="form-control" id="keterangan" name="keterangan">
                                                    <input type="hidden" class="form-control" id="id_lb" name="id_lb" value="<?php echo $id_lb; ?>">
                                                    <input type="hidden" class="form-control" id="nama_perkiraan_hutang" name="nama_perkiraan_hutang">
                                                    <input type="hidden" class="form-control" id="nama_perkiraan_hutang2" name="nama_perkiraan_hutang2">
                                                    <input type="hidden" class="form-control" id="jenis" name="jenis" value="hutang">
                                                </div>
                                                <div class="col-md-8 mb-4">
                                                    <label class="form-label">Sebesar</label>
                                                    <input type="number" class="form-control" id="saldo" name="saldo">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" id="btn_hutang" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-condition" role="tabpanel" aria-labelledby="v-pills-condition-tab">
                            <form id="condition" class="box">
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
                                    <button type="button" id="btn_condition" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
							<div id="reload">
								<table class="table" id="dataCon">
									<thead>
										<tr>
											<th scope="col">Kekuatan</th>
											<th scope="col">Kelemahan</th>
											<th scope="col">Peluang</th>
											<th scope="col">Aksi</th>
										</tr>
									</thead>
									<tbody id="show_data_con">

									</tbody>
								</table>
							</div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-collateralt" role="tabpanel" aria-labelledby="v-pills-collateralt-tab">
                            <form id="collateralt">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-4 mb-4">
                                            <label for="jenis" class="form-label">Jenis</label>
                                            <input type="hidden" class="form-control" id="id_lb" name="id_lb" value="<?php echo $id_lb; ?>">
                                            <input type="text" class="form-control" id="jenis" name="jenis">
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <label for="nama" class="form-label">Nama Pemilik</label>
                                            <input type="text" class="form-control" id="nama" name="nama">
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <label for="no_shm" class="form-label">No. SHM</label>
                                            <input type="text" class="form-control" id="no_shm" name="no_shm">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 mb-4">
                                            <label for="luas_t" class="form-label">Luas Tanah (M2)</label>
                                            <input type="text" class="form-control" id="luas_t" name="luas_t" required>
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <label for="luas_b" class="form-label">Luas Bangunan (M2)</label>
                                            <input type="text" class="form-control" id="luas_b" name="luas_b" required>
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <label for="harga_t2" class="form-label">Harga Tanah Pasar (Rp.)</label>
                                            <input type="text" class="form-control" id="harga_t2" name="harga_t2" required placeholder="Harga per Meter">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 mb-4">
                                            <label for="harga_b2" class="form-label">Harga Bangunan Pasar (Rp.)</label>
                                            <input type="text" class="form-control" id="harga_b2" name="harga_b2" required placeholder="Harga per Meter">
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <label for="harga_t" class="form-label">Harga Tanah SPPT (Rp.)</label>
                                            <input type="text" class="form-control" id="harga_t" name="harga_t" required placeholder="Harga per Meter">
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <label for="harga_b" class="form-label">Harga Bangunan SPPT (Rp.)</label>
                                            <input type="text" class="form-control" id="harga_b" name="harga_b" required placeholder="Harga per Meter">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 mb-4">
                                            <label for="tgl_ukur" class="form-label">Tgl Surat Ukur</label>
                                            <input type="date" class="form-control" id="tgl_ukur" name="tgl_ukur">
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <label for="no_ukur" class="form-label">No. Surat Ukur</label>
                                            <input type="text" class="form-control" id="no_ukur" name="no_ukur">
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <label for="milik" class="form-label">Hak Milik</label>
                                            <input type="text" class="form-control" id="milik" name="milik">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 mb-4">
                                            <label for="ht" class="form-label">Nilai HT (Rp.)</label>
                                            <input type="number" class="form-control" id="ht" name="ht" required>
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <label for="taksasi" class="form-label">Taksasi (%)</label>
                                            <input type="number" class="form-control" id="taksasi" name="taksasi" required placeholder="Contoh : 70">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-4">
                                        <label for="alamat" class="form-label">Alamat Pemilik</label>
                                        <textarea class="form-control" id="alamat" name="alamat"></textarea>
                                    </div>
                                    <div class="col-md-12 mb-4">
                                        <label for="lokasi" class="form-label">Lokasi Jaminan</label>
                                        <textarea class="form-control" id="lokasi" name="lokasi"></textarea>
                                    </div>
                                    <div class="col-md-12 mb-4">
                                        <label for="fisik_jaminan" class="form-label">Keterangan</label>
                                        <textarea class="form-control" id="fisik_jaminan" name="fisik_jaminan" placeholder="Contoh : Sebidang tanah pertanian yang ......"></textarea>
                                    </div>
                                    <div class="col-md-12 mb-4">
                                        <label for="pertimbangan" class="form-label">Usulan</label>
                                        <textarea class="form-control" id="usulan" name="usulan"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="btn_collateralt" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
							<p class="box">* Jika harga atau luas tidak ada, harap isi dengan 0</p>
							<div id="reload">
								<table class="table" id="dataColta">
									<thead>
										<tr>
											<th scope="col">Jenis</th>
											<th scope="col">Nama</th>
											<th scope="col">No. SHM</th>
											<th scope="col">Aksi</th>
										</tr>
									</thead>
									<tbody id="show_data_colta">
									</tbody>
								</table>
							</div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-collateralk" role="tabpanel" aria-labelledby="v-pills-collateralk-tab">
                            <form id="collateralk" class="box">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-3 mb-4">
                                            <label for="status" class="form-label">Roda</label>
                                            <select class="form-control" aria-label="Default select example" id="roda" name="roda">
                                                <option value=""></option>
                                                <option value="2 (Dua)">2</option>
                                                <option value="4 (Empat)">4</option>
                                                <option value="6 (Enam)">6</option>
                                                <option value="8 (Delapan)">8</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-4">
                                            <label for="nopol" class="form-label">Nomor Polisi</label>
                                            <input type="hidden" class="form-control" id="id_lb" name="id_lb" value="<?php echo $id_lb; ?>">
                                            <input type="text" class="form-control" id="nopol" name="nopol">
                                        </div>
                                        <div class="col-md-3 mb-4">
                                            <label for="nama_stnk" class="form-label">Nama di STNK</label>
                                            <input type="text" class="form-control" id="nama_stnk" name="nama_stnk">
                                        </div>
                                        <div class="col-md-3 mb-4">
                                            <label for="tahun" class="form-label">Tahun</label>
                                            <input type="year" class="form-control" id="tahun" name="tahun">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 mb-4">
                                            <label for="silinder" class="form-label">Isi Silinder</label>
                                            <input type="text" class="form-control" id="silinder" name="silinder">
                                        </div>
                                        <div class="col-md-3 mb-4">
                                            <label for="no_rangka" class="form-label">No. Rangka</label>
                                            <input type="text" class="form-control" id="no_rangka" name="no_rangka">
                                        </div>
                                        <div class="col-md-3 mb-4">
                                            <label for="no_mesin" class="form-label">No. Mesin</label>
                                            <input type="text" class="form-control" id="no_mesin" name="no_mesin">
                                        </div>
                                        <div class="col-md-3 mb-4">
                                            <label for="no_bpkb" class="form-label">No. BPKB</label>
                                            <input type="text" class="form-control" id="no_bpkb" name="no_bpkb">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 mb-4">
                                            <label for="type" class="form-label">Merk / Type</label>
                                            <input type="text" class="form-control" id="type" name="type">
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <label for="jenis" class="form-label">Jenis / Model</label>
                                            <input type="text" class="form-control" id="jenis" name="jenis">
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <label for="warna" class="form-label">Warna</label>
                                            <input type="text" class="form-control" id="warna" name="warna">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 mb-4">
                                            <label for="taksiran" class="form-label">Harga Pasaran</label>
                                            <input type="number" class="form-control" id="taksiran" name="taksiran" required>
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <label for="nl" class="form-label">NL</label>
                                            <input type="number" class="form-control" id="nl" name="nl">
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <label for="milik" class="form-label">Hak Milik</label>
                                            <input type="text" class="form-control" id="milik" name="milik">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-4">
                                        <label for="alamat" class="form-label">Alamat Pemilik</label>
                                        <textarea class="form-control" id="alamat" name="alamat"></textarea>
                                    </div>
                                    <div class="col-md-12 mb-4">
                                        <label for="kondisi" class="form-label">Usulan</label>
                                        <textarea class="form-control" id="usulan" name="usulan"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="btn_collateralk" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
							<div id="reload">
								<table class="table" id="dataColken">
									<thead>
										<tr>
											<th scope="col">Nopol</th>
											<th scope="col">Nama</th>
											<th scope="col">Type</th>
											<th scope="col">Aksi</th>
										</tr>
									</thead>
									<tbody id="show_data_colken">
									</tbody>
								</table>
							</div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-usulan" role="tabpanel" aria-labelledby="v-pills-usulan-tab">
                            <div class="modal-body">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="pills-realisasi-tab" data-toggle="pill" href="#pills-realisasi" role="tab" aria-controls="pills-realisasi" aria-selected="false">Realisasi Oleh</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="pills-usulan-tab" data-toggle="pill" href="#pills-usulan" role="tab" aria-controls="pills-usulan" aria-selected="true">Usulan</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-realisasi" role="tabpanel" aria-labelledby="pills-realisasi-tab">
                                        <form id="realisasi" class="box">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-7 mb-3">
                                                        <label for="oleh" class="form-label">Nama</label>
                                                        <input type="text" class="form-control" id="oleh" name="oleh">
                                                        <input type="hidden" class="form-control" id="id_lb" name="id_lb" value="<?php echo $id_lb; ?>">
                                                    </div>
                                                    <div class="col-md-5 mb-3">
                                                        <label for="sebagai" class="form-label">Sebagai</label>
                                                        <input type="text" class="form-control" id="sebagai" name="sebagai">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" id="btn_realisasi" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                        <div id="reload">
                                            <table class="table" id="dataReal">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Oleh</th>
                                                        <th scope="col">Sebagai</th>
                                                        <th scope="col">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="show_data_real">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-usulan" role="tabpanel" aria-labelledby="pills-usulan-tab">
                                        <form method="post" action="<?php echo base_url('usulan/add'); ?>" class="box" id="usulan_las">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-3 mb-4">
                                                        <label for="character" class="form-label">Character</label>
                                                        <input type="text" class="form-control" id="character" name="character">
                                                        <input type="hidden" class="form-control" id="id_lb" name="id_lb" value="<?php echo $id_lb; ?>">
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
                                                        <label for="coe" class="form-label">Condition</label>
                                                        <input type="text" class="form-control" id="coe" name="coe">
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-3 mb-4">
                                                        <label for="collateral" class="form-label">Collateral</label>
                                                        <input type="text" class="form-control" id="collateral" name="collateral">
                                                    </div>
                                                    <div class="col-md-4 mb-4">
                                                        <label for="realisasi" class="form-label">Tanggal Ralisasi</label>
                                                        <input type="date" class="form-control" id="realisasi" name="realisasi">
                                                    </div>
                                                    <div class="col-md-5 mb-4">
                                                        <label for="plafond" class="form-label">Plafond</label>
                                                        <input type="number" class="form-control" id="plafond" name="plafond">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3 mb-4">
                                                        <label for="waktu" class="form-label">Jangka Waktu (Bln)</label>
                                                        <input type="number" class="form-control" id="waktu" name="waktu">
                                                    </div>
                                                    <div class="col-md-3 mb-4">
                                                        <label for="bunga" class="form-label">Bunga</label>
                                                        <input type="text" class="form-control" id="bunga" name="bunga">
                                                    </div>
                                                    <div class="col-md-3 mb-4">
                                                        <label for="provisi" class="form-label">Provisi (%)</label>
                                                        <input type="text" class="form-control" id="provisi" name="provisi" placeholder="Contoh : 0.5">
                                                    </div>
                                                    <div class="col-md-3 mb-4">
                                                        <label for="administrasi" class="form-label">Administrasi (%)</label>
                                                        <input type="text" class="form-control" id="administrasi" name="administrasi" placeholder="Contoh : 0.75">
                                                    </div>
                                                </div>          
                                                <hr>  
                                                <div class="row">
                                                    <div class="col-md-4 mb-4">
                                                        <label for="asuransi" class="form-label">Asuransi</label>
                                                        <input type="text" class="form-control" id="asuransi" name="asuransi">
                                                    </div>
                                                    <div class="col-md-4 mb-4">
                                                        <label for="materai" class="form-label">Materai</label>
                                                        <input type="text" class="form-control" id="materai" name="materai">
                                                    </div>
                                                    <div class="col-md-4 mb-4">
                                                        <label for="apht" class="form-label">APHT</label>
                                                        <input type="text" class="form-control" id="apht" name="apht">
                                                    </div>
                                                </div> 
                                                <div class="row">
                                                    <div class="col-md-4 mb-4">
                                                        <label for="skmht" class="form-label">SKMHT</label>
                                                        <input type="text" class="form-control" id="skmht" name="skmht">
                                                    </div>                                   
                                                    <div class="col-md-4 mb-4">
                                                        <label for="titipan" class="form-label">Biaya SKMHT ke APHT</label>
                                                        <input type="text" class="form-control" id="titipan" name="titipan">
                                                    </div>
                                                    <div class="col-md-4 mb-4">
                                                        <label for="fiduciare" class="form-label">Fiduciare Didaftarkan</label>
                                                        <input type="text" class="form-control" id="fiduciare" name="fiduciare">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4 mb-4">
                                                        <label for="legalisasi" class="form-label">Legalisasi</label>
                                                        <input type="text" class="form-control" id="legalisasi" name="legalisasi">
                                                    </div>
                                                    <div class="col-md-4 mb-4">
                                                        <label for="roya" class="form-label">Roya</label>
                                                        <input type="text" class="form-control" id="roya" name="roya">
                                                    </div>
                                                    <div class="col-md-4 mb-4">
                                                        <label for="lainnya" class="form-label">Lain -lain</label>
                                                        <input type="text" class="form-control" id="lainnya" name="lainnya">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4 mb-4">
                                                        <label for="notaris" class="form-label">Notaris</label>
                                                        <input type="text" class="form-control" id="notaris" name="notaris">
                                                    </div>
                                                </div>
                                                <p>* Harap isi dengan 0 jika tidak ada biaya</p>
                                                <div class="modal-footer">
                                                    <button type="submit" id="btn_usulan" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </div>
                                        </form>
                                        <div id="reload">
                                            <table class="table" id="dataUsul">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Character</th>
                                                        <th scope="col">Capacity</th>
                                                        <th scope="col">Capital</th>
                                                        <th scope="col">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="show_data_usul">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-print" role="tabpanel" aria-labelledby="v-pills-print-tab">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <a href="pdf_lb?id_lb=<?php echo $id_lb; ?>" class="btn btn-primary" target="_blank">1. Latar Belakang</i></a>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <a href="pdf_char?id_lb=<?php echo $id_lb; ?>" class="btn btn-primary" target="_blank">2. Character</i></a>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <a href="capacity/templateword?id_lb=<?php echo $id_lb; ?>" class="btn btn-primary">3. Capacity</i></a>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <a href="pdf_capiseb?id_lb=<?php echo $id_lb; ?>" class="btn btn-primary" target="_blank">4. Capital</i></a>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <a href="pdf_capiset?id_lb=<?php echo $id_lb; ?>" class="btn btn-primary" target="_blank">5. Capital Setelah</i></a>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <a href="pdf_coe?id_lb=<?php echo $id_lb; ?>" class="btn btn-primary" target="_blank">6. Condition</i></a>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <a href="pdf_collateral?id_lb=<?php echo $id_lb; ?>" class="btn btn-primary" target="_blank">7. Collateral</i></a>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <a href="pdf_usulan?id_lb=<?php echo $id_lb; ?>" class="btn btn-primary" target="_blank">8. Usulan</i></a>
                                    </div>
                                    <p>Harap cetak sesuai urutan.</p>
                                </div>
                            </div>
                        </div>
						-->
                        <div class="tab-pane fade show active" id="v-pills-cashflowa" role="tabpanel" aria-labelledby="v-pills-cashflowa-tab">
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
                                        <form id="cashflowawpend" class="box">
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
                                                    <label for="nopol" class="form-label">Digunakan Untuk</label>
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
                                                    <!--
                                                    <input type="text" class="form-control" id="kode" name="kode" value="<?php echo $kode; ?>">
                                                    -->
                                                    <input type="hidden" class="form-control" id="jenis" name="jenis" value="pendapatan">
                                                </div>
                                                <div class="col-md-8 mb-4">
                                                    <label for="nama_stnk" class="form-label">Sebesar</label>
                                                    <input type="number" class="form-control" id="saldo" name="saldo">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" id="btn_cashawpend" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
										<div id="reload">
											<table class="table" id="dataCashawpend">
												<thead>
													<tr>
														<th scope="col">Keterangan</th>
														<th scope="col">Saldo</th>
														<th scope="col">Jenis</th>
														<th scope="col">Aksi</th>
													</tr>
												</thead>
												<tbody id="show_data_cashawpend">

												</tbody>
											</table>
										</div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                        <form id="cashflowawpeng" class="box">
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
                                                    <label for="nopol" class="form-label">Digunakan Untuk</label>
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
                                                    <input type="hidden" class="form-control" id="id_lb" name="id_lb" value="<?php echo $id_lb; ?>">
                                                    <input type="hidden" class="form-control" id="nama_perkiraanp" name="nama_perkiraanp">
                                                    <input type="hidden" class="form-control" id="nama_perkiraanp2" name="nama_perkiraanp2">
                                                    <!--
                                                    <input type="hidden" class="form-control" id="kodep" name="kodep" value="<?php echo $kode; ?>"> -->
                                                    <input type="hidden" class="form-control" id="jenisp" name="jenisp" value="pengeluaran">
                                                </div>
                                                <div class="col-md-8 mb-4">
                                                    <label for="nama_stnk" class="form-label">Sebesar</label>
                                                    <input type="number" class="form-control" id="saldop" name="saldop">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" id="btn_cashawpeng" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
										<div id="reload">
											<table class="table" id="dataCashawpeng">
												<thead>
													<tr>
														<th scope="col">Keterangan</th>
														<th scope="col">Saldo</th>
														<th scope="col">Jenis</th>
														<th scope="col">Aksi</th>
													</tr>
												</thead>
												<tbody id="show_data_cashawpeng">

												</tbody>
											</table>
										</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  
	<!-- Modal edit cashflow awal pengeluaran-->
	<div class="modal fade" id="editcashawpeng" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Usulan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form id="form_cashflowawpeng">
					<div class="modal-body">
						<div class="col-md-8 mb-4">
							<label for="dari" class="form-label">Menggunakan uang dari</label>
							<select class="form-control" aria-label="Default select example" id="koper_awpeng" name="koper_awpeng" onchange="return js_koper_awpeng();">
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
							<label for="nopol" class="form-label">Digunakan Untuk</label>
							<select class="form-control" aria-label="Default select example" id="koper_awpeng2" name="koper_awpeng2" onchange="return js_koper_awpeng2();">
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
							<input type="text" class="form-control" id="keterangan_awpeng" name="keterangan_awpeng">
							<input type="text" class="form-control" id="id_cf_awpeng" name="id_cf_awpeng">
							<input type="text" class="form-control" id="id_lb2" name="id_lb">
							<input type="text" class="form-control" id="naper_awpeng" name="naper_awpeng">
							<input type="text" class="form-control" id="naper_awpeng2" name="naper_awpeng2">
							<input type="text" class="form-control" id="kode_awpeng" name="kode_awpeng">
							<input type="text" class="form-control" id="jenis_awpeng" name="jenis_awpeng" value="pengeluaran">
						</div>
						<div class="col-md-8 mb-4">
							<label for="saldo" class="form-label">Sebesar</label>
							<input type="number" class="form-control" id="saldo_awpeng" name="saldo_awpeng">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" id="btn_edit_cashawpeng" class="btn btn-primary">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!--END MODAL EDIT-->

	<!--MODAL HAPUS cashflow awal pendapatan-->
	<div class="modal fade" id="deletecashawpeng" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="exampleModalLabel">Hapus Data</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
				</div>
				<form class="form-horizontal">
					<div class="modal-body">

						<input type="hidden" name="kode_cashawpeng" id="textkode_cashawpeng" value="">
						<input type="hidden" id="id_lb" name="id_lb" value="<?php echo $id_lb; ?>">
						<div class="alert alert-warning">
							<p>Apakah Anda yakin mau menghapus data ini?</p>
						</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
						<button class="btn btn-danger" id="btn_hapus_cashawpeng">Hapus</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!--END MODAL HAPUS-->


    <script type="text/javascript">
        //JS untuk menyimpan data ke database dan reset form

		//cashflow awal pengeluaran
		$(document).ready(function() {
			tampil_data_cashawpeng(); //pemanggilan fungsi tampil cashflow awal.

			$('#dataCashawpeng').dataTable();

			//fungsi tampil cashflow awal pengeluaran
			function tampil_data_cashawpeng() {
				var id_lb = <?php echo $id_lb; ?>;
				$.ajax({
					type: 'POST',
					url: '<?php echo base_url() ?>cashflow/data_cashawpeng',
					async: true,
					dataType: 'json',
					data: {
						id_lb: id_lb
					},
					success: function(data) {
						var html = '';
						var i;
						for (i = 0; i < data.length; i++) {
							html += '<tr>' +
								'<td>' + data[i].keterangan + '</td>' +
								'<td>' + data[i].saldo + '</td>' +
								'<td>' + data[i].jenis + '</td>' +
								'<td style="text-align:right;">' +
								'<a href="javascript:;" class="btn btn-info btn-xs item_edit_cashawpeng" data="' + data[i].id_cf + '">Edit</a>' + ' ' +
								'<a href="javascript:;" class="btn btn-danger btn-xs item_hapus_cashawpeng" data="' + data[i].kode + '">Hapus</a>' +
								'</td>' +
								'</tr>';
						}
						$('#show_data_cashawpeng').html(html);
					}

				});
			}

			//simpan cashflow awal pengeluaran
			$('#btn_cashawpeng').on('click', function() {
				var cashflowawpeng = $('#cashflowawpeng').serialize();
				$.ajax({
						url: "<?php echo base_url(); ?>cashflow/seleksi_cashawpeng",
						type: "POST",
						data: cashflowawpeng,
						dataType: "JSON",
						success: function(data) {
							console.log(data)
						}
					}),
					tampil_data_cashawpeng();
					document.getElementById("cashflowawpeng").reset();
			});

			//GET UPDATE cashflow awal pengeluaran
			$('#show_data_cashawpeng').on('click', '.item_edit_cashawpeng', function() {
				var id = $(this).attr('data');
				$.ajax({
					type: "GET",
					url: "<?php echo base_url('cashflow/get_cashawpeng') ?>",
					dataType: "JSON",
					data: {
						id: id
					},
					success: function(data) {
						$.each(data, function(id_cf,id_lb , kode, kode_perkiraan, nama_perkiraan, keterangan, saldo) {
							$('#editcashawpeng').modal('show');
							$('[name="id_cf_awpeng"]').val(data.id_cf);
							$('[name="id_lb"]').val(data.id_lb);
							$('[name="kode_awpeng"]').val(data.kode);
							$('[name="koper_awpeng"]').val(data.kode_perkiraan);
							$('[name="naper_awpeng"]').val(data.nama_perkiraan);
							$('[name="keterangan_awpeng"]').val(data.keterangan);
							$('[name="saldo_awpeng"]').val(data.saldo);
						});
					}
				});
				return false;
			});
			
			//Update cashflow awal pengeluaran
			$('#btn_edit_cashawpeng').on('click', function() {
				var id_cf = $('#id_cf_awpeng').val();
				var id_lb = $('#id_lb2').val();
				var kode = $('#kode_awpeng').val();
				var koper_awpeng = $('#koper_awpeng').val();
				var koper_awpeng2 = $('#koper_awpeng2').val();
				var keterangan = $('#keterangan_awpeng').val();
				var naper_awpeng = $('#naper_awpeng').val();
				var naper_awpeng2 = $('#naper__awpeng2').val();
				var jenis = $('#jenis_awpeng').val();
				var saldo = $('#saldo_awpeng').val();
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('cashflow/update_cashawpeng') ?>",
					dataType: "text", //update gagal ketika diklik simpan data berubah tapi modal tidak hilang, karena datatype json,lalu ganti ke text dan akhirnya bisa jalan
					data: {
						id_cf: id_cf,
						id_lb: id_lb,
						kode: kode,
						koper_awpeng: koper_awpeng,
						koper_awpeng2: koper_awpeng2,
						keterangan: keterangan,
						naper_awpeng: naper_awpeng,
						naper_awpeng2: naper_awpeng2,
						jenis: jenis,
						saldo: saldo,
					},
					success: function(data) {
						document.getElementById("cashflowawpeng").reset();
						document.getElementById("form_cashflowawpeng").reset();
						$('#editcashawpeng').modal('hide');
						tampil_data_cashawpeng();
					}
				});
				return false;
			});

			//GET HAPUS pengeluaran
			$('#show_data_cashawpeng').on('click', '.item_hapus_cashawpeng', function() {
				var id = $(this).attr('data');
				$('#deletecashawpeng').modal('show');
				$('[name="kode_cashawpeng"]').val(id);
			});

			//Hapus pengeluaran
			$('#btn_hapus_cashawpeng').on('click', function() {
				var kode = $('#textkode_cashawpeng').val();
				var id_lb = $('#id_lb').val();
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('cashflow/delete_cashawpeng') ?>",
					dataType: "JSON",
					data: {
						kode: kode,
						id_lb: id_lb,
					},
					success: function(data) {
						$('#deletecashawpeng').modal('hide');
						tampil_data_cashawpend();
					}
				});
				return false;
			});

		});

        //riwayat
        $(document).ready(function() {
            tampil_data_rp(); //pemanggilan fungsi tampil riwayat.
            $('#dataRw').dataTable();

            //fungsi tampil riwayat
            function tampil_data_rp() {
                var id_lb = <?php echo $id_lb; ?>;
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url() ?>kredit/data_rw',
                    async: true,
                    dataType: 'json',
                    data: {
                        id_lb: id_lb
                    },
                    success: function(data) {
                        var html = '';
                        var i;
                        for (i = 0; i < data.length; i++) {
                            html += '<tr>' +
                                '<td>' + data[i].plafond + '</td>' +
                                '<td>' + data[i].status + '</td>' +
                                '<td>' + data[i].saldo + '</td>' +
                                '<td style="text-align:right;">' +
                                '<a href="javascript:;" class="btn btn-info btn-xs item_edit_rp" data="' + data[i].id_rp + '">Edit</a>' + ' ' +
                                '<a href="javascript:;" class="btn btn-danger btn-xs item_hapus_rp" data="' + data[i].id_rp + '">Hapus</a>' +
                                '</td>' +
                                '</tr>';
                        }
                        $('#show_data').html(html);
                    }

                });
            }

            $('#close_rp').on('click', function() {
                document.getElementById("rp").reset();
            })

			//simpan riwayat
            $('#btn_rp').on('click', function() {
                var rp = $('#rp').serialize(); 
                //mengambil data dari input sejarah lalu jika kosong akan tampil error,jika ada isinya akan input ke database
                var sejarah = document.getElementById("sejarah").value;
                if (sejarah=="") {
                    document.getElementById("err_sejarah").innerHTML = "Data Kosong!";
                } else {
                    $.ajax({
                        url: "<?php echo base_url(); ?>kredit/add_rw",
                        type: "POST",
                        data: rp,
                        dataType: "JSON",
                        success: function(data) {
                            console.log(data)
                        }
                    }),
                    
				    tampil_data_rp();
                    document.getElementById("rp").reset();
                    //menghapus pesan error sebelumnya
                    document.getElementById("err_sejarah").innerHTML = "";
                }
            })
            
			//GET UPDATE riwayat
			$('#show_data').on('click', '.item_edit_rp', function() {
				var id = $(this).attr('data');
				$.ajax({
					type: "GET",
					url: "<?php echo base_url('kredit/get_rp') ?>",
					dataType: "JSON",
					data: {
						id: id
					},
					success: function(datarp) {
						$.each(datarp, function(id_rp, id_lb, plafond, status, saldo, sejarah, data) {
							$('#editrp').modal('show');
							$('[name="id_rp"]').val(datarp.id_rp);
							$('[name="id_lb"]').val(datarp.id_lb);
							$('[name="plafond"]').val(datarp.plafond);
							$('[name="status"]').val(datarp.status);
							$('[name="saldo"]').val(datarp.saldo);
							$('[name="sejarah"]').val(datarp.sejarah);
							$('[name="data"]').val(datarp.data);
						});
					}
				});
				return false;
			});
            
			//Update riwayat
			$('#btn_edit_rp').on('click', function() {
				var id_rp = $('#id_rp2').val();
				var id_lb = $('#id_lb2').val();
				var plafond = $('#plafond2').val();
				var status = $('#status2').val();
				var sejarah = $('#sejarah2').val();
				var saldo = $('#saldo2').val();
				var data = $('#data2').val();
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('kredit/update_rp') ?>",
					dataType: "JSON",
					data: {
						id_rp: id_rp,
						id_lb: id_lb,
						plafond: plafond,
						status: status,
						sejarah: sejarah,
						saldo: saldo,
						data: data
					},
					success: function(data) {
						document.getElementById("rp").reset();
						document.getElementById("form_rp").reset();
						$('#editrp').modal('hide');
						tampil_data_rp();
					}
				});
				return false;
			});

			//GET HAPUS
			$('#show_data').on('click', '.item_hapus_rp', function() {
				var id = $(this).attr('data');
				$('#deleterp').modal('show');
				$('[name="kode_rp"]').val(id);
			});

			//Hapus riwayat
			$('#btn_hapus_rp').on('click', function() {
				var kode = $('#textkode_rp').val();
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('kredit/delete_rp') ?>",
					dataType: "JSON",
					data: {
						kode: kode
					},
					success: function(data) {
						$('#deleterp').modal('hide');
						tampil_data_rp();
					}
				});
				return false;
			});

        });

        //character
        $(document).ready(function() {			
            tampil_data_char(); //pemanggilan fungsi tampil character.

			$('#dataChar').dataTable();

			//fungsi tampil character
			function tampil_data_char() {
				var id_lb = <?php echo $id_lb; ?>;
				$.ajax({
					type: 'POST',
					url: '<?php echo base_url() ?>character/data_char',
					async: true,
					dataType: 'json',
					data: {
						id_lb: id_lb
					},
					success: function(data) {
						var html = '';
						var i;
						for (i = 0; i < data.length; i++) {
							html += '<tr>' +
								'<td>' + data[i].info_pribadi + '</td>' +
								'<td>' + data[i].info_perilaku + '</td>' +
								'<td>' + data[i].info_keluarga + '</td>' +
								'<td style="text-align:right;">' +
								'<a href="javascript:;" class="btn btn-info btn-xs item_edit_char" data="' + data[i].id_char + '">Edit</a>' + ' ' +
								'<a href="javascript:;" class="btn btn-danger btn-xs item_hapus_char" data="' + data[i].id_char + '">Hapus</a>' +
								'</td>' +
								'</tr>';
						}
						$('#show_data_char').html(html);
					}

				});
			}

            $('#close_char').on('click', function() {
                document.getElementById("character").reset();
            })

			//simpan character
            $('#btn_character').on('click', function() {
                var character = $('#character').serialize();
                $.ajax({
                        url: "<?php echo base_url(); ?>character/add",
                        type: "POST",
                        data: character,
                        dataType: "JSON",
                        success: function(data) {
                            console.log(data)
                        }
                    }),
					tampil_data_char();
				    document.getElementById("character").reset();
            })
            
			//GET UPDATE character
			$('#show_data_char').on('click', '.item_edit_char', function() {
				var id = $(this).attr('data');
				$.ajax({
					type: "GET",
					url: "<?php echo base_url('character/get_char') ?>",
					dataType: "JSON",
					data: {
						id: id
					},
					success: function(data) {
						$.each(data, function(id_char, id_lb, info_pribadi, info_perilaku, info_keluarga, nm1, nm2, nm3, al1, al2, al3, hp1, hp2, hp3) {
							$('#editchar').modal('show');
							$('[name="id_char"]').val(data.id_char);
							$('[name="id_lb"]').val(data.id_lb);
							$('[name="info_pribadi"]').val(data.info_pribadi);
							$('[name="info_perilaku"]').val(data.info_perilaku);
							$('[name="info_keluarga"]').val(data.info_keluarga);
							$('[name="nm1"]').val(data.nm1);
							$('[name="nm2"]').val(data.nm2);
							$('[name="nm3"]').val(data.nm3);
							$('[name="al1"]').val(data.al1);
							$('[name="al2"]').val(data.al2);
							$('[name="al3"]').val(data.al3);
							$('[name="hp1"]').val(data.hp1);
							$('[name="hp2"]').val(data.hp2);
							$('[name="hp3"]').val(data.hp3);
						});
					}
				});
				return false;
			});

			//Update character
			$('#btn_edit_char').on('click', function() {
				var id_char = $('#id_char2').val();
				var id_lb = $('#id_lb2').val();
				var info_pribadi = $('#info_pribadi2').val();
				var info_perilaku = $('#info_perilaku2').val();
				var info_keluarga = $('#info_keluarga2').val();
				var nm1 = $('#nm12').val();
				var nm2 = $('#nm22').val();
				var nm3 = $('#nm32').val();
				var al1 = $('#al12').val();
				var al2 = $('#al22').val();
				var al3 = $('#al32').val();
				var hp1 = $('#hp12').val();
				var hp2 = $('#hp22').val();
				var hp3 = $('#hp32').val();
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('character/update_char') ?>",
					dataType: "JSON",
					data: {
						id_char: id_char,
						id_lb: id_lb,
						info_pribadi: info_pribadi,
						info_perilaku: info_perilaku,
						info_keluarga: info_keluarga,
						nm1: nm1,
						nm2: nm2,
						nm3: nm3,
						al1: al1,
						al2: al2,
						al3: al3,
						hp1: hp1,
						hp2: hp2,
						hp3: hp3,
					},
					success: function(data) {
						document.getElementById("character").reset();
						document.getElementById("form_char").reset();
						$('#editchar').modal('hide');
						tampil_data_char();
					}
				});
				return false;
			});

			//GET HAPUS
			$('#show_data_char').on('click', '.item_hapus_char', function() {
				var id = $(this).attr('data');
				$('#deletechar').modal('show');
				$('[name="kode_char"]').val(id);
			});

			//Hapus character
			$('#btn_hapus_char').on('click', function() {
				var kode = $('#textkode_char').val();
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('character/delete_char') ?>",
					dataType: "JSON",
					data: {
						kode: kode
					},
					success: function(data) {
						$('#deletechar').modal('hide');
						tampil_data_char();
					}
				});
				return false;
			});

        });

        //capacity
        $(document).ready(function() {
			tampil_data_capa(); //pemanggilan fungsi tampil capacity.

			$('#dataCapa').dataTable();

			//fungsi tampil capacity
			function tampil_data_capa() {
				var id_lb = <?php echo $id_lb; ?>;
				$.ajax({
					type: 'POST',
					url: '<?php echo base_url() ?>capacity/data_capa',
					async: true,
					dataType: 'json',
					data: {
						id_lb: id_lb
					},
					success: function(data) {
						var html = '';
						var i;
						for (i = 0; i < data.length; i++) {
							html += '<tr>' +
								'<td>' + data[i].nama_usaha + '</td>' +
								'<td>' + data[i].sektor + '</td>' +
								'<td>' + data[i].tgl_mulai + '</td>' +
								'<td style="text-align:right;">' +
								'<a href="javascript:;" class="btn btn-info btn-xs item_edit_capa" data="' + data[i].id_cap + '">Edit</a>' + ' ' +
								'<a href="javascript:;" class="btn btn-danger btn-xs item_hapus_capa" data="' + data[i].id_cap + '">Hapus</a>' +
								'</td>' +
								'</tr>';
						}
						$('#show_data_capa').html(html);
					}

				});
			}
            
            $('#close_capa').on('click', function() {
                document.getElementById("capacity").reset();
            })
            
			//simpan capacity
            $('#btn_capacity').on('click', function() {
                var capacity = $('#capacity').serialize();
                $.ajax({
                        url: "<?php echo base_url(); ?>capacity/add",
                        type: "POST",
                        data: capacity,
                        dataType: "JSON",
                        success: function(data) {
                            console.log(data)
                        }
                    }),
					tampil_data_char();
				    document.getElementById("capacity").reset();
            })
            
			//GET UPDATE capacity
			$('#show_data_capa').on('click', '.item_edit_capa', function() {
				var id = $(this).attr('data');
				$.ajax({
					type: "GET",
					url: "<?php echo base_url('capacity/get_capa') ?>",
					dataType: "JSON",
					data: {
						id: id
					},
					success: function(data) {
						$.each(data, function(id_cap, id_lb, nama_usaha, sektor, bidang,
							alamat_usaha, status_usaha, tlp_usaha, tgl_mulai, tgl_nasabah, akta, tgl_akta, npwp, tgl_npwp,
							usaha_skrg, alokasi1, alokasi2, alokasi3, dana1, dana2, dana3, usaha_realisasi) {
							$('#editcapa').modal('show');
							$('[name="id_cap"]').val(data.id_cap);
							$('[name="id_lb"]').val(data.id_lb);
							$('[name="nama_usaha"]').val(data.nama_usaha);
							$('[name="sektor"]').val(data.sektor);
							$('[name="bidang"]').val(data.bidang);
							$('[name="alamat_usaha"]').val(data.alamat_usaha);
							$('[name="status_usaha"]').val(data.status_usaha);
							$('[name="tlp_usaha"]').val(data.tlp_usaha);
							$('[name="tgl_mulai"]').val(data.tgl_mulai);
							$('[name="tgl_nasabah"]').val(data.tgl_nasabah);
							$('[name="akta"]').val(data.akta);
							$('[name="tgl_akta"]').val(data.tgl_akta);
							$('[name="npwp"]').val(data.npwp);
							$('[name="tgl_npwp"]').val(data.tgl_npwp);
							$('[name="usaha_skrg"]').val(data.usaha_skrg);
							$('[name="alokasi1"]').val(data.alokasi1);
							$('[name="alokasi2"]').val(data.alokasi2);
							$('[name="alokasi3"]').val(data.alokasi3);
							$('[name="dana1"]').val(data.dana1);
							$('[name="dana2"]').val(data.dana2);
							$('[name="dana3"]').val(data.dana3);
							$('[name="usaha_realisasi"]').val(data.usaha_realisasi);
						});
					}
				});
				return false;
			});

			//Update capacity
			$('#btn_edit_capa').on('click', function() {
				var id_cap = $('#id_cap2').val();
				var id_lb = $('#id_lb2').val();
				var nama_usaha = $('#nama_usaha2').val();
				var sektor = $('#sektor2').val();
				var bidang = $('#bidang2').val();
				var alamat_usaha = $('#alamat_usaha2').val();
				var status_usaha = $('#status_usaha2').val();
				var tlp_usaha = $('#tlp_usaha2').val();
				var tgl_mulai = $('#tgl_mulai2').val();
				var tgl_nasabah = $('#tgl_nasabah2').val();
				var akta = $('#akta2').val();
				var tgl_akta = $('#tgl_akta2').val();
				var npwp = $('#npwp2').val();
				var tgl_npwp = $('#tgl_npwp2').val();
				var usaha_skrg = $('#usaha_skrg2').val();
				var alokasi1 = $('#alokasi12').val();
				var alokasi2 = $('#alokasi22').val();
				var alokasi3 = $('#alokasi32').val();
				var dana1 = $('#dana12').val();
				var dana2 = $('#dana22').val();
				var dana3 = $('#dana32').val();
				var usaha_realisasi = $('#usaha_realisasi2').val();
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('capacity/update_capa') ?>",
					dataType: "text", //update gagal ketika diklik simpan data berubah tapi modal tidak hilang, karena datatype json,lalu ganti ke text dan akhirnya bisa jalan
					data: {
						id_cap: id_cap,
						id_lb: id_lb,
						nama_usaha: nama_usaha,
						sektor: sektor,
						bidang: bidang,
						alamat_usaha: alamat_usaha,
						status_usaha: status_usaha,
						tlp_usaha: tlp_usaha,
						tgl_mulai: tgl_mulai,
						tgl_nasabah: tgl_nasabah,
						akta: akta,
						tgl_akta: tgl_akta,
						npwp: npwp,
						tgl_npwp: tgl_npwp,
						usaha_skrg: usaha_skrg,
						alokasi1: alokasi1,
						alokasi2: alokasi2,
						alokasi3: alokasi3,
						dana1: dana1,
						dana2: dana2,
						dana3: dana3,
						usaha_realisasi: usaha_realisasi,
					},
					success: function(data) {
						document.getElementById("capacity").reset();
						document.getElementById("form_capa").reset();
						$('#editcapa').modal('hide');
						tampil_data_capa();
					}
				});
				return false;
			});

			//GET HAPUS
			$('#show_data_capa').on('click', '.item_hapus_capa', function() {
				var id = $(this).attr('data');
				$('#deletecapa').modal('show');
				$('[name="kode_capa"]').val(id);
			});

			//Hapus capacity
			$('#btn_hapus_capa').on('click', function() {
				var kode = $('#textkode_capa').val();
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('capacity/delete_capa') ?>",
					dataType: "JSON",
					data: {
						kode: kode
					},
					success: function(data) {
						$('#deletecapa').modal('hide');
						tampil_data_capa();
					}
				});
				return false;
			});

        });

        //capital
        $(document).ready(function() {
			tampil_data_capi(); //pemanggilan fungsi tampil capital.

			$('#dataCapi').dataTable();

			//fungsi tampil capital
			function tampil_data_capi() {
				var id_lb = <?php echo $id_lb; ?>;
				$.ajax({
					type: 'POST',
					url: '<?php echo base_url() ?>capital/data_capi',
					async: true,
					dataType: 'json',
					data: {
						id_lb: id_lb
					},
					success: function(data) {
						var html = '';
						var i;
						for (i = 0; i < data.length; i++) {
							html += '<tr>' +
								'<td>' + data[i].kas + '</td>' +
								'<td>' + data[i].tanah + '</td>' +
								'<td>' + data[i].hutang_jpk + '</td>' +
								'<td style="text-align:right;">' +
								'<a href="javascript:;" class="btn btn-info btn-xs item_edit_capi" data="' + data[i].id_capi + '">Edit</a>' + ' ' +
								'<a href="javascript:;" class="btn btn-danger btn-xs item_hapus_capi" data="' + data[i].id_capi + '">Hapus</a>' +
								'</td>' +
								'</tr>';
						}
						$('#show_data_capi').html(html);
					}

				});
			}
                        
            $('#close_capi').on('click', function() {
                document.getElementById("capital").reset();
            })

            //simpan capital
            $('#btn_capital').on('click', function() {
                var capital = $('#capital').serialize();
                $.ajax({
                        url: "<?php echo base_url(); ?>capital/add",
                        type: "POST",
                        data: capital,
                        dataType: "JSON",
                        success: function(data) {
                            console.log(data)
                        }
                    }),
					tampil_data_char();
				    document.getElementById("capital").reset();
            })
			//GET UPDATE capital
			$('#show_data_capi').on('click', '.item_edit_capi', function() {
				var id = $(this).attr('data');
				$.ajax({
					type: "GET",
					url: "<?php echo base_url('capital/get_capi') ?>",
					dataType: "JSON",
					data: {
						id: id
					},
					success: function(data) {
						$.each(data, function(id_capi, kas, tabungan, deposito,
							piutang, peralatan, barang, barang2, barang3, sewa, lahan, gedung, operasional,
							lain, tanah, bangunan, kendaraan, inventaris, lain2, hutang_jpk, hutang_jpg, hutang_lain, hutang_dagang) {
							$('#editcapi').modal('show');
							$('[name="id_capi"]').val(data.id_capi);
							$('[name="kas"]').val(data.kas);
							$('[name="tabungan"]').val(data.tabungan);
							$('[name="deposito"]').val(data.deposito);
							$('[name="piutang"]').val(data.piutang);
							$('[name="peralatan"]').val(data.peralatan);
							$('[name="barang"]').val(data.barang);
							$('[name="barang2"]').val(data.barang2);
							$('[name="barang3"]').val(data.barang3);
							$('[name="sewa"]').val(data.sewa);
							$('[name="lahan"]').val(data.lahan);
							$('[name="gedung"]').val(data.gedung);
							$('[name="operasional"]').val(data.operasional);
							$('[name="lain"]').val(data.lain);
							$('[name="tanah"]').val(data.tanah);
							$('[name="bangunan"]').val(data.bangunan);
							$('[name="kendaraan"]').val(data.kendaraan);
							$('[name="inventaris"]').val(data.inventaris);
							$('[name="lain2"]').val(data.lain2);
							$('[name="hutang_jpk"]').val(data.hutang_jpk);
							$('[name="hutang_jpg"]').val(data.hutang_jpg);
							$('[name="hutang_lain"]').val(data.hutang_lain);
							$('[name="hutang_dagang"]').val(data.hutang_dagang);
						});
					}
				});
				return false;
			});

			//Update capital
			$('#btn_edit_capi').on('click', function() {
				var id_capi = $('#id_capi2').val();
				var kas = $('#kas2').val();
				var tabungan = $('#tabungan2').val();
				var deposito = $('#deposito2').val();
				var piutang = $('#piutang2').val();
				var peralatan = $('#peralatan2').val();
				var barang = $('#barang2').val();
				var barang2 = $('#barang22').val();
				var barang3 = $('#barang32').val();
				var sewa = $('#sewa2').val();
				var lahan = $('#lahan2').val();
				var gedung = $('#gedung2').val();
				var operasional = $('#operasional2').val();
				var lain = $('#lain2').val();
				var tanah = $('#tanah2').val();
				var bangunan = $('#bangunan2').val();
				var kendaraan = $('#kendaraan2').val();
				var inventaris = $('#inventaris2').val();
				var lain2 = $('#lain22').val();
				var hutang_jpk = $('#hutang_jpk2').val();
				var hutang_jpg = $('#hutang_jpg2').val();
				var hutang_lain = $('#hutang_lain2').val();
				var hutang_dagang = $('#hutang_dagang2').val();
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('capital/update_capi') ?>",
					dataType: "json",
					data: {
						id_capi: id_capi,
						kas: kas,
						tabungan: tabungan,
						deposito: deposito,
						piutang: piutang,
						peralatan: peralatan,
						barang: barang,
						barang2: barang2,
						barang3: barang3,
						sewa: sewa,
						lahan: lahan,
						gedung: gedung,
						operasional: operasional,
						lain: lain,
						tanah: tanah,
						bangunan: bangunan,
						kendaraan: kendaraan,
						inventaris: inventaris,
						lain2: lain2,
						hutang_jpk: hutang_jpk,
						hutang_jpg: hutang_jpg,
						hutang_lain: hutang_lain,
						hutang_dagang: hutang_dagang,
					},
					success: function(data) {
						document.getElementById("capital").reset();
						document.getElementById("form_capi").reset();
						$('#editcapi').modal('hide');
						tampil_data_capi();
					}
				});
				return false;
			});

			//GET HAPUS
			$('#show_data_capi').on('click', '.item_hapus_capi', function() {
				var id = $(this).attr('data');
				$('#deletecapi').modal('show');
				$('[name="kode_capi"]').val(id);
			});

			//Hapus capital
			$('#btn_hapus_capi').on('click', function() {
				var kode = $('#textkode_capi').val();
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('capital/delete_capi') ?>",
					dataType: "JSON",
					data: {
						kode: kode
					},
					success: function(data) {
						$('#deletecapi').modal('hide');
						tampil_data_capi();
					}
				});
				return false;
			});

        });
		
		//cashflow awal pendapatan
		$(document).ready(function() {
			tampil_data_cashawpend(); //pemanggilan fungsi tampil cashflow awal.

			$('#dataCashawpend').dataTable();

			//fungsi tampil cashflow awal pendapatan
			function tampil_data_cashawpend() {
				var id_lb = <?php echo $id_lb; ?>;
				$.ajax({
					type: 'POST',
					url: '<?php echo base_url() ?>cashflow/data_cashawpend',
					async: true,
					dataType: 'json',
					data: {
						id_lb: id_lb
					},
					success: function(data) {
						var html = '';
						var i;
						for (i = 0; i < data.length; i++) {
							html += '<tr>' +
								'<td>' + data[i].keterangan + '</td>' +
								'<td>' + data[i].saldo + '</td>' +
								'<td>' + data[i].jenis + '</td>' +
								'<td style="text-align:right;">' +
								'<a href="javascript:;" class="btn btn-info btn-xs item_edit_cashawpend" data="' + data[i].id_cf + '">Edit</a>' + ' ' +
								'<a href="javascript:;" class="btn btn-danger btn-xs item_hapus_cashawpend" data="' + data[i].kode + '">Hapus</a>' +
								'</td>' +
								'</tr>';
						}
						$('#show_data_cashawpend').html(html);
					}

				});
			}

			//simpan cashflow awal pendapatan
			$('#btn_cashawpend').on('click', function() {
				var cashflowawpeng = $('#cashflowawpend').serialize();
				$.ajax({
						url: "<?php echo base_url(); ?>cashflow/seleksi_cashawpend",
						type: "POST",
						data: cashflowawpend,
						dataType: "JSON",
						success: function(data) {
							console.log(data)
						}
					}),
					tampil_data_cashawpend();
					document.getElementById("cashflowawpend").reset();
			});

			//GET UPDATE cashflow awal pendapatan
			$('#show_data_cashawpend').on('click', '.item_edit_cashawpend', function() {
				var id = $(this).attr('data');
				$.ajax({
					type: "GET",
					url: "<?php echo base_url('cashflow/get_cashawpend') ?>",
					dataType: "JSON",
					data: {
						id: id
					},
					success: function(data) {
						$.each(data, function(id_cf,id_lb , kode, kode_perkiraan, nama_perkiraan, keterangan, saldo) {
							$('#editcashawpend').modal('show');
							$('[name="id_cf"]').val(data.id_cf);
							$('[name="id_lb"]').val(data.id_lb);
							$('[name="kode"]').val(data.kode);
							$('[name="koper_awpend"]').val(data.kode_perkiraan);
							$('[name="naper_awpend"]').val(data.nama_perkiraan);
							$('[name="keterangan"]').val(data.keterangan);
							$('[name="saldo"]').val(data.saldo);
						});
					}
				});
				return false;
			});
			
			//Update cashflow awal pendapatan
			$('#btn_edit_cashawpend').on('click', function() {
				var id_cf = $('#id_cf2').val();
				var id_lb = $('#id_lb2').val();
				var kode = $('#kode2').val();
				var koper_awpend = $('#koper_awpend').val();
				var koper_awpend2 = $('#koper_awpend2').val();
				var keterangan = $('#keterangan2').val();
				var naper_awpend = $('#naper_awpend').val();
				var naper_awpend2 = $('#naper_awpend2').val();
				var jenis = $('#jenis2').val();
				var saldo = $('#saldo2').val();
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('cashflow/update_cashawpend') ?>",
					dataType: "text", //update gagal ketika diklik simpan data berubah tapi modal tidak hilang, karena datatype json,lalu ganti ke text dan akhirnya bisa jalan
					data: {
						id_cf: id_cf,
						id_lb: id_lb,
						kode: kode,
						koper_awpend: koper_awpend,
						koper_awpend2: koper_awpend2,
						keterangan: keterangan,
						naper_awpend: naper_awpend,
						naper_awpend2: naper_awpend2,
						jenis: jenis,
						saldo: saldo,
					},
					success: function(data) {
						document.getElementById("cashflowawpend").reset();
						document.getElementById("form_cashflowawpend").reset();
						$('#editcashawpend').modal('hide');
						tampil_data_cashawpend();
					}
				});
				return false;
			});

			//GET HAPUS pendapatan
			$('#show_data_cashawpend').on('click', '.item_hapus_cashawpend', function() {
				var id = $(this).attr('data');
				$('#deletecashawpend').modal('show');
				$('[name="kode_cashawpend"]').val(id);
			});

			//Hapus pendapatan
			$('#btn_hapus_cashawpend').on('click', function() {
				var kode = $('#textkode_cashawpend').val();
				var id_lb = $('#id_lb').val();
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('cashflow/delete_cashawpend') ?>",
					dataType: "JSON",
					data: {
						kode: kode,
						id_lb: id_lb,
					},
					success: function(data) {
						$('#deletecashawpend').modal('hide');
						tampil_data_cashawpend();
					}
				});
				return false;
			});

		});

        //condition
        $(document).ready(function() {
			tampil_data_con(); //pemanggilan fungsi tampil condition.

			$('#dataCon').dataTable();

			//fungsi tampil condition
			function tampil_data_con() {
				var id_lb = <?php echo $id_lb; ?>;
				$.ajax({
					type: 'POST',
					url: '<?php echo base_url() ?>condition/data_con',
					async: true,
					dataType: 'json',
					data: {
						id_lb: id_lb
					},
					success: function(data) {
						var html = '';
						var i;
						for (i = 0; i < data.length; i++) {
							html += '<tr>' +
								'<td>' + data[i].kekuatan + '</td>' +
								'<td>' + data[i].kelemahan + '</td>' +
								'<td>' + data[i].peluang + '</td>' +
								'<td style="text-align:right;">' +
								'<a href="javascript:;" class="btn btn-info btn-xs item_edit_con" data="' + data[i].id_con + '">Edit</a>' + ' ' +
								'<a href="javascript:;" class="btn btn-danger btn-xs item_hapus_con" data="' + data[i].id_con + '">Hapus</a>' +
								'</td>' +
								'</tr>';
						}
						$('#show_data_con').html(html);
					}

				});
			}
                                    
            $('#close_con').on('click', function() {
                document.getElementById("condition").reset();
            })
            
			//simpan condition
            $('#btn_condition').on('click', function() {
                var condition = $('#condition').serialize();
                $.ajax({
                        url: "<?php echo base_url(); ?>condition/add",
                        type: "POST",
                        data: condition,
                        dataType: "JSON",
                        success: function(data) {
                            console.log(data)
                        }
                    }),
					tampil_data_con();
				    document.getElementById("condition").reset();
            })
            
			//GET UPDATE condition
			$('#show_data_con').on('click', '.item_edit_con', function() {
				var id = $(this).attr('data');
				$.ajax({
					type: "GET",
					url: "<?php echo base_url('condition/get_con') ?>",
					dataType: "JSON",
					data: {
						id: id
					},
					success: function(data) {
						$.each(data, function(id_con, kekuatan, kelemahan, peluang, ancaman) {
							$('#editcon').modal('show');
							$('[name="id_con"]').val(data.id_con);
							$('[name="kekuatan"]').val(data.kekuatan);
							$('[name="kelemahan"]').val(data.kelemahan);
							$('[name="peluang"]').val(data.peluang);
							$('[name="ancaman"]').val(data.ancaman);
						});
					}
				});
				return false;
			});

			//Update condition
			$('#btn_edit_con').on('click', function() {
				var id_con = $('#id_con2').val();
				var kekuatan = $('#kekuatan2').val();
				var kelemahan = $('#kelemahan2').val();
				var peluang = $('#peluang2').val();
				var ancaman = $('#ancaman2').val();
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('condition/update_con') ?>",
					dataType: "JSON",
					data: {
						id_con: id_con,
						kekuatan: kekuatan,
						kelemahan: kelemahan,
						peluang: peluang,
						ancaman: ancaman,
					},
					success: function(data) {
						document.getElementById("condition").reset();
						document.getElementById("form_con").reset();
						$('#editcon').modal('hide');
						tampil_data_con();
					}
				});
				return false;
			});

			//GET HAPUS
			$('#show_data_con').on('click', '.item_hapus_con', function() {
				var id = $(this).attr('data');
				$('#deletecon').modal('show');
				$('[name="kode_con"]').val(id);
			});

			//Hapus condition
			$('#btn_hapus_con').on('click', function() {
				var kode = $('#textkode_con').val();
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('condition/delete_con') ?>",
					dataType: "JSON",
					data: {
						kode: kode
					},
					success: function(data) {
						$('#deletecon').modal('hide');
						tampil_data_con();
					}
				});
				return false;
			});
            
        });

        //cashflow hutang
        $(document).ready(function() {
            $('#btn_hutang').on('click', function() {
                var cashflow = $('#hutang').serialize();
                $.ajax({
                        url: "<?php echo base_url(); ?>test/add_hutang",
                        type: "POST",
                        data: cashflow,
                        dataType: "JSON",
                        success: function(data) {
                            console.log(data)
                        }
                    }),
                    document.getElementById("hutang").reset();
            })
        });

        //cashflow pendapatan sesudah
        $(document).ready(function() {
            $('#simpan2').on('click', function() {
                var cashflow = $('#cashflow2').serialize();
                $.ajax({
                        url: "<?php echo base_url(); ?>cashflow/add",
                        type: "POST",
                        data: cashflow,
                        dataType: "JSON",
                        success: function(data) {
                            console.log(data)
                        }
                    }),
                    document.getElementById("cashflow2").reset();
            })
        });

        //cashflow pengeluaran sesudah
        $(document).ready(function() {
            $('#simpanp2').on('click', function() {
                var cashflow = $('#cashflowp2').serialize();
                $.ajax({
                        url: "<?php echo base_url(); ?>cashflow/add2",
                        type: "POST",
                        data: cashflow,
                        dataType: "JSON",
                        success: function(data) {
                            console.log(data)
                        }
                    }),
                    document.getElementById("cashflowp2").reset();
            })
        });

        //collateral tanah
        $(document).ready(function() {
			tampil_data_colta(); //pemanggilan fungsi tampil collateral.

			$('#dataColta').dataTable();

			//fungsi tampil collateral
			function tampil_data_colta() {
				var id_lb = <?php echo $id_lb; ?>;
				$.ajax({
					type: 'POST',
					url: '<?php echo base_url() ?>collateral/data_colta',
					async: true,
					dataType: 'json',
					data: {
						id_lb: id_lb
					},
					success: function(data) {
						var html = '';
						var i;
						for (i = 0; i < data.length; i++) {
							html += '<tr>' +
								'<td>' + data[i].jenis + '</td>' +
								'<td>' + data[i].nama + '</td>' +
								'<td>' + data[i].no_shm + '</td>' +
								'<td style="text-align:right;">' +
								'<a href="javascript:;" class="btn btn-info btn-xs item_edit_colta" data="' + data[i].id_col2 + '">Edit</a>' + ' ' +
								'<a href="javascript:;" class="btn btn-danger btn-xs item_hapus_colta" data="' + data[i].id_col2 + '">Hapus</a>' +
								'</td>' +
								'</tr>';
						}
						$('#show_data_colta').html(html);
					}

				});
			}
                                                
            $('#close_collt').on('click', function() {
                document.getElementById("collateralt").reset();
            })

			//simpan collateral
            $('#btn_collateralt').on('click', function() {
                var collateralt = $('#collateralt').serialize();
                $.ajax({
                        url: "<?php echo base_url(); ?>collateral/add2",
                        type: "POST",
                        data: collateralt,
                        dataType: "JSON",
                        success: function(data) {
                            console.log(data)
                        }
                    }),
					tampil_data_colta();
				    document.getElementById("collateralt").reset();
            })
            
			//GET UPDATE collateral
			$('#show_data_colta').on('click', '.item_edit_colta', function() {
				var id = $(this).attr('data');
				$.ajax({
					type: "GET",
					url: "<?php echo base_url('collateral/get_colta') ?>",
					dataType: "JSON",
					data: {
						id: id
					},
					success: function(data) {
						$.each(data, function(id_col2, id_lb, jenis, nama, alamat,
							no_shm, lokasi, tgl_ukur, no_ukur, milik, fisik_jaminan, luas_t, luas_b, harga_t,
							harga_b, harga_t2, harga_b2, ht, taksasi, usulan) {
							$('#editcolta').modal('show');
							$('[name="id_col2"]').val(data.id_col2);
							$('[name="id_lb"]').val(data.id_lb);
							$('[name="jenis"]').val(data.jenis);
							$('[name="nama"]').val(data.nama);
							$('[name="alamat"]').val(data.alamat);
							$('[name="no_shm"]').val(data.no_shm);
							$('[name="lokasi"]').val(data.lokasi);
							$('[name="tgl_ukur"]').val(data.tgl_ukur);
							$('[name="no_ukur"]').val(data.no_ukur);
							$('[name="milik"]').val(data.milik);
							$('[name="fisik_jaminan"]').val(data.fisik_jaminan);
							$('[name="luas_t"]').val(data.luas_t);
							$('[name="luas_b"]').val(data.luas_b);
							$('[name="harga_t"]').val(data.harga_t);
							$('[name="harga_b"]').val(data.harga_b);
							$('[name="harga_t2"]').val(data.harga_t2);
							$('[name="harga_b2"]').val(data.harga_b2);
							$('[name="ht"]').val(data.ht);
							$('[name="taksasi"]').val(data.taksasi);
							$('[name="usulan"]').val(data.usulan);
						});
					}
				});
				return false;
			});

			//Update collateral
			$('#btn_edit_colta').on('click', function() {
				var id_col2 = $('#id_col22').val();
				var id_lb = $('#id_lb2').val();
				var jenis = $('#jenis2').val();
				var nama = $('#nama2').val();
				var alamat = $('#alamat2').val();
				var no_shm = $('#no_shm2').val();
				var lokasi = $('#lokasi2').val();
				var tgl_ukur = $('#tgl_ukur2').val();
				var no_ukur = $('#no_ukur2').val();
				var milik = $('#milik2').val();
				var fisik_jaminan = $('#fisik_jaminan2').val();
				var luas_t = $('#luas_t2').val();
				var luas_b = $('#luas_b2').val();
				var harga_t = $('#harga_t2').val();
				var harga_b = $('#harga_b2').val();
				var harga_t2 = $('#harga_t22').val();
				var harga_b2 = $('#harga_b22').val();
				var ht = $('#ht2').val();
				var taksasi = $('#taksasi2').val();
				var usulan = $('#usulan2').val();
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('collateral/update_colta') ?>",
					dataType: "text", //update gagal ketika diklik simpan data berubah tapi modal tidak hilang, karena datatype json,lalu ganti ke text dan akhirnya bisa jalan
					data: {
						id_col2: id_col2,
						id_lb: id_lb,
						jenis: jenis,
						nama: nama,
						alamat: alamat,
						no_shm: no_shm,
						lokasi: lokasi,
						tgl_ukur: tgl_ukur,
						no_ukur: no_ukur,
						milik: milik,
						fisik_jaminan: fisik_jaminan,
						luas_t: luas_t,
						luas_b: luas_b,
						harga_t: harga_t,
						harga_b: harga_b,
						harga_t2: harga_t2,
						harga_b2: harga_b2,
						ht: ht,
						taksasi: taksasi,
						usulan: usulan
					},
					success: function(data) {
						document.getElementById("collateralt").reset();
						document.getElementById("form_colta").reset();
						$('#editcolta').modal('hide');
						tampil_data_colta();
					}
				});
				return false;
			});

			//GET HAPUS
			$('#show_data_colta').on('click', '.item_hapus_colta', function() {
				var id = $(this).attr('data');
				$('#deletecolta').modal('show');
				$('[name="kode_colta"]').val(id);
			});

			//Hapus collateral
			$('#btn_hapus_colta').on('click', function() {
				var kode = $('#textkode_colta').val();
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('collateral/delete_colta') ?>",
					dataType: "JSON",
					data: {
						kode: kode
					},
					success: function(data) {
						$('#deletecolta').modal('hide');
						tampil_data_colta();
					}
				});
				return false;
			});

        });

        //collateral kendaraan
        $(document).ready(function() {
			tampil_data_colken(); //pemanggilan fungsi tampil collateral.

			$('#dataColken').dataTable();

			//fungsi tampil collateral
			function tampil_data_colken() {
				var id_lb = <?php echo $id_lb; ?>;
				$.ajax({
					type: 'POST',
					url: '<?php echo base_url() ?>collateral/data_colken',
					async: true,
					dataType: 'json',
					data: {
						id_lb: id_lb
					},
					success: function(data) {
						var html = '';
						var i;
						for (i = 0; i < data.length; i++) {
							html += '<tr>' +
								'<td>' + data[i].nopol + '</td>' +
								'<td>' + data[i].nama_stnk + '</td>' +
								'<td>' + data[i].type + '</td>' +
								'<td style="text-align:right;">' +
								'<a href="javascript:;" class="btn btn-info btn-xs item_edit_colken" data="' + data[i].id_col + '">Edit</a>' + ' ' +
								'<a href="javascript:;" class="btn btn-danger btn-xs item_hapus_colken" data="' + data[i].id_col + '">Hapus</a>' +
								'</td>' +
								'</tr>';
						}
						$('#show_data_colken').html(html);
					}

				});
			}
                                                            
            $('#close_collk').on('click', function() {
                document.getElementById("collateralk").reset();
            })
            
			//simpan collateral
            $('#btn_collateralk').on('click', function() {
                var collateralk = $('#collateralk').serialize();
                $.ajax({
                        url: "<?php echo base_url(); ?>collateral/add",
                        type: "POST",
                        data: collateralk,
                        dataType: "JSON",
                        success: function(data) {
                            console.log(data)
                        }
                    }),
					tampil_data_colken();
				    document.getElementById("collateralk").reset();
            })
            
			//GET UPDATE collateral
			$('#show_data_colken').on('click', '.item_edit_colken', function() {
				var id = $(this).attr('data');
				$.ajax({
					type: "GET",
					url: "<?php echo base_url('collateral/get_colken') ?>",
					dataType: "JSON",
					data: {
						id: id
					},
					success: function(data) {
						$.each(data, function(id_col, id_lb, roda, nopol, nama_stnk,
							alamat, type, jenis, tahun, warna, silinder, no_rangka, no_mesin, no_bpkb,
							milik, taksiran, nl, usulan) {
							$('#editcolken').modal('show');
							$('[name="id_col"]').val(data.id_col);
							$('[name="id_lb"]').val(data.id_lb);
							$('[name="roda"]').val(data.roda);
							$('[name="nopol"]').val(data.nopol);
							$('[name="nama_stnk"]').val(data.nama_stnk);
							$('[name="alamat"]').val(data.alamat);
							$('[name="type"]').val(data.type);
							$('[name="jenis"]').val(data.jenis);
							$('[name="tahun"]').val(data.tahun);
							$('[name="warna"]').val(data.warna);
							$('[name="silinder"]').val(data.silinder);
							$('[name="no_rangka"]').val(data.no_rangka);
							$('[name="no_mesin"]').val(data.no_mesin);
							$('[name="no_bpkb"]').val(data.no_bpkb);
							$('[name="milik"]').val(data.milik);
							$('[name="taksiran"]').val(data.taksiran);
							$('[name="nl"]').val(data.nl);
							$('[name="usulan"]').val(data.usulan);
						});
					}
				});
				return false;
			});

			//Update collateral
			$('#btn_edit_colken').on('click', function() {
				var id_col = $('#id_col2').val();
				var id_lb = $('#id_lb2').val();
				var roda = $('#roda2').val();
				var nopol = $('#nopol2').val();
				var nama_stnk = $('#nama_stnk2').val();
				var alamat = $('#alamat2').val();
				var type = $('#type2').val();
				var jenis = $('#jenis2').val();
				var tahun = $('#tahun2').val();
				var warna = $('#warna2').val();
				var silinder = $('#silinder2').val();
				var no_rangka = $('#no_rangka2').val();
				var no_mesin = $('#no_mesin2').val();
				var no_bpkb = $('#no_bpkb2').val();
				var milik = $('#milik2').val();
				var taksiran = $('#taksiran2').val();
				var nl = $('#nl2').val();
				var usulan = $('#usulan2').val();
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('collateral/update_colken') ?>",
					dataType: "text", //update gagal ketika diklik simpan data berubah tapi modal tidak hilang, karena datatype json,lalu ganti ke text dan akhirnya bisa jalan
					data: {
						id_col: id_col,
						id_lb: id_lb,
						roda: roda,
						nopol: nopol,
						nama_stnk: nama_stnk,
						alamat: alamat,
						type: type,
						jenis: jenis,
						tahun: tahun,
						warna: warna,
						silinder: silinder,
						no_rangka: no_rangka,
						no_mesin: no_mesin,
						no_bpkb: no_bpkb,
						milik: milik,
						taksiran: taksiran,
						nl: nl,
						usulan: usulan
					},
					success: function(data) {
						document.getElementById("collateralk").reset();
						document.getElementById("form_colken").reset();
						$('#editcolken').modal('hide');
						tampil_data_colken();
					}
				});
				return false;
			});

			//GET HAPUS
			$('#show_data_colken').on('click', '.item_hapus_colken', function() {
				var id = $(this).attr('data');
				$('#deletecolken').modal('show');
				$('[name="kode_colken"]').val(id);
			});

			//Hapus collateral
			$('#btn_hapus_colken').on('click', function() {
				var kode = $('#textkode_colken').val();
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('collateral/delete_colken') ?>",
					dataType: "JSON",
					data: {
						kode: kode
					},
					success: function(data) {
						$('#deletecolken').modal('hide');
						tampil_data_colken();
					}
				});
				return false;
			});

        });
        
        //realisasi
        $(document).ready(function() {
			tampil_data_real(); //pemanggilan fungsi tampil realisasi.

			$('#dataReal').dataTable();

			//fungsi tampil realisasi
			function tampil_data_real() {
				var id_lb = <?php echo $id_lb; ?>;
				$.ajax({
					type: 'POST',
					url: '<?php echo base_url() ?>usulan/data_real',
					async: true,
					dataType: 'json',
					data: {
						id_lb: id_lb
					},
					success: function(data) {
						var html = '';
						var i;
						for (i = 0; i < data.length; i++) {
							html += '<tr>' +
								'<td>' + data[i].oleh + '</td>' +
								'<td>' + data[i].sebagai + '</td>' +
								'<td style="text-align:right;">' +
								'<a href="javascript:;" class="btn btn-info btn-xs item_edit_real" data="' + data[i].id_real + '">Edit</a>' + ' ' +
								'<a href="javascript:;" class="btn btn-danger btn-xs item_hapus_real" data="' + data[i].id_real + '">Hapus</a>' +
								'</td>' +
								'</tr>';
						}
						$('#show_data_real').html(html);
					}

				});
			}
                                                            
            $('#close_real').on('click', function() {
                document.getElementById("realisasi").reset();
            })
            
			//simpan realisasi
            $('#btn_realisasi').on('click', function() {
                var realisasi = $('#realisasi').serialize(); 
                    $.ajax({
                        url: "<?php echo base_url(); ?>usulan/add_real",
                        type: "POST",
                        data: realisasi,
                        dataType: "JSON",
                        success: function(data) {
                            console.log(data)
                        }
                    }),
					tampil_data_real();
                    document.getElementById("realisasi").reset();
            })
                        
			//GET UPDATE realisasi
			$('#show_data_real').on('click', '.item_edit_real', function() {
				var id = $(this).attr('data');
				$.ajax({
					type: "GET",
					url: "<?php echo base_url('usulan/get_real') ?>",
					dataType: "JSON",
					data: {
						id: id
					},
					success: function(data) {
						$.each(data, function(id_real, id_lb, oleh, sebagai) {
							$('#editreal').modal('show');
							$('[name="id_real"]').val(data.id_real);
							$('[name="id_lb"]').val(data.id_lb);
							$('[name="oleh"]').val(data.oleh);
							$('[name="sebagai"]').val(data.sebagai);
						});
					}
				});
				return false;
			});

			//Update realisasi
			$('#btn_edit_real').on('click', function() {
				var id_real = $('#id_real2').val();
				var id_lb = $('#id_lb2').val();
				var oleh = $('#oleh2').val();
				var sebagai = $('#sebagai2').val();
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('usulan/update_real') ?>",
					dataType: "text", //update gagal ketika diklik simpan data berubah tapi modal tidak hilang, karena datatype json,lalu ganti ke text dan akhirnya bisa jalan
					data: {
						id_real: id_real,
						id_lb: id_lb,
						oleh: oleh,
						sebagai: sebagai
					},
					success: function(data) {
						document.getElementById("realisasi").reset();
						document.getElementById("form_real").reset();
						$('#editreal').modal('hide');
						tampil_data_real();
					}
				});
				return false;
			});

			//GET HAPUS
			$('#show_data_real').on('click', '.item_hapus_real', function() {
				var id = $(this).attr('data');
				$('#deletereal').modal('show');
				$('[name="kode_real"]').val(id);
			});

			//Hapus realisasi
			$('#btn_hapus_real').on('click', function() {
				var kode = $('#textkode_real').val();
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('usulan/delete_real') ?>",
					dataType: "JSON",
					data: {
						kode: kode
					},
					success: function(data) {
						$('#deletereal').modal('hide');
						tampil_data_real();
					}
				});
				return false;
			});
        });

        //usulan
        $(document).ready(function() {
			tampil_data_usul(); //pemanggilan fungsi tampil usulan.

			$('#dataUsul').dataTable();

			//fungsi tampil usulan
			function tampil_data_usul() {
				var id_lb = <?php echo $id_lb; ?>;
				$.ajax({
					type: 'POST',
					url: '<?php echo base_url() ?>usulan/data_usul',
					async: true,
					dataType: 'json',
					data: {
						id_lb: id_lb
					},
					success: function(data) {
						var html = '';
						var i;
						for (i = 0; i < data.length; i++) {
							html += '<tr>' +
								'<td>' + data[i].character + '</td>' +
								'<td>' + data[i].capacity + '</td>' +
								'<td>' + data[i].capital + '</td>' +
								'<td style="text-align:right;">' +
								'<a href="javascript:;" class="btn btn-info btn-xs item_edit_usul" data="' + data[i].id_usulan + '">Edit</a>' + ' ' +
								'<a href="javascript:;" class="btn btn-danger btn-xs item_hapus_usul" data="' + data[i].id_usulan + '">Hapus</a>' +
								'</td>' +
								'</tr>';
						}
						$('#show_data_usul').html(html);
					}

				});
			}
                                                            
            $('#close_usul').on('click', function() {
                document.getElementById("usulan_las").reset();
            })
            
			//simpan usulan
            $('#btn_usulan').on('click', function() {
                var usulan = $('#usulan_las').serialize();
                $.ajax({
                        url: "<?php echo base_url(); ?>usulan/add",
                        type: "POST",
                        data: usulan,
                        dataType: "JSON",
                        success: function(data) {
                            console.log(data)
                        }
                    }),
					tampil_data_usul();
				    document.getElementById("usulan_las").reset();
            })
            
			//GET UPDATE usulan
			$('#show_data_usul').on('click', '.item_edit_usul', function() {
				var id = $(this).attr('data');
				$.ajax({
					type: "GET",
					url: "<?php echo base_url('usulan/get_usul') ?>",
					dataType: "JSON",
					data: {
						id: id
					},
					success: function(data) {
						$.each(data, function(id_usulan, id_lb, character, capacity, capital,
							coe, collateral, realisasi, notaris, plafond,waktu,bunga,provisi,administrasi,
                            asuransi,materai,apht,skmht,titipan,fiduciare,legalisasi,roya,lainnya) {
							$('#editusul').modal('show');
							$('[name="id_usulan"]').val(data.id_usulan);
							$('[name="id_lb"]').val(data.id_lb);
							$('[name="character"]').val(data.character);
							$('[name="capacity"]').val(data.capacity);
							$('[name="capital"]').val(data.capital);
							$('[name="coe"]').val(data.coe);
							$('[name="collateral"]').val(data.collateral);
							$('[name="realisasi"]').val(data.realisasi);
							$('[name="notaris"]').val(data.notaris);
							$('[name="plafond"]').val(data.plafond);
							$('[name="waktu"]').val(data.waktu);
							$('[name="bunga"]').val(data.bunga);
							$('[name="provisi"]').val(data.provisi);
							$('[name="administrasi"]').val(data.administrasi);
							$('[name="asuransi"]').val(data.asuransi);
							$('[name="materai"]').val(data.materai);
							$('[name="apht"]').val(data.apht);
							$('[name="skmht"]').val(data.skmht);
							$('[name="titipan"]').val(data.titipan);
							$('[name="fiduciare"]').val(data.fiduciare);
							$('[name="legalisasi"]').val(data.legalisasi);
							$('[name="roya"]').val(data.roya);
							$('[name="lainnya"]').val(data.lainnya);
						});
					}
				});
				return false;
			});

			//Update usulan
			$('#btn_edit_usul').on('click', function() {
				var id_usulan = $('#id_usulan2').val();
				var id_lb = $('#id_lb2').val();
				var character = $('#character2').val();
				var capacity = $('#capacity2').val();
				var capital = $('#capital2').val();
				var coe = $('#coe2').val();
				var collateral = $('#collateral2').val();
				var realisasi = $('#realisasi2').val();
				var notaris = $('#notaris2').val();
				var plafond = $('#plafond2').val();
				var waktu = $('#waktu2').val();
				var bunga = $('#bunga2').val();
				var provisi = $('#provisi2').val();
				var administrasi = $('#administrasi2').val();
				var asuransi = $('#asuransi2').val();
				var materai = $('#materai2').val();
				var apht = $('#apht2').val();
				var skmht = $('#skmht2').val();
				var titipan = $('#titipan2').val();
				var fiduciare = $('#fiduciare2').val();
				var legalisasi = $('#legalisasi2').val();
				var roya = $('#roya2').val();
				var lainnya = $('#lainnya2').val();
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('usulan/update_usul') ?>",
					dataType: "text", //update gagal ketika diklik simpan data berubah tapi modal tidak hilang, karena datatype json,lalu ganti ke text dan akhirnya bisa jalan
					data: {
						id_usulan: id_usulan,
						id_lb: id_lb,
						character: character,
						capacity: capacity,
						capital: capital,
						coe: coe,
						collateral: collateral,
						realisasi: realisasi,
						notaris: notaris,
						plafond: plafond,
						waktu: waktu,
						bunga: bunga,
						provisi: provisi,
						administrasi: administrasi,
						asuransi: asuransi,
						materai: materai,
						apht: apht,
						skmht: skmht,
						titipan: titipan,
						fiduciare: fiduciare,
						legalisasi: legalisasi,
						roya: roya,
						lainnya: lainnya
					},
					success: function(data) {
						document.getElementById("usulan_las").reset();
						document.getElementById("form_usul").reset();
						$('#editusul').modal('hide');
						tampil_data_usul();
					}
				});
				return false;
			});

			//GET HAPUS
			$('#show_data_usul').on('click', '.item_hapus_usul', function() {
				var id = $(this).attr('data');
				$('#deleteusul').modal('show');
				$('[name="kode_usul"]').val(id);
			});

			//Hapus usulan
			$('#btn_hapus_usul').on('click', function() {
				var kode = $('#textkode_usul').val();
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('usulan/delete_usul') ?>",
					dataType: "JSON",
					data: {
						kode: kode
					},
					success: function(data) {
						$('#deleteusul').modal('hide');
						tampil_data_usul();
					}
				});
				return false;
			});

        });
        
		//JQuery Ajax cashflow awal pendapatan
		$(document).ready(function() {
			tampil_data_cashawpend(); //pemanggilan fungsi tampil cashflow awal.

			$('#dataCashawpend').dataTable();

			//fungsi tampil cashflow awal
			function tampil_data_cashawpend() {
				var id_lb = <?php echo $id_lb; ?>;
				$.ajax({
					type: 'POST',
					url: '<?php echo base_url() ?>cashflow/data_cashawpend',
					async: true,
					dataType: 'json',
					data: {
						id_lb: id_lb
					},
					success: function(data) {
						var html = '';
						var i;
						for (i = 0; i < data.length; i++) {
							html += '<tr>' +
								'<td>' + data[i].keterangan + '</td>' +
								'<td>' + data[i].saldo + '</td>' +
								'<td>' + data[i].jenis + '</td>' +
								'<td style="text-align:right;">' +
								'<a href="javascript:;" class="btn btn-info btn-xs item_edit_cashawpend" data="' + data[i].id_cf + '">Edit</a>' + ' ' +
								'<a href="javascript:;" class="btn btn-danger btn-xs item_hapus_cashawpend" data="' + data[i].kode + '">Hapus</a>' +
								'</td>' +
								'</tr>';
						}
						$('#show_data_cashawpend').html(html);
					}

				});
			}
			                                                            
            $('#close_cashawpend').on('click', function() {
                document.getElementById("cashflowawpend").reset();
            })

			//simpan cashflow awal
			$('#btn_cashawpend').on('click', function() {
				var cashflowawpeng = $('#cashflowawpeng').serialize();
				$.ajax({
						url: "<?php echo base_url(); ?>cashflow/seleksi_cashawpend",
						type: "POST",
						data: cashflowawpeng,
						dataType: "JSON",
						success: function(data) {
							console.log(data)
						}
					}),
					tampil_data_cashawpend();
				document.getElementById("cashflowawpeng").reset();
			});

			//GET UPDATE cashflow awal
			$('#show_data_cashawpend').on('click', '.item_edit_cashawpend', function() {
				var id = $(this).attr('data');
				$.ajax({
					type: "GET",
					url: "<?php echo base_url('cashflow/get_cashawpend') ?>",
					dataType: "JSON",
					data: {
						id: id
					},
					success: function(data) {
						$.each(data, function(id_cf, kode, kode_perkiraan, nama_perkiraan, keterangan, saldo) {
							//$('#editcashawpend').modal('show');
							$('[name="id_cf"]').val(data.id_cf);
							$('[name="kodep"]').val(data.kode);
							$('[name="kode_perkiraanp"]').val(data.kode_perkiraan);
							$('[name="nama_perkiraanp"]').val(data.nama_perkiraan);
							$('[name="keteranganp"]').val(data.keterangan);
							$('[name="saldop"]').val(data.saldo);
						});
					}
				});
				return false;
			});

			//GET HAPUS
			$('#show_data_cashawpend').on('click', '.item_hapus_cashawpend', function() {
				var id = $(this).attr('data');
				$('#deletecashawpend').modal('show');
				$('[name="kode_cashawpend"]').val(id);
			});

			//Hapus 
			$('#btn_hapus_cashawpend').on('click', function() {
				var kode = $('#textkode_cashawpeng').val();
				var id_lb = $('#id_lb').val();
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('cashflow/delete_cashawpeng') ?>",
					dataType: "JSON",
					data: {
						kode: kode,
						id_lb: id_lb,
					},
					success: function(data) {
						$('#deletecashawpeng').modal('hide');
						tampil_data_cashawpeng();
					}
				});
				return false;
			});

		});

    </script>

<script>
        //JS untuk mengambil data perkiraan

        //cashflow pendapatan awal
        function js_koper_awpend() {
            var kode_perkiraan = document.getElementById('koper_awpend').value;
            $.ajax({
                url: "<?php echo base_url(); ?>test/cari",
                data: '&kode_perkiraan=' + kode_perkiraan,
                success: function(data) {
                    var hasil = JSON.parse(data);

                    $.each(hasil, function(key, val) {

                        document.getElementById('koper_awpend').value = val.kode_perkiraan;
                        document.getElementById('naper_awpend').value = val.nama_perkiraan;

                    });
                }
            });

        }

        function js_koper_awpend2() {
            var kode_perkiraan2 = document.getElementById('koper_awpend2').value;
            $.ajax({
                url: "<?php echo base_url(); ?>test/cari",
                data: '&kode_perkiraan=' + kode_perkiraan2,
                success: function(data) {
                    var hasil = JSON.parse(data);

                    $.each(hasil, function(key, val) {

                        document.getElementById('koper_awpend2').value = val.kode_perkiraan;
                        document.getElementById('naper_awpend2').value = val.nama_perkiraan;

                    });
                }
            });

        }

        //cashflow pengeluaran awal
        function js_koper_awpeng() {
            var kode_perkiraan = document.getElementById('koper_awpeng').value;
            $.ajax({
                url: "<?php echo base_url(); ?>test/cari",
                data: '&kode_perkiraan=' + kode_perkiraan,
                success: function(data) {
                    var hasil = JSON.parse(data);

                    $.each(hasil, function(key, val) {

                        document.getElementById('koper_awpeng').value = val.kode_perkiraan;
                        document.getElementById('naper_awpeng').value = val.nama_perkiraan;

                    });
                }
            });

        }

        function js_koper_awpeng2() {
            var kode_perkiraan2 = document.getElementById('koper_awpeng2').value;
            $.ajax({
                url: "<?php echo base_url(); ?>test/cari",
                data: '&kode_perkiraan=' + kode_perkiraan2,
                success: function(data) {
                    var hasil = JSON.parse(data);

                    $.each(hasil, function(key, val) {

                        document.getElementById('koper_awpeng2').value = val.kode_perkiraan;
                        document.getElementById('naper_awpeng2').value = val.nama_perkiraan;

                    });
                }
            });

        }

        //cashflow pendapatan sesudah
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

        //cashflow pengeluaran sesudah
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
	
    
	<!-- Modal edit riwayat pinjaman-->
	<div class="modal fade" id="editrp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Riwayat Pinjaman</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>    
					</button>
				</div>
				<form id="form_rp">
					<div class="modal-body">
						<div class="row">
							<div class="col-md-3 mb-3">
								<label for="plafond" class="form-label">Plafond (Rp.)</label>
								<input type="text" class="form-control" id="plafond2" name="plafond" placeholder="Cth : 12000000">
								<input type="hidden" class="form-control" id="id_rp2" name="id_rp">
								<input type="hidden" class="form-control" id="id_lb2" name="id_lb">
							</div>
							<div class="col-md-2 mb-3">
								<label for="status" class="form-label">Status</label>
								<select class="form-control" aria-label="Default select example" id="status2" name="status">
									<option value=""></option>
									<option value="Lunas">Lunas</option>
									<option value="Belum Lunas">Belum Lunas</option>
								</select>
							</div>
							<div class="col-md-3 mb-3">
								<label for="saldo" class="form-label">Saldo (Rp.)</label>
								<input type="text" class="form-control" id="saldo2" name="saldo">
							</div>
							<div class="col-md-2 mb-3">
								<label for="sejarah" class="form-label">Sejarah</label>
								<select class="form-control" aria-label="Default select example" id="sejarah2" name="sejarah">
									<option value=""></option>
									<option value="Baik">Baik</option>
									<option value="Tidak Baik">Tidak Baik</option>
								</select>
							</div>
							<div class="col-md-2 mb-3">
								<label for="data" class="form-label">Data</label>
								<select class="form-control" aria-label="Default select example" id="data2" name="data">
									<option value=""></option>
									<option value="Terlampir">Terlampir</option>
									<option value="Tidak Terlampir">Tidak Terlampir</option>
								</select>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button id="close_rp" data-dismiss="modal" class="btn btn-danger">Batal</button>
						<button id="btn_edit_rp" class="btn btn-primary">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!--END MODAL EDIT-->

	<!--MODAL HAPUS riwayat pinjaman-->
	<div class="modal fade" id="deleterp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="exampleModalLabel">Hapus Data</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
				</div>
				<form class="form-horizontal">
					<div class="modal-body">

						<input type="hidden" name="kode_rp" id="textkode_rp" value="">
						<div class="alert alert-warning">
							<p>Apakah Anda yakin mau menghapus riwayat ini?</p>
						</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
						<button class="btn btn-danger" id="btn_hapus_rp">Hapus</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!--END MODAL HAPUS-->

	<!-- Modal edit character-->
	<div class="modal fade" id="editchar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Character</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form id="form_char">
					<div class="modal-body">
						<div class="col-md-12 mb-4">
							<label for="info_pribadi" class="form-label">Informasi Pribadi</label>
							<input type="hidden" class="form-control" id="id_lb2" name="id_lb">
							<input type="hidden" class="form-control" id="id_char2" name="id_char">
							<textarea class="form-control" id="info_pribadi2" name="info_pribadi"></textarea>
						</div>
						<div class="col-md-12 mb-4">
							<label for="info_perilaku" class="form-label">Informasi Perilaku</label>
							<textarea class="form-control" id="info_perilaku2" name="info_perilaku"></textarea>
						</div>
						<div class="col-md-12 mb-5">
							<label for="info_keluarga" class="form-label">Informasi Keluarga</label>
							<textarea class="form-control" id="info_keluarga2" name="info_keluarga"></textarea>
						</div>
						<div class="col-md-12 mb-3">
							<h5>Informasi Karakter</h5>
						</div>
						<div class="row">
							<div class="col-md-3 mb-3">
								<label for="nm1" class="form-label">Nama</label>
								<input type="text" class="form-control" id="nm12" name="nm1">
							</div>
							<div class="col-md-6 mb-3">
								<label for="al1" class="form-label">Alamat</label>
								<textarea class="form-control" id="al12" name="al1"></textarea>
							</div>
							<div class="col-md-3 mb-3">
								<label for="hp1" class="form-label">Tlp./HP</label>
								<input type="text" class="form-control" id="hp12" name="hp1">
							</div>
						</div>
						<div class="row">
							<div class="col-md-3 mb-3">
								<label for="nm2" class="form-label">Nama</label>
								<input type="text" class="form-control" id="nm22" name="nm2">
							</div>
							<div class="col-md-6 mb-3">
								<label for="al2" class="form-label">Alamat</label>
								<textarea class="form-control" id="al22" name="al2"></textarea>
							</div>
							<div class="col-md-3 mb-3">
								<label for="hp2" class="form-label">Tlp. /HP</label>
								<input type="text" class="form-control" id="hp22" name="hp2">
							</div>
						</div>
						<div class="row">
							<div class="col-md-3 mb-3">
								<label for="nm3" class="form-label">Nama</label>
								<input type="text" class="form-control" id="nm32" name="nm3">
							</div>
							<div class="col-md-6 mb-3">
								<label for="al3" class="form-label">Alamat</label>
								<textarea class="form-control" id="al32" name="al3"></textarea>
							</div>
							<div class="col-md-3 mb-3">
								<label for="hp3" class="form-label">Tlp. /HP</label>
								<input type="text" class="form-control" id="hp32" name="hp3">
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button id="close_char" data-dismiss="modal" class="btn btn-danger">Batal</button>
						<button id="btn_edit_char" class="btn btn-primary">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!--END MODAL EDIT-->

	<!--MODAL HAPUS character-->
	<div class="modal fade" id="deletechar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="exampleModalLabel">Hapus Data</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
				</div>
				<form class="form-horizontal">
					<div class="modal-body">

						<input type="hidden" name="kode_char" id="textkode_char" value="">
						<div class="alert alert-warning">
							<p>Apakah Anda yakin mau menghapus riwayat ini?</p>
						</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
						<button class="btn btn-danger" id="btn_hapus_char">Hapus</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!--END MODAL HAPUS-->

	<!-- Modal edit capacity-->
	<div class="modal fade" id="editcapa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Capacity</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form id="form_capa">
					<div class="modal-body">
						<div class="col-md-4 mb-3">
							<label for="nama_usaha" class="form-label">Nama Bidang Usaha</label>
							<input type="hidden" class="form-control" id="id_lb2" name="id_lb">
							<input type="hidden" class="form-control" id="id_cap2" name="id_cap">
							<input type="text" class="form-control" id="nama_usaha2" name="nama_usaha">
						</div>
						<div class="col-md-4 mb-3">
							<label for="sektor" class="form-label">Sektor Usaha</label>
							<select class="form-control" aria-label="Default select example" id="sektor2" name="sektor">
								<option value="Industri">Industri</option>
								<option value="Jasa">Jasa</option>
								<option value="Kontraktor">Kontraktor</option>
								<option value="Pegawai">Pegawai</option>
								<option value="Perdagangan">Perdagangan</option>
								<option value="Pertanian">Pertanian</option>
								<option value="Konsumtif">Konsumtif</option>
							</select>
						</div>
						<div class="col-md-4 mb-3">
							<label for="bidang" class="form-label">Bidang Usaha</label>
							<input type="text" class="form-control" id="bidang2" name="bidang">
						</div>
						<div class="col-md-12 mb-3">
							<label for="alamat_usaha" class="form-label">Alamat Usaha / Kantor</label>
							<textarea class="form-control" id="alamat_usaha2" name="alamat_usaha"></textarea>
						</div>
						<div class="col-md-4 mb-3">
							<label for="status_usaha" class="form-label">Status Tempat Usaha / Kantor</label>
							<select class="form-control" aria-label="Default select example" id="status_usaha2" name="status_usaha">
								<option value="Milik Sendiri">Milik Sendiri</option>
								<option value="Milik Keluarga/Ortu">Milik Keluarga/Ortu</option>
								<option value="Instansi">Instansi</option>
								<option value="Kontrak">Kontrak</option>
								<option value="Kredit">Kredit</option>
							</select>
						</div>
						<div class="col-md-4 mb-3">
							<label for="tlp_usaha" class="form-label">No. Tlp Usaha / Kantor</label>
							<input type="text" class="form-control" id="tlp_usaha2" name="tlp_usaha">
						</div>
						<div class="col-md-4 mb-3">
							<label for="tgl_mulai" class="form-label">Tanggal Mulai Usaha</label>
							<input type="date" class="form-control" id="tgl_mulai2" name="tgl_mulai">
						</div>
						<div class="col-md-4 mb-3">
							<label for="tgl_nasabah" class="form-label">Jadi Nasabah Sejak</label>
							<input type="date" class="form-control" id="tgl_nasabah2" name="tgl_nasabah">
						</div>
						<div class="col-md-4 mb-3">
							<label for="akta" class="form-label">No. Akta</label>
							<input type="text" class="form-control" id="akta2" name="akta">
						</div>
						<div class="col-md-4 mb-3">
							<label for="tgl_akta" class="form-label">Tanggal Akta</label>
							<input type="date" class="form-control" id="tgl_akta2" name="tgl_akta">
						</div>
						<div class="col-md-4 mb-3">
							<label for="npwp" class="form-label">NPWP</label>
							<input type="text" class="form-control" id="npwp2" name="npwp">
						</div>
						<div class="col-md-4 mb-5">
							<label for="tgl_npwp" class="form-label">Tgl NPWP</label>
							<input type="date" class="form-control" id="tgl_npwp2" name="tgl_npwp">
						</div>
						<div class="col-md-12 mb-3">
							<h5>Alokasi Dana</h5>
						</div>
						<div class="row">
							<div class="col-md-6 mb-3">
								<label for="alokasi1" class="form-label">Penggunaan</label>
								<input type="text" class="form-control" id="alokasi12" name="alokasi1">
							</div>
							<div class="col-md-4 mb-3">
								<label for="dana1" class="form-label">Dana</label>
								<input type="number" class="form-control" id="dana12" name="dana1">
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 mb-3">
								<label for="alokasi2" class="form-label">Penggunaan</label>
								<input type="text" class="form-control" id="alokasi22" name="alokasi2">
							</div>
							<div class="col-md-4 mb-3">
								<label for="dana2" class="form-label">Dana</label>
								<input type="number" class="form-control" id="dana22" name="dana2">
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 mb-3">
								<label for="alokasi3" class="form-label">Penggunaan</label>
								<input type="text" class="form-control" id="alokasi32" name="alokasi3">
							</div>
							<div class="col-md-4 mb-5">
								<label for="dana3" class="form-label">Dana</label>
								<input type="number" class="form-control" id="dana32" name="dana3">
							</div>
						</div>
						<div class="col-md-12 mb-3">
							<label for="usaha_skrg" class="form-label">Usaha Saat Ini</label>
							<textarea class="form-control" id="usaha_skrg2" name="usaha_skrg"></textarea>
						</div>
						<div class="col-md-12 mb-3">
							<label for="usaha_realisasi" class="form-label">Usaha Setelah Realisasi</label>
							<textarea class="form-control" id="usaha_realisasi2" name="usaha_realisasi"></textarea>
						</div>
					</div>
					<div class="modal-footer">
						<button id="close_capa" data-dismiss="modal" class="btn btn-danger">Batal</button>
						<button id="btn_edit_capa" class="btn btn-primary">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!--END MODAL EDIT-->

	<!--MODAL HAPUS capacity-->
	<div class="modal fade" id="deletecapa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="exampleModalLabel">Hapus Data</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
				</div>
				<form class="form-horizontal">
					<div class="modal-body">

						<input type="hidden" name="kode_capa" id="textkode_capa" value="">
						<div class="alert alert-warning">
							<p>Apakah Anda yakin mau menghapus riwayat ini?</p>
						</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
						<button class="btn btn-danger" id="btn_hapus_capa">Hapus</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!--END MODAL HAPUS-->

	<!-- Modal edit capital-->
	<div class="modal fade" id="editcapi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Capital</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form id="form_capi">
					<div class="modal-body">
						<div class="col-md-12 mb-3">
							<h5>Aktiva lancar</h5>
						</div>
						<div class="form-group row">
							<label for="kas" class="col-sm-6 col-form-label">Kas</label>
							<div class="col-sm-6">
								<input type="hidden" class="form-control" id="id_lb2" name="id_lb">
								<input type="hidden" class="form-control" id="id_capi2" name="id_capi">
								<input type="number" class="form-control" id="kas2" name="kas">
							</div>
						</div>
						<div class="form-group row">
							<label for="tabungan" class="col-sm-6 col-form-label">Tabungan</label>
							<div class="col-sm-6">
								<input type="number" class="form-control" id="tabungan2" name="tabungan">
							</div>
						</div>
						<div class="form-group row">
							<label for="deposito" class="col-sm-6 col-form-label">Deposito</label>
							<div class="col-sm-6">
								<input type="number" class="form-control" id="deposito2" name="deposito">
							</div>
						</div>
						<div class="form-group row">
							<label for="piutang" class="col-sm-6 col-form-label">Piutang</label>
							<div class="col-sm-6">
								<input type="number" class="form-control" id="piutang2" name="piutang">
							</div>
						</div>
						<div class="form-group row">
							<label for="peralatan" class="col-sm-6 col-form-label">Peralatan</label>
							<div class="col-sm-6">
								<input type="number" class="form-control" id="peralatan2" name="peralatan">
							</div>
						</div>
						<div class="form-group row">
							<label for="barang" class="col-sm-6 col-form-label">Persediaan Barang Usaha 1</label>
							<div class="col-sm-6">
								<input type="number" class="form-control" id="barang2" name="barang">
							</div>
						</div>
						<div class="form-group row">
							<label for="barang2" class="col-sm-6 col-form-label">Persediaan Barang Usaha 2</label>
							<div class="col-sm-6">
								<input type="number" class="form-control" id="barang22" name="barang2">
							</div>
						</div>
						<div class="form-group row">
							<label for="barang3" class="col-sm-6 col-form-label">Persediaan Barang Usaha 3</label>
							<div class="col-sm-6">
								<input type="number" class="form-control" id="barang32" name="barang3">
							</div>
						</div>
						<div class="form-group row">
							<label for="sewa" class="col-sm-6 col-form-label">Sewa Dibayar Dimuka</label>
							<div class="col-sm-6">
								<input type="number" class="form-control" id="sewa2" name="sewa">
							</div>
						</div>
						<div class="form-group row">
							<label for="lahan" class="col-sm-6 col-form-label">Lahan Garap</label>
							<div class="col-sm-6">
								<input type="number" class="form-control" id="lahan2" name="lahan">
							</div>
						</div>
						<div class="form-group row">
							<label for="gedung" class="col-sm-6 col-form-label">Gedung / Ruko</label>
							<div class="col-sm-6">
								<input type="number" class="form-control" id="gedung2" name="gedung">
							</div>
						</div>
						<div class="form-group row">
							<label for="operasional" class="col-sm-6 col-form-label">Kendaraan Operasional</label>
							<div class="col-sm-6">
								<input type="number" class="form-control" id="operasional2" name="operasional">
							</div>
						</div>
						<div class="form-group row mb-5">
							<label for="lain" class="col-sm-6 col-form-label">Lain-lain</label>
							<div class="col-sm-6">
								<input type="number" class="form-control" id="lain2" name="lain">
							</div>
						</div>
						<div class="col-md-12 mb-3">
							<h5>Aktiva Tetap</h5>
						</div>
						<div class="form-group row">
							<label for="tanah" class="col-sm-6 col-form-label">Tanah</label>
							<div class="col-sm-6">
								<input type="number" class="form-control" id="tanah2" name="tanah">
							</div>
						</div>
						<div class="form-group row">
							<label for="bangunan" class="col-sm-6 col-form-label">Bangunan</label>
							<div class="col-sm-6">
								<input type="number" class="form-control" id="bangunan2" name="bangunan">
							</div>
						</div>
						<div class="form-group row">
							<label for="kendaraan" class="col-sm-6 col-form-label">Kendaraan</label>
							<div class="col-sm-6">
								<input type="number" class="form-control" id="kendaraan2" name="kendaraan">
							</div>
						</div>
						<div class="form-group row">
							<label for="inventaris" class="col-sm-6 col-form-label">Inventaris</label>
							<div class="col-sm-6">
								<input type="number" class="form-control" id="inventaris2" name="inventaris">
							</div>
						</div>
						<div class="form-group row mb-5">
							<label for="lain2" class="col-sm-6 col-form-label">Lain-lain</label>
							<div class="col-sm-6">
								<input type="number" class="form-control" id="lain22" name="lain2">
							</div>
						</div>
						<div class="col-md-12 mb-3">
							<h5>Hutang</h5>
						</div>
						<div class="form-group row">
							<label for="hutang_jpk" class="col-sm-6 col-form-label">Hutang Jangka Pendek</label>
							<div class="col-sm-6">
								<input type="number" class="form-control" id="hutang_jpk2" name="hutang_jpk">
							</div>
						</div>
						<div class="form-group row">
							<label for="hutang_jpg" class="col-sm-6 col-form-label">Hutang Jangka Panjang</label>
							<div class="col-sm-6">
								<input type="number" class="form-control" id="hutang_jpg2" name="hutang_jpg">
							</div>
						</div>
						<div class="form-group row">
							<label for="hutang_lain" class="col-sm-6 col-form-label">Hutang Lain</label>
							<div class="col-sm-6">
								<input type="number" class="form-control" id="hutang_lain2" name="hutang_lain">
							</div>
						</div>
						<div class="form-group row">
							<label for="hutang_dagang" class="col-sm-6 col-form-label">Hutang Dagang</label>
							<div class="col-sm-6">
								<input type="number" class="form-control" id="hutang_dagang2" name="hutang_dagang">
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button id="close_capi" data-dismiss="modal" class="btn btn-danger">Batal</button>
						<button id="btn_edit_capi" class="btn btn-primary">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!--END MODAL EDIT-->

	<!--MODAL HAPUS capital-->
	<div class="modal fade" id="deletecapi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="exampleModalLabel">Hapus Data</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
				</div>
				<form class="form-horizontal">
					<div class="modal-body">

						<input type="hidden" name="kode_capi" id="textkode_capi" value="">
						<div class="alert alert-warning">
							<p>Apakah Anda yakin mau menghapus capital ini?</p>
						</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
						<button class="btn btn-danger" id="btn_hapus_capi">Hapus</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!--END MODAL HAPUS-->
	  
	<!-- Modal edit cashflow awal pendapatan-->
	<div class="modal fade" id="editcashawpend" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Usulan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form id="form_cashflowawpend">
					<div class="modal-body">
						<div class="col-md-8 mb-4">
							<label for="dari" class="form-label">Pendapatan dari</label>
							<select class="form-control" aria-label="Default select example" id="koper_awpend" name="koper_awpend" onchange="return js_koper_awpend();">
								<option value=""></option>
								<option value="4.1.1">Pendapatan Usaha 1</option>
								<option value="4.1.2">Pendapatan Usaha 2</option>
								<option value="4.1.3">Pendapatan Usaha 3</option>
								<option value="4.1.4">Pendapatan Lain / Gaji</option>
							</select>
						</div>
						<div class="col-md-8 mb-4">
							<label for="nopol" class="form-label">Digunakan Untuk</label>
							<select class="form-control" aria-label="Default select example" id="koper_awpend2" name="koper_awpend2" onchange="return js_koper_awpend2();">
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
							<input type="text" class="form-control" id="keterangan2" name="keterangan">
							<input type="hidden" class="form-control" id="id_cf2" name="id_cf">
							<input type="hidden" class="form-control" id="id_lb2" name="id_lb">
							<input type="hidden" class="form-control" id="naper_awpend" name="naper_awpend">
							<input type="hidden" class="form-control" id="naper_awpend2" name="naper_awpend2">
							<input type="hidden" class="form-control" id="kode2" name="kode">
							<input type="hidden" class="form-control" id="jenis2" name="jenis" value="pendapatan">
						</div>
						<div class="col-md-8 mb-4">
							<label for="nama_stnk" class="form-label">Sebesar</label>
							<input type="number" class="form-control" id="saldo2" name="saldo">
						</div>
					</div>
					<div class="modal-footer">
						<button id="close_cashawpend" data-dismiss="modal" class="btn btn-danger">Batal</button>
						<button type="button" id="btn_edit_cashawpend" class="btn btn-primary">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!--END MODAL EDIT-->

	<!--MODAL HAPUS cashflow awal pendapatan-->
	<div class="modal fade" id="deletecashawpend" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="exampleModalLabel">Hapus Data</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
				</div>
				<form class="form-horizontal">
					<div class="modal-body">

						<input type="hidden" name="kode_cashawpend" id="textkode_cashawpend" value="">
						<input type="hidden" id="id_lb" name="id_lb" value="<?php echo $id_lb; ?>">
						<div class="alert alert-warning">
							<p>Apakah Anda yakin mau menghapus data ini?</p>
						</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
						<button class="btn btn-danger" id="btn_hapus_cashawpend">Hapus</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!--END MODAL HAPUS-->

	<!-- Modal edit condition-->
	<div class="modal fade" id="editcon" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Condition</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form id="form_con">
					<div class="modal-body">
						<div class="form-group row">
							<label for="kekuatan" class="col-sm-2 col-form-label">Kekuatan</label>
							<div class="col-sm-10">
								<input type="hidden" class="form-control" id="id_lb2" name="id_lb">
								<input type="hidden" class="form-control" id="id_con2" name="id_con">
								<textarea class="form-control" id="kekuatan2" name="kekuatan"></textarea>
							</div>
						</div>
						<div class="form-group row">
							<label for="kelemahan" class="col-sm-2 col-form-label">Kelemahan</label>
							<div class="col-sm-10">
								<textarea class="form-control" id="kelemahan2" name="kelemahan"></textarea>
							</div>
						</div>
						<div class="form-group row">
							<label for="peluang" class="col-sm-2 col-form-label">Peluang</label>
							<div class="col-sm-10">
								<textarea class="form-control" id="peluang2" name="peluang"></textarea>
							</div>
						</div>
						<div class="form-group row">
							<label for="ancaman" class="col-sm-2 col-form-label">Ancaman</label>
							<div class="col-sm-10">
								<textarea class="form-control" id="ancaman2" name="ancaman"></textarea>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button id="close_con" data-dismiss="modal" class="btn btn-danger">Batal</button>
						<button id="btn_edit_con" class="btn btn-primary">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!--END MODAL EDIT-->

	<!--MODAL HAPUS condition-->
	<div class="modal fade" id="deletecon" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="exampleModalLabel">Hapus Data</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
				</div>
				<form class="form-horizontal">
					<div class="modal-body">

						<input type="hidden" name="kode_con" id="textkode_con" value="">
						<div class="alert alert-warning">
							<p>Apakah Anda yakin mau menghapus condition ini?</p>
						</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
						<button class="btn btn-danger" id="btn_hapus_con">Hapus</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!--END MODAL HAPUS-->

	<!-- Modal edit collateral tanah-->
	<div class="modal fade" id="editcolta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Collateral Tanah</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form id="form_colta">
					<div class="modal-body">
						<div class="row">
							<div class="col-md-4 mb-4">
								<label for="jenis" class="form-label">Jenis</label>
								<input type="hidden" class="form-control" id="id_col22" name="id_col2">
								<input type="hidden" class="form-control" id="id_lb2" name="id_lb">
								<input type="text" class="form-control" id="jenis2" name="jenis">
							</div>
							<div class="col-md-4 mb-4">
								<label for="nama" class="form-label">Nama Pemilik</label>
								<input type="text" class="form-control" id="nama2" name="nama">
							</div>
							<div class="col-md-4 mb-4">
								<label for="no_shm" class="form-label">No. SHM</label>
								<input type="text" class="form-control" id="no_shm2" name="no_shm">
							</div>
						</div>
						<div class="row">
							<div class="col-md-4 mb-4">
								<label for="luas_t" class="form-label">Luas Tanah (M2)</label>
								<input type="text" class="form-control" id="luas_t2" name="luas_t" required>
							</div>
							<div class="col-md-4 mb-4">
								<label for="luas_b" class="form-label">Luas Bangunan (M2)</label>
								<input type="text" class="form-control" id="luas_b2" name="luas_b" required>
							</div>
							<div class="col-md-4 mb-4">
								<label for="harga_t2" class="form-label">Harga Tanah Pasar (Rp.)</label>
								<input type="text" class="form-control" id="harga_t22" name="harga_t2" required placeholder="Harga per Meter">
							</div>
						</div>
						<div class="row">
							<div class="col-md-4 mb-4">
								<label for="harga_b2" class="form-label">Harga Bangunan Pasar (Rp.)</label>
								<input type="text" class="form-control" id="harga_b22" name="harga_b2" required placeholder="Harga per Meter">
							</div>
							<div class="col-md-4 mb-4">
								<label for="harga_t" class="form-label">Harga Tanah SPPT (Rp.)</label>
								<input type="text" class="form-control" id="harga_t2" name="harga_t" required placeholder="Harga per Meter">
							</div>
							<div class="col-md-4 mb-4">
								<label for="harga_b" class="form-label">Harga Bangunan SPPT (Rp.)</label>
								<input type="text" class="form-control" id="harga_b2" name="harga_b" required placeholder="Harga per Meter">
							</div>
						</div>
						<div class="row">
							<div class="col-md-4 mb-4">
								<label for="tgl_ukur" class="form-label">Tgl Surat Ukur</label>
								<input type="date" class="form-control" id="tgl_ukur2" name="tgl_ukur">
							</div>
							<div class="col-md-4 mb-4">
								<label for="no_ukur" class="form-label">No. Surat Ukur</label>
								<input type="text" class="form-control" id="no_ukur2" name="no_ukur">
							</div>
							<div class="col-md-4 mb-4">
								<label for="milik" class="form-label">Kepemilikan</label>
								<input type="text" class="form-control" id="milik2" name="milik">
							</div>
						</div>
						<div class="row">
							<div class="col-md-4 mb-4">
								<label for="ht" class="form-label">Nilai HT (Rp.)</label>
								<input type="number" class="form-control" id="ht2" name="ht" required>
							</div>
							<div class="col-md-4 mb-4">
								<label for="taksasi" class="form-label">Taksasi (%)</label>
								<input type="number" class="form-control" id="taksasi2" name="taksasi" required placeholder="Contoh : 70">
							</div>
						</div>
						<div class="col-md-12 mb-4">
							<label for="alamat" class="form-label">Alamat Pemilik</label>
							<textarea class="form-control" id="alamat2" name="alamat"></textarea>
						</div>
						<div class="col-md-12 mb-4">
							<label for="lokasi" class="form-label">Lokasi Jaminan</label>
							<textarea class="form-control" id="lokasi2" name="lokasi"></textarea>
						</div>
						<div class="col-md-12 mb-4">
							<label for="fisik_jaminan" class="form-label">Keterangan</label>
							<textarea class="form-control" id="fisik_jaminan2" name="fisik_jaminan" placeholder="Contoh : Sebidang tanah pertanian yang ......"></textarea>
						</div>
						<div class="col-md-12 mb-4">
							<label for="pertimbangan" class="form-label">Usulan</label>
							<textarea class="form-control" id="usulan2" name="usulan"></textarea>
						</div>
					</div>
					<div class="modal-footer">
						<button id="close_collt" data-dismiss="modal" class="btn btn-danger">Batal</button>
						<button type="button" id="btn_edit_colta" class="btn btn-primary">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!--END MODAL EDIT-->

	<!--MODAL HAPUS collateral tanah-->
	<div class="modal fade" id="deletecolta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="exampleModalLabel">Hapus Data</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
				</div>
				<form class="form-horizontal">
					<div class="modal-body">

						<input type="hidden" name="kode_colta" id="textkode_colta" value="">
						<div class="alert alert-warning">
							<p>Apakah Anda yakin mau menghapus data ini?</p>
						</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
						<button class="btn btn-danger" id="btn_hapus_colta">Hapus</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!--END MODAL HAPUS-->

	<!-- Modal edit collateral kendaraan-->
	<div class="modal fade" id="editcolken" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Collateral Kendaraan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form id="form_colken">
					<div class="modal-body">
						<div class="row">
							<div class="col-md-3 mb-4">
								<label for="status" class="form-label">Roda</label>
								<select class="form-control" aria-label="Default select example" id="roda2" name="roda">
									<option value=""></option>
									<option value="2 (Dua)">2</option>
									<option value="4 (Empat)">4</option>
									<option value="6 (Enam)">6</option>
									<option value="8 (Delapan)">8</option>
								</select>
							</div>
							<div class="col-md-3 mb-4">
								<label for="nopol" class="form-label">Nomor Polisi</label>
								<input type="hidden" class="form-control" id="id_col2" name="id_col">
								<input type="hidden" class="form-control" id="id_lb2" name="id_lb">
								<input type="text" class="form-control" id="nopol2" name="nopol">
							</div>
							<div class="col-md-3 mb-4">
								<label for="nama_stnk" class="form-label">Nama di STNK</label>
								<input type="text" class="form-control" id="nama_stnk2" name="nama_stnk">
							</div>
							<div class="col-md-3 mb-4">
								<label for="tahun" class="form-label">Tahun</label>
								<input type="year" class="form-control" id="tahun2" name="tahun">
							</div>
						</div>
						<div class="row">
							<div class="col-md-3 mb-4">
								<label for="silinder" class="form-label">Isi Silinder</label>
								<input type="text" class="form-control" id="silinder2" name="silinder">
							</div>
							<div class="col-md-3 mb-4">
								<label for="no_rangka" class="form-label">No. Rangka</label>
								<input type="text" class="form-control" id="no_rangka2" name="no_rangka">
							</div>
							<div class="col-md-3 mb-4">
								<label for="no_mesin" class="form-label">No. Mesin</label>
								<input type="text" class="form-control" id="no_mesin2" name="no_mesin">
							</div>
							<div class="col-md-3 mb-4">
								<label for="no_bpkb" class="form-label">No. BPKB</label>
								<input type="text" class="form-control" id="no_bpkb2" name="no_bpkb">
							</div>
						</div>
						<div class="row">
							<div class="col-md-4 mb-4">
								<label for="type" class="form-label">Merk / Type</label>
								<input type="text" class="form-control" id="type2" name="type">
							</div>
							<div class="col-md-4 mb-4">
								<label for="jenis" class="form-label">Jenis / Model</label>
								<input type="text" class="form-control" id="jenis2" name="jenis">
							</div>
							<div class="col-md-4 mb-4">
								<label for="warna" class="form-label">Warna</label>
								<input type="text" class="form-control" id="warna2" name="warna">
							</div>
						</div>
						<div class="row">
							<div class="col-md-4 mb-4">
								<label for="taksiran" class="form-label">Harga Pasaran</label>
								<input type="number" class="form-control" id="taksiran2" name="taksiran" required>
							</div>
							<div class="col-md-4 mb-4">
								<label for="nl" class="form-label">NL</label>
								<input type="number" class="form-control" id="nl2" name="nl">
							</div>
							<div class="col-md-4 mb-4">
								<label for="milik" class="form-label">Hak Milik</label>
								<input type="text" class="form-control" id="milik2" name="milik">
							</div>
						</div>
						<div class="col-md-12 mb-4">
							<label for="alamat" class="form-label">Alamat Pemilik</label>
							<textarea class="form-control" id="alamat2" name="alamat"></textarea>
						</div>
						<div class="col-md-12 mb-4">
							<label for="kondisi" class="form-label">Usulan</label>
							<textarea class="form-control" id="usulan2" name="usulan"></textarea>
						</div>
					</div>
					<div class="modal-footer">
						<button id="close_collk" data-dismiss="modal" class="btn btn-danger">Batal</button>
						<button type="button" id="btn_edit_colken" class="btn btn-primary">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!--END MODAL EDIT-->

	<!--MODAL HAPUS collateral kendaraan-->
	<div class="modal fade" id="deletecolken" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="exampleModalLabel">Hapus Data</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
				</div>
				<form class="form-horizontal">
					<div class="modal-body">

						<input type="hidden" name="kode_colken" id="textkode_colken" value="">
						<div class="alert alert-warning">
							<p>Apakah Anda yakin mau menghapus data ini?</p>
						</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
						<button class="btn btn-danger" id="btn_hapus_colken">Hapus</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!--END MODAL HAPUS-->

	<!-- Modal edit realisasi-->
	<div class="modal fade" id="editreal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">realisasi</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>                                        
                <form id="form_real">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-7 mb-3">
                                <label for="oleh" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="oleh2" name="oleh">
                                <input type="hidden" class="form-control" id="id_lb2" name="id_lb">
                                <input type="hidden" class="form-control" id="id_real2" name="id_real">
                            </div>
                            <div class="col-md-5 mb-3">
                                <label for="sebagai" class="form-label">Sebagai</label>
                                <input type="text" class="form-control" id="sebagai2" name="sebagai">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
						<button id="close_real" data-dismiss="modal" class="btn btn-danger">Batal</button>
                        <button type="button" id="btn_edit_real" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
			</div>
		</div>
	</div>
	<!--END MODAL EDIT-->

	<!--MODAL HAPUS realisasi-->
	<div class="modal fade" id="deletereal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="exampleModalLabel">Hapus Data</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
				</div>
				<form class="form-horizontal">
					<div class="modal-body">

						<input type="hidden" name="kode_real" id="textkode_real" value="">
						<div class="alert alert-warning">
							<p>Apakah Anda yakin mau menghapus data ini?</p>
						</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
						<button class="btn btn-danger" id="btn_hapus_real">Hapus</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!--END MODAL HAPUS-->

	<!-- Modal edit usulan-->
	<div class="modal fade" id="editusul" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Usulan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form id="form_usul">
					<div class="modal-body">
						<div class="row">
							<div class="col-md-3 mb-4">
								<label for="character" class="form-label">Character</label>
								<input type="text" class="form-control" id="character2" name="character">
								<input type="hidden" class="form-control" id="id_usulan2" name="id_usulan">
								<input type="hidden" class="form-control" id="id_lb2" name="id_lb">
							</div>
							<div class="col-md-3 mb-4">
								<label for="capacity" class="form-label">Capacity</label>
								<input type="text" class="form-control" id="capacity2" name="capacity">
							</div>
							<div class="col-md-3 mb-4">
								<label for="capital" class="form-label">Capital</label>
								<input type="text" class="form-control" id="capital2" name="capital">
							</div>
							<div class="col-md-3 mb-4">
								<label for="coe" class="form-label">Condition</label>
								<input type="text" class="form-control" id="coe2" name="coe">
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-md-3 mb-4">
								<label for="collateral" class="form-label">Collateral</label>
								<input type="text" class="form-control" id="collateral2" name="collateral">
							</div>
							<div class="col-md-4 mb-4">
								<label for="realisasi" class="form-label">Tanggal Ralisasi</label>
								<input type="date" class="form-control" id="realisasi2" name="realisasi">
							</div>
                            <div class="col-md-5 mb-4">
                                <label for="plafond" class="form-label">Plafond</label>
                                <input type="number" class="form-control" id="plafond2" name="plafond">
                            </div>
						</div>
                        <div class="row">
                            <div class="col-md-3 mb-4">
                                <label for="waktu" class="form-label">Jangka Waktu (Bln)</label>
                                <input type="number" class="form-control" id="waktu2" name="waktu">
                            </div>
                            <div class="col-md-3 mb-4">
                                <label for="bunga" class="form-label">Bunga</label>
                                <input type="text" class="form-control" id="bunga2" name="bunga">
                            </div>
                            <div class="col-md-3 mb-4">
                                <label for="provisi" class="form-label">Provisi (%)</label>
                                <input type="text" class="form-control" id="provisi2" name="provisi" placeholder="Contoh : 0.5">
                            </div>
                            <div class="col-md-3 mb-4">
                                <label for="administrasi" class="form-label">Administrasi (%)</label>
                                <input type="text" class="form-control" id="administrasi2" name="administrasi" placeholder="Contoh : 0.75">
                            </div>
                        </div>          
                        <hr>  
                        <div class="row">
                            <div class="col-md-4 mb-4">
                                <label for="asuransi" class="form-label">Asuransi</label>
                                <input type="text" class="form-control" id="asuransi2" name="asuransi">
                            </div>
                            <div class="col-md-4 mb-4">
                                <label for="materai" class="form-label">Materai</label>
                                <input type="text" class="form-control" id="materai2" name="materai">
                            </div>
                            <div class="col-md-4 mb-4">
                                <label for="apht" class="form-label">APHT</label>
                                <input type="text" class="form-control" id="apht2" name="apht">
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-md-4 mb-4">
                                <label for="skmht" class="form-label">SKMHT</label>
                                <input type="text" class="form-control" id="skmht2" name="skmht">
                            </div>                                   
                            <div class="col-md-4 mb-4">
                                <label for="titipan" class="form-label">Biaya SKMHT ke APHT</label>
                                <input type="text" class="form-control" id="titipan2" name="titipan">
                            </div>
                            <div class="col-md-4 mb-4">
                                <label for="fiduciare" class="form-label">Fiduciare Didaftarkan</label>
                                <input type="text" class="form-control" id="fiduciare2" name="fiduciare">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-4">
                                <label for="legalisasi" class="form-label">Legalisasi</label>
                                <input type="text" class="form-control" id="legalisasi2" name="legalisasi">
                            </div>
                            <div class="col-md-4 mb-4">
                                <label for="roya" class="form-label">Roya</label>
                                <input type="text" class="form-control" id="roya2" name="roya">
                            </div>
                            <div class="col-md-4 mb-4">
                                <label for="lainnya" class="form-label">Lain -lain</label>
                                <input type="text" class="form-control" id="lainnya2" name="lainnya">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-4">
                                <label for="notaris" class="form-label">Notaris</label>
                                <input type="text" class="form-control" id="notaris2" name="notaris">
                            </div>
                        </div>
					</div>
					<div class="modal-footer">
						<button id="close_usul" data-dismiss="modal" class="btn btn-danger">Batal</button>
						<button type="button" id="btn_edit_usul" class="btn btn-primary">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!--END MODAL EDIT-->

	<!--MODAL HAPUS usulan-->
	<div class="modal fade" id="deleteusul" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="exampleModalLabel">Hapus Data</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
				</div>
				<form class="form-horizontal">
					<div class="modal-body">

						<input type="hidden" name="kode_usul" id="textkode_usul" value="">
						<div class="alert alert-warning">
							<p>Apakah Anda yakin mau menghapus data ini?</p>
						</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
						<button class="btn btn-danger" id="btn_hapus_usul">Hapus</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!--END MODAL HAPUS-->

    <script>
        //JS untuk mengambil data perkiraan

        //cashflow pendapatan
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

        //cashflow pengeluaran
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

        //cashflow pendapatan sesudah
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

        //cashflow pengeluaran sesudah
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

    
    <script src="<?php echo base_url(); ?>assets/ajax.js"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/jquery.min.js"></script>
    
<!--
    <script type="text/javascript">
        $(document).ready(function(){
            $( "#notaris" ).autocomplete({
              source: "<?php echo site_url('test/get_autocomplete/?');?>"
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $(".add-more").click(function() {
                var html = $(".copy").html();
                $(".after-add-more").before(html);
            });

            // saat tombol remove dklik control group akan dihapus 
            $("body").on("click", ".remove", function() {
                $(this).parents(".form-group").remove();
            });
        });
    </script>    

    <script>
        console.clear();
        const currency = [2000, 1000, 500, 200, 100, 50, 20, 10, 5, 2, 1];

        const valueRef = document.querySelector("#plafond");

        function getCurrency(value) {
            console.clear();
            var map = new Map();
            let i = 0;
            //loop unitll value 0
            while (value) {
                //if divide in non-zero add in map
                if (Math.floor(value / currency[i]) != 0) {
                    map.set(currency[i], Math.floor(value / currency[i]));
                    //update value using mod
                    value = value % currency[i];
                }
                i++;
            }

            debugger;
            for (var [key, value] of map) {
                console.log(key + ' = ' + value);
            }
        }

        function getChange() {
            // 48 - 57 (0-9)
            var str1 = valueRef.value;
            if (
                str1[str1.length - 1].charCodeAt() < 48 ||
                str1[str1.length - 1].charCodeAt() > 57
            ) {
                valueRef.value = str1.substring(0, str1.length - 1);
                return;
            }

            // t.replace(/,/g,'')
            let str = valueRef.value.replace(/,/g, "");

            let value = +str;
            getCurrency(value)
            valueRef.value = value.toLocaleString();
        }

        valueRef.addEventListener("keyup", getChange);
        console.log(valueRef);
    </script>
-->


</div>

</div>
