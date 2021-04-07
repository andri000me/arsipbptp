<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		.gbr{
			width: 50%;
			margin-right: auto;
			margin-left: auto;
			display: block;
			width: 1024px;
			margin-top: -150px;
			margin-bottom: -150px;
		}
		body{
			font-family: Times New Roman;
		}
		table, th, td{
			border: 1px solid black;
		}

		table{
			width: 100%;
			margin-right: auto;
			margin-left: auto;
		}
	</style>

</head>
<body>
<img src="<?= base_url() ?>/assets/images/kop.png" class='gbr'>
<center><h3>Laporan Tahunan Surat Keluar</h3></center>
<p>Bulan : <?= @tanggal($d1['tanggal_surat']) ?></p>

<table cellspacing="0">
	<thead>
		<th>No. </th>
		<th>Tanggal Surat </th>
		<th>Nomor Surat </th>
		<th>Ringkasan </th>
		<th>Tujuan </th>
	</thead>
	<tbody>
		<?php $no = 1; foreach($data as $d): ?>
		<tr>
			<td><?= $no ?></td>
			<td><?= tgl($d->tanggal_surat) ?></td>
			<td><?= $d->nomor_surat ?></td>
			<td><?= $d->ringkasan ?></td>
			<td><?= $d->tujuan ?></td>
		</tr>
	<?php $no++; endforeach; ?>
	</tbody>
</table>
<script>
	window.print();
</script>
</body>
</html>