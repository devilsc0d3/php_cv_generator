<?php

function addRoleAdmin($id)
{
    $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;','root',"");
    $addRole = $bdd->prepare('UPDATE user SET role = "1" WHERE id = ?');
    $addRole->execute(array($id));
}

function getCountAccount()
{
    $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;','root',"");
    $req = $bdd->prepare('SELECT COUNT(*) FROM user');
    $req->execute();
    return $req->fetch();
}

function getCountAdmin()
{
    $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;','root',"");
    $req = $bdd->prepare('SELECT COUNT(*) FROM user where role = "1"');
    $req->execute();
    return $req->fetch();
}

function search()
{
    $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;','root',"");
    $req = $bdd->prepare('SELECT * FROM user where pseudo = ?');
    $req->execute(array($_POST['user']));
    return $req->fetch();
}