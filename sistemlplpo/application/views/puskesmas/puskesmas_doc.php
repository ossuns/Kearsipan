<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px;text-align:center;">Data Puskesmas Dinas Kesehatan Kabupaten Karanganyar</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Puskesmas</th>
		<th>Kecamatan</th>
		
            </tr><?php
            foreach ($puskesmas_data as $puskesmas)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $puskesmas->nama_puskesmas ?></td>
		      <td><?php echo $puskesmas->kecamatan ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>