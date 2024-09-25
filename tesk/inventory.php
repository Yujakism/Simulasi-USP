<?php 
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include "sidebar.php"; ?>
    <div class="content">
        <?php include "header.php"; ?>
        <div class="search-container">
                <form method="GET" action="">
                    <input type="text" name="search" placeholder="Cari barang..." value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                    <button type="submit">Cari</button>
                </form>
        </div>
            <?php

include "koneksi.php";



$search = isset($_GET['search']) ? mysqli_real_escape_string($kon, $_GET['search']) : '';
$sql = "SELECT inventory.id AS inventory_id, inventory.nama_barang, inventory.jenis_barang, inventory.kuantitas_stok, inventory.lokasi_gudang, inventory.serial_number, inventory.harga,
storage.id AS storage_id, storage.nama_gudang, storage.lokasi,
vendor.id AS vendor_id, vendor.nama, vendor.kontak, vendor.nama_barang AS vendor_brg, vendor.nomor_invoice
FROM inventory
INNER JOIN storage ON inventory.lokasi_gudang = storage.id
INNER JOIN vendor ON inventory.nama_barang = vendor.id
WHERE vendor.nama_barang LIKE '%$search%'
ORDER BY inventory.id";

$hsl = mysqli_query($kon, $sql);



if(!$hsl){

    die ("Data Gagal Diambil: " . mysqli_error($kon));

}



// Cek jika ada stok yang habis

$showAlert = false;

if($hsl->num_rows > 0) {

    while($data = mysqli_fetch_assoc($hsl)){

        if($data['kuantitas_stok'] == 0) {

            $showAlert = true;

            break;

        }

    }

    // Reset pointer hasil query ke awal

    mysqli_data_seek($hsl, 0);

}

?>



<?php if ($showAlert): ?>

    <div class="alert">Stok anda habis, harap perbarui jika kuantitas stok 0.</div>

<?php endif; ?>


     <div id="vendor" class="table-selection">
            <h2>Inventory Table</h2>
            <table>
    <tr>
        <th>Id</th>
        <th>Nama Barang</th>
        <th>Jenis Barang</th>
        <th>Kuantitas Barang</th>
        <th>Lokasi Gudang</th>
        <th>Serial Number</th>
        <th>Harga</th>
        <th>Aksi</th> <!-- Kolom baru untuk aksi -->
    </tr>
    <?php 
  

    if($hsl -> num_rows > 0){
        while($data = mysqli_fetch_assoc($hsl)){
            $alertClass = $data['kuantitas_stok'] == 0 ? 'alert' : '';
            echo "<tr>";
            echo "<td>{$data['inventory_id']}</td>";
            echo "<td>{$data['vendor_brg']}</td>";
            echo "<td>{$data['jenis_barang']}</td>";
            echo "<td>{$data['kuantitas_stok']}</td>";
            echo "<td>{$data['lokasi']}</td>";
            echo "<td>{$data['serial_number']}</td>";
            echo "<td>{$data['harga']}</td>";
            echo "<td><a href='CRUD/hapus_inven.php?id={$data['inventory_id']}' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'><button>Hapus</button></a> &nbsp
                  <a href='CRUD/edit_inven.php?id={$data['inventory_id']}'><button>Edit</button></a></td>";
            echo "</tr>";
        }
    }
    ?>
</table>
<br>
            <a href = "CRUD/tmbh_inven.php">
                <button>Tambah Data</button>
            </a>
            &nbsp;
           
     </div>
   </div>
</body>
</html>