<?php 
if($_POST){
    $nama = $_POST['nama'];
    $jbarang = $_POST['jbarang'];
    $kbarang = $_POST['kbarang'];
    $lokasi = $_POST['lokasi'];
    $snumber = $_POST['snumber'];
    $harga = $_POST['harga'];

    if(empty($nama) || empty($jbarang) || empty($kbarang)|| empty($lokasi) || empty($snumber) || empty($harga)){
        echo "<script>
        alert('Gagal: Semua field harus diisi!');
        location= 'tmbh_inven.php';
        </script>";
    } else {
        include "../koneksi.php";

        $sql = "INSERT INTO inventory (nama_barang, jenis_barang, kuantitas_stok, lokasi_gudang, serial_number, harga)
        VALUES ('$nama', '$jbarang', '$kbarang', '$lokasi', '$snumber', '$harga')";
        $hsl = mysqli_query($kon, $sql);

        if($hsl){
            echo "<script>
            alert('Berhasil menambahkan data!');
            location= '../inventory.php';
            </script>";
        } else {
            echo "<script>
            alert('Gagal menyimpan data!');
            location.href = 'tmbh_inven.php';
            </script>";
        }
    }
}
?>
