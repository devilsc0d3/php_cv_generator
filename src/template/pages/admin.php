<?php
include "../../server/home/home_controller.php";
include "../../server/admin/admin_service.php";

if (!isset($_SESSION['pseudo'])) {
    header('Location: Home.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>admin</title>
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
<header>
    <a href="Home.php"><h1>CvGeneratorPhp</h1></a>
    <form action="" method="post" class="langue">
        <label for="langue"></label><select id="langue" name="langue">
            <option value="chinese">chinese</option>
            <option value="french">Français</option>
            <option value="english">english</option>
            <option value="spanish">spanish</option>
            <option value="german">german</option>
            <option value="russian">russian</option>
        </select>
        <button type="submit" name="submit">Soumettre</button>
    </form>
    <a href="logout.php"><h1>logout</h1></a>
    <a href="admin.php"><h1>admin</h1></a>
    <form action="" method="post">
        <input type="submit" class="delete" value="delete account" name="delete">
    </form>
</header>
       <div class="view1">
           <div class="account_view">
                <p>count of account : <br><strong><?php echo getCountAccount()[0] ?></strong></p>
            </div>

            <div class="account_view">
                <p>count of admin : <br><strong><?php echo getCountAdmin()[0] ?></strong></p>
            </div>

           <div class="action">
                <p>search user</p>
                <form action="" method="post">
                    <label>
                        <input type="text" placeholder="search pseudo" name="user">
                    </label>
                    <input type="submit" value="search" name="search" autocomplete="off" class="submit-btn">
                </form>

        <?php

        if (isset($_POST['search'])) {
            $user = search();
            $_SESSION['userIdAdmin'] = $user;
            if ($user) {
                echo '<p>id : ' . $user['id'] . '</p>';
                echo '<p>pseudo : ' . $user['pseudo'] . '</p>';
                echo '<p>email : ' . $user['mail'] . '</p>';

                echo '<form action="" method="post">';
                echo '<input type="submit" name="add_role_admin" value="add role admin">';
                echo '</form>';

                echo '<form action="" method="post">';
                echo '<input type="submit" name="delete_user" value="delete">';
                echo '</form>';
            } else {
                echo '<p>user not found</p>';
            }
        }

        echo '</div>';
        echo '</div>';

    if (isset($_POST['delete_user'])) {
        deletePresetAndData($_SESSION['userIdAdmin']['id']);
        deleteAllPresetOfUser($_SESSION['userIdAdmin']['id']);
        deleteUser($_SESSION['userIdAdmin']['id']);
        header('Location: admin.php');
    }

    if (isset($_POST['add_role_admin'])) {
        addRoleAdmin($_SESSION['userIdAdmin']['id']);
    }
 ?>

</body>
</html>
