<?php
$bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;','root',"");
session_start();

if (isset($_SESSION['id'])) {
    $presets = getPresets();
}


if (isset($_POST['send'])) {
   addPreset($_SESSION['id'],$_POST['name']);
   header('Location: home.php');

}

if (isset($_POST['delete'])) {
    deleteUser($_SESSION['id']);
    session_destroy();
    header('Location: login.php');
}


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
    $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;','root',"");
    $deleteUser = $bdd->prepare('DELETE FROM user WHERE id = ?');
    $deleteUser->execute(array($id));
}