<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Register</title>
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
  </head>
  <body>
  <div class="page-header container">
    <h1>Pendaftaran User Baru</h1>
  </div>
    <div class="col-md-11">
       <?=form_open_multipart('Data_User/tambah',['class'=>'form-horizontal'])?>
       <?php $error = form_error("nama_user", "<p class='text-danger'>", '</p>'); ?>
         <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
          <label class="col-sm-2 control-label">Nama Lengkap</label>
            <div class="col-sm-10">
            <?php if(!empty($userData['nama_user'])) { ?>
              <input type="text" class="form-control" name="nama_user" value="<?= $userData['nama_user'] ?>">
            <?php }else{ ?>
              <input type="text" class="form-control" name="nama_user" value="<?= set_value('nama_user') ?>">
            <?php } ?>
            <?php echo $error; ?>
            </div>
          </div>

          <?php $error = form_error("email", "<p class='text-danger'>", '</p>'); ?>
          <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
            <label class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="email" value="<?= set_value('email') ?>">
              <?php echo $error; ?>
            </div>
          </div>

          <?php $error = form_error("username", "<p class='text-danger'>", '</p>'); ?>
          <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
            <label class="col-sm-2 control-label">Username</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="username" value="<?= set_value('username') ?>">
              <?php echo $error; ?>
            </div>
          </div>
          
          <?php $error = form_error("password", "<p class='text-danger'>", '</p>'); ?>
          <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
            <label class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" name="password" value="<?= set_value('password') ?>">
              <?php echo $error; ?>
            </div>
          </div>
          
          <div class="form-group">
            <label class="col-sm-2 control-label">Provinsi</label>
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
            <label class="col-sm-2 control-label">Kabupaten/Kota</label>
            <div class="col-sm-10">
              <select class="form-control" name="regency" id="regency">
                <option value='0'>--Pilih Kabupaten/Kota--</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Kecamatan</label>
            <div class="col-sm-10">
              <select class="form-control" name="district" id="district">
                <option value='0'>--Pilih Kecamatan--</option>
              </select>
            </div>
          </div>
          
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-primary pull-right">Daftar</button>
                    <li><a class="tooltips" href="<?php echo base_url()?>index.php/Data_User"><span>Kembali</span><i class="lnr lnr-power-switch"></i></a></li>
            </div>
          </div>
        </form>
    </body>
</html>