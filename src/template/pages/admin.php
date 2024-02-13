<?php
include "../../server/home/home_controller.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HOME</title>
    <link rel="stylesheet" href="../css/home.css">
</head>

<body>
<header>
    <h1>CvGeneratorPhp</h1>
    <?php
    if (isset($_SESSION['pseudo'])) {
        echo '<a href="logout.php"><h1>logout</h1></a>';
        echo '<form action="" method="post">';
        echo '<input type="submit" class="delete" value="delete account" name="delete">';
        echo '</form>';
    }
    if ($_SESSION['role'] == 1) {
        echo '<a href="admin.php"><h1>admin</h1></a>';
    }

    ?>
</header>
    <?php
        $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;','root',"");
        $req = $bdd->prepare('SELECT COUNT(*) FROM user');
        $req->execute();
        $count = $req->fetch();
        echo '<p>count of account : '. $count[0] .'</p>';

        $req = $bdd->prepare('SELECT COUNT(*) FROM user where role = "1"');
        $req->execute();
        $count = $req->fetch();
        echo '<p>count of admin : '. $count[0] .'</p>';

        echo '<form action="" method="post">';
        echo '<input type="text" placeholder="search pseudo" name="user">';
        echo '<input type="submit" value="search" name="search" autocomplete="off" class="submit-btn">';
        echo '</form>';

        if (isset($_POST['search'])) {
            $req = $bdd->prepare('SELECT * FROM user where pseudo = ?');
            $req->execute(array($_POST['user']));
            $user = $req->fetch();
            $_SESSION['useridadmin'] = $user;
            if ($user) {
                echo '<p>id : ' . $user['id'] . '</p>';
                echo '<p>pseudo : ' . $user['pseudo'] . '</p>';
                echo '<p>email : ' . $user['mail'] . '</p>';
            } else {
                echo '<p>user not found</p>';
            }

            echo '<form action="" method="post">';
            echo '<input type="submit" name="delete_user">';
            echo '</form>';
            }


        if (isset($_POST['delete_user'])) {
            $deleteUser = $bdd->prepare('DELETE FROM user WHERE id = ?');
            $deleteUser->execute(array($_SESSION['useridadmin']['id']));
            echo '<p>user deleted</p>';
            header('Location: admin.php');
        }

        echo '<form action="" method="post">';
        echo '<input type="submit" name="add_role_admin" value="add role admin">';
        echo '</form>';
        if (isset($_POST['add_role_admin'])) {
            addRoleAdmin($_SESSION['useridadmin']['id']);
        }

        function addRoleAdmin($id)
        {
            $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;','root',"");
            $req = $bdd->prepare('UPDATE user SET role = 1 WHERE id = ?');
            $req->execute(array($id));
        }

 ?>


</body>
</html>
