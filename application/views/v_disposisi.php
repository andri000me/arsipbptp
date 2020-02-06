<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		tr.border_bottom  {
		  border-bottom: 1px solid black;
		  border-right: 1px solid black;
		}

		.td-border {
			border-right: 1px solid black;
		}
		table {
			border-left: 1px solid black;
			border-right: : 1px solid black;
			border-bottom: 1px solid black;
			border-top: 1px solid black;

		  border-collapse: collapse;
		}
		body{
			font-family: times new roman;
		}
		.jarak{
			border-spacing: 50px;
		}
		h3, h4, h5{
			margin: 0;
			padding: 0;
			
		}
		h3{
			border-left: 1px solid black;
			border-right: 1px solid black;
			border-top: 1px solid black;
		}
		h4, h5{
			border-left: 1px solid black;
			border-right: 1px solid black;
		}
		#ringkas{
			text-align: justify;
		}
		span{
			float:right;
		}
		#tgh{
			text-align:center;
		}
	</style>
</head>
<body>
<center>
<h3><b>KEMENTERIAN PERTANIAN</b></h3>
<h4><b>BALAI PENGKAJIAN TEKNOLOGI PERTANIAN</b></h4>
<h5><b>JL. Kaharuddin Nasution No. 341 Pekanbaru</b></h5>


<b><h3>LEMBARAN DISPOSISI</h3></b>

<table width="100%">
	<tr class="border_bottom">
		<td width="30%">Agno</td>
		<td width="20%" class="td-border">: <?= $data['agno'] ?></td>
		<td width="30%">Tingkat Keamanan</td>
		<td width="20%">: SR/R/K/B</td>
	</tr>
	<tr class="border_bottom">
		<td>Tanggal Penerimaan</td>
		<td class="td-border">: <?= tgl($data['tanggal_diterima']) ?></td>
		<td>Tanggal Penyelesaian</td>
		<td>:</td>
	</tr>
</table>
<table width="100%" class="jarak" cellpadding="5" cellspacing="0">
	<tr class="">
		<td width="30%">Tanggal dan Nomor Surat<span>:</span></td>
		<td width="70%" class="td-border"> <?= tgl($data['tanggal_surat']) ?> / <?= $data['nomor_surat'] ?></td>
	</tr>
	<tr class="">
		<td>Dari<span>:</span></td>
		<td class="td-border"> <?= $data['pengirim'] ?></td>
	</tr>
	<tr class="">
		<td>Ringkasan<span>:</span></td>
		<td class="td-border"> <?= $data['perihal'] ?></td>
	</tr>
	<tr class="">
		<td>Lampiran<span>:</span></td>
		<td class="td-border"> </td>
	</tr>
</table>
<table border="1px solid black" width="100%">
	<tr>
		<td width="50%" id="tgh">DISPOSISI</td>
		<td id="tgh">Diteruskan Kepada</td>
		<td width="10%" id="tgh">Paraf</td>
	</tr>
	<tr>
		<td></td>
		<td>
			<ol>
				<li>Ka. Balai</li>
				<li>Ka. Sub Bag Tata Usaha</li>
				<li>Kasi Kerjasama dan Pelayanan Pengkajian</li>
				<li>Koordinator Program</li>
				<li>Ketua Kelompok Pengkaji ......</li>
				<li>Ka. Ur. Keuangan</li>
				<li>Ka. Ur. Kepegawaian</li>
				<li>Ka. Ur. Perlengkapan/RT</li>
				<li>Laboratorium .........</li>
				<li>......................</li>
				<li>......................</li>
			</ol>
		</td>
		<td></td>
	</tr>
	<tr>
		<td colspan="3">Setelah digunakan harap segera dikembalikan kepada : ..........</td>
	</tr>
</table>
</center>
<script>
	window.print();
</script>
</body>
</html>