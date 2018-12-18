        
        <body>
        <h2 style="margin-top:0px;text-align:center;">Laporan Pemakaian dan Lembar Permintaan Obat Dinas Kesehatan Kabupaten Karanganyar</h2>
        <p>Bulan :  <?php if ($bulan!=''){
            echo $bulan;
        }else{
            echo $bulan = 'Januari - Desember';

            $bulan ='all';
        } ?></p>
        <p>Tahun :  <?php echo $tahun; ?></p>
        <p>Puskesmas :  <?php if($id_puskesmas==1){echo 'Colomadu1'; 
                        }elseif($id_puskesmas==2){echo 'Colomadu2';
                        }elseif($id_puskesmas==3){echo 'Gondangrejo';
                        }elseif($id_puskesmas==4){echo 'Jaten1';
                        }elseif($id_puskesmas==5){echo 'Jaten2';
                        }elseif($id_puskesmas==6){echo 'Jatipuro';
                        }elseif($id_puskesmas==7){echo 'Jatiyoso';
                        }elseif($id_puskesmas==8){echo 'Jenawi';
                        }elseif($id_puskesmas==9){echo 'Jumapolo';
                        }elseif($id_puskesmas==10){echo 'Jumantono';
                        }elseif($id_puskesmas==11){echo 'Karanganyar';
                        }elseif($id_puskesmas==12){echo 'Karangpandan';
                        }elseif($id_puskesmas==13){echo 'Kebakkramat1';
                        }elseif($id_puskesmas==14){echo 'Kebakkramat2';
                        }elseif($id_puskesmas==15){echo 'Kerja';
                        }elseif($id_puskesmas==16){echo 'Matesih';
                        }elseif($id_puskesmas==17){echo 'Mojogedang1';
                        }elseif($id_puskesmas==18){echo 'Mojogedang2';
                        }elseif($id_puskesmas==19){echo 'Ngargoyoso';
                        }elseif($id_puskesmas==20){echo 'Tasikmadu';
                        }elseif($id_puskesmas==21){echo 'Tawangmangu';
                        }else{echo 'Semua Puskesmas';
                        }?></p>
        <div class="row" style="margin-bottom: 10px">
            <!-- <div class="col-md-1">
              <?php echo anchor(site_url('obat/create'),'Create', 'class="btn btn-primary"'); ?> 
            </div> -->
            <!-- <div class="col-md-4">
                <?php echo anchor(site_url('obat/excel'),'cetak', 'class="btn btn-primary"'); ?>
            </div> -->
            <div class="col-md-4">
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
        <!-- <th rowspan="2">Action</th> -->
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
           <!--  <td style="text-align:center" width="200px">
                <?php 
                echo anchor(site_url('laporan/read/'.$laporan->kode),'Read'); 
                echo ' | '; 
                echo anchor(site_url('laporan/update/'.$laporan->kode),'Update'); 
                echo ' | '; 
                echo anchor(site_url('laporan/delete/'.$laporan->kode),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                ?>
            </td> -->
        </tr>
                <?php
            }
            ?>
        </table>
        </div>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
        <?php echo anchor(site_url('laporan/excel/'.$this->session->flashdata('id_puskesmas')."/".$bulan."/".$this->session->flashdata('tahun')), 'Excel', 'class="btn btn-primary"'); ?>
<!--         <?php echo anchor(site_url('laporan/word/'.$this->session->flashdata('id_puskesmas')."/".$this->session->flashdata('bulan')."/".$this->session->flashdata('tahun')), 'Word', 'class="btn btn-primary"'); ?>
 -->        </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>