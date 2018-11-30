<?php $this->load->view('web/header') ?>
	<!-- main -->
	<div class="main">
		<h1>Aplikasi Pelayanan Kependudukan<br>Kabupaten Sidrap</h1>
		<div class="main-row"> 
			<!-- pricing-table-one -->
			<div class="pricing-grid agileits-shadow">
				<div class="agileinfo-price two">
				</div>
			</div> 	 


			<!-- pricing-table-one -->
			<div class="pricing-grid agileits-shadow">
				<div class="w3ls-main">
					<div id="cube2" class="show-front"> 
					  <figure class="top"> </figure> 
					</div>
				</div>
				<div class="agileinfo-price ">
					<h3>Kelahiran</h3>
				</div>
				<div class="price-bg" align="center">
					<img class="tile-image" src="<?php echo base_url();?>/assets/web/images/babay kartun.jpg" width="150" height="150">
						<div align="center">
							<p>Klik Tautan Ini Untuk Pendaftaran Akta Kelahiran</p>
						</div>
			          <?php if($this->session->userdata('group')=='2'){ ?> 
					<div class="buy">
						<a class="popup-with-zoom-anim" href="<?php echo base_url()?>index.php/Aktakelahiran/indexweb">Selengkapnya</a> 
					</div> 

            <?php } ?>
				</div>
			</div>

			<!-- pricing-table-three -->
			<!-- pricing-table-one -->
			<div class="pricing-grid agileits-shadow">
				<div class="agileinfo-price three">
				</div>
			</div> 	 
			<div class="clear"> </div> 
		</div>	 
	</div><br>
	<?php $this->load->view('web/footer') ?>