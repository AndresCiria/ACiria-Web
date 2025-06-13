<?php
include 'includes/config.php';
include 'includes/functions.php';
?>
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
<body>
    <header>
        <div class="menu_side">
            <h6 id="menu_list_active_button"><i class="bi bi-music-note-list"></i></h6>
            <div class="user">
                <a href="/" title="Ciria">
                    <img src="images/Logos/LogoNegro.jpg" alt="Ciria" loading="lazy">
                </a>
                <h1>Ciria</h1>
            </div>
            <div class="playlist">
                <h4 class="active"><span></span><i class="bi bi-music-note-beamed"></i>Playlists</h4>
            </div>
            <div class="menu_song">
                <?php foreach ($albums as $album) {
                    echo generateAlbumItem($album);
                } ?>
            </div>
        </div>
        
        <div class="song_side">
            <nav>
                <ul>
                    <li>Toda mi música<span></span></li>
                </ul>
            </nav>

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
            <img src="images/Logos/Canciones/1.png" alt="Portada" id="poster_master_play">
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
            </div>
            <span id="currentEnd">0:00</span>
            <div class="vol">
                <i class="bi bi-volume-down-fill" id="vol_icon"></i>
                <input type="range" id="vol" min="0" value="30" max="100">
            </div>
        </div>
    </header>

    <script src="js/musicApp.js"></script>
    <script>
    const albumsData = <?= json_encode($albums) ?>;
    </script>
</body>
</html>




