<?php
include "../koneksi.php";

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($kon, $_GET['id']);

    // Ambil data berdasarkan ID
    $sql = "SELECT * FROM storage WHERE id = '$id'";
    $result = mysqli_query($kon, $sql);

    if (!$result) {
        die("Data Gagal Diambil: " . mysqli_error($kon));
    }

    $data = mysqli_fetch_assoc($result);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = mysqli_real_escape_string($kon, $_POST['id']);
    $nama = mysqli_real_escape_string($kon, $_POST['nama']);
    $lokasi = mysqli_real_escape_string($kon, $_POST['lokasi']);
    

    $sql = "UPDATE storage SET
            nama_gudang = '$nama',
            lokasi = '$lokasi'
            WHERE id = '$id'";

    if (mysqli_query($kon, $sql)) {
        header("Location: ../storage.php");
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
    <link rel="stylesheet" href="../CSS/upd_storage.css">
</head>
<body>
    <form method="POST" action="">
        <h1>Update Inventory</h1>
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($data['id']); ?>">
        <label for="nama_barang">Nama Gudang:</label>
        <input type="text" id="nama_barang" name="nama" value="<?php echo htmlspecialchars($data['nama_gudang']); ?>" required>
        <br>
        <label for="lokasi">Lokasi Gudang:</label>
        <input type="text" id="lokasi" name="lokasi" value="<?php echo htmlspecialchars($data['lokasi']); ?>" required>
        <br>
        
        <button type="submit">Update</button>
    </form>
</body>
</html>
