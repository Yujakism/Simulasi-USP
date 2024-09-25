<?php
include "../koneksi.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "DELETE FROM storage WHERE id = '$id'";
    $hsl = mysqli_query($kon, $sql);

    if($hsl){
        echo "<script>
        alert('Data berhasil dihapus');
        location.href = '../storage.php';
        </script>";
    } else {
        echo "<script>
        alert('Gagal menghapus data: " . mysqli_error($kon) . "');
        location.href = '../storage.php';
        </script>";
    }
} else {
    echo "<script>
    alert('ID tidak ditemukan');
    location.href = 'storage.php';
    </script>";
}
?>
