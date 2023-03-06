<?php 
@session_start();
?>
<body>
  

<aside id="sidebar" class="sidebar">
<header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
  <a href="index.html" class="logo d-flex align-items-center">
    <img src="../../assets/img/logo.png" alt="">
    <span class="d-none d-lg-block fa-face-laugh-wink">SISPEMAS</span>
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div>
      </ul>
    </li>

  </ul>
</nav>
 </header>
    <ul class="sidebar-nav" id="sidebar-nav">
    <?php 
      if($_SESSION['level'] == 'masyarakat'){
        ?> 
          <li class="nav-item">
            <a class="nav-link " href="../modul-masyarakat/">
              <i class="bi bi-grid"></i>
              <span>Profile</span>
            </a>
          </li>
        <?php
      }
    ?>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>masyarakat</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="../modul-pengaduan/">
              <i class="bi bi-circle" name="pengaduan" ></i><span>pengaduan</span>
            </a>
          </li>
          <li>
            <a href="../modul-tanggapan/">
              <i class="bi bi-circle"></i><span>tanggapan</span>
            </a>
          </li>
          <?php 
            if($_SESSION['level'] == 'masyarakat'){
              true;
            }else{
              ?> 
                <li>
                  <a href="../modul-petugas/">
                    <i class="bi bi-circle"></i><span>Verifikasi</span>
                  </a>
                </li>
              <?php
            }
          ?>
        </ul>
      </li>

    

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>System</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li class="nav-item">
                    <a href="http://<?= $_SERVER['SERVER_NAME'] ?>/uji_kompetensi_RPL/modul/modul-auth/logout.php" class="nav-link">
                        <i class="nav-icon fas fa-lock"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
         
        </ul>
      </li>
</aside>
<script src="../../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../../assets/vendor/quill/quill.min.js"></script>
  <script src="../../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../../assets/vendor/php-email-form/validate.js"></script>

  
  <script src="../../assets/js/main.js"></script>
</body>
</html>