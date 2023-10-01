<?php
require "authenticated.php";

require "./../../repositories/BookRepository.php";
use repositories\BookRepository;

$uri = $_SERVER['REQUEST_URI'];
$id = explode('/', $uri)[3];

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['delete'])) {
        BookRepository::delete($db, $id);
        header("Location: /update-book");
        die();
    }
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
        $target_name = 'update-book.php' . hash_file('md5', $tmp_name) . random_int(1000, 9999) . 'bookstore' . $imageFileType;
        if (!move_uploaded_file($tmp_name, 'storage/' . $target_name)) {
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
        'book_type' => $_POST['book_type']
    ]);
    header("Location: /update-book/{$id}");
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
if(isset($book['image']))
    $book['image'] = image_url($book['image']);

require "../../views/update-book.view.php";