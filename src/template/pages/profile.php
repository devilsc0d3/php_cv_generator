<?php
include '../../server/profile/profile_controller.php';

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

        <div class="general">
            <h2>General</h2>
            <form action="" method='POST'>
                <input type="text" name="name" placeholder="nom">
                <input type="text" name="firstname" placeholder="prenom">
                <input type="text" name="addresse" placeholder="adresse">
                <input type="tel" name="phone" placeholder="telephone">
                <input type="email" placeholder="email">
                <input type="date" placeholder="date de naissance">
                <input type="text" placeholder="permis de conduire">
                <input type="submit" value="Send" name='send' autocomplete="off" class="submit-btn">
            </form>
        </div>

        <div class="education">
            <h2>Education</h2>
            <?php
            global $education;
            foreach ($education as $item) {
                echo '<form method="post" action="">';
                echo '<input type="submit" value="delete" name="delete_education_' . $item['id'] . '" autocomplete="off" class="submit-btn">';
                echo '</form>';
                echo $item['name'] . ' / ' . $item['description'];
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
                echo '<input type="submit" value="delete" name="delete_experience_' . $hobby['id'] . '" autocomplete="off" class="submit-btn">';
                echo '</form>';
                echo $hobby['description'];
            }
            ?>
            <form method="post">
                <input type="text" name="hobbies" placeholder="name of etablisment">
                <input type="submit" value="Send" name='addHobbies' autocomplete="off" class="submit-btn">
            </form>
        </div>

        <div class="prof">

            <h2>experience profesionnel</h2>
            <form method="post">
                <input type="text" name="education" placeholder="name of entreprise">
                <input type="text" name="desc" placeholder="description">
                <input type="date" name="begin_date" placeholder="date">
                <input type="date" name="end_date" placeholder="date">
                <input type="submit" value="Send" name='send' autocomplete="off" class="submit-btn">
            </form>
        </div>
    </div>
</body>
</html>
