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
        <h2>Detail_penerimaan List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Penerimaan</th>
		<th>Kode</th>
		<th>Jumlah Terima</th>
		
            </tr><?php
            foreach ($detail_penerimaan_data as $detail_penerimaan)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $detail_penerimaan->id_penerimaan ?></td>
		      <td><?php echo $detail_penerimaan->kode ?></td>
		      <td><?php echo $detail_penerimaan->jumlah_terima ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>