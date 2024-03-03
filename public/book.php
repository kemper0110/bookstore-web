<?php

session_start();

require "../repositories/BookRepository.php";
use repositories\BookRepository;

$uri = $_SERVER['REQUEST_URI'];
$id = explode('/', $uri)[2];

//echo 'book id is ' . $id;

require "../functions.php";

$db = connect();

$book = BookRepository::getById($db, $id);

if($_SERVER['HTTP_ACCEPT'] == "application/json") {
    header("Content-Type: application/json; charset=UTF-8");
    $data = [
        "book" => $book
    ];
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
    return;
}

$book_props = [
    'Тип книги' => $book['book_type_name'],
    'Рейтинг' => $book['rating'],
    'Цена' => $book['price'],
    'Количество страниц' => '159'
];

require "../views/book.view.php";