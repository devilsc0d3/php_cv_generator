<?php

/**
 * Vérifie si la longueur du mot de passe est d'au moins 8 caractères.
 *
 * @param string $password Le mot de passe à vérifier
 * @return bool|string Retourne true si la longueur est suffisante, sinon un message d'erreur
 */
function lenMinimum($password)
{
    if (strlen($password) >= 8) {
        return true;
    }
    return "le mot de passe doit contenir au moins 8 caractères";
}

/**
 * Vérifie si le pseudo est vide.
 *
 * @param string $pseudo Le pseudo à vérifier
 * @return bool|string Retourne true si le pseudo n'est pas vide, sinon un message d'erreur
 */
function pseudoIsEmpty($pseudo)
{
    if ($pseudo == "") {
        return "le pseudo est vide";
    }
    return true;
}

/**
 * Vérifie si l'adresse email est vide.
 *
 * @param string $mail L'adresse email à vérifier
 * @return bool|string Retourne true si l'adresse email n'est pas vide, sinon un message d'erreur
 */
function mailIsEmpty($mail)
{
    if ($mail == "") {
        return "le mail de passe est vide";
    }
    return true;
}

/**
 * Vérifie si le mot de passe est vide.
 *
 * @param string|null $mdp Le mot de passe à vérifier
 * @return bool|string Retourne true si le mot de passe n'est pas vide, sinon un message d'erreur
 */
function passwordIsEmpty($mdp)
{
    if ($mdp == "" || $mdp == null) {
        return "le mot de passe est vide";
    }
    return true;
}

/**
 * Vérifie si l'adresse email est valide.
 *
 * @param string $email L'adresse email à vérifier
 * @return bool|string Retourne true si l'adresse email est valide, sinon un message d'erreur
 */
function emailValid($email)
{
    if (preg_match('/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/im', $email)) {
        return true;
    }
    return "email non valide";
}

/**
 * Vérifie si le pseudo de l'utilisateur est déjà utilisé.
 *
 * @param string $pseudo Le pseudo à vérifier
 * @return bool|string Retourne true si le pseudo n'est pas déjà utilisé, sinon un message d'erreur
 */
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
