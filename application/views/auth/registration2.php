<body class="hold-transition m-n5 regis register-page">
    <div class="register-box">
        <div class="register-logo">
            <p class="text-light font-weight-normal"><b>Registration</b></p>
        </div>

        <div class="card mb-n5">
            <div class="card-header bg-gradient-info">
                <p class="text-center pt-1 text-light text-capitalize">Register a new membership</p>
            </div>
            <div class="card-body register-card-body">

                <?= form_open_multipart('auth2/registration'); ?>
                <?= form_error('name', '<small class="text-danger">', '</small>') ?>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="name" placeholder="Full name" required value="<?= set_value('name') ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                <div class="input-group mb-3">
                    <input type="email" class="form-control" name="email" placeholder="Email" required value="<?= set_value('email') ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <?= form_error('password2', '<small class="text-danger">', '</small>') ?>
                <div class="input-group mb-3">
                    <input type="password" class="form-control col-12" name="password1" placeholder="Password" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <?= form_error('password2', '<small class="text-danger">', '</small>') ?>
                <div class="input-group mb-3">
                    <input type="password" class="form-control col-12" name="password2" placeholder="Retype password" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <!-- <input type="file" name="foto" required value="<?= set_value('foto') ?>"> -->
                    <input type="file" name="foto">
                </div>
                <div class=" row">
                    <!-- /.col -->
                    <div class="mx-auto mb-2">
                        <button type="submit" value="upload" class="btn btn-primary btn-block mb-1">Register</button>
                    </div>
                    <!-- /.col -->
                </div>
                <div class="text-right text-capitalize ">
                    <a href="<?php echo base_url('Administrator') ?>" class="text-decoration-none mr-1">
                        <i class="fas fa-angle-double-left"></i>
                        Back
                    </a>
                </div>

                <!-- </form> -->
                <?= form_close() ?>

            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->