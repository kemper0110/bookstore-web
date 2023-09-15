<?php

//$headers = getallheaders();
//echo json_encode($headers);

echo "<p>Hello {$_SERVER['PHP_AUTH_USER']}.</p>";
echo "<p>You entered {$_SERVER['PHP_AUTH_PW']} as your password.</p>";