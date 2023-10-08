<?php
require "authenticated.php";

require "./../../repositories/BookRepository.php";
use repositories\BookRepository;

$uri = $_SERVER['REQUEST_URI'];
$id = explode('/', $uri)[3];

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['delete'])) {
        BookRepository::delete($db, $id);
        header("Location: /admin/update-book");
        die();
    }

    $required_fields = [
        'name' => 'Название обязательно для заполнения',
        'price' => 'Цена обязательна для заполнения',
        'rating' => 'Рейтинг обязателен для заполнения',
        'book_type' => 'Тип книги обязателен для заполнения',
    ];

    $errors = [];
    foreach ($required_fields as $field => $error)
        if(is_null($_POST[$field]) || $_POST[$field] === '')
            $errors[$field] = $error;

    if(count($errors) !== 0) {
        $_SESSION['form_errors'] = $errors;
        $_SESSION['form_data'] = $_POST;
        if($id)
            header("Location: /admin/update-book/${id}");
        else
            header('Location: /admin/update-book');
        die;
    }

    $data = [
        ['key' => 'name', 'value' => $_POST['name'] ?? null],
        ['key' => 'price', 'value' => $_POST['price'] ?? null],
        ['key' => 'rating', 'value' => $_POST['rating'] ?? null],
        ['key' => 'book_type', 'value' => $_POST['book_type'] ?? null],
    ];

    $file = $_FILES['image'];
    $image = null;
    if(!$file['error']) {
        $tmp_name = $file['tmp_name'];
        $check = getimagesize($tmp_name);
        if(!$check) {
            echo "Bad file type";
            die(400);
        }
        $imageFileType = strtolower(pathinfo(basename($file['name']),PATHINFO_EXTENSION));
        $target_name = substr(hash_file('md5', $tmp_name), 0, 10) . random_int(10, 99) . '.' . $imageFileType;
        if (!move_uploaded_file($tmp_name, '../../storage/' . $target_name)) {
            echo 'upload file error';
            die(500);
        }
        $image = $target_name;
    } else {
        $image = $_POST['image'];
    }

    $db = connect();
    $id = BookRepository::createOrUpdate($db, [
        'id' => $id,
        'name' => $_POST['name'],
        'price' => $_POST['price'],
        'rating' => $_POST['rating'],
        'book_type' => $_POST['book_type'],
        'image' => $image
    ]);
    header("Location: /admin/update-book/{$id}");
    die();
}


$db = connect();
$book_types = $db->query("select * from book_type")->fetch_all(MYSQLI_ASSOC);

$book = [];

if($id) {
    $stmt = $db->prepare("select * from book where id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $book = $stmt->get_result()->fetch_assoc();
}

require "../../views/update-book.view.php";