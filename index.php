<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/functions.php';
includeTemplate('header', ['config' => $indexConfig]);
echo renderMusicPlayer($albums, 2);
generarSeccionArtista($indexConfig);
includeTemplate('footer', [
    'config' => $indexConfig,
    'contactos' => $contactos
]);
?>