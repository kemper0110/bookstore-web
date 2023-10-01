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

function handle_page_update($put_file, $git_file) {
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
        shell_exec('git restore ' . $git_file);
    } else if(isset($_POST['commit'])) {
        chdir('/var/www/bookstore');
        shell_exec('git add ' . $git_file);
        $message = base64_encode(random_bytes(16));
        shell_exec("git commit -m '${message}'");
    }
    header("Location: /admin/update-main.php");
}