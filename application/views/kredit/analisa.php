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
                <table class="table table-sm" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Nama AO</th>
                            <th scope="col">Nama Debitur</th>
                            <th scope="col">Status</th>
                            <th scope="col">Komite</th>
                            <th scope="col">Scoring & Resume</th>
                        </tr>
                    </thead>
                    <tbody id="show_data">
                        <?php
                        foreach ($query->result() as $row) {//ambil data dari DB latar_belakang, file 
							if (!isset($row->waktu_zoom)){
								$waktuZoom = 'Belum Ada';
								$linkZoom = '#';
							}else{
								$waktuZoom = date('d-m-Y H:i',strtotime($row->waktu_zoom));
								if($row->link_zoom == 'Offline'){
									$linkZoom = '#';
								}else{
									$linkZoom = $row->link_zoom;
								}
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
								default:
									$badge = "success";
									break;
							}
		
							echo 
							"<tr>
								<td>" . $row->nama_ao . "</td>
								<td>
									<a href='pdf_all?id_lb=".$row->id_lb."' target='_blank'>". $row->name_debitur ."</a>
								</td>                     
								<td>
									<a href='pdf_scoring?id_lb=".$row->id_lb."' target='_blank' class='badge badge-".$badge."'>".$row->status."</a>
								</td>               
								<td>
									<a href='".$linkZoom."' target='_blank'>".$waktuZoom."</a>
								</td>	 
								<td>
									<a href='javascript:;' class='btn btn-warning btn-circle item_edit' title='Edit Scoring' data='" . $row->id_pengajuan . "'><i class='fas fa-percent'></i></a>
									<a href='javascript:;' class='btn btn-info btn-circle item_resume' title='Resume' data='" . $row->id_lb . "'><i class='far fa-file'></i></a>
									</td>                        					
									</tr>";
								}
								?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal skoring-->
    <div class="modal fade" id="scoring" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>SKORING</h5>
                    <button id="close_pengajuan" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('analisa/add_scoring'); ?>" method="post" id="form_pengajuan">
                    <div class="modal-body">                       
                        <input type="hidden" class="form-control" id="id_pengajuan" name="id_pengajuan">
                        <input type="hidden" class="form-control" id="name_debitur" name="name_debitur">
                        <input type="hidden" class="form-control" id="plafon" name="plafon">
                        <br>                 
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <th>Aspek & Faktor</th>
                                <th>Nilai</th>
                                <th>Bobot</th>
                                <th>Score</th>
                                <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <h5>Character</h5>
                                <tr>
                                    <td>Iktikad terhadap kewajiban</td>
                                    <td>
                                        <select class="custom-select" id="itk_nilai" name="itk_nilai" onchange="math()">
                                            <option></option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td id="itk_keterangan"></td>
                                    <script>
                                        $('#itk_nilai').on('change', function(){
                                        const selectedPackage = $('#itk_nilai').val();
                                        switch(selectedPackage) {
                                            case "1":
                                                $('#itk_keterangan').text("Kurang");
                                                break;
                                            case "2":
                                                $('#itk_keterangan').text("Sedang");
                                                break;
                                            case "3":
                                                $('#itk_keterangan').text("Cukup");
                                                break;
                                            case "4":
                                                $('#itk_keterangan').text("Baik");
                                                break;
                                            case "5":
                                                $('#itk_keterangan').text("Sangat Baik");
                                                break;
                                            default:
                                                $('#itk_keterangan').text("Mohon Isi Nilai");
                                            }
                                        });
                                    </script>
                                </tr>
                                <tr>    
                                    <td>Motivasi usaha</td>
                                    <td>
                                        <select class="custom-select" id="mu_nilai" name="mu_nilai" onchange="math()">
                                            <option></option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td id="mu_keterangan"></td>
                                    <script>
                                        $('#mu_nilai').on('change', function(){
                                        const selectedPackage = $('#mu_nilai').val();
                                        switch(selectedPackage) {
                                            case "1":
                                                $('#mu_keterangan').text("Kurang");
                                                break;
                                            case "2":
                                                $('#mu_keterangan').text("Sedang");
                                                break;
                                            case "3":
                                                $('#mu_keterangan').text("Cukup");
                                                break;
                                            case "4":
                                                $('#mu_keterangan').text("Baik");
                                                break;
                                            case "5":
                                                $('#mu_keterangan').text("Sangat Baik");
                                                break;
                                            default:
                                                $('#mu_keterangan').text("Mohon Isi Nilai");
                                            }
                                        });
                                    </script>
                                </tr>
                                <tr>
                                    <td>Kepercayaan diri</td>
                                    <td>
                                        <select class="custom-select" id="kd_nilai" name="kd_nilai" onchange="math()">
                                            <option></option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </td>
                                    <td ></td>
                                    <td ></td>
                                    <td id="kd_keterangan"></td>
                                    <script>
                                        $('#kd_nilai').on('change', function(){
                                        const selectedPackage = $('#kd_nilai').val();
                                        switch(selectedPackage) {
                                            case "1":
                                                $('#kd_keterangan').text("Kurang");
                                                break;
                                            case "2":
                                                $('#kd_keterangan').text("Sedang");
                                                break;
                                            case "3":
                                                $('#kd_keterangan').text("Cukup");
                                                break;
                                            case "4":
                                                $('#kd_keterangan').text("Baik");
                                                break;
                                            case "5":
                                                $('#kd_keterangan').text("Sangat Baik");
                                                break;
                                            default:
                                                $('#kd_keterangan').text("Mohon Isi Nilai");
                                            }
                                        });
                                    </script>
                                </tr>
                                <tr>
                                    <td>Keharmonisan keluarga</td>
                                    <td>
                                        <select class="custom-select" id="kk_nilai" name="kk_nilai" onchange="math()">
                                            <option></option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </td>
                                    <td ></td>
                                    <td ></td>
                                    <td id="kk_keterangan"></td>
                                    <script>
                                        $('#kk_nilai').on('change', function(){
                                        const selectedPackage = $('#kk_nilai').val();
                                        switch(selectedPackage) {
                                            case "1":
                                                $('#kk_keterangan').text("Kurang");
                                                break;
                                            case "2":
                                                $('#kk_keterangan').text("Sedang");
                                                break;
                                            case "3":
                                                $('#kk_keterangan').text("Cukup");
                                                break;
                                            case "4":
                                                $('#kk_keterangan').text("Baik");
                                                break;
                                            case "5":
                                                $('#kk_keterangan').text("Sangat Baik");
                                                break;
                                            default:
                                                $('#kk_keterangan').text("Mohon Isi Nilai");
                                            }
                                        });
                                    </script>
                                </tr>
                                <tr>
                                    <td>Aktivitas sosial</td>
                                    <td>
                                        <select class="custom-select" id="as_nilai" name="as_nilai" onchange="math()">
                                            <option></option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </td>
                                    <td ></td>
                                    <td ></td>
                                    <td id="as_keterangan"></td>
                                    <script>
                                        $('#as_nilai').on('change', function(){
                                        const selectedPackage = $('#as_nilai').val();
                                        switch(selectedPackage) {
                                            case "1":
                                                $('#as_keterangan').text("Kurang");
                                                break;
                                            case "2":
                                                $('#as_keterangan').text("Sedang");
                                                break;
                                            case "3":
                                                $('#as_keterangan').text("Cukup");
                                                break;
                                            case "4":
                                                $('#as_keterangan').text("Baik");
                                                break;
                                            case "5":
                                                $('#as_keterangan').text("Sangat Baik");
                                                break;
                                            default:
                                                $('#as_keterangan').text("Mohon Isi Nilai");
                                            }
                                        });
                                    </script>
                                </tr>
                                <tr>
                                    <td>Aktivitas keagamaan</td>
                                    <td>
                                        <select class="custom-select" id="ak_nilai" name="ak_nilai" onchange="math()">
                                            <option></option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </td>
                                    <td ></td>
                                    <td ></td>
                                    <td id="ak_keterangan"></td>
                                    <script>
                                        $('#ak_nilai').on('change', function(){
                                        const selectedPackage = $('#ak_nilai').val();
                                        switch(selectedPackage) {
                                            case "1":
                                                $('#ak_keterangan').text("Kurang");
                                                break;
                                            case "2":
                                                $('#ak_keterangan').text("Sedang");
                                                break;
                                            case "3":
                                                $('#ak_keterangan').text("Cukup");
                                                break;
                                            case "4":
                                                $('#ak_keterangan').text("Baik");
                                                break;
                                            case "5":
                                                $('#ak_keterangan').text("Sangat Baik");
                                                break;
                                            default:
                                                $('#ak_keterangan').text("Mohon Isi Nilai");
                                            }
                                        });
                                    </script>
                                </tr>
                                <tr>
                                    <td>Temperamen</td>
                                    <td>
                                        <select class="custom-select" id="t_nilai" name="t_nilai" onchange="math()">
                                            <option></option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </td>
                                    <td ></td>
                                    <td ></td>
                                    <td id="t_keterangan"></td>
                                    <script>
                                        $('#t_nilai').on('change', function(){
                                        const selectedPackage = $('#t_nilai').val();
                                        switch(selectedPackage) {
                                            case "1":
                                                $('#t_keterangan').text("Kurang");
                                                break;
                                            case "2":
                                                $('#t_keterangan').text("Sedang");
                                                break;
                                            case "3":
                                                $('#t_keterangan').text("Cukup");
                                                break;
                                            case "4":
                                                $('#t_keterangan').text("Baik");
                                                break;
                                            case "5":
                                                $('#t_keterangan').text("Sangat Baik");
                                                break;
                                            default:
                                                $('#t_keterangan').text("Mohon Isi Nilai");
                                            }
                                        });
                                    </script>
                                </tr>
                                <tr>
                                    <td>Hubungan pihak terkait</td>
                                    <td>
                                        <select class="custom-select" id="hpt_nilai" name="hpt_nilai" onchange="math()">
                                            <option></option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </td>
                                    <td ></td>
                                    <td ></td>
                                    <td id="hpt_keterangan"></td>
                                    <script>
                                        $('#hpt_nilai').on('change', function(){
                                        const selectedPackage = $('#hpt_nilai').val();
                                        switch(selectedPackage) {
                                            case "1":
                                                $('#hpt_keterangan').text("Kurang");
                                                break;
                                            case "2":
                                                $('#hpt_keterangan').text("Sedang");
                                                break;
                                            case "3":
                                                $('#hpt_keterangan').text("Cukup");
                                                break;
                                            case "4":
                                                $('#hpt_keterangan').text("Baik");
                                                break;
                                            case "5":
                                                $('#hpt_keterangan').text("Sangat Baik");
                                                break;
                                            default:
                                                $('#hpt_keterangan').text("Mohon Isi Nilai");
                                            }
                                        });
                                    </script>
                                </tr>                               
                                <tr>
                                    <td>Tingkat kepatuhan</td>
                                    <td>
                                        <select class="custom-select" id="tk_nilai" name="tk_nilai" onchange="math()">
                                            <option></option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </td>
                                    <td ></td>
                                    <td ></td>
                                    <td id="tk_keterangan"></td>
                                    <script>
                                        $('#tk_nilai').on('change', function(){
                                        const selectedPackage = $('#tk_nilai').val();
                                        switch(selectedPackage) {
                                            case "1":
                                                $('#tk_keterangan').text("Kurang");
                                                break;
                                            case "2":
                                                $('#tk_keterangan').text("Sedang");
                                                break;
                                            case "3":
                                                $('#tk_keterangan').text("Cukup");
                                                break;
                                            case "4":
                                                $('#tk_keterangan').text("Baik");
                                                break;
                                            case "5":
                                                $('#tk_keterangan').text("Sangat Baik");
                                                break;
                                            default:
                                                $('#tk_keterangan').text("Mohon Isi Nilai");
                                            }
                                        });
                                    </script>
                                </tr>  
                                <tr>
                                    <th>Sub Jumlah</th>
                                    <th id="jumlah" name="jumlah"></th>
                                    <th id="bobot">20%</th>
                                    <th id="score"></th>
                                    <th id="kelayakan"></th>
                                    <th></th>
                                    <script>
                                        function math() {
                                            var a = parseInt(document.getElementById("itk_nilai").value);
                                            var b = parseInt(document.getElementById("mu_nilai").value);
                                            var c = parseInt(document.getElementById("kd_nilai").value);
                                            var d = parseInt(document.getElementById("kk_nilai").value);
                                            var e = parseInt(document.getElementById("as_nilai").value);
                                            var f = parseInt(document.getElementById("ak_nilai").value);
                                            var g = parseInt(document.getElementById("t_nilai").value);
                                            var h = parseInt(document.getElementById("hpt_nilai").value);
                                            var i = parseInt(document.getElementById("tk_nilai").value);
                                            if(a && b && c && d && e && f && g && h && i){
                                                var jml = a+b+c+d+e+f+g+h+i;
                                                var score = jml*0.2;
                                                document.getElementById("jumlah").innerHTML= jml;
                                                document.getElementById("score").innerHTML= score.toFixed(1);
                                                if(score<=3){
                                                    document.getElementById("kelayakan").innerHTML= "Tidak Layak";
                                                }if(score > 3 && score <=6){
                                                    document.getElementById("kelayakan").innerHTML= "Layak Dengan Catatan";
                                                }if(score > 6){
                                                    document.getElementById("kelayakan").innerHTML= "Layak";
                                                }
                                            }
                                        }
                                    </script>
                                </tr>
                            </tbody>
                        </table>
                        <br>          
                        <br>          
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <th>Aspek & Faktor</th>
                                <th>Nilai</th>
                                <th>Bobot</th>
                                <th>Score</th>
                                <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <h5>Capacity</h5>
                                <tr>
                                    <td>Pengalaman usaha</td>
                                    <td>
                                        <select class="custom-select" id="pengUsa_nilai" name="pengUsa_nilai" onchange="math_capa()">
                                            <option></option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td id="pengUsa_keterangan"></td>
                                    <script>
                                        $('#pengUsa_nilai').on('change', function(){
                                        const selectedPackage = $('#pengUsa_nilai').val();
                                        switch(selectedPackage) {
                                            case "1":
                                                $('#pengUsa_keterangan').text("Kurang");
                                                break;
                                            case "2":
                                                $('#pengUsa_keterangan').text("Sedang");
                                                break;
                                            case "3":
                                                $('#pengUsa_keterangan').text("Cukup");
                                                break;
                                            case "4":
                                                $('#pengUsa_keterangan').text("Baik");
                                                break;
                                            case "5":
                                                $('#pengUsa_keterangan').text("Sangat Baik");
                                                break;
                                            default:
                                                $('#pengUsa_keterangan').text("Mohon Isi Nilai");
                                            }
                                        });
                                    </script>
                                </tr>
                                <tr>    
                                    <td>Administrasi usaha</td>
                                    <td>
                                        <select class="custom-select" id="admUsa_nilai" name="admUsa_nilai" onchange="math_capa()">
                                            <option></option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td id="admUsa_keterangan"></td>
                                    <script>
                                        $('#admUsa_nilai').on('change', function(){
                                        const selectedPackage = $('#admUsa_nilai').val();
                                        switch(selectedPackage) {
                                            case "1":
                                                $('#admUsa_keterangan').text("Kurang");
                                                break;
                                            case "2":
                                                $('#admUsa_keterangan').text("Sedang");
                                                break;
                                            case "3":
                                                $('#admUsa_keterangan').text("Cukup");
                                                break;
                                            case "4":
                                                $('#admUsa_keterangan').text("Baik");
                                                break;
                                            case "5":
                                                $('#admUsa_keterangan').text("Sangat Baik");
                                                break;
                                            default:
                                                $('#admUsa_keterangan').text("Mohon Isi Nilai");
                                            }
                                        });
                                    </script>
                                </tr>
                                <tr>
                                    <td>Legalitas/perijinan</td>
                                    <td>
                                        <select class="custom-select" id="legal_nilai" name="legal_nilai" onchange="math_capa()">
                                            <option></option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </td>
                                    <td ></td>
                                    <td ></td>
                                    <td id="legal_keterangan"></td>
                                    <script>
                                        $('#legal_nilai').on('change', function(){
                                        const selectedPackage = $('#legal_nilai').val();
                                        switch(selectedPackage) {
                                            case "1":
                                                $('#legal_keterangan').text("Kurang");
                                                break;
                                            case "2":
                                                $('#legal_keterangan').text("Sedang");
                                                break;
                                            case "3":
                                                $('#legal_keterangan').text("Cukup");
                                                break;
                                            case "4":
                                                $('#legal_keterangan').text("Baik");
                                                break;
                                            case "5":
                                                $('#legal_keterangan').text("Sangat Baik");
                                                break;
                                            default:
                                                $('#legal_keterangan').text("Mohon Isi Nilai");
                                            }
                                        });
                                    </script>
                                </tr>
                                <tr>
                                    <td>Tujuan usaha</td>
                                    <td>
                                        <select class="custom-select" id="tujUsa_nilai" name="tujUsa_nilai" onchange="math_capa()">
                                            <option></option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </td>
                                    <td ></td>
                                    <td ></td>
                                    <td id="tujUsa_keterangan"></td>
                                    <script>
                                        $('#tujUsa_nilai').on('change', function(){
                                        const selectedPackage = $('#tujUsa_nilai').val();
                                        switch(selectedPackage) {
                                            case "1":
                                                $('#tujUsa_keterangan').text("Kurang");
                                                break;
                                            case "2":
                                                $('#tujUsa_keterangan').text("Sedang");
                                                break;
                                            case "3":
                                                $('#tujUsa_keterangan').text("Cukup");
                                                break;
                                            case "4":
                                                $('#tujUsa_keterangan').text("Baik");
                                                break;
                                            case "5":
                                                $('#tujUsa_keterangan').text("Sangat Baik");
                                                break;
                                            default:
                                                $('#tujUsa_keterangan').text("Mohon Isi Nilai");
                                            }
                                        });
                                    </script>
                                </tr>
                                <tr>
                                    <td>Tingkat persaingan</td>
                                    <td>
                                        <select class="custom-select" id="tingPer_nilai" name="tingPer_nilai" onchange="math_capa()">
                                            <option></option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </td>
                                    <td ></td>
                                    <td ></td>
                                    <td id="tingPer_keterangan"></td>
                                    <script>
                                        $('#tingPer_nilai').on('change', function(){
                                        const selectedPackage = $('#tingPer_nilai').val();
                                        switch(selectedPackage) {
                                            case "1":
                                                $('#tingPer_keterangan').text("Kurang");
                                                break;
                                            case "2":
                                                $('#tingPer_keterangan').text("Sedang");
                                                break;
                                            case "3":
                                                $('#tingPer_keterangan').text("Cukup");
                                                break;
                                            case "4":
                                                $('#tingPer_keterangan').text("Baik");
                                                break;
                                            case "5":
                                                $('#tingPer_keterangan').text("Sangat Baik");
                                                break;
                                            default:
                                                $('#tingPer_keterangan').text("Mohon Isi Nilai");
                                            }
                                        });
                                    </script>
                                </tr>
                                <tr>
                                    <td>Harga produk</td>
                                    <td>
                                        <select class="custom-select" id="harPro_nilai" name="harPro_nilai" onchange="math_capa()">
                                            <option></option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </td>
                                    <td ></td>
                                    <td ></td>
                                    <td id="harPro_keterangan"></td>
                                    <script>
                                        $('#harPro_nilai').on('change', function(){
                                        const selectedPackage = $('#harPro_nilai').val();
                                        switch(selectedPackage) {
                                            case "1":
                                                $('#harPro_keterangan').text("Kurang");
                                                break;
                                            case "2":
                                                $('#harPro_keterangan').text("Sedang");
                                                break;
                                            case "3":
                                                $('#harPro_keterangan').text("Cukup");
                                                break;
                                            case "4":
                                                $('#harPro_keterangan').text("Baik");
                                                break;
                                            case "5":
                                                $('#harPro_keterangan').text("Sangat Baik");
                                                break;
                                            default:
                                                $('#harPro_keterangan').text("Mohon Isi Nilai");
                                            }
                                        });
                                    </script>
                                </tr>
                                <tr>
                                    <td>Sistem pembayaran</td>
                                    <td>
                                        <select class="custom-select" id="sisPem_nilai" name="sisPem_nilai" onchange="math_capa()">
                                            <option></option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </td>
                                    <td ></td>
                                    <td ></td>
                                    <td id="sisPem_keterangan"></td>
                                    <script>
                                        $('#sisPem_nilai').on('change', function(){
                                        const selectedPackage = $('#sisPem_nilai').val();
                                        switch(selectedPackage) {
                                            case "1":
                                                $('#sisPem_keterangan').text("Kurang");
                                                break;
                                            case "2":
                                                $('#sisPem_keterangan').text("Sedang");
                                                break;
                                            case "3":
                                                $('#sisPem_keterangan').text("Cukup");
                                                break;
                                            case "4":
                                                $('#sisPem_keterangan').text("Baik");
                                                break;
                                            case "5":
                                                $('#sisPem_keterangan').text("Sangat Baik");
                                                break;
                                            default:
                                                $('#sisPem_keterangan').text("Mohon Isi Nilai");
                                            }
                                        });
                                    </script>
                                </tr>
                                <tr>
                                    <td>Sistem distribusi</td>
                                    <td>
                                        <select class="custom-select" id="sisDis_nilai" name="sisDis_nilai" onchange="math_capa()">
                                            <option></option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </td>
                                    <td ></td>
                                    <td ></td>
                                    <td id="sisDis_keterangan"></td>
                                    <script>
                                        $('#sisDis_nilai').on('change', function(){
                                        const selectedPackage = $('#sisDis_nilai').val();
                                        switch(selectedPackage) {
                                            case "1":
                                                $('#sisDis_keterangan').text("Kurang");
                                                break;
                                            case "2":
                                                $('#sisDis_keterangan').text("Sedang");
                                                break;
                                            case "3":
                                                $('#sisDis_keterangan').text("Cukup");
                                                break;
                                            case "4":
                                                $('#sisDis_keterangan').text("Baik");
                                                break;
                                            case "5":
                                                $('#sisDis_keterangan').text("Sangat Baik");
                                                break;
                                            default:
                                                $('#sisDis_keterangan').text("Mohon Isi Nilai");
                                            }
                                        });
                                    </script>
                                </tr>                               
                                <tr>
                                    <td>Kemudahan bhn baku</td>
                                    <td>
                                        <select class="custom-select" id="kemBb_nilai" name="kemBb_nilai" onchange="math_capa()">
                                            <option></option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </td>
                                    <td ></td>
                                    <td ></td>
                                    <td id="kemBb_keterangan"></td>
                                    <script>
                                        $('#kemBb_nilai').on('change', function(){
                                        const selectedPackage = $('#kemBb_nilai').val();
                                        switch(selectedPackage) {
                                            case "1":
                                                $('#kemBb_keterangan').text("Kurang");
                                                break;
                                            case "2":
                                                $('#kemBb_keterangan').text("Sedang");
                                                break;
                                            case "3":
                                                $('#kemBb_keterangan').text("Cukup");
                                                break;
                                            case "4":
                                                $('#kemBb_keterangan').text("Baik");
                                                break;
                                            case "5":
                                                $('#kemBb_keterangan').text("Sangat Baik");
                                                break;
                                            default:
                                                $('#kemBb_keterangan').text("Mohon Isi Nilai");
                                            }
                                        });
                                    </script>
                                </tr>                               
                                <tr>
                                    <td>Cara pembelian</td>
                                    <td>
                                        <select class="custom-select" id="carP_nilai" name="carP_nilai" onchange="math_capa()">
                                            <option></option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </td>
                                    <td ></td>
                                    <td ></td>
                                    <td id="carP_keterangan"></td>
                                    <script>
                                        $('#carP_nilai').on('change', function(){
                                        const selectedPackage = $('#carP_nilai').val();
                                        switch(selectedPackage) {
                                            case "1":
                                                $('#carP_keterangan').text("Kurang");
                                                break;
                                            case "2":
                                                $('#carP_keterangan').text("Sedang");
                                                break;
                                            case "3":
                                                $('#carP_keterangan').text("Cukup");
                                                break;
                                            case "4":
                                                $('#carP_keterangan').text("Baik");
                                                break;
                                            case "5":
                                                $('#carP_keterangan').text("Sangat Baik");
                                                break;
                                            default:
                                                $('#carP_keterangan').text("Mohon Isi Nilai");
                                            }
                                        });
                                    </script>
                                </tr>                                 
                                <tr>
                                    <td>Proses produksi</td>
                                    <td>
                                        <select class="custom-select" id="prosP_nilai" name="prosP_nilai" onchange="math_capa()">
                                            <option></option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </td>
                                    <td ></td>
                                    <td ></td>
                                    <td id="prosP_keterangan"></td>
                                    <script>
                                        $('#prosP_nilai').on('change', function(){
                                        const selectedPackage = $('#prosP_nilai').val();
                                        switch(selectedPackage) {
                                            case "1":
                                                $('#prosP_keterangan').text("Kurang");
                                                break;
                                            case "2":
                                                $('#prosP_keterangan').text("Sedang");
                                                break;
                                            case "3":
                                                $('#prosP_keterangan').text("Cukup");
                                                break;
                                            case "4":
                                                $('#prosP_keterangan').text("Baik");
                                                break;
                                            case "5":
                                                $('#prosP_keterangan').text("Sangat Baik");
                                                break;
                                            default:
                                                $('#prosP_keterangan').text("Mohon Isi Nilai");
                                            }
                                        });
                                    </script>
                                </tr>                                 
                                <tr>
                                    <td>Mesin & peralatan</td>
                                    <td>
                                        <select class="custom-select" id="mesP_nilai" name="mesP_nilai" onchange="math_capa()">
                                            <option></option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </td>
                                    <td ></td>
                                    <td ></td>
                                    <td id="mesP_keterangan"></td>
                                    <script>
                                        $('#mesP_nilai').on('change', function(){
                                        const selectedPackage = $('#mesP_nilai').val();
                                        switch(selectedPackage) {
                                            case "1":
                                                $('#mesP_keterangan').text("Kurang");
                                                break;
                                            case "2":
                                                $('#mesP_keterangan').text("Sedang");
                                                break;
                                            case "3":
                                                $('#mesP_keterangan').text("Cukup");
                                                break;
                                            case "4":
                                                $('#mesP_keterangan').text("Baik");
                                                break;
                                            case "5":
                                                $('#mesP_keterangan').text("Sangat Baik");
                                                break;
                                            default:
                                                $('#mesP_keterangan').text("Mohon Isi Nilai");
                                            }
                                        });
                                    </script>
                                </tr>                                 
                                <tr>
                                    <td>Tenaga kerja</td>
                                    <td>
                                        <select class="custom-select" id="tenK_nilai" name="tenK_nilai" onchange="math_capa()">
                                            <option></option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </td>
                                    <td ></td>
                                    <td ></td>
                                    <td id="tenK_keterangan"></td>
                                    <script>
                                        $('#tenK_nilai').on('change', function(){
                                        const selectedPackage = $('#tenK_nilai').val();
                                        switch(selectedPackage) {
                                            case "1":
                                                $('#tenK_keterangan').text("Kurang");
                                                break;
                                            case "2":
                                                $('#tenK_keterangan').text("Sedang");
                                                break;
                                            case "3":
                                                $('#tenK_keterangan').text("Cukup");
                                                break;
                                            case "4":
                                                $('#tenK_keterangan').text("Baik");
                                                break;
                                            case "5":
                                                $('#tenK_keterangan').text("Sangat Baik");
                                                break;
                                            default:
                                                $('#tenK_keterangan').text("Mohon Isi Nilai");
                                            }
                                        });
                                    </script>
                                </tr>                                 
                                <tr>
                                    <td>Dampak sosial masy.</td>
                                    <td>
                                        <select class="custom-select" id="damSm_nilai" name="damSm_nilai" onchange="math_capa()">
                                            <option></option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </td>
                                    <td ></td>
                                    <td ></td>
                                    <td id="damSm_keterangan"></td>
                                    <script>
                                        $('#damSm_nilai').on('change', function(){
                                        const selectedPackage = $('#damSm_nilai').val();
                                        switch(selectedPackage) {
                                            case "1":
                                                $('#damSm_keterangan').text("Kurang");
                                                break;
                                            case "2":
                                                $('#damSm_keterangan').text("Sedang");
                                                break;
                                            case "3":
                                                $('#damSm_keterangan').text("Cukup");
                                                break;
                                            case "4":
                                                $('#damSm_keterangan').text("Baik");
                                                break;
                                            case "5":
                                                $('#damSm_keterangan').text("Sangat Baik");
                                                break;
                                            default:
                                                $('#damSm_keterangan').text("Mohon Isi Nilai");
                                            }
                                        });
                                    </script>
                                </tr>                                 
                                <tr>
                                    <td>Dampak ekon. Mikro</td>
                                    <td>
                                        <select class="custom-select" id="damEk_nilai" name="damEk_nilai" onchange="math_capa()">
                                            <option></option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </td>
                                    <td ></td>
                                    <td ></td>
                                    <td id="damEk_keterangan"></td>
                                    <script>
                                        $('#damEk_nilai').on('change', function(){
                                        const selectedPackage = $('#damEk_nilai').val();
                                        switch(selectedPackage) {
                                            case "1":
                                                $('#damEk_keterangan').text("Kurang");
                                                break;
                                            case "2":
                                                $('#damEk_keterangan').text("Sedang");
                                                break;
                                            case "3":
                                                $('#damEk_keterangan').text("Cukup");
                                                break;
                                            case "4":
                                                $('#damEk_keterangan').text("Baik");
                                                break;
                                            case "5":
                                                $('#damEk_keterangan').text("Sangat Baik");
                                                break;
                                            default:
                                                $('#damEk_keterangan').text("Mohon Isi Nilai");
                                            }
                                        });
                                    </script>
                                </tr>                                 
                                <tr>
                                    <td>Dampak ekon. Makro</td>
                                    <td>
                                        <select class="custom-select" id="dampEma_nilai" name="dampEma_nilai" onchange="math_capa()">
                                            <option></option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </td>
                                    <td ></td>
                                    <td ></td>
                                    <td id="dampEma_keterangan"></td>
                                    <script>
                                        $('#dampEma_nilai').on('change', function(){
                                        const selectedPackage = $('#dampEma_nilai').val();
                                        switch(selectedPackage) {
                                            case "1":
                                                $('#dampEma_keterangan').text("Kurang");
                                                break;
                                            case "2":
                                                $('#dampEma_keterangan').text("Sedang");
                                                break;
                                            case "3":
                                                $('#dampEma_keterangan').text("Cukup");
                                                break;
                                            case "4":
                                                $('#dampEma_keterangan').text("Baik");
                                                break;
                                            case "5":
                                                $('#dampEma_keterangan').text("Sangat Baik");
                                                break;
                                            default:
                                                $('#dampEma_keterangan').text("Mohon Isi Nilai");
                                            }
                                        });
                                    </script>
                                </tr>                                 
                                <tr>
                                    <td>Dampak lingkungan</td>
                                    <td>
                                        <select class="custom-select" id="damLi_nilai" name="damLi_nilai" onchange="math_capa()">
                                            <option></option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </td>
                                    <td ></td>
                                    <td ></td>
                                    <td id="damLi_keterangan"></td>
                                    <script>
                                        $('#damLi_nilai').on('change', function(){
                                        const selectedPackage = $('#damLi_nilai').val();
                                        switch(selectedPackage) {
                                            case "1":
                                                $('#damLi_keterangan').text("Kurang");
                                                break;
                                            case "2":
                                                $('#damLi_keterangan').text("Sedang");
                                                break;
                                            case "3":
                                                $('#damLi_keterangan').text("Cukup");
                                                break;
                                            case "4":
                                                $('#damLi_keterangan').text("Baik");
                                                break;
                                            case "5":
                                                $('#damLi_keterangan').text("Sangat Baik");
                                                break;
                                            default:
                                                $('#damLi_keterangan').text("Mohon Isi Nilai");
                                            }
                                        });
                                    </script>
                                </tr>                                 
                                <tr>
                                    <td>Kemampuan bayar</td>
                                    <td>
                                        <select class="custom-select" id="kemBa_nilai" name="kemBa_nilai" onchange="math_capa()">
                                            <option></option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </td>
                                    <td ></td>
                                    <td ></td>
                                    <td id="kemBa_keterangan"></td>
                                    <script>
                                        $('#kemBa_nilai').on('change', function(){
                                        const selectedPackage = $('#kemBa_nilai').val();
                                        switch(selectedPackage) {
                                            case "1":
                                                $('#kemBa_keterangan').text("Kurang");
                                                break;
                                            case "2":
                                                $('#kemBa_keterangan').text("Sedang");
                                                break;
                                            case "3":
                                                $('#kemBa_keterangan').text("Cukup");
                                                break;
                                            case "4":
                                                $('#kemBa_keterangan').text("Baik");
                                                break;
                                            case "5":
                                                $('#kemBa_keterangan').text("Sangat Baik");
                                                break;
                                            default:
                                                $('#kemBa_keterangan').text("Mohon Isi Nilai");
                                            }
                                        });
                                    </script>
                                </tr>                                 
                                <tr>
                                    <td>Pemupukan laba</td>
                                    <td>
                                        <select class="custom-select" id="pemLa_nilai" name="pemLa_nilai" onchange="math_capa()">
                                            <option></option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </td>
                                    <td ></td>
                                    <td ></td>
                                    <td id="pemLa_keterangan"></td>
                                    <script>
                                        $('#pemLa_nilai').on('change', function(){
                                        const selectedPackage = $('#pemLa_nilai').val();
                                        switch(selectedPackage) {
                                            case "1":
                                                $('#pemLa_keterangan').text("Kurang");
                                                break;
                                            case "2":
                                                $('#pemLa_keterangan').text("Sedang");
                                                break;
                                            case "3":
                                                $('#pemLa_keterangan').text("Cukup");
                                                break;
                                            case "4":
                                                $('#pemLa_keterangan').text("Baik");
                                                break;
                                            case "5":
                                                $('#pemLa_keterangan').text("Sangat Baik");
                                                break;
                                            default:
                                                $('#pemLa_keterangan').text("Mohon Isi Nilai");
                                            }
                                        });
                                    </script>
                                </tr>  
                                <tr>
                                    <th>Sub Jumlah</th>
                                    <th id="jumlah_capa" name="jumlah_capa"></th>
                                    <th id="bobot_capa">30%</th>
                                    <th id="score_capa"></th>
                                    <th id="kelayakan_capa"></th>
                                    <th></th>
                                    <script>
                                        function math_capa() {
                                            var a = parseInt(document.getElementById("pengUsa_nilai").value);
                                            var b = parseInt(document.getElementById("admUsa_nilai").value);
                                            var c = parseInt(document.getElementById("legal_nilai").value);
                                            var d = parseInt(document.getElementById("tujUsa_nilai").value);
                                            var e = parseInt(document.getElementById("tingPer_nilai").value);
                                            var f = parseInt(document.getElementById("harPro_nilai").value);
                                            var g = parseInt(document.getElementById("sisPem_nilai").value);
                                            var h = parseInt(document.getElementById("sisDis_nilai").value);
                                            var i = parseInt(document.getElementById("kemBb_nilai").value);
                                            var j = parseInt(document.getElementById("carP_nilai").value);
                                            var k = parseInt(document.getElementById("prosP_nilai").value);
                                            var l = parseInt(document.getElementById("mesP_nilai").value);
                                            var m = parseInt(document.getElementById("tenK_nilai").value);
                                            var n = parseInt(document.getElementById("damSm_nilai").value);
                                            var o = parseInt(document.getElementById("damEk_nilai").value);
                                            var p = parseInt(document.getElementById("dampEma_nilai").value);
                                            var q = parseInt(document.getElementById("damLi_nilai").value);
                                            var r = parseInt(document.getElementById("kemBa_nilai").value);
                                            var s = parseInt(document.getElementById("pemLa_nilai").value);
                                            if(a && b && c && d && e && f && g && h && i && j && k && l && m && n && o && p && q && r && s){
                                                var jml = a+b+c+d+e+f+g+h+i+j+k+l+m+n+o+p+q+r+s;
                                                var score = jml*0.3;
                                                document.getElementById("jumlah_capa").innerHTML= jml;
                                                document.getElementById("score_capa").innerHTML= score.toFixed(1);
                                                if(score<=12){
                                                    document.getElementById("kelayakan_capa").innerHTML= "Tidak Layak";
                                                }if(score > 12 && score <=24){
                                                    document.getElementById("kelayakan_capa").innerHTML= "Layak Dengan Catatan";
                                                }if(score > 24){
                                                    document.getElementById("kelayakan_capa").innerHTML= "Layak";
                                                }
                                            }
                                        }
                                    </script>
                                </tr>
                            </tbody>
                        </table>
                        <br>          
                        <br>          
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <th>Aspek & Faktor</th>
                                <th>Nilai</th>
                                <th>Bobot</th>
                                <th>Score</th>
                                <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <h5>Capital</h5>
                                <tr>
                                    <td>Sumber dana sendiri</td>
                                    <td>
                                        <select class="custom-select" id="sumDs_nilai" name="sumDs_nilai" onchange="math_capi()">
                                            <option></option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td id="sumDs_keterangan"></td>
                                    <script>
                                        $('#sumDs_nilai').on('change', function(){
                                        const selectedPackage = $('#sumDs_nilai').val();
                                        switch(selectedPackage) {
                                            case "1":
                                                $('#sumDs_keterangan').text("Kurang");
                                                break;
                                            case "2":
                                                $('#sumDs_keterangan').text("Sedang");
                                                break;
                                            case "3":
                                                $('#sumDs_keterangan').text("Cukup");
                                                break;
                                            case "4":
                                                $('#sumDs_keterangan').text("Baik");
                                                break;
                                            case "5":
                                                $('#sumDs_keterangan').text("Sangat Baik");
                                                break;
                                            default:
                                                $('#sumDs_keterangan').text("Mohon Isi Nilai");
                                            }
                                        });
                                    </script>
                                </tr>
                                <tr>    
                                    <td>Sumber dana keluarga</td>
                                    <td>
                                        <select class="custom-select" id="sumDk_nilai" name="sumDk_nilai" onchange="math_capi()">
                                            <option></option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td id="sumDk_keterangan"></td>
                                    <script>
                                        $('#sumDk_nilai').on('change', function(){
                                        const selectedPackage = $('#sumDk_nilai').val();
                                        switch(selectedPackage) {
                                            case "1":
                                                $('#sumDk_keterangan').text("Kurang");
                                                break;
                                            case "2":
                                                $('#sumDk_keterangan').text("Sedang");
                                                break;
                                            case "3":
                                                $('#sumDk_keterangan').text("Cukup");
                                                break;
                                            case "4":
                                                $('#sumDk_keterangan').text("Baik");
                                                break;
                                            case "5":
                                                $('#sumDk_keterangan').text("Sangat Baik");
                                                break;
                                            default:
                                                $('#sumDk_keterangan').text("Mohon Isi Nilai");
                                            }
                                        });
                                    </script>
                                </tr>
                                <tr>
                                    <td>Sumber dana lainnya</td>
                                    <td>
                                        <select class="custom-select" id="sumDl_nilai" name="sumDl_nilai" onchange="math_capi()">
                                            <option></option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </td>
                                    <td ></td>
                                    <td ></td>
                                    <td id="sumDl_keterangan"></td>
                                    <script>
                                        $('#sumDl_nilai').on('change', function(){
                                        const selectedPackage = $('#sumDl_nilai').val();
                                        switch(selectedPackage) {
                                            case "1":
                                                $('#sumDl_keterangan').text("Kurang");
                                                break;
                                            case "2":
                                                $('#sumDl_keterangan').text("Sedang");
                                                break;
                                            case "3":
                                                $('#sumDl_keterangan').text("Cukup");
                                                break;
                                            case "4":
                                                $('#sumDl_keterangan').text("Baik");
                                                break;
                                            case "5":
                                                $('#sumDl_keterangan').text("Sangat Baik");
                                                break;
                                            default:
                                                $('#sumDl_keterangan').text("Mohon Isi Nilai");
                                            }
                                        });
                                    </script>
                                </tr> 
                                <tr>
                                    <th>Sub Jumlah</th>
                                    <th id="jumlah_capi" name="jumlah_capi"></th>
                                    <th id="bobot_capi">20%</th>
                                    <th id="score_capi"></th>
                                    <th id="kelayakan_capi"></th>
                                    <th></th>
                                    <script>
                                        function math_capi() {
                                            var a = parseInt(document.getElementById("sumDs_nilai").value);
                                            var b = parseInt(document.getElementById("sumDk_nilai").value);
                                            var c = parseInt(document.getElementById("sumDl_nilai").value);
                                            if(a && b && c){
                                                var jml = a+b+c;
                                                var score = jml*0.2;
                                                document.getElementById("jumlah_capi").innerHTML= jml;
                                                document.getElementById("score_capi").innerHTML= score.toFixed(1);
                                                if(score<=1){
                                                    document.getElementById("kelayakan_capi").innerHTML= "Tidak Layak";
                                                }if(score > 1 && score <= 2){
                                                    document.getElementById("kelayakan_capi").innerHTML= "Layak Dengan Catatan";
                                                }if(score > 2){
                                                    document.getElementById("kelayakan_capi").innerHTML= "Layak";
                                                }
                                            }
                                        }
                                    </script>
                                </tr>
                            </tbody>
                        </table>
                        <br>          
                        <br>          
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <th>Aspek & Faktor</th>
                                <th>Nilai</th>
                                <th>Bobot</th>
                                <th>Score</th>
                                <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <h5>Collateral</h5>
                                <tr>
                                    <td>Usaha yang dibiayai</td>
                                    <td>
                                        <select class="custom-select" id="UsYd_nilai" name="UsYd_nilai" onchange="math_coll()">
                                            <option></option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td id="UsYd_keterangan"></td>
                                    <script>
                                        $('#UsYd_nilai').on('change', function(){
                                        const selectedPackage = $('#UsYd_nilai').val();
                                        switch(selectedPackage) {
                                            case "1":
                                                $('#UsYd_keterangan').text("Kurang");
                                                break;
                                            case "2":
                                                $('#UsYd_keterangan').text("Sedang");
                                                break;
                                            case "3":
                                                $('#UsYd_keterangan').text("Cukup");
                                                break;
                                            case "4":
                                                $('#UsYd_keterangan').text("Baik");
                                                break;
                                            case "5":
                                                $('#UsYd_keterangan').text("Sangat Baik");
                                                break;
                                            default:
                                                $('#UsYd_keterangan').text("Mohon Isi Nilai");
                                            }
                                        });
                                    </script>
                                </tr>
                                <tr>    
                                    <td>Sertipikat tanah</td>
                                    <td>
                                        <select class="custom-select" id="serT_nilai" name="serT_nilai" onchange="math_coll()">
                                            <option></option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td id="serT_keterangan"></td>
                                    <script>
                                        $('#serT_nilai').on('change', function(){
                                        const selectedPackage = $('#serT_nilai').val();
                                        switch(selectedPackage) {
                                            case "1":
                                                $('#serT_keterangan').text("Kurang");
                                                break;
                                            case "2":
                                                $('#serT_keterangan').text("Sedang");
                                                break;
                                            case "3":
                                                $('#serT_keterangan').text("Cukup");
                                                break;
                                            case "4":
                                                $('#serT_keterangan').text("Baik");
                                                break;
                                            case "5":
                                                $('#serT_keterangan').text("Sangat Baik");
                                                break;
                                            default:
                                                $('#serT_keterangan').text("Mohon Isi Nilai");
                                            }
                                        });
                                    </script>
                                </tr>
                                <tr>
                                    <td>BPKB</td>
                                    <td>
                                        <select class="custom-select" id="bpkb_nilai" name="bpkb_nilai" onchange="math_coll()">
                                            <option></option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </td>
                                    <td ></td>
                                    <td ></td>
                                    <td id="bpkb_keterangan"></td>
                                    <script>
                                        $('#bpkb_nilai').on('change', function(){
                                        const selectedPackage = $('#bpkb_nilai').val();
                                        switch(selectedPackage) {
                                            case "1":
                                                $('#bpkb_keterangan').text("Kurang");
                                                break;
                                            case "2":
                                                $('#bpkb_keterangan').text("Sedang");
                                                break;
                                            case "3":
                                                $('#bpkb_keterangan').text("Cukup");
                                                break;
                                            case "4":
                                                $('#bpkb_keterangan').text("Baik");
                                                break;
                                            case "5":
                                                $('#bpkb_keterangan').text("Sangat Baik");
                                                break;
                                            default:
                                                $('#bpkb_keterangan').text("Mohon Isi Nilai");
                                            }
                                        });
                                    </script>
                                </tr> 
                                <tr>
                                    <td>Marketable</td>
                                    <td>
                                        <select class="custom-select" id="market_nilai" name="market_nilai" onchange="math_coll()">
                                            <option></option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </td>
                                    <td ></td>
                                    <td ></td>
                                    <td id="market_keterangan"></td>
                                    <script>
                                        $('#market_nilai').on('change', function(){
                                        const selectedPackage = $('#market_nilai').val();
                                        switch(selectedPackage) {
                                            case "1":
                                                $('#market_keterangan').text("Kurang");
                                                break;
                                            case "2":
                                                $('#market_keterangan').text("Sedang");
                                                break;
                                            case "3":
                                                $('#market_keterangan').text("Cukup");
                                                break;
                                            case "4":
                                                $('#market_keterangan').text("Baik");
                                                break;
                                            case "5":
                                                $('#market_keterangan').text("Sangat Baik");
                                                break;
                                            default:
                                                $('#market_keterangan').text("Mohon Isi Nilai");
                                            }
                                        });
                                    </script>
                                </tr> 
                                <tr>
                                    <th>Sub Jumlah</th>
                                    <th id="jumlah_coll" name="jumlah_coll"></th>
                                    <th id="bobot_coll">20%</th>
                                    <th id="score_coll"></th>
                                    <th id="kelayakan_coll"></th>
                                    <th></th>
                                    <script>
                                        function math_coll() {
                                            var a = parseInt(document.getElementById("UsYd_nilai").value);
                                            var b = parseInt(document.getElementById("serT_nilai").value);
                                            var c = parseInt(document.getElementById("bpkb_nilai").value);
                                            var d = parseInt(document.getElementById("market_nilai").value);
                                            if(a && b && c && d){
                                                var jml = a+b+c+d;
                                                var score = jml*0.2;
                                                document.getElementById("jumlah_coll").innerHTML= jml;
                                                document.getElementById("score_coll").innerHTML= score.toFixed(1);
                                                if(score<=1){
                                                    document.getElementById("kelayakan_coll").innerHTML= "Tidak Layak";
                                                }if(score >1 && score <=2){
                                                    document.getElementById("kelayakan_coll").innerHTML= "Layak Dengan Catatan";
                                                }if(score > 2){
                                                    document.getElementById("kelayakan_coll").innerHTML= "Layak";
                                                }
                                            }
                                        }
                                    </script>
                                </tr>
                            </tbody>
                        </table>
                        <br>          
                        <br>          
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <th>Aspek & Faktor</th>
                                <th>Nilai</th>
                                <th>Bobot</th>
                                <th>Score</th>
                                <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <h5>Condition</h5>
                                <tr>
                                    <td>Kebijakan Pemerintah</td>
                                    <td>
                                        <select class="custom-select" id="kebP_nilai" name="kebP_nilai" onchange="math_cond()">
                                            <option></option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td id="kebP_keterangan"></td>
                                    <script>
                                        $('#kebP_nilai').on('change', function(){
                                        const selectedPackage = $('#kebP_nilai').val();
                                        switch(selectedPackage) {
                                            case "1":
                                                $('#kebP_keterangan').text("Kurang");
                                                break;
                                            case "2":
                                                $('#kebP_keterangan').text("Sedang");
                                                break;
                                            case "3":
                                                $('#kebP_keterangan').text("Cukup");
                                                break;
                                            case "4":
                                                $('#kebP_keterangan').text("Baik");
                                                break;
                                            case "5":
                                                $('#kebP_keterangan').text("Sangat Baik");
                                                break;
                                            default:
                                                $('#kebP_keterangan').text("Mohon Isi Nilai");
                                            }
                                        });
                                    </script>
                                </tr>
                                <tr>    
                                    <td>Ekonomi global</td>
                                    <td>
                                        <select class="custom-select" id="ekoG_nilai" name="ekoG_nilai" onchange="math_cond()">
                                            <option></option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td id="ekoG_keterangan"></td>
                                    <script>
                                        $('#ekoG_nilai').on('change', function(){
                                        const selectedPackage = $('#ekoG_nilai').val();
                                        switch(selectedPackage) {
                                            case "1":
                                                $('#ekoG_keterangan').text("Kurang");
                                                break;
                                            case "2":
                                                $('#ekoG_keterangan').text("Sedang");
                                                break;
                                            case "3":
                                                $('#ekoG_keterangan').text("Cukup");
                                                break;
                                            case "4":
                                                $('#ekoG_keterangan').text("Baik");
                                                break;
                                            case "5":
                                                $('#ekoG_keterangan').text("Sangat Baik");
                                                break;
                                            default:
                                                $('#ekoG_keterangan').text("Mohon Isi Nilai");
                                            }
                                        });
                                    </script>
                                </tr> 
                                <tr>
                                    <th>Sub Jumlah</th>
                                    <th id="jumlah_cond" name="jumlah_cond"></th>
                                    <th id="bobot_cond">10%</th>
                                    <th id="score_cond"></th>
                                    <th id="kelayakan_cond"></th>
                                    <th></th>
                                    <script>
                                        function math_cond() {
                                            var a = parseInt(document.getElementById("kebP_nilai").value);
                                            var b = parseInt(document.getElementById("ekoG_nilai").value);
                                            if(a && b){
                                                var jml = a+b;
                                                var score = jml*0.1;
                                                document.getElementById("jumlah_cond").innerHTML= jml;
                                                document.getElementById("score_cond").innerHTML= score.toFixed(1);
                                                if(score<0.66){
                                                    document.getElementById("kelayakan_cond").innerHTML= "Tidak Layak";
                                                }if(score >= 0.66){
                                                    document.getElementById("kelayakan_cond").innerHTML= "Layak";
                                                }
                                            }
                                        }
                                    </script>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button id="close_pengajuan" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
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
                    <h5>Resume Analis</h5>
                    <button id="close_pengajuan" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('analisa/update_resume'); ?>" method="post" id="form_resume">
                    <div class="modal-body">                       
                        <input type="hidden" class="form-control" id="id_resume_analis" name="id_resume_analis">
                        <input type="hidden" class="form-control" id="id_lb" name="id_lb">
						<div class="row">
							<div class="col-3">
								<div class="nav flex-column nav-tabs" id="v-pills-tab" role="tablist" aria-orientation="vertical">
									<button class="nav-link active" id="v-pills-home-tab" data-toggle="tab" data-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">1</button>
									<button class="nav-link" id="v-pills-profile-tab" data-toggle="tab" data-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">2</button>
									<button class="nav-link" id="v-pills-messages-tab" data-toggle="tab" data-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">3</button>
									<button class="nav-link" id="v-pills-settings-tab" data-toggle="tab" data-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">4</button>
									<button class="nav-link" id="v-pills-catatan-tab" data-toggle="tab" data-target="#v-pills-catatan" type="button" role="tab" aria-controls="v-pills-catatan" aria-selected="false">5</button>
								</div>
							</div>
							<div class="col-9">
								<div class="tab-content" id="v-pills-tabContent">
									<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
										<div class="col-md-8 mb-3">
											<label for="tgl_survey_ulang" class="form-label">Tgl survey ulang</label>
											<input type="date" class="form-control" id="tgl_survey_ulang" name="tgl_survey_ulang">
										</div>
										<div class="col-md-8 mb-3">
											<label for="tgl_resume" class="form-label">Tgl resume dibuat</label>
											<input type="date" class="form-control" id="tgl_resume" name="tgl_resume">
										</div>
										<div class="col-md-8 mb-3">
											<label for="tujuan_penggunaan" class="form-label">Tujuan Penggunaan</label>
											<select class="form-control" aria-label="Default select example" id="tujuan_penggunaan" name="tujuan_penggunaan">
												<option value="Sektor Jasa">Sektor Jasa</option>
												<option value="Sektor Perdagangan">Sektor Perdagangan</option>
												<option value="Sektor Pertanian">Sektor Pertanian</option>
												<option value="Sektor Konsumtif">Sektor Konsumtif</option>
												<option value="Relaksasi Covid - 19">Relaksasi Covid - 19</option>
												<option value="Sektor Industri">Sektor Industri</option>
												<option value="Restrukturisasi">Restrukturisasi</option>
												<option value="Investasi">Investasi</option>
											</select>
										</div>
										<div class="col-md-8 mb-3">
											<label for="rekom_jangka_waktu" class="form-label">Rekomendasi jangka waktu(bulan)</label>
											<input type="number" class="form-control" id="rekom_jangka_waktu" name="rekom_jangka_waktu">
										</div>
									</div>
									<div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
										<div class="col-md-12 mb-3">
											<label for="survey_character" class="form-label">Hasil survey character</label>
											<textarea class="form-control" id="survey_character" name="survey_character"></textarea>
										</div>
										<div class="col-md-12 mb-3">
											<label for="survey_capacity" class="form-label">Hasil survey capacity</label>
											<textarea class="form-control" id="survey_capacity" name="survey_capacity"></textarea>
										</div>
										<div class="col-md-12 mb-3">
											<label for="survey_capital" class="form-label">Hasil survey capital</label>
											<textarea class="form-control" id="survey_capital" name="survey_capital"></textarea>
										</div>
										<div class="col-md-12 mb-3">
											<label for="survey_cashflow" class="form-label">Hasil survey cashflow</label>
											<textarea class="form-control" id="survey_cashflow" name="survey_cashflow"></textarea>
										</div>
										<div class="col-md-12 mb-3">
											<label for="survey_coe" class="form-label">Hasil survey condition of economy</label>
											<textarea class="form-control" id="survey_coe" name="survey_coe"></textarea>
										</div>
										<div class="col-md-12 mb-3">
											<label for="survey_collateral" class="form-label">Hasil survey collateral</label>
											<textarea class="form-control" id="survey_collateral" name="survey_collateral"></textarea>
										</div>
									</div>
									<div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
										<div class="col-md-12 mb-3">
											<label for="agunan" class="form-label">Agunan</label>
											<input type="text" class="form-control" id="agunan" name="agunan">
										</div>
										<div class="col-md-8 mb-3">
											<label for="rekom_bunga" class="form-label">Rekomendasi bunga</label>
											<input type="text" class="form-control" id="rekom_bunga" name="rekom_bunga" placeholder="18 % Flate Rate / Tahun">
										</div>
										<div class="col-md-8 mb-3">
											<label for="administrasi" class="form-label">Administrasi(%)</label>
											<input type="number" class="form-control" id="administrasi" name="administrasi" step="0.1" min="0" max="10">
										</div>
										<div class="col-md-8 mb-3">
											<label for="provisi" class="form-label">Provisi(%)</label>
											<input type="number" class="form-control" id="provisi" name="provisi" step="0.1" min="0" max="10">
										</div>
									</div>
									<div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
											<div class="col-md-8 mb-3">
												<label for="rekom_plafond" class="form-label">Rekomendasi plafond</label>
												<input type="number" class="form-control" id="rekom_plafond" name="rekom_plafond">
											</div><div class="col-md-8 mb-3">
											<label for="rekom_sistem_angsuran" class="form-label">Rekomendasi sistem angsuran</label>
											<select class="form-control" aria-label="Default select example" id="rekom_sistem_angsuran" name="rekom_sistem_angsuran">
												<option value="Pokok bunga tiap bulan">Pokok bunga tiap bulan</option>
												<option value="Pokok tiap 3 bulan bunga tiap bulan">Pokok tiap 3 bulan bunga tiap bulan</option>
												<option value="Pokok tiap 4 bulan bunga tiap bulan">Pokok tiap 4 bulan bunga tiap bulan</option>
												<option value="Pokok tiap 6 bulan bunga tiap bulan">Pokok tiap 6 bulan bunga tiap bulan</option>
												<option value="Pokok tiap 12 bulan bunga tiap bulan">Pokok tiap 12 bulan bunga tiap bulan</option>
												<option value="Pokok terakhir bunga tiap bulan">Pokok terakhir bunga tiap bulan</option>
												<option value="Pokok bunga terakhir">Pokok bunga terakhir</option>
												<option value="Musiman">Musiman</option>
												<option value="Anuitas">Anuitas</option>
												<option value="Efektif">Efektif</option>
											</select>
										</div>
										<div class="col-md-8 mb-3">
											<label for="rekom_pengikatan" class="form-label">Rekomendasi pengikatan</label>
											<input type="text" class="form-control" id="rekom_pengikatan" name="rekom_pengikatan">
										</div>
										<div class="col-md-8 mb-3">
											<label for="kesimpulan" class="form-label">Kesimpulan</label>
											<select class="form-control" aria-label="Default select example" id="kesimpulan" name="kesimpulan">
												<option value="LAYAK">LAYAK</option>
												<option value="TIDAK LAYAK">TIDAK LAYAK</option>
												<option value="LAYAK DENGAN CATATAN">LAYAK DENGAN CATATAN</option>
											</select>
										</div>
										<!-- <div class="col-md-8 mb-3">
											<label for="ktp" class="form-label">Fasilitas</label>
											<input type="text" class="form-control" id="ktp" name="ktp">
										</div> -->
										<!-- <div class="col-md-8 mb-3">
											<label for="ktp" class="form-label">Tempat</label>
											<input type="text" class="form-control" id="ktp" name="ktp">
										</div> -->
									</div>
									<div class="tab-pane fade" id="v-pills-catatan" role="tabpanel" aria-labelledby="v-pills-catatan-tab">
										<div class="col-md-12 mb-3">
											<label for="catatan1" class="form-label">Catatan 1</label>
											<textarea class="form-control" id="catatan1" name="catatan1"></textarea>
										</div>
										<div class="col-md-12 mb-3">
											<label for="catatan2" class="form-label">Catatan 2</label>
											<textarea class="form-control" id="catatan2" name="catatan2"></textarea>
										</div>
										<div class="col-md-12 mb-3">
											<label for="catatan3" class="form-label">Catatan 3</label>
											<textarea class="form-control" id="catatan3" name="catatan3"></textarea>
										</div>
										<div class="col-md-12 mb-3">
											<label for="catatan4" class="form-label">Catatan 4</label>
											<textarea class="form-control" id="catatan4" name="catatan4"></textarea>
										</div>
										<div class="col-md-12 mb-3">
											<label for="catatan5" class="form-label">Catatan 5</label>
											<textarea class="form-control" id="catatan5" name="catatan5"></textarea>
										</div>
										<div class="modal-footer">
											<button id="close_pengajuan" type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
											<button type="submit" class="btn btn-primary">Simpan</button>
										</div>
									</div>
								</div>
							</div>
						</div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        
        //skoring
        $('#close_pengajuan').on('click', function() {
                document.getElementById("form_pengajuan").reset();
            })
        
        $(document).ready(function() {

			//GET UPDATE skoring
			$('#show_data').on('click', '.item_edit', function() {
				var id = $(this).attr('data');
				$.ajax({
					type: "GET",
					url: "<?php echo base_url('analisa/get_pengajuan') ?>",
					dataType: "JSON",
					data: {
						id: id
					},
					success: function(data) {
						$.each(data, function(id_pengajuan,name_debitur,plafon, status,catatan,itk_nilai,
                        mu_nilai,kd_nilai,kk_nilai,as_nilai,ak_nilai,t_nilai,hpt_nilai,tk_nilai,jumlah,
                        pengUsa_nilai,admUsa_nilai,legal_nilai,tujUsa_nilai,tingPer_nilai,harPro_nilai,
                        sisPem_nilai,sisDis_nilai,kemBb_nilai,carP_nilai,prosP_nilai,mesP_nilai,
                        tenK_nilai,damSm_nilai,damEk_nilai,dampEma_nilai,damLi_nilai,kemBa_nilai,
                        pemLa_nilai,jumlah_capa,sumDs_nilai,sumDk_nilai,sumDl_nilai,jumlah_capi,
                        UsYd_nilai,serT_nilai,bpkb_nilai,market_nilai,jumlah_coll,kebP_nilai,ekoG_nilai,
                        jumlah_cond) {
							$('#scoring').modal('show');
							$('[name="id_pengajuan"]').val(data.id_pengajuan);
							$('[name="name_debitur"]').val(data.name_debitur);
							$('[name="plafon"]').val(data.plafon);
							$('[name="itk_nilai"]').val(data.itk_nilai);
                            $('[name="mu_nilai"]').val(data.mu_nilai);
                            $('[name="kd_nilai"]').val(data.kd_nilai);
                            $('[name="kk_nilai"]').val(data.kk_nilai);
                            $('[name="as_nilai"]').val(data.as_nilai);
                            $('[name="ak_nilai"]').val(data.ak_nilai);
                            $('[name="t_nilai"]').val(data.t_nilai);
                            $('[name="hpt_nilai"]').val(data.hpt_nilai);
                            $('[name="tk_nilai"]').val(data.tk_nilai);
                            $('[name="jumlah"]').val(data.jumlah);
                            $('[name="pengUsa_nilai"]').val(data.pengUsa_nilai);
                            $('[name="admUsa_nilai"]').val(data.admUsa_nilai);
                            $('[name="legal_nilai"]').val(data.legal_nilai);
                            $('[name="tujUsa_nilai"]').val(data.tujUsa_nilai);
                            $('[name="tingPer_nilai"]').val(data.tingPer_nilai);
                            $('[name="harPro_nilai"]').val(data.harPro_nilai);
                            $('[name="sisPem_nilai"]').val(data.sisPem_nilai);
                            $('[name="sisDis_nilai"]').val(data.sisDis_nilai);
                            $('[name="kemBb_nilai"]').val(data.kemBb_nilai);
                            $('[name="carP_nilai"]').val(data.carP_nilai);
                            $('[name="prosP_nilai"]').val(data.prosP_nilai);
                            $('[name="mesP_nilai"]').val(data.mesP_nilai);
                            $('[name="tenK_nilai"]').val(data.tenK_nilai);
                            $('[name="damSm_nilai"]').val(data.damSm_nilai);
                            $('[name="damEk_nilai"]').val(data.damEk_nilai);
                            $('[name="dampEma_nilai"]').val(data.dampEma_nilai);
                            $('[name="damLi_nilai"]').val(data.damLi_nilai);
                            $('[name="kemBa_nilai"]').val(data.kemBa_nilai);
                            $('[name="pemLa_nilai"]').val(data.pemLa_nilai);
                            $('[name="jumlah_capa"]').val(data.jumlah_capa);
                            $('[name="sumDs_nilai"]').val(data.sumDs_nilai);
                            $('[name="sumDk_nilai"]').val(data.sumDk_nilai);
                            $('[name="sumDl_nilai"]').val(data.sumDl_nilai);
                            $('[name="jumlah_capi"]').val(data.jumlah_capi);
                            $('[name="UsYd_nilai"]').val(data.UsYd_nilai);
                            $('[name="serT_nilai"]').val(data.serT_nilai);
                            $('[name="bpkb_nilai"]').val(data.bpkb_nilai);
                            $('[name="market_nilai"]').val(data.market_nilai);
                            $('[name="jumlah_coll"]').val(data.jumlah_coll);
                            $('[name="kebP_nilai"]').val(data.kebP_nilai);
                            $('[name="ekoG_nilai"]').val(data.ekoG_nilai);
                            $('[name="jumlah_cond"]').val(data.jumlah_cond);
						});
						$('#scoring').modal('hide');
					}
				});
				return false;
			});

        });

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
					url: "<?php echo base_url('analisa/get_resume') ?>",
					dataType: "JSON",
					data: {
						id: id
					},
					success: function(data) {
						$.each(data, function(id_resume ,id_lb) {
							$('#resume').modal('show');
							$('[name="id_resume_analis"]').val(data.id_resume_analis);
							$('[name="id_lb"]').val(data.id_lb);
							$('[name="tgl_survey_ulang"]').val(data.tgl_survey_ulang);
							$('[name="tgl_resume"]').val(data.tgl_resume);
							$('[name="tujuan_penggunaan"]').val(data.tujuan_penggunaan);
							$('[name="survey_character"]').val(data.survey_character);
							$('[name="survey_capacity"]').val(data.survey_capacity);
							$('[name="survey_capital"]').val(data.survey_capital);
							$('[name="survey_cashflow"]').val(data.survey_cashflow);
							$('[name="survey_coe"]').val(data.survey_coe);
							$('[name="survey_collateral"]').val(data.survey_collateral);
							$('[name="agunan"]').val(data.agunan);
							$('[name="rekom_plafond"]').val(data.rekom_plafond);
							$('[name="rekom_jangka_waktu"]').val(data.rekom_jangka_waktu);
							$('[name="rekom_bunga"]').val(data.rekom_bunga);
							$('[name="administrasi"]').val(data.administrasi);
							$('[name="provisi"]').val(data.provisi);
							$('[name="rekom_sistem_angsuran"]').val(data.rekom_sistem_angsuran);
							$('[name="rekom_pengikatan"]').val(data.rekom_pengikatan);
							$('[name="kesimpulan"]').val(data.kesimpulan);
							$('[name="catatan1"]').val(data.catatan1);
							$('[name="catatan2"]').val(data.catatan2);
							$('[name="catatan3"]').val(data.catatan3);
							$('[name="catatan4"]').val(data.catatan4);
							$('[name="catatan5"]').val(data.catatan5);
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
