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
    if($img)
        return '/storage/' . $img;
    return null;
}

function handle_page_update($put_file, $git_file, $redirect_to) {
    if($_SERVER['REQUEST_METHOD'] !== 'POST')
        return;
    if(isset($_POST['apply'])) {
        $code = $_POST['code'];
        $code = str_replace(array("\r\n", "\r", "\n"), "\n", $code);
        $status = file_put_contents($put_file, $code);
        if(!$status) {
            echo "fail";
            exit;
        }
    } else if(isset($_POST['restore'])) {
        chdir('/var/www/bookstore');
        $out = [];
        exec("git restore {$git_file} 2>&1", $out);
    } else if(isset($_POST['commit'])) {
        chdir('/var/www/bookstore');
        $out = [];
        exec("git add {$git_file} 2>&1", $out);
        $message = base64_encode(random_bytes(4)).' '.$git_file;
        exec("git commit -m '{$message}' 2>&1", $out);
    }
    header("Location: {$redirect_to}");
}