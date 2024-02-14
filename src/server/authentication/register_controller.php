<?php
include 'user_service.php';
include 'user_middleware.php';
session_start();

global $bdd;
$bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;','root',"");

if (isset($_POST['send'])) {
    $pseudo = htmlspecialchars($_POST['pseudo']);
//    $mdp = $_POST['mdp'];
    $mdp = sha1($_POST['mdp']);

    $mail = htmlspecialchars($_POST['mail']);

    $errors = registerController($mail, $mdp, $pseudo);

    $containsOtherThanOne = false;

    foreach ($errors as $error) {
        if (gettype($error) !== "boolean") {
            $containsOtherThanOne = true;
        }
    }

    if (!$containsOtherThanOne) {
        addUser($mail, $mdp, $pseudo);

        $getUser = $bdd->prepare('SELECT * FROM User where pseudo = ?');
        $getUser->execute(array($pseudo));

        if ($getUser->rowCount() > 0) {
            $user = $getUser->fetch(); // Récupère la première ligne de résultat
            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['mdp'] = $mdp;
            $_SESSION['id'] = $user['id'];
            $_SESSION['role'] = $user['role'];

            header('Location: Home.php');
            exit();
        }
    }
}

function registerController($mail, $mdp, $pseudo): array
{
    $errors = [];

    $middlewares = [
        mailIsEmpty($mail),
        getUser($pseudo),
        pseudoIsEmpty($pseudo),
        passwordIsEmpty($mdp),
        lenMinimum($mdp),
//        isSpecialCharacter($mdp),
//        isLowercaseAndUppercaseDigit($mdp),
        emailValid($mail),
    ];

    foreach ($middlewares as $result) {
        if ($result !== null) {
            $errors[] = $result;
        }
    }

    return $errors;
}

