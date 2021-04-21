<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Delete Menu</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= base_url('administrator') ?>">Home</a></li>
                                <li class="breadcrumb-item active">Delete</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-danger">
                                <div class="card-header">
                                    <h3 class="card-title">Hapus Data</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row mt-4">
                                        <div class="col-sm-4">
                                            <div class="position-relative">
                                                <a href="<?= base_url('administrator/delete_makanan') ?>"><img src="<?= base_url('assets/docs/assets/img/makanan.jpg') ?>" alt="makanan" class="img-fluid">
                                                    <div class="ribbon-wrapper ribbon-lg">
                                                        <div class="ribbon bg-success text-lg">
                                                            Food
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="position-relative">
                                                <a href="<?= base_url('administrator/delete_minuman') ?>"><img src="<?= base_url('assets/docs/assets/img/minuman.jpg') ?>" alt="Photo 2" class="img-fluid">
                                                    <div class="ribbon-wrapper ribbon-lg">
                                                        <div class="ribbon bg-warning text-lg">
                                                            Drink
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="position-relative" style="min-height: 180px;">
                                                <a href="<?= base_url('administrator/delete_dessert') ?>"><img src="<?= base_url('assets/docs/assets/img/dessert.jpg') ?>" alt="Photo 3" class="img-fluid">
                                                    <div class="ribbon-wrapper ribbon-lg">
                                                        <div class="ribbon bg-danger text-lg">
                                                            Dessert
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- ./wrapper -->
</body>

</html>