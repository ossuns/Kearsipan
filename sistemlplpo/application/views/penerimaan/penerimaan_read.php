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
        <h2 style="margin-top:0px">Penerimaan Read</h2>
        <table class="table">
	    <tr><td>Id Puskesmas</td><td><?php echo $id_puskesmas; ?></td></tr>
	    <tr><td>Id Bulan</td><td><?php echo $id_bulan; ?></td></tr>
	    <tr><td>Id Tahun</td><td><?php echo $id_tahun; ?></td></tr>
	    <tr><td>Jumlah Penerimaan</td><td><?php echo $jumlah_penerimaan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('penerimaan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>