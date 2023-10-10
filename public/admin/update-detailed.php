<?php
require "authenticated.php";

handle_page_update(
    '../../views/book.view.php',
    'views/book.view.php',
    '/admin/update-detailed.php'
);

$editor = [
    'filename' => 'book.view.php',
    'code' => file_get_contents('../../views/book.view.php'),
    'href' => '/book/1'
];

require '../../views/update-page.view.php';
