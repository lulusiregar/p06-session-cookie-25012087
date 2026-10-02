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

if ($action !== 'add' || $id === false || $id === null || !isset($products[$id])) {
    setFlash('Input tidak valid.');
    header('Location: index.php');
    exit;
}

$_SESSION['cart'][$id] = ($_SESSION['cart'][$id] ?? 0) + 1;

setFlash('Produk berhasil ditambahkan ke keranjang.');

header('Location: index.php');
exit;