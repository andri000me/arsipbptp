 <section class="content-header">
      <h1>
        Data Master
        <small>Instansi</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url('c_superadmin/'); ?>"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="<?= base_url('c_superadmin/instansi'); ?>"> Data Master</a></li>
        <li class="active">Instansi</li>
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
                Tambah Instansi
              </button>
          </div>          
        </div>

        <div class="box-body table-responsive">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Nama Instansi</th>
              
              <th>aksi</th>
            </tr>
            </thead>
            <tbody>
              <?php $no=1; foreach($instansi as $s): ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $s->nama_instansi; ?></td>
             
              <td align="center">

                <a href="#"  data-toggle="modal" data-target="#modal_edit<?= $s->id;?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                <a href="#"  data-toggle="modal" data-target="#modal_hapus<?php echo $s->id;?>" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-xs"></i></a>
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

<!-- =======================modal tambah data Users================================== -->

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah Instansi</h4>

      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="<?= base_url('c_superadmin/tambahinstansi'); ?>" method="post" role="from" enctype="multipart/form-data">
          <div class="box-body">
            
            <div class="form-group">
              <label  class="col-sm-2 control-label">Nama Instansi</label>
              <div class="col-sm-10">
                <input type="text" name="nama" class="form-control" required autofocus>
                <?= form_error('nama','<small class="text-danger pl-3">','</small>'); ?>
              </div>
            </div>

          </div> 

          <div class="modal-footer">
            <button type="submit" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>  
        
        </form>
      </div>
      
    </div>
    <!-- /.modal-content -->
  </div>
</div>



<!-- =============================modal edit data surat================================== -->

<?php foreach($instansi as $s): ?>
<div class="modal fade" id="modal_edit<?= $s->id;?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Data Instansi</h4>

      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="<?= base_url('c_superadmin/editinstansi'); ?>" method="post" role="from" enctype="multipart/form-data">
          <div class="box-body">
            
            <div class="form-group">
              <label  class="col-sm-2 control-label">Nama Instansi</label>
              <div class="col-sm-10">
                <input type="hidden" name="id" value="<?= $s->id; ?>">
                <input type="text" name="nama" class="form-control" value="<?= $s->nama_instansi; ?>" required>
                <?= form_error('nama','<small class="text-danger pl-3">','</small>'); ?>
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
<?php foreach($instansi as $s): ?>
<div class="modal fade" id="modal_hapus<?= $s->id;?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Hapus Instansi</h4>

      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="<?= base_url('c_superadmin/hapusinstansi'); ?>" method="post" role="from" enctype="multipart/form-data">
          <div class="box-body">
           <div class="modal-body">
              <p>Anda Yakin Mau Menghapus Data ini? </p>
            </div>
          </div> 

          <div class="modal-footer">
            <input type="hidden" name="id" value="<?php echo $s->id;?>">
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


