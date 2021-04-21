<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Administrator</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= base_url('administrator') ?>">Home</a></li>
                                <li class="breadcrumb-item active">Project Update</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <form action="<?= base_url('administrator/update'); ?>" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Update Menu</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                            <i class="fas fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputName">Id Menu</label>
                                        <input type="text" name="id" class="form-control" value="<?= $admin['id_menu'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Nama Menu</label>
                                        <input type="text" name="nama_menu" class="form-control" value="<?= $admin['nama_menu'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Harga Menu</label>
                                        <input type="text" name="harga" class="form-control" value="<?= $admin['harga'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Gambar Menu</label>
                                        <input type="text" name="gambar" class="form-control" value="<?= $admin['gambar'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Tanggal Update</label>
                                        <input type="text" name="data_update" class="form-control" value="<?= $admin['data_update'] ?>">
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <div class="row text-left m-n3">
                        <div class="col-12">
                            <button type="reset" class="btn btn-danger m-2">Cancel</button>
                            <button type="submit" class="btn btn-success m-2">Update</button>
                        </div>
                    </div>
                </form>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->