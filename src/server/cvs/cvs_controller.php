<?php
session_start();

echo $_SESSION['cv_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    // Condition pour supprimer l'éducation
    foreach ($_POST as $key => $value) {

        if (strpos($key, 'delete_education_') === 0) {
            $education_id = substr($key, 17);
            deleteEducation($education_id);
            header('Location: newCV.php');

        }
    }

    // Parcourir les paramètres POST pour trouver le bouton de suppression approprié
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'delete_experience_') === 0) {
            $hobby_id = substr($key, 18);
            deleteHobbies($hobby_id);
            header('Location: newCV.php');
        }
    }
}


$hobb = getHobbies($_SESSION['cv_id']);
$education = getEducation($_SESSION['cv_id']);

if (isset($_POST['addHobbies'])) {
    addHobbies($_POST['hobbies'], $_SESSION['cv_id']);
    header('Location: newCV.php');
}

if (isset($_POST['add_education'])) {
    addEducation($_POST['education'], $_POST['desc'], $_POST['begin_date'], $_POST['end_date'], $_SESSION['cv_id']);
    header('Location: newCV.php');
}

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