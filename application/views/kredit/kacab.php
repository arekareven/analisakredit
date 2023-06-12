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
                            <th scope="col">Komite</th>
                            <th scope="col">ACC</th>
                        </tr>
                    </thead>
                    <tbody id="show_data">
                        <?php
                        foreach ($query->result() as $row) {//ambil data dari DB pengajuan 
							if (!isset($row->waktu_zoom)){
								$waktuZoom = 'Belum Ada';
								$linkZoom = '#';
							}else{
								if($row->link_zoom == 'Offline'){
									$linkZoom = '#';
								}else{
									$linkZoom = $row->link_zoom;
								}
								$waktuZoom = date('d-m-Y H:i',strtotime($row->waktu_zoom));
							}
														
							switch ($row->status) {
								case "Diajukan":
									$badge = "info";
									break;
								case "Tidak layak":
									$badge = "danger";
									break;
								case "Layak dgn catatan":
									$badge = "warning";
									break;
								case "Ditolak":
									$badge = "danger";
									break;
								case "Diteruskan ke Analis":
									$badge = "success";
									break;
								default:
									$badge = "success";
									break;
							}
							
							echo 
							"<tr>
								<td>" . $row->nama_ao . "</td>
								<td>
									<a href='pdf_all?id_lb=".$row->id_lb."' target='_blank'>" . $row->name_debitur . "</a>
								</td>         
								<td>
									<a href='pdf_scoring?id_lb=".$row->id_lb."' class='badge badge-".$badge."' target='_blank'>" . $row->status . "</a>
								</td>              
								<td>
									<a href='".$linkZoom."' target='_blank'>".$waktuZoom."</a>
								</td>           
								<td>
									<a href='javascript:;' class='btn btn-success btn-sm item_resume' title='Resume' data='" . $row->id_lb . "'><i class='fas fa-user-check'></i></a>
								</td>                           					
								</tr>";
							}
							?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
	
    <!-- Modal resume-->
    <div class="modal fade" id="resume" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Resume</h5>
                    <button id="close_pengajuan" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('kacab/update_resume'); ?>" method="post" id="form_resume">
                    <div class="modal-body">                       
                        <input type="hidden" class="form-control" id="id_lb" name="id_lb">
						<div class="col-md-5 mb-3">
						<select class="form-control" aria-label="Default select example" id="kacab" name="kacab">
							<option value="Diteruskan ke Analis">Lanjut Survey</option>
							<option value="Ditolak">Tolak</option>
						</select>
						</div>
						<div class="col-md-12 mb-3">
							<label for="uraian_kacab">Uraian</label>
							<textarea readonly class="form-control" id="uraian_kacab" name="uraian_kacab" rows="3"></textarea>
						</div>
                    </div>
                    <div class="modal-footer">
                        <button id="close_pengajuan" type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
	
	<!-- js resume -->
	<script type="text/javascript">
		        
        //resume
        $(document).ready(function() {
                                                           
            $('#close_resume').on('click', function() {
                document.getElementById("resume").reset();
            })
       
			//GET UPDATE resume
			$('#show_data').on('click', '.item_resume', function() {
				var id = $(this).attr('data');
				$.ajax({
					type: "GET",
					url: "<?php echo base_url('kacab/get_resume') ?>",
					dataType: "JSON",
					data: {
						id: id
					},
					success: function(data) {
						$.each(data, function(id_resume ,id_lb, kacab) {
							$('#resume').modal('show');
							$('[name="id_resume"]').val(data.id_resume);
							$('[name="id_lb"]').val(data.id_lb);
							$('[name="kacab"]').val(data.kacab);
						});
					}
				});
				return false;
			});

        });
	</script>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
