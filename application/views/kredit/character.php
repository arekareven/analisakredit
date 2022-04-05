<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#character">
        Add
    </button>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#rw">
        Riwayat
    </button>

    <hr>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Info Pribadi</th>
                <th scope="col">Info Perilaku</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($query->result() as $row) {
                echo "<tr>
                        <td>" . $row->info_pribadi . "</td>                     
                        <td>" . $row->info_perilaku . "</td>                     
                        <td><a href='templateword?id_char=".$row->id_char."' class ='btn btn-success' title='Next'>Next</a>
                        </td>							
                    </tr>";
            }
            ?>
        </tbody>
    </table>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Plafond</th>
                <th scope="col">Status</th>
                <th scope="col">Sejarah</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($query2->result() as $row) {
                echo "<tr>
                        <td>" . 'Rp. ' . number_format($row->plafond) . "</td>
                        <td>" . $row->status . "</td>                        
                        <td>" . $row->sejarah . "</td>                        
                        <td>
                        <a href='templateword?id_lb=" . $row->id_lb . "' class ='btn btn-success' title='Next'>Next</a>                            
                        </td>							
                    </tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Modal character -->
    <div class="modal fade" id="character" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('character/add'); ?>" method="post">
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
                        <div class="col-md-12 mb-2">
                            <h4>Informasi Karakter</h4>
                            <hr>
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
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="rw" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Input Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('kredit/add_rw'); ?>" method="post">
                    <div class="modal-body after-add-more">
                        <div class="row">
                            <div class="col-md-2 mb-3">
                                <label for="plafond" class="form-label">Plafond (Rp.)</label>
                                <input type="text" class="form-control" id="plafond" name="plafond[]">
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-control" aria-label="Default select example" id="status" name="status[]">
                                    <option value=""></option>
                                    <option value="Lunas">Lunas</option>
                                    <option value="Belum Lunas">Belum Lunas</option>
                                </select>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="saldo" class="form-label">Saldo (Rp.)</label>
                                <input type="text" class="form-control" id="saldo" name="saldo[]">
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="sejarah" class="form-label">Sejarah</label>
                                <select class="form-control" aria-label="Default select example" id="sejarah" name="sejarah[]">
                                    <option value=""></option>
                                    <option value="Baik">Baik</option>
                                    <option value="Tidak Baik">Tidak Baik</option>
                                </select>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="data" class="form-label">Data</label>
                                <select class="form-control" aria-label="Default select example" id="data" name="data[]">
                                    <option value=""></option>
                                    <option value="Terlampir">Terlampir</option>
                                    <option value="Tidak Terlampir">Tidak Terlampir</option>
                                </select>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="sd5" class="form-label">Tambah data</label>
                                <button class="btn btn-success add-more" type="button">
                                    <i class="glyphicon glyphicon-plus"></i> Add
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

    <div class="copy invisible">
        <div class="modal-body">
            <div class="row">
                <div class="col-md-2 mb-3">
                    <label for="plafond" class="form-label">Plafond (Rp.)</label>
                    <input type="text" class="form-control" id="plafond" name="plafond[]">
                </div>
                <div class="col-md-2 mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-control" aria-label="Default select example" id="status" name="status[]">
                        <option value=""></option>
                        <option value="Lunas">Lunas</option>
                        <option value="Belum Lunas">Belum Lunas</option>
                    </select>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="saldo" class="form-label">Saldo (Rp.)</label>
                    <input type="text" class="form-control" id="saldo" name="saldo[]">
                </div>
                <div class="col-md-2 mb-3">
                    <label for="sejarah" class="form-label">Sejarah</label>
                    <select class="form-control" aria-label="Default select example" id="sejarah" name="sejarah[]">
                        <option value=""></option>
                        <option value="Baik">Baik</option>
                        <option value="Tidak Baik">Tidak Baik</option>
                    </select>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="data" class="form-label">Data</label>
                    <select class="form-control" aria-label="Default select example" id="data" name="data[]">
                        <option value=""></option>
                        <option value="Terlampir">Terlampir</option>
                        <option value="Tidak Terlampir">Tidak Terlampir</option>
                    </select>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="sd5" class="form-label">Tambah data</label>
                    <button class="btn btn-danger remove" type="button">
                        <i class="glyphicon glyphicon-plus"></i> Remove
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $(".add-more").click(function() {
                var html = $(".copy").html();
                $(".after-add-more").after(html);
            });

            // saat tombol remove dklik control group akan dihapus 
            $("body").on("click", ".remove", function() {
                $(this).parents(".modal-body").remove();
            });
        });
    </script>


</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->