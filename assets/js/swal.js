// sweet alert
var flash = $('#flash').data('flash');
    if (flash) {
        Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: flash
        })
    }

    var flash2 = $('#flash_false').data('flash');
    if (flash2) {
        Swal.fire({
            icon: 'error',
            title: 'Oops..',
            text: flash2
        })
    }

    // logout
    $(document).ready(function() {
        $('#logout').click(function(e) {
            e.preventDefault();
            var link = $(this).attr('href');
        Swal.fire({
                title: 'Yakin?',
                text: "Apakah anda yakin akan logout?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#00a65a',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, logout!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = link;
                }
            })
        })
    })


    // deleteUser
    $(document).ready(function() {
        $('.hapus-data').click(function(e) {
            e.preventDefault();
            var link = $(this).attr('href');

            Swal.fire({
                title: 'Yakin?',
                text: "Apakah anda yakin akan menghapus User ini?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#00a65a',
                confirmButtonText: 'Ya, Hapus !'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = link;
                }
            })
        })
    })

    