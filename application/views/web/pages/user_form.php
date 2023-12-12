<div class="main">
    <div class="content">
        <div class="login_panel">
            <h3>Yang sudah pernah daftar?</h3>
            <p>Silahkan masuk ulang, dengan mengisi form dibawah ini.</p>
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
                <p><?php echo $this->session->flashdata('messagelogin'); ?></p>
            </div>

            <form action="<?php echo base_url('customer/shipping/login'); ?>" method="post">
                <input name="customer_email" placeholder="Enter Your Email" type="text" />
                <input name="customer_password" placeholder="Enter Your Password" type="password" />
                <p class="note">Kalau Lupa Password, silahkan klik yang<a href="#">ini</a></p>
                <div class="buttons">
                    <div><button class="grey">Masuk Ulang</button></div>
                </div>
            </form>
        </div>
        <div class="register_account">
            <h3>Membuat Akun baru</h3>
            <style type="text/css">
                #result {
                    color: red;
                    padding: 5px
                }

                #result p {
                    color: red
                }
            </style>
            <!-- <div id="result">
                <p><?php echo $this->session->flashdata('message'); ?></p>
            </div> -->
            <form method="post" action="<?php echo base_url('customer/shipping/register'); ?>">
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <div>
                                    <input type="text" name="customer_name" class= "require" placeholder="Silahkan Masukkan Nama">
                                </div>

                                <div>
                                    <input type="text" name="customer_password" placeholder="Masukkan Password untuk anda">
                                    <span class="error"><?php echo form_error('customer_password'); ?></span>
                                </div>
                                <!-- <div>
                                    <input type="text" name="customer_city" placeholder="Kota dimana, anda tinggal? (Perawang)">
                                </div> -->
                                <div>
                                    <input type="text" name="customer_phone" placeholder="Masukkan Nomor Telepon">
                                    <span class="error"><?php echo form_error('customer_phone'); ?></span>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <input type="text" name="customer_whatsapp" placeholder="Masukkan nomor whatsapp">
                                    <span class="error"><?php echo form_error('customer_whatsapp'); ?></span>
                                </div>
                                <div>
                                    <input type="text" name="customer_address" placeholder="Masukkan Alamat (Khusus Daerah Perawang)">
                                    <span class="error"><?php echo form_error('customer_address'); ?></span>
                                </div>

                                <!-- <div>
                                    <select id="country" name="customer_country" class="frm-field required">
                                        <option value="null">Select a Country</option>         
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="India">India</option>

                                    </select>
                                </div>		

                                <div>
                                    <input type="text" name="customer_zipcode" placeholder="Enter Your ZipCode">
                                </div> -->
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="search">
                    <div><button class="Blue">Buat Akun</button></div>
                </div>
                <p class="terms">Dengan mengklik 'Buat Akun', anda sudah memahami dan menyetujui <a href="#">Syarat &amp; dan Ketentuannya</a>.</p>
                <div class="clear"></div>
            </form>
        </div>
        <div class="clear"></div>
    </div>
</div>