<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">

            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('menu'); ?>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($query->result() as $row){
                        echo
                        "<tr>
                            <th scope='row'></th>
                            <td>" . $row->name . "</td>
                            <td>" . $row->role_id . "</td>
                            <td>
                            <a href='#' class='badge badge-success' data-toggle='modal' data-target='#edit' title='Edit' onClick=\"EditData('" . $row->id . "','" . $row->name . "','" . $row->email . "','" . $row->role_id . "','" . $row->is_active . "')\">edit</a>
                            <a class ='btn btn-danger' data-toggle='modal' data-target='#hapus' title='Hapus' onClick=\"HapusData('" . $row->id . "','" . $row->name . "','" . $row->email . "','" . $row->role_id . "','" . $row->is_active . "')\"><i class='fas fa-trash'></i></a>
                        </td>
                        </tr>"
                       
                    .$i++;
                    }
                        ?>
                </tbody>
            </table>


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
            <form action="<?= base_url('admin/role'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name" class="form-label">Nama</label>
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
        function EditData(id, name, email,password,role_id,is_active) {
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