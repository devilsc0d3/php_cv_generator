<?php
include '../../server/authentication/register_controller.php';
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
    <title>Register</title>
</head>

<body>
<a href="Home.php"><h1 class="home"><?php echo $Language->pageRegister['title']; ?></h1></a>
<div class="glass">
    <div class="backgroundTitle">
        <h1><?php echo $Language->pageRegister['register']; ?></h1>
    </div>
    <form action="" method='POST'>
        <label for="pse"></label><input type="text" name='pseudo' id="pse" autocomplete="off" placeholder=<?php echo $Language->pageRegister['nickname']; ?>>

        <label for="mail"></label><input type="email" name="mail" id="mail" autocomplete="off" placeholder=<?php echo $Language->pageRegister['email']; ?>>

        <label for="mdp"></label><input type="password" name="mdp" id="mdp" autocomplete="off" placeholder="<?php echo $Language->pageRegister['password'];?>">
        <?php
        global $errors;
        if (!empty($errors)) {
            echo "<div class='error'>";
            foreach ($errors as $error) {
                if ($error != 1) {
                    echo "<p class='error'>$error</p>";
                }
            }
            echo "</div>";
        }
        ?>

        <input type="submit" value="<?php echo $Language->pageRegister['submit']; ?>" name='send' autocomplete="off" class="submit-btn">
        <a href="login2.0.php"><p><?php echo $Language->pageRegister['already_account']; ?></p></a>
    </form>
</div>
</body>
</html>