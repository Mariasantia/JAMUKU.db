<?php
session_start();
$_SESSION['keranjang'] = [];

echo "<h1>Terima kasih!</h1>";
echo "<p>Pesanan Anda telah diproses.</p>";
echo "<a href='index.php'>Kembali ke beranda</a>";
?>
