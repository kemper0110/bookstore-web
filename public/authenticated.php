<?php

if(!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="My Realm"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Text to send if user hits Cancel button';
    exit;
} else {
    echo "<p>Hello {$_SERVER['PHP_AUTH_USER']}.</p>";
    echo "<p>You entered {$_SERVER['PHP_AUTH_PW']} as your password.</p>";
}

die();

//

// Завершаем текущий сеанс
session_start();
session_destroy();

// Перенаправляем пользователя на страницу входа
header('Location: login.php');
exit;
// <a href="logout.php">Выйти</a>

?>



<?php
session_start();

// Проверяем, если пользователь уже аутентифицирован
if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true) {
    // Перенаправляем его на страницу профиля или куда угодно еще
    header('Location: profile.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Здесь вы можете проверить логин и пароль пользователя
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === 'ваш_логин' && $password === 'ваш_пароль') {
        // Устанавливаем флаг аутентификации в сессии
        $_SESSION['authenticated'] = true;

        // Перенаправляем пользователя на страницу профиля
        header('Location: profile.php');
        exit;
    } else {
        // Если аутентификация не удалась, вы можете вывести сообщение об ошибке
        $error_message = "Неправильный логин или пароль";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Вход</title>
</head>
<body>
    <h1>Вход</h1>
    <?php if (isset($error_message)) { ?>
        <p><?php echo $error_message; ?></p>
    <?php } ?>
    <form method="POST">
        <label for="username">Логин:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Пароль:</label>
        <input type="password" id="password" name="password" required><br>

        <input type="submit" value="Войти">
    </form>
</body>
</html>
