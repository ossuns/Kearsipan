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
        <h2 style="margin-top:0px">Detail_penerimaan <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Penerimaan <?php echo form_error('id_penerimaan') ?></label>
            <input type="text" class="form-control" name="id_penerimaan" id="id_penerimaan" placeholder="Id Penerimaan" value="<?php echo $id_penerimaan; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Kode <?php echo form_error('kode') ?></label>
            <input type="text" class="form-control" name="kode" id="kode" placeholder="Kode" value="<?php echo $kode; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Jumlah Terima <?php echo form_error('jumlah_terima') ?></label>
            <input type="text" class="form-control" name="jumlah_terima" id="jumlah_terima" placeholder="Jumlah Terima" value="<?php echo $jumlah_terima; ?>" />
        </div>
	    <input type="hidden" name="id_detailpenerimaan" value="<?php echo $id_detailpenerimaan; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('detail_penerimaan') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>