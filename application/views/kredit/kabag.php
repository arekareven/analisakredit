<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading 
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
-->

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Pengajuan Analisa</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Nama AO</th>
                            <th scope="col">Nama Debitur</th>
                            <th scope="col">Plafond</th>
                            <th scope="col">Status</th>
                            <th scope="col">Catatan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($query->result() as $row) {//ambil data dari DB latar_belakang, file 

                            echo "<tr>
                        <td>" . $row->nama_ao . "</td>   
                        <td>" . $row->nama_debitur . "</td>                     
                        <td>" .number_format($row->plafond) . "</td>             
                        <td>".$row->status."</td>                     
                        <td>".$row->catatan."</td>                     
                        <td><h5>
                            <a href='#' class='btn btn-warning btn-circle' data-toggle='modal' data-target='#edit' onClick=\"EditData('" . $row->id_pengajuan . "','" . $row->status . "','" . $row->catatan . "')\"><i class='fas fa-edit'></i></a>
                            <a href='pdf_all?id_lb=".$row->id_lb."' target='_blank' class='btn btn-success btn-circle' title='Lihat'><i class='fas fa-eye'></i></a>
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
                    <h5 class="modal-title" id="exampleModalLabel">Review</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('kabag/update_pengajuan'); ?>" method="post">
                    <div class="modal-body">
                        <input type="hidden" class="form-control" id="id_pengajuan" name="id_pengajuan">
                        <div class="col-md-5 mb-4">
                            <label for="status" class="form-label">Status</label>
                            <select class="custom-select" id="status" name="status">
                                <option>ACC</option>
                                <option>Ditolak</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="catatan" class="form-label">Catatan</label>
                            <textarea class="form-control" id="catatan" name="catatan"></textarea>
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
        function EditData(id_pengajuan, status, catatan) {
            document.getElementById('id_pengajuan').value = id_pengajuan;
            document.getElementById('status').value = status;
            document.getElementById('catatan').value = catatan;
        }
    </script>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->