<!-- Test case 1-->
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <table class="table table-bordered" width="100%" cellspacing="0">
        <thead class="thead-dark">
            <tr>
                <th scope="col">1</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <button type="button" class="btn btn-info btn-icon-split" data-toggle="modal" data-target="#bismillah">
                        <span class="icon text-white-50">
                            <i class="fas fa-arrow-down"></i>
                        </span>
                        <span class="text">Bismillah</span>
                    </button>
                </td>
            </tr>
        </tbody>
    </table>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Pemasukan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($query->result() as $row) {
                            echo "<tr>
                        <td>" . $row->keterangan1 . "</td>
                        <td>" . 'Rp. ' . number_format($row->pemasukan2) . "</td>                      
                        <td>
                        <a href='dummy/templateword3?id_lb=" . $row->id_lb . "' class ='btn btn-success btn-circle' title='Next'><i class='fas fa-check'></i></a>
                        <a class='btn btn-danger btn-circle' data-toggle='modal' data-target='#hapus' onClick=\"HapusData('" . $row->id_lb . "')\"><i class='fas fa-trash'></i></a>                                
                        </td>							
                    </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="bismillah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bismillah</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body after-add-more_cf2">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-usaha1" role="tab" aria-controls="pills-home" aria-selected="true">Usaha 1</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-usaha2" role="tab" aria-controls="pills-profile" aria-selected="false">Usaha 2</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-usaha3" role="tab" aria-controls="pills-contact" aria-selected="false">Usaha 3</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-gaji" role="tab" aria-controls="pills-contact" aria-selected="false">Pendapatan Lain / Gaji</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-lain" role="tab" aria-controls="pills-contact" aria-selected="false">Biaya Lain-Lain</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-angsuran" role="tab" aria-controls="pills-contact" aria-selected="false">Biaya Angsuran Hutang</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-usaha1" role="tabpanel" aria-labelledby="pills-home-tab">
                            <form action="<?= base_url('dummy/add2'); ?>" method="post">
                                <div class="row">
                                    <div class="col-md-1 mb-3">
                                        <label for="no" class="form-label">No</label>
                                        <input type="text" class="form-control" id="no1" name="no1" value="I" readonly>
                                        <input type="hidden" class="form-control" id="id_lb" name="id_lb" value="101">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="keterangan" class="form-label">Keterangan</label>
                                        <input type="text" class="form-control" id="keterangan1" name="keterangan1" value="USAHA 1" readonly>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="pemasukan" class="form-label">Pemasukan(Rp.)</label>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="pengeluaran" class="form-label">Pengeluaran(Rp.)</label>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="saldo" class="form-label">Jumlah(Rp.)</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1 mb-3">
                                        <input type="text" class="form-control" id="no2" name="no2">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <input type="text" class="form-control" id="keterangan2" name="keterangan2">
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <input type="number" class="form-control" id="pemasukan2" name="pemasukan2" onkeyup="sum();" value="0">
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <input type="number" class="form-control" id="pengeluaran2" name="pengeluaran2" onkeyup="sum2();" value="0">
                                        <input type="hidden" class="form-control" id="saldo2" name="saldo2">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1 mb-3">
                                        <input type="text" class="form-control" id="no3" name="no3">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <input type="text" class="form-control" id="keterangan3" name="keterangan3">
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <input type="number" class="form-control" id="pemasukan3" name="pemasukan3" onkeyup="sum();" value="0">
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <input type="number" class="form-control" id="pengeluaran3" name="pengeluaran3" onkeyup="sum2();" value="0">
                                        <input type="hidden" class="form-control" id="saldo3" name="saldo3">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1 mb-3">
                                        <input type="text" class="form-control" id="no4" name="no4">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <input type="text" class="form-control" id="keterangan4" name="keterangan4">
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <input type="number" class="form-control" id="pemasukan4" name="pemasukan4" onkeyup="sum();" value="0">
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <input type="number" class="form-control" id="pengeluaran4" name="pengeluaran4" onkeyup="sum2();" value="0">
                                        <input type="hidden" class="form-control" id="saldo4" name="saldo4">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1 mb-3">
                                        <input type="text" class="form-control" id="no5" name="no5">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <input type="text" class="form-control" id="keterangan5" name="keterangan5">
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <input type="number" class="form-control" id="pemasukan5" name="pemasukan5" onkeyup="sum();" value="0">
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <input type="number" class="form-control" id="pengeluaran5" name="pengeluaran5" onkeyup="sum2();" value="0">
                                        <input type="hidden" class="form-control" id="saldo5" name="saldo5">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1 mb-3">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <input type="text" class="form-control" id="keterangan6" name="keterangan6" value="SURPLUS USAHA 1" readonly>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <input type="number" class="form-control" id="pemasukan6" name="pemasukan6" onkeyup="total();" readonly>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <input type="number" class="form-control" id="pengeluaran6" name="pengeluaran6" onkeyup="total();" readonly>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <input type="number" class="form-control" id="saldo6" name="saldo6" onclick="total();">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="pills-usaha2" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <form action="<?= base_url('dummy/add2'); ?>" method="post">
                                <div class="row">
                                    <div class="col-md-1 mb-3">
                                        <label for="no" class="form-label">No</label>
                                        <input type="text" class="form-control" id="no1" name="no1" value="II" readonly>
                                        <input type="hidden" class="form-control" id="id_lb" name="id_lb" value="101">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="keterangan" class="form-label">Keterangan</label>
                                        <input type="text" class="form-control" id="keterangan1" name="keterangan1" value="USAHA 2" readonly>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="pemasukan" class="form-label">Pemasukan(Rp.)</label>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="pengeluaran" class="form-label">Pengeluaran(Rp.)</label>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="saldo" class="form-label">Jumlah(Rp.)</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1 mb-3">
                                        <input type="text" class="form-control" id="no2" name="no2">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <input type="text" class="form-control" id="keterangan2" name="keterangan2">
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <input type="number" class="form-control" id="pemasukan2" name="pemasukan2" onkeyup="sum();" value="0">
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <input type="number" class="form-control" id="pengeluaran2" name="pengeluaran2" onkeyup="sum2();" value="0">
                                        <input type="hidden" class="form-control" id="saldo2" name="saldo2">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1 mb-3">
                                        <input type="text" class="form-control" id="no3" name="no3">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <input type="text" class="form-control" id="keterangan3" name="keterangan3">
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <input type="number" class="form-control" id="pemasukan3" name="pemasukan3" onkeyup="sum();" value="0">
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <input type="number" class="form-control" id="pengeluaran3" name="pengeluaran3" onkeyup="sum2();" value="0">
                                        <input type="hidden" class="form-control" id="saldo3" name="saldo3">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1 mb-3">
                                        <input type="text" class="form-control" id="no4" name="no4">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <input type="text" class="form-control" id="keterangan4" name="keterangan4">
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <input type="number" class="form-control" id="pemasukan4" name="pemasukan4" onkeyup="sum();" value="0">
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <input type="number" class="form-control" id="pengeluaran4" name="pengeluaran4" onkeyup="sum2();" value="0">
                                        <input type="hidden" class="form-control" id="saldo4" name="saldo4">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1 mb-3">
                                        <input type="text" class="form-control" id="no5" name="no5">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <input type="text" class="form-control" id="keterangan5" name="keterangan5">
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <input type="number" class="form-control" id="pemasukan5" name="pemasukan5" onkeyup="sum();" value="0">
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <input type="number" class="form-control" id="pengeluaran5" name="pengeluaran5" onkeyup="sum2();" value="0">
                                        <input type="hidden" class="form-control" id="saldo5" name="saldo5">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1 mb-3">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <input type="text" class="form-control" id="keterangan6" name="keterangan6" value="SURPLUS USAHA 2" readonly>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <input type="number" class="form-control" id="pemasukan6" name="pemasukan6" onkeyup="total();" readonly>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <input type="number" class="form-control" id="pengeluaran6" name="pengeluaran6" onkeyup="total();" readonly>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <input type="number" class="form-control" id="saldo6" name="saldo6" onclick="total();">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="pills-usaha3" role="tabpanel" aria-labelledby="pills-contact-tab">
                            <form action="<?= base_url('dummy/add2'); ?>" method="post">
                                <div class="row">
                                    <div class="col-md-1 mb-3">
                                        <label for="no" class="form-label">No</label>
                                        <input type="text" class="form-control" id="no1" name="no1" value="III" readonly>
                                        <input type="hidden" class="form-control" id="id_lb" name="id_lb" value="101">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="keterangan" class="form-label">Keterangan</label>
                                        <input type="text" class="form-control" id="keterangan1" name="keterangan1" value="USAHA 3" readonly>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="pemasukan" class="form-label">Pemasukan(Rp.)</label>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="pengeluaran" class="form-label">Pengeluaran(Rp.)</label>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="saldo" class="form-label">Jumlah(Rp.)</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1 mb-3">
                                        <input type="text" class="form-control" id="no2" name="no2">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <input type="text" class="form-control" id="keterangan2" name="keterangan2">
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <input type="number" class="form-control" id="pemasukan2" name="pemasukan2" onkeyup="sum();" value="0">
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <input type="number" class="form-control" id="pengeluaran2" name="pengeluaran2" onkeyup="sum2();" value="0">
                                        <input type="hidden" class="form-control" id="saldo2" name="saldo2">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1 mb-3">
                                        <input type="text" class="form-control" id="no3" name="no3">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <input type="text" class="form-control" id="keterangan3" name="keterangan3">
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <input type="number" class="form-control" id="pemasukan3" name="pemasukan3" onkeyup="sum();" value="0">
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <input type="number" class="form-control" id="pengeluaran3" name="pengeluaran3" onkeyup="sum2();" value="0">
                                        <input type="hidden" class="form-control" id="saldo3" name="saldo3">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1 mb-3">
                                        <input type="text" class="form-control" id="no4" name="no4">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <input type="text" class="form-control" id="keterangan4" name="keterangan4">
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <input type="number" class="form-control" id="pemasukan4" name="pemasukan4" onkeyup="sum();" value="0">
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <input type="number" class="form-control" id="pengeluaran4" name="pengeluaran4" onkeyup="sum2();" value="0">
                                        <input type="hidden" class="form-control" id="saldo4" name="saldo4">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1 mb-3">
                                        <input type="text" class="form-control" id="no5" name="no5">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <input type="text" class="form-control" id="keterangan5" name="keterangan5">
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <input type="number" class="form-control" id="pemasukan5" name="pemasukan5" onkeyup="sum();" value="0">
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <input type="number" class="form-control" id="pengeluaran5" name="pengeluaran5" onkeyup="sum2();" value="0">
                                        <input type="hidden" class="form-control" id="saldo5" name="saldo5">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1 mb-3">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <input type="text" class="form-control" id="keterangan6" name="keterangan6" value="SURPLUS USAHA 2" readonly>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <input type="number" class="form-control" id="pemasukan6" name="pemasukan6" onkeyup="total();" readonly>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <input type="number" class="form-control" id="pengeluaran6" name="pengeluaran6" onkeyup="total();" readonly>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <input type="number" class="form-control" id="saldo6" name="saldo6" onclick="total();">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="pills-gaji" role="tabpanel" aria-labelledby="pills-contact-tab">
                            <form action="<?= base_url('dummy/add2'); ?>" method="post">
                                <div class="row">
                                    <div class="col-md-1 mb-3">
                                        <label for="no" class="form-label">No</label>
                                        <input type="text" class="form-control" id="no1" name="no1" value="IV" readonly>
                                        <input type="hidden" class="form-control" id="id_lb" name="id_lb" value="101">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="keterangan" class="form-label">Keterangan</label>
                                        <input type="text" class="form-control" id="keterangan1" name="keterangan1" value="PENDAPATAN LAIN / GAJI" readonly>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="pemasukan" class="form-label">Pemasukan(Rp.)</label>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="pengeluaran" class="form-label">Pengeluaran(Rp.)</label>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="saldo" class="form-label">Jumlah(Rp.)</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1 mb-3">
                                        <input type="text" class="form-control" id="no2" name="no2">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <input type="text" class="form-control" id="keterangan2" name="keterangan2">
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <input type="number" class="form-control" id="pemasukan2" name="pemasukan2" onkeyup="sum();" value="0">
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <input type="number" class="form-control" id="pengeluaran2" name="pengeluaran2" onkeyup="sum2();" value="0">
                                        <input type="hidden" class="form-control" id="saldo2" name="saldo2">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1 mb-3">
                                        <input type="text" class="form-control" id="no3" name="no3">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <input type="text" class="form-control" id="keterangan3" name="keterangan3">
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <input type="number" class="form-control" id="pemasukan3" name="pemasukan3" onkeyup="sum();" value="0">
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <input type="number" class="form-control" id="pengeluaran3" name="pengeluaran3" onkeyup="sum2();" value="0">
                                        <input type="hidden" class="form-control" id="saldo3" name="saldo3">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1 mb-3">
                                        <input type="text" class="form-control" id="no4" name="no4">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <input type="text" class="form-control" id="keterangan4" name="keterangan4">
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <input type="number" class="form-control" id="pemasukan4" name="pemasukan4" onkeyup="sum();" value="0">
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <input type="number" class="form-control" id="pengeluaran4" name="pengeluaran4" onkeyup="sum2();" value="0">
                                        <input type="hidden" class="form-control" id="saldo4" name="saldo4">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1 mb-3">
                                        <input type="text" class="form-control" id="no5" name="no5">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <input type="text" class="form-control" id="keterangan5" name="keterangan5">
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <input type="number" class="form-control" id="pemasukan5" name="pemasukan5" onkeyup="sum();" value="0">
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <input type="number" class="form-control" id="pengeluaran5" name="pengeluaran5" onkeyup="sum2();" value="0">
                                        <input type="hidden" class="form-control" id="saldo5" name="saldo5">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1 mb-3">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <input type="text" class="form-control" id="keterangan6" name="keterangan6" value="SURPLUS LAIN / GAJI" readonly>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <input type="number" class="form-control" id="pemasukan6" name="pemasukan6" onkeyup="total();" readonly>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <input type="number" class="form-control" id="pengeluaran6" name="pengeluaran6" onkeyup="total();" readonly>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <input type="number" class="form-control" id="saldo6" name="saldo6" onclick="total();">
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
        </div>
    </div>





    <script>
        function sum() {
            var kolom1 = document.getElementById('pemasukan2').value;
            var kolom2 = document.getElementById('pemasukan3').value;
            var kolom3 = document.getElementById('pemasukan4').value;
            var kolom4 = document.getElementById('pemasukan5').value;
            var result = parseInt(kolom1) + parseInt(kolom2) + parseInt(kolom3) + parseInt(kolom4);
            if (!isNaN(result)) {
                document.getElementById('pemasukan6').value = result;
            }
        }
    </script>

    <script>
        function sum2() {
            var kolom2 = document.getElementById('pengeluaran2').value;
            var kolom3 = document.getElementById('pengeluaran3').value;
            var kolom4 = document.getElementById('pengeluaran4').value;
            var kolom1 = document.getElementById('pengeluaran5').value;
            var result = parseInt(kolom1) + parseInt(kolom2) + parseInt(kolom3) + parseInt(kolom4);
            if (!isNaN(result)) {
                document.getElementById('pengeluaran6').value = result;
            }
        }
    </script>

    <script>
        function total() {
            var kolom1 = document.getElementById('pemasukan6').value;
            var kolom2 = document.getElementById('pengeluaran6').value;
            var result = parseInt(kolom1) - parseInt(kolom2);
            if (!isNaN(result)) {
                document.getElementById('saldo6').value = result;
            }
        }
    </script>

    <script src="<?php echo base_url(); ?>assets/ajax.js"></script>



</div>

</div>