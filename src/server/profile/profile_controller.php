<?php
include 'profile_service.php';

session_start();

echo $_SESSION['cv_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    // delete education
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'delete_education_') === 0) {
            $education_id = substr($key, 17);
            deleteEducation($education_id);
            header('Location: profile.php');

        }
    }

    // delete hobbies
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'delete_hobby_') === 0) {
            $hobby_id = substr($key, 13);
            deleteHobbies($hobby_id);
            header('Location: profile.php');
        }
    }

    // edit hobbies
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'edit_hobby_') === 0) {
            $hobby_id = substr($key, 11);
            editHobbies($hobby_id, $_POST['hobbies_' . $hobby_id]);
        }
    }


    // experience delete
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'delete_experience_') === 0) {
            $delete_id = substr($key, 18);
            deleteExperience($delete_id);
            header('Location: profile.php');
        }
    }

    // experience edit
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'edit_experience_title_') === 0) {
            $edit_id = substr($key, 22);
            editExperienceTitle($edit_id, $_POST['title' . $edit_id]);
        }
    }

    foreach ($_POST as $key => $value) {
        if (strpos($key, 'edit_experience_entreprise_') === 0) {
            $edit_id = substr($key, 27);
            editExperienceEntreprise($edit_id, $_POST['entreprise' . $edit_id]);
        }
    }

    foreach ($_POST as $key => $value) {
        if (strpos($key, 'edit_experience_description_') === 0) {
            $edit_id = substr($key, 28);
            editExperienceDescription($edit_id, $_POST['description' . $edit_id]);
        }
    }

    foreach ($_POST as $key => $value) {
        if (strpos($key, 'edit_experience_begin_') === 0) {
            $edit_id = substr($key, 22);
            editExperienceBegin($edit_id, $_POST['begin' . $edit_id]);
        }
    }

    foreach ($_POST as $key => $value) {
        if (strpos($key, 'edit_experience_end_') === 0) {
            $edit_id = substr($key, 20);
            editExperienceEnd($edit_id, $_POST['end' . $edit_id]);
        }
    }

    // education title
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'education_') === 0) {
            $education_id = substr($key, 10);
            editEducation($education_id, $_POST['education_' . $education_id]);
        }
    }

    // education desc
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'desc_') === 0) {
            $desc_id = substr($key, 5);
            editEducationDesc($desc_id, $_POST['desc_' . $desc_id]);
        }
    }

    // education begin
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'begin_') === 0) {
            $begin_id = substr($key, 6);
            editEducationBegin($begin_id, $_POST['begin_' . $begin_id]);
        }
    }

    // education end
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'end_') === 0) {
            $end_id = substr($key, 4);
            editEducationEnd($end_id, $_POST['end_' . $end_id]);
        }
    }
}



if (isset($_POST['deletePhoto'])) {
    deletePhoto($_SESSION['id']);
    header('Location: profile.php');
}

$hobb = getHobbies($_SESSION['cv_id']);
$education = getEducation($_SESSION['cv_id']);
$professionals = getProfessionals($_SESSION['cv_id']);

if (isset($_POST['addProfessional'])) {
    addProfessional($_SESSION['cv_id'], $_POST['title'], $_POST['entreprise'], $_POST['description'], $_POST['begin_date'], $_POST['end_date']);
    header('Location: profile.php');
}

if (isset($_POST['addHobbies'])) {
    addHobbies($_POST['hobbies'], $_SESSION['cv_id']);
    header('Location: profile.php');
}

if (isset($_POST['add_education'])) {
    addEducation($_POST['education'], $_POST['desc'], $_POST['begin_date'], $_POST['end_date'], $_SESSION['cv_id']);
    header('Location: profile.php');
}


//general
if (isset($_POST['sendName'])) {
    updateName($_POST['name'], $_SESSION['id']);
    header('Location: profile.php');
}

if (isset($_POST['sendFirstName'])) {
    updateLastFirst($_POST['firstName'], $_SESSION['id']);
    header('Location: profile.php');
}


if (isset($_POST['sendAddress'])) {
    updateAddress($_POST['address'], $_SESSION['id']);
    header('Location: profile.php');
}


if (isset($_POST['sendPhone'])) {
    updatePhone($_POST['phone'], $_SESSION['id']);
    header('Location: profile.php');
}

if (isset($_POST['sendEmail'])) {
    updateEmail($_POST['email'], $_SESSION['id']);
    header('Location: profile.php');
}

if (isset($_POST['sendBirth'])) {
    updateBirth($_POST['birth'], $_SESSION['id']);
    header('Location: profile.php');
}

if (isset($_POST['sendLicenseB'])) {
    updateLicenseB($_POST['license'], $_SESSION['id']);
    header('Location: profile.php');
}


if (isset($_POST['sendPhoto'])) {
    $img_name = $_FILES['photo']['name'];
    $img_size = $_FILES['photo']['size'];
    $tmp_name = $_FILES['photo']['tmp_name'];
    $error = $_FILES['photo']['error'];

    if ($error === 0) {
        if ($img_size > 125000) {
            $em = "Sorry, your file is too large.";
        } else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png");

            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                $img_upload_path = '../../uploads/imgs/'.$new_img_name;

                if (move_uploaded_file($tmp_name, $img_upload_path)) {
                    // Insert into Database
                    $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;', 'root', "");
                    $req = $bdd->prepare('UPDATE user SET photo = ? WHERE id = ?');
                    $req->execute(array($new_img_name, $_SESSION['id']));
                    // Redirection après le téléchargement réussi
                } else {
                    $em = "Failed to move uploaded file.";
                }
            } else {
                $em = "You can't upload files of this type";
            }
        }
    } else {
        $em = "Unknown error occurred!";
    }

    // Gérer les erreurs et rediriger si nécessaire
    // header("Location: index.php?error=$em");
    // exit();
}
