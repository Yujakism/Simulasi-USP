<?php 
if($_POST){
    $nama = $_POST['nama'];
    $lokasi = $_POST['lokasi'];

    if(empty($nama) || empty($lokasi)){
        echo "<script>;
        alert('gagal');
        location='tmbh_storage.php';
        </script>";
    }else{
        include "../koneksi.php";

        $sql = "INSERT INTO storage (nama_gudang, lokasi)
        VALUES ('$nama', '$lokasi')";
        $hsl = mysqli_query($kon, $sql);

        if($hsl){
            echo "<script>;
            alert('berhasil');
            location='../storage.php';
            </script>";
        }
    }
}
?>