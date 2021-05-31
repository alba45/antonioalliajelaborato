<?php
session_start();

if (isset($_SESSION['id'])) {
    $session_username = htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8');
    $session_id = htmlspecialchars($_SESSION['id']);
    header('Location: ../admin/homeadmin.php');
} else {
    header('Location: ../../indexadmin.html');
}