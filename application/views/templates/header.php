<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $judul; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


    <!-- CSS sweet alert suryadi -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>swal/sweetalert2.min.css">
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>


    <!-- link tambahan -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/datepicker.css">

    <style>
        .gambar {
            background-image: url(<?= base_url('assets/image/open_image.jpg') ?>);
            background-repeat: no-repeat;
            background-position: 0px -200px;
            width: content;
        }

        .regis {
            background-image: url(<?= base_url('assets/image/house.jpg') ?>);
            background-repeat: no-repeat;
            /* background-size: cover; */
            background-position: -1300px -1600px;
            /* width: content; */
        }

        /* awal css sidebar */
        .button-cyan {
            background-color: #f00000;
            border-radius: 10px;
            color: floralwhite;
        }

        .sidebar-dark {
            background-color: #2b3545;
            color: floralwhite;
        }

        .btn-yellow {
            background-color: #f5e000;
            color: floralwhite;
        }

        .btn-green {
            background-color: #089e00;
            color: floralwhite;
        }

        .btn-menu {
            background-color: #9e9e9e;
            color: black;
        }

        /* akhir css sidebar */
    </style>
</head>