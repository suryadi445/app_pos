<!-- !<body class="bg-light"> -->
<!-- !<div class="mt-2 card bg-light ml-4 mr-4 mt-3 "> -->
<!-- !setelah pembayaran -->
<!-- !<div class="container mt-2 text-capitalize" id="kertas_print"> -->
<div class="col-md-6 m-auto">
    <div class="card text-capitalize">
        <input type="hidden" name="bill" id="bill" value="<?= $result; ?>">
        <!-- <div class="card-header">
                    <h3 class="card-title text-bold">Admin</h3>
                </div> -->
        <!-- /.card-header -->
        <div class="card-body p-0">
            <table class="table">
                <h4 class="text-center mt-2" id="resto">Resto ABC</h4>
                <p class="text-center mt-2">jalan abc. jakarta</p>
                <p class="text-center mt-2">08121212121</p>
                <tr>
                    <p class="ml-4"><?= $user['name']; ?>, <?= date('d-m-Y h:i:sa') ?> </p>
                    <p class="ml-4"> bill number : <?= rand(0000, 9999) ?>.<?= rand(0000, 9999) ?>.<?= $result; ?></p>
                </tr>
                <thead>
                    <tr>
                        <th>Menu</th>
                        <th class="text-center">Jumlah</th>
                        <th class="text-right">Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($bill as $struk) : ?>
                        <tr>
                            <td><?= $struk['nama_menu']; ?></td>
                            <td class="text-center"><?= $struk['qty']; ?></td>
                            <td class="text-right">
                                <?= 'Rp. ' . number_format($struk['harga_pesanan'], 0, '.', '.') ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tr>
                    <td class="text-bold">Total</td>
                    <td class="text-center text-bold"><?= $qty->qty; ?></td>
                    <td class="text-bold text-right" id="total_bill">
                        <?= 'Rp. ' ?>
                        <?= (!empty($total)) ? $total : '0'; ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="text-bold">Bayar</td>
                    <td class="text-bold text-right">
                        <?= 'Rp. ' ?>
                        <?= (!empty($bayar)) ? $bayar : '0'; ?>
                </tr>
                <tr>
                    <td colspan="2" class="text-bold">Kembali</td>
                    <td class="text-bold text-right" id="kembali_bill">
                        <?= 'Rp. ' ?>
                        <?= (!empty($kembali)) ? $kembali : '0'; ?>


                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
</div>
<div class="mb-2 text-capitalize text-center">
    <!-- <div class="text-right text-capitalize "> -->
    <a href="<?php echo base_url('user/session/' . $result) ?>" class="btn btn-success" id="lanjut_transaksi">
        <i class="fas fa-shopping-cart"></i>
        lanjut transaksi</a>
</div>
<!-- !</div> -->
<!-- /.container-fluid -->
<!-- !</body> -->

<script>
    $(document).ready(function() {
        var lanjut_transaksi = $('#lanjut_transaksi');
        $(lanjut_transaksi).click(function() {
            $('.bg-light').hide()
            $('#kertas_print').show()
            // !print() dihidupkan kembali
            // print()
        })
    })
</script>