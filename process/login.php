<?php 
    session_start();

    require '../function/config.php';

    // cek cookie
    if ( isset($_COOKIE['id']) && isset($_COOKIE['key'])){
        $id = $_COOKIE['id'];
        $key = $_COOKIE['key'];

        // ambil username berdasarkan id
        $result = mysqli_query($dbconnect,"SELECT username FROM user WHERE id=$id");
        $row = mysqli_fetch_assoc($result);

        // cek cookie dan username
        if( $key === hash('sha256',$row['username']) ){
            $_SESSION['login'] = true;
        }
    }

    // cek session
    if( isset($_SESSION["login"]) ) {
        header("Location: index.php");
        exit;
    }

    // cek login
    if(isset($_POST["login"])){
            $username = $_POST["username"];
            $password = $_POST["password"];

            $result = mysqli_query($dbconnect,"SELECT * FROM user WHERE username='$username'");

            // cek username
            if(mysqli_num_rows($result) === 1 ){
                // cek password
                $row = mysqli_fetch_assoc($result);
                if(password_verify($password,$row["password"])){
                    // set session
                    $_SESSION["login"] = true;

                    // cek remember me
                    if(isset($_POST['remember'])){
                        // buat cookie
                        setcookie('id',$row['id'],time()+86400);
                        setcookie('key',hash('sha256',$row['username']),time()+86400);
                    }
                    header("Location:index.php");
                    exit;
                }
            }

            $error = true;
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
    <title>Login</title>

    <!-- Mystyle -->
    <link rel="stylesheet" type="text/css" href="../css/styleAkun.css">

  </head>
  <body>
    <div class="container text-center mt-5">
        <div class="header">
            <h2 class="mb-3">Login</h2>
        </div>
        <form action="" method="POST" id="form">
            <label for="username"></label>
            <input type="email" class="form-control" name="username" id="username" placeholder="Email" required>

            <label for="password"></label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>

            <input type="checkbox" name="remember" id="remember">
            <label for="remember" class="mt-3">Remember Me</label>

            <div class="mt-3 mb-3">
                <button type="submit" class="btn btn-primary btn-block btn-akun" name="login" >Login</button>
            </div>
            
        </form>
        <?php if(isset ($error) ) : ?>
            <p style="color: red; font-style:italic; ">Username atau password salah</p>
        <?php endif; ?>
        <p>Belum memiliki akun?<a href="registrasi.php">Register</a></p>
    </div>
  

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>