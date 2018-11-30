<?php
	$id = $user->id_user;
if($this->input->post('is_submitted')){
	$nama_user = set_value('nama_user');
	$email = set_value('email');
	$username = set_value('username');
	$password = set_value('password');
	$province = set_value('province');
	$regency = set_value('regency');
	$district = set_value('district');
}else{
	$nama_user = $user->nama_user;
	$email = $user->email;
	$username = $user->username;
	$password = $user->password;
	$province = $user->province_id;
	$regency = $user->regency_id;
	$district = $user->district_id;
}
?>
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

  	<div class="page-header container">
    	<h1>Edit User</h1>
  	</div>

        <div class="col-md-12">
	       <?=form_open_multipart('user/edit_user/' . $id,['class'=>'form-horizontal'])?>
	       <?php $error = form_error("nama_user", "<p class='text-danger'>", '</p>'); ?>
	         <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
	         	<label class="col-sm-2 control-label">Nama Lengkap</label>
	            <div class="col-sm-10">
	              <input type="text" class="form-control" name="nama_user" value="<?= $nama_user ?>">
	              <?php echo $error; ?>
	            </div>
	          </div>
	          
	          <?php $error = form_error("email", "<p class='text-danger'>", '</p>'); ?>
	          <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
	            <label class="col-sm-2 control-label">Email</label>
	            <div class="col-sm-10">
	              <input type="email" class="form-control" name="email" value="<?= $email ?>">
	              <?php echo $error; ?>
	            </div>
	          </div>
	          
	          <?php $error = form_error("username", "<p class='text-danger'>", '</p>'); ?>
	          <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
	            <label class="col-sm-2 control-label">Username</label>
	            <div class="col-sm-10">
	              <input type="text" class="form-control" name="username" value="<?= $username ?>">
	              <?php echo $error; ?>
	            </div>
	          </div>
	          
	          <?php $error = form_error("password", "<p class='text-danger'>", '</p>'); ?>
	          <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
	            <label class="col-sm-2 control-label">Password</label>
	            <div class="col-sm-10">
	              <input type="password" class="form-control" name="password" value="<?= $password ?>">
	              <?php echo $error; ?>
	            </div>
	          </div>
	          
	          <div class="form-group">
	            <label class="col-sm-2 control-label">Provinsi</label>
	            <div class="col-sm-10">
	              <select class="form-control" name="province" id="province">
	                <option value='<?php echo $province; ?>'><?php echo $province; ?></option>
	                <?php foreach($provinces as $province) {
	                	echo "<option value='$province->id'>$province->name</option>";
	                } ?>
	              </select>
	            </div>
	          </div>

	          <div class="form-group">
	            <label class="col-sm-2 control-label">Kabupaten/Kota</label>
	            <div class="col-sm-10">
	              <select class="form-control" name="regency" id="regency">
	                <option value='<?php echo $regency; ?>'><?php echo $regency; ?></option>
	              </select>
	            </div>
	          </div>

	          <div class="form-group">
	            <label class="col-sm-2 control-label">Kecamatan</label>
	            <div class="col-sm-10">
	              <select class="form-control" name="district" id="district">
	                <option value='<?php echo $district; ?>'><?php echo $district; ?></option>
	              </select>
	            </div>
	          </div>
	          
	          <div class="form-group">
	            <div class="col-sm-offset-2 col-sm-10">
	              <button type="submit" class="btn btn-primary pull-right">Simpan</button>
	            </div>
	          </div>
	       </form>
	    </div>
 <hr>
 <a class="navbar-brand" href="<?php echo base_url(); ?>">Kembali</a>