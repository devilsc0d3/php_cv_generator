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
        <input type="email" name="mail"  autocomplete="off">
        <input type="text" name="pseudo" autocomplete="off">
        <input type="submit" value="Send" name='send' autocomplete="off">
    </form>
    <a href="login.php"><p>avez-vous deja un compte</p></a>
</body>
</html>
