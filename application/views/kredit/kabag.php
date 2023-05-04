<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading 
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>-->

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
                            <th scope="col">Status</th>
                            <th scope="col">Zoom</th>
                            <th scope="col">Buat Zoom</th>
                        </tr>
                    </thead>
                    <tbody id="show_data">
                        <?php
                        foreach ($query->result() as $row) {//ambil data dari DB pengajuan 
                        if (!isset($row->waktu_zoom)){
                            $waktuZoom = 'Belum Ada';
                        }else{
                            $waktuZoom = date('d-m-Y H:i',strtotime($row->waktu_zoom));
                        }
                        
                        echo 
                        "<tr>
                            <td>" . $row->nama_ao . "</td>
                            <td>
                                <a href='pdf_all?id_lb=".$row->id_lb."' target='_blank'>" . $row->name_debitur . "</a>
                            </td>         
                            <td>
                                <a href='pdf_scoring?id_lb=".$row->id_lb."' target='_blank'>" . $row->status . "</a>
                            </td>              
                            <td>
                                <a href='".$row->link_zoom."' target='_blank'>".$waktuZoom."</a>
                            </td>           
                            <td>
                                <a href='#' class='btn btn-primary btn-circle' data-toggle='modal' data-target='#zoomModal' title='Zoom Meeting' onClick=\"AddDataZoom('" . $row->id_pengajuan . "','" . $row->id_lb . "')\"><i class='fas fa-video'></i></a>
                            </td>                           					
                        </tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    
    <!-- Modal zoom-->
    <div class="modal fade" id="zoomModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Zoom</h5>
                    <button id="close_pengajuan" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="zoom">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="waktu" class="col-sm-2 col-form-label">Waktu</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="id_pengajuan" name="id_pengajuan">
                                <input type="text" class="form-control" id="id_lb" name="id_lb">
                                <input type="datetime-local" class="form-control" id="waktu" name="waktu"></input>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btn_zoom" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        
        $(document).ready(function() {

			//simpan zoom
            $('#btn_zoom').on('click', function() {
                var condition = $('#zoom').serialize();
                $.ajax({
                        url: "<?php echo base_url(); ?>kabag/zoom_meeting",
                        type: "POST",
                        data: condition,
                        dataType: "JSON",
                        success: function(data) {
                            console.log(data)
                        }
                    }),
				    document.getElementById("zoom").reset();    
                    $('#zoomModal').modal('hide');
                    window.location.reload();
                    
            })

        });

        function AddDataZoom(id_pengajuan,id_lb) {
            document.getElementById('id_pengajuan').value = id_pengajuan;
            document.getElementById('id_lb').value = id_lb;
        }

    </script>
    

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
