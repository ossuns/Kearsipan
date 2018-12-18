<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style type="text/css">
            body{
                font-family:  Arial, Helvetica, sans-serif;
            }
            table{
                margin: 10px auto;
                border-collapse: collapse;
            }
            table th{
                border: 1px solid #3c3c3c;
                padding: 3px 8px;
                max-height: 200px;
                overflow-y:auto;
                overflow-x:hidden;
         
            }
            table td{
                border: 1px solid #3c3c3c;
                padding: 3px 8px;
         
            }
            a{
                background: blue;
                color: #fff;
                padding: 8px 10px;
                text-decoration: none;
                border-radius: 2px;
            }
        </style>
    </head>
    <body>
        <h4 style="margin-top:0px;text-align:center;font-family:  Arial, Helvetica, sans-serif">Data Rata-Rata Persediaan Obat Dinas Kesehatan Kabupaten Karanganyar
    <br>BULAN <?php if ($bulan!='all'){
            echo $bulan;
        }else{
            echo 'Januari-Desember';
        } ?> TAHUN <?php echo $tahun; ?></h4>
        <table class="word-table" style="margin-bottom: 10px,font-family:  Arial, Helvetica, sans-serif">
            <tr>
                <th>No</th>
		<th>Nama Obat</th>
        <th>Total Persediaan</th>
		<th>Rata-Rata Persediaan</th>
		
            </tr><?php
            foreach ($persediaan_data as $persediaan)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $persediaan->nama_obat ?></td>
		      <td><?php echo $persediaan->total ?></td>
		      <td><?php echo $persediaan->persediaan ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>