</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url('assets/'); ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/'); ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/'); ?>dist/js/demo.js"></script>

<!-- awal script sweet alert JS SURYADI-->
<script src="<?= base_url('assets/'); ?>swal/sweetalert2.all.min.js"></script>
<!-- datepicker js -->
<script src="<?= base_url('assets/'); ?>js/bootstrap-datepicker.js"></script>


<!-- my script -->

<!-- swal -->
<script src="<?= base_url('assets/'); ?>js/swal.js"></script>
<!-- link tambahan -->
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

<script src="<?= base_url('assets/') ?>js/klik.js"></script>

<!-- <script src="<?= base_url('assets/') ?>js/data_table.js"></script> -->
<script>
    var table_data = $('#list-data').DataTable({
        // "scrollX": true,
        "processing": true,
        "searching": false,
        "lengthChange": false,
        "paging": false,
        // "ordering": false,
        "info": false,
        "ajax": "<?php echo base_url() ?>user/datatables_data",
        "columns": [{
                "data": null
            },
            {
                "data": 'nama_menu'
            },
            {
                "data": 'qty'
            },
            {
                "data": 'harga_pesanan',
                render: $.fn.dataTable.render.number('.', '.', 0, 'Rp. ')
            },
            {
                "targets": -1,
                data: 'id',
                createdCell: function(td, cellData, rowData, row, col) {
                    $(td).html(' <button class="btn btn-sm btn-danger" onclick="delete_data(' + rowData.id + ', ' + rowData.no_transaksi + ')" title="Delete"><i class="fa fa-trash"></i></button> ');
                }
            }
        ],
    });

    table_data.on('order.dt search.dt', function() {
        table_data.column(0, {
            search: 'applied',
            order: 'applied'
        }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();

    function proses_menu(id = null) {
        var qty = $('#qty').val();
        var transaksi = $('#transaksi').val();
        $.ajax({
            url: '<?php echo base_url() ?>user/proses_menu',
            type: 'POST',
            dataType: 'json',
            data: {
                qty: qty,
                id: id,
                transaksi: transaksi
            },
            success: function(data) {
                console.log(data)
                Swal.fire({
                    icon: 'success',
                    title: 'Menu Berhasil ditambah!',
                    showConfirmButton: false,
                    timer: 700
                })

                $('#qty').val('');
                $('#grand_total').text('Rp ' + data);
                $('#total_modal').text('Rp ' + data);

                table_data.ajax.reload();
            }
        });
    }

    function delete_data(id = null, no_transaksi = null) {
        $.ajax({
            url: '<?php echo base_url() ?>user/delete_menu',
            type: 'POST',
            dataType: 'json',
            data: {
                id: id,
                no_transaksi: no_transaksi
            },
            success: function(data) {
                Swal.fire({
                    // position: 'top-end',
                    icon: 'success',
                    title: 'Menu berhasil dihapus!',
                    showConfirmButton: false,
                    timer: 700
                })

                $('#qty').val('');
                table_data.ajax.reload();

                if (data == null) {
                    $('#grand_total').html('Rp ' + 0);
                } else {
                    $('#grand_total').html('Rp ' + data);
                    $('#total_modal').text('Rp ' + data);
                }
            }
        });
    }

    // bayar
    $(document).ready(function() {
        $('#bayar').click(function() {
            var transaksi = $('#transaksi').val();
            var qty_modal = $('#qty_modal')

            var total_modal = $('#total_modal').text()
            var rupiah_input = total_modal.substr(4, total_modal.length)
            var number_total = rupiah_input.replace(/\./gi, "");
            var total = parseInt(number_total)

            var bayar_modal = $('#bayar_modal').text()
            var rupiah_input = bayar_modal.substr(4, bayar_modal.length)
            var number_bayar = rupiah_input.replace(/\./gi, "");
            var bayar = parseInt(number_bayar)

            var kembali_modal = $('#kembali_modal').text()
            var rupiah_input = kembali_modal.substr(4, kembali_modal.length)
            var number_kembali = rupiah_input.replace(/\./gi, "");
            var kembalian = parseInt(number_kembali)

            // console.log(number_kembali);
            // return false

            if (kembalian < 0) {
                qty_modal.val("")
                $('#bayar_modal').text(0)
                $('#kembali_modal').text(0)
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Nominal uang kurang dari harga belanja',
                })
            } else {
                $.ajax({
                    url: '<?= base_url('user/bayar'); ?>',
                    type: 'post',
                    data: {
                        transaksi: transaksi,
                        bayar: bayar,
                        number_kembali: number_kembali
                    },
                    success: function(data) {
                        // console.log(data);
                        // return false
                        var qty_modal = $('#qty_modal').val('')

                        // return false
                        location.reload();
                        window.location = '<?= base_url('user/bill/' . $transaksi) ?>'
                    }
                })
            }
        })
    })
</script>

</html>