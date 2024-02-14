<?php
include '../../server/authentication/passwordReset_controller.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../../img/logo.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Forget</title>
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
    </style>

<body>
    <div class="glass">
        <h1>new password</h1>
        <form action="" method='POST'>
            <input type="email" name="mail" placeholder="email" autocomplete="off">
            <input type="text" name="pseudo" placeholder="pseudo" autocomplete="off">
            <input type="password" name="newPassword" placeholder="new password" autocomplete="off">
            <input type="submit" value="Send" name='send' autocomplete="off">
        </form>
        <a href="login2.0.php"><p>Do you already have an account?</p></a>
    </div>

</body>
</html>
