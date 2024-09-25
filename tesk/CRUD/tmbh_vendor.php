<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/vendor.css">
</head>
<body>
    <div class="login_container">
        <form action="proses_vendor.php" method="post">
            <h1>Tambah Data</h1>
            <label class="vendor">Nama Vendor</label><br>
            <input type="text" name="nama" placeholder="Nama Vendor" required><br><br>
            <label class="vendor">Kontak Vendor</label><br>
            <input type="text" name="kontak" placeholder="Kontak Vendor" required><br><br>
            <label class="vendor">Nama Barang</label><br>
            <input type="text" name="barang" placeholder="Nama Barang" required><br><br>
            <button>Tambah Data</button>
        </form> 
    </div>
</body>
</html>