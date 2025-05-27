<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Produk</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Daftar Produk</h1>
        <a href="tambah.php" class="btn">Tambah Produk</a>
        <table>
            <tr><th>Nama</th><th>Harga</th><th>Aksi</th></tr>
            <?php
            $hasil = $db->query("SELECT * FROM produk");
            while ($row = $hasil->fetchArray()) {
                echo "<tr>
                        <td>{$row['nama']}</td>
                        <td>Rp {$row['harga']}</td>
                        <td>
                            <a class='btn' href='keranjang.php?id={$row['id']}'>+ Keranjang</a>
                            <a class='btn' href='hapus.php?id={$row['id']}'>Hapus</a>
                        </td>
                      </tr>";
            }
            ?>
        </table>
        <a href="bayar.php" class="btn">Lihat Keranjang</a>
    </div>
</body>
</html>

