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
        <h2 style="margin-top:0px;text-align:center;font-size:25px;">Data Persediaan Obat Dinas Kesehatan Kabupaten Karanganyar
         <br>Puskesmas <?php if($id_puskesmas==1){echo 'Colomadu1'; 
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
                        }?>
    <br>Bulan <?php if ($bulan!='all'){
            echo $bulan;
        }else{
            echo 'Januari-Desember';
        } ?> Tahun <?php echo $tahun; ?></h4>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>KODE</th>
        <th>NAMA OBAT</th>
		<th>PERSEDIAAN</th>
		
            </tr><?php
            foreach ($persediaan_data as $persediaan)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $persediaan->kode ?></td>
		      <td><?php echo $persediaan->nama_obat ?></td>
		      <td><?php echo $persediaan->persediaan ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>