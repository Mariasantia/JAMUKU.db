<?php
session_start();
$id = $_GET['id'] ?? null;

if ($id) {
    $_SESSION['keranjang'][] = $id;
}

header("Location: keranjang.php");
exit;
?>
