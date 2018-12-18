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
        <h2 style="margin-top:0px;text-align:center;"> Tambah Data Obat </h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Kode Obat <?php echo form_error('kode') ?></label>
            <input type="int" class="form-control" name="kode" id="kode" placeholder="Kode Obat" value="<?php echo $kode; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Nama Obat <?php echo form_error('nama_obat') ?></label>
            <input type="text" class="form-control" name="nama_obat" id="nama_obat" placeholder="Nama Obat" value="<?php echo $nama_obat; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Satuan <?php echo form_error('satuan') ?></label>
            <input type="text" class="form-control" name="satuan" id="satuan" placeholder="Satuan" value="<?php echo $satuan; ?>" />
        </div>
	    <!-- <input type="hidden" name="kode" value="<?php echo $kode; ?>" />  -->
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('obat') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
<!-- </html> -->