    <body>
        <h2 style="margin-top:0px">Pencarian Data Persediaan Obat</h2>
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
                 <label for="varchar">Puskesmas <?php echo form_error('tahun') ?></label>
                <?php  
                    /*echo form_dropdown('puskesmas',$dd_puskesmas,$dd_currentpuskesmas,'class="form-control"');*/
                ?>
                 <select class="form-control" name="id_puskesmas">
                    <option value="0">Semua</option>
                    <option value="1">Colomadu1</option>
                    <option value="2">Colomadu2</option>
                    <option value="3">Gondangrejo</option>
                    <option value="4">Jaten1</option>
                    <option value="5">Jaten2</option>
                    <option value="6">Jatipuro</option>
                    <option value="7">Jatiyoso</option>
                    <option value="8">Jenawi</option>
                    <option value="9">Jumapolo</option>
                    <option value="10">Jumantono</option>
                    <option value="11">Karanganyar</option>
                    <option value="12">Karangpandan</option>
                    <option value="13">Kebakkramat1</option>
                    <option value="14">Kebakkramat2</option>
                    <option value="15">Kerjo</option>
                    <option value="16">Matesih</option>
                    <option value="17">Mojogedang1</option>
                    <option value="18">Mojogedang2</option>
                    <option value="19">Ngargoyoso</option>
                    <option value="20">Tasikmadu</option>
                    <option value="21">Tawangmangu</option>
                </select>
            </div>
            <div class="col-md-1">
            </div>
            <div class="col--2">
                <?php/* echo anchor(site_url('persediaan/dropdown'),'Tampilkan', 'class="btn btn-primary"'); */?>
                <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
            </div>
        </div>
        <?phpform_open('Createsurat/input_surat');?>
        </form>
    </body>