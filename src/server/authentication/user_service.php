<?php

function addUser($mail, $mdp, $pseudo)
{
    global $bdd;
    $insert = $bdd->prepare('INSERT INTO user(mail, passw, pseudo) value (?, ?, ?)');
    $insert->execute(array($mail, $mdp, $pseudo));
}

function deleteUser($id)
{
    $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;','root',"");
    $deleteUser = $bdd->prepare('DELETE FROM user WHERE id = ?');
    $deleteUser->execute(array($id));
    header('Location: home.php');
}

function addRoleAdmin($id)
{
    $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;','root',"");
    $addRole = $bdd->prepare('UPDATE user SET role = "1" WHERE id = ?');
    $addRole->execute(array($id));
}

function getPresets()
{
    $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;','root',"");
    $getPresets = $bdd->prepare('SELECT * FROM preset where id_user = ? ');
    $getPresets->execute(array($_SESSION['id']));
    return $getPresets;
}

function updatePassword($mail, $mdp, $pseudo) {
    $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;','root',"");
    $getUser = $bdd->prepare('UPDATE User SET passw = ? WHERE mail = ? and pseudo = ?');
    $getUser->execute(array($mdp, $mail, $pseudo));
}

function check($mail, $pseudo) {
    $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;','root',"");
    $req = $bdd->prepare('SELECT * FROM user WHERE mail = ? AND pseudo = ?');
    $req->execute(array($mail,$pseudo));
    $result = $req->fetch();

    if((!$result) || ($mail == "") || ($pseudo == "")){
        return null;
    } else {
        return $result;
    }
}