<h2 style="margin-top:0px">Rata-Rata Data Persediaan Obat</h2>
        <!-- <form action="<?php echo site_url('persediaan/dropdown'); ?>" method="get"> -->
        <form action="<?php echo $action; ?>" method="post">
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-3">
               <label for="varchar">Tahun <?php echo form_error('tahun') ?></label>
               <!-- <option>
                <select>Semua</select>
               </option> -->
               <select class="form-control" name='tahun'>
                <?php  
                foreach ($dd_tahun as $dd_tahun) {
                   echo '<option value="'.$dd_tahun->tahun.'">'.$dd_tahun->tahun.'</option>';
                }
                   // echo form_dropdown('tahun','dd_tahun','dd_currenttahun','class="form-control"');
                ?>
                </select>
            </div>
            <div class="col-md-3">
                <label for="int">Bulan <?php echo form_error('bulan') ?></label>
                <?php  
                    /*echo form_dropdown('bulan',$dd_bulan,$dd_currentbulan,'class="form-control"');*/
                ?>
                <select class="form-control" name="bulan">
                    <option value="">Semua</option>
                    <option value="Januari">Januari</option>
                    <option value="Februari">Februari</option>
                    <option value="Maret">Maret</option>
                    <option value="April">April</option>
                    <option value="Mei">Mei</option>
                    <option value="Juni">Juni</option>
                    <option value="Juli">Juli</option>
                    <option value="Agustus">Agustus</option>
                    <option value="Spetember">September</option>
                    <option value="Oktober">Oktober</option>
                    <option value="November">November</option>
                    <option value="Desember">Desember</option>
                </select>
            </div>
            <div class="col-md-3">
            </div>
            <div class="col-md-1">
            </div>
            <div class="col--2">
                <?php/* echo anchor(site_url('persediaan/dropdown'),'Tampilkan', 'class="btn btn-primary"'); */?>
                <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
            </div>
        </div>
        </form>