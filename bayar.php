<?php
session_start();
include 'db.php';

// Simulasi proses pembayaran
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['bayar'])) {
    // Kosongkan keranjang
    $_SESSION['keranjang'] = [];
    $pesan = "Pembayaran berhasil!";
} else {
    // Cek apakah ada barang di keranjang
    if (empty($_SESSION['keranjang'])) {
        $pesan = "Keranjang kosong.";
    } else {
        $pesan = "Total item: " . count($_SESSION['keranjang']);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Pembayaran</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Keranjang Belanja</h1>
        <p><?php echo $pesan; ?></p>

        <?php if (!isset($_POST['bayar'])): ?>
            <form method="post">
                <button type="submit" name="bayar">Bayar Sekarang</button>
            </form>
        <?php endif; ?>

        <a href="index.php">Kembali</a>
    </div>
</body>
</html>

