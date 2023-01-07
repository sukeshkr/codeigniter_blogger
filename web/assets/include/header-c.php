<!DOCTYPE html>
<html lang="zxx">

	<head>

		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>Sujon - index</title>

		<!-- css include -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/materialize.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/icofont.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/owl.carousel.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/owl.theme.default.min.css">

		<!-- my css include -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/custom-menu.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/responsive.css">

	</head>

	<body>

		<div class="thetop"></div>
		<!-- for back to top -->

		<div class='backToTop'>
			<a href="#" class='scroll'>
				<span>T</span>
				<span>O</span>
				<span>P</span>
				<span class="go-up">
					<i class="icofont icofont-long-arrow-up"></i>
				</span>
			</a>
		</div>
		<!-- backToTop -->

		<!-- ==================== header-section Start ==================== -->
		<header id="header-section" class="header-section w100dt navbar-fixed">

			<nav class="nav-extended main-nav">
				<div class="container">
					<div class="row">
						<div class="nav-wrapper w100dt">

							<div class="logo left">
								<a href="<?= CUSTOM_BASE_URL;?>" class="brand-logo">
									<img src="<?php echo base_url();?>assets/img/logo.png" alt="brand-logo">
								</a>
							</div>
							<!-- logo -->

							<div>
								<a href="#" data-activates="mobile-demo" class="button-collapse">
									<i class="icofont icofont-navigation-menu"></i>
								</a>
								<ul id="nav-mobile" class="main-menu center-align hide-on-med-and-down">
									<li class="active"><a href="<?= CUSTOM_BASE_URL;?>home">HOME</a></li>
									<li><a href="<?= CUSTOM_BASE_URL;?>cateogry">CATEGORIES</a></li>
									<li class="dropdown">
										<a href="#">PAGES <i class="icofont icofont-simple-down"></i></a>
										<ul class="dropdown-container">
											<li><a href="<?= CUSTOM_BASE_URL;?>error404">404 Page</a></li>
										</ul>
										<!-- /.dropdown-container -->
									</li>
									<li><a href="<?= CUSTOM_BASE_URL;?>blog-details">BLOG SINGLE</a></li>
									<li><a href="<?= CUSTOM_BASE_URL;?>contact">CONTACT</a></li>
								</ul>
								<!-- /.main-menu -->

								<!-- ******************** sidebar-menu ******************** -->
								<ul class="side-nav" id="mobile-demo">
									<li class="snavlogo center-align"><img src="<?php echo base_url();?>assets/img/logo.png" alt="logo"></li>
									<li class="active"><a href="<?= CUSTOM_BASE_URL;?>home">HOME</a></li>
									<li><a href="<?= CUSTOM_BASE_URL;?>cateogry">CATEGORIES</a></li>
									<li><a href="<?= CUSTOM_BASE_URL;?>blog-details">SINGLE BLOG</a></li>
									<li><a href="<?= CUSTOM_BASE_URL;?>contact">CONTACT</a></li>
									<li><a href="<?= CUSTOM_BASE_URL;?>error404">404 PAGE</a></li>
								</ul>
							</div>
							<!-- main-menu -->

							<a href="#" class="search-trigger right">
								<i class="icofont icofont-search"></i>
							</a>
							<!-- search -->
							<div id="myNav" class="overlay">
								<a href="javascript:void(0)" class="closebtn">&times;</a>
								<div class="overlay-content">
									<form>
										<input type="text" name="search" placeholder="Search...">
										<br>
										<button class="waves-effect waves-light" type="submit" name="action">Search</button>
									</form>
								</div>
							</div>

						</div>
						<!-- /.nav-wrapper -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</nav>

		</header>
		<!-- /#header-section -->
		<!-- ==================== header-section End ==================== -->