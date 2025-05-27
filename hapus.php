<?php
session_start();

// Validasi apakah parameter id dikirim dan merupakan string/angka yang valid
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Pastikan keranjang dan item dengan ID tersebut ada
    if (isset($_SESSION['keranjang'][$id])) {
        unset($_SESSION['keranjang'][$id]);
    }
}

// Redirect ke halaman keranjang
header("Location: keranjang.php");
exit;

