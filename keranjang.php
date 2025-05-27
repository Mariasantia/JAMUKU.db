<?php
session_start();
include 'db.php';

$keranjang = $_SESSION['keranjang'] ?? [];

if (!$keranjang) {
    echo "Keranjang kosong. <a href='index.php'>Kembali</a>";
    exit;
}

$total = 0;
echo "<h1>Keranjang Anda</h1><ul>";

foreach ($keranjang as $id) {
    $stmt = $db->prepare("SELECT * FROM jamu WHERE id = ?");
    $stmt->execute([$id]);
    if ($jamu = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<li>{$jamu['nama']} - Rp {$jamu['harga']}
            <a href='hapus.php?id={$jamu['id']}'>[Hapus]</a></li>";
        $total += $jamu['harga'];
    }
}

echo "</ul>";
echo "<p>Total: Rp $total</p>";
echo "<a href='bayar.php'>Bayar</a> | <a href='index.php'>Kembali</a>";
?>
