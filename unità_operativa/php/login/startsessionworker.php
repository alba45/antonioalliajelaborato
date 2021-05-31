<?php
session_start();

if (isset($_SESSION['id'])) {
    $session_username = htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8');
    $session_id = htmlspecialchars($_SESSION['id']);
    header('Location: ../worker/homeworker.php');
} else {
    header('Location: ../../index.html');
}