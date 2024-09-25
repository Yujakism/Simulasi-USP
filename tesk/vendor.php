<?php 
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin.css">
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
FROM vendor
LEFT JOIN inventory ON inventory.nama_barang = vendor.id
LEFT JOIN storage ON inventory.lokasi_gudang = storage.id
WHERE vendor.nama LIKE '%$search%'
ORDER BY vendor.id";


$hsl = mysqli_query($kon, $sql);



if(!$hsl){

    die ("Data Gagal Diambil: " . mysqli_error($kon));

}
?>

     <div id="vendor" class="table-selection">
            <h2>Vendor Table</h2>
            <table>
                <tr>
                    <th>Id Vendor</th>
                    <th>Nama Vendor</th>
                    <th>Kontak Vendor</th>
                    <th>Nama Barang</th>
                    <th>aksi</th>
                </tr>
                <?php 
                
                if($hsl -> num_rows > 0){
                    while($data = mysqli_fetch_assoc($hsl)){

                        echo "<tr>";
                        echo "<td>{$data['vendor_id']}</td>";
                        echo "<td>{$data['nama']}</td>";
                        echo "<td>{$data['kontak']}</td>";
                        echo "<td>{$data['vendor_brg']}</td>";
                        echo "<td><a href='CRUD/hapus_vendor.php?id={$data['vendor_id']}' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'><button>Hapus</button></a>
                              <a href='CRUD/edit_vendor.php?id={$data['vendor_id']}'><button>Edit</button></a></td>";
                        echo "</tr>";
                    }
                }
                
                ?>
            </table><br>
            <a href = "CRUD/tmbh_vendor.php">
                <button>Tambah Data</button>
            </a>
            &nbsp;
           
     </div>
   </div>
</body>
</html>
   
   