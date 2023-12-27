<div class="main">
    <div class="content">
        <div class="section group">
            <div class="cont-desc span_1_of_2">
                <div class="grid images_3_of_2">
                    <?php if (isset($single_product->product_image)): ?>
                        <img src="<?php echo base_url('assets/img/product/' . $single_product->product_image) ?>" alt="" width="302px">
                    <?php endif; ?>
                </div>
                <div class="desc span_3_of_2">
                    <h2>
                        <?php echo isset($single_product->product_title) ? $single_product->product_title : ''; ?>
                    </h2>
                    <p>
                        <?php echo isset($single_product->product_description) ? word_limiter($single_product->product_description, 250) : ''; ?>
                    </p>
                    <div class="price">
                        <p>Price: Rp. <span>
                            <?php echo isset($single_product->product_price) ? $this->cart->format_number($single_product->product_price) : ''; ?>
                        </span></p>
                    </div>
                    <div class="add-cart">
                        <form action="<?php echo base_url('save/cart'); ?>" method="post">
                            <input type="number" class="buyfield" name="qty" value="1" />
                            <input type="hidden" class="buyfield" name="product_id" value="<?php echo isset($single_product->product_id) ? $single_product->product_id : ''; ?>" />
                            <input type="submit" class="buysubmit" name="submit" value="Buy Now" />
                        </form>
                    </div>
                </div>
                <div class="product-desc">
                    <h2>Product Details</h2>
                    <p>
                        <?php echo isset($single_product->product_description) ? word_limiter($single_product->product_description, 250) : ''; ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
