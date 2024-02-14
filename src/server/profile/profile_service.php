<?php

function getInfoUser($id)
{
    $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;', 'root', "");
    $req = $bdd->prepare('SELECT * FROM user WHERE id = ?');
    $req->execute(array($id));
    return $req->fetch();
}

function getHobbies($id)
{
    $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;', 'root', "");
    $req = $bdd->prepare('SELECT * FROM hobbies where id_cv = ?');
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

function deleteExperience($id)
{
    $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;', 'root', "");
    $req = $bdd->prepare('DELETE FROM profesional_experience WHERE id = ?');
    $req->execute(array($id));
}

function editExperienceTitle($id, $title)
{
    $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;', 'root', "");
    $req = $bdd->prepare('UPDATE profesional_experience SET title = ? WHERE id = ?');
    $req->execute(array($title, $id));
}

function addProfessional($id, $title, $company, $description, $begin_date, $end_date)
{
    $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;', 'root', "");
    $req = $bdd->prepare('INSERT INTO profesional_experience(id_cv, title, entreprise, description, begin, end) VALUES(?, ?, ?, ?, ?, ?)');
    $req->execute(array($id, $title, $company, $description, $begin_date, $end_date));

}

function getProfessionals($id)
{
    $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;', 'root', "");
    $req = $bdd->prepare('SELECT * FROM profesional_experience where id_cv = ?');
    $req->execute(array($id));
    return $req->fetchAll();
}

function editExperienceEntreprise($id, $company)
{
    $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;', 'root', "");
    $req = $bdd->prepare('UPDATE profesional_experience SET entreprise = ? WHERE id = ?');
    $req->execute(array($company, $id));
}

function editExperienceDescription($id, $description)
{
    $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;', 'root', "");
    $req = $bdd->prepare('UPDATE profesional_experience SET description = ? WHERE id = ?');
    $req->execute(array($description, $id));
}

function editExperienceBegin($id, $begin)
{
    $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;', 'root', "");
    $req = $bdd->prepare('UPDATE profesional_experience SET begin = ? WHERE id = ?');
    $req->execute(array($begin, $id));
}

function editExperienceEnd($id, $end)
{
    $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;', 'root', "");
    $req = $bdd->prepare('UPDATE profesional_experience SET end = ? WHERE id = ?');
    $req->execute(array($end, $id));
}

function editEducation($id, $education)
{
    $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;', 'root', "");
    $req = $bdd->prepare('UPDATE education SET name = ? WHERE id = ?');
    $req->execute(array($education, $id));
}

function editEducationDesc($id, $education)
{
    $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;', 'root', "");
    $req = $bdd->prepare('UPDATE education SET description = ? WHERE id = ?');
    $req->execute(array($education, $id));
}

function editEducationBegin($id, $begin)
{
    $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;', 'root', "");
    $req = $bdd->prepare('UPDATE education SET begin = ? WHERE id = ?');
    $req->execute(array($begin, $id));
}

function editEducationEnd($id, $end)
{
    $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;', 'root', "");
    $req = $bdd->prepare('UPDATE education SET end = ? WHERE id = ?');
    $req->execute(array($end, $id));
}

//general
function updateName($name, $id)
{
    $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;', 'root', "");
    $req = $bdd->prepare('UPDATE user SET name = ? WHERE id = ?');
    $req->execute(array($name, $id));
}
function updateLastFirst($lastname, $id)
{
    $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;', 'root', "");
    $req = $bdd->prepare('UPDATE user SET firstname = ? WHERE id = ?');
    $req->execute(array($lastname, $id));
}

function updateAddress($address, $id)
{
    $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;', 'root', "");
    $req = $bdd->prepare('UPDATE user SET address = ? WHERE id = ?');
    $req->execute(array($address, $id));
}

function updatePhone($phone, $id)
{
    $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;', 'root', "");
    $req = $bdd->prepare('UPDATE user SET phone = ? WHERE id = ?');
    $req->execute(array($phone, $id));
}

function getPhoto()
{
    $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;', 'root', "");
    $req = $bdd->prepare('SELECT photo FROM user WHERE id = ?');
    $req->execute(array($_SESSION['id']));
    $res = $req->fetch();
    if ($res && $res["photo"]) {
        echo "<img class='photo' src='../../uploads/imgs/" . $res["photo"] . "' alt='User Photo'>";
    }
}

function updateEmail($email, $id)
{
    $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;', 'root', "");
    $req = $bdd->prepare('UPDATE user SET email = ? WHERE id = ?');
    $req->execute(array($email, $id));
}

function updateBirth($birth, $id)
{
    $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;', 'root', "");
    $req = $bdd->prepare('UPDATE user SET birth = ? WHERE id = ?');
    $req->execute(array($birth, $id));
}

function updateLicenseB($license, $id)
{
    $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;', 'root', "");
    $req = $bdd->prepare('UPDATE user SET permisB = ? WHERE id = ?');
    $req->execute(array($license, $id));
}

function updatePhoto($photo,$id)
{
    $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;', 'root', "");
    $req = $bdd->prepare('UPDATE user SET photo = ? WHERE id = ?');
    $req->execute(array($photo, $id));
}

function deletePhoto($id) {
    $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;', 'root', "");
    $req = $bdd->prepare('UPDATE user SET photo = ? WHERE id = ?');
    $req->execute(array('', $id));
}

