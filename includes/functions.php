<?php

function includeTemplate($template, $data = []) {
    extract($data);
    include __DIR__ . '/../templates/' . $template . '.php';
}

function esc($string) {
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

function generateAlbumItem($album) {
    ob_start(); ?>
    <li class="albumItem">
        <img src="<?= $album['image'] ?>" alt="<?= $album['title'] ?>">
        <h5><?= $album['title'] ?><br><div class="subtitle"><?= $album['artist'] ?></div></h5>
        <i class="bi playListPlay bi-play-circle-fill" id="<?= $album['id'] ?>"></i>
    </li>
    <?php return ob_get_clean();
}

function generateAlbumSection($album) {
    ob_start(); ?>
    <div class="popular_song">
        <div class="h4">
            <h4><?= $album['title'] ?></h4>
        </div>
        <div class="pop_song">
            <?php foreach ($album['songs'] as $song) {
                echo generateSongItem($song);
            } ?>
        </div>
    </div>
    <?php return ob_get_clean();
}

function generateSongItem($song) {
    ob_start(); ?>
    <li class="songItem" data-app-index="<?= $song['appIndex'] ?>">
        <div class="img_play">
            <img src="<?= $song['image'] ?>" alt="<?= $song['title'] ?>">
            <i class="bi playListPlay bi-play-circle-fill" id="<?= $song['appIndex'] ?>"></i>
        </div>
        <h5><?= $song['title'] ?></h5>
    </li>
    <?php return ob_get_clean();
}

function generateProducerItem($producer) {
    ob_start(); ?>
    <li>
        <a title="<?= $producer['name'] ?>" href="<?= $producer['url'] ?>" target="_blank">
            <img src="<?= $producer['image'] ?>" alt="<?= $producer['name'] ?>" loading="lazy">
        </a>
    </li>
    <?php return ob_get_clean();
}

function displayAlbumList($albums) {
    foreach ($albums as $album) {
            $image = htmlspecialchars($album['image'], ENT_QUOTES, 'UTF-8');
            $alt = htmlspecialchars($album['alt'] ?? 'Logo', ENT_QUOTES, 'UTF-8');
            $title = htmlspecialchars($album['title'], ENT_QUOTES, 'UTF-8');
            $id = htmlspecialchars($album['id'], ENT_QUOTES, 'UTF-8');

            echo '
            <div class="col-xl-4 col-md-6">
                <div class="disc">
                    <a href="album.php?id=' . $id . '">
                        <div class="disc_image"><img src="' . $image . '" alt="' . $alt . '"></div>
                    </a>
                </div>
            </div>';
        }
}

function generarContacto($tipo, $dato, $icono, $enlace) {
    echo '
    <li style="display: flex; align-items: center; margin-bottom: 10px;">
        <div style="margin-right: 10px; width: 24px; text-align: center;">
            <i class="' . htmlspecialchars($icono) . '" style="font-size: 1.2em;"></i>
        </div>
        <div>
            <strong>' . htmlspecialchars($tipo) . ':</strong>
            <a href="' . htmlspecialchars($enlace) . '" target="_blank" style="color: inherit; text-decoration: none;">
                <span>' . htmlspecialchars($dato) . '</span>
            </a>
        </div>
    </li>';
}

function getAlbumById($albums, $id) {
    foreach ($albums as $album) {
        if ($album['id'] == $id) {
            return $album;
        }
    }
    return null;
}

function displayAlbumDetails($album) {
    echo '<h2>' . htmlspecialchars($album['title']) . '</h2>';
    echo '<img src="' . htmlspecialchars($album['image']) . '" width="300" />';
    echo '<ul>';
    foreach ($album['songs'] as $song) {
        echo '<li>';
        echo htmlspecialchars($song['title']);
        echo ' <a href="' . $song['file'] . '">Reproducir</a>';
        echo ' <a onclick="showLyrics(\'lyrics/' . $album['directory'] . '/' . strtolower(str_replace(' ', '', $song['title'])) . '.txt\')"> - Ver letra</a>';
        echo '</li>';
    }
    echo '</ul>';
}

function renderMusicPlayer($albums, $albumId) {
    $album = null;
    foreach ($albums as $a) {
        if ($a['id'] === $albumId) {
            $album = $a;
            break;
        }
    }

    if (!$album) {
        return "<p>Álbum no encontrado.</p>";
    }

    ob_start(); ?>

    <div class="featured_album">
        <div class="background_image featured_background"></div>
        <div class="container">
            <div class="row featured_row row-lg-eq-height">

                <!-- Imagen del álbum -->
                <div class="col-md-6">
                    <div class="featured_album_image">
                        <div class="image_overlay"></div>
                        <img src="images/Logos/plz.jpg" class="featured_img">
                    </div>
                </div>

                <!-- Reproductor -->
                <div class="col-md-6 featured_album_col">
                    <div class="featured_album_player_container d-flex flex-column align-items-start justify-content-center">
                        <div class="featured_album_player">
                            <div class="featured_album_title_bar d-flex flex-row align-items-center justify-content-start">
                                <div class="featured_album_title_container">
                                    <div class="featured_album_artist"><?= htmlspecialchars($album['artist']) ?></div>
                                    <div class="featured_album_title"><?= htmlspecialchars($album['title']) ?></div>
                                </div>
                                <div class="featured_album_link ml-auto"><a href="music.php">Mucho más</a></div>
                            </div>

                            <div class="jp-audio">
                                <div class="jp-type-playlist">
                                    <div class="jp-playlist">
                                        <ul id="playlist" class="playlist" data-album="<?= htmlspecialchars($album['title']) ?>">
                                            <?php foreach ($album['songs'] as $song): ?>
                                                <li class="song-item" data-src="<?= $song['file'] ?>">
                                                    <?= htmlspecialchars($song['title']) ?>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                    <audio id="audioPlayer" controls preload="none">
                                        <source src="<?= $album['songs'][0]['file'] ?>" type="audio/mpeg" />
                                        Tu navegador no soporta la reproducción de audio.
                                    </audio>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php
    return ob_get_clean();
}

function generarAlbum($albumId, $albums) {
    global $albums;
    
    $album = null;
    foreach ($albums as $a) {
        if ($a['id'] == $albumId) {
            $album = $a;
            break;
        }
    }
    
    if (!$album) {
        echo "<p>Álbum no encontrado</p>";
        return;
    }
    
    $config = $albums[$albumId-1];
    
    ?>
    <div class="single">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="single_info">
                        <div class="single_image"><img src="<?= $album['image'] ?>" alt="<?= $album['title'] ?>"></div>
                        <div class="single_info_list">
                            <ul>
                                <li><span>Fecha: </span><?= $config['year'] ?></li>
                                <li><span>Mezcla: </span><?= $config['mix'] ?></li>
                                <li><span>Nº de canciones: </span><?= $config['num_songs'] ?></li>
                                <li>
                                    <span><a href="music.php?album=<?= $albumId ?>" class="lyrics-btn">Abrir Reproductor</a></span>
                                    <span><a href="<?= $config['download_link'] ?>" class="lyrics-btn">Descargar</a></span>
                                </li>
                            </ul>
                        </div><br>
                        <?php if (!empty($config['youtube_intro'])): ?>
                        <div class="video_gallery mt-4">
                            <h4>Instrumental</h4>
                            <div class="row">
                                <div class="col-md-9 mb-3">
                                    <div class="video-container">
                                        <iframe width="100%" height="200" src="<?= $config['youtube_intro'] ?>" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-lg-5 single_content_col">
                    <div class="single_content">
                        <div class="single_info_list">
                            <p><?php echo htmlspecialchars($album['description'], ENT_QUOTES, 'UTF-8'); ?></p><br>
                            <ul>
                                <?php foreach ($album['songs'] as $song): 
                                    $songNumber = str_pad($song['id'] - (($albumId-1)*21), 2, '0', STR_PAD_LEFT);
                                    $lyricsFile = strtolower(str_replace(' ', '', $song['title'])) . '.txt';
                                ?>
                                <li>
                                    <span><?= $songNumber ?>: </span>
                                    <?= $song['title'] ?>
                                    <?php if (!empty($song['youtube_link'])): ?>
                                        <a href="<?= $song['youtube_link'] ?>">Prod. by <?= $song['producer'] ?></a>
                                    <?php endif; ?>
                                    <button class="lyrics-btn" onclick="showLyrics('<?= $config['lyrics_path'] . $lyricsFile ?>', '<?= $song['title'] ?>')">Ver letra</button>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                            <br><br>
                            <div id="song-lyrics" class="song-lyrics">
                                <p id="lyrics-text">Selecciona una canción para ver la letra.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}

function generarSeccionArtista($config) {
    echo '
    <!-- Artist -->
    <div class="artist">
        <div class="container">
            <div class="row">

                <!-- Artist Image -->
                <div class="col-lg-4 artist_image_col">
                    <div class="artist_image">
                        <img src="images/Logos/Ciria.png" alt="'.htmlspecialchars($config['artist_name'], ENT_QUOTES, 'UTF-8').'">
                    </div>
                </div>

                <!-- Artist Content -->
                <div class="col-lg-7 offset-lg-1">
                    <div class="artist_content">
                        <div class="section_title_container">
                            <div class="section_title"><h1>'.htmlspecialchars($config['artist_name'], ENT_QUOTES, 'UTF-8').'</h1></div>
                        </div>
                        <div class="artist_text">';
                        
                        foreach ($config['artist_text'] as $paragraph) {
                            echo '<p>'.htmlspecialchars($paragraph, ENT_QUOTES, 'UTF-8').'</p>';
                        }
                        
                        echo '
                        </div>
                        <div class="artist_sig"><img src="images/sig.png" alt="Firma"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>';
}

?>