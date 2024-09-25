<?php
session_start();
include "koneksi.php";
if($_SERVER["REQUEST_METHOD"] = "POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($kon, $username);
    $password = mysqli_real_escape_string($kon, $password);

    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $hsl = mysqli_query($kon, $sql);

    if($hsl -> num_rows > 0 ){
        while($data = mysqli_fetch_assoc($hsl)){
        $_SESSION['username'] = $username;
        $_SESSION['level'] = $data['level'];

        if($data['level'] == 'admin'){
            header("location:vendor.php");
        }else if($data['level'] == 'user'){
            header("location:user.php");
        }
       }
    }else{
        echo "gagal cik";
    }
}
?>