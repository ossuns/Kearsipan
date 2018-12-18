        
        <body>
        <h2 style="margin-top:0px">Laporan List</h2>
        <div class="row" style="margin-bottom: 10px">
            <!-- <div class="col-md-1">
              <?php echo anchor(site_url('obat/create'),'Create', 'class="btn btn-primary"'); ?> 
            </div> -->
            <div class="col-md-4">
                <?php echo anchor(site_url('obat/excel'),'cetak', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('obat/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('laporan'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-12" style="overflow-x: auto">
        <table class="table table-bordered" style="margin-bottom: 10px;" >
            <tr>
                <th rowspan="2">No</th>
        <th rowspan="2">Kode</th>
        <th rowspan="2">Nama Obat</th>
        <th rowspan="2">Satuan</th>
        <th rowspan="2">Stok Awal</th>
        <th rowspan="2">Penerimaan</th>
        <th rowspan="2">Persediaan</th>
        <th colspan="11">Pemakaian</th>
        <th rowspan="2">Sisa Stok</th>
        <th rowspan="2">Permintaan</th>
        <th rowspan="2">Penerimaan</th>
        <th rowspan="2">Action</th>
            </tr>
        <tr>
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
        </tr>
            <?php
            foreach ($Laporan_data as $laporan)
            {
                ?>
                <tr>
            <td width="80px"><?php echo ++$start ?></td>
            <td><?php echo $laporan->kode ?></td>
            <td><?php echo $laporan->nama_obat ?></td>
            <td><?php echo $laporan->satuan ?></td>
            <td><?php echo $laporan->stok_awal ?></td>
            <td><?php echo $laporan->jumlah_terima ?></td>
            <td><?php echo $laporan->persediaan?></td>
            <td><?php echo $laporan->umum ?></td>
            <td><?php echo $laporan->jknpbi ?></td>
            <td><?php echo $laporan->jknnonpbi ?></td>
            <td><?php echo $laporan->jamkesda ?></td>
            <td><?php echo $laporan->jamkesdasktm ?></td>
            <td><?php echo $laporan->jamkesdajamkesmas ?></td>
            <td><?php echo $laporan->uks ?></td>
            <td><?php echo $laporan->kir ?></td>
            <td><?php echo $laporan->gratis ?></td>
            <td><?php echo $laporan->lainlain ?></td>
            <td><?php echo $laporan->jumlah_pemakaian ?></td>
            <td><?php echo $laporan->sisa_stok ?></td>
            <td><?php echo $laporan->permintaan ?></td>
            <td><?php echo $laporan->pemberian ?></td>
            <td style="text-align:center" width="200px">
                <?php 
                echo anchor(site_url('laporan/read/'.$laporan->kode),'Read'); 
                echo ' | '; 
                echo anchor(site_url('laporan/update/'.$laporan->kode),'Update'); 
                echo ' | '; 
                echo anchor(site_url('laporan/delete/'.$laporan->kode),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                ?>
            </td>
        </tr>
                <?php
            }
            ?>
        </table>
        </div>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
        <?php echo anchor(site_url('laporan/excel'), 'Excel', 'class="btn btn-primary"'); ?>
        <?php echo anchor(site_url('laporan/word'), 'Word', 'class="btn btn-primary"'); ?>
        </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>