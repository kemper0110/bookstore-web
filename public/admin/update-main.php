<?php

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $code = $_POST['code'];
    $status = file_put_contents('../../views/books.view.php', $code);
    if(!$status) {
        echo "fail";
        exit;
    }
    header("Location: /admin/update-main.php");
}

$editor = [
    'filename' => 'books.view.php',
    'code' => file_get_contents('../../views/books.view.php'),
    'href' => '/'
];

require '../../views/update-page.view.php';
