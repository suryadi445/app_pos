<body class="bg-dark">
    <div class="container card mt-4">
        <div>
            <h2 class="text-capitalize text-dark text-center">laporan penjualan resto ABC</h2>
        </div>
        <div class="col-12 m-auto mt-lg-3">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-bold text-secondary">Laporan penjualan</h3>
                    <p class="text-left text-bold text-danger">21/21/21</p>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-bordered text-secondary col-md-8 float-left">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Menu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($menu as $stock) : ?>
                                <tr>
                                    <th scope="row"><?= $no++; ?></th>
                                    <div class="row">
                                        <td><?= $stock['nama_menu']; ?></td>
                                    </div>
                                </tr>
                            <?php endforeach ?>
                            <tr>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-borderless  text-secondary col-md-4 float-right">
                        <thead>
                            <tr class="border-bottom">
                                <th>Jumlah Terjual</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr class="border-bottom">
                                <td>
                                    <?php if ($ayam_bakar['jumlah'] == null) {
                                        echo 0;
                                    } ?><?= $ayam_bakar['jumlah']; ?></td>
                            </tr>
                            <tr class="border-bottom">
                                <td>
                                    <?php if ($ayam_goreng['jumlah'] == null) {
                                        echo 0;
                                    } ?><?= $ayam_goreng['jumlah']; ?></td>
                            </tr>
                            <tr>
                                <td class="border-bottom">
                                    <?php if ($bebek_bakar['jumlah'] == null) {
                                        echo 0;
                                    } ?><?= $bebek_bakar['jumlah']; ?></td>
                            </tr>
                            <tr>
                                <td class="border-bottom">
                                    <?php if ($bebek_goreng['jumlah'] == null) {
                                        echo 0;
                                    } ?><?= $bebek_goreng['jumlah']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <div class="text-right text-capitalize ">
                <a href="<?php echo base_url('Administrator') ?>" class="text-decoration-none btn btn-success mb-3">
                    <i class="fas fa-angle-double-left mr-1"></i>
                    kembali
                </a>
            </div>
            <!-- /.card -->
        </div>
        <!-- </div> -->
    </div>