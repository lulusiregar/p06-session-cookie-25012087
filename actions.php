<?php

declare(strict_types=1);

require_once __DIR__ . '/bootstrap.php';
require_once __DIR__ . '/functions.php';

$products = require __DIR__ . '/data/products.php';

// Jika actions.php dibuka langsung melalui GET,
// kembalikan pengguna ke halaman utama.
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$action = $_POST['action'] ?? null;

$id = filter_input(
    INPUT_POST,
    'id',
    FILTER_VALIDATE_INT
);

$allowedActions = ['add', 'remove', 'clear'];

// Validasi action
if (
    !is_string($action) ||
    !in_array($action, $allowedActions, true)
) {
    setFlash('Aksi tidak valid.');
    header('Location: index.php');
    exit;
}

// Action selain clear wajib memiliki ID produk yang valid
if ($action !== 'clear') {

    if (
        $id === false ||
        $id === null ||
        !isset($products[$id])
    ) {
        setFlash('Produk tidak ditemukan.');
        header('Location: index.php');
        exit;
    }
}

// Tambah produk
if ($action === 'add') {

    $_SESSION['cart'][$id] =
        ($_SESSION['cart'][$id] ?? 0) + 1;

    setFlash(
        $products[$id]['nama'] .
        ' berhasil ditambahkan ke keranjang.'
    );

    header('Location: index.php');
    exit;
}

// Hapus satu produk
if ($action === 'remove') {

    if (!isset($_SESSION['cart'][$id])) {

        setFlash('Produk tidak ada di keranjang.');

        header('Location: cart.php');
        exit;
    }

    unset($_SESSION['cart'][$id]);

    setFlash('Produk berhasil dihapus dari keranjang.');

    header('Location: cart.php');
    exit;
}

// Kosongkan keranjang
if ($action === 'clear') {

    $_SESSION['cart'] = [];

    setFlash('Keranjang berhasil dikosongkan.');

    header('Location: cart.php');
    exit;
}