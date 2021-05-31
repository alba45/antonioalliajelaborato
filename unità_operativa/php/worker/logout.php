<?php
require_once('../database.php');

session_start();

$username = htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8');

$query = "
UPDATE `personnel_account` SET `working` = '0'
WHERE `personnel_account`.`username` = :username;
";

$check = $pdo->prepare($query);
$check->bindParam(':username', $username, PDO::PARAM_STR);
$check->execute();


unset($_SESSION['id']);
unset($_SESSION['username']);

session_destroy();

header('Location: ../../index.html');
exit;
