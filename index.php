<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/functions.php';
includeTemplate('header', ['config' => $indexConfig]);
?>
	<!-- Featured Album -->

	<div class="featured_album">
	<div class="background_image featured_background"></div>
	<div class="container">

		<div class="row featured_row row-lg-eq-height">

			<!-- Featured Album Image -->
			<div class="col-md-6">
				<div class="featured_album_image">
					<div class="image_overlay"></div>
					<div class="background_image" style="background-image:url(images/Logos/plz.png)"></div>
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
					<div class="featured_album_link ml-auto"><a href="music.php">Mucho más</a></div>
					</div>

					<!-- Reemplazo de jPlayer con audio HTML5 -->
					<audio id="audioPlayer" class="jp-jplayer" controls preload="none" style="width: 100%; outline: none;">
					<source src="music/Relatos De Un Finde/22.mp3" type="audio/mpeg" />
					Tu navegador no soporta la reproducción de audio.
					</audio>

					<div id="jp_container_1" class="jp-audio" role="application" aria-label="media player" style="margin-top: 1rem;">
					<div class="jp-type-playlist">

						<div class="jp-playlist">
						<ul id="playlist" class="d-flex flex-column align-items-start justify-content-start" style="list-style: none; padding-left: 0;">
							<li data-src="music/Relatos De Un Finde/22.mp3" style="cursor: pointer; padding: 0.3rem 0;">Canción 1</li>
							<li data-src="music/Relatos De Un Finde/22.mp3" style="cursor: pointer; padding: 0.3rem 0;">Canción 2</li>
							<li data-src="music/Relatos De Un Finde/22.mp3" style="cursor: pointer; padding: 0.3rem 0;">Canción 3</li>
						</ul>
						</div>

						<div class="player_details d-flex flex-row align-items-center justify-content-start" style="margin-top: 0.5rem;">
						<div class="jp-details">
							<div>playing</div>
							<div id="currentTitle" class="jp-title" aria-label="title">&nbsp;</div>
						</div>
						<div class="jp-controls-holder ml-auto">
							<button id="playPauseBtn" class="jp-play" tabindex="0" aria-label="Play/Pause">&#9658;</button>
						</div>
						</div>

						<div class="player_controls">
						<div class="jp-gui jp-interface d-flex flex-row align-items-center justify-content-start" style="margin-top: 0.5rem;">
							<div class="jp-controls-holder time_controls d-flex flex-row align-items-center justify-content-start" style="flex-grow: 1;">
							<div><div id="currentTime" class="jp-current-time" role="timer" aria-label="time">00:00</div></div>
							<div class="jp-progress" style="flex-grow: 1; margin: 0 10px; cursor: pointer; position: relative; height: 5px; background: #ccc;">
								<div id="progressBar" class="jp-play-bar" style="width: 0%; height: 100%; background: #007bff;"></div>
							</div>
							<div><div id="duration" class="jp-duration ml-auto" role="timer" aria-label="duration">00:00</div></div>
							</div>
							<div class="jp-volume-controls d-flex flex-row align-items-center justify-content-start ml-auto">
							<button id="muteBtn" class="jp-mute" tabindex="0" aria-label="Mute/Unmute">&#128266;</button>
							<div class="jp-volume-bar" style="width: 80px; height: 5px; background: #ccc; margin-left: 10px; cursor: pointer; position: relative;">
								<div id="volumeBar" class="jp-volume-bar-value" style="width: 100%; height: 100%; background: #007bff;"></div>
							</div>
							</div>
						</div>
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
	
<script src="js/index.js"></script>
<?php includeTemplate('footer', ['config' => $indexConfig]);?>