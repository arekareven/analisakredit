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
            <div class="table-responsive">
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
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
                        <a href='next?id_lb=" . $row->id_lb . "' class ='btn btn-warning btn-circle' target='blank' title='Edit'><i class='fas fa-edit'></i></a>             
                        <a class='btn btn-danger btn-circle' data-toggle='modal' data-target='#hapus' onClick=\"HapusData('" . $row->id_lb . "')\"><i class='fas fa-trash'></i></a>                                 
                        <a href='to_rp?id_lb=" . $row->id_lb . "' class ='btn btn-success btn-circle' title='Next'><i class='fas fa-arrow-right'></i></a>
                        </td>							
                        </tr>";
                        }
                        ?>
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
                <form method="post" action="<?php echo base_url('kredit/add'); ?>">
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
                                <option value="Belum Menikah">Belum Menikah</option>
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

    <div id="hapus" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="custom-width-modalLabel">Konfirmasi Hapus</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form action="<?php echo base_url() . 'kredit/hapus'; ?>" method="post" class="form-horizontal" role="form">
                    <div class="modal-body">
                        <p>Apakah anda yakin ingin menghapus?</p>
                        <div>
                            <input type="hidden" id="idt2" name="idt2">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-success waves-effect waves-light">Ya</button>
                    </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
	<!-- /.modal -->

    <!-- Modal edit-->
    <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Input Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
					<form method="post" action="<?php echo base_url('kredit/add'); ?>">
						<div class="modal-body">
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
								<label for="plafon" class="form-label">Plafond yang dimohon</label>
								<input type="hidden" class="form-control" id="id_lb" name="id_lb">
								<input type="text" class="form-control" id="plafon" name="plafon">
							</div>
							<div class="col-md-8 mb-3">
								<label for="jangka_waktu" class="form-label">Jangka Waktu (Bulan)</label>
								<input type="text" class="form-control" id="jangka_waktu" name="jangka_waktu">
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
								<input type="text" class="form-control" id="suku_bunga" name="suku_bunga">
							</div>
							<div class="col-md-8 mb-3">
								<label for="musiman" class="form-label">Musiman (Bulan)</label>
								<input type="text" class="form-control" id="musiman" name="musiman"">
							</div>
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
									<option value="Tidak Menikah">Tidak Menikah</option>
									<option value="Menikah">Menikah</option>
									<option value="Duda">Duda</option>
									<option value="Janda">Janda</option>
								</select>
							</div>
							<div class="col-md-8 mb-3">
								<label for="ttl_nasabah" class="form-label">Tempat, tgl lahir</label>
								<input type="text" class="form-control" id="ttl_nasabah" name="ttl_nasabah">
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
								<input type="text" class="form-control" id="tanggungan" name="tanggungan">
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
								<input type="text" class="form-control" id="lama_tinggal" name="lama_tinggal">
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
								<input type="text" class="form-control" id="ttl_pasangan" name="ttl_pasangan">
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

    <script type="text/javascript">
        function EditData(id_lb, tgl_analisa, tgl_permohonan, plafon, jangka_waktu, sifat_kredit, $suku_bunga, jenis_permohonan, tujuan_permohonan, ket_penggunaan, nama_debitur, status_kawin, ttl_nasabah, ktp, alamat_ktp_nasabah, domisili_nasabah, hp_nasabah, status_tt, pekerjaan_nasabah, tanggungan, pendidikan, jenis_kelamin, masa_laku, telp_kantor, lama_tinggal, nama_pasangan, ttl_pasangan, alamat_ktp_pasangan, domisili_pasangan, pekerjaan_pasangan, hp_pasangan, nama_keluarga, hubungan_keluarga, alamat_keluarga, hp_keluarga) {
            document.getElementById('id_lb').value = id_lb;
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
