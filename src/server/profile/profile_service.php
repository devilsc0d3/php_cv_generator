<?php


function getHobbies($id)
{
    $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;', 'root', "");
    $req = $bdd->prepare('SELECT * FROM hobbies where id_cv = ?');
    $req->execute(array($id));
    return $req;
}

function getExperiece($id)
{
    $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;', 'root', "");
    $req = $bdd->prepare('SELECT * FROM profesional_experience where id = ?');
    $req->execute(array($id));
    return $req;
}

function deleteHobbies($id)
{
    $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;', 'root', "");
    $req = $bdd->prepare('DELETE FROM hobbies where id = ?');
    $req->execute(array($id));
}

function addHobbies($msg, $id)
{
    $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;', 'root', "");
    $req = $bdd->prepare('INSERT INTO hobbies(description, id_cv) VALUES(?, ?)');
    $req->execute(array($msg, $id));
}

function editHobbies($id, $msg)
{
    $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;', 'root', "");
    $req = $bdd->prepare('UPDATE hobbies SET description = ? WHERE id = ?');
    $req->execute(array($msg, $id));
}

function deleteEducation($id)
{
    $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;', 'root', "");
    $req = $bdd->prepare('DELETE FROM education where id = ?');
    $req->execute(array($id));
}


function getEducation($id)
{
    $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;', 'root', "");
    $req = $bdd->prepare('SELECT * FROM education where id_cv = ?');
    $req->execute(array($id));
    return $req;
}

function addEducation($name, $desc, $begin_date, $end_date, $id)
{
    $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;', 'root', "");
    $req = $bdd->prepare('INSERT INTO education(id_cv,name, description, begin, end) VALUES(?, ?, ?, ?, ?)');
    $req->execute(array($id,$name, $desc, $begin_date, $end_date));
}