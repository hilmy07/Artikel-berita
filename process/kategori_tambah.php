<?php
  include '../function/config.php';

   $dataKategori= mysqli_query($dbconnect,"SELECT * FROM kategori");

   if (isset($_POST['tambah'])) {
     $kategori = $_POST['kategori'];
     $deskripsi = $_POST['deskripsi'];

     mysqli_query($dbconnect, "INSERT INTO kategori VALUES('', '$kategori', '$deskripsi')");



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

    <!-- My Style -->
    <link rel="stylesheet" type="text/css" href="../css/style.css">

    <!-- Summernote -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

    <title>Tambah Kategori</title>
  </head>
  <body>
    <div class="container">
      <!-- Start button dashboard -->
      <div class="container">
        <a class="btn btn-primary mt-5" href="dashboard.php" role="button">Dashboard</a>
      </div>
      <!-- End button dashboard -->

      <div class="row mt-5 mb-3">
        <h1 class="text-center">Tambah Kategori</h1>
      </div>

      <div class="row">
        <!-- Strat form -->
        <form method="post">
          <div class="judul-container mb-4">
            <label class="col-sm-2 col-form-label">Kategori</label>
            <div class="col-sm-12">
              <input type="text" class="form-control" name="kategori" required/>
            </div>
          </div>


          <div class="artikel-container mb-4">
            <label class="col-sm-2 col-form-label">Deskripsi</label>
            <div class="col-sm-12">
              <textarea id="summernote" class="form-control" name="deskripsi" required></textarea>
            </div>
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

    <script>
      $('#summernote').summernote({
        placeholder: 'Deskripsi kategori...',
        tabsize: 2,
        height: 300
      });
    </script>
  </body>
</html>