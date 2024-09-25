<?php 
if($_POST){
    $nama = $_POST['nama'];
    $kontak = $_POST['kontak'];
    $barang = $_POST['barang'];

    if(empty($nama) || empty($kontak) || empty($barang)){
        echo "<script>;
        alert('gagal');
        location='tmbh_vendor.php';
        </script>";
    }else{
        include "../koneksi.php";

        $sql = "INSERT INTO vendor (nama, kontak, nama_barang)
        VALUES ('$nama', '$kontak', '$barang')";
        $hsl = mysqli_query($kon, $sql);

        if($hsl){
            echo "<script>;
            alert('berhasil');
            location='../vendor.php';
            </script>";
        }
    }
}
?>