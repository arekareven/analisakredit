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
                    <button type="button" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#capital">
                        <span class="icon text-white-50">
                            <i class="fas fa-arrow-down"></i>
                        </span>
                        <span class="text">Capital Sebelum</span>
                    </button>
                </td>
            </tr>
            <tr>
                <td>
                    <button type="button" class="btn btn-info btn-icon-split" data-toggle="modal" data-target="#test">
                        <span class="icon text-white-50">
                            <i class="fas fa-arrow-down"></i>
                        </span>
                        <span class="text">Cashflow Test</span>
                    </button>
                </td>
            </tr>
            <tr>
                <td>
                    <button type="button" class="btn btn-info btn-icon-split" data-toggle="modal" data-target="#cashflow1">
                        <span class="icon text-white-50">
                            <i class="fas fa-arrow-down"></i>
                        </span>
                        <span class="text">Cashflow Sebelum</span>
                    </button>
                </td>
            </tr>
            <tr>
                <td>
                    <button type="button" class="btn btn-info btn-icon-split" data-toggle="modal" data-target="#cashflow2">
                        <span class="icon text-white-50">
                            <i class="fas fa-arrow-down"></i>
                        </span>
                        <span class="text">Cashflow Sesudah</span>
                    </button>
                </td>
            </tr>
        </tbody>
    </table>


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
                                <input type="hidden" class="form-control" id="id_lb" name="id_lb" value="101">
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

    <div class="modal fade" id="test" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pendapatan</h5>
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
            <div class="col-md-8 mb-4">
                <label for="dari" class="form-label">Pendapatan dari</label>
                <select class="form-control" aria-label="Default select example" id="roda" name="roda[]">
                    <option value=""></option>
                    <option value="1">Pendapatan Usaha 1</option>
                    <option value="2">Pendapatan Usaha 2</option>
                    <option value="3">Pendapatan Usaha 3</option>
                    <option value="4">Pendapatan Lain / Gaji</option>
                </select>
            </div>
            <div class="col-md-8 mb-4">
                <label for="nopol" class="form-label">Untuk</label>
                <select class="form-control" aria-label="Default select example" id="roda" name="roda[]">
                    <option value=""></option>
                    <option value="1">Kas</option>
                    <option value="2">Tabungan</option>
                    <option value="3">Deposito</option>
                    <option value="4">Piutang</option>
                    <option value="5">Peralatan</option>
                    <option value="6">Persediaan Barang Usaha 1</option>
                    <option value="7">Persediaan Barang Usaha 2</option>
                    <option value="8">Persediaan Barang Usaha 3</option>
                    <option value="9">Sewa Dibayar Dimuka</option>
                    <option value="10">Lahan Garap</option>
                    <option value="11">Gedung / Ruko</option>
                    <option value="12">Kendaraan Operasional</option>
                    <option value="13">Lain - Lain</option>
                </select>
            </div>
            <div class="col-md-12 mb-4">
                <label for="keterangan" class="form-label">Keterangan</label>
                <input type="text" class="form-control" id="keterangan" name="keterangan[]">
            </div>
            <div class="col-md-8 mb-4">
                <label for="nama_stnk" class="form-label">Sebesar</label>
                <input type="number" class="form-control" id="nama_stnk" name="nama_stnk[]">
            </div>
            <div class="col-md-1 mb-4">
                <label for="sd5" class="form-label">Hapus</label>
                <button class="btn btn-danger remove2" type="button">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        </div>
    </div>

    <div class="modal fade" id="cashflow1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cashflow Sebelum</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('dummy/templateword'); ?>" method="post">
                    <div class="modal-body after-add-more_cf">
                        <div class="row">
                            <div class="col-md-1 mb-3">
                                <label for="sd5" class="form-label">Tambah</label>
                                <button class="btn btn-success add-more_cf" type="button">
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

    <div class="copy_cf invisible">
        <div class="modal-body">
            <div class="row">
                <div class="col-md-1 mb-3">
                    <label for="no" class="form-label">No</label>
                    <input type="text" class="form-control" id="no" name="no[]" value="I">
                    <input type="hidden" class="form-control" id="id_lb" name="id_lb[]" value="101">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <input type="text" class="form-control" id="keterangan" name="keterangan[]" value="USAHA 1">
                </div>
                <div class="col-md-2 mb-3">
                    <label for="pemasukan" class="form-label">Pemasukan(Rp.)</label>
                    <input type="hidden" class="form-control" id="pemasukan" name="pemasukan[]" value="0">
                </div>
                <div class="col-md-2 mb-3">
                    <label for="pengeluaran" class="form-label">Pengeluaran(Rp.)</label>
                    <input type="hidden" class="form-control" id="pengeluaran" name="pengeluaran[]" value="0">
                </div>
                <div class="col-md-2 mb-3">
                    <label for="saldo" class="form-label">Saldo(Rp.)</label>
                    <input type="hidden" class="form-control" id="saldo" name="saldo[]">
                </div>
            </div>
            <div class="row">
                <div class="col-md-1 mb-3">
                    <input type="text" class="form-control" id="no" name="no[]">
                    <input type="hidden" class="form-control" id="id_lb" name="id_lb[]" value="101">
                </div>
                <div class="col-md-4 mb-3">
                    <input type="text" class="form-control" id="keterangan" name="keterangan[]">
                </div>
                <div class="col-md-2 mb-3">
                    <input type="number" class="form-control" id="pemasukan" name="pemasukan[]" onkeyup="sum();">
                </div>
                <div class="col-md-2 mb-3">
                    <input type="number" class="form-control" id="pengeluaran" name="pengeluaran[]" onkeyup="sum2();">
                    <input type="hidden" class="form-control" id="saldo" name="saldo[]">
                </div>
            </div>
            <div class="row">
                <div class="col-md-1 mb-3">
                    <input type="text" class="form-control" id="no" name="no[]">
                    <input type="hidden" class="form-control" id="id_lb" name="id_lb[]" value="101">
                </div>
                <div class="col-md-4 mb-3">
                    <input type="text" class="form-control" id="keterangan" name="keterangan[]">
                </div>
                <div class="col-md-2 mb-3">
                    <input type="number" class="form-control" id="pemasukan" name="pemasukan[]" onkeyup="sum();">
                </div>
                <div class="col-md-2 mb-3">
                    <input type="number" class="form-control" id="pengeluaran" name="pengeluaran[]" onkeyup="sum2();">
                    <input type="hidden" class="form-control" id="saldo" name="saldo[]">
                </div>
            </div>
            <div class="row">
                <div class="col-md-1 mb-3">
                    <input type="text" class="form-control" id="no" name="no[]">
                    <input type="hidden" class="form-control" id="id_lb" name="id_lb[]" value="101">
                </div>
                <div class="col-md-4 mb-3">
                    <input type="text" class="form-control" id="keterangan" name="keterangan[]">
                </div>
                <div class="col-md-2 mb-3">
                    <input type="number" class="form-control" id="pemasukan" name="pemasukan[]" onkeyup="sum();">
                </div>
                <div class="col-md-2 mb-3">
                    <input type="number" class="form-control" id="pengeluaran" name="pengeluaran[]" onkeyup="sum2();">
                    <input type="hidden" class="form-control" id="saldo" name="saldo[]">
                </div>
            </div>
            <div class="row">
                <div class="col-md-1 mb-3">
                    <input type="text" class="form-control" id="no" name="no[]">
                    <input type="hidden" class="form-control" id="id_lb" name="id_lb[]" value="101">
                </div>
                <div class="col-md-4 mb-3">
                    <input type="text" class="form-control" id="keterangan" name="keterangan[]">
                </div>
                <div class="col-md-2 mb-3">
                    <input type="number" class="form-control" id="pemasukan" name="pemasukan[]" onkeyup="sum();">
                </div>
                <div class="col-md-2 mb-3">
                    <input type="number" class="form-control" id="pengeluaran" name="pengeluaran[]" onkeyup="sum2();">
                    <input type="hidden" class="form-control" id="saldo" name="saldo[]">
                </div>
            </div>
            <div class="row">
                <div class="col-md-1 mb-3">
                    <input type="text" class="form-control" id="no" name="no[]">
                    <input type="hidden" class="form-control" id="id_lb" name="id_lb[]" value="101">
                </div>
                <div class="col-md-4 mb-3">
                    <input type="text" class="form-control" id="keterangan" name="keterangan[]" value="SURPLUS USAHA 1">
                </div>
                <div class="col-md-2 mb-3">
                    <input type="number" class="form-control" id="pemasukan" name="pemasukan[]" onkeyup="total();">
                </div>
                <div class="col-md-2 mb-3">
                    <input type="number" class="form-control" id="pengeluaran" name="pengeluaran[]" onkeyup="total();">
                </div>
                <div class="col-md-2 mb-3">
                    <input type="number" class="form-control" id="saldo" name="saldo[]" onclick="total();">
                </div>
                <div class="col-md-1 mb-3">
                    <button class="btn btn-danger remove_cf" type="button">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

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
                <div class="col-md-1">
                    <label for="no" class="form-label">No</label>
                    <input type="text" class="form-control" id="no" name="no[]">
                    <input type="hidden" class="form-control" id="id_lb" name="id_lb[]" value="101">
                </div>
                <div class="col-md-4">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <input type="text" class="form-control" id="keterangan" name="keterangan[]">
                </div>
                <div class="col-md-2">
                    <label for="pemasukan" class="form-label">Pemasukan(Rp.)</label>
                    <input type="text" class="form-control" id="pemasukan" name="pemasukan[]">
                </div>
                <div class="col-md-2">
                    <label for="pengeluaran" class="form-label">Pengeluaran(Rp.)</label>
                    <input type="text" class="form-control" id="pengeluaran" name="pengeluaran[]">
                </div>
                <div class="col-md-2">
                    <label for="saldo" class="form-label">Saldo(Rp.)</label>
                    <input type="text" class="form-control" id="saldo" name="saldo[]">
                </div>
                <div class="col-md-1">
                    <label for="sd5" class="form-label">Hapus</label>
                    <button class="btn btn-danger remove_cf2" type="button">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>


    <script>
        function sum() {
            var kolom1 = document.getElementById('pemasukan').value;
            var kolom2 = document.getElementById('pemasukan2').value;
            var kolom3 = document.getElementById('pemasukan3').value;
            var kolom4 = document.getElementById('pemasukan4').value;
            var result = parseInt(kolom1) + parseInt(kolom2) + parseInt(kolom3) + parseInt(kolom4);
            if (!isNaN(result)) {
                document.getElementById('pemasukan5').value = result;
            }
        }
    </script>

    <script>
        function sum2() {
            var kolom1 = document.getElementById('pengeluaran').value;
            var kolom2 = document.getElementById('pengeluaran2').value;
            var kolom3 = document.getElementById('pengeluaran3').value;
            var kolom4 = document.getElementById('pengeluaran4').value;
            var result = parseInt(kolom1) + parseInt(kolom2) + parseInt(kolom3) + parseInt(kolom4);
            if (!isNaN(result)) {
                document.getElementById('pengeluaran5').value = result;
            }
        }
    </script>

    <script>
        function total() {
            var kolom1 = document.getElementById('pemasukan5').value;
            var kolom2 = document.getElementById('pengeluaran5').value;
            var result = parseInt(kolom1) + parseInt(kolom2);
            if (!isNaN(result)) {
                document.getElementById('saldo5').value = result;
            }
        }
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

    <script src="<?php echo base_url(); ?>assets/ajax.js"></script>


    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#lb">
        Add
    </button>

    <hr>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($query->result() as $row) {
                            echo "<tr>
                        <td>" . $row->keterangan . "</td>
                        <td>" . 'Rp. ' . number_format($row->pemasukan) . "</td>                      
                        <td>
                        <a href='dummy/templateword2?saldo=" . $row->saldo . "' class ='btn btn-success btn-circle' title='Next'><i class='fas fa-check'></i></a>
                        <a class='btn btn-danger btn-circle' data-toggle='modal' data-target='#hapus' onClick=\"HapusData('" . $row->id_cf . "')\"><i class='fas fa-trash'></i></a>                                
                        </td>							
                    </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="lb" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Latar Belakang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?php echo base_url('dummy/add'); ?>">
                    <div class="modal-body">
                        <div class="col-md-8 mb-4">
                            <label for="dari" class="form-label">Pendapatan dari</label>
                            <input type="hidden" class="form-control" id="id_cf" name="id_cf">
                            <select class="form-control" aria-label="Default select example" id="dari" name="dari">
                                <option value=""></option>
                                <option value="1">Pendapatan Usaha 1</option>
                                <option value="2">Pendapatan Usaha 2</option>
                                <option value="3">Pendapatan Usaha 3</option>
                                <option value="4">Pendapatan Lain / Gaji</option>
                            </select>
                        </div>
                        <div class="col-md-8 mb-4">
                            <label for="untuk" class="form-label">Untuk akun</label>
                            <select class="form-control" aria-label="Default select example" id="untuk" name="untuk">
                                <option value=""></option>
                                <option value="1">Kas</option>
                                <option value="2">Tabungan</option>
                                <option value="3">Deposito</option>
                                <option value="4">Piutang</option>
                                <option value="5">Peralatan</option>
                                <option value="6">Persediaan Barang Usaha 1</option>
                                <option value="7">Persediaan Barang Usaha 2</option>
                                <option value="8">Persediaan Barang Usaha 3</option>
                                <option value="9">Sewa Dibayar Dimuka</option>
                                <option value="10">Lahan Garap</option>
                                <option value="11">Gedung / Ruko</option>
                                <option value="12">Kendaraan Operasional</option>
                                <option value="13">Lain - Lain</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan">
                        </div>
                        <div class="col-md-8 mb-4">
                            <label for="pemasukan" class="form-label">Sebesar</label>
                            <input type="number" class="form-control" id="pemasukan" name="pemasukan">
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
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function EditData(id_lb, cif_bank, tgl_analisa, tgl_permohonan) {
            document.getElementById('id_lb').value = id_lb;
            document.getElementById('cif_bank').value = cif_bank;
            document.getElementById('tgl_analisa').value = tgl_analisa;
            document.getElementById('tgl_permohonan').value = tgl_permohonan;
        }

        function HapusData(idt) {
            document.getElementById('idt2').value = idt;
        }
    </script>

</div>

</div>