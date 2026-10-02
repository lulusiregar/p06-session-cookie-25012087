<?php

declare(strict_types=1);

require_once __DIR__ . '/bootstrap.php';
require_once __DIR__ . '/functions.php';

$products = require __DIR__ . '/data/products.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$action = $_POST['action'] ?? '';
$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

if ($action === 'add') {

    if ($id === false || $id === null || !isset($products[$id])) {
        setFlash('Produk tidak ditemukan.');
        header('Location: index.php');
        exit;
    }

    $_SESSION['cart'][$id] = ($_SESSION['cart'][$id] ?? 0) + 1;

    setFlash('Produk berhasil ditambahkan ke keranjang.');

    header('Location: index.php');
    exit;
}

if ($action === 'remove') {

    if ($id === false || $id === null || !isset($_SESSION['cart'][$id])) {
        setFlash('Item tidak ditemukan di keranjang.');
        header('Location: cart.php');
        exit;
    }

    unset($_SESSION['cart'][$id]);

    setFlash('Item berhasil dihapus dari keranjang.');

    header('Location: cart.php');
    exit;
}

if ($action === 'clear') {

    $_SESSION['cart'] = [];

    setFlash('Keranjang berhasil dikosongkan.');

    header('Location: cart.php');
    exit;
}

setFlash('Aksi tidak valid.');

header('Location: index.php');
exit;