<?php
require "authenticated.php";

handle_page_update(
    '../../views/about-store.view.php',
    'views/about-store.view.php'
);

$editor = [
    'filename' => 'about-store.view.php',
    'code' => file_get_contents('../../views/about-store.view.php'),
    'href' => '/about-store.php'
];

require '../../views/update-page.view.php';
