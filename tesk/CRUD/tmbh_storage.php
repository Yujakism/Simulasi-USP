<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/storage.css">
</head>
<body>
    <div class="login_container">
        <form action="proses_storage.php" method="post">
            <h1>Tambah </h1>
            <label class="storage">Nama Gudang</label><br>
            <input type="text" name="nama" placeholder="Nama Gudang" required><br><br>
            <label class="storage">Lokasi Gudang</label><br>
            <input type="text" name="lokasi" placeholder="Lokasi Gudang" required><br><br>
            <button>Tambah Data</button>

        </form>
    </div>
</body>
</html>