<body class="bg-dark">
    <div class="container card bg-light mt-3 text-capitalize">
        <h2 class="text-center mt-2">Resto ABC</h2>
        <div class="col-md-12 mt-2">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-center">Daftar Admin dan User resto ABC</h5>
                </div>
                <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <p class="font-weight-bold text-danger">Data Gagal diubah</p>
                        <?= validation_errors() ?>
                    </div>
                <?php endif ?>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table">
                        <thead>
                            <tr class="text-center">
                                <th>no</th>
                                <th>nama</th>
                                <th>email</th>
                                <th>jabatan</th>
                                <th>tanggal bergabung</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($user as $usr) : ?>
                                <tr class="text-center">
                                    <td><?= $no++ ?></td>
                                    <td><?= $usr['name']; ?></td>
                                    <td><?= $usr['email']; ?></td>
                                    <td><?= $usr['role_id']; ?></td>
                                    <td><?= date("d-M-Y",  $usr['data_created']) ?></td>
                                    <td>
                                        <a class="btn text-warning edit_modal" data-toggle="modal" data-target="#staticBackdrop" data-name="<?= $usr['name']; ?>" data-email="<?= $usr['email']; ?>" data-role_id="<?= $usr['role_id']; ?>" data-password="<?= $usr['password']; ?>" data-id="<?= $usr['id']; ?>">
                                            <i class=" fas fa-edit"></i>
                                        </a>
                                        <a href="<?= base_url(); ?>administrator/deleteUser/<?= $usr['id'] ?>" class="hapus-data">
                                            <i class="fas fa-trash text-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card-body -->
            <!-- /.card -->
            <div class="text-right text-capitalize mb-2">
                <a href="<?php echo base_url('Administrator') ?>" class="text-decoration-none mr-1 btn btn-success">
                    <i class="fas fa-angle-double-left"></i>
                    Back
                </a>
            </div>
        </div>
    </div>
</body>



<!-- Modal -->
<div class="modal fade mt-5" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Update Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('administrator/updateProfile'); ?>" method="POST">
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control" name="id" id="edit_id">

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="edit_nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" id="edit_nama">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="edit_email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" id="edit_email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="edit_role" class="col-sm-2 col-form-label">Jabatan</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <select class="custom-select" id="inputGroupSelect01" name="role_id">
                                    <option selected> </option>
                                    <option value="1">Admin</option>
                                    <option value="2">Kasir</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="form-group row">
                        <label for="edit_role" class="col-sm-2 col-form-label">Role_id</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="role_id" id="edit_role">
                        </div>
                    </div> -->
                    <div class="form-group row">
                        <label for="edit_password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="password" id="edit_password">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                <button type="submit" id="update_profil" class="btn btn-success">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('.edit_modal').click(function() {
            var id = $(this).data('id')
            var name = $(this).data('name')
            var email = $(this).data('email')
            var role = $(this).data('role_id')
            $('#edit_id').val(id)
            $('#edit_nama').val(name)
            $('#edit_email').val(email)
            $('#edit_role').val(role)
        })
    })
</script>