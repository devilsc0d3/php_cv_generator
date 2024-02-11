<?php

function isPresetEmpty($string): bool
{
    if (($string) == "" || ($string) == null) {
        return true;
    }
    return false;
}
function isPresetUsed($string,$id): bool
{
    $bdd = new PDO("mysql:host=localhost;dbname=base", "root", "");
    $req = $bdd->prepare('SELECT * FROM preset where title = ? and id_user = ?');
    $req->execute(array($string, $id));
    if ($req->rowCount() > 0) {
        return true;
    }
    return false;
}
