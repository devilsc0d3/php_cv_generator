<?php
include '../../server/profile/profile_controller.php';
if (!isset($_SESSION['pseudo'])) {
    header('Location: Home.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>cv</title>
    <link rel="stylesheet" href="../css/profile.css">
</head>

<body>

    <div>
        <h1>Create new CV</h1>
       <button class="button"><a href="Home.php">back</a></button>
        <div class="general">

            <h2>General</h2>
            <?php
            function getInfoUser($id)
            {
                $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;', 'root', "");
                $req = $bdd->prepare('SELECT * FROM user WHERE id = ?');
                $req->execute(array($id));
                return $req->fetch();
            }
            $user = getInfoUser($_SESSION['id']);
            ?>
            <form action="" method='POST'>
                <input type="text" name="name" placeholder="nom" value="<?php echo $user['name'] ?>">
                <input type="submit" name="sendName">
            </form>

            <form method="post" class="space">
                <input type="text" name="firstName" placeholder="prenom" value="<?php echo $user['firstname'] ?>">
                <input type="submit" name="sendFirstName">
            </form>

            <form method="post">
                <input type="text" name="address" placeholder="address" value="<?php echo $user['address'] ?>">
                <input  type="submit" name="sendAddress">
            </form>

            <form method="post">
                <input type="tel" name="phone" placeholder="telephone" value="<?php echo $user['phone'] ?>">
                <input type="submit" name="sendPhone">
            </form>

            <form method="post">
                <input type="email" placeholder="email" name="mail" value="<?php echo $user['mail'] ?>">
                <input type="submit" name="sendEmail">
            </form>

            <form method="post">
                <input type="date" placeholder="date de naissance" name="birth" value="<?php echo $user['birth'] ?>">
                <input type="submit" name="sendBirth">

            </form>

            <form method="post">
                <input type="text" placeholder="License de conduire" name="license" value="<?php echo $user['permisB'] ?>">
                <input type="submit" name="sendLicenseB">
            </form>

            <?php
            // Connexion à la base de données
            $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;', 'root', "");

            // Préparation et exécution de la requête pour récupérer le nom de l'image après la mise à jour
            $req = $bdd->prepare('SELECT photo FROM user WHERE id = ?');
            $req->execute(array($_SESSION['id']));
            $res = $req->fetch();

            // Vérification si une image a été récupérée
            if ($res && $res["photo"]) {
                // Affichage de l'image avec une balise img
                echo "<img class='photo' src='../../uploads/imgs/" . $res["photo"] . "' alt='User Photo'>";
            }
            ?>

            <form method="post" enctype="multipart/form-data">
                <input type="file" name="photo">
                <input type="submit" name="deletePhoto" value="delete">
                <input type="submit" name="sendPhoto" value="upload">
            </form>
        </div>

        <div class="education">
            <h2>Education</h2>
            <?php
            global $education;
            foreach ($education as $item) {
                echo '<form method="post" action="">';
                echo '<textarea name="education_'. $item['id'].'" placeholder="name of etablisment">' . $item['name'] . '</textarea>';
                echo '<input type="submit" value="edit" name="edit_education_' . $item['id'] . '" autocomplete="off" class="button_delete">';

                echo '<textarea name="desc_'. $item['id'].'" placeholder="name of etablisment">' . $item['description'] . '</textarea>';
                echo '<input type="submit" value="edit" name="edit_education_desc_' . $item['id'] . '" autocomplete="off" class="button_delete">';

                echo '<textarea name="begin_'. $item['id'].'" placeholder="name of etablisment">' . $item['begin'] . '</textarea>';
                echo '<input type="submit" value="edit" name="edit_education_begin_' . $item['id'] . '" autocomplete="off" class="button_delete">';

                echo '<textarea name="end_'. $item['id'].'" placeholder="name of etablisment">' . $item['end'] . '</textarea>';
                echo '<input type="submit" value="edit" name="edit_education_end_' . $item['id'] . '" autocomplete="off" class="button_delete">';

                echo '<input type="submit" value="delete" name="delete_education_' . $item['id'] . '" autocomplete="off" class="button_delete">';
                echo '</form>';
            }
            ?>

            <form method="post">
                <input type="text" name="education" placeholder="name of etablisment">
                <input type="text" name="desc" placeholder="description">
                <input type="date" name="begin_date" placeholder="date">
                <input type="date" name="end_date" placeholder="date">
                <input type="submit" value="Send" name='add_education' autocomplete="off" class="submit-btn">
            </form>
        </div>
        <div class="hobbies">
            <h2>Hobbies</h2>
            <?php
            global $hobb;
            foreach ($hobb as $hobby) {
                echo '<form method="post" action="">';
                echo '<textarea name="hobbies_'. $hobby['id'].'" placeholder="name of etablisment">' . $hobby['description'] . '</textarea>';
                echo '<div class="testeuuu">';
                echo '<input type="submit" value="edit" name="edit_hobby_' . $hobby['id'] . '" autocomplete="off" class="button_delete">';
                echo '<input type="submit" value="delete" name="delete_hobby_' . $hobby['id'] . '" autocomplete="off" class="button_delete">';
                echo '</div>';
                echo '</form>';
            }
            ?>
            <form method="post">
                <input type="text" name="hobbies" placeholder="name of etablisment">
                <input type="submit" value="Send" name='addHobbies' autocomplete="off" class="submit-btn">
            </form>
        </div>

        <div class="prof">

            <h2>experience profesionnel</h2>
            <?php
            global $professionals;
            foreach ($professionals as $professional) {
                echo '<form method="post" action="">';
                echo '<textarea name="title'. $professional['id'].'" placeholder="name of etablisment">' . $professional['title'] . '</textarea>';
                echo '<input type="submit" value="edit" name="edit_experience_title_' . $professional['id'] . '" autocomplete="off" class="button_delete">';

                echo '<textarea name="entreprise'. $professional['id'].'" placeholder="name of etablisment">' . $professional['entreprise'] . '</textarea>';
                echo '<input type="submit" value="edit" name="edit_experience_entreprise_' . $professional['id'] . '" autocomplete="off" class="button_delete">';

                echo '<textarea name="begin'. $professional['id'].'" placeholder="name of etablisment">' . $professional['begin'] . '</textarea>';
                echo '<input type="submit" value="edit" name="edit_experience_begin_' . $professional['id'] . '" autocomplete="off" class="button_delete">';

                echo '<textarea name="end'. $professional['id'].'" placeholder="name of etablisment">' . $professional['end'] . '</textarea>';
                echo '<input type="submit" value="edit" name="edit_experience_end_' . $professional['id'] . '" autocomplete="off" class="button_delete">';

                echo '<textarea name="description'. $professional['id'].'" placeholder="name of etablisment">' . $professional['description'] . '</textarea>';
                echo '<input type="submit" value="edit" name="edit_experience_description_' . $professional['id'] . '" autocomplete="off" class="button_delete">';

                echo '<input type="submit" value="delete" name="delete_experience_' . $professional['id'] . '" autocomplete="off" class="button_delete">';
                echo '</form>';
            }
            ?>
            <form method="post">
                <input type="text" name="title" placeholder="name of entreprise">
                <input type="text" name="entreprise" placeholder="name of entreprise">
                <input type="text" name="description" placeholder="description">
                <input type="date" name="begin_date" placeholder="date">
                <input type="date" name="end_date" placeholder="date">
                <input type="submit" value="Send" name='addProfessional' autocomplete="off" class="submit-btn">
            </form>
        </div>
    </div>
</body>
</html>
