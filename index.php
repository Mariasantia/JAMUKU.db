<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head><title>Daftar Jamu</title><link rel="stylesheet" href="style.css"></head>
<body>
<h1>Daftar Jamu</h1>
<a href="keranjang.php">Lihat Keranjang</a>
<ul>
<?php
$stmt = $db->query("SELECT * FROM jamu");
foreach ($stmt as $row) {
    echo "<li>{$row['nama']} - Rp{$row['harga']}
        <a href='tambah.php?id={$row['id']}'>Tambah</a></li>";
}
?>
</ul>
</body>
</html>

