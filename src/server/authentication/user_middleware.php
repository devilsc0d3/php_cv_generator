<?php



function lenMinimum($password)
{
    if (strlen($password) >= 8) {
        return true;
    }
    return "le mot de passe doit contenir au moins 8 caractères";
}

function pseudoIsEmpty($pseudo)
{
    if ($pseudo == "") {
        return "le pseudo est vide";
    }
    return true;
}

function mailIsEmpty($mail)
{
    if ($mail == "") {
        return "le mail de passe est vide";
    }
    return true;
}

function passwordIsEmpty($mdp)
{
    if ($mdp == "" || $mdp == null) {
        return "le mot de passe est vide";
    }
    return true;
}

function emailValid($email)
{
    if (preg_match('/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/im', $email)) {
        return true;
    }
    return "email non valide";
}

function getUserMiddleware($pseudo)
{
    $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;', 'root', "");
    $getUser = $bdd->prepare('SELECT * FROM user WHERE pseudo = ?');
    $getUser->execute(array($pseudo));

    if ($getUser->rowCount() > 0) {
        return "pseudo déjà utilisé";
    }
    return true;
}
