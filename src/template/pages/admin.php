<?php
include "../../server/home/home_controller.php";

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
</head>
<style>
    .account_view {
        font-size: 20px;
        font-family: "Berlin Sans FB", serif;
        font-weight: 600;
        text-align: center;
        color: #0057b6;
        width: 200px;
        height: 100px;
        border-radius: 20px;
        margin: 0 0 0 100px;
        background-color: #7dd3fa;
    }
    .submit-btn {
        margin-top: 20px;
    }
    strong {
        font-size: 50px;
    }
</style>
<body>
<header>
    <a href="Home.php"><h1>CvGeneratorPhp</h1></a>
    <?php
    if (isset($_SESSION['pseudo'])) {
        echo '<a href="logout.php"><h1>logout</h1></a>';
        if ($_SESSION['role'] == 1) {
            echo '<a href="admin.php"><h1>admin</h1></a>';
        }
        echo '<form action="" method="post">';
        echo '<input type="submit" class="delete" value="delete account" name="delete">';
        echo '</form>';
    }
    ?>
</header>

    <?php
        $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;','root',"");
        $req = $bdd->prepare('SELECT COUNT(*) FROM user');
        $req->execute();
        $count = $req->fetch();
        echo '<div class="account_view">';
        echo '<p>count of account : <br><strong>'. $count[0] .'</strong></p>';
        echo '</div>';

        $req = $bdd->prepare('SELECT COUNT(*) FROM user where role = "1"');
        $req->execute();
        $count = $req->fetch();
    echo '<div class="account_view">';

    echo '<p>count of admin : <br><strong>'. $count[0] .'</strong></p>';
    echo '</div>';


    echo '<form action="" method="post">';
        echo '<input type="text" placeholder="search pseudo" name="user">';
        echo '<input type="submit" value="search" name="search" autocomplete="off" class="submit-btn">';
        echo '</form>';

        if (isset($_POST['search'])) {
            $req = $bdd->prepare('SELECT * FROM user where pseudo = ?');
            $req->execute(array($_POST['user']));
            $user = $req->fetch();
            $_SESSION['userIdAdmin'] = $user;
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
            $deleteUser->execute(array($_SESSION['userIdAdmin']['id']));
            echo '<p>user deleted</p>';
            header('Location: admin.php');
        }

        echo '<form action="" method="post">';
        echo '<input type="submit" name="add_role_admin" value="add role admin">';
        echo '</form>';
        if (isset($_POST['add_role_admin'])) {
            addRoleAdmin($_SESSION['userIdAdmin']['id']);
        }

    function addRoleAdmin($id)
    {
        $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;','root',"");
        $addRole = $bdd->prepare('UPDATE user SET role = "1" WHERE id = ?');
        $addRole->execute(array($id));
    }

 ?>

<h1>comming soon !</h1>

</body>
</html>
