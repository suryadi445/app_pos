<body class="hold-transition sidebar-mini">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 text-center">
                    <div class="col-sm-6">
                        <h1><?= $update; ?></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right text-capitalize">
                            <li class="breadcrumb-item"><a href="<?= base_url('administrator') ?>">Home</a></li>
                            <li class="breadcrumb-item active">update minuman</li>
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
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Minuman</h3>
                            </div>
                            <?= $this->session->flashdata('flash') ?>

                            <!-- /.card-header -->
                            <div class="card-body text-center text-capitalize">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Id Barang</th>
                                            <th>Nama Menu</th>
                                            <th>Harga Menu</th>
                                            <th>Gambar Menu</th>
                                            <th>Tanggal Update</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($admin as $adm) :
                                        ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $adm['id_menu']; ?></td>
                                                <td><?php echo $adm['nama_menu'] ?></td>
                                                <td><?php echo $adm['harga'] ?></td>
                                                <td><?php echo $adm['gambar'] ?></td>
                                                <td><?php echo $adm['data_update'] ?></td>
                                                <td>
                                                    <a class="btn btn-warning" href="<?= base_url() ?>administrator/update/<?= $adm['id_menu']; ?>">
                                                        <i class="fas fa-edit">
                                                            Update
                                                        </i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->



                    </div>
                </div>
            </div>F
        </section>
    </div>

</body>

</html>