<!-- start: Content -->
<div id="content" class="span10">

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Tambah Produk</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
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
            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success">
                    <?= $this->session->flashdata('success') ?>
                </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger">
                    <?= $this->session->flashdata('error') ?>
                </div>
            <?php endif; ?>
            <div class="box-content">
                <!-- vw_produk.php -->

                <form action="<?= base_url('admin/save_product') ?>" method="post" enctype="multipart/form-data">

                    <?php if ($this->session->flashdata('error')): ?>
                        <div class="alert alert-danger">
                            <?= $this->session->flashdata('error') ?>
                        </div>
                    <?php endif; ?>

                    <div class="form-group">
                        <label>Product Title</label>
                        <input type="text" name="product_title" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Product Description</label>
                        <textarea name="product_description" class="form-control"></textarea>
                    </div>

                    <div class="control-group">
                            <label class="control-label" for="fileInput">Product Image</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="product_image" id="fileInput" type="file"/>
                            </div>
                        </div> 

                    <div class="form-group">
                        <label>Product Price</label>
                        <input type="number" name="product_price" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Product Quantity</label>
                        <input type="number" name="product_quantity" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Product Featured</label><br>
                        <input type="radio" name="product_feature" value="0" checked> Unfeatured
                        <input type="radio" name="product_feature" value="1"> Featured
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>

                </form> <button type="reset" class="btn">Cancel</button>
            </div>
            </fieldset>
            </form>

        </div>
    </div><!--/span-->

</div><!--/row-->


</div><!--/.fluid-container-->

<!-- end: Content -->