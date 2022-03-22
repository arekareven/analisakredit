<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#capital">
        Add
    </button>

    <hr>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Jumlah Aktiva Lancar</th>
                <th scope="col">Jumlah Aktiva Tetap</th>
                <th scope="col">Total Kewajiban</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($query->result() as $row) {
                echo "<tr>
                        <td>".'Rp '.number_format($row->total_al). "</td>
                        <td>".'Rp '.number_format($row->total_at). "</td>                     
                        <td>".'Rp '.number_format($row->total_kjb). "</td>                     
                        <td><a href='templateword2?id_capi=" . $row->id_capi . "' class ='btn btn-success' title='Next'>Next</a>
                        </td>							
                    </tr>";
            }
            ?>
        </tbody>
    </table>


    <!-- Modal capital -->
    <div class="modal fade" id="capital" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <hr>
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
                            <hr>
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
                            <hr>
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


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->