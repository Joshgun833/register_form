<?php define('DB_HOST', 'tapma.az');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'mysite');
$mysqli = @new mysqli(DB_HOST, DB_USER ,DB_PASSWORD, DB_NAME);
if ($mysqli->connect_errno) exit('Elaqe yoxdu');
$mysqli->set_charset('utf8') ;
?>