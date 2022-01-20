<?php
  include '../function/config.php';


  $artikel_id = $_GET['artikel_id'];
  $artikel_like_ip = $_SERVER['REMOTE_ADDR'];
  $dataArtikel= mysqli_query($dbconnect,"SELECT * FROM artikel INNER JOIN kategori ON artikel.kategori_id = kategori.kategori_id WHERE artikel_id IN ('$artikel_id')");

  // deteksi kesamaan ip
  $dataArtikelLike= mysqli_query($dbconnect,"SELECT * FROM artikel_like WHERE artikel_id IN ('$artikel_id') AND artikel_like_ip LIKE '%".$artikel_like_ip."%'");
  $dataArtikelLikeNum = mysqli_num_rows($dataArtikelLike);

  // menampilkan jumlah likenya
  $dataArtikelLike2= mysqli_query($dbconnect,"SELECT * FROM artikel_like WHERE artikel_id IN ('$artikel_id')");
  $dataArtikelLikeNum2 = mysqli_num_rows($dataArtikelLike2);

  

  if(isset($_GET['aksi']) && $_GET['aksi'] == 'suka' && isset($_GET['artikel_id'])) {

    $artikel_like_ip = $_SERVER['REMOTE_ADDR'];
    $artikel_id      = $_GET['artikel_id'];

    $query_input_blog_input = mysqli_query($dbconnect, "INSERT INTO artikel_like VALUES('', '$artikel_like_ip', '$artikel_id')");

    if($query_input_blog_input) {
      header('Location: ?artikel_id='.$_GET['artikel_id'].'');
    }

    else {
      header('Location: ?error=error');
    }
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

    <!-- My style -->
    <link rel="stylesheet" type="text/css" href="../css/style.css">

    <title>Artikel</title>
  </head>
  <body id="daftar-artikel">
      <!-- Start navbar -->
      <div class="navbar-list mb-5 nav-detail" style="background-color: #707c4f;">
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent p-4">
          <div class="container">
            <a class="navbar-brand" href="index.php" style="color: white;"><b>Halaman Utama</b></a>
          </div>
        </nav>
      </div>
 
    <!-- Strat artikel -->
    <div class="container card-container" id="card-container">

      <!-- Start artikel -->
      <div id="artikel">
        <?php 
        while ($rowArtikel = $dataArtikel->fetch_array()) {
        ?>
        <div class="card card-kategori mb-5 p-4 kategori_item <?php echo $rowArtikel['kategori_nama'] ?>">
          <div class="card-body">
            <img src="img/<?= $rowArtikel['artikel_gambar'] ?>" class="card-img-top mb-4" >
            <h2 class="card-title mb-3">
                <b><?php echo $rowArtikel['artikel_judul']; ?></b>
            </h2>
            <h3 class="waktu_list mb-3">
                    Diterbitkan pada: <?php echo $rowArtikel['artikel_tanggal']; ?>
            </h3>
            <p class="mb-5 addReadMore showlesscontent"><?php echo $rowArtikel['artikel_isi']; ?></p>

            <div class="row mt-5">
              <div class="col-lg-11">
                <p class="kategori"><?php echo ucfirst($rowArtikel['kategori_nama']); ?></p>
              </div>
              <div class="col-lg-1">
                

                <!-- Start like button -->
                <?php
                  if($dataArtikelLikeNum == 0) {
                    echo '
                      <a class="btn btn-danger btn-sm" href="?aksi=suka&artikel_id='.$rowArtikel['artikel_id'].'" role="button" ><b><img src="../img/like1.png" class="img-fluid" style="width: 22px; margin-right: 3px;"> '.$dataArtikelLikeNum2.'</b></a>
                    ';
                  }

                  else { 
                    echo '
                      <a class="btn btn-danger btn-sm" href="#" role="button" ><b><img src="../img/like1.png" class="img-fluid" style="width: 22px; margin-right: 3px;"> '.$dataArtikelLikeNum2.'</b></a>
                    ';
                  }
                ?>
                <!-- End like button -->
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
    <!-- End artikel -->

    <!-- Start footer -->
    <footer class="footer-list py-3" style="background-color: #707c4f;">
      <div class="container">
        <span class="d-flex justify-content-end" style="color: white;">copyright @kelompok4 2021</span>
      </div>
    </footer>
    <!-- End footer -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Js Alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </body>
</html>