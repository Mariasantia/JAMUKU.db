<?php
session_start();
include 'db.php';
$total = 0;

echo "<h1>Proses Pembayaran</h1>";

if (isset($_SESSION['keranjang'])) {
    foreach ($_SESSION['keranjang'] as $id => $qty) {
        $stmt = $db->prepare("SELECT * FROM jamu WHERE id = ?");
        $stmt->execute([$id]);
        $item = $stmt->fetch();
        $subtotal = $item['harga'] * $qty;
        $total += $subtotal;
        echo "<p>{$item['nama']} x $qty = Rp$subtotal</p>";
    }

    echo "<h2>Total Bayar: Rp$total</h2>";
    unset($_SESSION['keranjang']); // Kosongkan keranjang setelah bayar
} else {
    echo "<p>Keranjang kosong</p>";
}
echo "<a href='index.php'>Kembali ke Daftar</a>";

