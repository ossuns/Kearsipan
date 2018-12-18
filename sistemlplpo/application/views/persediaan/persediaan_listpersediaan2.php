<!doctype html>
<html>
    <!-- <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head> -->
    <body>
        <h2 style="margin-top:0px;text-align:center;">Persediaan Obat Dinas Kesehatan Kabupaten Karanganyar</h2>
        <p>Bulan :  <?php if ($bulan!=''){
            echo $bulan;
        }else{
            echo $bulan = 'Januari - Desember';

            $bulan ='all';
        } ?></p>
        <p>Tahun :  <?php echo $tahun; ?></p>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Puskesmas</th>
        <th>Total Persediaan</th>
		<th>Persediaan</th>
		<!-- <th>Action</th>-->            
        </tr><?php
            foreach ($persediaan_data as $persediaan)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
            <td><?php echo $persediaan->nama_obat ?></td>
            <td><?php echo $persediaan->total ?></td>
            <td><?php echo $persediaan->persediaan ?></td>
			<!-- <td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('persediaan/read/'.$persediaan->id_persediaan),'Read'); 
				echo ' | '; 
				echo anchor(site_url('persediaan/update/'.$persediaan->id_persediaan),'Update'); 
				echo ' | '; 
				echo anchor(site_url('persediaan/delete/'.$persediaan->id_persediaan),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td> -->
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('persediaan/excel2/'.$this->session->flashdata('tahun')."/".$bulan), 'Excel', 'class="btn btn-primary"'); ?>
<!-- 		<?php echo anchor(site_url('persediaan/word2/'.$this->session->flashdata('tahun')."/".$bulan), 'Word2', 'class="btn btn-primary"'); ?> -->
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
<!-- </html>