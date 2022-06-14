<!-- Test case 1-->
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <!-- table pemasukan -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-3">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-cashflow-tab" data-toggle="pill" href="#v-pills-cashflow" role="tab" aria-controls="v-pills-cashflow" aria-selected="false">Cashflow Awal</a>
                        <a class="nav-link" id="v-pills-cashflows-tab" data-toggle="pill" href="#v-pills-cashflows" role="tab" aria-controls="v-pills-cashflows" aria-selected="false">Cashflow Setelah</a>
                    </div>
                </div>
                <div class="col-9">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-cashflow" role="tabpanel" aria-labelledby="v-pills-cashflow-tab">
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
                                                                <a href='#' class='btn btn-danger btn-circle' data-toggle='modal' title='Hapus' data-target='#hapus' onClick=\"HapusDataCashflow('" . $row->kode . "')\"><i class='fas fa-trash'></i></a>
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
                                                                <a href='#' class='btn btn-danger btn-circle' data-toggle='modal' title='Hapus' data-target='#hapus' onClick=\"HapusData('" . $row->id_cf . "')\"><i class='fas fa-trash'></i></a>
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
                                                                <a href='#' class='btn btn-danger btn-circle' data-toggle='modal' title='Hapus' data-target='#hapus' onClick=\"HapusDataCashflow('" . $row->kode . "')\"><i class='fas fa-trash'></i></a>
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
                                                                <a href='#' class='btn btn-danger btn-circle' data-toggle='modal' title='Hapus' data-target='#hapus' onClick=\"HapusDataCashflow('" . $row->kode . "')\"><i class='fas fa-trash'></i></a>
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
                                                                <a href='#' class='btn btn-danger btn-circle' data-toggle='modal' title='Hapus' data-target='#hapus' onClick=\"HapusDataCashflow('" . $row->kode . "')\"><i class='fas fa-trash'></i></a>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
                        <input type="text" class="form-control" id="nama_perkiraanp" name="nama_perkiraanp">
                        <input type="text" class="form-control" id="nama_perkiraanp2" name="nama_perkiraanp2">
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


<!-- untuk menampilkan data edit -->
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

    //menampilkan data edit ke modal cashflow awal, pengeluaran
    function EditDataCashflowp(id_cf, kode, kode_perkiraan, nama_perkiraan, keterangan, saldo) {

        document.getElementById('id_cfp').value = '';
        document.getElementById('kodep').value = kode;
        document.getElementById('kode_perkiraanp2').value = kode_perkiraan;
        document.getElementById('nama_perkiraanp2').value = nama_perkiraan;
        document.getElementById('keteranganp').value = keterangan;
        document.getElementById('saldop').value = saldo
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

    //menampilkan data edit ke modal cashflow awal, pengeluaran
    function EditDataCashflowsp(id_cf, kode, kode_perkiraan, nama_perkiraan, keterangan, saldo) {

        document.getElementById('id_cfcpe').value = '';
        document.getElementById('kodecpe').value = kode;
        document.getElementById('kode_perkiraan_cpe2').value = kode_perkiraan;
        document.getElementById('nama_perkiraan_cpe2').value = nama_perkiraan;
        document.getElementById('keterangancpe').value = keterangan;
        document.getElementById('saldocpe').value = saldo
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