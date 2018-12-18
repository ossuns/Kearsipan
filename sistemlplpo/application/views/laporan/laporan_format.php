<!DOCTYPE html>
<html>
<head>
	<title>Export Data Ke Excel Dengan PHP - www.malasngoding.com</title>
</head>
<body>
	<style type="text/css">
	body{
		font-family:  Arial, Helvetica, sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
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
		<h4 style="margin-top:0px;text-align:center;font-size:9pt;font-family:  Arial, Helvetica, sans-serif">LAPORAN PEMAKAIAN OBAT DAN PERMINTAAN OBAT 
	<br>PUSKESMAS (Nama Puskesmas)
	<br>BULAN (Bulan) TAHUN (Tahun)</h4>
	</table>
		<table border=1 style="font-size:9pt,font-family:  Arial, Helvetica, sans-serif;">
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
			<tr>
				<td>1</td>
		        <td>101</td>
	            <td>IV CATHETER NO 24 G</td>
	            <td>SET</td>
	            <td>202</td>
	            <td>-</td>
	            <td>202</td>
	            <td>-</td>
	            <td>10</td>
	            <td>-</td>
	            <td>-</td>
	            <td>1</td>
	            <td>-</td>
	            <td>-</td>
	            <td>-</td>
	            <td>-</td>
	            <td>-</td>
	            <td>11</td>
	            <td>191</td>
	            <td>-</td>
	            <td>-</td>
			</tr>
			<tr>
				<td>2</td>
		        <td>102</td>
	            <td>IV CATHETER NO 22 G</td>
	            <td>SET</td>
	            <td>333</td>
	            <td>-</td>
	            <td>333</td>
	            <td>-</td>
	            <td>14</td>
	            <td>-</td>
	            <td>-</td>
	            <td>1</td>
	            <td>-</td>
	            <td>-</td>
	            <td>-</td>
	            <td>-</td>
	            <td>-</td>
	            <td>15</td>
	            <td>318</td>
	            <td>-</td>
	            <td>-</td>
			</tr>
		</tbody>
	</table>
</body>
</html>