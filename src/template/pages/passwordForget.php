<?php
include '../../server/passwordForget/passwordForget_controller.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<style>
    body{
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }
    form{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    input{
        margin: 10px;
    }
    </style>
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
