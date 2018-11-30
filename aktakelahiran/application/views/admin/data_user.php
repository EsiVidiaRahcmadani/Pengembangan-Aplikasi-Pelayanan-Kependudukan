<?php $this->load->view('admin/header') ?>
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script type="text/javascript">
    $(function(){
      $.ajaxSetup({
        type:"POST",
        url: "<?php echo base_url('index.php/register/get_data') ?>",
        cache: false,
      });

      $("#province").change(function(){
        var value=$(this).val();
        if(value>0){
          $.ajax({
            data:{modul:'regency',id:value},
            success: function(respond){
              $("#regency").html(respond);
            }
          })
        }
      });


      $("#regency").change(function(){
        var value=$(this).val();
        if(value>0){
          $.ajax({
            data:{modul:'district',id:value},
            success: function(respond){
              $("#district").html(respond);
            }
          })
        }
      });
    });
    </script>
<body>
   <div class="page-container">
   <!--/content-inner-->
	<div class="left-content">
	   <div class="inner-content">
		<!-- header-starts -->
			<div class="header-section">
						<!--menu-right-->
						<div class="top_menu">
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
											<li class="active">Data Admin</li>
										</ol>
									</div>

<?php
 $message = $this->session->flashdata('notif');
    if($message){
        echo '<div class="alert alert-warning">' .$message. '</div>';
    }?>
                              
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Admin</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" align="center" class="table table-bordered table-striped">
                <thead>
                                        <tr>
                                            <td><div align="center">No</div></td>
                                            <td><div align="center">Id Admin</div></td>
                                            <td><div align="center">Nama Admin</div></td>
                                            <td><div align="center">Username</div></td>
                                            <td><div align="center">Password</div></td>
                                            <td><div align="center">Email</div></td>
                                            <td><div align="center"><a href="<?php echo site_url('Data_User/tambah/')?>" type="button" class="btn btn-primary btn-circle" data-toggle="tooltip" data-placement="top" title="Tambah User"></a><i class="fa fa-default"></i></div></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no=1;
                                          if(isset($data_user)){
                                                foreach($data_user as $row){
                                            ?>
                                        <tr>
                                            <td><div align="center"><?php echo $no++; ?></div></td>
                                            <td><div align="center"><?php echo $row->id_user; ?></div></td>
                                            <td><div align="center"><?php echo $row->nama_user; ?></div></td>
                                            <td><div align="center"><?php echo $row->username; ?></div></td>
                                            <td><div align="center"><?php echo $row->password; ?></div></td>
                                            <td><div align="center"><?php echo $row->email; ?></div></td>
                                            <td><div align="center">
                            <a class="preview" href="<?php echo base_url ('uploads/'.$row->foto_user); ?>" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a>
                            <a href="<?php echo site_url('Data_User/edituser/'.$row->id_user)?>" type="button" class="btn btn-warning btn-circle" data-toggle="tooltip" data-placement="top" title="Edit User"</a><i class="fa fa-edit"></i> </a>
                            <a class="btn btn-danger btn-circle" data-toggle="tooltip" data-placement="top" title="Delete User" href="<?php echo site_url('Data_User/hapus/'.$row->id_user)?>" onclick="return confirm('Anda Yakin ?');"><i class="fa fa-times"></i>
                            </a></div></td>
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
    </section>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Tambah Admin</h4>
                                        </div>
                                        <?php echo form_open_multipart('Data_User/tambah')?>
                                        <div class="modal-body">
                                        <div class="form-group">
                                            <label>Nama Admin</label>
                                            <div>
                                            <input name="nmadmin" class="form-control" type="text" placeholder="Nama User" required></input>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Username</label>
                                            <div>
                                            <input name="username" class="form-control" type="text" placeholder="Username" required></input>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <div>
                                            <input name="passwd" class="form-control" type="text" placeholder="Password" required></input>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label>Email</label>
                                            <div>
                                            <input name="email" class="form-control" type="email" placeholder="Email" required></input>
                                            </div>
                                        </div>

                                         <div class="form-group">
            <label>Provinsi</label>
            <div class="col-sm-10">
              <select class="form-control" name="province" id="province">
                <option value='0'>--Pilih Provinsi--</option>
                <?php foreach($provinces as $province) {
                  echo "<option value='$province->id'>$province->name</option>";
                } ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label>Kabupaten/Kota</label>
            <div class="col-sm-10">
              <select class="form-control" name="regency" id="regency">
                <option value='0'>--Pilih Kabupaten/Kota--</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label>Kecamatan</label>
            <div class="col-sm-10">
              <select class="form-control" name="district" id="district">
                <option value='0'>--Pilih Kecamatan--</option>
              </select>
            </div>
          </div><br>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>



									</div><?php $this->load->view('admin/footer') ?>