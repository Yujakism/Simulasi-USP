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
$search = isset($_GET['search']) ? mysqli_real_escape_string($kon, $_GET['search']) : '';
$sql = "SELECT inventory.id AS inventory_id, inventory.nama_barang, inventory.jenis_barang, inventory.kuantitas_stok, inventory.lokasi_gudang, inventory.serial_number, inventory.harga,
storage.id AS storage_id, storage.nama_gudang, storage.lokasi,
vendor.id AS vendor_id, vendor.nama, vendor.kontak, vendor.nama_barang AS vendor_brg, vendor.nomor_invoice
FROM storage
LEFT JOIN inventory ON inventory.lokasi_gudang = storage.id
LEFT JOIN vendor ON inventory.nama_barang = vendor.id
WHERE storage.nama_gudang LIKE '%$search%'
ORDER BY storage.id";


$hsl = mysqli_query($kon, $sql);



if(!$hsl){

    die ("Data Gagal Diambil: " . mysqli_error($kon));

}
?>
     <div id="vendor" class="table-selection">
            <h2>Storage Table</h2>
            <table>
                <tr>
                    <th>Id </th>
                    <th>Nama Gudang</th>
                    <th>Lokasi Gudang</th>
                    <th>Aksi</th>
                </tr>
                <?php
                if($hsl -> num_rows > 0){
                    while($data = mysqli_fetch_assoc($hsl)){
                        echo "<tr>";
                        echo "<td>{$data['storage_id']}</td>";
                        echo "<td>{$data['nama_gudang']}</td>";
                        echo "<td>{$data['lokasi']}</td>";
                        echo "<td><a href='CRUD/hapus_storage.php?id={$data['storage_id']}' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'><button>Hapus</button></a>
                                <a href='CRUD/edit_storage.php?id={$data['storage_id']}'><button>Edit</button></a></td>";
                        echo "</tr>";
                    }
                }
                ?>
            </table><br>
            <a href = "CRUD/tmbh_storage.php">
                <button>Tambah Data</button>
            </a>
            &nbsp;
           
     </div>
   </div>
</body>
</html>