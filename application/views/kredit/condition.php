<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800"><?= $title; ?></h1>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#capital">
        Add
    </button>

    <hr>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Kekuatan</th>
                <th scope="col">Kelemahan</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($query->result() as $row) {
                echo "<tr>
                        <td>" . $row->kekuatan . "</td>
                        <td>" . $row->kelemahan . "</td>                  
                        <td><a href='condition/templateword?id_con=" . $row->id_con . "' class ='btn btn-success' title='Next'>Next</a>
                        </td>							
                    </tr>";
            }
            ?>
        </tbody>
    </table>


    <!-- Modal capital -->
    <div class="modal fade" id="capital" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Input Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('condition/add'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="kekuatan" class="col-sm-2 col-form-label">Kekuatan</label>
                            <div class="col-sm-10">
                                <input type="hidden" class="form-control" id="id_lb" name="id_lb" value="<?php echo $id_lb; ?>">
                                <textarea class="form-control" id="kekuatan" name="kekuatan"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kelemahan" class="col-sm-2 col-form-label">Kelemahan</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="kelemahan" name="kelemahan"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="peluang" class="col-sm-2 col-form-label">Peluang</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="peluang" name="peluang"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ancaman" class="col-sm-2 col-form-label">Ancaman</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="ancaman" name="ancaman"></textarea>
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

</div>
<!-- End of Main Content -->