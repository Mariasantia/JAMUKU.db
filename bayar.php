<?php
include 'db.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Keranjang</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Keranjang Belanja</h1>
        <?php
        $total = 0;
        if (!empty($_SESSION['keranjang'])) {
            echo "<table><tr><th>Nama</th><th>Jumlah</th><th>Subtotal</th></tr>";
            foreach ($_SESSION['keranjang'] as $id => $jumlah) {
                $hasil = $db->query("SELECT * FROM produk WHERE id = $id");
                $produk = $hasil->fetchArray();
                $subtotal = $produk['harga'] * $jumlah;
                $total += $subtotal;
                echo "<tr>
                        <td>{$produk['nama']}</td>
                        <td>$jumlah</td>
                        <td>Rp $subtotal</td>
                      </tr>";
            }
            echo "<tr><td colspan='2'><b>Total</b></td><td><b>Rp $total</b></td></tr></table>";
        } else {
            echo "<p>Keranjang kosong.</p>";
        }

        if (isset($_POST['bayar'])) {
            unset($_SESSION['keranjang']);
            echo "<p><b>Pembayaran berhasil!</b></p>";
        }
        ?>
        <form method="post">
            <button name="bayar">Bayar Sekarang</button>
        </form>
        <a href="index.php" class="btn">Kembali</a>
    </div>
</body>
</html>

