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
 * Ajoute un utilisateur à la base de données.
 *
 * @param string $mail L'adresse email de l'utilisateur
 * @param string $mdp Le mot de passe de l'utilisateur
 * @param string $pseudo Le pseudo de l'utilisateur
 */
function addUser($mail, $mdp, $pseudo)
{
    $bdd = getDBConnection();
    $insert = $bdd->prepare('INSERT INTO user(mail, passw, pseudo) value (?, ?, ?)');
    $insert->execute(array($mail, $mdp, $pseudo));
    $bdd = null; // Fermer la connexion à la base de données
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
    $bdd = null; // Fermer la connexion à la base de données
}

/**
 * Récupère un utilisateur à partir de son pseudo et mot de passe.
 *
 * @param string $pseudo Le pseudo de l'utilisateur
 * @param string $mdp Le mot de passe de l'utilisateur
 * @return PDOStatement|false L'objet PDOStatement représentant le résultat de la requête, ou false en cas d'erreur
 */
function getUser($pseudo, $mdp)
{
    $bdd = getDBConnection();
    $getUser = $bdd->prepare('SELECT * FROM user WHERE pseudo = ? and passw = ?');
    $getUser->execute(array($pseudo, $mdp));
    $bdd = null; // Fermer la connexion à la base de données
    return $getUser;
}

/**
 * Récupère tous les préréglages d'un utilisateur donné.
 *
 * @return PDOStatement|false L'objet PDOStatement représentant le résultat de la requête, ou false en cas d'erreur
 */
function getPresets()
{
    $bdd = getDBConnection();
    $getPresets = $bdd->prepare('SELECT * FROM preset where id_user = ? ');
    $getPresets->execute(array($_SESSION['id']));
    $bdd = null; // Fermer la connexion à la base de données
    return $getPresets;
}

/**
 * Met à jour le mot de passe d'un utilisateur.
 *
 * @param string $mail L'adresse email de l'utilisateur
 * @param string $mdp Le nouveau mot de passe de l'utilisateur
 * @param string $pseudo Le pseudo de l'utilisateur
 */
function updatePassword($mail, $mdp, $pseudo)
{
    $bdd = getDBConnection();
    $getUser = $bdd->prepare('UPDATE User SET passw = ? WHERE mail = ? and pseudo = ?');
    $getUser->execute(array($mdp, $mail, $pseudo));
    $bdd = null; // Fermer la connexion à la base de données
}

/**
 * Vérifie si l'utilisateur avec l'adresse email et le pseudo donnés existe dans la base de données.
 *
 * @param string $mail L'adresse email de l'utilisateur
 * @param string $pseudo Le pseudo de l'utilisateur
 * @return mixed|null Le résultat de la requête si l'utilisateur existe, sinon null
 */
function check($mail, $pseudo)
{
    $bdd = getDBConnection();
    $req = $bdd->prepare('SELECT * FROM user WHERE mail = ? AND pseudo = ?');
    $req->execute(array($mail, $pseudo));
    $result = $req->fetch();
    $bdd = null; // Fermer la connexion à la base de données

    if ((!$result) || ($mail == "") || ($pseudo == "")) {
        return null;
    } else {
        return $result;
    }
}

?>
