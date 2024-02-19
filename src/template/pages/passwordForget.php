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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $Language->pagePasswordForget['password_forget']; ?></title>
</head>

<style>
    body {
        background-color: #e4faff;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .glass {
        background-color: rgba(255, 255, 255, 0.8);
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        color: rgb(0, 127, 231);
        font-family: "OCR A Extended", monospace;
        font-size: 40px;
        text-align: center;
    }

    form {
        padding-top: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    input {
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #000;
        width: 300px;
    }

    input[type="submit"] {
        margin: 20px;
        background-color: #007bff;
        color: #fff;
        cursor: pointer;
        width: 100px;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }

    a {
        text-decoration: none;
        color: #002d5b;

    }

    p {
        margin-top: 20px;
        font-family: "OCR A Extended", monospace;
    }

    input[type=text], input[type=email], input[type=password]{
        height: 50px;
        outline: none;
        font-size: 22px;
        border: 1px solid transparent;
        border-bottom: 1px solid rgb(100, 107, 115);
        background: rgba(255,255,255,0);
    }

    .errorUser {
        position: absolute;
        top: 0;
        margin: 0;
        width: 100%;
        height: 40px;
        background-color: #ffbdbd;
        color: #960000;
        font-size: 30px;
        font-family: "OCR A Extended", monospace;
    }

    .home {
        padding-left: 35px;
        z-index: 1;
        position: absolute;
        top: 80px;
        font-family: "Berlin Sans FB", serif;
        font-size: 60px;
        color: #0058a1;
        text-align: center;
    }
    </style>

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
