<?php
include "../koneksi.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "DELETE FROM inventory WHERE id = '$id'";
    $hsl = mysqli_query($kon, $sql);

    if($hsl){
        echo "<script>
        alert('Data berhasil dihapus');
        location.href = '../inventory.php';
        </script>";
    } else {
        echo "<script>
        alert('Gagal menghapus data: " . mysqli_error($kon) . "');
        location.href = '../inventory.php';
        </script>";
    }
} else {
    echo "<script>
    alert('ID tidak ditemukan');
    location.href = 'inventory.php';
    </script>";
}
?>
