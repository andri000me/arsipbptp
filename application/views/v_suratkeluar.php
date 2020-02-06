 <section class="content-header">
      <h1>
        Surat Keluar
        <small>Data Surat Keluar</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url('c_superadmin/'); ?>"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="<?= base_url('c_superadmin/suratkeluar'); ?>"> Surat Keluar</a></li>
        <li class="active">Data</li>
      </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">

        <div class="box-header">
            <?= $this->session->flashdata('message'); ?>
          <div class="btn-group pull-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                Tambah Data
              </button>
          </div>          
        </div>

        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Nomor Surat</th>
              <th>Tanggal Surat</th>
              <th>Ringkasan</th>
              <th>Tujuan</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
              <?php $no=1; foreach($suratkeluar as $s): ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $s->nomor_surat; ?></td>
              <td><?= tgl($s->tanggal_surat);?></td>
              <td><?= $s->ringkasan; ?></td>
              <td><?= $s->tujuan; ?></td>
              <td align="center">

                <a href="<?= base_url('c_superadmin/downloadSuratKeluar/'.$s->id_surat); ?>"  class="btn bg-navy btn-sm" data-toogle="tooltip" title="Download Surat" data-placement="right"><i class="fa fa-download"></i></a>
                <a href="#"  data-toggle="modal" data-target="#modal_view<?= $s->id_surat;?>" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                <a href="#"  data-toggle="modal" data-target="#modal_edit<?= $s->id_surat;?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                <a href="#"  data-toggle="modal" data-target="#modal_hapus<?php echo $s->id_surat;?>" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-xs"></i></a>
              </td>
            </tr>

          <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- =======================modal tambah data surat================================== -->

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah Data</h4>

      </div>
      <div class="modal-body">
       <!--  <form class="form-horizontal" action="<?= base_url('c_superadmin/tambahsuratkeluar'); ?>" method="post" role="from" enctype="multipart/form-data"> -->

          <?php echo form_open_multipart('c_superadmin/tambahsuratkeluar');  ?>
          <div class="form-horizontal">
          <div class="box-body">
            
            <div class="form-group">
              <label  class="col-sm-2 control-label">Nomor Surat</label>
              <div class="col-sm-10">
                <input type="text" name="no_surat" class="form-control" required>
                <?= form_error('no_surat','<small class="text-danger pl-3">','</small>'); ?>
              </div>
            </div>

            <div class="form-group">
              <label   class="col-sm-2 control-label">Tanggal Surat</label>
              <div class="col-sm-10">
                <input type="text" name="tgl_surat"  class="form-control" id="datepicker2" required>
                <?= form_error('tgl_surat','<small class="text-danger pl-3">','</small>'); ?>
              </div>
            </div>

            <div class="form-group">
              <label  class="col-sm-2 control-label">Ringkasan</label>
              <div class="col-sm-10">
                <input type="text" name="ringkasan"  class="form-control"  required >
                <?= form_error('ringkasan','<small class="text-danger pl-3">','</small>'); ?>
              </div>
            </div>

            <div class="form-group">
              <label  class="col-sm-2 control-label">Tujuan</label>
              <div class="col-sm-6">
                 
                <select name="tujuan" class="selectpicker" data-show-subtext="true" data-live-search="true" required>
                  <option>----Select Tujuan----</option>
                 <?php foreach ($pengirim as $p):?>

                    <option value="<?= $p->nama_instansi; ?>"><?= $p->nama_instansi; ?></option>
                  <?php endforeach; ?>
                </select>
                <?= form_error('tujuan','<small class="text-danger pl-3">','</small>'); ?> 
              </div>
              
            </div>



            <!-- <div class="form-group">
              <label  class="col-sm-2 control-label">Tujuan</label>
              <div class="col-sm-10">
                <input type="text" class="form-control"  name="tujuan"  required >
                <?= form_error('tujuan','<small class="text-danger pl-3">','</small>'); ?>
              </div>
            </div> -->

            <div class="form-group">
              <label   class="col-sm-2 control-label">File Surat</label>
              <div class="col-sm-10">
                <input type="file" name="file" class="form-control"  required >
                <?= form_error('file','<small class="text-danger pl-3">','</small>'); ?>
                <p class="help-block">* File berbentuk PDF</p>

              </div>
            </div>
          
          </div> 

          <div class="modal-footer">
            <button type="submit" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>  
        </div>
        </form>
      </div>
      
    </div>
    <!-- /.modal-content -->
  </div>
</div>



<!-- =============================modal edit data surat================================== -->

<?php foreach($suratkeluar as $s): ?>
<div class="modal fade" id="modal_edit<?= $s->id_surat;?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Data Surat</h4>

      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="<?= base_url('c_superadmin/editsuratkeluar'); ?>" method="post" role="from" enctype="multipart/form-data">
          <div class="box-body">
            
            <div class="form-group">
              <label  class="col-sm-2 control-label">Nomor Surat</label>
              <div class="col-sm-10">
                <input type="hidden" name="id_surat" value="<?= $s->id_surat; ?>">
                <input type="text" name="no_surat" class="form-control" value="<?= $s->nomor_surat ?>" required>
                <?= form_error('no_surat','<small class="text-danger pl-3">','</small>'); ?>
              </div>
            </div>

            <div class="form-group">
              <label   class="col-sm-2 control-label">Tanggal Surat</label>
              <div class="col-sm-10">
                <input type="text" name="tgl_surat"  class="form-control" id="datepicker1" value="<?= $s->tanggal_surat; ?>" required>
                <?= form_error('tgl_surat','<small class="text-danger pl-3">','</small>'); ?>
              </div>
            </div>

            <div class="form-group">
              <label  class="col-sm-2 control-label">Ringkasan</label>
              <div class="col-sm-10">
                <input type="text" name="ringkasan"  class="form-control" value="<?= $s->ringkasan; ?>"  required >
                <?= form_error('ringkasan','<small class="text-danger pl-3">','</small>'); ?>
              </div>
            </div>

            <div class="form-group">
              <label  class="col-sm-2 control-label">Tujuan</label>
              <div class="col-sm-10">
                <input type="text" class="form-control"  name="tujuan" value="<?= $s->tujuan; ?>" required >
                <?= form_error('tujuan','<small class="text-danger pl-3">','</small>'); ?>
              </div>
            </div>


            <div class="form-group">
              <label   class="col-sm-2 control-label">File Surat</label>
              <div class="col-sm-4">
                <?= $s->file; ?>
              </div>
              <div class="col-sm-6">
              <input type="file" name="file" class="form-control" value="<?= $s->file; ?>" >
                <?= form_error('file','<small class="text-danger pl-3">','</small>'); ?>
                <p class="help-block">* File berbentuk PDF</p>
              </div>
            </div>
          
          </div> 

          <div class="modal-footer">
            <button type="submit" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>  
        
        </form>
      </div>
      
    </div>
    <!-- /.modal-content -->
  </div>
</div>
<?php endforeach; ?>



<!--================================ modal hapus====================================== -->
<?php foreach($suratkeluar as $s): ?>
<div class="modal fade" id="modal_hapus<?= $s->id_surat;?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Hapus Data Surat</h4>

      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="<?= base_url('c_superadmin/hapussuratkeluar'); ?>" method="post" role="from" enctype="multipart/form-data">
          <div class="box-body">
           <div class="modal-body">
              <p>Anda Yakin Mau Menghapus Data ini? </p>
            </div>
          </div> 

          <div class="modal-footer">
            <input type="hidden" name="id_surat" value="<?php echo $s->id_surat;?>">
            <button type="submit" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger">Hapus</button>
          </div>  
        
        </form>
      </div>
      
    </div>
    <!-- /.modal-content -->
  </div>
</div>
<?php endforeach; ?>


<!--================================ modal detail====================================== -->
<?php foreach($suratkeluar as $s): ?>
<div class="modal fade" id="modal_view<?= $s->id_surat;?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Detail Data Surat</h4>

      </div>
      <div class="modal-body">
        <div class="row">
            
          <div class="col-sm-3">
            <img src="<?= base_url() ?>assets/images/<?= $s->file; ?>" width="100px" alt="gambar">
          </div>
          <div class="col-sm-9">
            <div class="col-sm-12">
              <div class="form-group">
                <label  class="col-sm-4 control-label" style="font-size: 20px!important;">Nomor Surat</label>
                <div class="col-sm-8">
                  <p class="pull-right" style="font-size: 20px!important;"><?= $s->nomor_surat; ?></p>
                </div>
              </div><br>
            </div>
            
            <div class="col-sm-12">
              <div class="form-group">
                  <label  class="col-sm-4 control-label">Tanggal Surat</label>
                  <div class="col-sm-8">
                    <p class="pull-right"><?= $s->tanggal_surat; ?></p>
                  </div>
              </div>
            </div>
            
            <div class="col-sm-12">
              <div class="form-group">
                <label  class="col-sm-4 control-label">Ringkasan</label>
                <div class="col-sm-8">
                  <p class="pull-right"><?= $s->ringkasan; ?></p>
                </div>
            </div>
          
            </div>
            
            <div class="col-sm-12">
              <div class="form-group">
                <label  class="col-sm-4 control-label">Tujuan</label>
                <div class="col-sm-8">
                  <p class="pull-right"><?= $s->tujuan; ?></p>
                </div>
            </div>
            </div>
                       
          </div>
        </div>
      </div>
        
      <div class="modal-footer">
        <input type="hidden" name="id_surat" value="<?php echo $s->id_surat;?>">
        <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>  
        
     
      
    </div>
    <!-- /.modal-content -->
  </div>
</div>
<?php endforeach; ?>
<!--================================ end modal detail====================================== -->



