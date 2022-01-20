<?php

    function registrasi($data){
        global $dbconnect;
        $username = strtolower(stripslashes($data["username"]));
        $password = mysqli_real_escape_string($dbconnect,$data["password"]);
        $password2 = mysqli_real_escape_string($dbconnect,$data["password2"]);

        // cek username sudah ada / belum
        $result = mysqli_query($dbconnect,"SELECT username FROM user WHERE username='$username'");
        
        if(mysqli_fetch_assoc($result)){
            echo "<script>
                    alert('User sudah terdaftar!')
                </script>";
                return false;
        }
        
        if($password !== $password2){
            echo "<script>
                alert('Konfirmasi password tidak sesuai!')
            </script>";
            return false;
        }
        
        // enkripsi password
        $password = password_hash($password,PASSWORD_DEFAULT);
        
        // insert ke database
        mysqli_query($dbconnect, "INSERT INTO user VALUES('','$username','$password')");

        return mysqli_affected_rows($dbconnect);
    }
    
?>