<?php

function addUser($mail, $mdp, $pseudo)
{
    global $bdd;
    $insert = $bdd->prepare('INSERT INTO user(mail, passw, pseudo) value (?, ?, ?)');
    $insert->execute(array($mail, $mdp, $pseudo));
}

function deleteUser($id)
{
    global $bdd;
    $deleteUser = $bdd->prepare('DELETE FROM user WHERE id = ?');
    $deleteUser->execute(array($id));
    header('Location: home.php');
}

function UpdateUser($id)
{

}

function getName()
{

}

?>