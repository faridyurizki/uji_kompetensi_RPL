<?php include('../../config/koneksi.php');
include('../../assets/header.php'); 
?>
<body>
<?php
  include('../../assets/menu.php');
  if(isset($_SESSION['username'])){
        true;
    }else{
        @header('location:../modul-auth/');
    }
?>

</aside>
<main id="main" class="main">
<ul class="list-group">
    <div class="alert alert-primary" role="alert">
    Selamat Datang <?= $_SESSION['nama'] ?>
    </div>
    <?php 
        @session_start();
        $nik = $_SESSION['nik'];
        $q = mysqli_query($con, "SELECT * FROM masyarakat WHERE nik = '$nik'");
        $o = mysqli_fetch_object($q);

        ?> 
            <li class="list-group-item">NIK : <?= $o -> nik ?></li>
            <li class="list-group-item">Nama : <?= $o -> nama ?></li>
            <li class="list-group-item">Username : <?= $o -> username ?></li>
            <li class="list-group-item">Nomor Telpon : <?= $o -> telp ?></li>
        <?php
    ?>
</ul>
</main>

  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>SisPemas</span></strong>. All Rights Reserved
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <?php 
  include('../../assets/footer.php');
  ?>

</body>

</html>