<!DOCTYPE html>
<html>
<head>
<title>Pelayanan Kependudukan</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Colored Pricing Table template Responsive, Login form web template,Flat Pricing tables,Flat Drop downs  Sign up Web Templates, Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="<?php echo base_url();?>/assets/web/css/stylew.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'><!--web font-->

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

<!-- //web font --> 
</head>
<body>

<ul><?php if($this->session->userdata('group')=='1'){ ?> 

      <div class="main-row"><li><a href="<?php echo base_url()?>index.php/Aktakematian/indexweb">Akta Kematian</a></li></div>
      <div class="main-row"><li><a href="<?php echo base_url()?>index.php/Pindahdomisili/indexweb">Pindah Domisili</a></li></div>
      
            <?php } ?>
			          <?php if($this->session->userdata('group')=='2'){ ?> 

              <?php echo $this->session->userdata('username'); ?>
  <div class="main-row"><li><a class="active" href="<?php echo base_url()?>index.php">Beranda</a></li></div>
     <div class="main-row"><li><a href="<?php echo base_url()?>index.php/Aktakelahiran/indexweb">Akta Kelahiran</a></li></div>

  <div class="main-row">
                <li><?php echo anchor('user/detail_user/' . $this->session->userdata('id_user'), 'Profile'); ?></li></li></div>

  <div class="main-row"><li style="float:right"><a href="<?php echo base_url()?>index.php/user/logout">Keluar</a></li></div>

          <?php }else{ ?>

  <div class="main-row"><li style="float:right"><a href="<?php echo base_url()?>index.php/register">Daftar</a></li></div>
  <div class="main-row"><li style="float:right"><a href="<?php echo base_url()?>index.php/login">Masuk</a></li></div>

            <?php } ?>


</ul>
