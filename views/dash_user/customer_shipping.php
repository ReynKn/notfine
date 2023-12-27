<div class="main">
    <div class="content" style="text-align: center">
        <div class="register_account" style="text-align:center;display:inline-block;float: none">
            <h3>Alamat Dikirim</h3>
            <style type="text/css">
                #result {
                    color: red;
                    padding: 5px
                }

                #result p {
                    color: red
                }
            </style>
            <div id="result">
                <p>
                    <?php echo $this->session->flashdata('message'); ?>
                </p>
            </div>
            <form method="post" action="<?php echo base_url('customer/save/shipping_address'); ?>">
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <div>
                                    <input type="text" name="shipping_name" placeholder="Masukkan Namamu">
                                </div>
                                <div>
                                    <input type="text" name="shipping_email" placeholder="Masukkan Emailmu">
                                </div>
                            </td>
                            <td>
                                <div>
                                    <input type="text" name="shipping_address" placeholder="Masukkan Alamatmu">
                                </div>
                                <div>
                                    <input type="text" name="shipping_phone" placeholder="Masukkan Nomor HP mu">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="search">
                    <div><button class="grey">Diantarkan?</button></div>
                </div>
                <p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.
                </p>
                <div class="clear"></div>
            </form>
        </div>
        <div class="clear"></div>
    </div>
</div>