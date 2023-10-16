<?php
require "authenticated.php";

handle_page_update(
    '../../views/about-store.view.html',
    'views/about-store.view.html',
    '/admin/update-about-store.php'
);

$editor = [
    'filename' => 'about-store.view.html',
    'code' => file_get_contents('../../views/about-store.view.html'),
    'href' => '/about-store.php'
];

require '../../views/update-page.view.php';
