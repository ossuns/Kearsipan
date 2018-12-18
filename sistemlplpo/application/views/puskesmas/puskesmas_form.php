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
        <h2 style="margin-top:0px;text-align:center;">Tambah Data Puskesmas</h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Puskesmas <?php echo form_error('nama_puskesmas') ?></label>
            <input type="text" class="form-control" name="nama_puskesmas" id="nama_puskesmas" placeholder="Nama Puskesmas" value="<?php echo $nama_puskesmas; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kecamatan <?php echo form_error('kecamatan') ?></label>
            <input type="text" class="form-control" name="kecamatan" id="kecamatan" placeholder="Kecamatan" value="<?php echo $kecamatan; ?>" />
        </div>
	    <input type="hidden" name="id_puskesmas" value="<?php echo $id_puskesmas; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('puskesmas') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
<!-- </html> -->