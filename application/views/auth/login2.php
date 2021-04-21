<body class="hold-transition sidebar-mini layout-fixed gambar">
    <div class="wrapper">

        <!-- <body class="hold-transition  login-page"> -->
        <div class="login-box bg-secondary mx-auto mt-5 ">
            <!-- <div class="login-logo bg-danger"> -->
            <p class="login-logo"><b>Login</b>Page</p>
            <!-- </div> -->

            <!-- /.login-logo -->
            <div class="card text-center">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Sign in to start your session</p>
                    <div id="flash" data-flash="<?= $this->session->flashdata('flash'); ?>"></div>
                    <div id="flash_false" data-flash="<?= $this->session->flashdata('flash2'); ?>"></div>

                    <form action="<?= base_url('auth2') ?>" method="post">
                        <div class="input-group ">
                            <input type="email" class="form-control" placeholder="Email" name="email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                        <br>
                        <div class="input-group">
                            <input type="password" class="form-control" placeholder="Password" name="password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                        <br>
                        <div class="row">
                            <!-- /.col -->
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary justify-content-lg-center">Sign In</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
        <!-- /.login-box -->