<section class="content-header">
      <h1>
        Data Master
        <small>Users</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url('c_superadmin/'); ?>"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="<?= base_url('c_superadmin/users'); ?>"> Data Master</a></li>
        <li class="active">Users</li>
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
                Tambah Users
              </button>
          </div>          
        </div>

        <div class="box-body table-responsive">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Nama Lengkap</th>
              <th>Username</th>
              <th>Level</th>
              <th>Foto</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
              <?php $no=1; foreach($users as $s): ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $s->nama; ?></td>
              <td><?= $s->username;?></td>
              
              <td align="center">
                <?php if ($s->role_id == 1): ?>
                  <p class="btn btn-primary btn-xs">Super Admin</p>
                <?php elseif($s->role_id==2): ?>
                  <p class="btn btn bg-purple btn-xs">Sekretaris</p>
                <?php elseif($s->role_id==3): ?>
                  <p class="btn btn bg-olive btn-xs">Kepegawaian</p>
                <?php elseif($s->role_id==4): ?>
                  <p class="btn btn bg-maroon btn-xs">Tata Usaha</p>
                  <?php elseif($s->role_id==5): ?>
                  <p class="btn btn bg-primary btn-xs">Ka. Balai</p>
                  <?php elseif($s->role_id==6): ?>
                  <p class="btn btn bg-olive btn-xs">Ka. Sub Bag Tata Usaha</p>
                  <?php elseif($s->role_id==7): ?>
                  <p class="btn btn bg-purple btn-xs">Kasi Kerjasama dan Pelayanan Pengkajian</p>
                  <?php elseif($s->role_id==8): ?>
                  <p class="btn btn bg-olive btn-xs">Koordinator Program</p>
                  <?php elseif($s->role_id==9): ?>
                  <p class="btn btn bg-maroon btn-xs">Ketua Kelompok Pengkaji</p>
                  <?php elseif($s->role_id==10): ?>
                  <p class="btn btn bg-olive btn-xs">Ka. Ur. Keuangan</p>
                  <?php elseif($s->role_id==11): ?>
                  <p class="btn btn bg-purple btn-xs">Ka. Ur. Kepegawaian</p>
                  <?php elseif($s->role_id==12): ?>
                  <p class="btn btn bg-olive btn-xs">Ka. Ur Perlengkapan/RT</p>
                  <?php elseif($s->role_id==13): ?>
                  <p class="btn btn bg-olive btn-xs">Laboratorium</p>
                <?php endif ?>
              </td>
              <td><img src="<?= base_url('assets/images/').$s->foto; ?>" width="50px" alt="Foto"></td>
              <td align="center">

                <a href="#"  data-toggle="modal" data-target="#modal_edit<?= $s->id_user;?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                <a href="#"  data-toggle="modal" data-target="#modal_hapus<?php echo $s->id_user;?>" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-xs"></i></a>
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
        <h4 class="modal-title">Tambah Users</h4>

      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="<?= base_url('c_superadmin/tambahusers'); ?>" method="post" role="from" enctype="multipart/form-data">
          <div class="box-body">
            
            <div class="form-group">
              <label  class="col-sm-2 control-label">Nama Lengkap</label>
              <div class="col-sm-10">
                <input type="text" name="nama" class="form-control" required>
                <?= form_error('nama','<small class="text-danger pl-3">','</small>'); ?>
              </div>
            </div>

            <div class="form-group">
              <label   class="col-sm-2 control-label">Username</label>
              <div class="col-sm-10">
                <input type="text" name="username"  class="form-control"  required>
                <?= form_error('username','<small class="text-danger pl-3">','</small>'); ?>
              </div>
            </div>

            <div class="form-group">
              <label  class="col-sm-2 control-label">Password</label>
              <div class="col-sm-10">
                <input type="password" name="password"  class="form-control" id="show"  required >
                <input type="checkbox" class="form-checkbox"> Show Password
                <?= form_error('password','<small class="text-danger pl-3">','</small>'); ?>
              </div>
            </div>

            <div class="form-group">
              <label  class="col-sm-2 control-label">Level</label>
              <div class="col-sm-10">
                <select class="form-control" name="hak_akses">
                  <option>---Pilih Level---</option>
                  <option value="1">Super Admin</option>
                  <option value="2">Sekretaris</option>
                  <option value="3">Kepegawaian</option>
                  <option value="4">Tata Usaha</option>
                  <option value="5">Ka. Balai</option>
                  <option value="6">Ka. Sub Bag Tata Usaha</option>
                  <option value="7">Kasi Kerjasama dan Pelayanan Pengkajian</option>
                  <option value="8">Koordinator Program</option>
                  <option value="9">Ketua Kelompok Pengkaji</option>
                  <option value="10">Ka. Ur. Keuangan</option>
                  <option value="11">Ka. Ur. Kepegawaian</option>
                  <option value="12">Ka. Ur. Perlengkapan/RT</option>
                  <option value="13">Ka. Ur. Laboratorium</option>
                </select>
                <?= form_error('hak_akses','<small class="text-danger pl-3">','</small>'); ?>
              </div>
            </div>

            <div class="form-group">
              <label  class="col-sm-2 control-label">Foto</label>
              <div class="col-sm-10">
                <input type="file" name="foto"  class="form-control"required >
                <?= form_error('foto','<small class="text-danger pl-3">','</small>'); ?>
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

<?php foreach($users as $s): ?>
<div class="modal fade" id="modal_edit<?= $s->id_user;?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Data Users</h4>

      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="<?= base_url('c_superadmin/editusers'); ?>" method="post" role="from" enctype="multipart/form-data">
          <div class="box-body">
            
            <div class="form-group">
              <label  class="col-sm-2 control-label">Nama Lengkap</label>
              <div class="col-sm-10">
                <input type="hidden" name="id_user" value="<?= $s->id_user; ?>">
                <input type="text" name="nama" class="form-control" value="<?= $s->nama; ?>" required>
                <?= form_error('nama','<small class="text-danger pl-3">','</small>'); ?>
              </div>
            </div>

            <div class="form-group">
              <label   class="col-sm-2 control-label">Username</label>
              <div class="col-sm-10">
                <input type="text" name="username"  class="form-control" value="<?= $s->username; ?>"  required>
                <?= form_error('username','<small class="text-danger pl-3">','</small>'); ?>
              </div>
            </div>

            <div class="form-group">
              <label  class="col-sm-2 control-label">Password</label>
              <div class="col-sm-10">
                <input type="password" name="password"  class="form-control" id="show1" value="<?= $s->password; ?>"  required >
                <input type="checkbox" class="form-checkbox"> Show Password
                <?= form_error('password','<small class="text-danger pl-3">','</small>'); ?>
              </div>
            </div>

            <div class="form-group">
              <label  class="col-sm-2 control-label">Level</label>
              <div class="col-sm-10">
                <select class="form-control" name="hak_akses" value="<?= $s->role_id; ?>">
                  <?php $r = $s->role_id; ?>
                  <option value="">
                    == PILIH LEVEL ==
                  </option>
                  <option value="1" <?php echo $r == 1 ?  'selected' : ''; ?>>Super Admin</option>
                  <option value="2" <?php echo $r == 2 ?  'selected' : ''; ?>>Sekretaris</option>
                  <option value="3" <?php echo $r == 3 ?  'selected' : ''; ?>>Kepegawaian</option>
                  <option value="4" <?php echo $r == 4 ?  'selected' : ''; ?>>Tata Usaha</option>
                  <option value="5" <?php echo $r == 5 ?  'selected' : ''; ?>>Ka. Balai</option>
                  <option value="6" <?php echo $r == 6 ?  'selected' : ''; ?>>Ka. Sub Bag Tata Usaha</option>
                  <option value="7" <?php echo $r == 7 ?  'selected' : ''; ?>>Kasi Kerjasama dan Pelayanan Pengkajian</option>
                  <option value="8" <?php echo $r == 8 ?  'selected' : ''; ?>>Koordinator Program</option>
                  <option value="9" <?php echo $r == 9 ?  'selected' : ''; ?>>Ketua Kelompok Pengkaji</option>
                  <option value="10" <?php echo $r == 10 ?  'selected' : ''; ?>>Ka. Ur. Keuangan</option>
                  <option value="11" <?php echo $r == 11 ?  'selected' : ''; ?>>Ka. Ur. Kepegawaian</option>
                  <option value="12" <?php echo $r == 12 ?  'selected' : ''; ?>>Ka. Ur. Perlengkapan/RT</option>
                  <option value="13" <?php echo $r == 13 ?  'selected' : ''; ?>>Ka. Ur. Laboratorium</option>
                </select>
                <?= form_error('hak_akses','<small class="text-danger pl-3">','</small>'); ?>
                
              </div>
            </div>

             <div class="form-group">
              <label   class="col-sm-2 control-label">Foto</label>
              <div class="col-sm-2">
                <img src="<?= base_url('assets/images/'); ?><?= $s->foto; ?>" width="50px" alt="foto">
              </div>
              <div class="col-sm-8">
              <input type="file" name="foto" class="form-control" value="<?= $s->foto; ?>" >
                <?= form_error('foto','<small class="text-danger pl-3">','</small>'); ?>
                <p class="help-block">* jpg/png</p>
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
<?php foreach($users as $s): ?>
<div class="modal fade" id="modal_hapus<?= $s->id_user;?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Hapus User</h4>

      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="<?= base_url('c_superadmin/hapususers'); ?>" method="post" role="from" enctype="multipart/form-data">
          <div class="box-body">
           <div class="modal-body">
              <p>Anda Yakin Mau Menghapus Data ini? </p>
            </div>
          </div> 

          <div class="modal-footer">
            <input type="hidden" name="id_user" value="<?php echo $s->id_user;?>">
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


  