<?php
include '../../server/authentication/login_controller.php';
include '../../server/Language.php';
global $Language;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../../img/logo.jpg">
    <link rel="stylesheet" href="../css/authentication.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <a href="Home.php"><h1 class="home"><?php echo $Language->pageLogin['title']; ?></h1></a>
    <div class="glass">
        <div class="backgroundTitle">
            <h1><?php echo $Language->pageLogin['login']; ?></h1>
        </div>
        <form action="" method='POST'>
            <label for="pse"></label><input type="text" name='pseudo' id="pse" autocomplete="off" placeholder=<?php echo $Language->pageLogin['nickname']; ?>>
            <label for="mdp"></label><input type="password" name="mdp" id="mdp" autocomplete="off" placeholder="<?php echo $Language->pageLogin['password']; ?>">
            <input type="submit" value=<?php echo $Language->pageLogin['submit']; ?> name='send' autocomplete="off" class="submit-btn">

            <a href="passwordForget.php"><p><?php echo $Language->pageLogin['forgot']; ?></p></a>
            <a href="register2.0.php"><p><?php echo $Language->pageLogin['create_account']; ?></p></a>
        </form>
    </div>
</body>
</html>