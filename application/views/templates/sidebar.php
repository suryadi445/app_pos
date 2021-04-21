<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark elevation-4 ">


    <div class="sidebar user-panel mt-2 text-center ">
        <div class="info">
            <p class=" text-white text-capitalize"><?= $user['name']; ?></p>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-1">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <a href="<?= base_url('administrator') ?>" class="nav-link text-success">
                <i class="fas fa-home"></i>
                <p>
                    Home
                </p>
            </a>
            <div class="sidebar user-panel mt-2 ">
                <!-- garis pembatas -->
            </div>

            <!-- Sidebar -->
            <div class="sidebar user-panel pt-3">
                <!-- <div class="info"> -->
                <p class="text-white ml-2">SETTING</p>
                <!-- </div> -->
            </div>

            <a href="<?= base_url('administrator/insertData') ?>" class="nav-link text-success text-success">
                <i class="fas fa-plus"></i>
                <p>
                    Insert Menu
                </p>
            </a>
            <a href="<?= base_url('administrator/updateData') ?>" class="nav-link text-success">
                <i class="fas fa-edit"></i>
                <p>
                    Update Menu
                </p>
            </a>
            <a href="<?= base_url('administrator/deleteData') ?>" class="nav-link text-success">
                <i class="fas fa-trash-alt"></i>
                <p>
                    Delete Menu
                </p>
            </a>
            <a href="<?= base_url('administrator/allData') ?>" class="nav-link text-success">
                <i class="nav-icon fas fa-book-open"></i>
                <p>
                    All Menu
                </p>
            </a>

            <div class="sidebar user-panel mt-2">
                <!-- garis pembatas -->
            </div>

            <div class="sidebar user-panel pt-3">
                <!-- <div class="info"> -->
                <p class="text-white ml-2">REPORT</p>
                <!-- </div> -->
            </div>

            <a href="<?= base_url('administrator/report') ?>" class="nav-link text-success text-success">
                <i class="fas fa-wallet"></i>
                <p>
                    Financial
                </p>
            </a>
            <a href="<?= base_url('administrator/stock') ?>" class="nav-link text-success text-success">
                <i class="fas fa-file-signature"></i>
                <p>
                    Stock
                </p>
            </a>

            <div class="sidebar user-panel mt-2">
                <!-- garis pembatas -->
            </div>

            <div class="sidebar user-panel pt-3">
                <!-- <div class="info"> -->
                <p class="text-white ml-2">Member</p>
                <!-- </div> -->
            </div>

            <a href="<?= base_url('auth2/registration') ?>" class="nav-link text-success">
                <i class="fas fa-user-lock"></i>
                <p>
                    Create Account
                </p>
            </a>
            <a href="<?= base_url('administrator/listUser') ?>" class="nav-link text-success">
                <i class="fas fa-list"></i>
                <p>
                    List User
                </p>
            </a>

            <div class="sidebar user-panel mt-2">
                <!-- garis pembatas -->
            </div>

            <a href="<?= base_url('auth2/logout') ?>" id="logout" class="nav-link bg-light text-danger mt-5">
                <i class="fas fa-sign-out-alt"></i>
                <p>
                    Logout
                </p>
            </a>

            <script>
                $('document').ready(function() {
                    $('#logout_all').click(function(e) {
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
            </script>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>