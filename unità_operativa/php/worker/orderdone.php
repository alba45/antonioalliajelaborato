<?php
require_once('../database.php');

session_start();

$codO = $_GET['codO'] ?? '';
$codWS = $_POST['codWS'] ?? '';
echo "$codO $codWS";
$session_username = htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8');

$query = "
UPDATE `orders` SET `codWS` = :codWS WHERE `orders`.`codO` = :codO";

$check = $pdo->prepare($query);
$check->execute(
    array(
        ":codWS" => $codWS,
        ":codO" => $codO,
    )
);

$query = "
UPDATE `personnel_account` SET `working` = '1'
WHERE `personnel_account`.`username` = :username;
";

    $check = $pdo->prepare($query);
    $check->bindParam(':username', $session_username, PDO::PARAM_STR);
    $check->execute();

header('Location: homeworker.php');
exit;
