<?php
include 'user_service.php';
include 'user_middleware.php';
session_start();

global $bdd;
$bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;','root',"");

if (isset($_POST['send'])) {
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mdp = $_POST['mdp'];

//    $mdp = password_h540.ash($_POST['mdp'], PASSWORD_DEFAULT);  // Utilisation de password_hash
    $mail = htmlspecialchars($_POST['mail']);

    $errors = controller($mail, $mdp);

    $containsOtherThanOne = false;

    foreach ($errors as $error) {
        if ($error !== 1) {
            $containsOtherThanOne = true;
            break;
        }
    }

    if ($containsOtherThanOne) {
        addUser($mail, $mdp, $pseudo);

        $getUser = $bdd->prepare('SELECT * FROM User where pseudo = ?');
        $getUser->execute(array($pseudo));

        if ($getUser->rowCount() > 0) {
            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['mdp'] = $mdp;
            $_SESSION['id'] = $getUser->fetch()['id'];

            header('Location: Home.php');
            exit();
        }
    }

    if (!is_array($errors)) {
        $errors = [$errors];
    }
}

//function registerController($mail, $mdp, $pseudo): array
//{
//    $errors = [];
//
//    $middlewares = [
//        mailIsEmpty($mail),
//        pseudoIsEmpty($pseudo),
//        passwordIsEmpty($mdp),
//        lenMinimum($mdp),
////        isSpecialCharacter($mdp),
////        isLowercaseAndUppercaseDigit($mdp),
//        emailValid($mail),
//    ];
//
//    foreach ($middlewares as $result) {
//        if ($result !== null) {
//            $errors[] = $result;
//        }
//    }
//
//    return $errors;
//}

