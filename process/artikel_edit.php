<?php
  include '../function/config.php';

  if (isset($_GET['id'])) {
    $id = $_GET['id'];

    //deteksi data di db berdasarkan id
    $data = mysqli_query($dbconnect, "SELECT * FROM artikel INNER JOIN kategori ON artikel.kategori_id = kategori.kategori_id WHERE artikel_id = '$id'");

    //mengambil data yg sudah di deteksi
    $data = mysqli_fetch_assoc($data);
  }

  if (isset($_POST['edit'])) {
    $kategori = $_POST['kategori']; 
    $judul = $_POST['judul'];  
    $artikel = $_POST['artikel']; 
    $gambarLama = $_POST['gambarlama'];


    // cek apakah user mengedit gambar atau tidak
    if ($_FILES['gambar']['error'] === 4) {
      $gambar = $gambarLama;
    }
    else{
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
    }

    mysqli_query($dbconnect, "UPDATE artikel SET kategori_id='$kategori', artikel_judul='$judul', artikel_isi='$artikel', artikel_gambar='$gambar' WHERE artikel_id = '$id' ");

    header("location:artikel_kelola.php");
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

    <!-- Summernote -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

    <title>Edit Artikel</title>
  </head>
  <body>
    <div class="container">
      <!-- Start button halam utama -->
      <div class="container">
        <a class="btn btn-primary mt-5" href="dashboard.php" role="button">Dashboard</a>
      </div>
      <!-- End buttin halaman utama -->

      <div class="judul mt-5 mb-5">
        <h1 class="text-center">Edit Artikel</h1>
      </div>

      <!-- Strat form -->
      <form method="POST" enctype="multipart/form-data">
        <div class="mb-5 kategori-container row mb-4">
          <div class="col-lg-9 kategori-edit">
            <select class="form-control" id="example-select" name="kategori">
            <?php 
              $dataKategori = mysqli_query($dbconnect, "SELECT * FROM kategori");
                while ($row = $dataKategori-> fetch_array()) {
                  echo'
                    <option value="'.$row['kategori_id'].'"> 
                      '.ucwords($row['kategori_nama']).'
                    </option>
                  ';
                }
              ?>
            </select>
          </div>

          <div class="col-lg-3">
            <!-- gamabr lama -->
            <input type="hidden" name="gambarlama" value="<?= $data['artikel_gambar']; ?>">

            <div class="gambar mb-2">
              <img src="img/<?= $data['artikel_gambar']; ?>" width="80">
            </div>
            <input type="file" name="gambar">
          </div>
        </div>
      

        <div class="mb-5 judul-container">
          <label class="col-sm-4 col-form-label"><b>Judul</b></label>
          <input type="text" class="form-control" name="judul" value="<?php echo $data['artikel_judul'] ?>">
        </div>

        <div class="mb-5 artikel-container">
          <label class="col-sm-4 col-form-label"><b>Artikel</b></label>
          <textarea id="summernote" class="form-control" name="artikel" required><?php echo $data['artikel_isi'] ?></textarea>
        </div>

        <div class="mb-5">
          <button type="submit" class="btn btn-primary" name="edit">Update</button>
        </div>
      </form>
      <!-- End form -->
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
        placeholder: 'Isi artikel...',
        tabsize: 2,
        height: 500
      });
    </script>
  </body>
</html>
