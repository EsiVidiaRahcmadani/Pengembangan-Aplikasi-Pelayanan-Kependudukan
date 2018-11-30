<!DOCTYPE html>
<html>
<head>
<title>Pelayanan Kependudukan</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo base_url();?>/assets/web/css/form.css">
        <link href='http://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Colored Pricing Table template Responsive, Login form web template,Flat Pricing tables,Flat Drop downs  Sign up Web Templates, Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="<?php echo base_url();?>/assets/web/css/stylew.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'><!--web font-->
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
<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
    border-right:1px solid #bbb;
}

li:last-child {
    border-right: none;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover:not(.active) {
    background-color: #111;
}

.active {
    background-color: #4CAF50;
}
</style>

</head>

<body>

    <ul>
      <div class="main-row"><li><a href="<?php echo base_url()?>index.php">Beranda</a></li></div>
      <div class="main-row"><li><a class="active" href="<?php echo base_url()?>index.php/Aktakelahiran/indexweb">Akta Kelahiran</a></li></div>
      <div class="main-row"><li><a href="<?php echo base_url()?>index.php/Aktakematian/indexweb">Akta Kematian</a></li></div>
      <div class="main-row"><li><a href="<?php echo base_url()?>index.php/Pindahdomisili/indexweb">Pindah Domisili</a></li></div>
      <div class="main-row"><li style="float:right"><a href="<?php echo base_url()?>index.php/Aktakelahiran/bantuankelahiran">Bantuan</a></li></div>
      <div class="main-row"><li style="float:right"><a href="<?php echo base_url()?>index.php/Aktakelahiran/indexweb">Kembali</a></li></div>
    </ul>

<?php
  $no=1;
    if(isset($data_kelahiran)){
      foreach($data_kelahiran as $row){
    ?>
          <?php }
        }
          ?>

  <!-- main -->
  <div class="main">
    <h1>Form Pendaftaran <br>Akta Kelahiran Online</h1>
    <div class="main-row"> 
    <div><?= validation_errors() ?></div>

    <form action="<?php echo base_url()?>index.php/AktaKelahiran/daftarkelahiran" method="POST">
      <table>
          <legend><span class="number">1</span>Data Keluarga</legend><br>
          <label>NIK :</label>
          <input type="text" name="nik" required><br>
          <label>Nama Ayah :</label>
          <input type="text" name="nmkpl" required><br>
          <label>Nama Ibu :</label>
          <input type="text" name="nmibu" required><br><br>


          <legend><span class="number">2</span>Data Bayi</legend><br>
          <label for="Nama">Nama Lengkap :</label>
          <input type="text" id="nm" name="nm" required><br>

          <label>Jenis Kelamin :</label><br>
          <input type="radio" id="jk" value="Laki - Laki" name="jk" required><label class="light">Laki - Laki</label><br>
          <input type="radio" id="jk" value="Perempuan" name="jk" required><label class="light">Perempuan</label><br><br>

          <label>Tempat Dilahirkan :</label><br>
          <input type="radio" id="ttl" value="Rumah Sakit" name="ttl" required><label class="light">Rumah Sakit</label><br>
          <input type="radio" id="ttl" value="Puskesmas" name="ttl" required><label class="light">Puskesmas</label><br>
          <input type="radio" id="ttl" value="Poliklinik" name="ttl" required><label class="light">Poliklinik</label><br>
          <input type="radio" id="ttl" value="Rumah" name="ttl" required><label class="light">Rumah</label><br>
          <input type="radio" id="ttl" value="Lainnya" name="ttl" required><label class="light">Lainnya</label><br><br>

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
          </div><br>

          <label>Tanggal Lahir :</label>
          <input type="date" id="tgl" name="tgl" required><br>

          <input type="hidden" id="sts" name="sts" value="Belum Selesai" required><br>

          <div align="center"><button type="submit" value="Simpan">Simpan</button></div>

      </table>
    </form>
    </div>
  </div>
<div id="footer">
</div>

  <!-- //main --> 
  <!-- copyright -->
  <div class="copyright">
    <p>PERHATIAN !!!</p>
    <p>"Barang siapa dengan sengaja melakukan pemalsuan identitas diri atau dokumen terhadap instansi pelaksana,</p>
    <p>maka dapat terancam hukuman pidana 6 tahun atau denda sebesar 50 Juta Rupiah"</p>
    <p>Undang-Undang No.23 Tahun 2006 Bab 12</p>
  </div>
  <div class="copyright">
    <p> © 2016 Informatic Engineering. All Rights Reserved. Created By Faisal Syarifuddin & Ayu Permata Sari</p>
  <div>
</body>
</html>