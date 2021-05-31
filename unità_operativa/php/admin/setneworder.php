<?php
session_start();
require_once('../database.php');

if (isset($_POST['register'])) {

    $session_username = htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8');

    $date_order = date('Y/m/d');
    $n_articles = $_POST['n_articles'] ?? '';
    $category = $_POST['category'] ?? '';

    if ($n_articles > 3 & $category = 1) {
        $category = 2;
    } elseif ($n_articles <= 3 & $category = 2 ) {
        $category = 1;
    } elseif ($n_articles > 1 & $category = 3 || $category = 4) {
        $category = 5;
    }

    $query = "INSERT INTO `orders`(`codO`, `date_order`, `n_articles`, `codC`, `usernameA`, `usernameP`, `codWS`) 
    VALUES ( 0, :date_order, :n_articles, :category, :usernameA, null, null)";

    $check = $pdo->prepare($query);
    $check->execute(
        array(
            ":date_order" => $date_order,
            ":n_articles" => $n_articles,
            ":category" => $category,
            ":usernameA" => $session_username,
        )
    );
    header('Location: homeadmin.php');
}
