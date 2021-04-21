<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4 text-center">


    <div class="sidebar user-panel mt-2 ">
        <div class="info">
            <a href="" class="d-block text-white">Nama Dari Database</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Sidebar -->
            <form action="" method="post" name="jumlah">
                <div class="d-inline mt-3">
                    <input type="text" name="input" id="jumlah" class="form-control col col-10 m-auto">

                    <button type="button" onclick="myfunction(1)" value="1" class="btn btn-danger col col-5 m-1">1</button>
                    <button type="button" onclick="myfunction(2)" value="2" class="btn btn-danger col col-5 m-1">2</button>
                    <button type="button" onclick="myfunction(3)" value="3" class="btn btn-danger col col-5 m-1">3</button>
                    <button type="button" onclick="myfunction(4)" value="4" class="btn btn-danger col col-5 m-1">4</button>
                    <button type="button" onclick="myfunction(5)" value="5" class="btn btn-danger col col-5 m-1">5</button>
                    <button type="button" onclick="myfunction(6)" value="6" class="btn btn-danger col col-5 m-1">6</button>
                    <button type="button" onclick="myfunction(7)" value="7" class="btn btn-danger col col-5 m-1">7</button>
                    <button type="button" onclick="myfunction(8)" value="8" class="btn btn-danger col col-5 m-1">8</button>
                    <button type="button" onclick="myfunction(9)" value="9" class="btn btn-danger col col-5 m-1">9</button>
                    <button type="button" onclick="myfunction(0)" value="0" class="btn btn-danger col col-5 m-1">0</button>

                    <script>
                        function myfunction(num) {
                            document.getElementById('jumlah').value = document.getElementById('jumlah').value + num;
                        }
                    </script>
            </form>

            </div>

            <div class=" sidebar user-panel mt-2">
                <!-- garis pembatas -->
            </div>

            <div>
                <button onclick="functionClear()" id="hapus" class="btn btn-warning text-capitalize col col-11 m-1">clear</button>
                <button id="hold" class="btn btn-warning text-capitalize col col-5 m-1">hold</button>
                <button id="release" class="btn btn-warning text-capitalize col col-5 m-1">release</button>
            </div>

            <!-- script untuk button clear, hold, release -->
            <script>
                // awal clear
                function functionClear() {
                    var value = document.getElementById('jumlah').value;
                    document.getElementById('jumlah').value = value.substr(0, value.length - 1);
                }

                // function functionClear() {
                //     $(document).click(function() {
                //         $('#hapus').addClass('active').delay(500).removeClass('active');

                //     })
                // }
                // akhir clear
            </script>



            <div>
                <button style="height: 65px;" class="btn btn-success text-bold text-capitalize col col-8 m-1">bayar</button>
            </div>

            <!-- <div class="m-10">
                <a href="<?= base_url('auth2/logout') ?>" onclick="confirm()" class="nav-link text-blue">
                    <i class="fas fa-sign-out-alt"></i>
                    <p>
                        Logout
                    </p>
                </a>
            </div> -->
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>