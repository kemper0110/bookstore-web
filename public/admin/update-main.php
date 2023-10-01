<?php
require "authenticated.php";

handle_page_update(
    '../../views/books.view.php',
    'views/books.view.php'
);

$editor = [
    'filename' => 'books.view.php',
    'code' => file_get_contents('../../views/books.view.php'),
    'href' => '/'
];

require '../../views/update-page.view.php';
