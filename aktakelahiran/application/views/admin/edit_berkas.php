<?php $this->load->view('admin/header') ?>
<body>
   <div class="page-container">
   <!--/content-inner-->
  <div class="left-content">
     <div class="inner-content">
    <!-- header-starts -->
      <div class="header-section">
              <!--/profile_details-->
                <div class="profile_details_left">
                  <ul class="nofitications-dropdown">
                      <li class="dropdown note">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i></i> <span class="badge"></span></a>     
                    </li>
                                   
              <div class="clearfix"></div>  
                </ul>
              </div>
              <div class="clearfix"></div>  
              <!--//profile_details-->
            </div>
            <!--//menu-right-->
          <div class="clearfix"></div>
        </div>
          <!-- //header-ends -->
            <div class="outter-wp">
                  <div class="sub-heard-part">
                     <ol class="breadcrumb m-b-0">
                      <li><a href="<?php echo base_url()?>index.php/Berkas">Berkas</a></li>
                      <li class="active">Edit Data Berkas</li>
                    </ol>
                     </div>
                     
<?php
 $message = $this->session->flashdata('notif');
    if($message){
        echo '<div class="alert alert-warning">' .$message. '</div>';
    }?>
                              
  <!--<script>
    window.print();
</script>-->

    <section class="content-header">
      <h3>
        Edit Data Berkas
      </h3>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-body pad table-responsive">
            <div  class="form-horizontal">

                                    <?php
                                            if(isset($data_berkas)){
                                                foreach($data_berkas as $row){
                                                  $id = $row->id_berkas;
                                            ?>
          <?php echo form_open_multipart('Berkas/simpanedit/'.$id)?> 
                <br>
                  <div class="form-group">
                    <input type="hidden" class="form-control" name="id_berkas" value="<?php echo $row->id_berkas; ?>" required>
                    </div>

                  <div class="form-group">
                    <input type="hidden" class="form-control" name="nik" value="<?php echo $row->nik; ?>" required>
                    </div>

        <div class="form-group">
                  <div class="col-md-12">
                  <div class="box box-info">
                    <div class="box-header">
                      <h4 class="box-title">Surat Keterangan Kelahiran</h4>
                      <!-- /. tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body pad">
                      <input type="file" class="form-control" name="gambar[]" value="<?php echo $row->srt_ket_kelahiran; ?>">
                    </div>
                  </div>
                  </div>
          <!-- /.box -->
        </div>
        <div class="form-group">
                  <div class="col-md-12">
                  <div class="box box-info">
                    <div class="box-header">
                      <h4 class="box-title">Fotocopy KK</h4>
                      <!-- /. tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body pad">
                      <input type="file" class="form-control" name="gambar[]" value="<?php echo $row->ftcopy_kk; ?>">
                    </div>
                  </div>
                  </div>
          <!-- /.box -->
        </div>
        <div class="form-group">
                  <div class="col-md-12">
                  <div class="box box-info">
                    <div class="box-header">
                      <h4 class="box-title">Fotocopy Akta Nikah</h4>
                      <!-- /. tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body pad">
                      <input type="file" class="form-control" name="gambar[]" value="<?php echo $row->ftcop_aktanikah; ?>">
                    </div>
                  </div>
                  </div>
          <!-- /.box -->
        </div>
        <div class="form-group">
                  <div class="col-md-12">
                  <div class="box box-info">
                    <div class="box-header">
                      <h4 class="box-title">KTP</h4>
                      <!-- /. tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body pad">
                      <input type="file" class="form-control" name="gambar[]" value="<?php echo $row->ktp; ?>">
                    </div>
                  </div>
                  </div>
          <!-- /.box -->
        </div>
        <div class="form-group">
                  <div class="col-md-12">
                  <div class="box box-info">
                    <div class="box-header">
                      <h4 class="box-title">Surat Ket. RT</h4>
                      <!-- /. tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body pad">
                      <input type="file" class="form-control" name="gambar[]" value="<?php echo $row->srt_ket_rt; ?>" required>
                    </div>
                  </div>
                  </div>
          <!-- /.box -->
        </div>
        <div class="form-group">
                  <div class="col-md-12">
                  <div class="box box-info">
                    <div class="box-header">
                      <h4 class="box-title">Surat Ket. RW</h4>
                      <!-- /. tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body pad">
                      <input type="file" class="form-control" name="gambar[]" value="<?php echo $row->srt_ket_rw; ?>" required>
                    </div>
                  </div>
                  </div>
          <!-- /.box -->
        </div>

                  <div class="form-group">
                  <div class="col-md-12">
                  <div class="box box-info">
                    <div class="box-header">
                      <!-- /. tools -->
                    </div>
                    <!-- /.box-header -->
                    <div align="center">
                      <button type="submit" class="btn btn-danger">Simpan</button>
                    </div>
                  </div>
                  </div>
          <!-- /.box -->
        </div>
                  <?php }
                                             }
                                                ?>
</div>
</div>
</div>
</section><?php $this->load->view('admin/footer') ?>