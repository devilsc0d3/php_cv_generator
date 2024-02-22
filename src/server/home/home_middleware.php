<?php

/**
 * Vérifie si une chaîne de caractères est vide ou nulle.
 *
 * @param string $string La chaîne de caractères à vérifier
 * @return bool Vrai si la chaîne est vide ou nulle, sinon faux
 */
function isPresetEmpty($string): bool
{
    if (($string) == "" || ($string) == null) {
        return true;
    }
    return false;
}

/**
 * Vérifie si un titre de préréglage est déjà utilisé par un utilisateur donné.
 *
 * @param string $string Le titre du préréglage à vérifier
 * @param int $id L'identifiant de l'utilisateur
 * @return bool Vrai si le titre est déjà utilisé, sinon faux
 */
function isPresetUsed($string, $id): bool
{
    $bdd = new PDO("mysql:host=localhost;dbname=base", "root", "");
    $req = $bdd->prepare('SELECT * FROM preset where title = ? and id_user = ?');
    $req->execute(array($string, $id));
    if ($req->rowCount() > 0) {
        return true;
    }
    return false;
}

/**
 * Vérifie si les champs de sélection radio sont cochés.
 *
 * @param string $id L'identifiant du préréglage
 * @param string $template Le modèle sélectionné
 * @return bool Vrai si les champs sont cochés, sinon faux
 */
function radioChecked($id, $template): bool
{
    return $id != "" && $template != "";
}