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
                            <th scope="col">Analis</th>
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
                        <td>" . $row->nama . "</td>
                        <td>" . $row->file . "</td>                     
                        <td>" . $row->catatan . "</td>                     
                        <td><a $x>$row->status</a>
                        </td>     
                        <td>  
                            <h5>     
                            <a href='#' class ='btn btn-warning btn-circle' data-toggle='modal' data-target='#edit' title='Edit' onClick=\"EditData('" . $row->id_analisis . "','" . $row->nama . "','" . $row->file . "')\"><i class='fas fa-edit'></i></a>        
                            <a class ='btn btn-danger btn-circle' data-toggle='modal' data-target='#hapus' title='Hapus' onClick=\"HapusData('" . $row->id_analisis . "')\"><i class='fas fa-trash'></i></a>
                            <a href='analisis/lakukan_download?file=" . $row->file . "' class ='btn btn-success btn-circle' title='Download'><i class='fas fa-download'></i></a>
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

    <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Input Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('analisis/edit'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="col-md-4 mb-4">
                            <label for="id_analisis" class="form-label">ID</label>
                            <input type="text" class="form-control" id="id_analisis" name="id_analisis" readonly>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="nama" class="form-label">Analis</label>
                            <select class="custom-select" id="nama" name="nama" onchange="autofill()">
                                <option value="">-- Pilih analis --</option>
                                <?php
                                foreach ($analis->result() as $row) {
                                    echo "<option name='nama' value='$row->nama'>$row->nama</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-8 mb-4">
                            <label for="file" class="form-label">File</label>
                            <input type="file" class="form-control" id="file" name="file">
                            <input type="hidden" class="form-control" id="filelama" name="filelama">
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
                <form action="<?php echo base_url() . 'analisis/hapus'; ?>" method="post" class="form-horizontal" role="form">
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
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <script type="text/javascript">
        function EditData(id_analisis, nama, file) {
            document.getElementById('id_analisis').value = id_analisis;
            document.getElementById('nama').value = nama;
            document.getElementById('filelama').value = file;
        }

        function HapusData(idt) {
            document.getElementById('idt2').value = idt;
        }
    </script>

    <script>
        function autofill() {
            var nama = document.getElementById('nama').value;
            $.ajax({
                url: "<?php echo base_url(); ?>analisis/cari_analis",
                data: '&nama=' + nama,
                success: function(data) {
                    var hasil = JSON.parse(data);

                    $.each(hasil, function(key, val) {

                        document.getElementById('nama').value = val.nama;

                    });
                }
            });

        }
    </script>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->