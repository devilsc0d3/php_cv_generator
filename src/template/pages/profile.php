<?php
include '../../server/profile/profile_controller.php';
if (!isset($_SESSION['pseudo'])) {
    header('Location: Home.php');
}

$user = getInfoUser($_SESSION['id']);
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
                <input type="text" name="name" placeholder="last name" value="<?php echo $user['name'] ?>">
                <input type="submit" name="sendName">
            </form>

            <form method="post" class="space">
                <input type="text" name="firstName" placeholder="first name" value="<?php echo $user['firstname'] ?>">
                <input type="submit" name="sendFirstName">
            </form>

            <form method="post">
                <input type="text" name="address" placeholder="address" value="<?php echo $user['address'] ?>">
                <input  type="submit" name="sendAddress">
            </form>

            <form method="post">
                <input type="tel" name="phone" placeholder="phone" value="<?php echo $user['phone'] ?>">
                <input type="submit" name="sendPhone">
            </form>

            <form method="post">
                <input type="email" placeholder="email" name="email" value="<?php echo $user['mail'] ?>">
                <input type="submit" name="sendEmail">
            </form>

            <form method="post">
                <input type="date" placeholder="date of birth" name="birth" value="<?php echo $user['birth'] ?>">
                <input type="submit" name="sendBirth">

            </form>

            <form method="post">
                <input type="text" placeholder="License of ride" name="license" value="<?php echo $user['permisB'] ?>">
                <input type="submit" name="sendLicenseB">
            </form>

            <?php
                getPhoto($_SESSION['id']);
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
                echo '<textarea name="education_'. $item['id'].'" placeholder="name of establishment">' . $item['name'] . '</textarea>';
                echo '<input type="submit" value="edit" name="edit_education_' . $item['id'] . '" autocomplete="off" class="button_delete">';

                echo '<textarea name="desc_'. $item['id'].'" placeholder="description">' . $item['description'] . '</textarea>';
                echo '<input type="submit" value="edit" name="edit_education_desc_' . $item['id'] . '" autocomplete="off" class="button_delete">';

                echo '<textarea name="begin_'. $item['id'].'" placeholder="date begin">' . $item['begin'] . '</textarea>';
                echo '<input type="submit" value="edit" name="edit_education_begin_' . $item['id'] . '" autocomplete="off" class="button_delete">';

                echo '<textarea name="end_'. $item['id'].'" placeholder="date end">' . $item['end'] . '</textarea>';
                echo '<input type="submit" value="edit" name="edit_education_end_' . $item['id'] . '" autocomplete="off" class="button_delete">';

                echo '<input type="submit" value="delete" name="delete_education_' . $item['id'] . '" autocomplete="off" class="button_delete">';
                echo '</form>';
            }
            ?>

            <form method="post">
                <input type="text" name="education" placeholder="name of establishment">
                <input type="text" name="desc" placeholder="description">
                <input type="date" name="begin_date" placeholder="date begin">
                <input type="date" name="end_date" placeholder="date end">
                <input type="submit" value="Send" name='add_education' autocomplete="off" class="submit-btn">
            </form>
        </div>
        <div class="hobbies">
            <h2>Hobbies</h2>
            <?php
            global $hobbies;
            foreach ($hobbies as $hobby) {
                echo '<form method="post" action="">';
                echo '<textarea name="hobbies_'. $hobby['id'].'" placeholder="description...">' . $hobby['description'] . '</textarea>';
                echo '<div class="HobbiesEdit">';
                echo '<input type="submit" value="edit" name="edit_hobby_' . $hobby['id'] . '" autocomplete="off" class="button_delete">';
                echo '<input type="submit" value="delete" name="delete_hobby_' . $hobby['id'] . '" autocomplete="off" class="button_delete">';
                echo '</div>';
                echo '</form>';
            }
            ?>
            <form method="post">
                <input type="text" name="hobbies" placeholder="description...">
                <input type="submit" value="Send" name='addHobbies' autocomplete="off" class="submit-btn">
            </form>
        </div>

        <div class="prof">

            <h2>experience professional</h2>
            <?php
            global $professionals;
            foreach ($professionals as $professional) {
                echo '<form method="post" action="">';
                echo '<textarea name="title'. $professional['id'].'" placeholder="name of contract">' . $professional['title'] . '</textarea>';
                echo '<input type="submit" value="edit" name="edit_experience_title_' . $professional['id'] . '" autocomplete="off" class="button_delete">';

                echo '<textarea name="entreprise'. $professional['id'].'" placeholder="name of company">' . $professional['entreprise'] . '</textarea>';
                echo '<input type="submit" value="edit" name="edit_experience_entreprise_' . $professional['id'] . '" autocomplete="off" class="button_delete">';

                echo '<textarea name="begin'. $professional['id'].'" placeholder="date begin">' . $professional['begin'] . '</textarea>';
                echo '<input type="submit" value="edit" name="edit_experience_begin_' . $professional['id'] . '" autocomplete="off" class="button_delete">';

                echo '<textarea name="end'. $professional['id'].'" placeholder="date end">' . $professional['end'] . '</textarea>';
                echo '<input type="submit" value="edit" name="edit_experience_end_' . $professional['id'] . '" autocomplete="off" class="button_delete">';

                echo '<textarea name="description'. $professional['id'].'" placeholder="description">' . $professional['description'] . '</textarea>';
                echo '<input type="submit" value="edit" name="edit_experience_description_' . $professional['id'] . '" autocomplete="off" class="button_delete">';

                echo '<input type="submit" value="delete" name="delete_experience_' . $professional['id'] . '" autocomplete="off" class="button_delete">';
                echo '</form>';
            }
            ?>
            <form method="post">
                <input type="text" name="title" placeholder="name of company">
                <input type="text" name="entreprise" placeholder="name of company">
                <input type="text" name="description" placeholder="description">
                <input type="date" name="begin_date" placeholder="date begin">
                <input type="date" name="end_date" placeholder="date end">
                <input type="submit" value="Send" name='addProfessional' autocomplete="off" class="submit-btn">

                <button class="button"><a href="Home.php">back</a></button>
            </form>
        </div>
    </div>
</body>
</html>
