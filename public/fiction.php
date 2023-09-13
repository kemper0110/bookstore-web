<?php

use repositories\BookRepository;

require "../repositories/BookRepository.php";
require "../functions.php";

$db = connect();

$data = [
    'books' => BookRepository::fiction($db)
];

require "../views/books.view.php";
