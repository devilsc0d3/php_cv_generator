<?php

function getDBConnection(): ?PDO
{
    try {
        return new PDO('mysql:host=localhost;dbname=base;charset=utf8;', 'root', "");
    } catch (PDOException $e) {
        echo '<p class="error">"500 Internal Server Error : bad connexion to database"</p>';
        return null;
    }
}

function addPreset($id,$name)
{
    $bdd = getDBConnection();
    $addPreset = $bdd->prepare('INSERT INTO preset(id_user,title) VALUES(?, ?)');
    $addPreset->execute(array($id,$name));
    $bdd = null;
}

function deletePresetAndData($id)
{
    $bdd = getDBConnection();
    $sql = "DELETE preset, hobbies, education, profesional_experience FROM preset LEFT JOIN hobbies ON preset.id = hobbies.id_cv LEFT JOIN education ON preset.id = education.id_cv LEFT JOIN profesional_experience ON preset.id = profesional_experience.id_cv WHERE preset.id = $id";
    $result = $bdd->query($sql);
    $bdd = null;
    return $result;
}


function deleteAllPresetOfUser($id)
{
    foreach (getPresets($id) as $preset) {
        deletePresetAndData($preset['id']);
    }
}

function getPresets($id)
{
    $bdd = getDBConnection();
    $getPreset = $bdd->prepare('SELECT * FROM preset WHERE id_user = ?');
    $getPreset->execute(array($id));
    $result = $getPreset->fetchAll();
    $bdd = null; // Fermer la connexion à la base de données
    return $result;
}

function deleteUser($id)
{
    $bdd = getDBConnection();
    $deleteUser = $bdd->prepare('DELETE FROM user WHERE id = ?');
    $deleteUser->execute(array($id));
    $bdd = null; // Fermer la connexion à la base de données
    header('Location: home.php');
}

function getHistory($userId)
{
    $bdd = getDBConnection();
    $getHistory = $bdd->prepare('SELECT * FROM history WHERE id_user = ?');
    $getHistory->execute(array($userId));
    $result = $getHistory->fetchAll();
    $bdd = null; // Fermer la connexion à la base de données
    return $result;
}

function deleteHistory($id)
{
    $bdd = getDBConnection();
    $deleteHistory = $bdd->prepare('DELETE FROM history WHERE id = ?');
    $deleteHistory->execute(array($id));
    $bdd = null; // Fermer la connexion à la base de données
}
