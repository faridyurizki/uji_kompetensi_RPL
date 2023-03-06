<?php
 include('../../config/koneksi.php');
 if(isset($_POST['daftar'])){
    @session_start();
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $telp = $_POST['telp'];

    $u = mysqli_query($con, "SELECT * from masyarakat WHERE username='$username'");
    $r = mysqli_num_rows($u);
    if($r == 1){
        ?> 
            <div class="alert alert-danger" role="alert">
                Username Telah Digunakan ! Coba Gunakan Username Lainnya
            </div>
        <?php
    }else{
        $q = mysqli_query($con, "INSERT INTO `masyarakat` (`nik`, `nama`, `username`, `password`, `telp`) VALUES ('$nik', '$nama', '$username', '$password', '$telp');");
    ?> 
        <div class="alert alert-success" role="alert">
            Anda Telah Berhasil Mendaftar, Silahkan Tunggu Verifikasi dari Petugas !
        </div>
    <?php
    }
    
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

  
    <title>Register</title>
 
    <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../../assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="../../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../../assets/vendor/simple-datatables/style.css" rel="stylesheet">


 <link href="../assets/css/style.css" rel="stylesheet">

   

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-4">
            <div class="card-body p-0">
                
                <div class="row">
                    <div class="col-lg-3 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">buat akun !</h1>
                            </div>
                            <form class="user" method="post">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input name="nik" type="text" class="form-control form-control-user" id="NIK"
                                            placeholder="Masukkan NIK">
                                    </div>
                                    <div class="col-sm-6">
                                        <input name="nama" type="text" class="form-control form-control-user" id="Nama"
                                            placeholder="Masukkan Nama">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input name="username" type="text" class="form-control form-control-user" id="username"
                                        placeholder="Masukkan username">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input name="password" type="password" class="form-control form-control-user"
                                            id="Masukkan Password" placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input name="telp" type="text" class="form-control form-control-user" id="telp"
                                        placeholder="Masukkan NoTelp"> <br>
                                </div>
                                <button name="daftar" class="btn btn-primary btn-user btn-block col-lg-12">
                                    daftarkan akun
</button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <text>sudah punya akun?</text>
                                <a class="small" href="index.php">Langsung Login!</a>
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