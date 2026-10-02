<?php

declare(strict_types=1);

require_once __DIR__ . '/bootstrap.php';
require_once __DIR__ . '/functions.php';

$products = require __DIR__ . '/data/products.php';

$theme = 'light';

$flash = pullFlash();

require __DIR__ . '/components/header.php';
?>

<main class="container">

    <section class="hero">
        <div>
            <p class="eyebrow">PRAKTIKUM WEB I • PERTEMUAN 6</p>
            <h1>Mini Café Cart</h1>
            <p class="subtitle">
                Keranjang sederhana menggunakan PHP Session, Flash Message, dan Cookie tema.
            </p>
        </div>

        <a class="cart-link" href="cart.php">
            Keranjang
            <span><?= cartCount($_SESSION['cart']) ?></span>
        </a>
    </section>

    <?php if ($flash !== null): ?>
        <div class="flash">
            <?= e($flash) ?>
        </div>
    <?php endif; ?>

    <section class="toolbar">
        <div>
            <h2>Katalog Produk</h2>
            <p>Pilih produk lalu tambahkan ke session cart.</p>
        </div>
    </section>

    <section class="product-grid">

        <?php foreach ($products as $id => $product): ?>

            <article class="product-card">

                <div class="product-icon">
                    <?= e(substr($product['nama'], 0, 1)) ?>
                </div>

                <h3>
                    <?= e($product['nama']) ?>
                </h3>

                <p>
                    <?= e($product['deskripsi']) ?>
                </p>

                <strong>
                    <?= e(formatRupiah((int) $product['harga'])) ?>
                </strong>

                <form method="post" action="actions.php">

                    <input
                        type="hidden"
                        name="action"
                        value="add"
                    >

                    <input
                        type="hidden"
                        name="id"
                        value="<?= (int) $id ?>"
                    >

                    <button type="submit">
                        + Tambah ke Keranjang
                    </button>

                </form>

            </article>

        <?php endforeach; ?>

    </section>

</main>

<?php require __DIR__ . '/components/footer.php'; ?>