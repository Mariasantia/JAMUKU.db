<?php
session_start();
$id = $_GET['id'];
$_SESSION['keranjang'][$id] = ($_SESSION['keranjang'][$id] ?? 0) + 1;
header("Location: index.php");
?>

