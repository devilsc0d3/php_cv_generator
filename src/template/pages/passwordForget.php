<?php
include '../../server/passwordForget/passwordForget_controller.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <form action="" method='POST'>
        <label>
            <input type="email" name="mail"  autocomplete="off">
        </label>
        <label>
            <input type="text" name="pseudo" autocomplete="off">
        </label>
        <input type="submit" value="Send" name='send' autocomplete="off">
    </form>
    <a href="login.php"><p>avez-vous deja un compte</p></a>
</body>
</html>
