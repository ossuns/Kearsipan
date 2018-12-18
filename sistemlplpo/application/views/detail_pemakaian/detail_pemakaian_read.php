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
        <h2 style="margin-top:0px">Detail_pemakaian Read</h2>
        <table class="table">
	    <tr><td>Id Pemakaian</td><td><?php echo $id_pemakaian; ?></td></tr>
	    <tr><td>Kode</td><td><?php echo $kode; ?></td></tr>
	    <tr><td>Umum</td><td><?php echo $umum; ?></td></tr>
	    <tr><td>Jknpbi</td><td><?php echo $jknpbi; ?></td></tr>
	    <tr><td>Jknnonpbi</td><td><?php echo $jknnonpbi; ?></td></tr>
	    <tr><td>Jamkesda</td><td><?php echo $jamkesda; ?></td></tr>
	    <tr><td>Jamkesdasktm</td><td><?php echo $jamkesdasktm; ?></td></tr>
	    <tr><td>Jamkesdajamkesmas</td><td><?php echo $jamkesdajamkesmas; ?></td></tr>
	    <tr><td>Uks</td><td><?php echo $uks; ?></td></tr>
	    <tr><td>Kir</td><td><?php echo $kir; ?></td></tr>
	    <tr><td>Gratis</td><td><?php echo $gratis; ?></td></tr>
	    <tr><td>Lainlian</td><td><?php echo $lainlian; ?></td></tr>
	    <tr><td>Jumlah Pemakaian</td><td><?php echo $jumlah_pemakaian; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('detail_pemakaian') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>