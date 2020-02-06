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
<center><h3>Laporan Tahunan Surat Masuk</h3></center>
<p>Bulan : <?= @tanggal($d1['tanggal_surat']) ?></p>

<table cellspacing="0">
	<thead>
		<th>No. </th>
		<th>Agno</th>
		<th>Tanggal Diterima </th>
		<th>Tanggal Surat </th>
		<th>Nomor Surat </th>
		<th>Asal</th>
		<th>Ringkasan </th>
	</thead>
	<tbody>
		<?php $no = 1; foreach($data as $d): ?>
		<tr>
			<td><?= $no ?></td>
			<td><?= $d->agno; ?></td>
			<td><?= $d->tanggal_diterima ?></td>
			<td><?= $d->tanggal_surat ?></td>
			<td><?= $d->nomor_surat ?></td>
			<td><?= $d->pengirim ?></td>
			<td><?= $d->perihal ?></td>
		</tr>
	<?php $no++; endforeach; ?>
	</tbody>
</table>
<script>
	window.print();
</script>
</body>
</html>