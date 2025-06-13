<!DOCTYPE html>
<html lang="en">
<head>
	<title>Ciria</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Mixtape template project">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css">
	<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
	<link rel="stylesheet" type="text/css" href="styles/contact.css">
	<link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">
	<link rel="stylesheet" type="text/css" href="styles/about.css">
	<link rel="stylesheet" type="text/css" href="styles/about_responsive.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
	<?php
		require_once __DIR__ . '/includes/config.php';
		require_once __DIR__ . '/includes/functions.php';
	?>
</head>
<body>

<div class="super_container">
	
	<!-- Header -->
	<header class="header">
		<div class="header_content d-flex flex-row align-items-center justify-content-center">
			<div class="logo"><img src="images/Logos/LogoNegro.jpg" alt="Ciria Logo" width="100" height="80">
				<a href="/">Ciria</a></div>
			<nav class="main_nav">
				<ul class="d-flex flex-row align-items-start justify-content-start">
					<li><a href="/">Inicio</a></li>
					<li><a href="disks.php">Discografía</a></li>
					<li><a href="music.php">Reproductor</a></li>
					<li class="active"><a href="contact.php">Contacto</a></li>
				</ul>
			</nav>
			<div class="hamburger ml-auto">
				<div class="d-flex flex-column align-items-end justify-content-between">
					<div></div>
					<div></div>
					<div></div>
				</div>
			</div>
		</div>
	</header>

	<!-- Menu -->

	<div class="menu">
		<div>
			<div class="menu_overlay"></div>
			<div class="menu_container d-flex flex-column align-items-start justify-content-center">
				<nav class="menu_nav">
					<ul class="d-flex flex-column align-items-start justify-content-start">
						<li><a href="/">Inicio</a></li>
						<li><a href="disks.php">Discografía</a></li>
						<li><a href="music.php">Reproductor</a></li>
						<li><a href="contact.php">Contacto</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</div>

	<!-- Home -->

	<div class="home">
		<div class="home_inner">
			<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/Logos/Huesca.jpeg" data-speed="0.8"></div>
		</div>
	</div>

	<!-- Contact -->

	<div class="contact">
		<div class="container">
			<div class="row">

				<!-- Contact Info -->

				<div class="col-lg-6 contact_col">
					<div class="contact_info">
						<div class="contact_title">Información de contacto</div>
						<div class="contact_info_list">
							<ul>
								<?php
								foreach ($contactos as $contacto) {
									generarContacto($contacto['tipo'], $contacto['dato'], $contacto['icono']);
								}
								?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<script src="js/contact.js"></script>
<?php includeTemplate('footer', ['config' => $indexConfig]);?>