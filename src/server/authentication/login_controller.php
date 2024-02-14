<?php
include 'user_middleware.php';
include 'user_service.php';

$bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;','root',"");
session_start();
if (isset($_POST['send'])) {
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mdp = sha1($_POST['mdp']);
    controller($mdp,$pseudo);

    $getUser = $bdd->prepare('SELECT * FROM user WHERE pseudo = ? and passw = ?');
    $getUser->execute(array($pseudo, $mdp));

    if ($getUser->rowCount() > 0) {
        $user = $getUser->fetch();
        $_SESSION['pseudo'] = $pseudo;
        $_SESSION['mdp'] = $mdp;
        $_SESSION['id'] = $user['id'];

        $_SESSION['role'] = $user['role'];

        header('Location: Home.php');
    } else {
        echo "<p class='error'>bad user or password</p>";
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
