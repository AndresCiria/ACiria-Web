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

function generateSongItem($song) {
    ob_start(); ?>
    <li class="songItem">
        <div class="img_play">
            <img src="" alt="<?= $song['title'] ?>">
            <i class="bi playListPlay bi-play-circle-fill" id="<?= $song['id'] ?>"></i>
        </div>
        <h5><?= $song['title'] ?></h5>
    </li>
    <?php return ob_get_clean();
}

function generateAlbumSection($album) {
    ob_start(); ?>
    <div class="popular_song">
        <div class="h4">
            <h4><?= $album['title'] ?></h4>
            <div class="bts_s">
                <i class="bi bi-arrow-left scroll-left" data-album="<?= $album['id'] ?>"></i>
                <i class="bi bi-arrow-right scroll-right" data-album="<?= $album['id'] ?>"></i>
            </div>
        </div>
        <div class="pop_song">
            <?php foreach ($album['songs'] as $song) {
                echo generateSongItem($song);
            } ?>
        </div>
    </div>
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

function generarContacto($tipo, $dato, $icono) {
    echo '
    <li style="display: flex; align-items: center; margin-bottom: 10px;">
        <div style="margin-right: 10px; width: 24px; text-align: center;">
            <i class="' . htmlspecialchars($icono) . '" style="font-size: 1.2em;"></i>
        </div>
        <div>
            <strong>' . htmlspecialchars($tipo) . ':</strong>
            <span>' . htmlspecialchars($dato) . '</span>
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

?>