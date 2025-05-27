<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head><title>Keranjang</title><link rel="stylesheet" href="style.css"></head>
<body>
<h1>Keranjang</h1>
<a href="index.php">Kembali</a>
<ul>
<?php
if (isset($_SESSION['keranjang'])) {
    foreach ($_SESSION['keranjang'] as $id => $qty) {
        echo "<li>ID: $id - Jumlah: $qty
            <a href='hapus.php?id=$id'>Hapus</a></li>";
    }
} else {
    echo "<p>Keranjang kosong</p>";
}
?>
</ul>
<a href="bayar.php">Bayar</a>
</body>
</html>

