<!DOCTYPE html>
<html lang="es">
<head>
    <title>Ciria Music Player</title>
    <meta charset="utf-8">
    <meta name="description" content="Reproductor musical oficial de Ciria">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/musicApp.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<?php
include 'includes/config.php';
include 'includes/functions.php';
?>
<body>
    <header>
        <div class="song_side">
            <div class="user">
                <a href="/" title="Ciria">
                    <img src="images/Logos/LogoNegro.jpg" alt="Ciria" loading="lazy">
                    <h1>ACiria</h1>
                </a>
                
            </div>
            

            <?php foreach ($albums as $album) {
                echo generateAlbumSection($album);
            } ?>

            <div class="popular_artists">
                <div class="h4">
                    <h4>Productores</h4>
                    <div class="bts_s">
                        <i class="bi bi-arrow-left" id="left_scroll"></i>
                        <i class="bi bi-arrow-right" id="right_scroll"></i>
                    </div>
                </div>
                <div class="item">
                    <?php foreach ($producers as $producer) {
                        echo generateProducerItem($producer);
                    } ?>
                </div>
            </div>
        </div>

        <!-- Reproductor principal -->
        <div class="master_play">
            <img src="images/Logos/Canciones/Calendario Terapéutico/1.jpg" alt="Portada" id="poster_master_play">
            <h5 id="title">Intro
                <div class="subtitle">Calendario Terapéutico</div>
            </h5>
            <div class="icon">
                <i class="bi bi-skip-start-fill" id="back"></i>
                <i class="bi bi-play-fill" id="masterPlay"></i>
                <i class="bi bi-skip-end-fill" id="next"></i>
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
				<input type="range" id="vol" min="0" value="50" max="100">
				<div class="vol_bar"></div>
				<div class="dot" id="vol_dot"></div>
            </div>
        </div>
    </header>
    <script>
        window.albumsData = <?php echo json_encode($albums); ?>;
        console.log('Datos pasados desde PHP:', window.albumsData);
    </script>
    <script src="js/musicApp.js"></script>
</body>
</html>




