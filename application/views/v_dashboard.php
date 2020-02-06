  <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url('c_superadmin');?>"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
</section>

    <!-- Main content -->
     <?php if($this->session->userdata('role_id')=='1' || $this->session->userdata('role_id')=='2' || $this->session->userdata('role_id')=='3' || $this->session->userdata('role_id')=='4' ||$this->session->userdata('role_id')=='5'): ?>
    <section class="content">
      <!-- Small boxes (Stat box) -->

      <div class="row">
      <?php if($this->session->userdata('role_id')=='1' || $this->session->userdata('role_id')=='2' || $this->session->userdata('role_id')=='3' || $this->session->userdata('role_id')=='4' || $this->session->userdata('role_id')=='5'): ?>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?= $jml_suratmasuk; ?></h3>

              <p>Surat Masuk</p>
            </div>
            <div class="icon">
              <i class="fa fa-inbox"></i>
            </div>
            <a href="<?= base_url();?>c_superadmin/suratmasuk" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?= $jml_suratkeluar; ?></h3>

              <p>Surat Keluar</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?= base_url();?>c_superadmin/suratkeluar" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
         <?php endif; ?>
        <?php if($this->session->userdata('role_id')=='1' || $this->session->userdata('role_id')=='2' || $this->session->userdata('role_id')=='3' || $this->session->userdata('role_id')=='4'): ?>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?= $jml_instansi; ?></h3>

              <p>Instansi</p>
            </div>
            <div class="icon">
              <i class="fa fa-list"></i>
            </div>
            <a href="<?= base_url();?>c_superadmin/instansi" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
     <?php endif; ?>
        <!-- ./col -->

        <?php if ($this->session->userdata('role_id')=='1'): ?>
           <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?= $jml_user; ?></h3>

              <p>Users</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a href="<?= base_url();?>c_superadmin/users" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
       
       
        <!-- ./col -->
        
      </div>
      

      <div class="row">
        <div class="col-xs-8">
        <div class="box">
          <!-- <div class="box-body"> --> 
            <div>
              <canvas id="myyChart"></canvas>
            </div>
         <!--  </div> -->
          </div> 
        
      </div>
    </div>
      <?php endif ?>
    </section>
  <?php endif; ?>
    
    <!-- /.content -->
    <?php if($this->session->userdata('role_id')=='1' || $this->session->userdata('role_id')=='2' || $this->session->userdata('role_id')=='3' || $this->session->userdata('role_id')=='4' ||$this->session->userdata('role_id')=='5'): ?>
    <?php else: ?> 
    <section class="content">
      <!-- Small boxes (Stat box) -->

      <div class="box">
        <div class="box-body">
          <center style="font-size:20px;">visi dan misi</center>
           <ol>
             <ul>ksjfk</ul>
             <ul>bmbbnb</ul>
             <ul>hjjhjhj</ul>
           </ol>
        </div>
        
      </div>
      
    </section>

  <?php endif; ?>
    