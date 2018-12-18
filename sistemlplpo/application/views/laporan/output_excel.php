<!DOCTYPE html>
<html>
<head>
	<title>Laporan</title>
	 <meta charset="UTF-8">
	 	<style type="text/css">
			body{
				font-family:  Arial, Helvetica, sans-serif;
			}
			table{
				margin: 10px auto;
				border-collapse: collapse;
			}
			table th{
				border: 1px solid #3c3c3c;
				padding: 3px 8px;
				max-height: 200px;
				overflow-y:auto;
				overflow-x:hidden;
		 
			}
			table td{
				border: 1px solid #3c3c3c;
				padding: 3px 8px;
		 
			}
			a{
				background: blue;
				color: #fff;
				padding: 8px 10px;
				text-decoration: none;
				border-radius: 2px;
			}
		</style>
</head>
<body>
	<h4 style="margin-top:0px;text-align:center;font-size:9pt;font-face:arial">LAPORAN PEMAKAIAN OBAT DAN PERMINTAAN OBAT
	<br>PUSKESMAS <?php if($id_puskesmas==1){echo 'Colomadu1'; 
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
	<br>BULAN <?php if ($bulan!='all'){
            echo $bulan;
        }else{
            $bulan = 'Januari - Desember';
            echo $bulan;
        } ?> TAHUN <?php echo $tahun; ?></h4>
	<table border=1 style="font-size:9pt;">
		<thead>
			<tr>
				<th rowspan=2>NO</th>
				<th rowspan=2>KODE</th>
				<th rowspan=2>NAMA OBAT</th>
				<th rowspan=2>SATUAN</th>
				<th rowspan=2>STOK AWAL</th>
				<th rowspan=2>PENERIMA</th>
				<th rowspan=2>PERSEDIAAN</th>
				<th colspan=11 style="width:580px;">PEMAKAIAN</th>
				<th rowspan=2>SISA STOK</th>
				<th rowspan=2>PERMINTAAN</th>
				<th rowspan=2>PEMBERIAN</th>
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
		</thead>
		<tbody>
			<?php $no = 1; ?>
			<?php foreach ($data as $d): ?>
			<tr>
				<td><?php echo $no++; ?></td>
		        <td><?php echo $d->kode; ?></td>
	            <td><?php echo $d->nama_obat; ?></td>
	            <td><?php echo $d->satuan; ?></td>
	            <td><?php echo $d->stok_awal; ?></td>
	            <td><?php echo $d->jumlah_terima; ?></td>
	            <td><?php echo $d->persediaan; ?></td>
	            <td><?php echo $d->umum; ?></td>
	            <td><?php echo $d->jknpbi; ?></td>
	            <td><?php echo $d->jknnonpbi; ?></td>
	            <td><?php echo $d->jamkesda; ?></td>
	            <td><?php echo $d->jamkesdasktm; ?></td>
	            <td><?php echo $d->jamkesdajamkesmas; ?></td>
	            <td><?php echo $d->uks; ?></td>
	            <td><?php echo $d->kir; ?></td>
	            <td><?php echo $d->gratis; ?></td>
	            <td><?php echo $d->lainlain; ?></td>
	            <td><?php echo $d->jumlah_pemakaian; ?></td>
	            <td><?php echo $d->sisa_stok; ?></td>
	            <td><?php echo $d->permintaan; ?></td>
	            <td><?php echo $d->pemberian; ?></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</body>
</html>