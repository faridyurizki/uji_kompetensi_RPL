<?php
    include('../../assets/header.php');
    include('../../config/koneksi.php');
    if(isset($_POST['login'])){
        $pilihan = $_POST['pilihan'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        if($pilihan == 'masyarakat'){
            $q = mysqli_query($con, "SELECT * from masyarakat WHERE username='$username' AND password='$password' AND verif = '1'");
            $r = mysqli_num_rows($q);
            if($r == 1){
                $o = mysqli_fetch_object($q);
                @session_start();
                $_SESSION['username'] = $o -> username;
                $_SESSION['password'] = $o -> password;
                $_SESSION['nik'] = $o -> nik;
                $_SESSION['nama'] = $o -> nama;
                $_SESSION['telp'] = $o -> telp;
                $_SESSION['level'] = $o -> level;
                @header('location:../modul-pengaduan/');
            }else{ ?>
                <div class="alert alert-danger" role="alert">
                    Data Salah atau belum diverifikasi !
                </div>
                <?php
            }
        }elseif($pilihan == 'petugas'){
            $q = mysqli_query($con, "SELECT * from petugas WHERE username='$username' AND password='$password'");
            $r = mysqli_num_rows($q);
            @session_start();
            if($r == 1){
                $o = mysqli_fetch_object($q);
                @session_start();
                $_SESSION['username'] = $o -> username;
                $_SESSION['password'] = $o -> password;
                $_SESSION['id_petugas'] = $o -> id_petugas;
                $_SESSION['nama_petugas'] = $o -> nama_petugas;
                $_SESSION['telp'] = $o -> telp;
                $_SESSION['level'] = $o -> level;
                @header('location:../modul-petugas/');
            }else{ ?> 
                <div class="alert alert-danger" role="alert">
                    Pastikan Data yang Anda Masukan Benar !
                </div>
                <?php
            }
        }
    }

    
?>

<body class="bg-gradient-primary " >

    <div class="container-sm" style="bg-color: red">


        <div class="row justify-content-center" >

            <div class="col-xl-10 col-lg-6 col-md-3">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">

                        <div class="row">
                            <div class="col-lg-3 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6" >
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">LOGIN!</h1>
                                        <h3 class="h3 text-gray-900 mb-4">Website Pengaduan Masyarakat</h3>
                                    </div>
                                    <form class="user" method="post">
                                        <div class="form-group">
                                            <input for="validationServerUsername" name="username" type="text" class="form-control form-control-user" 
                                                placeholder="Masukkan username"> 
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user" 
                                                placeholder="Password">
                                        </div> <br>
                                        <div class="form-group">
                                        <select class="form-control" name="pilihan">
                                            <option value="masyarakat">masyarakat</option>
                                            <option value="petugas">Petugas</option>
                                        </select>
                                    </div>
                                        <div>
                                        <div class="card-footer">
                                    <div class="form-group">
                                        <button name="login" class="form-control btn btn-primary">Masuk</button>
                                    </div>
                                    </div>
                                        </div> 
                                        <div>
                                        <text> Belum punya akun?</text>
                                        <a class="reg" href="register.php">Daftar Disini!</a>
                                        </div>
                                    
                                    </div>
                                    </form>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    
 
    
  <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../assets/vendor/quill/quill.min.js"></script>
  <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

 
  <script src="../assets/js/main.js"></script>
</body>

</html>