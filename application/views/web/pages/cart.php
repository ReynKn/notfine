<div class="main">
    <div class="content">
        <div class="cartoption">
            <div class="cartpage">
                <h2>Your Cart</h2>
                <?php if ($this->cart->total_items()) { ?>
                    <table class="tblone">
                        <tr>
                            <th width="5%">No.</th>
                            <th width="30%">Nama Produk</th>
                            <th width="10%">Gambar Produk</th>
                            <th width="15%">Harga</th>
                            <th width="20%">Jumlah Produk</th>
                            <th width="15%">Total Harga</th>
                            <th width="5%">Aksi Hapus</th>
                        </tr>
                        <?php
                        $i = 0;
                        foreach ($cart_contents as $cart_items) {
                            $i++;
                        ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $cart_items['name'] ?></td>
                                <td><img src="<?php echo base_url('uploads/' . $cart_items['options']['product_image']) ?>" alt="" /></td>
                                <td>Rp. <?php echo $this->cart->format_number($cart_items['price']) ?></td>
                                <td>
                                    <form action="<?php echo base_url('update/cart'); ?>" method="post">
                                        <input type="number" name="qty" value="<?php echo $cart_items['qty'] ?>" />
                                        <input type="hidden" name="rowid" value="<?php echo $cart_items['rowid'] ?>" />
                                        <input type="submit" name="submit" value="Update" />
                                    </form>
                                </td>
                                <td>Rp. <?php echo $this->cart->format_number($cart_items['subtotal']) ?></td>
                                <td>
                                    <form action="<?php echo base_url('remove/cart'); ?>" method="post">
                                        <input type="hidden" name="rowid" value="<?php echo $cart_items['rowid'] ?>" />
                                        <input type="submit" name="submit" value="X" />
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>


                    </table>
                    <table style="float:right;text-align:left;" width="40%">
                        <!-- <tr>
                            <th>Sub Total : </th>
                            <td>Rs. <?php echo $this->cart->format_number($this->cart->total()) ?></td>
                        </tr> -->
                        <!-- <tr> -->
                            <!-- <th>VAT : </th>
                            <td>Rs.
                                <?php
                                $total = $this->cart->total();
                                // $tax = ($total * 15) / 100;
                                $tax = ($total);
                                echo $this->cart->format_number($tax);
                                ?>
                            </td> -->
                        <!-- </tr> -->
                        <tr>
                            <th>Total Harga :</th>
                            <td>Rp. <?php echo $this->cart->format_number($tax + $this->cart->total()); ?> </td>
                        </tr>
                    </table>
                <?php
                } else {
                    echo "<h1>Your Cart Empty</h1>";
                }
                ?>
            </div>
            <div class="shopping">
                <div class="shopleft">
                    <a href="<?php echo base_url('product') ?>"> <img src="<?php echo base_url() ?>assets/web/images/shop.png" alt="" /></a>
                </div>
                <div class="shopright">
                    <?php
                    $customer_id = $this->session->userdata('customer_id');
                    if ($cart_items >=3 ){
                        if (empty($customer_id)) {
                    ?>
                            <a href="<?php echo base_url('user_form') ?>"> <img src="<?php echo base_url() ?>assets/web/images/check.png" alt="" /></a>
                    <?php
                        } elseif (!empty($customer_id)) {
                    ?>
                            <a href="<?php echo base_url('customer/shipping') ?>"> <img src="<?php echo base_url() ?>assets/web/images/check.png" alt="" /></a>
                    <?php
                        }
                    } else {
                        echo "Perlu dibeli 3 Produk minimal dalam keranjang agar dapat dilakukan pengantaran produk";
                    }
                    ?>
                    
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>