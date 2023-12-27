<style>
    .product-box {
        display:flex;
        flex-direction: column;
        border: 1px solid #ccc;
        padding: 20px;
        margin-bottom: 20px;
        background-color: #f9f9f9;
        text-align: center;
        width: 100%;
        height: 100%;
        /* Agar konten berada di tengah */
    }

    .product-box img {
        width: 100%;
        height: auto;
        margin-bottom: 10px;
        /* Memberikan ruang di bawah gambar */
    }

    .product-box h4 {
        font-size: 18px;
        margin-bottom: 10px;
        /* Memberikan ruang antara judul dan deskripsi */
    }

    .product-box p {
        margin-bottom: auto;
        /* Memberikan ruang antara deskripsi dan harga */
    }

    .product-box .button {
        margin-top: auto;
        /* Memberikan ruang sebelum tombol Details */
    }
</style>

<!-- Bagian Produk Unggulan -->
<div class="section group">
    <h4>Featured Products</h4>
    <div class="row">
        <?php if ($all_featured_products): ?>
            <?php foreach ($all_featured_products as $product): ?>
                <div class="col-md-3">
                    <div class="product-box">
                        <a href="<?= base_url('DashUser/single/' . $product->product_id); ?>">
                            <img style="width: 70%; height: auto;"
                                src="<?= base_url('uploads/' . $product->product_image); ?>" alt="" />
                        </a>
                        <h4>
                            <?= $product->product_title; ?>
                        </h4>
                        <p>
                            <?= substr($product->product_description, 0, 250); ?>
                        </p>
                        <p><span class="price">Rp.
                                <?= $this->cart->format_number($product->product_price); ?>
                            </span></p>
                        <div class="button">
                            <span><a href="<?= base_url('DashUser/single/' . $product->product_id); ?>"
                                    class="details">Details</a></span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<!-- Bagian Produk Baru -->
<div class="section group">
    <h4>New Products</h4>
    <div class="row">
        <?php if ($all_new_products): ?>
            <?php foreach ($all_new_products as $product): ?>
                <div class="col-md-3">
                    <div class="product-box">
                        <a href="<?= base_url('DashUser/single/' . $product->product_id); ?>">
                            <img style="width: 70%; height: auto;"
                                src="<?= base_url('uploads/' . $product->product_image); ?>" alt="" />
                        </a>
                        <h4>
                            <?= $product->product_title; ?>
                        </h4>
                        <p>
                            <?= word_limiter($product->product_description, 250); ?>
                        </p>
                        <p><span class="price">Rp.
                                <?= $this->cart->format_number($product->product_price); ?>
                            </span></p>
                        <div class="button">
                            <span><a href="<?= base_url('DashUser/single/' . $product->product_id); ?>"
                                    class="details">Details</a></span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>