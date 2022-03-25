<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#collateral">
        Collateral Kendaran
    </button>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#collateralTanah">
        Collateral Tanah
    </button>

    <a href="<?= base_url('collateral/next?id_lb=' . $id_lb); ?>" type="button" class="btn btn-info align-right" >
        Next
    </a>
    <hr>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Nomor Polisi</th>
                <th scope="col">Nama di STNK</th>
                <th scope="col">Merk / Type</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($query->result() as $row) {
                echo "<tr>
                        <td>" . $row->nopol . "</td>
                        <td>" . $row->nama_stnk . "</td>                     
                        <td>" . $row->type . "</td>                     
                        <td><a href='collateral/templateword?id_lb=" . $row->id_lb . "' class ='btn btn-success' title='Next'>Next</a>
                        </td>							
                    </tr>";
            }
            ?>
        </tbody>
    </table>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Jenis</th>
                <th scope="col">Nama Pemilik</th>
                <th scope="col">No. SHM</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($query2->result() as $row) {
                echo "<tr>
                        <td>" . $row->jenis . "</td>
                        <td>" . $row->nama . "</td>                     
                        <td>" . $row->no_shm . "</td>                     
                        <td><a href='collateral/templateword2?id_lb=" . $row->id_lb . "' class ='btn btn-success' title='Next'>Next</a>
                        </td>							
                    </tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Modal collateral -->
    <div class="modal fade" id="collateralTanah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Input Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('collateral/add2'); ?>" method="post">
                    <div class="modal-body">
                        <div class="col-md-8 mb-4">
                            <label for="jenis" class="form-label">Jenis</label>
                            <input type="hidden" class="form-control" id="id_lb" name="id_lb" value="<?php echo $id_lb; ?>">
                            <input type="text" class="form-control" id="jenis" name="jenis">
                        </div>
                        <div class="col-md-8 mb-4">
                            <label for="nama" class="form-label">Nama Pemilik</label>
                            <input type="text" class="form-control" id="nama" name="nama">
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="alamat" class="form-label">alamat Pemilik</label>
                            <textarea class="form-control" id="alamat" name="alamat"></textarea>
                        </div>
                        <div class="col-md-8 mb-4">
                            <label for="no_shm" class="form-label">No. SHM</label>
                            <input type="text" class="form-control" id="no_shm" name="no_shm">
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="lokasi" class="form-label">Lokasi Jaminan</label>
                            <input type="text" class="form-control" id="lokasi" name="lokasi">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="tgl_ukur" class="form-label">Tgl Surat Ukur</label>
                            <input type="date" class="form-control" id="tgl_ukur" name="tgl_ukur">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="no_ukur" class="form-label">No. Surat Ukur</label>
                            <input type="text" class="form-control" id="no_ukur" name="no_ukur">
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="milik" class="form-label">Kepemilikan</label>
                            <input type="text" class="form-control" id="milik" name="milik">
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="fisik_jaminan" class="form-label">Fisik Jaminan</label>
                            <textarea class="form-control" id="fisik_jaminan" name="fisik_jaminan"></textarea>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="luas_t" class="form-label">Luas Tanah</label>
                            <input type="text" class="form-control" id="luas_t" name="luas_t">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="luas_b" class="form-label">Luas Bangunan</label>
                            <input type="text" class="form-control" id="luas_b" name="luas_b">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="harga_t" class="form-label">Harga Tanah SPPT</label>
                            <input type="text" class="form-control" id="harga_t" name="harga_t">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="harga_b" class="form-label">Harga Bangunan SPPT</label>
                            <input type="text" class="form-control" id="harga_b" name="harga_b">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="harga_t2" class="form-label">Harga Tanah Pasar</label>
                            <input type="text" class="form-control" id="harga_t2" name="harga_t2">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="harga_b2" class="form-label">Harga Bangunan Pasar</label>
                            <input type="text" class="form-control" id="harga_b2" name="harga_b2">
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="ht" class="form-label">Nilai HT</label>
                            <textarea class="form-control" id="ht" name="ht"></textarea>
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="taksasi" class="form-label">Taksasi</label>
                            <textarea class="form-control" id="taksasi" name="taksasi"></textarea>
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="pertimbangan" class="form-label">Pertimbangan</label>
                            <textarea class="form-control" id="pertimbangan" name="pertimbangan"></textarea>
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

    <!-- Modal collateral -->
    <div class="modal fade" id="collateral" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Input Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('collateral/add'); ?>" method="post">
                    <div class="modal-body">
                        <div class="col-md-6 mb-4">
                            <label for="nopol" class="form-label">Nomor Polisi</label>
                            <input type="hidden" class="form-control" id="id_lb" name="id_lb" value="<?php echo $id_lb; ?>">
                            <input type="text" class="form-control" id="nopol" name="nopol">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="nama_stnk" class="form-label">Nama di STNK</label>
                            <input type="text" class="form-control" id="nama_stnk" name="nama_stnk">
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat"></textarea>
                        </div>
                        <div class="col-md-8 mb-4">
                            <label for="type" class="form-label">Merk / Type</label>
                            <input type="text" class="form-control" id="type" name="type">
                        </div>
                        <div class="col-md-8 mb-4">
                            <label for="jenis" class="form-label">Jenis / Model</label>
                            <input type="text" class="form-control" id="jenis" name="jenis">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="tahun" class="form-label">Tahun</label>
                            <input type="year" class="form-control" id="tahun" name="tahun">
                        </div>
                        <div class="col-md-8 mb-4">
                            <label for="warna" class="form-label">Warna</label>
                            <input type="text" class="form-control" id="warna" name="warna">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="silinder" class="form-label">Isi Silinder</label>
                            <input type="text" class="form-control" id="silinder" name="silinder">
                        </div>
                        <div class="col-md-8 mb-4">
                            <label for="no_rangka" class="form-label">No. Rangka</label>
                            <input type="text" class="form-control" id="no_rangka" name="no_rangka">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="no_mesin" class="form-label">No. Mesin</label>
                            <input type="text" class="form-control" id="no_mesin" name="no_mesin">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="no_bpkb" class="form-label">No. BPKB</label>
                            <input type="text" class="form-control" id="no_bpkb" name="no_bpkb">
                        </div>
                        <div class="col-md-8 mb-4">
                            <label for="milik" class="form-label">Kepemilikan</label>
                            <input type="text" class="form-control" id="milik" name="milik">
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="taksiran" class="form-label">Taksiran Harga</label>
                            <textarea class="form-control" id="taksiran" name="taksiran"></textarea>
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="nl" class="form-label">NL</label>
                            <textarea class="form-control" id="nl" name="nl"></textarea>
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="kondisi" class="form-label">Kondisi Jaminan</label>
                            <textarea class="form-control" id="kondisi" name="kondisi"></textarea>
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


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->