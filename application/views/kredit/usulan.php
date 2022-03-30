<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#usulan">
        Usulan Kredit
    </button>

    <!--
    <button type="button" class="btn btn-info align-right" data-toggle="modal" data-target="#done">
        Done
    </button>
    -->
    <hr>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Plafond</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Notaris</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($query->result() as $row) {
                echo "<tr>
                        <td>" . 'Rp. ' . number_format($row->plafond) . "</td>
                        <td>" . $row->realisasi . "</td>                     
                        <td>" . $row->notaris . "</td>                     
                        <td><a href='usulan/templateword?id_usulan=" . $row->id_usulan . "' class ='btn btn-success' title='Next'>Next</a>
                        </td>							
                    </tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Modal usulan -->
    <div class="modal fade" id="usulan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Input Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('usulan/add'); ?>" method="post">
                    <div class="modal-body">
                        <div class="col-md-6 mb-4">
                            <label for="character" class="form-label">Character</label>
                            <input type="hidden" class="form-control" id="id_lb" name="id_lb" value="<?php echo $id_lb; ?>">
                            <input type="text" class="form-control" id="character" name="character">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="capacity" class="form-label">Capacity</label>
                            <input type="text" class="form-control" id="capacity" name="capacity">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="capital" class="form-label">Capital</label>
                            <input type="text" class="form-control" id="capital" name="capital">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="coe" class="form-label">Condition of Economy</label>
                            <input type="text" class="form-control" id="coe" name="coe">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="collateral" class="form-label">Collateral</label>
                            <input type="text" class="form-control" id="collateral" name="collateral">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="plafond" class="form-label">Plafond</label>
                            <input type="text" class="form-control" id="plafond" name="plafond">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="sifat" class="form-label">Sifat Kredit</label>
                            <input type="text" class="form-control" id="sifat" name="sifat">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="jenis" class="form-label">Jenis Kredit</label>
                            <input type="text" class="form-control" id="jenis" name="jenis">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="tujuan" class="form-label">Tujuan Kredit</label>
                            <input type="text" class="form-control" id="tujuan" name="tujuan">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="sektor" class="form-label">Sektor Kredit</label>
                            <input type="text" class="form-control" id="sektor" name="sektor">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="waktu" class="form-label">Jangka Waktu</label>
                            <input type="text" class="form-control" id="waktu" name="waktu">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="bunga" class="form-label">Bunga (%)</label>
                            <input type="text" class="form-control" id="bunga" name="bunga">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="angsuran" class="form-label">Angsuran</label>
                            <input type="text" class="form-control" id="angsuran" name="angsuran">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="denda" class="form-label">Denda Keterlambatan 0.2 % per Hari</label>
                            <input type="text" class="form-control" id="denda" name="denda">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="realisasi" class="form-label">Tanggal Ralisasi</label>
                            <input type="date" class="form-control" id="realisasi" name="realisasi">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="tanggungan" class="form-label">Hak Tanggungan</label>
                            <input type="text" class="form-control" id="tanggungan" name="tanggungan">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="likuidasi" class="form-label">Nilai Likuidasi</label>
                            <input type="text" class="form-control" id="likuidasi" name="likuidasi">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="lainnya" class="form-label">Nilai Lainnya</label>
                            <input type="text" class="form-control" id="lainnya" name="lainnya">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="jaminan" class="form-label">Jaminan</label>
                            <input type="text" class="form-control" id="jaminan" name="jaminan">
                        </div>
                        <div class="col-md-6 mb-4">
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

    <!-- Modal usulan 
    <div class="modal fade" id="done" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Input Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('usulan/analis'); ?>" method="post">
                    <div class="modal-body">
                        <div class="col-md-6 mb-4">
                            <label for="nama_ao" class="form-label">Nama AO</label>
                            <input type="hidden" class="form-control" id="id_analisis" name="id_analisis">
                            <input type="text" class="form-control" id="nama_ao" name="nama_ao" value="<?php echo $user['name']; ?>" readonly> 
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="nama" class="form-label">Analis</label>
                            <select class="custom-select" id="nama" name="nama" onchange="autofill()">
                                <option value="">-- Pilih analis --</option>
                                <?php
                                foreach ($analis->result() as $row) {
                                    echo "<option name='nama' value='$row->id_analis'>$row->nama</option>";
                                }
                                ?>
                            </select>
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
    -->


    <script src="<?php echo base_url(); ?>assets/ajax.js"></script>
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
<!--
    <script>
        function autofill() {
            var nama = document.getElementById('nama').value;
            $.ajax({
                url: "<?php echo base_url(); ?>usulan/cari_analis",
                data: '&nama=' + nama,
                success: function(data) {
                    var hasil = JSON.parse(data);

                    $.each(hasil, function(key, val) {

                        document.getElementById('nama').value = val.nama;

                    });
                }
            });

        }
    </script>
-->
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->