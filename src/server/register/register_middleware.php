<?php

function isLowercaseAndUppercaseDigit($string)
{
    if (preg_match('/[a-z]/', $string) &&
        preg_match('/[A-Z]/', $string) &&
        preg_match('/\d/', $string)) {
        return true;
    }
    return "le mot de passe doit contenir : minuscule / majuscule / chiffre";
}

function lenMinimum($password)
{
    if (strlen($password) >= 8) {
        return true;
    }
    return "le mot de passe doit contenir au moins 8 caractères";
}

function isSpecialCharacter($string)
{
    if (strlen($string) >= 8) {
        return true;
    }
    return false;
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
    if ($mdp == "") {
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
