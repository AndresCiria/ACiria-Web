<?php
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

function generarDisco($imagen, $alt, $titulo, $enlace) {
    $imagen = htmlspecialchars($imagen, ENT_QUOTES, 'UTF-8');
    $alt = htmlspecialchars($alt, ENT_QUOTES, 'UTF-8');
    $titulo = htmlspecialchars($titulo, ENT_QUOTES, 'UTF-8');
    $enlace = htmlspecialchars($enlace, ENT_QUOTES, 'UTF-8');

    echo '
    <div class="col-xl-4 col-md-6">
        <div class="disc">
            <a href="'.$enlace.'">
                <div class="disc_image"><img src="'.$imagen.'" alt="'.$alt.'"></div>
                <div class="disc_container">
                    <div>
                        <div class="disc_content_4 d-flex flex-column align-items-start justify-content-end">
                            <div class="text-left">
                                <div class="disc_subtitle">'.$titulo.'</div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>';
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

?>