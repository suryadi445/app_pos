<body class="content-wrapper">
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark elevation-4 text-center position-fixed">
        <div class="sidebar user-panel mt-4 ">
            <div class="info">
                <a href="" class="d-block text-white text-capitalize mt-2"><?= $user['name'] ?></a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-3 ">
            
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Sidebar -->
                <form action="" method="post" name="jumlah">
                    <div class="d-inline mt-3">
                        <input type="text" name="qty" id="qty" class="form-control col col-10 m-auto text-dark bg-light text-bold rupiah">
                        <section class="mt-1">
                            <button type="button" value="1" class="btn button-cyan col col-5 m-1 klik">1</button>
                            <button type="button" value="2" class="btn button-cyan col col-5 m-1 klik">2</button>
                            <button type="button" value="3" class="btn button-cyan col col-5 m-1 klik">3</button>
                            <button type="button" value="4" class="btn button-cyan col col-5 m-1 klik">4</button>
                            <button type="button" value="5" class="btn button-cyan col col-5 m-1 klik">5</button>
                            <button type="button" value="6" class="btn button-cyan col col-5 m-1 klik">6</button>
                            <button type="button" value="7" class="btn button-cyan col col-5 m-1 klik">7</button>
                            <button type="button" value="8" class="btn button-cyan col col-5 m-1 klik">8</button>
                            <button type="button" value="9" class="btn button-cyan col col-5 m-1 klik">9</button>
                            <button type="button" value="0" class="btn button-cyan col col-5 m-1 klik">0</button>
                        </section>
                    </div>
                </form>
                <div class=" sidebar user-panel mt-2">
                    <!-- garis pembatas -->
                </div>

                <div class="mt-2">
                    <button id="hapus" class="btn btn-yellow text-capitalize col col-11 m-1">clear</button>
                    <button id="reset_qty" class="btn btn-success text-capitalize col col-11 m-1">Reset</button>
                    <button type="button" id="cash" class="btn btn-primary text-capitalize col col-11 m-1" data-toggle="modal" data-target="#modal-xl">Cash</button>
                </div>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
    <!-- akhir sidebar -->

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">KASIR</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <!-- <li class="breadcrumb-item"><a href="#">Home</a></li> -->
                            <a href="<?= base_url('auth2/logout/') ?>" id="logout_user" class="breadcrumb-item">
                                <p>
                                    Logout
                                </p>
                            </a>
                            <li class="breadcrumb-item active"><?= $user['name']; ?></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header border-0"></div>
                            <div class="card-body text-capitalize m-auto">
                                <h1 class="text-center">Menu</h1>
                                <input type="hidden" name="transaksi" id="transaksi" value="<?= $transaksi ?>">
                                <div class="row" id="reload1">
                                    <?php if (!empty($menu)) { ?>
                                        <?php foreach ($menu as $key => $value) { ?>
                                            <div class="col-md-3 mt-3">
                                                <button onclick="proses_menu('<?= $value->id_menu; ?>')" class="btn btn-menu text-capitalize mr-1 btn-block btn-lg w-100 h-100">
                                                    <?= $value->nama_menu; ?>
                                                </button>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>
                                </div>
                                <div class="position-relative mb-4">
                                    <canvas id="visitors-chart" height="400"></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col-md-6 -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header border-0"></div>
                            <div class="card-body text-center text-capitalize">
                                <h1>harga</h1>
                                <!-- <div> -->
                                <table id="list-data" class="table nowrap table-responsive-lg table-striped table-bordered text-center" width="100%">
                                    <thead>
                                        <tr class="bg-dark">
                                            <th>No.</th>
                                            <th>Nama Menu</th>
                                            <th>Jumlah</th>
                                            <th>Harga</th>
                                            <th>Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody id="reload2">
                                        <!-- looping JS -->
                                    </tbody>
                                </table>
                                <table class="table table-striped table-bordered">
                                    <tr>
                                        <th colspan="4" width="50%">Total</th>
                                        <th id="grand_total">
                                            <!-- <small>Rp.</small> -->
                                            <?= 'Rp ' ?>
                                            <?= (!empty($total)) ? $total : '0'; ?>
                                        </th>
                                    </tr>
                                </table>
                                <!-- </div> -->
                                <div class="position-relative mb-4">
                                    <canvas id="sales-chart" height="300"></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->

                    </div>
                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
    </div>
    <!-- /.content-wrapper -->


    <div class="modal fade" id="modal-xl" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Masukkan nominal uang belanja</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body row justify-content-between">
                    <div class=" card col-6 ml-3">
                        <div class="mt-3 mb-3">
                            <form action="" method="post">
                                <div class="d-inline mt-3">
                                    <input type="text" id="qty_modal" class="form-control col col-12 m-auto text-dark bg-light text-bold rupiah" placeholder="0">
                                    <div class="btn-group col-12 mt-2">
                                        <button type="button" value="1" class="btn btn-info rounded col-3 mr-1 btn_modal">1</button>
                                        <button type="button" value="2" class="btn btn-info rounded col-3 mr-1 btn_modal">2</button>
                                        <button type="button" value="3" class="btn btn-info rounded col-3 mr-1 btn_modal">3</button>
                                        <button type="button" id="hapus_modal" class="btn btn-danger rounded-0 col-3 mr-1">Clear</button>
                                    </div>
                                    <div class="btn-group col-12 mt-2">
                                        <button type="button" value="4" class="btn btn-info rounded col-3 mr-1 btn_modal">4</button>
                                        <button type="button" value="5" class="btn btn-info rounded col-3 mr-1 btn_modal">5</button>
                                        <button type="button" value="6" class="btn btn-info rounded col-3 mr-1 btn_modal">6</button>
                                        <button type="reset" id="reset_modal" class="btn btn-warning rounded-0 col-3 mr-1">Reset</button>
                                    </div>
                                    <div class="btn-group col-12 mt-2">
                                        <button type="button" value="7" class="btn btn-info rounded col-3 mr-1 btn_modal">7</button>
                                        <button type="button" value="8" class="btn btn-info rounded col-3 mr-1 btn_modal">8</button>
                                        <button type="button" value="9" class="btn btn-info rounded col-3 mr-1 btn_modal">9</button>
                                        <button type="button" class="btn btn-white rounded-0 col-3 mr-1"></button>
                                    </div>
                                    <div class="btn-group col-12 mt-2">
                                        <button type="button" value="0" class="btn btn-info rounded col-3 mr-1 kosong btn_modal">0</button>
                                        <button type="button" value="00" class="btn btn-info rounded col-3 mr-1 kosong btn_modal">00</button>
                                        <button type="button" value="000" class="btn btn-info rounded col-3 mr-1 kosong btn_modal">000</button>
                                        <button type="button" class="btn btn-white rounded-0 col-3 mr-1"></button>
                                    </div>
                                    <div class="btn-group col-12 mt-2">
                                        <button type="button" value="10000" class="btn btn-primary rounded col-3 mr-1 ribuan btn_modal">10000</button>
                                        <button type="button" value="20000" class="btn btn-primary rounded col-3 mr-1 ribuan btn_modal">20000</button>
                                        <button type="button" value="30000" class="btn btn-primary rounded col-3 mr-1 ribuan btn_modal">30000</button>
                                        <button type="button" class="btn btn-white rounded-0 col-3 mr-1"></button>
                                    </div>
                                    <div class="btn-group col-12 mt-2">
                                        <button type="button" value="40000" class="btn btn-primary rounded col-3 mr-1 ribuan btn_modal">40000</button>
                                        <button type="button" value="50000" class="btn btn-primary rounded col-3 mr-1 ribuan btn_modal">50000</button>
                                        <button type="button" value="100000" class="btn btn-primary rounded col-3 mr-1 ribuan btn_modal">100000</button>
                                        <button type="button" id="set_modal" class="btn btn-success rounded-0 col-3 mr-1">Set</button>
                                    </div>
                                </div>
                        </div>
                        </form>
                    </div>
                    <div class="card col-5 mr-3">
                        <table class="table mt-3">
                            <tr>
                                <td class="text-bold">Total</td>
                                <td class="text-center text-bold"></td>
                                <td class="text-bold text-right" id="total_modal"><?= 'Rp. ' . $total; ?></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-bold">Bayar</td>
                                <td class="text-bold text-right" id="bayar_modal"> 0 </td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-bold">Kembali</td>
                                <td class="text-bold text-right" id="kembali_modal"> 0 </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="modal-footer justify-content-end">
                    <button style="height: 65px;" class="btn btn-green text-bold text-capitalize col col-2 m-1" id="bayar">bayar</button>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
</body>



<script>
    // fungsi klik
    $('document').ready(function() {
        $('.klik').click(function() {
            var inputText = $('#qty')
            var btnVal = $(this).val()
            var inputVal = inputText.val()
            inputText.val(Number(inputVal + btnVal))
        })
        // menghilangkan efek hover pada button
        $(".btn").click(function() {
            this.blur()
        })

        $('#reset_qty').click(function() {
            //     var value = $('#qty').val();
            // alert('ok');
            $('#qty').val('')
        })
    })

    // mengosongkan input id="qty"
    $('#cash').click(function() {
        $('#qty').val('')
    })


    $('#reset_modal').click(function() {
        $('.kosong').prop('disabled', true)
        $('#bayar_modal').text(0)
        $('#kembali_modal').text(0)
    })

    // klik modal
    $('document').ready(function() {
        $('.kosong').prop('disabled', true)
        $('.btn_modal').click(function() {
            $('.kosong').prop('disabled', false)
            var inputText = $('#qty_modal');
            var btnVal = $(this).val()
            var inputVal = $('#qty_modal').val()
            inputText.val(inputVal + btnVal)
        })

        // menghilangkan efek hover pada button
        $(".btn").click(function() {
            this.blur()
        })

        // Clear pada modal
        $('#hapus_modal').ready(function() {
            $('#hapus_modal').click(function(e) {
                var qty_hapus = $('#qty_modal');
                var qty_val = $('#qty_modal').val();
                // var hapus = $('#hapus_modal');

                var hapus2 = qty_val.slice(3, qty_val.length - 1);
                var hasil_hapus = qty_hapus.val(formatRupiah2(hapus2, 'Rp. '));
            })
        })
        /* Fungsi */
        function formatRupiah2(hapus2, prefix) {
            var number_string = hapus2.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }


        // set menggunakan modal
        $('#set_modal').click(function() {
            var qty_rupiah = $('#qty_modal').val()
            $('.kosong').prop('disabled', true)

            // jika inputan 0
            if (qty_rupiah === "") {
                var kembali_modal = $('#kembali_modal').text(0)
            } else {
                // merubah rupiah inputan menjadi integer
                var rupiah_input = qty_rupiah.substr(4, qty_rupiah.length)
                var number_input = rupiah_input.replace(/\./gi, "");
                var qty_modal_number = parseInt(number_input)
                // akhir

                // merubah rupiah total menjadi integer
                var total_modal = $('#total_modal')
                var total_modal_text = total_modal.text()
                var number_input = total_modal_text.replace(/\./gi, "");
                var rupiah_input = number_input.substr(3, qty_rupiah.length)

                $.ajax({
                    url: '<?= base_url('user/kembalian'); ?>',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        qty_modal_number: qty_modal_number,
                        rupiah_input: rupiah_input
                    },
                    success: function(data) {
                        // memasukkan nilai form input kedalam bagian pembayaran
                        var bayar_modal_number = $('#bayar_modal').text(qty_rupiah)
                        // memasukkan nilai kembalian kedalam bagian pembayaran
                        $('#kembali_modal').text('Rp. ' + data)

                        // mengosongkan qty modal
                        $('#qty_modal').val('')
                    }
                })
            }
        })

        $('.ribuan').click(function() {
            var qty_number = $('#qty_modal')
            var btnVal = $(this).val()
            qty_number.val(btnVal)
        })
    })



    $(document).ready(function() {
        $('#logout_user').click(function(e) {
            e.preventDefault();
            var link = $(this).attr('href');

            Swal.fire({
                icon: 'warning',
                title: 'Apakah anda yakin akan mengakhiri session?',
                showDenyButton: true,
                confirmButtonColor: '#00a65a',
                cancelButtonColor: '#d33',
                showCloseButton: true,
                confirmButtonText: `Akhiri`,
                denyButtonText: `Tidak`,
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = link;
                } else if (result.isDenied) {
                    window.location = '<?= base_url('auth2/logoutOnly'); ?>'
                }
            })
        })
    })

    $(document).ready(function() {
        $('.btn_modal').click(function(e) {
            var rupiah = $('.btn_modal');
            var input = $('#qty_modal')

            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            input.val(formatRupiah($(input).val(), 'Rp. '));
        });
    })

    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>