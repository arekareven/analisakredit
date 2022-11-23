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
                            <th scope="col">Plafond</th>
                            <th scope="col">Status</th>
                            <th scope="col">Catatan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($query->result() as $row) {//ambil data dari DB latar_belakang, file 
                            /*
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
                            $user = $this->db->query("SELECT * FROM USER WHERE email='$row->user'");
                            foreach ($user->result() as $cek){
                                $nama=$cek->name;
                            }
                            */
                            echo "<tr>
                        <td>" . $row->nama_ao . "</td>
                        <td>" . $row->nama_debitur . "</td>                     
                        <td>" .number_format($row->plafon) . "</td>                     
                        <td>".$row->status."</td>                     
                        <td>".$row->catatan."</td>                     
                        <td><h5>
                            <a href='pdf_all?id_lb=".$row->id_lb."' target='_blank' class='btn btn-success btn-circle' title='Lihat'><i class='fas fa-eye'></i></a>
                            <a href='#' class='btn btn-warning btn-circle' data-toggle='modal' data-target='#edit' onClick=\"EditData('" . $row->id_pengajuan . "','" . $row->nama_debitur . "','" . $row->plafon . "','" . $row->status . "','" . $row->catatan . "')\"><i class='fas fa-edit'></i></a>
                            <a href='#' class='btn btn-primary btn-circle' data-toggle='modal' data-target='#scoring' onClick=\"AddDataScoring('" . $row->id_pengajuan . "')\"><i class='fas fa-percent'></i></a>
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

    <!-- Modal edit-->
    <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Review</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('analisa/update_pengajuan'); ?>" method="post">
                    <div class="modal-body">
                        <input type="hidden" class="form-control" id="id_pengajuan" name="id_pengajuan">
                        <input type="hidden" class="form-control" id="name_debitur" name="name_debitur">
                        <input type="hidden" class="form-control" id="plafon" name="plafon">
                        <div class="col-md-5 mb-4">
                            <label for="status" class="form-label">Status</label>
                            <select class="custom-select" id="status" name="status">
                                <option>Direkomendasi</option>
                                <option>Revisi</option>
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
    
    <!-- Modal skoring-->
    <div class="modal fade" id="scoring" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('analisa/add_scoring'); ?>" method="post">
                    <div class="modal-body">                        
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
                                        <select class="custom-select" id="itk_nilai" onchange="math()">
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
                                        <select class="custom-select" id="mu_nilai" onchange="math()">
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
                                        <select class="custom-select" id="kd_nilai" onchange="math()">
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
                                        <select class="custom-select" id="kk_nilai" onchange="math()">
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
                                        <select class="custom-select" id="as_nilai" onchange="math()">
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
                                        <select class="custom-select" id="ak_nilai" onchange="math()">
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
                                        <select class="custom-select" id="t_nilai" onchange="math()">
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
                                        <select class="custom-select" id="hpt_nilai" onchange="math()">
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
                                        <select class="custom-select" id="tk_nilai" onchange="math()">
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
                                    <th id="jumlah"></th>
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
                                        <select class="custom-select" id="pengUsa_nilai" onchange="math_capa()">
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
                                        <select class="custom-select" id="admUsa_nilai" onchange="math_capa()">
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
                                        <select class="custom-select" id="legal_nilai" onchange="math_capa()">
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
                                        <select class="custom-select" id="tujUsa_nilai" onchange="math_capa()">
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
                                        <select class="custom-select" id="tingPer_nilai" onchange="math_capa()">
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
                                        <select class="custom-select" id="harPro_nilai" onchange="math_capa()">
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
                                        <select class="custom-select" id="sisPem_nilai" onchange="math_capa()">
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
                                        <select class="custom-select" id="sisDis_nilai" onchange="math_capa()">
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
                                        <select class="custom-select" id="kemBb_nilai" onchange="math_capa()">
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
                                    <th>Sub Jumlah</th>
                                    <th id="jumlah_capa"></th>
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
                                            if(a && b && c && d && e && f && g && h && i){
                                                var jml = a+b+c+d+e+f+g+h+i;
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
                                        <select class="custom-select" id="sumDs_nilai" onchange="math_capi()">
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
                                        <select class="custom-select" id="sumDk_nilai" onchange="math_capi()">
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
                                        <select class="custom-select" id="sumDl_nilai" onchange="math_capi()">
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
                                    <th id="jumlah_capi"></th>
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
                                        <select class="custom-select" id="UsYd_nilai" onchange="math_coll()">
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
                                        <select class="custom-select" id="serT_nilai" onchange="math_coll()">
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
                                        <select class="custom-select" id="bpkb_nilai" onchange="math_coll()">
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
                                        <select class="custom-select" id="market_nilai" onchange="math_coll()">
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
                                    <th id="jumlah_coll"></th>
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
                                                }if(score ==2){
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
                                        <select class="custom-select" id="kebP_nilai" onchange="math_cond()">
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
                                        <select class="custom-select" id="ekoG_nilai" onchange="math_cond()">
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
                                    <th id="jumlah_cond"></th>
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
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function EditData(id_pengajuan,nama_debitur,plafon, status, catatan) {
            document.getElementById('id_pengajuan').value = id_pengajuan;
            document.getElementById('name_debitur').value = nama_debitur;
            document.getElementById('plafon').value = plafon;
            document.getElementById('status').value = status;
            document.getElementById('catatan').value = catatan;
        }
    </script>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->