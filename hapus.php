<?php
include 'db.php';
$id = $_GET['id'];
$db->exec("DELETE FROM produk WHERE id = $id");
header("Location: index.php");
?>

