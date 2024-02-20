<?php
include '../../server/profile/profile_controller.php';
include '../../server/Language.php';

if (!isset($_SESSION['pseudo'])) {
    header('Location: Home.php');
}
global $Language;
$user = getInfoUser($_SESSION['id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CVIfyPHP</title>
    <link rel="stylesheet" href="../css/profile.css">
</head>

<body>

    <div>
        <h1><?php echo $Language->pageProfile['new_cv']; ?></h1>
        <div class="general">

            <h2><?php echo $Language->pageProfile['general']; ?></h2>
            <form action="" method='POST'>
                <label>
                    <input type="text" name="name" placeholder="<?php echo $Language->pageProfile['last_name']; ?>" value="<?php echo $user['name'] ?>">
                </label>
                <input type="submit" name="sendName" value="<?php echo $Language->pageProfile['send']; ?>">
            </form>

            <form method="post" class="space">
                <label>
                    <input type="text" name="firstName" placeholder="<?php echo $Language->pageProfile['first_name']; ?>" value="<?php echo $user['firstname'] ?>">
                </label>
                <input type="submit" name="sendFirstName" value="<?php echo $Language->pageProfile['send']; ?>">
            </form>

            <form method="post">
                <label>
                    <input type="text" name="address" placeholder="<?php echo $Language->pageProfile['address']; ?>" value="<?php echo $user['address'] ?>">
                </label>
                <input  type="submit" name="sendAddress" value="<?php echo $Language->pageProfile['send']; ?>">
            </form>

            <form method="post">
                <label>
                    <input type="tel" name="phone" placeholder="<?php echo $Language->pageProfile['phone']; ?>" value="<?php echo $user['phone'] ?>">
                </label>
                <input type="submit" name="sendPhone" value="<?php echo $Language->pageProfile['send']; ?>">
            </form>

            <form method="post">
                <label>
                    <input type="email" placeholder="<?php echo $Language->pageProfile['email']; ?>" name="email" value="<?php echo $user['mail'] ?>">
                </label>
                <input type="submit" name="sendEmail" value="<?php echo $Language->pageProfile['send']; ?>">
            </form>

            <form method="post">
                <label>
                    <input type="date" placeholder="<?php echo $Language->pageProfile['birth']; ?>" name="birth" value="<?php echo $user['birth'] ?>">
                </label>
                <input type="submit" name="sendBirth" value="<?php echo $Language->pageProfile['send']; ?>">

            </form>

            <form method="post">
                <label>
                    <input type="text" placeholder="<?php echo $Language->pageProfile['license']; ?>" name="license" value="<?php echo $user['permisB'] ?>">
                </label>
                <input type="submit" name="sendLicenseB" value="<?php echo $Language->pageProfile['send']; ?>">
            </form>

            <?php
                getPhoto($_SESSION['id']);
            ?>
            <form method="post" enctype="multipart/form-data">
                <input type="file" name="photo">
                <input type="submit" name="deletePhoto" value="<?php echo $Language->pageProfile['delete']; ?>">
                <input type="submit" name="sendPhoto" value="<?php echo $Language->pageProfile['upload']; ?>">
            </form>
        </div>

        <div class="education">
            <h2><?php echo $Language->pageProfile['education']; ?></h2>
            <?php
            global $education;
            foreach ($education as $item) {
                echo '<form method="post" action="">';
                echo '<textarea name="education_'. $item['id'].'" placeholder="'. $Language->pageProfile['name establishment'] .'">' . $item['name'] . '</textarea>';
                echo '<input type="submit" value="'.$Language->pageProfile['edit'].'" name="edit_education_' . $item['id'] . '" autocomplete="off" class="button_delete">';

                echo '<textarea name="desc_'. $item['id'].'" placeholder="'.$Language->pageProfile['description'].'">' . $item['description'] . '</textarea>';
                echo '<input type="submit" value="'.$Language->pageProfile['edit'].'" name="edit_education_desc_' . $item['id'] . '" autocomplete="off" class="button_delete">';

                echo '<textarea name="begin_'. $item['id'].'" placeholder="'.$Language->pageProfile['date_begin'].'">' . $item['begin'] . '</textarea>';
                echo '<input type="submit" value="'.$Language->pageProfile['edit'].'" name="edit_education_begin_' . $item['id'] . '" autocomplete="off" class="button_delete">';

                echo '<textarea name="end_'. $item['id'].'" placeholder="'.$Language->pageProfile['date_end'].'">' . $item['end'] . '</textarea>';
                echo '<input type="submit" value="'.$Language->pageProfile['edit'].'" name="edit_education_end_' . $item['id'] . '" autocomplete="off" class="button_delete">';

                echo '<input type="submit" value="'.$Language->pageProfile['delete'].'" name="delete_education_' . $item['id'] . '" autocomplete="off" class="button_delete">';
                echo '</form>';
            }
            ?>

            <form method="post">
                <label>
                    <input type="text" name="education" placeholder="<?php echo $Language->pageProfile['name establishment']; ?>">
                </label>
                <label>
                    <input type="text" name="desc" placeholder="<?php echo $Language->pageProfile['description']; ?>">
                </label>
                <label>
                    <input type="date" name="begin_date" placeholder="<?php echo $Language->pageProfile['date_begin']; ?>">
                </label>
                <label>
                    <input type="date" name="end_date" placeholder="<?php echo $Language->pageProfile['date_end']; ?>">
                </label>
                <input type="submit" value="<?php echo $Language->pageProfile['send']; ?>" name='add_education' autocomplete="off" class="submit-btn">
            </form>
        </div>
        <div class="hobbies">
            <h2>Hobbies</h2>
            <?php
            global $hobbies;
            foreach ($hobbies as $hobby) {
                echo '<form method="post" action="">';
                echo '<textarea name="hobbies_'. $hobby['id'].'" placeholder="'.$Language->pageProfile['description'].'">' . $hobby['description'] . '</textarea>';
                echo '<div class="HobbiesEdit">';
                echo '<input type="submit" value="'.$Language->pageProfile['edit'].'" name="edit_hobby_' . $hobby['id'] . '" autocomplete="off" class="button_delete">';
                echo '<input type="submit" value="'.$Language->pageProfile['delete'].'" name="delete_hobby_' . $hobby['id'] . '" autocomplete="off" class="button_delete">';
                echo '</div>';
                echo '</form>';
            }
            ?>
            <form method="post">
                <label>
                    <input type="text" name="hobbies" placeholder="<?php echo $Language->pageProfile['description']; ?>">
                </label>
                <input type="submit" value="<?php echo $Language->pageProfile['send']; ?>" name='addHobbies' autocomplete="off" class="submit-btn">
            </form>
        </div>

        <div class="prof">

            <h2>experience professional</h2>
            <?php
            global $professionals;
            foreach ($professionals as $professional) {
                echo '<form method="post" action="">';
                echo '<textarea name="title'. $professional['id'].'" placeholder="'.$Language->pageProfile['name job'].'">' . $professional['title'] . '</textarea>';
                echo '<input type="submit" value="'.$Language->pageProfile['edit'].'" name="edit_experience_title_' . $professional['id'] . '" autocomplete="off" class="button_delete">';

                echo '<textarea name="entreprise'. $professional['id'].'" placeholder="'.$Language->pageProfile['name company'].'">' . $professional['entreprise'] . '</textarea>';
                echo '<input type="submit" value="'.$Language->pageProfile['edit'].'" name="edit_experience_entreprise_' . $professional['id'] . '" autocomplete="off" class="button_delete">';

                echo '<textarea name="begin'. $professional['id'].'" placeholder="'.$Language->pageProfile['date_begin'].'">' . $professional['begin'] . '</textarea>';
                echo '<input type="submit" value="'.$Language->pageProfile['edit'].'" name="edit_experience_begin_' . $professional['id'] . '" autocomplete="off" class="button_delete">';

                echo '<textarea name="end'. $professional['id'].'" placeholder="'.$Language->pageProfile['date_end'].'">' . $professional['end'] . '</textarea>';
                echo '<input type="submit" value="'.$Language->pageProfile['edit'].'" name="edit_experience_end_' . $professional['id'] . '" autocomplete="off" class="button_delete">';

                echo '<textarea name="description'. $professional['id'].'" placeholder="'.$Language->pageProfile['description'].'">' . $professional['description'] . '</textarea>';
                echo '<input type="submit" value="'.$Language->pageProfile['edit'].'" name="edit_experience_description_' . $professional['id'] . '" autocomplete="off" class="button_delete">';

                echo '<input type="submit" value="'.$Language->pageProfile['delete'].'" name="delete_experience_' . $professional['id'] . '" autocomplete="off" class="button_delete">';
                echo '</form>';
            }
            ?>
            <form method="post">
                <label>
                    <input type="text" name="title" placeholder="<?php echo $Language->pageProfile['name job']; ?>">
                </label>
                <label>
                    <input type="text" name="entreprise" placeholder="<?php echo $Language->pageProfile['name company']; ?>">
                </label>
                <label>
                    <input type="text" name="description" placeholder="<?php echo $Language->pageProfile['description']; ?>">
                </label>
                <label>
                    <input type="date" name="begin_date" placeholder="<?php echo $Language->pageProfile['date_begin']; ?>">
                </label>
                <label>
                    <input type="date" name="end_date" placeholder="<?php echo $Language->pageProfile['date_end']; ?>">
                </label>
                <input type="submit" value="<?php echo $Language->pageProfile['send']; ?>" name='addProfessional' autocomplete="off" class="submit-btn">

                <button class="button"><a href="Home.php"><?php echo $Language->pageProfile['back']; ?></a></button>
            </form>
        </div>
    </div>
</body>
</html>
