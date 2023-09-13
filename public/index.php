<?php

require "../functions.php";

$db = connect();

$books_array = $db
    ->query("SELECT id, name, type_id, price, rating, image FROM book")
    ->fetch_all(MYSQLI_ASSOC);
$data = [
    'books' => $books_array
];

require "../views/books.view.php";