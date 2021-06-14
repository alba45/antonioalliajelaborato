<?php
require_once('../database.php');

session_start();

$codO = $_GET['codO'] ?? '';
$username = $_GET['username'] ?? '';
$session_username = htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8');

$query = "
UPDATE `orders` SET `usernameA` = :session_username, `usernameP` = :username
WHERE `orders`.`codO` = :codO;
";

$check = $pdo->prepare($query);
$check->execute(
    array(
        ":session_username" => $session_username,
        ":username" => $username,
        ":codO" => $codO,
    )
);

header('Location: homeadmin.php');
exit;