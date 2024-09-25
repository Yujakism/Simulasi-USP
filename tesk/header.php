<?php 
include "koneksi.php";
session_start();
if(!isset($_SESSION['username'])){
    header("location:login.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
<div class="hed">
<h1>Selamat Datang Admin <?= $_SESSION['username']?> !</h1>
</div>
</body>
</html>