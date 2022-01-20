<?php
  include '../function/config.php';

   $dataArtikel= mysqli_query($dbconnect,"SELECT * FROM artikel INNER JOIN kategori ON artikel.kategori_id = kategori.kategori_id");

   $dataKategori = mysqli_query($dbconnect,"SELECT * FROM kategori");

   if (isset($_POST['tambah'])) {
    $kategori = $_POST['kategori'];
    $tanggal = $_POST['tanggal'];
    $judul = $_POST['judul'];
    $artikel = $_POST['artikel'];
    $views = 0;

    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek yang di upload harus gambar
    $daftarEkstensiGambar = ['jpg', 'jpeg','png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $daftarEkstensiGambar)) {
      echo"
           <script>
             alert('Upload gambar dengan benar');
           </script>
         ";
    }

    // upload gambar
    //generate nama baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar; 

    move_uploaded_file($tmpName, 'img/'.$namaFileBaru);

    $gambar = $namaFileBaru;

    mysqli_query($dbconnect, "INSERT INTO artikel VALUES('', '$judul', '$artikel', '$tanggal', '$views', '$gambar', '$kategori')");

    header("location:dashboard.php");
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

    <!-- My style -->
    <link rel="stylesheet" type="text/css" href="../css/style.css">

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <!-- Summernote -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

    <title>Tambah Artikel</title>
  </head>
  <body>
    <div class="container">
      <!-- Start button dashboard -->
      <div class="container">
        <a class="btn btn-primary mt-5" href="dashboard.php" role="button">Dashboard</a>
      </div>
      <!-- End button dashboard -->

      <!-- Start title -->
      <div class="row mt-5 mb-5">
        <h1 class="text-center">Tambah Artikel</h1>
      </div>
      <!-- End title -->

      <div class="row">
        <!-- Start form -->
        <form id="form" method="post" enctype="multipart/form-data">
          <div class="kategori-container row mb-4">
            <div class="tanggal-container col-lg-9">
              <input type="date" class="form-control tanggal" name="tanggal" required>
            </div>

            <div class="col-lg-3 mb-4">
              <input type="file" name="gambar" required>
            </div>
          </div>

          <div class="kategori-container mb-4">
            <label class="visually-hidden">Kategori</label>
              <select class="form-select" id="kategori" name="kategori" required>
                <option selected disabled>Kategori...</option>
                <?php
                  while ($row = $dataKategori->fetch_array()) {
                    echo'
                       <option value="'.$row['kategori_id'].'">'.ucwords($row['kategori_nama']).'</option>
                    ';
                  }
                ?>
              </select>            
          </div>

          <div class="judul-container mb-4">
            <label class="col-sm-2 col-form-label">Judul</label>
            <div class="col-sm-12">
              <input type="text" class="form-control" id="judul" name="judul" required/>
            </div>
          </div>

          <div class="artikel-container mb-4">
            <label class="col-sm-2 col-form-label">Artikel</label>
            <textarea id="summernote" class="form-control" name="artikel" required></textarea>
          </div>

          <div class="mb-5">
            <button type="submit" name="tambah" class="btn btn-primary publish-btn mr-3">Publishkan</button>
          </div>
        </form>
        <!-- End form -->
      </div>
    </div>

    <!-- Start footer -->
    <footer class="footer-kelola py-3">
      <div class="container">
        <span class="d-flex justify-content-end">copyright @kelompok4 2021</span>
      </div>
    </footer>
    <!-- End footer -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- JS ALERT -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Summernote -->
    <script>
      $('#summernote').summernote({
        placeholder: 'Isi artikel...',
        tabsize: 2,
        height: 500
      });
    </script>
  </body>
</html>