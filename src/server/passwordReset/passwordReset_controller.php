<?php

if (isset($_POST['send'])) {
    $mail = $_POST['mail'];
    $pseudo = $_POST['pseudo'];
    $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;','root',"");
    $req = $bdd->prepare('SELECT * FROM user WHERE mail = ? AND pseudo = ?');
    $req->execute(array($mail,$pseudo));
    $user = $req->fetch();

    header('Location: home.php');
}