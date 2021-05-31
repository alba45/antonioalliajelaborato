<?php
session_start();
require_once('../database.php');

if (isset($_POST['login'])) {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    //    echo "$username and $password ";

    if (isset($_SESSION['id']) === true) {
        session_destroy();
        unset($_SESSION['id']);
        unset($_SESSION['username']);
        session_start();
    }

    if (empty($username) || empty($password)) {
        $msg = 'Inserisci username e password';
    } else {
        $query = "
                    SELECT password
                    FROM personnel_account
                    WHERE username = :username
                ";

        $check = $pdo->prepare($query);
        $check->bindParam(':username', $username, PDO::PARAM_STR);
        $check->execute();

        $usernames = $check->fetch(PDO::FETCH_ASSOC);

        $password_hash = $usernames['password'];
        $passwords = password_verify($password, $usernames['password']);
        echo " emails $passwords con $password_hash  ";

        if (!$usernames || password_verify($password, $usernames['password']) === false) {
            $msg = 'Credenziali utente errate';
        } else {

            $query = "UPDATE `personnel_account` SET `working` = '1'
                WHERE `personnel_account`.`username` = :username;
                ";

            $check = $pdo->prepare($query);
            $check->bindParam(':username', $username, PDO::PARAM_STR);
            $check->execute();

            session_regenerate_id();
            $_SESSION['id'] = session_id();
            $_SESSION['username'] = $username;
            header('Location: startsessionworker.php');
            exit;
        }
    }
    header("Location: loginworkerfailed.php?msg=$msg");
}
