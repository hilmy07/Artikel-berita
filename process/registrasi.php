<?php 
    require '../function/config.php';
    require '../function/func_registrasi.php';
        if(isset($_POST["register"])){

            if( registrasi ($_POST)>0){
                echo "<script>alert('user berhasil ditambahkan')</script>";
            }else{
                echo mysqli_error($dbconnect);
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

     <!-- Mystyle -->
    <link rel="stylesheet" type="text/css" href="../css/styleAkun.css">

    <title>Registrasi</title>
  </head>
  <body>
    <div class="container text-center mt-5">
        <div class="header">
            <h2 class="mb-3">Registrasi</h2>
        </div>

        <form action="" method="POST">
            <label for="username"></label>
            <input type="text" class="form-control mb-2" name="username" id="username" placeholder="Email" required>

            <label for="password"></label>
            <input type="password" class="form-control mb-2" name="password" id="password" placeholder="Password" required>

            <label for="password2"></label>
            <input type="password2" class="form-control mb-2" name="password2" id="password2" placeholder="Konfirmasi Password" required>

            <div class="mt-5 mb-3">
                <button type="submit" class="btn btn-primary btn-block btn-akun" name="register">Register</button>
            </div>
            
        </form>
        
        <p>Sudah memiliki akun?<a href="login.php">Login</a></p>
    </div>
  

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>