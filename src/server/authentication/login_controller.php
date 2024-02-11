<?php
include 'user_middleware.php';
include 'user_service.php';

$bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;','root',"");
    session_start();
    if (isset($_POST['send'])) {
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $mdp = sha1($_POST['mdp']);

    //    controller($mail,$mdp,$pseudo);

        $getUser = $bdd->prepare('SELECT * FROM user WHERE pseudo = ?');
        $getUser->execute(array($pseudo));

        if ($getUser->rowCount() > 0) {
            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['mdp'] = $mdp;
            $_SESSION['id'] = $getUser->fetch()['id'];
            header('Location: Home.php');
        } else {
            echo 'bad user';
        }
    }

function controller($mdp, $pseudo): array
{
    $errors = [];

    $middlewares = [
        pseudoIsEmpty($pseudo),
        passwordIsEmpty($mdp),
    ];

    foreach ($middlewares as $result) {
        if ($result !== null) {
            $errors[] = $result;
        }
    }

    return $errors;
}
