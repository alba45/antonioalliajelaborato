<?php
session_start();
require_once('../database.php');

$username = $_GET['username'] ?? '';

$query = "";

$check = $pdo->prepare($query);
$check->execute(
    array(
    )
);

header("Location: loginadminfailed.php?msg=$msg");
?>