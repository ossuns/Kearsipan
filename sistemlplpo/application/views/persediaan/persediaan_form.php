<!-- <!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head> -->
    <body>
        <h2 style="margin-top:0px">Persediaan <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Puskesmas <?php echo form_error('id_puskesmas') ?></label>
            <input type="text" class="form-control" name="id_puskesmas" id="id_puskesmas" placeholder="Id Puskesmas" value="<?php echo $id_puskesmas; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Kode <?php echo form_error('kode') ?></label>
            <input type="text" class="form-control" name="kode" id="kode" placeholder="Kode" value="<?php echo $kode; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Stok Awal <?php echo form_error('stok_awal') ?></label>
            <input type="text" class="form-control" name="stok" id="stok_awal" placeholder="Stok" value="<?php echo $stok; ?>" />
        </div>
	    <input type="hidden" name="id_persediaan" value="<?php echo $id_persediaan; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('persediaan') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
<!-- </html> -->