<?php
include 'db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $db->exec("INSERT INTO produk (nama, harga) VALUES ('$nama', $harga)");
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="post">
        <h1>Tambah Produk</h1>
        <label>Nama Produk</label>
        <input name="nama" required>

        <label>Harga</label>
        <input name="harga" type="number" required>

        <button type="submit">Simpan</button>
        <a href="index.php" class="btn">Kembali</a>
    </form>
</body>
</html>

