<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#character">
        Add
    </button>

    <hr>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Info Pribadi</th>
                <th scope="col">Info Perilaku</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($query->result() as $row) {
                echo "<tr>
                        <td>" . $row->id_char . "</td>
                        <td>" . $row->info_pribadi . "</td>                     
                        <td>" . $row->info_perilaku . "</td>                     
                        <td><a href='templateword?id_char=".$row->id_char."' class ='btn btn-success' title='Next'>Next</a>
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


</div>
<!-- /.container-fluid -->

<!-- End of Main Content -->