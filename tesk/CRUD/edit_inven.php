<?php
include "../koneksi.php";

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($kon, $_GET['id']);

    // Ambil data berdasarkan ID
    $sql = "SELECT * FROM inventory WHERE id = '$id'";
    $result = mysqli_query($kon, $sql);

    if (!$result) {
        die("Data Gagal Diambil: " . mysqli_error($kon));
    }

    $data = mysqli_fetch_assoc($result);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = mysqli_real_escape_string($kon, $_POST['id']);
    $nama_barang = mysqli_real_escape_string($kon, $_POST['nama_barang']);
    $jenis_barang = mysqli_real_escape_string($kon, $_POST['jenis_barang']);
    $kuantitas_stok = mysqli_real_escape_string($kon, $_POST['kuantitas_stok']);
    $lokasi = mysqli_real_escape_string($kon, $_POST['lokasi']);
    $barcode = mysqli_real_escape_string($kon, $_POST['barcode']);
    $harga = mysqli_real_escape_string($kon, $_POST['harga']);

    $sql = "UPDATE inventory SET
            nama_barang = '$nama_barang',
            jenis_barang = '$jenis_barang',
            kuantitas_stok = '$kuantitas_stok',
            lokasi_gudang = '$lokasi',
            serial_number = '$barcode',
            harga = '$harga'
            WHERE id = '$id'";

    if (mysqli_query($kon, $sql)) {
        header("Location: ../inventory.php"); // Redirect ke halaman admin setelah update
        exit();
    } else {
        die("Data Gagal Diupdate: " . mysqli_error($kon));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Inventory</title>
    <link rel="stylesheet" href="../CSS/upd_inven.css">
</head>
<body>
    <form method="POST" action="">
        <h1>Update Inventory</h1>
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($data['id']); ?>">
        <label for="nama_barang">Nama Barang:</label>
        <select name="nama_barang" required>
            <option value="<?php echo htmlspecialchars($data['nama_barang']); ?>"> <?php echo htmlspecialchars($data['nama_barang']); ?></option>
            <?php 
            include "koneksi.php";
            $sql = "SELECT * FROM vendor";
            $hsl = mysqli_query($kon, $sql);

            if($hsl){
                while($dat = mysqli_fetch_assoc($hsl)){
                    $sel = ($dat['id'] == $dat['nama_barang']) ? 'selected' : '';
                    echo "<option value='{$dat['id']}' $sel>{$dat['nama_barang']}</option>";
                }
            }
            ?>
        </select>
        <br>
        <label for="jenis_barang">Jenis Barang:</label>
        <input type="text" id="jenis_barang" name="jenis_barang" value="<?php echo htmlspecialchars($data['jenis_barang']); ?>" required>
        <br>
        <label for="kuantitas_stok">Kuantitas Stok:</label>
        <input type="number" id="kuantitas_stok" name="kuantitas_stok" value="<?php echo htmlspecialchars($data['kuantitas_stok']); ?>" required>
        <br>
        <label for="lokasi">Lokasi Gudang:</label>
        <select name="lokasi" required>
            <option value="<?php echo htmlspecialchars($data['lokasi_gudang']); ?>"> <?php echo htmlspecialchars($data['lokasi_gudang']); ?></option>
            <?php 
            include "koneksi.php";
            $sql = "SELECT * FROM storage";
            $hsl = mysqli_query($kon, $sql);

            if($hsl){
                while($dat = mysqli_fetch_assoc($hsl)){
                    $sel = ($dat['id'] == $dat['lokasi']) ? 'selected' : '';
                    echo "<option value='{$dat['id']}' $sel>{$dat['lokasi']}</option>";
                }
            }
            ?>
        </select>
        <br>
        <label for="barcode">Barcode:</label>
        <input type="text" id="barcode" name="barcode" value="<?php echo htmlspecialchars($data['serial_number']); ?>"required >
        <br>
        <label for="harga">Harga @item:</label>
        <input type="text" id="harga" name="harga" value="<?php echo htmlspecialchars($data['harga']); ?>" required>
        <br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
