<?php
include '../../server/authentication/passwordReset_controller.php';
include "../../server/Language.php";
global $Language;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../../img/logo.jpg">
    <link rel="stylesheet" href="../css/authentication.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $Language->pagePasswordForget['password_forget']; ?></title>
</head>

<body>
<a href="Home.php"><h1 class="home"><?php echo $Language->pagePasswordForget['title']; ?></h1></a>
    <div class="glass">
        <h1><?php echo $Language->pagePasswordForget['new_password']; ?></h1>
        <form action="" method='POST'>
            <label>
                <input type="email" name="mail" placeholder="<?php echo $Language->pagePasswordForget['email']; ?>" autocomplete="off">
            </label>
            <label>
                <input type="text" name="pseudo" placeholder="<?php echo $Language->pagePasswordForget['nickname']; ?>" autocomplete="off">
            </label>
            <label>
                <input type="password" name="newPassword" placeholder="<?php echo $Language->pagePasswordForget['new_password']; ?>" autocomplete="off">
            </label>
            <input type="submit" value="<?php echo $Language->pagePasswordForget['submit']; ?>" name='send' autocomplete="off">
        </form>
        <a href="login2.0.php"><p><?php echo $Language->pagePasswordForget['already_account']; ?></p></a>
    </div>
</body>
</html>
