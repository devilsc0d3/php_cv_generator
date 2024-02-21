<?php

function getDBConnection(): ?PDO
{
//    todo use this function in all the functions that need a db connection
    try {
        return new PDO('mysql:host=localhost;dbname=base;charset=utf8;', 'root', "");
    } catch (PDOException $e) {
        echo "Erreur PDO: " . $e->getMessage();
        return null;
    }
}

function addPreset($id,$name)
{
    $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;','root',"");
    $addPreset = $bdd->prepare('INSERT INTO preset(id_user,title) VALUES(?, ?)');
    $addPreset->execute(array($id,$name));
}

function deletePresetAndData($id)
{
    $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;', 'root', "");
    $sql = "DELETE preset, hobbies, education, profesional_experience FROM preset LEFT JOIN hobbies ON preset.id = hobbies.id_cv LEFT JOIN education ON preset.id = education.id_cv LEFT JOIN profesional_experience ON preset.id = profesional_experience.id_cv WHERE preset.id = $id";
    return $bdd->query($sql);
}

function deleteAllPresetOfUser($id)
{
    foreach (getPresets($id) as $preset) {
        deletePresetAndData($preset['id']);
    }
}

function getPresets($id)
{
    $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;', 'root', "");
    $getPreset = $bdd->prepare('SELECT * FROM preset WHERE id_user = ?');
    $getPreset->execute(array($id));
    return $getPreset;
}

function deleteUser($id)
{
    global $bdd;
    $deleteUser = $bdd->prepare('DELETE FROM user WHERE id = ?');

    $deleteUser->execute(array($id));
    header('Location: home.php');
}

function getHistory($userId)
{
    $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;','root',"");
    $getHistory = $bdd->prepare('SELECT * FROM history WHERE id_user = ?');
    $getHistory->execute(array($userId));
    return $getHistory;
}

function deleteHistory($id)
{
    $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;','root',"");
    $deleteHistory = $bdd->prepare('DELETE FROM history WHERE id = ?');
    $deleteHistory->execute(array($id));
}