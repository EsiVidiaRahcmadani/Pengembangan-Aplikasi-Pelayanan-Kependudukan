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
											<li class="active">Akta Kelahiran</li>
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
              <h3 class="box-title">Data Akta Kelahiran</h3>

              <form action="<?php echo base_url()?>index.php/aktakelahiran/indexdaftar1" method=POST>
                <input type=submit value="Tambah Data">
              </form>    
            </div>
            <!-- /.box-header -->
            <div class="box-body">

          <form action="<?php print site_url();?>/Aktakelahiran/cari" method=POST>
                <input type=submit value="Cari NIK Anda">
                <input type="text" name=cari> 
          </form><br>

              <table id="example1" align="center" class="table table-bordered table-striped">
                <thead>
                                        <tr>
                                            <th><div align="center">No</div></th>
                                            <th><div align="center">NIK</div></th>
                                            <th><div align="center">Nama Ayah</div></th>
                                            <th><div align="center">Nama Ibu</div></th>
                                            <th><div align="center">Nama Lengkap</div></th>
                                            <th><div align="center">Jenis Kelamin</div></th>
                                            <th><div align="center">Tempat Dilahirkan</div></th>
                                            <th><div align="center">Provinsi</div></th>
                                            <th><div align="center">Tanggal Lahir</div></th>
                                            <th><div align="center">Tanggal Daftar</div></th>
                                            <th><div align="center">Tanggal Pengambilan</div></th>
                                            <th><div align="center">Status</div></th>
                                            <th><div align="center">Aksi</div></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no=1;
                                          if(isset($data_kelahiran)){
                                                foreach($data_kelahiran as $row){
                                            ?>
                                        <tr>
                                            <td><div align="center"><br><?php echo $no++; ?></div></td>
                                            <td><div align="center"><br><?php echo $row->nik; ?></div></td>
                                            <td><div align="center"><br><?php echo $row->nm_kpl_keluarga; ?></div></td>
                                            <td><div align="center"><br><?php echo $row->nama_ibu; ?></div></td>
                                            <td><div align="center"><br><?php echo $row->nm_lengkap; ?></div></td>
                                            <td><div align="center"><br><?php echo $row->jk; ?></div></td>
                                            <td><div align="center"><br><?php echo $row->tmpt_dilahirkan; ?></div></td>
                                            <td><div align="center"><br><?php echo $row->province_id; ?></div></td>
                                            <td><div align="center"><br><?php echo $row->tgl_lahir; ?></div></td>
                                            <td><div align="center"><br><?php echo date("Y-m-d H:i:s",strtotime($row->tgl_daftar)); ?></div></td>
                                            <td><div align="center"><br><?php echo $row->tgl_ambil; ?></div></td>
                                            <td><div align="center"><br><?php echo $row->status; ?></div></td>
                                            <td class="center"><div align="center">
                            <a href="<?php echo base_url()?>index.php/cetak/acetak_kelahiran/<?php print $row->nik; ?>/<?php print $row->id_berkas; ?>" type="button" target="_blank" class="fa fa-print"><b> Cetak</b></a><br><br>
                            <a href="<?php echo site_url('Aktakelahiran/updatekelahiran/'.$row->nik)?>" class="lnr lnr-pencil" type="button"><b>Update</b></a><br><br>
                            <a href="<?php echo site_url('Aktakelahiran/editkelahiran/'.$row->nik)?>" class="fa fa-pencil-square-o" type="button"><b> Edit</b></a><br><br>
                            <a href="<?php echo site_url('Aktakelahiran/hapus/'.$row->nik)?>" class="  fa fa-smile-o" type="button" onclick="return confirm('Anda Yakin ?');"><b> Hapus</b></a></div></td>
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