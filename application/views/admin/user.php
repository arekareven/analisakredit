<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-10">

            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('menu'); ?>
            <p>Keterangan : </p>
            <p>Role 1 = Admin, Role 2 = AO</p>
            <p>Role 3 = Analis, Role 4 = Approval</p>
            <p>Role 5 = Tester</p>
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($query->result() as $row) {
                                    echo
                                    "<tr>
                            <th scope='row'>" . $i . "</th>
                            <td>" . $row->name . "</td>
                            <td>" . $row->role_id . "</td>
                            <td>
                                <a class='btn btn-success btn-circle' data-toggle='modal' data-target='#edit' title='Edit' onClick=\"EditData('" . $row->id . "','" . $row->name . "','" . $row->email . "','" . $row->role_id . "','" . $row->is_active . "')\"><i class='fas fa-edit'></i></a>
                                <a class ='btn btn-danger btn-circle' data-toggle='modal' data-target='#hapus' title='Hapus' onClick=\"HapusData('" . $row->id . "','" . $row->name . "','" . $row->email . "','" . $row->role_id . "','" . $row->is_active . "')\"><i class='fas fa-trash'></i></a>
                            </td>
                        </tr>";
                                    $i++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal add menu -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="modalNewRoleLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalNewRoleLabel">Add New Role</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('admin/edit_role'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name" class="form-label">Nama</label>
                        <input type="hidden" class="form-control" id="id" name="id">
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="role_id" class="form-label">Role</label>
                        <input type="text" class="form-control" id="role_id" name="role_id">
                    </div>
                    <div class="form-group">
                        <label for="is_active" class="form-label">Aktif</label>
                        <input type="text" class="form-control" id="is_active" name="is_active">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    function EditData(id, name, email, role_id, is_active) {
        document.getElementById('id').value = id;
        document.getElementById('name').value = name;
        document.getElementById('email').value = email;
        document.getElementById('role_id').value = role_id;
        document.getElementById('is_active').value = is_active;
    }

    function HapusData(idt) {
        document.getElementById('idt2').value = idt;
    }
</script>