<?php

// handle post

$editor = [
    'filename' => 'books.view.php',
    'code' => file_get_contents('../../views/books.view.php')
];

require '../../views/update-page.view.php';
