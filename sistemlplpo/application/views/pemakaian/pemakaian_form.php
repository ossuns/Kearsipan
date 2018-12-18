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
        <h2 style="margin-top:0px">Pemakaian <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Puskesmas <?php echo form_error('id_puskesmas') ?></label>
            <input type="text" class="form-control" name="id_puskesmas" id="id_puskesmas" placeholder="Id Puskesmas" value="<?php echo $id_puskesmas; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Bulan <?php echo form_error('id_bulan') ?></label>
            <input type="text" class="form-control" name="id_bulan" id="id_bulan" placeholder="Id Bulan" value="<?php echo $id_bulan; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Tahun <?php echo form_error('id_tahun') ?></label>
            <input type="text" class="form-control" name="id_tahun" id="id_tahun" placeholder="Id Tahun" value="<?php echo $id_tahun; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Total Pemakaian <?php echo form_error('total_pemakaian') ?></label>
            <input type="text" class="form-control" name="total_pemakaian" id="total_pemakaian" placeholder="Total Pemakaian" value="<?php echo $total_pemakaian; ?>" />
        </div>
	    <input type="hidden" name="id_pemakaian" value="<?php echo $id_pemakaian; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('pemakaian') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>