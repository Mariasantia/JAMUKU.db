<?php
session_start();
$id = $_GET['id'] ?? null;

if ($id && isset($_SESSION['keranjang'])) {
    $_SESSION['keranjang'] = array_filter($_SESSION['keranjang'], fn($item) => $item != $id);
}

header("Location: keranjang.php");
exit;
?>
