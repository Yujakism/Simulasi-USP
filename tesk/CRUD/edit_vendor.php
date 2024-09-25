<?php
include "../koneksi.php";

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($kon, $_GET['id']);

    // Ambil data berdasarkan ID
    $sql = "SELECT * FROM vendor WHERE id = '$id'";
    $result = mysqli_query($kon, $sql);

    if (!$result) {
        die("Data Gagal Diambil: " . mysqli_error($kon));
    }

    $data = mysqli_fetch_assoc($result);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = mysqli_real_escape_string($kon, $_POST['id']);
    $nama_barang = mysqli_real_escape_string($kon, $_POST['nama_barang']);
    $jenis_barang = mysqli_real_escape_string($kon, $_POST['kontak']);
    $kuantitas_stok = mysqli_real_escape_string($kon, $_POST['kuantitas_stok']);

    $sql = "UPDATE vendor SET
            nama = '$nama_barang',
            kontak = '$jenis_barang',
            nama_barang = '$kuantitas_stok'
            WHERE id = '$id'";

    if (mysqli_query($kon, $sql)) {
        header("Location: ../vendor.php"); // Redirect ke halaman admin setelah update
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
    <link rel="stylesheet" href="../CSS/upd_vendor.css">
</head>
<body>
    <form method="POST" action="">
        <h1>Update Inventory</h1>
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($data['id']); ?>">
        <label for="nama_barang">Nama</label>
        <input type="text" id="nama_barang" name="nama_barang" value="<?php echo htmlspecialchars($data['nama']); ?>" required>
        <br>
        <label for="jenis_barang">JKontak</label>
        <input type="text" id="jenis_barang" name="kontak" value="<?php echo htmlspecialchars($data['kontak']); ?>" required>
        <br>
        <label for="kuantitas_stok">Nama Barang</label>
        <input type="text" id="kuantitas_stok" name="kuantitas_stok" value="<?php echo htmlspecialchars($data['nama_barang']); ?>" required>
        <button type="submit">Update</button>
    </form>
</body>
</html>
