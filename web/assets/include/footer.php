<!-- ==================== instag leftram-section Start ====================-->
		<section id="instagram-section" class="instagram-section w100dt">

			<?php if(!empty($bottom)) {  

				foreach ($bottom as $key => $item_rows) {  ?>
			
			<img class="instagram-section w100dt" src="<?= CUSTOM_BASE_URL . 'admin/uploads/banner_bottom/'.$item_rows['image']; ?>" alt="brand-logo">

		    <?php }  } else {  ?>

		  
		    	<img class="instagram-section w100dt" src="<?php echo base_url();?>assets/img/paralax.jpg" alt="brand-logo">

		    	 <?php } ?>


			<div class="instagram-link w100dt">
				<a href="#">
					<span>FIND US ON INSTAGRAM</span>
					@Abid Koodathai
				</a>
			</div>
		</section>
		<!-- /#instag leftram-section -->
		<!-- ==================== instag leftram-section End ====================-->

		<!-- ==================== footer-section Start ==================== -->
		<footer id="footer-section" class="footer-section w100dt">
			<div class="container">

				<div class="footer-logo w100dt center-align mb-30">
					<a href="#" class="brand-logo">
						<img src="<?php echo base_url();?>assets/img/logo.png" alt="brand-logo">
					</a>
				</div>
				<!-- /.footer-logo -->

				<ul class="footer-social-links w100dt center-align mb-30">
					<li><a href="#" class="facebook">FACEBOOK</a></li>
					<li><a href="#" class="twitter">TWITTER</a></li>
					<li><a href="#" class="google-plus">GOOGLE+</a></li>
					<li><a href="#" class="linkedin">LINKDIN</a></li>
					<li><a href="#" class="pinterest">PINTEREST</a></li>
					<li><a href="#" class="instagram">INSTAGRAM</a></li>
				</ul>

				<p class="center-align">
					<i class="icofont icofont-heart-alt l-blue"></i>  
					All Right Reserved, Designed by 
					<a href="#" class="l-blue">Sukesh</a>
				</p>

			</div>
			<!-- container -->
		</footer>
		<!-- /#footer-section -->
		<!-- ==================== footer-section End ==================== -->

		<!-- my custom js -->
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-3.1.1.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/materialize.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/owl.carousel.min.js"></script>

		<!-- my custom js -->
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/custom.js"></script>

		<script type="<?php echo base_url();?>assets/text/javascript">
		</script>


	</body>

</html>