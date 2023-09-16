<?php
session_start();

require "../../functions.php";
$db = connect();

// register admin
//$salt = base64_encode(random_bytes(16));
//$password = "1234";
//$combined_password = $salt . $password;
//$hashed_password = password_hash($combined_password, PASSWORD_DEFAULT);
//$db->prepare("insert into users (name, password_hash, salt) values (?, ?, ?)")
//    ->execute(['admin', $hashed_password, $salt]);
//exit;


if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="Protected area"');
    header('HTTP/1.0 401 Unauthorized');
    header('Cache-Control: no-cache, must-revalidate');
    echo 'Аутентификация не удалась';
    exit;
}

$user = $_SERVER['PHP_AUTH_USER'];
$password = $_SERVER['PHP_AUTH_PW'];

$stmt = $db->prepare("select password_hash, salt from users where name = ?");
$stmt->execute([$user]);
[$stored_password_hash, $salt] = $stmt->get_result()->fetch_row();

$combined_password = $salt . $password;
if (!password_verify($combined_password, $stored_password_hash)) {
    header('WWW-Authenticate: Basic realm="Защищенная область"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Аутентификация не удалась';
    exit();
}

$_SESSION['username'] = $user;
