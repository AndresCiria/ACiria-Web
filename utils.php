<?php

function generarAlbumItem($imagen, $alt, $titulo, $subtitulo, $id) {
    echo '
    <li class="albumItem">
        <img src="' . $imagen . '" alt="' . $alt . '">
        <h5>' . $titulo . '<br><div class="subtitle">' . $subtitulo . '</div></h5>
        <i class="bi playListPlay bi-play-circle-fill" id="' . $id . '"></i>
    </li>
    ';
}

function generarSongItem($id, $src, $titulo) {
    echo '
    <li class="songItem">
        <div class="img_play">
            <img src="' . $src . '" alt="' . $titulo . '">
            <i class="bi playListPlay bi-play-circle-fill" id="' . $id . '"></i>
        </div>
        <h5>' . $titulo . '</h5>
    </li>
    ';
}

function generarProdItem($name, $src, $url) {
    echo '
    <li>
		<a title="' . $name . '" href="' . $url . '"><img src="' . $src . '" alt="' . $name . '"></a>
	</li>
    ';
}

?>