<?php
function getDBConnection(): ?PDO
{
    try {
        return new PDO('mysql:host=localhost;dbname=base;charset=utf8;', 'root', "");
    } catch (PDOException $e) {
        echo '<p class="error">"500 Internal Server Error : bad connexion to database"</p>';
        return null;
    }
}

function addUser($mail, $mdp, $pseudo)
{
    $bdd = getDBConnection();
    $insert = $bdd->prepare('INSERT INTO user(mail, passw, pseudo) value (?, ?, ?)');
    $insert->execute(array($mail, $mdp, $pseudo));
    $bdd = null;
}

function deleteUser($id)
{
    $bdd = getDBConnection();
    $deleteUser = $bdd->prepare('DELETE FROM user WHERE id = ?');
    $deleteUser->execute(array($id));
    $bdd = null;
}

function getUser($pseudo, $mdp)
{
    $bdd = getDBConnection();
    $getUser = $bdd->prepare('SELECT * FROM user WHERE pseudo = ? and passw = ?');
    $getUser->execute(array($pseudo, $mdp));
    $bdd = null;
    return $getUser;
}

function getPresets()
{
    $bdd = getDBConnection();
    $getPresets = $bdd->prepare('SELECT * FROM preset where id_user = ? ');
    $getPresets->execute(array($_SESSION['id']));
    $bdd = null;
    return $getPresets;
}

function updatePassword($mail, $mdp, $pseudo) {
    $bdd = getDBConnection();
    $getUser = $bdd->prepare('UPDATE User SET passw = ? WHERE mail = ? and pseudo = ?');
    $getUser->execute(array($mdp, $mail, $pseudo));
    $bdd = null;
}

function check($mail, $pseudo) {
    $bdd = getDBConnection();
    $req = $bdd->prepare('SELECT * FROM user WHERE mail = ? AND pseudo = ?');
    $req->execute(array($mail,$pseudo));
    $result = $req->fetch();

    $bdd = null;
    if((!$result) || ($mail == "") || ($pseudo == "")){
        return null;
    } else {
        return $result;
    }
}
