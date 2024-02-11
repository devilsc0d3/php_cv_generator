<?php
include 'profile_service.php';

session_start();

echo $_SESSION['cv_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    // Condition pour supprimer l'éducation
    foreach ($_POST as $key => $value) {

        if (strpos($key, 'delete_education_') === 0) {
            $education_id = substr($key, 17);
            deleteEducation($education_id);
            header('Location: profile.php');

        }
    }

    // Parcourir les paramètres POST pour trouver le bouton de suppression approprié
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'delete_experience_') === 0) {
            $hobby_id = substr($key, 18);
            deleteHobbies($hobby_id);
            header('Location: profile.php');
        }
    }
}


$hobb = getHobbies($_SESSION['cv_id']);
$education = getEducation($_SESSION['cv_id']);

if (isset($_POST['addHobbies'])) {
    addHobbies($_POST['hobbies'], $_SESSION['cv_id']);
    header('Location: profile.php');
}

if (isset($_POST['add_education'])) {
    addEducation($_POST['education'], $_POST['desc'], $_POST['begin_date'], $_POST['end_date'], $_SESSION['cv_id']);
    header('Location: profile.php');
}
