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

$book_props = [
    'Тип книги' => $book['book_type_name'],
    'Рейтинг' => $book['rating'],
    'Цена' => $book['price'],
    'Количество страниц' => '159'
];

require "../views/book.view.php";