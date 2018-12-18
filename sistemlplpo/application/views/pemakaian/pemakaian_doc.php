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
        <h2>Pemakaian List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Puskesmas</th>
		<th>Id Bulan</th>
		<th>Id Tahun</th>
		<th>Total Pemakaian</th>
		
            </tr><?php
            foreach ($pemakaian_data as $pemakaian)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $pemakaian->id_puskesmas ?></td>
		      <td><?php echo $pemakaian->id_bulan ?></td>
		      <td><?php echo $pemakaian->id_tahun ?></td>
		      <td><?php echo $pemakaian->total_pemakaian ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>