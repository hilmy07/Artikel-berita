<?php
  session_start();

  if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
  }

  include '../function/config.php';

  $dataArtikel= mysqli_query($dbconnect,"SELECT * FROM artikel INNER JOIN kategori ON artikel.kategori_id = kategori.kategori_id ORDER BY artikel_id DESC");

  $dataKategori = mysqli_query($dbconnect,"SELECT * FROM kategori");

  function countLike($artikel_id){
    include '../function/config.php';
     // menampilkan jumlah likenya
    $dataArtikelLike2= mysqli_query($dbconnect,"SELECT * FROM artikel_like WHERE artikel_id IN ('$artikel_id')");
    $dataArtikelLikeNum2 = mysqli_num_rows($dataArtikelLike2);
    return $dataArtikelLikeNum2;
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- ------------------SCRIPT CONFIG AJAX READ MORE-------------------------------------------------------------------------- -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <!-- Ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

    <!-- My style -->
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/styleProfile.css">
    <link rel="stylesheet" type="text/css" href="../css/styleFooter.css">

    <title>Artikel</title>
  </head>
  <body id="daftar-artikel">
    <!-- Start navbar -->
    <div class="navbar-list">
      <nav class="navbar navbar-expand-lg navbar-dark p-4">
        <div class="container">
          <a class="navbar-brand" href="#">Nanemin</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link active" id="nav-list" aria-current="page" href="" style="color: black;">List Artikel</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link" id="nav-list" aria-current="page" href="dashboard.php" style="color: black;">Dashboard</a>
                </li>
                <a href="logout.php"><button class="btn signout-btn">Sign Out</button></a>
              </ul>
            </div>
          </div>
        </div>
      </nav>
    </div>
    <!-- End navbar -->

    <!-- Start header -->
    <div id="header">
      <div class="container">
        <div class="row">
          <div class="container">
            <div class="row">
              <div class="judul-item">
                <h1>Blog Artikel Tanaman </h1>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End header -->

    <!-- Strat artikel -->
    <div class="container card-container" id="card-container">
      <!-- Start kategori -->
      <div class="row search-button-list">
        <div class="search-container col-lg-10">
          <input id="search" type="text" placeholder="Cari artikel.." />
        </div>
        <button class="btn dropdown-toggle category_container col-lg-2" type="button" data-bs-toggle="dropdown" aria-expanded="false" id="dropdownMenu2">Kategori</button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenu2" id="buttonGroup_container" style="width: 200px">
            <li><button type="button" class="btn category_item" id="all">All</button></li>
            <?php
              while ($row = $dataKategori->fetch_array()) {
            ?>
            <li><button type="button" class="btn category_item" id="<?php echo $row['kategori_nama'] ?>"><?php echo ucwords($row['kategori_nama']); ?></button></li>
            <?php 
              }
            ?>
          </ul>
      </div>
      <!-- End kategori -->

      <!-- Start artikel -->
      <div id="artikel">
        <?php 
        while ($rowArtikel = $dataArtikel->fetch_array()) {
        ?>
        <div class="card card-kategori mb-5 p-4 kategori_item <?php echo $rowArtikel['kategori_nama'] ?>">
          <div class="card-body">
            <img src="img/<?= $rowArtikel['artikel_gambar'] ?>" class="card-img-top mb-4">
            <h2 class="card-title mb-3">
                <b class="judul-artikel"><?php echo $rowArtikel['artikel_judul']; ?></b>
            </h2>
            <h3 class="waktu_list mb-3">
                    Diterbitkan pada: <?php echo $rowArtikel['artikel_tanggal']; ?>
            </h3>
            <p class="mb-3 addReadMore showlesscontent"><?php echo substr($rowArtikel['artikel_isi'],0,300); ?></p>
            <a href="artikel_detail.php?artikel_id=<?php echo $rowArtikel['artikel_id']; ?>" style="text-decoration: none; color: #fa8400;">Baca selengkapnya ..</a>

            <div class="row mt-5">
              <div class="col-lg-10">
                <p class="kategori"><?php echo ucfirst($rowArtikel['kategori_nama']); ?></p>
              </div>
              <div class="col-lg-2">
                 <button type="button" class="btn btn-danger btn-sm" data-toggle="click-ripple"><img src="../img/like1.png" class="img-fluid" style="width: 22px; margin-right: 3px;"> <?php echo countLike($rowArtikel['artikel_id']); ?></button>

              </div>
            </div>
          </div>
        </div>
        <?php
        }
        ?>
      </div>
      <!-- End artikel -->
    </div>

    <!-- Start profile -->
    <div class="profile-area mt-5">
        <div class="container">
            <div class="row">
              <h2 class="mb-5 text-center">Yuk kenalan lebih dekat dengan kami</h2>
                <div class="col-md-4">
                    <div class="card" id="profile">
                        <div class="img1"><img src="../img/profile-header.jpg" alt="" srcset=""></div>
                        <div class="img2"><img src="../img/husain.jpg" alt="" srcset=""></div>
                        <div class="main-text">
                            <h2>Husain Tufiqurahman</h2>
                            <p>Mahasiswa Teknik Informatika</p>
                            <p>UPN Veteran Jawa Timur</p>
                        </div>
                        <div class="socials">
                            <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                            <a href="https://id.linkedin.com/"><i class="fab fa-linkedin"></i></a>
                            <a href="mailto:"><i class="fas fa-envelope-square"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card" id="profile">
                        <div class="img1"><img src="../img/profile-header.jpg" alt="" srcset=""></div>
                        <div class="img2"><img src="../img/puteri.jpg" alt="" srcset=""></div>
                        <div class="main-text">
                            <h2>Puteri Aulia Fahlia</h2>
                            <p>Mahasiswa Teknik Informatika</p>
                            <p>UPN Veteran Jawa Timur</p>
                        </div>
                        <div class="socials">
                            <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                            <a href="https://id.linkedin.com/"><i class="fab fa-linkedin"></i></a>
                            <a href="mailto:"><i class="fas fa-envelope-square"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card" id="profile">
                        <div class="img1"><img src="../img/profile-header.jpg" alt="" srcset=""></div>
                        <div class="img2"><img src="../img/hilmy.png" alt="" srcset=""></div>
                        <div class="main-text">
                            <h2>Hilmy Haidar</h2>
                            <p>Mahasiswa Teknik Informatika</p>
                            <p>UPN Veteran Jawa Timur</p>
                        </div>
                        <div class="socials">
                            <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                            <a href="https://id.linkedin.com/"><i class="fab fa-linkedin"></i></a>
                            <a href="mailto:"><i class="fas fa-envelope-square"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Start footer -->
        <footer class="footer-distributed">

            <div class="footer-left">
                <h3><span>Nanemin</span></h3>

                <p class="footer-company-name mt-3">Copyright © 2021 <strong>kelompok4</strong></p>
            </div>

            <div class="footer-center">
            </div>

            <div class="footer-right">
                <p class="footer-company-about">
                    <span>More info</span>
                    <a href="https://pertanian.jatimprov.go.id/">Dinas Pertanian dan Pertahanan Pangan Jawa Timur</a>
                </p>

                <div class="footer-icons">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-youtube"></i></a>
                </div>
            </div>
        </footer>
        <!-- End footer -->
    </div>
    <!-- End profile -->

    

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Js File Config -->
    <script src="../js/search.js"></script>
    <script src="../js/search_kategori.js"></script>

    <!-- ------------------FIREBASE DATABASE CONFIG--------------------------------------------------------------- -->
    <script src="https://www.gstatic.com/firebasejs/5.7.1/firebase.js"></script>
    <script type="module" src="../js/logout.js"></script>

    <!-- Js Alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </body>
</html>