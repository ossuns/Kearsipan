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
        <h2 style="margin-top:0px">Persediaan List</h2>
        <form action="<?php echo site_url('persediaan/dropdown'); ?>" method="get">
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-3">
            </div>
            <div class="col-md-3">
            </div>
            <div class="col-md-3">
            </div>
            <div class="col-md-1">
            </div>
            <!-- <div class="col--2">
                <?php echo anchor(site_url('persediaan/create'),'Tampilkan', 'class="btn btn-primary"'); ?>
            </div> -->
            <!-- <div class="col-md-4">
                <?php echo anchor(site_url('persediaan/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div> -->
            <!--  <div class="col-md-1 text-right">
            </div> -->
            <!-- <div class="col-md-1">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('persediaan/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('persediaan'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div> -->
        </div>
        </form>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>		
        <th>Kode</th>
        <th>Nama Obat</th>
		<th>Stok Awal</th>
		<th>Action</th>
            </tr><?php
            foreach ($persediaan_data as $persediaan)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $persediaan->kode ?></td>
            <td><?php echo $persediaan->nama_obat ?></td>
			<td><?php echo $persediaan->stok_awal ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('persediaan/read/'.$persediaan->id_persediaan),'Read'); 
				echo ' | '; 
				echo anchor(site_url('persediaan/update/'.$persediaan->id_persediaan),'Update'); 
				echo ' | '; 
				echo anchor(site_url('persediaan/delete/'.$persediaan->id_persediaan),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('persediaan/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('persediaan/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
<!-- </html>