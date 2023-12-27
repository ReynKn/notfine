<div class="main">
    <div class="content">

        <div class="content_top">
            <div class="heading">
                <h4>Halaman Produk</h4>
            </div>
            <div class="clear"></div>
        </div>
        <style>
            .row {
                margin: 0;
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
            }

            .product-box {
                margin-bottom: 20px;
                display: flex;
                flex-wrap: wrap;
                margin-bottom: 20px;
            }

            .product-item {
                flex: 0 0 calc(25% - 20px);
                /* 25% untuk 4 kotak dalam 1 baris, dengan margin antar kotak */
                margin: 10px;
                /* Sesuaikan dengan margin yang diinginkan */
                border: 1px solid #ccc;
                padding: 10px;
                background-color: #f9f9f9;
                text-align: center;
            }

            .product-item img {
                width: 70%;
                height: auto;
            }

            .p {
                margin-bottom: 15px;
            }

            .product-item h4 {
                font-size: 22px;
                margin-bottom: 10px;
            }
            @media (max-width: 768px) {
                .product-item {
                    flex: 0 0 calc(50% - 20px);
                    /* 50% untuk 2 kotak dalam 1 baris pada tampilan mobile */
                }
            }
        </style>
        <?php
        $arr_chunk_product = array_chunk($get_all_product, 4);

        foreach ($arr_chunk_product as $chunk_products) {
            ?>
            <div class="row product-box">
                <?php foreach ($chunk_products as $single_products) { ?>
                    <div class="product-item">
                        <a href="<?= base_url('DashUser/single/' . $single_products->product_id); ?>">
                            <img src="<?= base_url('uploads/' . $single_products->product_image) ?>"
                                alt="Product Image">
                        </a>
                        <h4>
                            <?= $single_products->product_title ?>
                        </h4>
                        <p>
                            <?= word_limiter($single_products->product_description, 10) ?>
                        </p>
                        <p><span class="price">Rp.
                                <?= $this->cart->format_number($single_products->product_price) ?>
                            </span></p>
                        <div class="button"><span><a href="<?= base_url('DashUser/single/' . $single_products->product_id); ?>"
                                    class="details">Details</a></span></div>
                    </div>
                    <?php
                }
                ?>
            </div>
            <?php
        }
        ?>
        <div class="content_pagi">
            <div class="pagination">
                <?= $this->pagination->create_links(); ?>
            </div>
            <div class="clear"></div>
        </div>

    </div>
</div>
<style>
    .content_pagi {
        padding: 0;
        border: 1px solid #EBE8E8;
        border-radius: 3px;
    }

    .pagination {}

    .pagination ul {}

    .pagination ul li {
        float: left
    }

    .pagination ul li a {
        color: #000;
        padding: 7px 12px;
        border: 1px solid #ddd;
        font-size: 18px;
    }

    .pagination ul li a:hover {
        background: #ddd;
    }

    .pagiactive a {
        background: #ddd;
    }
</style>