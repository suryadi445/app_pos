<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        table {
            text-align: center;
        }
    </style>
</head>

<body>
    <center>
        <h2>Laporan Transaksi Penjualan</h2>
    </center>

    <table border="1" cellpadding="10" width="100%">
        <thead>
            <tr>
                <th>No.</th>
                <th>Kasir</th>
                <th>Nama Menu</th>
                <th>Nomor Transaksi</th>
                <th>Jumlah Terjual</th>
                <th>Harga Pesanan</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($transaksi as $t) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $t['id_kasir'] ?></td>
                    <td><?= $t['nama_menu'] ?></td>
                    <td><?= $t['no_transaksi'] ?></td>
                    <td><?= $t['qty'] ?></td>
                    <td><?= $t['harga_pesanan'] ?></td>
                </tr>
            <?php endforeach ?>

        </tbody>
    </table>
</body>

</html>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>