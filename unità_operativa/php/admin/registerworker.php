<?php
require_once('../database.php');

if (isset($_POST['register'])) {

    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $name = $_POST['name'] ?? '';
    $surname = $_POST['surname'] ?? '';
    $phone = $_POST['phone'] ?? '';
    echo "$username|$password| $name |$surname| $phone";

    $isUsernameValid = filter_var(
        $username,
        FILTER_VALIDATE_REGEXP,
        [
            "options" => [
                "regexp" => "/^[a-z\d._]{3,20}$/i"
            ]
        ]
    );

    $pwdLenght = mb_strlen($password);

    if (empty($username) || empty($password)) {
        $msg = 'Compila tutti i campi %s';
    } elseif (false === $isUsernameValid) {
        $msg = 'L\'username non è valido. Sono ammessi solamente caratteri 
                alfanumerici, l\'underscore e il punto. Lunghezza minima 3 caratteri.
                Lunghezza massima 20 caratteri';
    } elseif ($pwdLenght < 8 || $pwdLenght > 20) {
        $msg = 'Lunghezza minima password 8 caratteri.
                Lunghezza massima 20 caratteri';
    } else {
        $password_hash = password_hash($password, PASSWORD_BCRYPT);

        $query = "
            SELECT username
            FROM personnel_account
            WHERE username = :username";

        $check = $pdo->prepare($query);
        $check->bindParam(':username', $username, PDO::PARAM_STR);
        $check->execute();

        $usernamecheck = $check->fetchAll(PDO::FETCH_ASSOC);

        if (count($usernamecheck) > 0) {
            $msg = 'username già in uso %s';
        } else {
            $query = "
                INSERT INTO personnel_account
                VALUES ( :username, :password, :name, :surname, :phone, 0)
            ";

            $check = $pdo->prepare($query);
            $check->bindParam(':username', $username, PDO::PARAM_STR);
            $check->bindParam(':password', $password_hash, PDO::PARAM_STR);
            $check->execute(
                array(
                    ":username" => $username,
                    ":password" => $password_hash,
                    ":name" => $name,
                    ":surname" => $surname,
                    ":phone" => $phone,
                )
            );

            if ($check->rowCount() > 0) {
                header('Location: homeadmin.php');
                exit;
            } else {
                $msg = 'Problemi con l\'inserimento dei dati %s';
            }
        }
    }
    echo "$msg";
}
