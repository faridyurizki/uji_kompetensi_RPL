
 <?php
    include('../../assets/header.php');
    include('../../config/koneksi.php');
    @session_start();
    if(isset($_SESSION['username'])){
        true;
    }else{
        @header('location:../modul-auth/');
    }
    if($_SESSION['level'] == 'masyarakat'){
        @header('location:../modul-pengaduan/');
    }
    if(isset($_POST['edit'])){
        $nik = $_POST['nik'];
        $status = $_POST['status'];
        if($status == '1'){
            $q = mysqli_query($con, "UPDATE masyarakat SET verif = '1' WHERE nik = '$nik'");
        }else{
            $q = mysqli_query($con, "UPDATE masyarakat SET verif = '0' WHERE nik = '$nik'");
        }
    }

    if(isset($_POST['edit-mas'])){
        $niklama = $_POST['nikLama'];
        $nik = $_POST['nik'];
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $telp = $_POST['telp'];

        $q = mysqli_query($con, "UPDATE masyarakat SET nik = '$nik', nama = '$nama', username = '$username', password = '$password', telp = '$telp' WHERE nik = '$niklama'");
    }

    if(isset($_POST['hapus'])){
        $nik = $_POST['nik'];
        $q = mysqli_query($con, "DELETE FROM masyarakat WHERE nik = '$nik'");
    }



?>
<body class="pengaduan">
    <?php include('../../assets/menu.php') ?>
    <div class="wrapper">
     
          <div class="content-wrapper">
         
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Verifikasi Masyarakat</h3>

                            </div>
                            <div class="card-body">
                                <table id="dataTables" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Telp</th>
                                            <th>Status</th>
                                            <th>Update</th>
                                            <th>Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include('../../config/koneksi.php');
                                        $q = mysqli_query($con, "SELECT * FROM `masyarakat`");
                                        $no = 1;
                                        while ($d = mysqli_fetch_object($q)) { ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= $d->nik ?></td>
                                                <td><?= $d->nama ?></td>
                                                <td><?= $d->username ?></td>
                                                <td><?= $d->telp ?></td>
                                                <td><?php if ($d->verif == 0) {
                                                        echo '<form action="" method="post"><input name="nik" type="hidden" value="' . $d->nik . '"><input name="status" type="hidden" value="1"><button name="edit" type="submit" class="btn btn-danger"><i class="fa fa-ban"></i></button></form>';
                                                    } else {
                                                        echo '<form action="" method="post"><input name="nik" type="hidden" value="' . $d->nik . '"><input name="status" type="hidden" value="0"><button name="edit" type="submit" class="btn btn-info"><i class="fa fa-check"></i></button></form>';
                                                    } ?></td>
                                                <td>
                                                 <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $d -> nik ?>">
                                                 edit
                                                 </button>

                                               
                                                  <div class="modal fade" id="exampleModal<?= $d -> nik ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                 <div class="modal-dialog">
                                                <div class="modal-content">
                                                 <div class="modal-header">
                                                 <h5 class="modal-title" id="exampleModalLabel"> ubah data</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                   <div class="modal-body">
                                                   <form action="" method="post">
                                                            <input type="hidden" name="nikLama" value="<?= $d->nik ?>">
                                                            <div class="modal-body">
                                                                <div class="form-group"><label for="nik">Nik</label>
                                                                    <input class="form-control" type="text" name="nik" value="<?= $d->nik ?>">
                                                                </div>
                                                                <div class="form-group"><label for="nama">Nama</label>
                                                                    <input class="form-control" type="text" name="nama" value="<?= $d->nama ?>">
                                                                </div>
                                                                <div class="form-group"><label for="username">Username</label>
                                                                    <input class="form-control" type="text" name="username" value="<?= $d->username ?>">
                                                                </div>
                                                                <div class="form-group"><label for="username">New Password</label>
                                                                    <input class="form-control" type="password" name="password" value="">
                                                                </div>
                                                                <div class="form-group"><label for="username">Telepon</label>
                                                                    <input class="form-control" type="number" name="telp" value="<?= $d->nik ?>">
                                                                </div>
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">tutup</button>
                                                                <button name="edit-mas" class="btn btn-primary">simpan</button>
                                                            </div>
                                                    </form>  
                                                    </div>
                                               </div>
                                                     </div>
                                                  </div>
                                               </div></td>
                                           <td>
                                                    <form action="" method="post"><input type="hidden" name="nik" value="<?= $d->nik ?>"><button name="hapus" class="btn btn-danger"><i class="fa fa-trash"></i></button></form>
                                                </td>
                                            </tr>

                                          
                                            
                                             
                                            </div>
                                            

                                        <?php $no++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                       
                    </div>
                   
                </div>
               
            </div>
            
        </div>
       


 <script src="../assets/js/bootstrap.min.js" rel="stylesheet">
      <!-- Vendor JS Files -->
  <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../assets/vendor/quill/quill.min.js"></script>
  <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>
