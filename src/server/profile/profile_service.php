<?php

/**
 * Retourne une connexion à la base de données.
 *
 * @return PDO|null Objet PDO représentant la connexion à la base de données, ou null en cas d'erreur.
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
 * Récupère les informations de l'utilisateur à partir de son identifiant.
 *
 * @param int $id L'identifiant de l'utilisateur
 * @return array Les informations de l'utilisateur
 */
function getInfoUser($id)
{
    $bdd = getDBConnection();
    $req = $bdd->prepare('SELECT * FROM user WHERE id = ?');
    $req->execute(array($id));
    $result = $req->fetch();
    $bdd = null;
    return $result;
}

/**
 * Récupère les hobbies d'un utilisateur à partir de son identifiant de CV.
 *
 * @param int $id L'identifiant du CV de l'utilisateur
 * @return array Les hobbies de l'utilisateur
 */
function getHobbies($id)
{
    $bdd = getDBConnection();
    $req = $bdd->prepare('SELECT * FROM hobbies where id_cv = ?');
    $req->execute(array($id));
    $result = $req->fetchAll();
    $bdd = null;
    return $result;
}

/**
 * Supprime un hobby à partir de son identifiant.
 *
 * @param int $id L'identifiant du hobby à supprimer
 */
function deleteHobbies($id)
{
    $bdd = getDBConnection();
    $req = $bdd->prepare('DELETE FROM hobbies where id = ?');
    $req->execute(array($id));
    $bdd = null;
}

/**
 * Ajoute un nouveau hobby pour un utilisateur.
 *
 * @param string $msg Le hobby à ajouter
 * @param int $id L'identifiant du CV de l'utilisateur
 */
function addHobbies($msg, $id)
{
    $bdd = getDBConnection();
    $req = $bdd->prepare('INSERT INTO hobbies(description, id_cv) VALUES(?, ?)');
    $req->execute(array($msg, $id));
    $bdd = null;
}

/**
 * Modifie un hobby existant.
 *
 * @param int $id L'identifiant du hobby à modifier
 * @param string $msg Le nouveau message du hobby
 */
function editHobbies($id, $msg)
{
    $bdd = getDBConnection();
    $req = $bdd->prepare('UPDATE hobbies SET description = ? WHERE id = ?');
    $req->execute(array($msg, $id));
    $bdd = null;
}

/**
 * Supprime une éducation à partir de son identifiant.
 *
 * @param int $id L'identifiant de l'éducation à supprimer
 */
function deleteEducation($id)
{
    $bdd = getDBConnection();
    $req = $bdd->prepare('DELETE FROM education where id = ?');
    $req->execute(array($id));
    $bdd = null;
}

/**
 * Récupère l'éducation d'un utilisateur à partir de son identifiant de CV.
 *
 * @param int $id L'identifiant du CV de l'utilisateur
 * @return array L'éducation de l'utilisateur
 */
function getEducation($id)
{
    $bdd = getDBConnection();
    $req = $bdd->prepare('SELECT * FROM education where id_cv = ?');
    $req->execute(array($id));
    $result = $req->fetchAll();
    $bdd = null;
    return $result;
}

/**
 * Ajoute une nouvelle éducation pour un utilisateur.
 *
 * @param string $name Le nom de l'éducation
 * @param string $desc La description de l'éducation
 * @param string $begin_date La date de début de l'éducation
 * @param string $end_date La date de fin de l'éducation
 * @param int $id L'identifiant du CV de l'utilisateur
 */
function addEducation($name, $desc, $begin_date, $end_date, $id)
{
    $bdd = getDBConnection();
    $req = $bdd->prepare('INSERT INTO education(id_cv,name, description, begin, end) VALUES(?, ?, ?, ?, ?)');
    $req->execute(array($id, $name, $desc, $begin_date, $end_date));
    $bdd = null;
}

/**
 * Supprime une expérience professionnelle à partir de son identifiant.
 *
 * @param int $id L'identifiant de l'expérience professionnelle à supprimer
 */
function deleteExperience($id)
{
    $bdd = getDBConnection();
    $req = $bdd->prepare('DELETE FROM profesional_experience WHERE id = ?');
    $req->execute(array($id));
    $bdd = null;
}

/**
 * Modifie le titre d'une expérience professionnelle.
 *
 * @param int $id L'identifiant de l'expérience professionnelle à modifier
 * @param string $title Le nouveau titre de l'expérience professionnelle
 */
function editExperienceTitle($id, $title)
{
    $bdd = getDBConnection();
    $req = $bdd->prepare('UPDATE profesional_experience SET title = ? WHERE id = ?');
    $req->execute(array($title, $id));
    $bdd = null;
}

/**
 * Ajoute une nouvelle expérience professionnelle pour un utilisateur.
 *
 * @param int $id L'identifiant du CV de l'utilisateur
 * @param string $title Le titre de l'expérience professionnelle
 * @param string $company L'entreprise de l'expérience professionnelle
 * @param string $description La description de l'expérience professionnelle
 * @param string $begin_date La date de début de l'expérience professionnelle
 * @param string $end_date La date de fin de l'expérience professionnelle
 */
function addProfessional($id, $title, $company, $description, $begin_date, $end_date)
{
    $bdd = getDBConnection();
    $req = $bdd->prepare('INSERT INTO profesional_experience(id_cv, title, entreprise, description, begin, end) VALUES(?, ?, ?, ?, ?, ?)');
    $req->execute(array($id, $title, $company, $description, $begin_date, $end_date));
    $bdd = null;
}

/**
 * Récupère les expériences professionnelles d'un utilisateur à partir de son identifiant de CV.
 *
 * @param int $id L'identifiant du CV de l'utilisateur
 * @return array Les expériences professionnelles de l'utilisateur
 */
function getProfessionals($id)
{
    $bdd = getDBConnection();
    $req = $bdd->prepare('SELECT * FROM profesional_experience where id_cv = ?');
    $req->execute(array($id));
    $result = $req->fetchAll();
    $bdd = null;
    return $result;
}

/**
 * Modifie l'entreprise d'une expérience professionnelle.
 *
 * @param int $id L'identifiant de l'expérience professionnelle à modifier
 * @param string $company La nouvelle entreprise de l'expérience professionnelle
 */
function editExperienceEntreprise($id, $company)
{
    $bdd = getDBConnection();
    $req = $bdd->prepare('UPDATE profesional_experience SET entreprise = ? WHERE id = ?');
    $req->execute(array($company, $id));
    $bdd = null;
}

/**
 * Modifie la description d'une expérience professionnelle.
 *
 * @param int $id L'identifiant de l'expérience professionnelle à modifier
 * @param string $description La nouvelle description de l'expérience professionnelle
 */
function editExperienceDescription($id, $description)
{
    $bdd = getDBConnection();
    $req = $bdd->prepare('UPDATE profesional_experience SET description = ? WHERE id = ?');
    $req->execute(array($description, $id));
    $bdd = null;
}

/**
 * Modifie la date de début d'une expérience professionnelle.
 *
 * @param int $id L'identifiant de l'expérience professionnelle à modifier
 * @param string $begin La nouvelle date de début de l'expérience professionnelle
 */
function editExperienceBegin($id, $begin)
{
    $bdd = getDBConnection();
    $req = $bdd->prepare('UPDATE profesional_experience SET begin = ? WHERE id = ?');
    $req->execute(array($begin, $id));
    $bdd = null;
}

/**
 * Modifie la date de fin d'une expérience professionnelle.
 *
 * @param int $id L'identifiant de l'expérience professionnelle à modifier
 * @param string $end La nouvelle date de fin de l'expérience professionnelle
 */
function editExperienceEnd($id, $end)
{
    $bdd = getDBConnection();
    $req = $bdd->prepare('UPDATE profesional_experience SET end = ? WHERE id = ?');
    $req->execute(array($end, $id));
    $bdd = null;
}

/**
 * Modifie le nom d'une éducation.
 *
 * @param int $id L'identifiant de l'éducation à modifier
 * @param string $education Le nouveau nom de l'éducation
 */
function editEducation($id, $education)
{
    $bdd = getDBConnection();
    $req = $bdd->prepare('UPDATE education SET name = ? WHERE id = ?');
    $req->execute(array($education, $id));
    $bdd = null;
}

/**
 * Modifie la description d'une éducation.
 *
 * @param int $id L'identifiant de l'éducation à modifier
 * @param string $education La nouvelle description de l'éducation
 */
function editEducationDesc($id, $education)
{
    $bdd = getDBConnection();
    $req = $bdd->prepare('UPDATE education SET description = ? WHERE id = ?');
    $req->execute(array($education, $id));
    $bdd = null;
}

/**
 * Modifie la date de début d'une éducation.
 *
 * @param int $id L'identifiant de l'éducation à modifier
 * @param string $begin La nouvelle date de début de l'éducation
 */
function editEducationBegin($id, $begin)
{
    $bdd = getDBConnection();
    $req = $bdd->prepare('UPDATE education SET begin = ? WHERE id = ?');
    $req->execute(array($begin, $id));
    $bdd = null;
}

/**
 * Modifie la date de fin d'une éducation.
 *
 * @param int $id L'identifiant de l'éducation à modifier
 * @param string $end La nouvelle date de fin de l'éducation
 */
function editEducationEnd($id, $end)
{
    $bdd = getDBConnection();
    $req = $bdd->prepare('UPDATE education SET end = ? WHERE id = ?');
    $req->execute(array($end, $id));
    $bdd = null;
}

/**
 * Modifie le nom de l'utilisateur.
 *
 * @param string $name Le nouveau nom de l'utilisateur
 * @param int $id L'identifiant de l'utilisateur
 */
function updateName($name, $id)
{
    $bdd = getDBConnection();
    $req = $bdd->prepare('UPDATE user SET name = ? WHERE id = ?');
    $req->execute(array($name, $id));
    $bdd = null;
}

/**
 * Modifie le prénom de l'utilisateur.
 *
 * @param string $lastname Le nouveau prénom de l'utilisateur
 * @param int $id L'identifiant de l'utilisateur
 */
function updateLastFirst($lastname, $id)
{
    $bdd = getDBConnection();
    $req = $bdd->prepare('UPDATE user SET firstname = ? WHERE id = ?');
    $req->execute(array($lastname, $id));
    $bdd = null;
}

/**
 * Modifie l'adresse de l'utilisateur.
 *
 * @param string $address La nouvelle adresse de l'utilisateur
 * @param int $id L'identifiant de l'utilisateur
 */
function updateAddress($address, $id)
{
    $bdd = getDBConnection();
    $req = $bdd->prepare('UPDATE user SET address = ? WHERE id = ?');
    $req->execute(array($address, $id));
    $bdd = null;
}

/**
 * Modifie le numéro de téléphone de l'utilisateur.
 *
 * @param string $phone Le nouveau numéro de téléphone de l'utilisateur
 * @param int $id L'identifiant de l'utilisateur
 */
function updatePhone($phone, $id)
{
    $bdd = getDBConnection();
    $req = $bdd->prepare('UPDATE user SET phone = ? WHERE id = ?');
    $req->execute(array($phone, $id));
    $bdd = null;
}

/**
 * Récupère la photo de l'utilisateur à partir de son identifiant.
 *
 * @param int $id L'identifiant de l'utilisateur
 */
function getPhoto($id)
{
    $bdd = getDBConnection();
    $req = $bdd->prepare('SELECT photo FROM user WHERE id = ?');
    $req->execute(array($id));
    $res = $req->fetch();
    if ($res && $res["photo"]) {
        echo "<img class='photo' src='../../uploads/imgs/" . $res["photo"] . "' alt='User Photo'>";
    }
    $bdd = null;
}

/**
 * Modifie l'adresse e-mail de l'utilisateur.
 *
 * @param string $email La nouvelle adresse e-mail de l'utilisateur
 * @param int $id L'identifiant de l'utilisateur
 */
function updateEmail($email, $id)
{
    $bdd = getDBConnection();
    $req = $bdd->prepare('UPDATE user SET email = ? WHERE id = ?');
    $req->execute(array($email, $id));
    $bdd = null;
}

/**
 * Modifie la date de naissance de l'utilisateur.
 *
 * @param string $birth La nouvelle date de naissance de l'utilisateur
 * @param int $id L'identifiant de l'utilisateur
 */
function updateBirth($birth, $id)
{
    $bdd = getDBConnection();
    $req = $bdd->prepare('UPDATE user SET birth = ? WHERE id = ?');
    $req->execute(array($birth, $id));
    $bdd = null;
}

/**
 * Modifie le permis de conduire de l'utilisateur.
 *
 * @param string $license Le nouveau permis de conduire de l'utilisateur
 * @param int $id L'identifiant de l'utilisateur
 */
function updateLicenseB($license, $id)
{
    $bdd = getDBConnection();
    $req = $bdd->prepare('UPDATE user SET permisB = ? WHERE id = ?');
    $req->execute(array($license, $id));
    $bdd = null;
}

/**
 * Met à jour la photo de l'utilisateur.
 *
 * @param string $photo Le nom de la nouvelle photo
 * @param int $id L'identifiant de l'utilisateur
 */
function updatePhoto($photo,$id)
{
    $bdd = getDBConnection();
    $req = $bdd->prepare('UPDATE user SET photo = ? WHERE id = ?');
    $req->execute(array($photo, $id));
    $bdd = null;
}

/**
 * Supprime la photo de l'utilisateur.
 *
 * @param int $id L'identifiant de l'utilisateur
 */
function deletePhoto($id) {
    $bdd = getDBConnection();
    $req = $bdd->prepare('UPDATE user SET photo = ? WHERE id = ?');
    $req->execute(array('', $id));
    $bdd = null;
}