<?php include 'db.php'; ?>
<h1>Daftar Jamu</h1>
<a href="keranjang.php">Lihat Keranjang</a>
<ul>
<?php
$stmt = $db->query("SELECT * FROM jamu");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<li>{$row['nama']} - Rp {$row['harga']}
        <a href='tambah.php?id={$row['id']}'>Tambah</a></li>";
}
?>
</ul>
