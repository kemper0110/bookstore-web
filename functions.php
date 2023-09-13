<?php

function connect(): false|mysqli
{
    return mysqli_connect(
        getenv('MYSQL_HOST'),
        getenv('MYSQL_USER'),
        getenv('MYSQL_PASSWORD'),
        getenv('MYSQL_DATABASE')
    );
}

function image_url(string $img) {
    return '/storage/' . $img;
}