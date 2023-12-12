

<div class="main">
    <div class="content" style="text-align: center">
         <div class="login_panel" style="width:400px;text-align:center;display:inline-block;float: none">
            <h3>Yang pernah daftar</h3>
            <p>Masuk kembali dengan form dibawah ini.</p>
            <style type="text/css">
                #result{color:red;padding: 5px}
                #result p{color:red}
            </style>
            <div id="result">
                <p><?php echo $this->session->flashdata('message'); ?></p>
            </div>
            
            <form action="<?php echo base_url('customer/logincheck');?>" method="post">
                <input name="customer_whatsapp" placeholder="Masukkan Nomor Whatsapp Anda" type="text"/>
                <input name="customer_password" placeholder="Enter Your Password" type="password"/>
                <div class="buttons"><div><button class="blu">Masuk</button></div></div>
            </form>
        </div>	
        <div class="clear"></div>
    </div>
</div>