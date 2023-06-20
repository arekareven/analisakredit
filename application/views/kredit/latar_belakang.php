<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <!-- Button modal Latar Belakang -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#lb">
        Tambah
    </button>
    <hr>

    <div class="card shadow mb-4">
        <div class="card-body">
			<div id="reload">
				<table class="table table-sm" id="dataLb">
					<thead class="thead-dark">
						<tr>
							<th scope="col">Nama</th>
							<th scope="col">Plafond</th>
							<th scope="col">Tgl</th>
							<th scope="col">Status</th>
							<th scope="col">Aksi</th>
						</tr>
					</thead>
					<tbody id="show_data_latar_belakang">
					</tbody>
				</table>
			</div>
        </div>
    </div>

    <!-- Modal LB-->
    <div class="modal fade" id="lb" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Latar Belakang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form_lb" method="post" action="<?php echo base_url('kredit/add_latar_belakang'); ?>">
                    <div class="modal-body">
                        <div class="col-md-8 mb-3">
                            <input type="hidden" id="id_lb" name="id_lb">
                            <input type="hidden" id="user" name="user" value="<?= $user['email']; ?>">
                            <input type="hidden" class="form-control" id="cif_bank" name="cif_bank" value="<?php echo $cif; ?>" readonly>
                        </div>
                        <div class="col-md-8 mb-3">
                            <label for="tgl_permohonan" class="form-label">Tgl Permohonan</label>
                            <input type="date" class="form-control" id="tgl_permohonan" name="tgl_permohonan">
                        </div>
                        <div class="col-md-8 mb-5">
                            <label for="tgl_analisa" class="form-label">Tgl Analisa</label>
                            <input type="date" class="form-control" id="tgl_analisa" name="tgl_analisa">
                        </div>
                        <div class="col-md-12 mb-2">
                            <h4>1. Data Permohonan</h4>
                            <hr>
                        </div>
                        <div class="col-md-8 mb-3">
                            <label for="plafon" class="form-label">Plafond yang dimohon (Input angka saja tanpa titik)</label>
                            <input type="number" class="form-control" id="plafon" name="plafon" placeholder="Contoh : 12000000">
                        </div>
                        <div class="col-md-8 mb-3">
                            <label for="jangka_waktu" class="form-label">Jangka Waktu (Bulan)</label>
                            <input type="number" class="form-control" id="jangka_waktu" name="jangka_waktu" placeholder="Contoh : 12">
                        </div>
                        <div class="col-md-8 mb-3">
                            <label for="sifat_kredit" class="form-label">Sifat Kredit</label>
                            <select class="form-control" aria-label="Default select example" id="sifat_kredit" name="sifat_kredit">
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
                            <input type="text" class="form-control" id="suku_bunga" name="suku_bunga" placeholder="Contoh : 12% flat pertahun">
                        </div>
						
                        <div class="col-md-8 mb-3">
							<p>Apakah ini musiman ?</p>
							<div id="group">
							</div>
							<p id="output"></p>
						</div>
						<script>
							const sizes = ['Ya', 'Tidak'];

							// generate the radio groups        
							const group = document.querySelector("#group");
							group.innerHTML = sizes.map((size) => `<div>
									<input type="radio" name="size" value="${size}" id="${size}">
									<label for="${size}">${size}</label>
								</div>`).join(' ');
							
							// add an event listener for the change event
							const radioButtons = document.querySelectorAll('input[name="size"]');
							for(const radioButton of radioButtons){
								radioButton.addEventListener('change', showSelected);
							}        
							
							function showSelected(e) {
								console.log(e);
								if (this.value == 'Ya') {
									document.querySelector('#output').innerHTML = 
									`<div class="col-md-8 mb-3">
										<label for="musiman" class="form-label">Berapa Bulan ?</label>
										<input type="text" class="form-control" id="musiman" name="musiman" placeholder="Contoh : 4">
									</div>`;
								} else{
									document.querySelector('#output').innerHTML = `<input type="hidden" class="form-control" id="musiman" name="musiman" value="1">`;
								}
							}
						</script>

                        <div class="col-md-8 mb-3">
                            <label for="jenis_permohonan" class="form-label">Jenis Permohonan</label>
                            <select class="form-control" aria-label="Default select example" id="jenis_permohonan" name="jenis_permohonan">
                                <option value="Baru">Baru</option>
                                <option value="Ulangan">Ulangan</option>
                                <option value="Top Up">Top Up / Perpanjangan</option>
                                <option value="Restrukturisasi">Restrukturisasi</option>
                            </select>
                        </div>
                        <div class="col-md-8 mb-3">
                            <label for="tujuan_permohonan" class="form-label">Tujuan Penggunaan</label>
                            <select class="form-control" aria-label="Default select example" id="tujuan_permohonan" name="tujuan_permohonan">
                                <option value="Modal Kerja">Modal Kerja</option>
                                <option value="Investasi">Investasi</option>
                                <option value="Konsumtif">Konsumtif</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-5">
                            <label for="ket_penggunaan" class="form-label">Keterangan Penggunaan</label>
                            <textarea class="form-control" id="ket_penggunaan" name="ket_penggunaan"></textarea>
                        </div>
                        <div class="col-md-12 mb-2">
                            <h4>2. Data Diri Nasabah</h4>
                            <hr>
                        </div>
                        <div class="col-md-8 mb-3">
                            <label for="nama_debitur" class="form-label">Nama Debitur</label>
                            <input type="text" class="form-control" id="nama_debitur" name="nama_debitur">
                        </div>
                        <div class="col-md-8 mb-3">
                            <label for="status_kawin" class="form-label">Status Perkawinan</label>
                            <select class="form-control" aria-label="Default select example" id="status_kawin" name="status_kawin">
                                <option value="Lajang">Lajang</option>
                                <option value="Menikah">Menikah</option>
                                <option value="Duda">Duda</option>
                                <option value="Janda">Janda</option>
                            </select>
                        </div>
                        <div class="col-md-8 mb-3">
                            <label for="ttl_nasabah" class="form-label">Tempat, tgl lahir</label>
                            <input type="text" class="form-control" id="ttl_nasabah" name="ttl_nasabah" placeholder="Contoh : Magetan, 13 Maret 1991">
                        </div>
                        <div class="col-md-8 mb-3">
                            <label for="ktp" class="form-label">No. KTP</label>
                            <input type="text" class="form-control" id="ktp" name="ktp">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="alamat_ktp_nasabah" class="form-label">Alamat Sesuai KTP</label>
                            <textarea class="form-control" id="alamat_ktp_nasabah" name="alamat_ktp_nasabah"></textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="domisili_nasabah" class="form-label">Alamat Sesuai Domisili</label>
                            <textarea class="form-control" id="domisili_nasabah" name="domisili_nasabah"></textarea>
                        </div>
                        <div class="col-md-8 mb-3">
                            <label for="hp_nasabah" class="form-label">No. Tlp</label>
                            <input type="text" class="form-control" id="hp_nasabah" name="hp_nasabah">
                        </div>
                        <div class="col-md-8 mb-3">
                            <label for="status_tt" class="form-label">Status Tempat Tinggal</label>
                            <select class="form-control" aria-label="Default select example" id="status_tt" name="status_tt">
                                <option value="Milik Sendiri">Milik Sendiri</option>
                                <option value="Milik Keluarga/Ortu">Milik Keluarga/Ortu</option>
                                <option value="Instansi">Instansi</option>
                                <option value="Kontrak">Kontrak</option>
                                <option value="Kredit">Kredit</option>
                            </select>
                        </div>
                        <div class="col-md-8 mb-3">
                            <label for="pekerjaan_nasabah" class="form-label">Pekerjaan</label>
                            <input type="text" class="form-control" id="pekerjaan_nasabah" name="pekerjaan_nasabah">
                        </div>
                        <div class="col-md-8 mb-3">
                            <label for="tanggungan" class="form-label">Tanggungan (Orang)</label>
                            <input type="number" class="form-control" id="tanggungan" name="tanggungan" placeholder="Contoh : 5">
                        </div>
                        <div class="col-md-8 mb-3">
                            <label for="pendidikan" class="form-label">Pendidikan</label>
                            <select class="form-control" aria-label="Default select example" id="pendidikan" name="pendidikan">
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
                            <select class="form-control" aria-label="Default select example" id="jenis_kelamin" name="jenis_kelamin">
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-md-8 mb-3">
                            <label for="masa_laku" class="form-label">Masa Laku</label>
                            <input type="text" class="form-control" id="masa_laku" name="masa_laku" value="Seumur Hidup">
                        </div>
                        <div class="col-md-8 mb-3">
                            <label for="telp_kantor" class="form-label">No. Tlp Kantor</label>
                            <input type="text" class="form-control" id="telp_kantor" name="telp_kantor">
                        </div>
                        <div class="col-md-8 mb-5">
                            <label for="lama_tinggal" class="form-label">Lama Tinggal (Tahun)</label>
                            <input type="number" class="form-control" id="lama_tinggal" name="lama_tinggal" placeholder="Contoh : 15">
                        </div>
                        <div class="col-md-12 mb-2">
                            <h4>3. Data Suami/Istri</h4>
                            <hr>
                        </div>
                        <div class="col-md-8 mb-3">
                            <label for="nama_pasangan" class="form-label">Nama Istri/Suami</label>
                            <input type="text" class="form-control" id="nama_pasangan" name="nama_pasangan">
                        </div>
                        <div class="col-md-8 mb-3">
                            <label for="ttl_pasangan" class="form-label">Tempat, tgl lahir</label>
                            <input type="text" class="form-control" id="ttl_pasangan" name="ttl_pasangan" placeholder="Contoh : Surabaya, 15 Mei 1988">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="alamat_ktp_pasangan" class="form-label">Alamat Sesuai KTP</label>
                            <textarea class="form-control" id="alamat_ktp_pasangan" name="alamat_ktp_pasangan"></textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="domisili_pasangan" class="form-label">Alamat Sesuai Domisili</label>
                            <textarea class="form-control" id="domisili_pasangan" name="domisili_pasangan"></textarea>
                        </div>
                        <div class="col-md-8 mb-3">
                            <label for="pekerjaan_pasangan" class="form-label">Profesi Istri/Suami</label>
                            <input type="text" class="form-control" id="pekerjaan_pasangan" name="pekerjaan_pasangan">
                        </div>
                        <div class="col-md-8 mb-5">
                            <label for="hp_pasangan" class="form-label">No. Tlp</label>
                            <input type="text" class="form-control" id="hp_pasangan" name="hp_pasangan">
                        </div>
                        <div class="col-md-12 mb-2">
                            <h4>4. Data Emergency Contact</h4>
                            <hr>
                        </div>
                        <div class="col-md-8 mb-3">
                            <label for="nama_keluarga" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama_keluarga" name="nama_keluarga">
                        </div>
                        <div class="col-md-8 mb-3">
                            <label for="hubungan_keluarga" class="form-label">Hubungan Keluarga</label>
                            <select class="form-control" aria-label="Default select example" id="hubungan_keluarga" name="hubungan_keluarga">
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
                            <textarea class="form-control" id="alamat_keluarga" name="alamat_keluarga"></textarea>
                        </div>
                        <div class="col-md-8 mb-5">
                            <label for="hp_keluarga" class="form-label">No. Tlp/Hp</label>
                            <input type="text" class="form-control" id="hp_keluarga" name="hp_keluarga">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal edit-->
    <div class="modal fade" id="edit_latar_belakang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Input Data</h5>
                    <button type="button" id="close_lb" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
					<form id="form_lb">
						<div class="modal-body">
							<div class="col-md-8 mb-3">
								<label for="tgl_permohonan" class="form-label">Tgl Permohonan</label>
								<input type="date" class="form-control" id="tgl_permohonan2" name="tgl_permohonan">
							</div>
							<div class="col-md-8 mb-5">
								<label for="tgl_analisa" class="form-label">Tgl Analisa</label>
								<input type="date" class="form-control" id="tgl_analisa2" name="tgl_analisa">
							</div>
							<div class="col-md-12 mb-2">
								<h4>1. Data Permohonan</h4>
								<hr>
							</div>
							<div class="col-md-8 mb-3">
								<label for="plafon" class="form-label">Plafond yang dimohon</label>
								<input type="hidden" class="form-control" id="id_lb2" name="id_lb">
								<input type="number" class="form-control" id="plafon2" name="plafon">
							</div>
							<div class="col-md-8 mb-3">
								<label for="jangka_waktu" class="form-label">Jangka Waktu (Bulan)</label>
								<input type="number" class="form-control" id="jangka_waktu2" name="jangka_waktu">
							</div>
							<div class="col-md-8 mb-3">
								<label for="sifat_kredit" class="form-label">Sifat Kredit</label>
								<select class="form-control" aria-label="Default select example" id="sifat_kredit2" name="sifat_kredit">
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
								<input type="text" class="form-control" id="suku_bunga2" name="suku_bunga">
							</div>
							<div class="col-md-8 mb-3">
								<label for="musiman" class="form-label">Musiman (Bulan)</label>
								<input type="number" class="form-control" id="musiman2" name="musiman"">
							</div>
							<div class="col-md-8 mb-3">
								<label for="jenis_permohonan" class="form-label">Jenis Permohonan</label>
								<select class="form-control" aria-label="Default select example" id="jenis_permohonan2" name="jenis_permohonan">
									<option value="Baru">Baru</option>
									<option value="Ulangan">Ulangan</option>
									<option value="Top Up">Top Up / Perpanjangan</option>
									<option value="Restrukturisasi">Restrukturisasi</option>
								</select>
							</div>
							<div class="col-md-8 mb-3">
								<label for="tujuan_permohonan" class="form-label">Tujuan Penggunaan</label>
								<select class="form-control" aria-label="Default select example" id="tujuan_permohonan2" name="tujuan_permohonan">
									<option value="Modal Kerja">Modal Kerja</option>
									<option value="Investasi">Investasi</option>
									<option value="Konsumtif">Konsumtif</option>
								</select>
							</div>
							<div class="col-md-12 mb-5">
								<label for="ket_penggunaan" class="form-label">Keterangan Penggunaan</label>
								<textarea class="form-control" id="ket_penggunaan2" name="ket_penggunaan"></textarea>
							</div>
							<div class="col-md-12 mb-2">
								<h4>2. Data Diri Nasabah</h4>
								<hr>
							</div>
							<div class="col-md-8 mb-3">
								<label for="nama_debitur" class="form-label">Nama Debitur</label>
								<input type="text" class="form-control" id="nama_debitur2" name="nama_debitur">
							</div>
							<div class="col-md-8 mb-3">
								<label for="status_kawin" class="form-label">Status Perkawinan</label>
								<select class="form-control" aria-label="Default select example" id="status_kawin2" name="status_kawin">
									<option value="Lajang">Lajang</option>
									<option value="Menikah">Menikah</option>
									<option value="Duda">Duda</option>
									<option value="Janda">Janda</option>
								</select>
							</div>
							<div class="col-md-8 mb-3">
								<label for="ttl_nasabah" class="form-label">Tempat, tgl lahir</label>
								<input type="text" class="form-control" id="ttl_nasabah2" name="ttl_nasabah">
							</div>
							<div class="col-md-8 mb-3">
								<label for="ktp" class="form-label">No. KTP</label>
								<input type="number" class="form-control" id="ktp2" name="ktp">
							</div>
							<div class="col-md-12 mb-3">
								<label for="alamat_ktp_nasabah" class="form-label">Alamat Sesuai KTP</label>
								<textarea class="form-control" id="alamat_ktp_nasabah2" name="alamat_ktp_nasabah"></textarea>
							</div>
							<div class="col-md-12 mb-3">
								<label for="domisili_nasabah" class="form-label">Alamat Sesuai Domisili</label>
								<textarea class="form-control" id="domisili_nasabah2" name="domisili_nasabah"></textarea>
							</div>
							<div class="col-md-8 mb-3">
								<label for="hp_nasabah" class="form-label">No. Tlp</label>
								<input type="text" class="form-control" id="hp_nasabah2" name="hp_nasabah">
							</div>
							<div class="col-md-8 mb-3">
								<label for="status_tt" class="form-label">Status Tempat Tinggal</label>
								<select class="form-control" aria-label="Default select example" id="status_tt2" name="status_tt">
									<option value="Milik Sendiri">Milik Sendiri</option>
									<option value="Milik Keluarga/Ortu">Milik Keluarga/Ortu</option>
									<option value="Instansi">Instansi</option>
									<option value="Kontrak">Kontrak</option>
									<option value="Kredit">Kredit</option>
								</select>
							</div>
							<div class="col-md-8 mb-3">
								<label for="pekerjaan_nasabah" class="form-label">Pekerjaan</label>
								<input type="text" class="form-control" id="pekerjaan_nasabah2" name="pekerjaan_nasabah">
							</div>
							<div class="col-md-8 mb-3">
								<label for="tanggungan" class="form-label">Tanggungan (Orang)</label>
								<input type="number" class="form-control" id="tanggungan2" name="tanggungan">
							</div>
							<div class="col-md-8 mb-3">
								<label for="pendidikan" class="form-label">Pendidikan</label>
								<select class="form-control" aria-label="Default select example" id="pendidikan2" name="pendidikan">
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
								<select class="form-control" aria-label="Default select example" id="jenis_kelamin2" name="jenis_kelamin">
									<option value="Laki-laki">Laki-laki</option>
									<option value="Perempuan">Perempuan</option>
								</select>
							</div>
							<div class="col-md-8 mb-3">
								<label for="masa_laku" class="form-label">Masa Laku</label>
								<input type="text" class="form-control" id="masa_laku2" name="masa_laku" value="Seumur Hidup">
							</div>
							<div class="col-md-8 mb-3">
								<label for="telp_kantor" class="form-label">No. Tlp Kantor</label>
								<input type="text" class="form-control" id="telp_kantor2" name="telp_kantor">
							</div>
							<div class="col-md-8 mb-5">
								<label for="lama_tinggal" class="form-label">Lama Tinggal (Tahun)</label>
								<input type="number" class="form-control" id="lama_tinggal2" name="lama_tinggal">
							</div>
							<div class="col-md-12 mb-2">
								<h4>3. Data Suami/Istri</h4>
								<hr>
							</div>
							<div class="col-md-8 mb-3">
								<label for="nama_pasangan" class="form-label">Nama Istri/Suami</label>
								<input type="text" class="form-control" id="nama_pasangan2" name="nama_pasangan">
							</div>
							<div class="col-md-8 mb-3">
								<label for="ttl_pasangan" class="form-label">Tempat, tgl lahir</label>
								<input type="text" class="form-control" id="ttl_pasangan2" name="ttl_pasangan">
							</div>
							<div class="col-md-12 mb-3">
								<label for="alamat_ktp_pasangan" class="form-label">Alamat Sesuai KTP</label>
								<textarea class="form-control" id="alamat_ktp_pasangan2" name="alamat_ktp_pasangan"></textarea>
							</div>
							<div class="col-md-12 mb-3">
								<label for="domisili_pasangan" class="form-label">Alamat Sesuai Domisili</label>
								<textarea class="form-control" id="domisili_pasangan2" name="domisili_pasangan"></textarea>
							</div>
							<div class="col-md-8 mb-3">
								<label for="pekerjaan_pasangan" class="form-label">Profesi Istri/Suami</label>
								<input type="text" class="form-control" id="pekerjaan_pasangan2" name="pekerjaan_pasangan">
							</div>
							<div class="col-md-8 mb-5">
								<label for="hp_pasangan" class="form-label">No. Tlp</label>
								<input type="text" class="form-control" id="hp_pasangan2" name="hp_pasangan">
							</div>
							<div class="col-md-12 mb-2">
								<h4>4. Data Emergency Contact</h4>
								<hr>
							</div>
							<div class="col-md-8 mb-3">
								<label for="nama_keluarga" class="form-label">Nama Lengkap</label>
								<input type="text" class="form-control" id="nama_keluarga2" name="nama_keluarga">
							</div>
							<div class="col-md-8 mb-3">
								<label for="hubungan_keluarga" class="form-label">Hubungan Keluarga</label>
								<select class="form-control" aria-label="Default select example" id="hubungan_keluarga2" name="hubungan_keluarga">
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
								<textarea class="form-control" id="alamat_keluarga2" name="alamat_keluarga"></textarea>
							</div>
							<div class="col-md-8 mb-5">
								<label for="hp_keluarga" class="form-label">No. Tlp/Hp</label>
								<input type="text" class="form-control" id="hp_keluarga2" name="hp_keluarga">
							</div>

						</div>
						<div class="modal-footer">
						<button id="close_lb" data-dismiss="modal" class="btn btn-danger">Batal</button>
						<button id="btn_edit_lb" class="btn btn-primary">Simpan</button>
						</div>
					</form>
            </div>
        </div>
    </div>

	<!--MODAL HAPUS -->
	<div class="modal fade" id="deletelb" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="exampleModalLabel">Hapus Data</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
				</div>
				<form class="form-horizontal">
					<div class="modal-body">

						<input type="hidden" name="kode_lb" id="textkode_lb" value="">
						<div class="alert alert-warning">
							<p>Apakah Anda yakin mau menghapus riwayat ini?</p>
						</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
						<button class="btn btn-danger" id="btn_hapus_lb">Hapus</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!--END MODAL HAPUS-->
	
	<!-- JS untuk menyimpan data ke database dan reset form -->
    <script type="text/javascript">

        //latar belakang
        $(document).ready(function() {
            tampil_data_lb(); //pemanggilan fungsi tampil latar belakang.
            $('#dataLb').dataTable();

            //fungsi tampil latar belakang
            function tampil_data_lb() {
				$.ajax({
                    type: 'POST',
                    url: '<?php echo base_url() ?>kredit/show_latar_belakang',
                    async: true,
                    dataType: 'json',
                    data: {
                    },
                    success: function(data) {
                        var html = '';
                        var i;
                        for (i = 0; i < data.length; i++) {

							if(data[i].status != null){
								switch (data[i].status) {
									case "Diajukan":
										$badge = "info";
										break;
									case "Tidak layak":
										$badge = "danger";
										break;
									case "Layak dgn catatan":
										$badge = "warning";
										break;
									case "Ditolak":
										$badge = "danger";
										break;
									case "Diteruskan ke Analis":
										$badge = "success";
										break;
									default:
										$badge = "success";
										break;
								}
							}else{
								data[i].status = "Belum Diajukan";
								$badge = "info";
							}


                            html += '<tr>'+
									'<td>' + data[i].nama_debitur + '</td>'+
									'<td>' + 'Rp. ' + new Intl.NumberFormat().format(data[i].plafon) + '</td>'+
									'<td>' + new Date(data[i].tgl_permohonan).toLocaleDateString('es-CL') + '</td>'+                     
									'<td><span class="badge badge-'+$badge+'">' + data[i].status + '</span></td>'+
									'<td>'+
									'<a href="javascript:;" class="btn btn-warning btn-sm item_edit_latar_belakang" data="' + data[i].id_lb + '"><i class="fas fa-edit"></i></a>' + ' ' +
									'<a href="javascript:;" class="btn btn-danger btn-sm item_hapus_latar_belakang" data="' + data[i].id_lb + '"><i class="fas fa-trash"></i></a>' + ' ' +
									'<a href="to_rp?id_lb=' + data[i].id_lb + '" class="btn btn-success btn-sm"><i class="fas fa-arrow-right"></i></a>' +
									'</td>'+					
								'</tr>';
                        }
                        $('#show_data_latar_belakang').html(html);
                    }
                });
            }
            
			//GET edit latar belakang
			$('#show_data_latar_belakang').on('click', '.item_edit_latar_belakang', function() {
				var id = $(this).attr('data');
				$.ajax({
					type: "GET",
					url: "<?php echo base_url('kredit/edit_latar_belakang') ?>",
					dataType: "JSON",
					data: {
						id: id
					},
					success: function(datalb) {
						$.each(datalb, function(id_lb, tgl_analisa, tgl_permohonan, plafon, jangka_waktu, sifat_kredit, suku_bunga, musiman,
						jenis_permohonan,tujuan_permohonan,ket_penggunaan,nama_debitur,status_kawin,ttl_nasabah,ktp,alamat_ktp_nasabah,
						domisili_nasabah,hp_nasabah,status_tt,pekerjaan_nasabah,tanggungan,pendidikan,jenis_kelamin,masa_laku,telp_kantor,
						lama_tinggal,nama_pasangan,ttl_pasangan,alamat_ktp_pasangan,domisili_pasangan,pekerjaan_pasangan,hp_pasangan,nama_keluarga,
						hubungan_keluarga,alamat_keluarga_hp_keluarga) {
							$('#edit_latar_belakang').modal('show');
							$('[name="id_lb"]').val(datalb.id_lb);
							$('[name="tgl_analisa"]').val(datalb.tgl_analisa);
							$('[name="tgl_permohonan"]').val(datalb.tgl_permohonan);
							$('[name="plafon"]').val(datalb.plafon);
							$('[name="jangka_waktu"]').val(datalb.jangka_waktu);
							$('[name="sifat_kredit"]').val(datalb.sifat_kredit);
							$('[name="suku_bunga"]').val(datalb.suku_bunga);							
							$('[name="musiman"]').val(datalb.musiman);							
							$('[name="jenis_permohonan"]').val(datalb.jenis_permohonan);
							$('[name="tujuan_permohonan"]').val(datalb.tujuan_permohonan);
							$('[name="ket_penggunaan"]').val(datalb.ket_penggunaan);
							$('[name="nama_debitur"]').val(datalb.nama_debitur);
							$('[name="status_kawin"]').val(datalb.status_kawin);
							$('[name="ttl_nasabah"]').val(datalb.ttl_nasabah);
							$('[name="ktp"]').val(datalb.ktp);
							$('[name="alamat_ktp_nasabah"]').val(datalb.alamat_ktp_nasabah);
							$('[name="domisili_nasabah"]').val(datalb.domisili_nasabah);
							$('[name="hp_nasabah"]').val(datalb.hp_nasabah);
							$('[name="status_tt"]').val(datalb.status_tt);
							$('[name="pekerjaan_nasabah"]').val(datalb.pekerjaan_nasabah);
							$('[name="tanggungan"]').val(datalb.tanggungan);
							$('[name="pendidikan"]').val(datalb.pendidikan);
							$('[name="jenis_kelamin"]').val(datalb.jenis_kelamin);
							$('[name="masa_laku"]').val(datalb.masa_laku);
							$('[name="telp_kantor"]').val(datalb.telp_kantor);
							$('[name="lama_tinggal"]').val(datalb.lama_tinggal);
							$('[name="nama_pasangan"]').val(datalb.nama_pasangan);
							$('[name="ttl_pasangan"]').val(datalb.ttl_pasangan);
							$('[name="alamat_ktp_pasangan"]').val(datalb.alamat_ktp_pasangan);
							$('[name="domisili_pasangan"]').val(datalb.domisili_pasangan);
							$('[name="pekerjaan_pasangan"]').val(datalb.pekerjaan_pasangan);
							$('[name="hp_pasangan"]').val(datalb.hp_pasangan);
							$('[name="nama_keluarga"]').val(datalb.nama_keluarga);
							$('[name="hubungan_keluarga"]').val(datalb.hubungan_keluarga);
							$('[name="alamat_keluarga"]').val(datalb.alamat_keluarga);
							$('[name="hp_keluarga"]').val(datalb.hp_keluarga);
						});
					}
				});
				return false;
			});
            
			//Update latar Belakang
			$('#btn_edit_lb').on('click', function() {
				var id_lb = $('#id_lb2').val();
				var tgl_permohonan = $('#tgl_permohonan2').val();
				var tgl_analisa = $('#tgl_analisa2').val();
				var plafon = $('#plafon2').val();
				var jangka_waktu = $('#jangka_waktu2').val();
				var sifat_kredit = $('#sifat_kredit2').val();
				var suku_bunga = $('#suku_bunga2').val();							
				var musiman = $('#musiman2').val();							
				var jenis_permohonan = $('#jenis_permohonan2').val();
				var tujuan_permohonan = $('#tujuan_permohonan2').val();
				var ket_penggunaan = $('#ket_penggunaan2').val();
				var nama_debitur = $('#nama_debitur2').val();
				var status_kawin = $('#status_kawin2').val();
				var ttl_nasabah = $('#ttl_nasabah2').val();
				var ktp = $('#ktp2').val();
				var alamat_ktp_nasabah = $('#alamat_ktp_nasabah2').val();
				var domisili_nasabah = $('#domisili_nasabah2').val();
				var hp_nasabah = $('#hp_nasabah2').val();
				var status_tt = $('#status_tt2').val();
				var pekerjaan_nasabah = $('#pekerjaan_nasabah2').val();
				var tanggungan = $('#tanggungan2').val();
				var pendidikan = $('#pendidikan2').val();
				var jenis_kelamin = $('#jenis_kelamin2').val();
				var masa_laku = $('#masa_laku2').val();
				var telp_kantor = $('#telp_kantor2').val();
				var lama_tinggal = $('#lama_tinggal2').val();
				var nama_pasangan = $('#nama_pasangan2').val();
				var ttl_pasangan = $('#ttl_pasangan2').val();
				var alamat_ktp_pasangan = $('#alamat_ktp_pasangan2').val();
				var domisili_pasangan = $('#domisili_pasangan2').val();
				var pekerjaan_pasangan = $('#pekerjaan_pasangan2').val();
				var hp_pasangan = $('#hp_pasangan2').val();
				var nama_keluarga = $('#nama_keluarga2').val();
				var hubungan_keluarga = $('#hubungan_keluarga2').val();
				var alamat_keluarga = $('#alamat_keluarga2').val();
				var hp_keluarga = $('#hp_keluarga2').val();
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('kredit/update_latar_belakang') ?>",
					dataType: "text",
					data: {
						id_lb: id_lb,
						tgl_permohonan: tgl_permohonan,
						tgl_analisa: tgl_analisa,
						plafon: plafon,
						jangka_waktu: jangka_waktu,
						sifat_kredit: sifat_kredit,
						suku_bunga: suku_bunga,							
						musiman: musiman,							
						jenis_permohonan: jenis_permohonan,
						tujuan_permohonan: tujuan_permohonan,
						ket_penggunaan: ket_penggunaan,
						nama_debitur: nama_debitur,
						status_kawin: status_kawin,
						ttl_nasabah: ttl_nasabah,
						ktp: ktp,
						alamat_ktp_nasabah: alamat_ktp_nasabah,
						domisili_nasabah: domisili_nasabah,
						hp_nasabah: hp_nasabah,
						status_tt: status_tt,
						pekerjaan_nasabah: pekerjaan_nasabah,
						tanggungan: tanggungan,
						pendidikan: pendidikan,
						jenis_kelamin: jenis_kelamin,
						masa_laku: masa_laku,
						telp_kantor: telp_kantor,
						lama_tinggal: lama_tinggal,
						nama_pasangan: nama_pasangan,
						ttl_pasangan: ttl_pasangan,
						alamat_ktp_pasangan: alamat_ktp_pasangan,
						domisili_pasangan: domisili_pasangan,
						pekerjaan_pasangan: pekerjaan_pasangan,
						hp_pasangan: hp_pasangan,
						nama_keluarga: nama_keluarga,
						hubungan_keluarga: hubungan_keluarga,
						alamat_keluarga: alamat_keluarga,
						hp_keluarga: hp_keluarga
					},
					success: function(data) {
						document.getElementById("form_lb").reset();
						$('#edit_latar_belakang').modal('hide');
						tampil_data_lb();
					}
				});
				return false;
			});

			//GET HAPUS
			$('#show_data_latar_belakang').on('click', '.item_hapus_latar_belakang', function() {
				var id = $(this).attr('data');
				$('#deletelb').modal('show');
				$('[name="kode_lb"]').val(id);
			});

			//Hapus latar belakang
			$('#btn_hapus_lb').on('click', function() {
				var kode = $('#textkode_lb').val();
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('kredit/destroy_latar_belakang') ?>",
					dataType: "JSON",
					data: {
						kode: kode
					},
					success: function(data) {
						$('#deletelb').modal('hide');
						tampil_data_lb();
					}
				});
				return false;
			});
			
            $('#close_lb').on('click', function() {
                document.getElementById("form_lb").reset();
            })
        });

    </script>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
