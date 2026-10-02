<?php

declare(strict_types=1);

require_once __DIR__ . '/bootstrap.php';
require_once __DIR__ . '/functions.php';

$products = require __DIR__ . '/data/products.php';

$flash = pullFlash();

$total = 0;

require __DIR__ . '/components/header.php';
?>

<main class="container">

    <section class="hero">
        <div>
            <p class="eyebrow">PRAKTIKUM WEB I • PERTEMUAN 6</p>
            <h1>Keranjang Belanja</h1>
            <p class="subtitle">
                Ringkasan produk yang tersimpan di PHP Session.
            </p>
        </div>

        <a class="cart-link" href="index.php">
            Kembali ke Katalog
        </a>
    </section>

    <?php if ($flash !== null): ?>
        <div class="flash">
            <?= e($flash) ?>
        </div>
    <?php endif; ?>

    <?php if (empty($_SESSION['cart'])): ?>

        <section class="empty-state">
            <h2>Keranjang masih kosong</h2>
            <p>Tambahkan produk dari katalog terlebih dahulu.</p>
        </section>

    <?php else: ?>

        <section class="cart-list">

            <?php foreach ($_SESSION['cart'] as $id => $quantity): ?>

                <?php
                if (!isset($products[$id])) {
                    continue;
                }

                $product = $products[$id];
                $quantity = (int) $quantity;
                $subtotal = (int) $product['harga'] * $quantity;
                $total += $subtotal;
                ?>

                <article class="cart-item">

                    <div>
                        <h3><?= e($product['nama']) ?></h3>

                        <p>
                            <?= e(formatRupiah((int) $product['harga'])) ?>
                            × <?= $quantity ?>
                        </p>
                    </div>

                    <strong>
                        <?= e(formatRupiah($subtotal)) ?>
                    </strong>

                </article>

            <?php endforeach; ?>

            <div class="cart-total">
                <span>Total</span>
                <strong><?= e(formatRupiah($total)) ?></strong>
            </div>

        </section>

    <?php endif; ?>

</main>

<?php require __DIR__ . '/components/footer.php'; ?>