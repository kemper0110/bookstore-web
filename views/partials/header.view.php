<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en" class="text-slate-700">
<head>
    <meta charset="UTF-8">
    <title><?= $data['title'] ?></title>
    <link href="/index.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
<header class="relative z-50 w-full h-full from-pink-500 to-purple-800 after:content-[''] after:absolute after:-bottom-px after:bg-white after:w-full after:h-8 after:rounded-t-full
    bg-[url('/img/top.webp')] bg-cover bg-[center_-200px] bg-no-repeat bg-fixed
">
    <div class="h-[300px]">
        <div class="bg-black/40 backdrop-blur p-6 text-slate-200 flex justify-between">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12">
                    <?php require "book-icon.view.php" ?>
                </div>
                <h1 class="text-4xl font-medium">
                    Много книг
                </h1>
            </div>
            <div class="flex flex-col">
                <?php if (isset($_SESSION['username'])): ?>
                    <a href="/admin">
                        Авторизован <?= $_SESSION['username'] ?>
                    </a>
                    <a href="/logout.php">
                        Выйти
                    </a>
                <?php else: ?>
                    <a href="/admin">
                        Войти
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>
<!-- TODO: main is fixed to be aside and section -->
<main class="px-2 md:px-4 max-w-[1280px] min-h-[70vh] mx-auto flex flex-col md:flex-row items-start">
