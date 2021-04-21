<!-- setelah login -->

<body class="bg-light mt-3">
    <div id="awal_kasir">
        <div class="mt-2 text-center card bg-light ml-4 mr-4 ">
            <h1 class="">Resto ABC</h1>
            <p class="">jalan abc. jakarta</p>
            <p class="">08121212121</p>

            <div class="text-left ml-3 col-sm-12 mb-2 text-capitalize ">
                <a href="<?php echo base_url('user/session') ?>" class="btn btn-primary" id="tambah_transaksi">
                    <i class="fas fa-user-check"></i>
                    Mulai Kasir
                </a>
                <!-- </div> -->
                <!-- <div class="text-right text-capitalize "> -->
                <a href="<?php echo base_url('Auth2/logout') ?>" class="btn btn-danger" id="lanjut_transaksi">
                    <i class="fas fa-shopping-cart"></i>
                    Keluar</a>
            </div>
            <!-- <div class="row col-12"> -->
            <div class="mb-2">
                <div class="col-sm-12 ml-3 text-left">
                    <h4 class="pt-2 text-dark text-capitalize">Selamat Datang <?= $user['name']; ?></h4>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <!-- </div> -->
            <div class="row m-3">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-wallet"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Sales Kemarin</span>
                            <span class="info-box-number">
                                <small>Rp.</small>
                                <?= number_format($sales_kemarin['harga'], 0, '.', '.'); ?>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-purple elevation-1"><i class="fas fa-hand-holding-usd"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Transaksi Kemarin</span>
                            <span class="info-box-number"><?= $transaksi_kemarin; ?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>

                <!-- <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Target Sales</span>
                            <span class="info-box-number"><small>Rp.</small> 35000000</span>
                        </div>
                    </div>
                </div> -->
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-red elevation-1"><i class="fas fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Jumlah Karyawan</span>
                            <span class="info-box-number"><?= $jumlah_karyawan; ?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Main content -->
            <!-- <div class="content m-3"> -->
            <div class="ml-4 mr-4">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header bg-primary">
                                <h4 class="text-center text-bold text-light">Daftar Menu Resto ABC</h4>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body text-center text-capitalize">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead class="thead bg-info">
                                        <tr>
                                            <th>No</th>
                                            <th>Id Barang</th>
                                            <th>Nama Menu</th>
                                            <th>Harga Menu</th>
                                            <!-- <th>Gambar Menu</th> -->
                                            <!-- <th>Tanggal Update</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1 ?>
                                        <?php foreach ($all as $menu) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $menu['id_menu']; ?></td>
                                                <td><?= $menu['nama_menu']; ?></td>
                                                <td><?= 'Rp. ' . number_format($menu['harga'], 0, '.', '.'); ?></td>
                                                <!-- <td><?= $menu['name']; ?></td> -->
                                                <!-- <td><?= $menu['name']; ?></td> -->
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
</body>

<script>
    // var tambah_transaksi = $('#tambah_transaksi');
    // var lanjut_transaksi = $('#lanjut_transaksi');

    // $(window).ready(function() {
    //     // $('#awal_kasir').load(function() {
    //     // alert('oke')
    //     $('#tambah_transaksi').show();
    //     $('#lanjut_transaksi').hide();
    //     // })
    // })
</script>