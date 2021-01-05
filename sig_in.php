<?php

include 'dbconfig.php';
$password =  htmlspecialchars($_POST['password']);
$email =  htmlspecialchars($_POST['email']);
$query = "INSERT INTO `create` (`name`, `email`, `password`, `date_reg`,) VALUES ('$name', '$email', MD5('$password'), UNIX_TIMESTAMP())";

$result = $mysqli->query("SELECT*FROM `create` WHERE `email` = '$email' AND `password`=MD5('$password') ");
$user = $result->fetch_assoc();

if(count($user) == 0){
    echo "Bele istifadeci yoxdu";
    exit();
}

setcookie('user',$user['email'], time() + 3600, "/");


$mysqli->close();
header('Location: /');

?>
