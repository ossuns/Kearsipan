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
            <div class="col-md-4">
                <?php echo anchor(site_url('persediaan/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
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
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Kode</th>
        <th>Nama Obat</th>
		<th>Persediaan</th>
		<!-- <th>Action</th>-->            
        </tr><?php
            foreach ($persediaan_data as $persediaan)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
            <td><?php echo $persediaan->kode ?></td>
            <td><?php echo $persediaan->nama_obat ?></td>
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
		<?php echo anchor(site_url('persediaan/excel/'.$this->session->flashdata('id_puskesmas')."/".$bulan."/".$this->session->flashdata('tahun')), 'Excel', 'class="btn btn-primary"'); ?>
<!-- 		<?php echo anchor(site_url('persediaan/word/'.$this->session->flashdata('id_puskesmas')."/".$bulan."/".$this->session->flashdata('tahun')), 'Word', 'class="btn btn-primary"'); ?> -->
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
<!-- </html>