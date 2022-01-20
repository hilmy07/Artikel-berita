<?php
  session_start();

  if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
  }

  include '../function/config.php';

  $dataArtikel= mysqli_query($dbconnect,"SELECT * FROM artikel INNER JOIN kategori ON artikel.kategori_id = kategori.kategori_id ORDER BY artikel_id DESC");
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- My style -->
    <link rel="stylesheet" type="text/css" href="../css/style.css">

    <title>Kelola Artikel</title>
  </head>
  <body>
    <!-- Start daftar artikel -->
    <div class="container">
      <!-- Start button halam utama -->
      <div class="container">
        <a class="btn btn-primary mt-5" href="dashboard.php" role="button">Dashboard</a>
        <a class="btn btn-primary mt-5" href="artikel_export.php" role="button">Export Artikel</a>
      </div>
      <!-- End buttin halaman utama -->

      <div class="judul mt-5 mb-5">
        <h1 class="text-center">Kelola Artikel</h1>
      </div>
      <div class="row container"> 
        <?php 
        while ($rowArtikel = $dataArtikel->fetch_array()) {
        ?>
          <div class="kelola-card card mb-5">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-9">
                  <h3 class="c"><?php echo $rowArtikel['artikel_judul']; ?></h3>
                  <p><?php echo ucwords($rowArtikel['kategori_nama']); ?></p>
                </div>
                <div class="col-lg-3">
                    <a href="artikel_edit.php?id=<?= $rowArtikel['artikel_id']; ?>">
                      <button class="btn btn-success mr-2">
                        Ubah
                      </button>
                    </a>
                    <a href="artikel_hapus.php?id=<?= $rowArtikel['artikel_id']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus artikel?');">
                      <button class="btn btn-danger">
                        Hapus
                      </button>
                    </a>
                </div>
              </div>
            </div>
          </div>
        <?php
        }
        ?>
      </div>
    </div>
    <!-- End daftar artikel -->


     <!-- Start footer -->
    <footer class="footer-kelola py-3">
      <div class="container">
        <span class="d-flex justify-content-end">copyright @kelompok4 2021</span>
      </div>
    </footer>
    <!-- End footer -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>