    var table_data = $('#list-data').DataTable({
        "scrollX": true,
        "processing": true,
        "searching": false,
        "lengthChange": false,
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
                "data": 'harga'
            },
            {
                "targets": -1,
                data: 'id',
                createdCell: function(td, cellData, rowData, row, col) {
                    $(td).html(' <button class="btn btn-sm btn-danger" onclick="delete_data(' + rowData.id + ')" title="Delete"><i class="fa fa-trash"></i></button> ');
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

        $.ajax({
            url: '<?php echo base_url() ?>user/proses_menu',
            type: 'POST',
            data: {
                qty: qty,
                id: id
            },
            success: function(data) {
                Swal.fire({
                    // position: 'top-end',
                    icon: 'success',
                    title: 'Menu Berhasil ditambah!',
                    showConfirmButton: false,
                    timer: 700
                })

                $('#qty').val('');
                table_data.ajax.reload();

                // $('#qty')
            }
        });
    }

    function delete_data(id = null) {
        $.ajax({
            url: '<?php echo base_url() ?>user/delete_menu',
            type: 'POST',
            data: {
                id: id
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
            }
        });
    }

    
