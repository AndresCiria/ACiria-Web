<?php
include 'utils.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Ciria Music Player</title>
<meta charset="utf-8">
<meta name="description" content="Ciria Music Player">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/musicApp.css">
<link rel="stylesheet" type="text/css" href="styles/media.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>
<body>
	<header>
		<div class="menu_side">
			<h6 id="menu_list_active_button"><i class=" bi bi-music-note-list"></i></h6>
			<div class="user">
				<a title="Ciria" href="index.html"><img src="images/Logos/LogoNegro.jpg" alt="LogoNegroCiria" title="Logo Ciria"></a>
				<h1>Ciria</h1>
			</div>
			<div class="playlist">
				<h4 class="active"><span></span><i class="bi bi-music-note-beamed"></i>Playlists</h4>
			</div>
			<div class="menu_song">
				<?php
        		generarAlbumItem("images/Logos/Canciones/1.png", "Calendario Terapéutico", "Calendario Terapéutico", "Ciria", 1);
    			generarAlbumItem("images/Logos/FondoPrincipal2.jpg", "Relatos de un Finde", "Relatos de un Finde", "Ciria", 22);
        		generarAlbumItem("images/Logos/FondoPrincipal1.png", "Sencillos", "Sencillos", "Ciria", 28);
        		?>
			</div>
		</div>
		
		<div class="song_side">
			<nav>
				<ul>
					<li>Toda mi música<span></span></li>
				</ul>
				<!--<div class="search">
					<i class="bi bi-search"></i>
					<input type="text" placeholder="Buscar...">
					<div class="search_result">
						<a href="#" class="card">
							<img src="images/Logos/Canciones/0.png" alt="">
							<div class="content"><div class="subtitle"></div>
							</div>
						</a>
					</div>
				</div>-->
			</nav>

			<div class="popular_song">
				<div class="h4">
					<h4>Calendario Terapéutico</h4>
					<div class="bts_s">
						<i id="left_scroll" class="bi bi-arrow-left"></i>
						<i id="right_scroll" class="bi bi-arrow-right"></i>
					</div>
				</div>
				<div class="pop_song">
					<?php
            		for ($i = 1; $i <= 21; $i++) {
                		generarSongItem($i, "images/canciones/$i.jpg", "Canción $i");
            		}
            		?>
				</div>
			</div>

			<div class="popular_song">
				<div class="h4">
					<h4>Relatos de un Finde</h4>
					<div class="bts_s">
						<i id="left_scroll" class="bi bi-arrow-left"></i>
						<i id="right_scroll" class="bi bi-arrow-right"></i>
					</div>
				</div>
				<div class="pop_song">
					<?php
            		for ($i = 22; $i <= 27; $i++) {
                		generarSongItem($i, "images/canciones/$i.jpg", "Canción $i");
            		}
            		?>
				</div>
			</div>

			<div class="popular_song">
				<div class="h4">
					<h4>Sencillos</h4>
					<div class="bts_s">
						<i id="left_scroll" class="bi bi-arrow-left"></i>
						<i id="right_scroll" class="bi bi-arrow-right"></i>
					</div>
				</div>
				<div class="pop_song">
					<?php
            		for ($i = 28; $i <= 28; $i++) {
                		generarSongItem($i, "images/canciones/$i.jpg", "Canción $i");
            		}
            		?>
				</div>
			</div>

			<div class="popular_artists">
				<div class="h4">
					<h4>Productores</h4>
					<div class="bts_s">
						<i id="left_scroll" class="bi bi-arrow-left"></i>
						<i id="right_scroll" class="bi bi-arrow-right"></i>
					</div>
				</div>
				<div class="item">
					<?php
    			    generarEnlaceImagen("Fat Cats Beats", "https://www.youtube.com/@fatcatbeats", "https://yt3.googleusercontent.com/EqWqtjIQH_DYTqhVrbRhWx0WIAcGqa6j4NiffnnYUNOQmmOMXqvyXR2_ykrKts1vxo0UpkOi=s176-c-k-c0x00ffffff-no-rj");
        			generarEnlaceImagen("Garabato Beats", "https://www.youtube.com/@GarabatoBeats", "https://yt3.googleusercontent.com/ytc/AIdro_mXREDlHHn_fAMxYJlW93SosQUFs39aNG0pk5Xs4cL2E7c=s176-c-k-c0x00ffffff-no-rj");
        			generarEnlaceImagen("Darius", "https://www.youtube.com/@darius.m4a", "https://yt3.googleusercontent.com/ytc/AIdro_kN5akz3AgdkzsYCqH62HgnlU-GzZH7K1BcHaXdQaB0=s176-c-k-c0x00ffffff-no-rj");
        			?>
				</div>
			</div>
		</div>

		<div class="master_play">
			<img src="images/Logos/Canciones/1.png" alt="Intro" id="poster_master_play">
			<h5 id="title"> Intro
				<div class="subtitle">Calendario Terapéutico</div>
			</h5>
			<div class="icon">
				<i hidden class="bi shuffle bi-music-note-beamed">next</i>
				<i class="bi bi-skip-start-fill" id="back"></i>
				<i class="bi bi-play-fill" id="masterPlay"></i>
				<i class="bi bi-skip-end-fill" id="next"></i>
				<a hidden href="" download id="download_music"><i class="bi bi-cloud-arrow-down-fill"></i></a>
			</div>
			<span id="currentStart">0:00</span>
			<div class="bar">
				<input type="range" id="seek" min="0" value="0" max="100">
				<div class="bar2" id="bar2"></div>
				<div class="dot"></div>
			</div>
			<span id="currentEnd">0:00</span>
			<div class="vol">
				<i class="bi bi-volume-down-fill" id="vol_icon"></i>
				<input type="range" id="vol" min="0" value="30" max="100">
				<div class="vol_bar"></div>
				<div class="dot" id="vol_dot"></div>
			</div>
		</div>

	</header>
	<script src="js/musicApp.js"></script>
</body>
</html>