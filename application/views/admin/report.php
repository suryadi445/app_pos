<body class="bg-dark">
    <div class="container card mt-4">
        <div>
            <h2 class="text-capitalize text-dark text-center mt-2">laporan Keuangan resto ABC</h2>
        </div>
        <div class="col-12 m-auto mt-lg-3">
            <div class="card border-0">
                <div class="card-header">
                    <div class="form-group row">
                        <h2 class="col-form-label text-bold text-secondary col-9">Laporan Keuangan</h2>
                        <div id="flash" data-flash="<?= $this->session->flashdata('flash'); ?>"></div>
                        <div id="flash_false" data-flash="<?= $this->session->flashdata('flash2'); ?>"></div>

                        <div class="col-md-3">
                            <input type="text" class="form-control text-center font-weight-bold sales_harian" name="tanggal" id="tanggal" placeholder="Pilih tanggal transaksi">
                        </div>
                    </div>
                    <div class="row ">
                        <span class="col-11  text-left text-bold text-secondary"><?= date('l, Y-m-d');  ?></span>
                        <div class="ml-3 mr-2">
                            <div class="dropdown" id="download">
                                <a class="btn btn-info dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-save"></i>
                                    Export
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item text-danger" href="<?= base_url('administrator/pdf'); ?>">
                                        <i class="fas fa-file-pdf mr-2"></i>PDF
                                    </a>
                                    <a class="dropdown-item text-primary" href="<?= base_url('administrator/excel'); ?>">
                                        <i class="fas fa-file-excel mr-2"></i>EXCEL
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="mr-2">
                            <a href="<?= base_url('administrator/report'); ?>" class="btn btn-danger" id="print">
                                <i class="fas fa-print"></i>
                                Print
                            </a>
                        </div>
                        <div class="mr-2">
                            <a href="<?= base_url('administrator/hapus_db'); ?>" class="btn btn-danger" id="hapus_db">
                                <i class="fas fa-exclamation-circle"></i>
                                Hapus
                            </a>
                        </div>
                        <div>
                            <button class=" btn btn-primary" id="semua_data">
                                <i class="fas fa-bookmark"></i>
                                Tampilkan semua data
                            </button>
                        </div>
                    </div>

                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap text-dark text-center">
                        <thead class="">
                            <tr>
                                <th>No.</th>
                                <th>Kasir</th>
                                <th>Nama Menu</th>
                                <th>Nomor Transaksi</th>
                                <th>Jumlah Terjual</th>
                                <th>Harga Pesanan</th>
                            </tr>
                        </thead>
                        <tbody class="text-capitalize text-center" id="transaksi_harian">
                            <!-- looping json -->
                            <?php $no = 1; ?>
                            <?php foreach ($reports as $r) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $r['id_kasir'] ?></td>
                                    <td><?= $r['nama_menu'] ?></td>
                                    <td><?= $r['no_transaksi'] ?></td>
                                    <td><?= $r['qty'] ?></td>
                                    <td><?= 'Rp. ' . number_format($r['harga_pesanan'], 0, '.', '.') ?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                        <tfoot id="total_harga_harian">
                            <tr class="bg-gradient-light">
                                <td class="text-bold text-capitalize text-left" colspan="5">total Pendapatan</td>
                                <td class="text-center text-bold"><?= 'Rp. ' . number_format($total_harga['grand_total'], 0, '.', '.'); ?></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <div class="text-right text-capitalize" id="kembali">
                <a href="<?php echo base_url('Administrator') ?>" class="text-decoration-none btn btn-success mb-3">
                    <i class="fas fa-angle-double-left mr-1"></i>
                    kembali
                </a>
            </div>
            <!-- /.card -->
        </div>
        <!-- </div> -->
    </div>

    <script>
        $('document').ready(function() {
            // var print_content = print_content(print_show)
            $('#print').click(function() {
                // alert('oke');
                $('#print').hide()
                $('#download').hide()
                $('#tanggal').hide()
                $('#kembali').hide()
                $('#semua_data').hide()
                $('#hapus_db').hide()
                print();
                $('#print').show()
                $('#download').show()
                $('#tanggal').show()
                $('#kembali').show()
                $('#semua_data').show()
                $('#hapus_db').show()
            });
        })
    </script>

    <script>
        $(document).ready(function() {
            $('#semua_data').hide();

            $("#tanggal").datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true,
            })
            $('#tanggal').change(function() {
                var tanggal = $('#tanggal').val();
                // input.val(formatRupiah($(input).val(), 'Rp. '));
                $.ajax({
                    url: '<?= base_url('administrator/data_harian'); ?>',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        tanggal: tanggal
                    },
                    success: function(data) {
                        if (data == "") {
                            var kosong =
                                '<tr>' +
                                '<td class="text-danger">' + "data tidak tersedia" + '</td>' +
                                '</tr>'
                            $('#transaksi_harian').html(kosong)
                        } else {
                            var baris = '';
                            var no = 1;
                            var i;
                            for (i = 0; i < data.length; i++) {
                                baris +=
                                    '<tr>' +
                                    '<td>' + no++ + '</td>' +
                                    '<td>' + data[i].id_kasir + '</td>' +
                                    '<td>' + data[i].nama_menu + '</td>' +
                                    '<td>' + data[i].no_transaksi + '</td>' +
                                    '<td>' + data[i].qty + '</td>' +
                                    '<td>' +
                                    'Rp. ' + (new Intl.NumberFormat("id-ID").format(data[i].harga_pesanan)) +
                                    '</td>' +
                                    '</tr>';
                            }
                            // return false
                            $('#transaksi_harian').html(baris)
                            $('#semua_data').show();
                        }
                    }
                })
            })
            $('.sales_harian').change(function() {
                var sales_harian = $('#total_harga_harian').html()
                var tanggal = $('#tanggal').val();
                $.ajax({
                    url: '<?= base_url('administrator/sales_harian'); ?>',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        tanggal: tanggal
                    },
                    success: function(data) {
                        // console.log(data);
                        if (data == 0) {
                            var kosong =
                                '<tr class="bg-gradient-light">' +
                                '<td class="text-bold text-capitalize text-left" colspan="5">' + "total harga" + '</td>' +
                                '<td class="text-center text-danger text-bold">' + "Tidak ada transaksi" + '</td>' +
                                '</tr>';
                            $('#total_harga_harian').html(kosong);
                            $('#semua_data').show();
                        } else {
                            baris = '';
                            baris +=
                                '<tr class="bg-gradient-light">' +
                                '<td class="text-bold text-capitalize text-left" colspan="5">' + "total harga" + '</td>' +
                                '<td class="text-center text-bold">' + 'Rp. ' + data + '</td>' +
                                '</tr>';
                            $('#total_harga_harian').html(baris)
                        }
                    },
                })
            })
        })

        $('#semua_data').click(function() {
            location.reload()
        })

        $(document).ready(function() {
            $('#hapus_db').click(function(e) {
                e.preventDefault();
                var link = $(this).attr('href');
                Swal.fire({
                    title: 'Apakah anda sudah backup data anda?',
                    // text: "Apakah anda sudah backup data anda?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#00a65a',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Sudah!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: 'Peringatan!!!',
                            text: "Data yang sudah dihapus tidak akan bisa dikembalikan",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#00a65a',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, Hapus!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location = link;
                            }
                        })
                    }
                })
            })
        })
    </script>