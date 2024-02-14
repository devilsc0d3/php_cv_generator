<?php
include '../../server/authentication/login_controller.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../../img/logo.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        margin: 10px 0;
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

    input[type=text], input[type=email], input[type=password]{
        height: 50px;
        outline: none;
        font-size: 22px;
        border: 1px solid transparent;
        border-bottom: 1px solid rgb(100, 107, 115);
        background: rgba(255,255,255,0);
    }
    </style>

<body>
<div class="glass">
    <div class="backgroundTitle">
        <h1>Login</h1>
    </div>
    <form action="" method='POST'>
        <input type="text" name='pseudo' id="pse" autocomplete="off" placeholder="nickname">

        <input type="password" name="mdp" id="mdp" autocomplete="off" placeholder="password">

        <input type="submit" value="Send" name='send' autocomplete="off" class="submit-btn">
        <a href="passwordForget.php"><p>password forget ?</p></a>
        <a href="register2.0.php"><p>create account now !</p></a>
    </form>
</div>
</body>
</html>