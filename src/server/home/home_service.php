<?php

/**
 * Établit une connexion à la base de données MySQL.
 *
 * @return PDO|null L'objet PDO représentant la connexion à la base de données, ou null en cas d'erreur de connexion
 */
function getDBConnection(): ?PDO
{
    try {
        return new PDO('mysql:host=localhost;dbname=base;charset=utf8;', 'root', "");
    } catch (PDOException $e) {
        echo '<p class="error">"500 Internal Server Error : bad connexion to database"</p>';
        return null;
    }
}

/**
 * Ajoute un préréglage pour un utilisateur donné.
 *
 * @param int $id L'identifiant de l'utilisateur
 * @param string $name Le nom du préréglage à ajouter
 */
function addPreset($id, $name)
{
    $bdd = getDBConnection();
    $addPreset = $bdd->prepare('INSERT INTO preset(id_user,title) VALUES(?, ?)');
    $addPreset->execute(array($id, $name));
    $bdd = null;
}

/**
 * Supprime un préréglage et toutes les données associées.
 *
 * @param int $id L'identifiant du préréglage à supprimer
 * @return mixed Le résultat de la requête DELETE
 */
function deletePresetAndData($id)
{
    $bdd = getDBConnection();
    $sql = "DELETE preset, hobbies, education, profesional_experience FROM preset LEFT JOIN hobbies ON preset.id = hobbies.id_cv LEFT JOIN education ON preset.id = education.id_cv LEFT JOIN profesional_experience ON preset.id = profesional_experience.id_cv WHERE preset.id = $id";
    $result = $bdd->query($sql);
    $bdd = null;
    return $result;
}

/**
 * Supprime tous les préréglages d'un utilisateur donné.
 *
 * @param int $id L'identifiant de l'utilisateur
 */
function deleteAllPresetOfUser($id)
{
    foreach (getPresets($id) as $preset) {
        deletePresetAndData($preset['id']);
    }
}

/**
 * Récupère tous les préréglages d'un utilisateur donné.
 *
 * @param int $id L'identifiant de l'utilisateur
 * @return array Les préréglages de l'utilisateur
 */
function getPresets($id)
{
    $bdd = getDBConnection();
    $getPreset = $bdd->prepare('SELECT * FROM preset WHERE id_user = ?');
    $getPreset->execute(array($id));
    $result = $getPreset->fetchAll();
    $bdd = null;
    return $result;
}

/**
 * Supprime un utilisateur de la base de données.
 *
 * @param int $id L'identifiant de l'utilisateur à supprimer
 */
function deleteUser($id)
{
    $bdd = getDBConnection();
    $deleteUser = $bdd->prepare('DELETE FROM user WHERE id = ?');
    $deleteUser->execute(array($id));
    $bdd = null;
    header('Location: home.php');
}

/**
 * Récupère l'historique des PDF générés par un utilisateur donné.
 *
 * @param int $userId L'identifiant de l'utilisateur
 * @return array L'historique des PDF générés par l'utilisateur
 */
function getHistory($userId)
{
    $bdd = getDBConnection();
    $getHistory = $bdd->prepare('SELECT * FROM history WHERE id_user = ?');
    $getHistory->execute(array($userId));
    $result = $getHistory->fetchAll();
    $bdd = null;
    return $result;
}

/**
 * Ajoute une entrée dans l'historique des CV générés.
 * @param int $userId L'identifiant de l'utilisateur.
 * @param string $pdfFileName Le nom du fichier PDF généré.
 */
function addHistory($userId, $pdfFileName)
{
    global $bdd;
    $addHistory = $bdd->prepare('INSERT INTO history (id_user, cv) VALUES (?, ?)');
    $addHistory->execute(array($userId, $pdfFileName));
}

/**
 * Supprime une entrée de l'historique des CV générés.
 * @param int $id L'identifiant de l'entrée dans l'historique.
 */
function deleteHistory($id)
{
    global $bdd;
    $deleteHistory = $bdd->prepare('DELETE FROM history WHERE id = ?');
    $deleteHistory->execute(array($id));
}

/**
 * Récupère les informations d'une entrée de l'historique par son identifiant.
 * @param int $id L'identifiant de l'entrée dans l'historique.
 * @return mixed Les informations de l'entrée de l'historique.
 */
function getHistoryId($id)
{
    global $bdd;
    $getHistory = $bdd->prepare('SELECT * FROM history WHERE id = ?');
    $getHistory->execute(array($id));
    return $getHistory->fetch();
}
