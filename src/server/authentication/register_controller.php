<?php
include 'user_service.php';
include 'user_middleware.php';
session_start();

global $bdd;
$bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;','root',"");

/**
 * Contrôleur pour le processus d'enregistrement d'un utilisateur.
 *
 * @param string $mail L'adresse email de l'utilisateur
 * @param string $mdp Le mot de passe de l'utilisateur
 * @param string $pseudo Le pseudo de l'utilisateur
 */
if (isset($_POST['send'])) {
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mdp = $_POST['mdp'];
    $mail = htmlspecialchars($_POST['mail']);
    $errors = registerController($mail, $mdp, $pseudo);
    $containsOtherThanOne = false;

    foreach ($errors as $error) {
        if (gettype($error) !== "boolean") {
            $containsOtherThanOne = true;
        }
    }

    if (!$containsOtherThanOne) {
        addUser($mail, sha1($mdp), $pseudo);

        $getUser = getUser($pseudo, sha1($mdp));

        if ($getUser->rowCount() > 0) {
            $user = $getUser->fetch();
            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['mdp'] = $mdp;
            $_SESSION['id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['lang'] = 'english';

            header('Location: Home.php');
            exit();
        }
    }
}

/**
 * Contrôleur intermédiaire pour valider les données d'enregistrement d'un utilisateur.
 *
 * @param string $mail L'adresse email de l'utilisateur
 * @param string $mdp Le mot de passe de l'utilisateur
 * @param string $pseudo Le pseudo de l'utilisateur
 * @return array Un tableau contenant les erreurs de validation
 */
function registerController($mail, $mdp, $pseudo): array
{
    $errors = [];

    $middlewares = [
        mailIsEmpty($mail),
        getUserMiddleware($pseudo),
        pseudoIsEmpty($pseudo),
        passwordIsEmpty($mdp),
        lenMinimum($mdp),
        emailValid($mail),
    ];

    foreach ($middlewares as $result) {
        if ($result !== null) {
            $errors[] = $result;
        }
    }

    return $errors;
}
