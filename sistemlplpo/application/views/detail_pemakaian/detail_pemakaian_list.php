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
        <h2 style="margin-top:0px">Detail_pemakaian List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('detail_pemakaian/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('detail_pemakaian/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('detail_pemakaian'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Pemakaian</th>
		<th>Kode</th>
		<th>Umum</th>
		<th>Jknpbi</th>
		<th>Jknnonpbi</th>
		<th>Jamkesda</th>
		<th>Jamkesdasktm</th>
		<th>Jamkesdajamkesmas</th>
		<th>Uks</th>
		<th>Kir</th>
		<th>Gratis</th>
		<th>Lainlian</th>
		<th>Jumlah Pemakaian</th>
		<th>Action</th>
            </tr><?php
            foreach ($detail_pemakaian_data as $detail_pemakaian)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $detail_pemakaian->id_pemakaian ?></td>
			<td><?php echo $detail_pemakaian->kode ?></td>
			<td><?php echo $detail_pemakaian->umum ?></td>
			<td><?php echo $detail_pemakaian->jknpbi ?></td>
			<td><?php echo $detail_pemakaian->jknnonpbi ?></td>
			<td><?php echo $detail_pemakaian->jamkesda ?></td>
			<td><?php echo $detail_pemakaian->jamkesdasktm ?></td>
			<td><?php echo $detail_pemakaian->jamkesdajamkesmas ?></td>
			<td><?php echo $detail_pemakaian->uks ?></td>
			<td><?php echo $detail_pemakaian->kir ?></td>
			<td><?php echo $detail_pemakaian->gratis ?></td>
			<td><?php echo $detail_pemakaian->lainlian ?></td>
			<td><?php echo $detail_pemakaian->jumlah_pemakaian ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('detail_pemakaian/read/'.$detail_pemakaian->id_pakai),'Read'); 
				echo ' | '; 
				echo anchor(site_url('detail_pemakaian/update/'.$detail_pemakaian->id_pakai),'Update'); 
				echo ' | '; 
				echo anchor(site_url('detail_pemakaian/delete/'.$detail_pemakaian->id_pakai),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
		<?php echo anchor(site_url('detail_pemakaian/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('detail_pemakaian/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>