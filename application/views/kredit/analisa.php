<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Nama AO</th>
                            <th scope="col">Nama File</th>
                            <th scope="col">Catatan</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($query->result() as $row) {
                            if ($row->status == "Diserahkan") {
                                $x = "class='badge badge-pill badge-info'";
                            } elseif ($row->status == "Ditinjau") {
                                $x = "class='badge badge-pill badge-warning'";
                            } elseif ($row->status == "Proses") {
                                $x = "class='badge badge-pill badge-primary'";
                            } elseif ($row->status == "Diterima") {
                                $x = "class='badge badge-pill badge-success'";
                            } elseif ($row->status == "Ditolak") {
                                $x = "class='badge badge-pill badge-danger'";
                            }
                            echo "<tr>
                        <td>" . $row->nama_ao . "</td>
                        <td>" . $row->file . "</td>                     
                        <td>" . $row->catatan . "</td>                     
                        <td><a $x>$row->status</a>
                        </td>                     
                        <td><h5>
                            <a href='#' class='btn btn-warning btn-circle' data-toggle='modal' data-target='#edit' onClick=\"EditData('" . $row->id_analisis . "','" . $row->catatan . "','" . $row->status . "')\"><i class='fas fa-edit'></i></a>
                            <a href='analisis/lakukan_download?file=" . $row->file . "' class='btn btn-success btn-circle' title='Download'><i class='fas fa-download'></i></a>
                            </h5>
                        </td>						
                    </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Input Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('analisa/edit'); ?>" method="post">
                    <div class="modal-body">
                        <div class="col-md-4 mb-4">
                            <label for="id_analisis" class="form-label">ID</label>
                            <input type="text" class="form-control" id="id_analisis" name="id_analisis" readonly>
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="catatan" class="form-label">Catatan</label>
                            <textarea class="form-control" id="catatan" name="catatan"></textarea>
                        </div>
                        <div class="col-md-5 mb-4">
                            <label for="status" class="form-label">Status</label>
                            <select class="custom-select" id="status" name="status">
                                <option>Diserahkan</option>
                                <option>Ditinjau</option>
                                <option>Proses</option>
                                <option>Diterima</option>
                                <option>Ditolak</option>
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


    <script type="text/javascript">
        function EditData(id_analisis, catatan, status) {
            document.getElementById('id_analisis').value = id_analisis;
            document.getElementById('catatan').value = catatan;
            document.getElementById('status').value = status;
        }
    </script>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->