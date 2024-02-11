<?php

function addPreset($id,$name)
{
    $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;','root',"");
    $addPreset = $bdd->prepare('INSERT INTO preset(id_user,title) VALUES(?, ?)');
    $addPreset->execute(array($id,$name));
}

function getPresets()
{
    $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;','root',"");
    $getPresets = $bdd->prepare('SELECT * FROM preset where id_user = ? ');
    $getPresets->execute(array($_SESSION['id']));
    return $getPresets;
}

function deleteUser($id)
{
    global $bdd;
    $deleteUser = $bdd->prepare('DELETE FROM user WHERE id = ?');
    $deleteUser->execute(array($id));
    header('Location: home.php');
}
