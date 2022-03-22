<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#capacity">
        Add
    </button>

    <hr>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Nama Bidang Usaha</th>
                <th scope="col">Sektor Usaha</th>
                <th scope="col">Bidang Usaha</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($query->result() as $row) {
                echo "<tr>
                        <td>" . $row->nama_usaha . "</td>
                        <td>" . $row->sektor . "</td>                     
                        <td>" . $row->bidang . "</td>                     
                        <td><a href='capacity/templateword?id_cap=" . $row->id_cap . "' class ='btn btn-success' title='Next'>Next</a>
                        </td>							
                    </tr>";
            }
            ?>
        </tbody>
    </table>


    <!-- Modal capacity -->
    <div class="modal fade" id="capacity" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Input Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('capacity/add'); ?>" method="post">
                    <div class="modal-body">
                        <div class="col-md-4 mb-4">
                            <label for="nama_usaha" class="form-label">Nama Bidang Usaha</label>
                            <input type="hidden" class="form-control" id="id_lb" name="id_lb" value="<?php echo $id_lb; ?>">
                            <input type="text" class="form-control" id="nama_usaha" name="nama_usaha">
                        </div>
                        <div class="col-md-4 mb-4">
                            <label for="sektor" class="form-label">Sektor Usaha</label>
                            <input type="text" class="form-control" id="sektor" name="sektor">
                        </div>
                        <div class="col-md-4 mb-4">
                            <label for="bidang" class="form-label">Bidang Usaha</label>
                            <input type="text" class="form-control" id="bidang" name="bidang">
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="alamat_usaha" class="form-label">Alamat Usaha</label>
                            <textarea class="form-control" id="alamat_usaha" name="alamat_usaha"></textarea>
                        </div>
                        <div class="col-md-4 mb-4">
                            <label for="status_usaha" class="form-label">Status Tempat Usaha</label>
                            <input type="text" class="form-control" id="status_usaha" name="status_usaha">
                        </div>
                        <div class="col-md-4 mb-4">
                            <label for="tlp_usaha" class="form-label">No. Tlp Usaha</label>
                            <input type="text" class="form-control" id="tlp_usaha" name="tlp_usaha">
                        </div>
                        <div class="col-md-4 mb-4">
                            <label for="tgl_mulai" class="form-label">Tanggal Mulai Usaha</label>
                            <input type="date" class="form-control" id="tgl_mulai" name="tgl_mulai">
                        </div>
                        <div class="col-md-4 mb-4">
                            <label for="tgl_nasabah" class="form-label">Jadi Nasabah Sejak</label>
                            <input type="date" class="form-control" id="tgl_nasabah" name="tgl_nasabah">
                        </div>
                        <div class="col-md-4 mb-4">
                            <label for="akta" class="form-label">No. Akta</label>
                            <input type="text" class="form-control" id="akta" name="akta">
                        </div>
                        <div class="col-md-4 mb-4">
                            <label for="tgl_akta" class="form-label">Tanggal Akta</label>
                            <input type="date" class="form-control" id="tgl_akta" name="tgl_akta">
                        </div>
                        <div class="col-md-4 mb-4">
                            <label for="npwp" class="form-label">NPWP</label>
                            <input type="text" class="form-control" id="npwp" name="npwp">
                        </div>
                        <div class="col-md-4 mb-4">
                            <label for="tgl_npwp" class="form-label">Tgl NPWP</label>
                            <input type="date" class="form-control" id="tgl_npwp" name="tgl_npwp">
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="usaha_skrg" class="form-label">Usaha Saat Ini</label>
                            <textarea class="form-control" id="usaha_skrg" name="usaha_skrg"></textarea>
                        </div>
                        <div class="col-md-12 mb-2">
                            <h4>Alokasi Dana</h4>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="alokasi1" class="form-label">Penggunaan</label>
                                <input type="text" class="form-control" id="alokasi1" name="alokasi1">
                            </div>
                            <div class="col-md-4 mb-4">
                                <label for="dana1" class="form-label">Dana</label>
                                <input type="number" class="form-control" id="dana1" name="dana1">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="alokasi2" class="form-label">Penggunaan</label>
                                <input type="text" class="form-control" id="alokasi2" name="alokasi2">
                            </div>
                            <div class="col-md-4 mb-4">
                                <label for="dana2" class="form-label">Dana</label>
                                <input type="number" class="form-control" id="dana2" name="dana2">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="alokasi3" class="form-label">Penggunaan</label>
                                <input type="text" class="form-control" id="alokasi3" name="alokasi3">
                            </div>
                            <div class="col-md-4 mb-4">
                                <label for="dana3" class="form-label">Dana</label>
                                <input type="number" class="form-control" id="dana3" name="dana3">
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <label for="tgl_npwp" class="form-label">Total</label>
                            <input type="date" class="form-control" id="tgl_npwp" name="tgl_npwp">
                        </div>
                        <div class="col-md-12 mb-4">
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


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->