<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/inven.css">
</head>
<body>
    <div class="login_container">
      <form action="proses_inven.php" method="post">
        <h1>Form Tambah Inventory</h1>
        <label class="inven">Nama Barang</label><br>
        <select name="nama">
            <option value=""></option>
            <?php 
            include "../koneksi.php";
            $sql = "SELECT * FROM vendor";
            $hsl = mysqli_query($kon, $sql);

            if($hsl -> num_rows > 0 ){
                while($data = mysqli_fetch_assoc($hsl)){
                    echo "<option value='{$data['id']}'>{$data['nama_barang']}</option>";
                }
            }
            ?>
        </select><br><br>
        <label class="inven">Jenis Barang</label><br>
        <input type="text" name="jbarang" placeholder="Jenis Barang" required><br><br>
        <label class="inven">Kuantitas Barang</label><br>
        <input type="text" name="kbarang" placeholder="Kuantitas Barang" required><br><br>
        <label class="inven">Lokasi Gudang</label><br>
        <select name="lokasi">
            <option value=""></option>
            <?php 
            include "../koneksi.php";
            $sql = "SELECT * FROM storage";
            $hsl = mysqli_query($kon, $sql);

            if($hsl -> num_rows > 0 ){
                while($data = mysqli_fetch_assoc($hsl)){
                    echo "<option value='{$data['id']}'>{$data['nama_gudang']}</option>";
                }
            }
            ?>
        </select><br><br>
        <label class="inven">Serial Number</label><br>
        <input type="number" name="snumber" placeholder="Serial Number" required><br><br>
        <label class="inven">Harga</label><br>
        <input type="text" name="harga" placeholder="harga" required><br><br>
        <button>Tambah Data</button>
      </form>
    </div>
</body>
</html>