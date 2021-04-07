
 <section class="content-header">
   <div class="box">
    <div class="box-header">
      <h3>
        Surat Masuk
        <small>Data Surat Masuk</small>
      </h3>
      <ol class="breadcrumb">
        <li><a href="<?= base_url('c_superadmin/'); ?>"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="<?= base_url('c_superadmin/suratmasuk'); ?>"> Surat Masuk</a></li>
        <li class="active">Data</li>
      </ol>
    </div>
    </div>
</section>

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">

        <div class="box-header">
            <?= $this->session->flashdata('message'); ?>
            <?php if($this->session->userdata('role_id')=='1' || $this->session->userdata('role_id')=='2' || $this->session->userdata('role_id')=='3' || $this->session->userdata('role_id')=='4'): ?>
          <div class="btn-group pull-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                Tambah Data
              </button>
          </div>    
          <?php endif; ?>      
        </div>

        <div class="box-body table-responsive">
          <table id="example1" class="table table-bordered table-striped" style="font-family: times new roman;">
            <thead>
            <tr>
              <th>No</th>
              <th>Agno</th>
              <th>Nomor Surat</th>
              <th>Tanggal Surat</th>
              <th>Tanggal Diterima</th>
              <th>Pengirim</th>
              <th>Tujuan</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            <?php if ($this->session->userdata('role_id')==1 || $this->session->userdata('role_id')==2 ): ?>
            
            <?php $no=1; foreach($suratmasuk as $s): ?>

            <tr>
              <td><?= $no++; ?></td>
              <td><?= $s->agno; ?></td>
              <td><?= $s->nomor_surat; ?></td>
              <td><?= tgl($s->tanggal_surat);?></td>
              <td><?= tgl($s->tanggal_diterima);?></td>
              <td><?= $s->pengirim; ?></td>
              <td>
                <?php if($s->tujuan==5): ?>
                  Ka. Balai
                <?php elseif($s->tujuan==6): ?>
                  Ka. Sub Bag Tata Usaha
                <?php elseif($s->tujuan==7): ?>
                  Kasi Kerjasama dan Pelayanan Pengkajian
                <?php elseif($s->tujuan==8): ?>
                  Koordinator Program
                <?php elseif($s->tujuan==9): ?>
                  Ketua Kelompok Pengkaji
                <?php elseif($s->tujuan==10): ?>
                  Ka. Ur. Keuangan
                <?php elseif($s->tujuan==11): ?>
                  Ka. Ur. Kepegawaian
                <?php elseif($s->tujuan==12): ?>
                  Ka. Ur. Perlengkapan/RT
                <?php elseif($s->tujuan==13): ?>
                  Ka. Ur. Laboratorium 

                <?php endif; ?>
              </td>
                  
              <?php if($this->session->userdata('role_id')=='1' || $this->session->userdata('role_id')=='2' 
                        || $this->session->userdata('role_id')=='3' || $this->session->userdata('role_id')=='4'): 
              ?>
         
                <td align="center">
                 <a href="<?= base_url('c_superadmin/downloadSuratMasuk/'.$s->id_surat); ?>"  class="btn bg-navy btn-sm" data-toogle="tooltip" title="Download Surat" data-placement="right"><i class="fa fa-download"></i></a>
                  <a href="#"  data-toggle="modal" data-target="#modal_view<?= $s->id_surat;?>" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                  <a href="#"  data-toggle="modal" data-target="#modal_edit<?= $s->id_surat;?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                  <a href="#"  data-toggle="modal" data-target="#modal_hapus<?php echo $s->id_surat;?>" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-xs"></i></a>
                </td>

              <?php endif; ?>
            </tr>

            <?php endforeach; ?>
              
            <?php endif; ?>

            <?php if($this->session->userdata('role_id')=='5'): ?>
            <?php $no=1; foreach($suratmasuk as $s): ?>

            <tr>
              <td><?= $no++; ?></td>
              <td><?= $s->agno; ?></td>
              <td><?= $s->nomor_surat; ?></td>
              <td><?= tgl($s->tanggal_surat);?></td>
              <td><?= tgl($s->tanggal_diterima);?></td>
              <td><?= $s->pengirim; ?></td>
              <td>
                <?php if($s->tujuan==5): ?>
                  Ka. Balai
                <?php elseif($s->tujuan==6): ?>
                  Ka. Sub Bag Tata Usaha
                <?php elseif($s->tujuan==7): ?>
                  Kasi Kerjasama dan Pelayanan Pengkajian
                <?php elseif($s->tujuan==8): ?>
                  Koordinator Program
                <?php elseif($s->tujuan==9): ?>
                  Ketua Kelompok Pengkaji
                <?php elseif($s->tujuan==10): ?>
                  Ka. Ur. Keuangan
                <?php elseif($s->tujuan==11): ?>
                  Ka. Ur. Kepegawaian
                <?php elseif($s->tujuan==12): ?>
                  Ka. Ur. Perlengkapan/RT
                <?php elseif($s->tujuan==13): ?>
                  Ka. Ur. Laboratorium 

                <?php endif; ?>
              </td>
                 
              <!-- <?php if($this->session->userdata('role_id')=='1' || $this->session->userdata('role_id')=='2' || $this->session->userdata('role_id')=='3' || $this->session->userdata('role_id')=='4'): ?>
         
                <td align="center">
                 <a href="<?= base_url('c_superadmin/downloadSuratMasuk/'.$s->id_surat); ?>"  class="btn bg-navy btn-sm" data-toogle="tooltip" title="Download Surat" data-placement="right"><i class="fa fa-download"></i></a>
                  <a href="#"  data-toggle="modal" data-target="#modal_view<?= $s->id_surat;?>" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                  <a href="#"  data-toggle="modal" data-target="#modal_edit<?= $s->id_surat;?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                  <a href="#"  data-toggle="modal" data-target="#modal_hapus<?php echo $s->id_surat;?>" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-xs"></i></a>
                </td>

              <?php endif; ?> -->
          
              <?php if( $this->session->userdata('role_id')=='5' || $this->session->userdata('role_id')=='6' || $this->session->userdata('role_id')=='7' 
                        || $this->session->userdata('role_id')=='8' || $this->session->userdata('role_id')=='9' || $this->session->userdata('role_id')=='10' 
                        || $this->session->userdata('role_id')=='11' || $this->session->userdata('role_id')=='12' || $this->session->userdata('role_id')=='13'): 
              ?>
                
              <td align="center">

                  <a href="<?= base_url('c_superadmin/downloadSuratMasuk/'.$s->id_surat); ?>"  class="btn bg-navy btn-xs" data-toogle="tooltip" title="Download Surat" data-placement="right"><i class="fa fa-download"></i></a>
                    
                  <?php if ($s->status_surat =='1'): ?>
                    
                     <a href="#" class="btn btn-primary btn-xs">Terverifikasi </a>
                    
                    <?php else: ?>
                    
                    <a href="<?= base_url('c_superadmin/verifikasi/'.$s->id_surat); ?>" class="btn btn-warning btn-xs" data-toogle="tooltip" title="Verifikasi Surat"><i class="fa fa-check fa-xs"></i> </a>
                  <?php endif ?>
                 
              </td>
              <?php endif ?>
            </tr>

            <?php endforeach; ?>
            <?php endif;?>

            <?php if($this->session->userdata('role_id')!='5'): ?>
            <?php $no=1; foreach($sm as $s): ?>

            <tr>
              <td><?= $no++; ?></td>
              <td><?= $s->agno; ?></td>
              <td><?= $s->nomor_surat; ?></td>
              <td><?= tgl($s->tanggal_surat);?></td>
              <td><?= tgl($s->tanggal_diterima);?></td>
              <td><?= $s->pengirim; ?></td>
              <td>
                <?php if($s->tujuan==5): ?>
                  Ka. Balai
                <?php elseif($s->tujuan==6): ?>
                  Ka. Sub Bag Tata Usaha
                <?php elseif($s->tujuan==7): ?>
                  Kasi Kerjasama dan Pelayanan Pengkajian
                <?php elseif($s->tujuan==8): ?>
                  Koordinator Program
                <?php elseif($s->tujuan==9): ?>
                  Ketua Kelompok Pengkaji
                <?php elseif($s->tujuan==10): ?>
                  Ka. Ur. Keuangan
                <?php elseif($s->tujuan==11): ?>
                  Ka. Ur. Kepegawaian
                <?php elseif($s->tujuan==12): ?>
                  Ka. Ur. Perlengkapan/RT
                <?php elseif($s->tujuan==13): ?>
                  Ka. Ur. Laboratorium 

                <?php endif; ?>
              </td>
                 
              <!-- <?php if($this->session->userdata('role_id')=='1' || $this->session->userdata('role_id')=='2' || $this->session->userdata('role_id')=='3' || $this->session->userdata('role_id')=='4'): ?>
         
                <td align="center">
                 <a href="<?= base_url('c_superadmin/downloadSuratMasuk/'.$s->id_surat); ?>"  class="btn bg-navy btn-sm" data-toogle="tooltip" title="Download Surat" data-placement="right"><i class="fa fa-download"></i></a>
                  <a href="#"  data-toggle="modal" data-target="#modal_view<?= $s->id_surat;?>" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                  <a href="#"  data-toggle="modal" data-target="#modal_edit<?= $s->id_surat;?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                  <a href="#"  data-toggle="modal" data-target="#modal_hapus<?php echo $s->id_surat;?>" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-xs"></i></a>
                </td>

              <?php endif; ?> -->
          
              <?php if( $this->session->userdata('role_id')=='5' || $this->session->userdata('role_id')=='6' || $this->session->userdata('role_id')=='7' 
                        || $this->session->userdata('role_id')=='8' || $this->session->userdata('role_id')=='9' || $this->session->userdata('role_id')=='10' 
                        || $this->session->userdata('role_id')=='11' || $this->session->userdata('role_id')=='12' || $this->session->userdata('role_id')=='13'): 
              ?>
                
              <td align="center">

                  <a href="<?= base_url('c_superadmin/downloadSuratMasuk/'.$s->id_surat); ?>"  class="btn bg-navy btn-xs" data-toogle="tooltip" title="Download Surat" data-placement="right"><i class="fa fa-download"></i></a>
                    
                  <?php if ($s->status_surat =='1'): ?>
                    
                     <a href="#" class="btn btn-primary btn-xs">Terverifikasi </a>
                    
                    <?php else: ?>
                    
                    <a href="<?= base_url('c_superadmin/verifikasi/'.$s->id_surat); ?>" class="btn btn-warning btn-xs" data-toogle="tooltip" title="Verifikasi Surat"><i class="fa fa-check fa-xs"></i> </a>
                  <?php endif ?>
                 
              </td>
              <?php endif ?>
            </tr>

            <?php endforeach; ?>
            <?php endif;?>
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
        <form class="form-horizontal" action="<?= base_url('c_superadmin/tambahsuratmasuk'); ?>" method="post" role="from" enctype="multipart/form-data">
          <div class="box-body">
            
            <div class="form-group">
              <label  class="col-sm-2 control-label">Nomor Surat</label>
              <div class="col-sm-10">
                <input type="text" name="no_surat" class="form-control" required>
                <?= form_error('no_surat','<small class="text-danger pl-3">','</small>'); ?>
              </div>
            </div>

             <div class="form-group">
              <label  class="col-sm-2 control-label">Agno</label>
              <div class="col-sm-10">
                <input type="text" name="agno" class="form-control" required>
                <?= form_error('agno','<small class="text-danger pl-3">','</small>'); ?>
              </div>
            </div>

            <div class="form-group">
              <label   class="col-sm-2 control-label">Tanggal Surat</label>
              <div class="col-sm-10">
                <input type="text" name="tgl_surat"  class="form-control" id="datepicker" required>
                <?= form_error('tgl_surat','<small class="text-danger pl-3">','</small>'); ?>
              </div>
            </div>

            <div class="form-group">
              <label   class="col-sm-2 control-label">Tanggal Diterima</label>
              <div class="col-sm-10">
                <input type="text" name="tgl_diterima"  class="form-control" id="datepicker3" required>
                <?= form_error('tgl_diterima','<small class="text-danger pl-3">','</small>'); ?>
              </div>
            </div>

            <div class="form-group">
              <label  class="col-sm-2 control-label">Pengirim</label>
              <div class="col-sm-6">
                 
                <select name="pengirim" class="selectpicker" data-show-subtext="true" data-live-search="true" required>
                  <option>----Select Pengirim----</option>
                 <?php foreach ($pengirim as $p):?>

                    <option value="<?= $p->nama_instansi; ?>"><?= $p->nama_instansi; ?></option>
                  <?php endforeach; ?>
                </select>
                <?= form_error('pengirim','<small class="text-danger pl-3">','</small>'); ?> 
              </div>
              
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Tujuan</label>
              <div class="col-sm-10">
                <select name="tujuan" class="selectpicker" data-show-subtext="true" data-live-search="true" required>
                  <option>----Select Tujuan----</option>
                    
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
                <?= form_error('tujuan','<small class="text-danger pl-3">','</small>'); ?>
              </div>
            </div>

            <div class="form-group">
              <label  class="col-sm-2 control-label">Perihal</label>
              <div class="col-sm-10">
                <input type="text" class="form-control"  name="perihal"  required >
                <?= form_error('perihal','<small class="text-danger pl-3">','</small>'); ?>
              </div>
            </div>
          
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
        
        </form>
      </div>
      
    </div>
    <!-- /.modal-content -->
  </div>
</div>



<!-- =============================modal edit data surat================================== -->

<?php foreach($suratmasuk as $s): ?>
<div class="modal fade" id="modal_edit<?= $s->id_surat;?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Data Surat</h4>

      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="<?= base_url('c_superadmin/editsuratmasuk'); ?>" method="post" role="from" enctype="multipart/form-data">
          <div class="box-body">

            <div class="form-group">
              <label  class="col-sm-2 control-label">Agno</label>
              <div class="col-sm-10">
                <input type="text" name="agno" class="form-control" value="<?= $s->agno; ?>" required>
                <?= form_error('agno','<small class="text-danger pl-3">','</small>'); ?>
              </div>
            </div>
            
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
              <label   class="col-sm-2 control-label">Tanggal Diterima</label>
              <div class="col-sm-10">
                <input type="text" name="tgl_diterima"  class="form-control" id="datepicker3"  class="form-control" id="datepicker1" value="<?= $s->tanggal_diterima; ?>" required>
                <?= form_error('tgl_diterima','<small class="text-danger pl-3">','</small>'); ?>
              </div>
            </div>

            <div class="form-group">
              <label  class="col-sm-2 control-label">Pengirim</label>
              <div class="col-sm-10">
                <select name="pengirim" class="selectpicker" data-show-subtext="true" data-live-search="true" required>
                  <option value="<?= $s->pengirim; ?>"><?= $s->pengirim; ?></option>
                 <?php foreach ($pengirim as $p):?>

                    <option value="<?= $p->nama_instansi; ?>"><?= $p->nama_instansi; ?></option>
                  <?php endforeach; ?>
                </select>
                <?= form_error('pengirim','<small class="text-danger pl-3">','</small>'); ?>
              </div>
            </div>

            <div class="form-group">
              <label  class="col-sm-2 control-label">Tujuan</label>
              <div class="col-sm-10">
                 <select name="tujuan" class="selectpicker" data-show-subtext="true" data-live-search="true" required>
                  
                    <option value="<?= $s->tujuan; ?>"><?= $s->tujuan; ?></option>
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
                  <?= form_error('tujuan','<small class="text-danger pl-3">','</small>'); ?>
              </div>
            </div>

            

            <div class="form-group">
              <label  class="col-sm-2 control-label">Perihal</label>
              <div class="col-sm-10">
                <input type="text" class="form-control"  name="perihal" value="<?= $s->perihal; ?>" required >
                <?= form_error('perihal','<small class="text-danger pl-3">','</small>'); ?>
              </div>
            </div>

         

            <div class="form-group">
              <label   class="col-sm-2 control-label">File Surat</label>
              <!-- <div class="col-sm-4">
              
                 <?= $s->file; ?>
               </div> -->
              <div class="col-sm-10">
              <input type="file" name="file_surat" class="form-control" value="<?= $s->file_surat; ?>" >
                <?= form_error('file_surat','<small class="text-danger pl-3">','</small>'); ?>
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
<?php foreach($suratmasuk as $s): ?>
<div class="modal fade" id="modal_hapus<?= $s->id_surat;?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Hapus Data Surat</h4>

      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="<?= base_url('c_superadmin/hapussuratmasuk'); ?>" method="post" role="from" enctype="multipart/form-data">
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
<?php foreach($suratmasuk as $s): ?>
<div class="modal fade" id="modal_view<?= $s->id_surat;?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Detail Data Surat</h4>

      </div>
      <div class="modal-body" style="font-family: times new roman">
        <div class="row">
         
          <div class="col-sm-9">

            <div class="col-sm-12">
              <div class="form-group">
                <label  class="col-sm-4 control-label" style="font-size: 20px!important;">Agno</label>
                <div class="col-sm-8">
                  <p class="pull-right"  style="font-size: 20px!important;"><?= $s->agno; ?></p>
                </div>
            </div>  
            </div>

            <div class="col-sm-12">
              <div class="form-group">
                <label  class="col-sm-4 control-label" >Nomor Surat</label>
                <div class="col-sm-8">
                  <p class="pull-right"><?= $s->nomor_surat; ?></p>
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
                <label  class="col-sm-4 control-label">Tanggal Diterima</label>
                <div class="col-sm-8">
                  <p class="pull-right"><?= $s->tanggal_diterima; ?></p>
                </div>
            </div>  
            </div>
            
            <div class="col-sm-12">
              <div class="form-group">
                <label  class="col-sm-4 control-label">Pengirim</label>
                <div class="col-sm-8">
                  <p class="pull-right"><?= $s->pengirim; ?></p>
                </div>
            </div>
          
            </div>

            <div class="col-sm-12">
              <div class="form-group">
                <label  class="col-sm-4 control-label">Perihal</label>
                <div class="col-sm-8">
                  <p class="pull-right"><?= $s->perihal; ?></p>
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



