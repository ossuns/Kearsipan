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
        <h2>Laporan List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>NO</th>
		<th>KODE</th>
        <th>NAMA OBAT</th>
        <th>SATUAN</th>
        <th>STOK AWAL</th>
        <th>PENERIMAAN</th>
        <th>PERSEDIAAN</th>
        <th>UMUM</th>
        <th>JKN-PBI</th>
        <th>JKN-NON PBI</th>
        <th>JAMKESDA</th>
        <th>JAMKESDA-SKTM</th>
        <th>JAMKESDA-JAMKESMAS</th>
        <th>UKS</th>
        <th>KIR</th>
        <th>GRATIS</th>
        <th>LAIN-LAIN</th>
        <th>JUMLAH</th>
		<th>SISA STOK</th>
        <th>PERMINTAAN</th>
        <th>PEMBERIAN</th>

		
            </tr><?php
            foreach ($laporan_data as $laporan)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $laporan->kode ?></td>
		      <td><?php echo $laporan->nama_obat ?></td>
		      <td><?php echo $laporan->persediaan ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>