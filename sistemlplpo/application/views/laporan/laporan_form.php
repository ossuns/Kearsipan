    <body>
        <!-- <h2 style="margin-top:0px">Laporan <?php echo $button ?></h2> -->
        <h2 style="margin-top:0px;text-align:center;">Tambah Laporan Pemakaian dan Lembar Permintaan Obat</h2>
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
	    <div class="form-group">
            <label for="varchar">Pilih Nama Puskesmas <?php echo form_error('nama_puskesmas') ?></label>
            <!--  <input type="text" class="form-control" name="nama_puskesmas" id="nama_puskesmas" placeholder="Nama Puskesmas" value="<?php echo $nama_puskesmas; ?>" /> -->
            <?php  
                echo form_dropdown('puskesmas',$dd_puskesmas,$dd_currentpuskesmas,'class="form-control"');
            ?>
            <!-- <select name="id_destinasi" class="form-control">
                <option>-Pilih Puskesmas-</option>
                    <?php foreach ($nama_puskesmas as $key): ?>
                        <option value="<?php echo $key->id_puskesmas ?>"><?php echo $key->nama_puskesmas ?></option>
                    <?php endforeach ?>
            </select> -->
        </div>
	    <div class="form-group">
            <label for="varchar">Masukkan Tahun <?php echo form_error('tahun') ?></label>
            <input type="text" class="form-control" name="tahun" id="tahun" placeholder="Tahun" value="<?php echo $tahun; ?>"/>
        </div>
        <div class="form-group">
            <label for="varchar">Pilih Bulan <?php echo form_error('bulan') ?></label>
            <!--  <input type="text" class="form-control" name="kecamatan" id="kecamatan" placeholder="Kecamatan" value="<?php echo $kecamatan; ?>" /> -->
            <select class="form-control" name="bulan">
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
        <div class="row">
        <div class="col-md-6">
            <label for="varchar">Upload Laporan <i>*Upload Laporan dengan format .xls</i> </label>
            <input type="file" class="form-control" name="laporan" id="laporan" placeholder="Laporan" value="<?php echo $laporan; ?>" />
        </div>
        <div class="col-md-6">
            <p>Download format Laporan</p>
            <a href="<?php echo site_url('laporan/laporan_format')?>" class="nav-link" >
                <p>Format Laporan LPLPO</p>
            </a>
        </div>
        </div>
	    <!-- <input type="hidden" name="id_puskesmas" value="<?php echo $id_puskesmas; ?>" />  -->
        <!-- <input type="hidden" name="id_puskesmas" value="<?php echo $id_puskesmas; ?>" /> 
        <input type="hidden" name="id_puskesmas" value="<?php echo $id_puskesmas; ?>" />  -->
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('laporan') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
