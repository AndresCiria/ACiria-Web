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
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
</head>
<body>

<div class="super_container">
	
	<!-- Header -->
	<header class="header">
		<div class="header_content d-flex flex-row align-items-center justify-content-center">
			<div></div>
			<div class="logo"><img src="images/Logos/LogoNegro.jpg" alt="Logo" width="100" height="80">
				<a href="/">Ciria</a></div>
			<nav class="main_nav">
				<ul class="d-flex flex-row align-items-start justify-content-start">
					<li class="active"><a href="/">Inicio</a></li>
					<li><a href="music.php">Música</a></li>
					<li><a href="contact.php">Contacto</a></li>
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
						<li><a href="music.php">Música</a></li>
						<li><a href="blog.html">Blog</a></li>
						<li><a href="contact.html">Contacto</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</div>

	<!-- Home -->
	<!-- Featured Album -->

	<div class="featured_album">
		<div class="background_image featured_background" style="background-image:url(images/featured.png)"></div>
		<div class="container">

			<div class="row featured_row row-lg-eq-height">

				<!-- Featured Album Image -->
				<div class="col-md-6">
					<div class="featured_album_image">
						<div class="image_overlay"></div>
						<div class="background_image" style="background-image:url(images/Logos/FondoPrincipal1.png)"></div>
						<!-- <img src="images/featured_album.jpg" alt=""> -->
					</div>
				</div>
				
				<!-- Featured Album Player -->
				<div class="col-md-6 featured_album_col">
					<div class="featured_album_player_container d-flex flex-column align-items-start justify-content-center">
						<div class="featured_album_player">
							<div class="featured_album_title_bar d-flex flex-row align-items-center justify-content-start">
								<div class="featured_album_title_container">
									<div class="featured_album_artist">Ciria</div>
									<div class="featured_album_title">Últimos lanzamientos</div>
								</div>
								<div class="featured_album_link ml-auto"><a href="musicApp.php">Mucho más</a></div>
							</div>
							<div id="jplayer_1" class="jp-jplayer"></div>
							<div id="jp_container_1" class="jp-audio" role="application" aria-label="media player">
								<div class="jp-type-playlist">
									<div class="jp-playlist">
										<ul>
											<li></li>
										</ul>
									</div>
									<div class="player_details d-flex flex-row align-items-center justify-content-start">
										<div class="jp-details">
											<div>playing</div>
											<div class="jp-title" aria-label="title">&nbsp;</div>
										</div>
										<div class="jp-controls-holder ml-auto">
											<button class="jp-play" tabindex="0"></button>
										</div>
									</div>
									<div class="player_controls">
										<div class="jp-gui jp-interface d-flex flex-row align-items-center justify-content-start">
											<div class="jp-controls-holder time_controls d-flex flex-row align-items-center justify-content-start">
												<div><div class="jp-current-time" role="timer" aria-label="time">&nbsp;</div></div>
												<div class="jp-progress">
													<div class="jp-seek-bar">
														<div class="jp-play-bar"></div>
													</div>
												</div>
												<div><div class="jp-duration ml-auto" role="timer" aria-label="duration">&nbsp;</div></div>
											</div>
											<div class="jp-volume-controls d-flex flex-row align-items-center justify-content-start ml-auto">
												<button class="jp-mute" tabindex="0"></button>
												<div class="jp-volume-bar">
													<div class="jp-volume-bar-value"></div>
												</div>
											</div>
										</div>
									</div>
									<div class="jp-no-solution">
										<span>Update Required</span>
										To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>

	<!-- Artist -->

	<div class="artist">
		<div class="container">
			<div class="row">

				<!-- Artist Image -->
				<div class="col-lg-4 artist_image_col">
					<div class="artist_image">
						<img src="images/Logos/Ciria.png" alt="">
					</div>
				</div>

				<!-- Artist Content -->
				<div class="col-lg-7 offset-lg-1">
					<div class="artist_content">
						<div class="section_title_container">
							<div class="section_title"><h1>C i r i a</h1></div>
						</div>
						<div class="artist_text">
							<p> Escribo como terapia, como hobbie, por supervivencia, por el hecho de tener un medio de expresión para reir, llorar, criticar o cagarme en todo y en todos.</p>
                            <p> Mi diario terapéutico, lo hago simplemente por egoismo, porque me sienta bien, no por los demás. Si te gusta de puta madre si no, no lo escuches. </p>
                            <p> La gente muere cada día y, ¿que deja?, unas cuantas fotos y videos que no significan nada. Si muero mañana, por lo menos quedará algo de mi, mis ideas, mis lamentos, mis criticas.</p>
                            <p> Para mis seres queridos, para mis amigos, para la gente que me conocia realmente y para aquellos que no tienen ni idea de como soy. </p>
                        </div>
						<div class="artist_sig"><img src="images/sig.png" alt=""></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->
	<footer class="footer">
		<div class="footer_container d-flex flex-xl-row flex-column align-items-start justify-content-start">
		</div>
		<div class="copyright_bar">
			<span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
				<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
			</span>
		</div>
	</footer>
</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap-4.1.2/popper.js"></script>
<script src="styles/bootstrap-4.1.2/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/progressbar/progressbar.min.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="plugins/jPlayer/jquery.jplayer.min.js"></script>
<script src="plugins/jPlayer/jplayer.playlist.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>