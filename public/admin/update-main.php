<?php

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $code = $_POST['code'];
    $code = str_replace(array("\r\n", "\r", "\n"), "\n", $code);
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
