<?php 

function bulan(){
	return $arr = [
		'01' => 'Januari',
		'02' => 'Februari',
		'03' => 'Maret',
		'04' => 'April',
		'05' => 'Mei',
		'06' => 'Juni',
		'07' => 'Juli',
		'08' => 'Agustus',
		'09' => 'September',
		'10' => 'Oktober',
		'11' => 'November',
		'12' => 'Desember'
	];
}

function tgl($tgl){
//pecahkan dtanggal, pertanda -
	$tanggal = explode('-',$tgl);
// explode(delimiter:'-', string: $tgl);
	//hasil pecahan
	$tahun = $tanggal[0];
	$bulan = $tanggal[1];
	$hari =$tanggal[2];

	$bulanArr = [
		'01' => 'Januari',
		'02' => 'Februari',
		'03' => 'Maret',
		'04' => 'April',
		'05' => 'Mei',
		'06' => 'Juni',
		'07' => 'Juli',
		'08' => 'Agustus',
		'09' => 'September',
		'10' => 'Oktober',
		'11' => 'November',
		'12' => 'Desember'
	];

	return $hari.' '.$bulanArr[$bulan].' '.$tahun;
}


function tanggal($tgl){
//pecahkan dtanggal, pertanda -
	$tanggal = explode('-',$tgl);
// explode(delimiter:'-', string: $tgl);
	//hasil pecahan
	$tahun = $tanggal[0];
	$bulan = $tanggal[1];
	$hari =$tanggal[2];

	$bulanArr = [
		'01' => 'Januari',
		'02' => 'Februari',
		'03' => 'Maret',
		'04' => 'April',
		'05' => 'Mei',
		'06' => 'Juni',
		'07' => 'Juli',
		'08' => 'Agustus',
		'09' => 'September',
		'10' => 'Oktober',
		'11' => 'November',
		'12' => 'Desember'
	];

	return$bulanArr[$bulan].' '.$tahun;

}

function tahun($tgl){
//pecahkan dtanggal, pertanda -
	$tanggal = explode('-',$tgl);
// explode(delimiter:'-', string: $tgl);
	//hasil pecahan
	$tahun = $tanggal[0];
	$bulan = $tanggal[1];
	$hari =$tanggal[2];

	$bulanArr = [
		'01' => 'Januari',
		'02' => 'Februari',
		'03' => 'Maret',
		'04' => 'April',
		'05' => 'Mei',
		'06' => 'Juni',
		'07' => 'Juli',
		'08' => 'Agustus',
		'09' => 'September',
		'10' => 'Oktober',
		'11' => 'November',
		'12' => 'Desember'
	];

	return $tahun;

}

 ?>