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
											<li><a href="<?php echo base_url()?>index.php/user">Home</a></li>
											<li class="active">Berkas Kelahiran</li>
										</ol>
									</div>

             <?php
                            $message = $this->session->flashdata('notif');
                                if($message){
                             echo '<div class="alert alert-success">' .$message. '</div>';
                                }?>
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Berkas</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

            <form action="<?php print site_url();?>/Berkas/cari" method=POST>
                <input type=submit value="Cari NIK Anda">
                <input type="text" name=cari> 
            </form><br>

              <table id="example1" align="center" class="table table-bordered table-striped">
                <thead>
                                        <tr>
                                            <th><div align="center">No</div></th>
                                            <th><div align="center">NIK</div></th>
                                            <th><div align="center">Surat Ket. Kelahiran</div></th>
                                            <th><div align="center">Fotocopy KK</div></th>
                                            <th><div align="center">Fotocopy Akta Nikah</div></th>
                                            <th><div align="center">KTP</div></th>
                                            <th><div align="center">Surat Ket. RT</div></th>
                                            <th><div align="center">Surat Ket. RW</div></th>
                                            <th><div align="center">Aksi</div></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no=1;
                                          if(isset($data_berkas)){
                                                foreach($data_berkas as $row){
                                            ?>
                                        <tr>
                                            <td><div align="center"><?php echo $no++; ?></div></td>
                                            <td><div align="center"><?php echo $row->nik; ?></div></td>
                                            <td><div align="center"><img src="<?php echo base_url('uploads/'.$row->srt_ket_kelahiran) ?>" width="150px" height="100px"><br>
                            <a class="preview" href="<?php echo base_url ('uploads/'.$row->srt_ket_kelahiran); ?>" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a></div></td>
                                            <td><div align="center"><img src="<?php echo base_url('uploads/'.$row->ftcopy_kk) ?>" width="150px" height="100px"><br>
                            <a class="preview" href="<?php echo base_url ('uploads/'.$row->ftcopy_kk); ?>" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a></div></td>
                                            <td><div align="center"><img src="<?php echo base_url('uploads/'.$row->ftcop_aktanikah) ?>" width="150px" height="100px"><br>
                            <a class="preview" href="<?php echo base_url ('uploads/'.$row->ftcop_aktanikah); ?>" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a></div></td>
                                            <td><div align="center"><img src="<?php echo base_url('uploads/'.$row->ktp) ?>" width="150px" height="100px"><br>
                            <a class="preview" href="<?php echo base_url ('uploads/'.$row->ktp); ?>" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a></div></td>
                                            <td><div align="center"><img src="<?php echo base_url('uploads/'.$row->srt_ket_rt) ?>" width="150px" height="100px"><br>
                            <a class="preview" href="<?php echo base_url ('uploads/'.$row->srt_ket_rt); ?>" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a></div></td>
                                            <td><div align="center"><img src="<?php echo base_url('uploads/'.$row->srt_ket_rw) ?>" width="150px" height="100px"><br>
                            <a class="preview" href="<?php echo base_url ('uploads/'.$row->srt_ket_rw); ?>" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a></div></td>

                                            <td class="center"><div align="center">
                            <a href="<?php echo site_url('Berkas/editberkas/'.$row->id_berkas)?>" type="button" class="btn btn-warning btn-circle" data-toggle="tooltip" data-placement="top" title="Edit Berkas"><i class="fa fa-edit"></i></a></div></td>
                                        </tr>
                                    <?php }
                                             }
                                                ?>
                                    </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section><?php $this->load->view('admin/footer') ?>