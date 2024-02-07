<?php
include 'login_middleware.php';
include 'login_service.php';


function send() {
    $to = "faureleo123@gmail.com";
    $subject = "My subject";
    $txt = "Hello world!";
    $headers = "From: webmaster@example.com";

    mail($to, $subject, $txt, $headers);
}

$bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;','root',"");
    session_start();
    if (isset($_POST['send'])) {
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $mdp = sha1($_POST['mdp']);
//        send();

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

function controller($mail, $mdp, $pseudo)
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
