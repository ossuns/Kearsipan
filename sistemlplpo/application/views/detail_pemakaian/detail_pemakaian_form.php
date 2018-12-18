<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Detail_pemakaian <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Pemakaian <?php echo form_error('id_pemakaian') ?></label>
            <input type="text" class="form-control" name="id_pemakaian" id="id_pemakaian" placeholder="Id Pemakaian" value="<?php echo $id_pemakaian; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Kode <?php echo form_error('kode') ?></label>
            <input type="text" class="form-control" name="kode" id="kode" placeholder="Kode" value="<?php echo $kode; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Umum <?php echo form_error('umum') ?></label>
            <input type="text" class="form-control" name="umum" id="umum" placeholder="Umum" value="<?php echo $umum; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Jknpbi <?php echo form_error('jknpbi') ?></label>
            <input type="text" class="form-control" name="jknpbi" id="jknpbi" placeholder="Jknpbi" value="<?php echo $jknpbi; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Jknnonpbi <?php echo form_error('jknnonpbi') ?></label>
            <input type="text" class="form-control" name="jknnonpbi" id="jknnonpbi" placeholder="Jknnonpbi" value="<?php echo $jknnonpbi; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Jamkesda <?php echo form_error('jamkesda') ?></label>
            <input type="text" class="form-control" name="jamkesda" id="jamkesda" placeholder="Jamkesda" value="<?php echo $jamkesda; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Jamkesdasktm <?php echo form_error('jamkesdasktm') ?></label>
            <input type="text" class="form-control" name="jamkesdasktm" id="jamkesdasktm" placeholder="Jamkesdasktm" value="<?php echo $jamkesdasktm; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Jamkesdajamkesmas <?php echo form_error('jamkesdajamkesmas') ?></label>
            <input type="text" class="form-control" name="jamkesdajamkesmas" id="jamkesdajamkesmas" placeholder="Jamkesdajamkesmas" value="<?php echo $jamkesdajamkesmas; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Uks <?php echo form_error('uks') ?></label>
            <input type="text" class="form-control" name="uks" id="uks" placeholder="Uks" value="<?php echo $uks; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Kir <?php echo form_error('kir') ?></label>
            <input type="text" class="form-control" name="kir" id="kir" placeholder="Kir" value="<?php echo $kir; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Gratis <?php echo form_error('gratis') ?></label>
            <input type="text" class="form-control" name="gratis" id="gratis" placeholder="Gratis" value="<?php echo $gratis; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Lainlian <?php echo form_error('lainlian') ?></label>
            <input type="text" class="form-control" name="lainlian" id="lainlian" placeholder="Lainlian" value="<?php echo $lainlian; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Jumlah Pemakaian <?php echo form_error('jumlah_pemakaian') ?></label>
            <input type="text" class="form-control" name="jumlah_pemakaian" id="jumlah_pemakaian" placeholder="Jumlah Pemakaian" value="<?php echo $jumlah_pemakaian; ?>" />
        </div>
	    <input type="hidden" name="id_pakai" value="<?php echo $id_pakai; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('detail_pemakaian') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>