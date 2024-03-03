<?php

use repositories\BookRepository;

require "../repositories/BookRepository.php";
require "../functions.php";

$db = connect();

$data = [
    'books' => BookRepository::all($db)
];

if($_SERVER['HTTP_ACCEPT'] == "application/json") {
    header("Content-Type: application/json; charset=UTF-8");
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
    return;
}

require "../views/books.view.php";