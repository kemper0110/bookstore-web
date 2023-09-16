<?php

session_start();
session_destroy();
session_unset();
session_regenerate_id(true);

header('HTTP/1.1 401 Unauthorized');
header('WWW-Authenticate: Basic realm="Защищенная область"');
header('Cache-Control: no-cache, must-revalidate'); // Запретить кэширование

header('Location: /');
exit;