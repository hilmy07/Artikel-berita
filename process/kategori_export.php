<?php
  include '../function/config.php';

  $dataKategori = mysqli_query($dbconnect,"SELECT * FROM kategori");
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Jquery -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- My style -->
    <link rel="stylesheet" type="text/css" href="../css/style.css">

    <title>Export Kategori</title>
  </head>
  <body>
    <!-- Start button halam utama -->
      <div class="container">
        <a class="btn btn-primary mt-5" href="dashboard.php" role="button">Dashboard</a>
      </div>
      <!-- End buttin halaman utama -->

    <!-- Start data -->
    <div class="container">
      <div class="table-responsive">
        <h1 class="text-center mt-5 mb-5">KATEGORI</h1>
          <table class="table" id="kategori_table">
            <thead class="table-primary">
              <tr class="text-center">
                <td>No</td>
                <td>Nama</td>
                <td>Deskripsi</td>
              </tr>
            </thead>
            <tbody>
              <?php  
              $no=1;
                while ($rowKategori = $dataKategori->fetch_array()) {
              ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo ucwords($rowKategori['kategori_nama']); ?></td>
                  <td><?php echo ucfirst($rowKategori['kategori_deskripsi']);?></td>
                </tr>
              <?php
              $no++;
                }
              ?>
            </tbody>
          </table>

          <!-- Start export button -->
          <button class="btn btn-success mt-4" onclick="kategoriTableToExcel()">Export XLS</button>
          <a href="kategori_cetak_pdf.php" class="btn btn-success mt-4" role="button">Cetak PDF</a>
          <!-- End export button -->
      </div>
    </div>
    <!-- End data -->


     <!-- Start footer -->
    <footer class="footer-kelola py-3">
      <div class="container">
        <span class="d-flex justify-content-end">copyright @kelompok4 2021</span>
      </div>
    </footer>
    <!-- End footer -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Export XLS -->
    <script src="../js/exportXLS.js"></script>
  </body>
</html>