<?php
  session_start();

  if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
  }

  include '../function/config.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Chart JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <!-- My style -->
    <link rel="stylesheet" type="text/css" href="../css/style.css">

    <title>Dashboard</title>
  </head>
  <body>
    <div class="container pt-5">
      <div class="row">
        <!-- Start side menu -->
        <div class="col-lg-4 mb-4">
          <div class="card">
            <div class="card-body">
              <!-- Title -->
              <h3 class="side-menu-judul mb-3"><a href="" style="text-decoration: none; color: black ;">Dashboard</a></h3>

              <!-- Strat kelola artikel -->
               <div class="dropdown mb-3">
                <button class="btn dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                  Kelola Artikel
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                  <li><a class="dropdown-item" type="button" href="artikel_tambah.php">Tambah Artikel</a></li>
                  <li><a class="dropdown-item" type="button" href="artikel_kelola.php">Kelola Artikel</a></li>
                </ul>
              </div>
              <!-- End kelola artikel -->

              <!-- Strat kelola kategori -->
              <div class="dropdown mb-3">
                <button class="btn dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                  Kelola Kategori
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                 <li><a class="dropdown-item" type="button" href="kategori_tambah.php">Tambah Kategori</a></li>
                  <li><a class="dropdown-item" type="button" href="kategori_kelola.php">Kelola Kategori</a></li>
                </ul>
              </div>
              <!-- End kelola kategori -->

              <!-- Start halam utama -->
              <button class="btn hlmnUtama-btn" type="button" aria-expanded="false">
                  <a href="index.php" style="text-decoration: none; color: black;">Halaman Utama</a>
              </button>
              <!-- End halaman utama -->
            </div>
          </div>
        </div>
        <!-- End start menu -->

        <!-- Start konten -->
        <div class="col-lg-8">
          <div class="card mb-4">
            <div class="card-body">
              <!-- Start bar chart -->
              <div id="chart-container bar-chart">
                <canvas id="bar_chart"></canvas>
              </div>
              <!-- End bar chart -->
            </div>
          </div>

          <div class="card">
            <div class="card-body">
                <!-- Start pie chart -->
                <div id="chart-container pie-chart">
                 <canvas id="pie_chart"></canvas>
                </div>
                <!-- End pie chart -->
            </div>
          </div>
        </div>
        <!-- End konten -->
      </div>
    </div>

    <!-- Start footer -->
    <footer class="footer-kelola py-3">
      <div class="container">
        <span class="d-flex justify-content-end">copyright @kelompok4 2021</span>
      </div>
    </footer>
    <!-- End footer -->


    <!-- Chart script -->
    <!-- Strat pie chart -->
    <script>
      var ctx = document.getElementById('pie_chart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: [<?php
                        $dataKategori = mysqli_query($dbconnect, "SELECT * FROM kategori ORDER BY kategori_id ASC");
                        while($rowKategori = mysqli_fetch_array($dataKategori)){
                            echo "'".$rowKategori['kategori_nama']."',";
                        }
                    ?>],
                datasets: [{
                    label: '# of Votes',
                    data: [<?php
                            $dataKategori = mysqli_query($dbconnect, "SELECT * FROM kategori ORDER BY kategori_id ASC");
                            while($rowKategori= mysqli_fetch_array($dataKategori)) {
                                $kategori_id = $rowKategori['kategori_id'];

                                $cariDataKategori = mysqli_query($dbconnect, "SELECT * FROM artikel WHERE kategori_id LIKE '%".$kategori_id."%'") or die(mysqli_error());
                                $dataKategoriJml   = mysqli_num_rows($cariDataKategori);

                                echo $dataKategoriJml.',';
                            }

                        ?>],
                    backgroundColor: [
                        '#76c100',
                        '#f65a05',
                        '#febb00',
                        '#e70304',
                        '#fe67da',
                    ],
                    borderWidth: 0
                }]
            },
            options: {
              scales: {
                y: {
                  beginAtZero: true
                }
              },
              indexAxis: 'y',
              responsive: true,
              plugins: {
                legend: {
                  position: 'top',
                },
                title: {
                  display: true,
                  text: 'Intensitas Penggunaan Kategori',
                }
              }
            },
        });
    </script>
    <!-- End pie chart -->


    <!-- Start bar chart -->
    <script>
      var bar = document.getElementById('bar_chart').getContext('2d');
      var barChart = new Chart(bar,{
        type: 'bar',
        data: {
          labels: [<?php
              $dataArtikel = mysqli_query($dbconnect,"SELECT * FROM artikel");
              while ($row = $dataArtikel->fetch_array()) {
                echo "'".substr($row['artikel_judul'], 0,20)."',";
              }
            ?>],
          datasets: [{
            label: 'Judul artikel',
            data: [<?php
                $dataArtikel= mysqli_query($dbconnect,"SELECT * FROM artikel INNER JOIN kategori ON artikel.kategori_id = kategori.kategori_id");

                function countLike($artikel_id){
                  include '../function/config.php';

                  $dataArtikelLike2= mysqli_query($dbconnect,"SELECT * FROM artikel_like WHERE artikel_id IN ('$artikel_id')");
                  $dataArtikelLikeNum2 = mysqli_num_rows($dataArtikelLike2);
                  return $dataArtikelLikeNum2;
              }

              while ($rowArtikel = $dataArtikel->fetch_array()) {
                echo "'".countLike($rowArtikel['artikel_id'])."',";
              }
              ?>],
            backgroundColor: [
                '#76c100'
            ],
            borderWidth: 0
          }]
        },
        options: {
              scales: {
                y: {
                  beginAtZero: true
                }
              },
              indexAxis: 'y',
              responsive: true,
              plugins: {
                legend: {
                  position: 'top',
                },
                title: {
                  display: true,
                  text: 'Intensitas Like Artikel',
                }
              }
            },
      })
    </script>
    <!-- End bar chart -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>