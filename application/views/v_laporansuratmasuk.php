 <section class="content-header">
 	<h1>
 		Laporan Surat Masuk
 		<!-- <small>Data Surat Keluar</small> -->
 	</h1>
 	<ol class="breadcrumb">
 		<li><a href="<?= base_url('c_superadmin/'); ?>"><i class="fa fa-home"></i> Home</a></li>
 		<li><a href="<?= base_url('c_superadmin/laporansuratmasuk'); ?>"> Laporan</a></li>
 		<li class="active">Laporan Surat Masuk</li>
 	</ol>
 </section>

 <section class="content">
 	<div class="row">
 		<div class="col-xs-12">
 			<div class="box">
 				<div class="box-body">
 					<div class="panel panel-default tabs">
 						<ul class="nav nav-tabs" role="tablist">
 							<li class="active"><a href="#tab-first" role="tab" data-toggle="tab">Laporan Bulanan</a></li>
 							<li><a href="#tab-second" role="tab" data-toggle="tab">Laporan Tahunan</a></li>
 						</ul>
 						<div class="panel-body tab-content">
 							<div class="tab-pane active" id="tab-first">
 								<span style='font-size:14pt; font-weight:bold;'>
 									Laporan Bulanan Data Surat Masuk
 								</span></br></br>

 								<form method="post" action="<?= base_url('c_superadmin/actionlaporanmasukbulanan/'); ?>" target='_blank1'>
 									
 										<div class="form-group">
 											<div class="col-sm-4">
 												<label>Pilih bulan</label>
 												<select name="bulan" class="form-control" required>

 													<?php
														foreach (bulan() as $b => $c) :
														?>
 														<option value="<?= $b ?>"><?= $c ?></option>
 													<?php endforeach; ?>

 												</select>
 											</div>
 										</div>

 										<div class="form-group">
 											<div class="col-sm-4">
 												<label>Pilih tahun</label>
 												<select name="tahun" class="form-control" required="required">

 													<?php
														for ($x = date('Y'); $x >= date('Y') - 20; $x--) :
														?>
 														<option value="<?= $x ?>"><?= $x ?></option>
 													<?php endfor; ?>
 												</select>
 											</div>
 										</div>

 										<div class="form-group">
 											<div class="col-sm-2">

 												<input type="submit" class="form-control btn btn-info" style="margin-top: 24px" value="Cetak">
 											</div>
 										</div>
 								</form>

 							</div>

 							<div class="tab-pane" id="tab-second">
 								<span style='font-size:14pt;  '>
 									Laporan Tahunan Data Surat Masuk
 								</span></br></br>
 								<form method="post" action="<?= base_url('c_superadmin/actionlaporanmasuktahunan'); ?>" target='_blank1' class='form-vertical'>
 									
 										<div class="col-sm-4">
 											<label>Pilih tahun</label>
 											<select name="tahun" class="form-control" required>

 												<?php
													for ($x = date('Y'); $x >= date('Y') - 20; $x--) :
													?>
 													<option value="<?= $x ?>"><?= $x ?></option>
 												<?php endfor; ?>

 											</select>
 										</div>
 									

 									<div class="form-group">
 										<div class="col-sm-2">

 											<input type="submit" style="margin-top: 24px" class="form-control btn btn-info" value="Cetak">
 										</div>
 									</div>

 								</form>
 							</div>
 						</div>
 					</div>

 				</div>

 			</div>
 		</div>
 	</div>
 </section>