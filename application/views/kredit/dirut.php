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
                            <th scope="col">Resume</th>
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
									<a href='pdf_scoring?id_lb=".$row->id_lb."' class='badge badge-".$badge." target='_blank'>" . $row->status . "</a>
								</td>              
								<td>
									<a href='".$linkZoom."' target='_blank'>".$waktuZoom."</a>
								</td>           
								<td>
									<a href='#' class='btn btn-primary btn-circle' data-toggle='modal' data-target='#zoomModal' title='Zoom Meeting' onClick=\"AddDataZoom('" . $row->id_pengajuan . "','" . $row->id_lb . "')\"><i class='fas fa-video'></i></a>
									</td>                           					
									</tr>";
								}
								?>
								<!-- <a href='javascript:;' class='btn btn-info btn-circle item_resume' title='Resume' data='" . $row->id_pengajuan . "'><i class='fas fa-paperclip'></i></a> -->
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
                    <h5>Komite</h5>
                    <button id="close_pengajuan" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="zoom">
                    <div class="modal-body">
						<div class="col-md-8 mb-3">
							<p>Pilih jenis komite</p>
							<div id="group">
							</div>
							<p id="output"></p>
						</div>
						<script>
							const sizes = ['zoom', 'offline'];

							// generate the radio groups        
							const group = document.querySelector("#group");
							group.innerHTML = sizes.map((size) => `<div>
									<input type="radio" name="size" value="${size}" id="${size}">
									<label for="${size}">${size}</label>
								</div>`).join(' ');
							
							// add an event listener for the change event
							const radioButtons = document.querySelectorAll('input[name="size"]');
							for(const radioButton of radioButtons){
								radioButton.addEventListener('change', showSelected);
							}        
							
							function showSelected(e) {
								console.log(e);
								if (this.value == 'zoom') {
									document.querySelector('#output').innerHTML = `<input type="hidden" class="form-control" id="jenis" name="jenis" value="1">`;
								} else{
									document.querySelector('#output').innerHTML = `<input type="hidden" class="form-control" id="jenis" name="jenis" value="0">`;
								}
							}
						</script>
                        <div class="form-group row">
                            <label for="waktu" class="col-sm-2 col-form-label">Waktu</label>
                            <div class="col-sm-10">
                                <input type="hidden" class="form-control" id="id_pengajuan" name="id_pengajuan">
                                <input type="hidden" class="form-control" id="id_lb" name="id_lb">
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
		
    <!-- Modal resume-->
    <div class="modal fade" id="resume" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Resume</h5>
                    <button id="close_pengajuan" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('dirut/update_resume'); ?>" method="post" id="form_resume">
                    <div class="modal-body">                       
                        <input type="hidden" class="form-control" id="id_resume" name="id_resume">
                        <input type="hidden" class="form-control" id="id_pengajuan" name="id_pengajuan">
						<div class="form-group">
							<label for="analis">Analis</label>
							<textarea readonly class="form-control" id="analis" name="analis" rows="3"></textarea>
						</div>
						<div class="form-group">
							<label for="kabag">Kepala Bagian Kredit</label>
							<textarea readonly class="form-control" id="kabag" name="kabag" rows="3"></textarea>
						</div>
						<div class="form-group">
							<label for="kacab">Kepala Cabang</label>
							<textarea readonly class="form-control" id="kacab" name="kacab" rows="3"></textarea>
						</div>
						<div class="form-group">
							<label for="dirut">Direktur Utama</label>
							<textarea class="form-control" id="dirut" name="dirut" rows="3"></textarea>
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

	<!-- js zoom -->
    <script type="text/javascript">
        
        $(document).ready(function() {

			//simpan zoom
            $('#btn_zoom').on('click', function() {
                var condition = $('#zoom').serialize();
                $.ajax({
                        url: "<?php echo base_url(); ?>dirut/zoom_meeting",
                        type: "POST",
                        data: condition,
                        dataType: "JSON",
                        success: function(data) {
                            console.log(data)
                        }
                    }),
				    document.getElementById("zoom").reset();    
                    // $('#zoomModal').modal('hide');
                    // window.location.reload();
                    
            })

        });

        function AddDataZoom(id_pengajuan,id_lb) {
            document.getElementById('id_pengajuan').value = id_pengajuan;
            document.getElementById('id_lb').value = id_lb;
        }

    </script>
		
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
					url: "<?php echo base_url('dirut/get_resume') ?>",
					dataType: "JSON",
					data: {
						id: id
					},
					success: function(data) {
						$.each(data, function(id_resume ,id_pengajuan,anali, kabag, kacab, dirut) {
							$('#resume').modal('show');
							$('[name="id_resume"]').val(data.id_resume);
							$('[name="id_pengajuan"]').val(data.id_pengajuan);
							$('[name="analis"]').val(data.analis);
							$('[name="kabag"]').val(data.kabag);
							$('[name="kacab"]').val(data.kacab);
							$('[name="dirut"]').val(data.dirut);
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
