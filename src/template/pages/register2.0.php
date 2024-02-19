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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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

    .home {
        padding-left: 35px;
        z-index: 1;
        position: absolute;
        top: 50px;
        font-family: "Berlin Sans FB", serif;
        font-size: 60px;
        color: #0058a1;
        text-align: center;
    }

    .glass {
        z-index: 10;
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

    label {
        margin: 12px 0;
        font-family: "OCR A Extended", monospace;

    }

    input {
        border: 1px solid #000;
        width: 300px;
        margin: 10px;
    }

    input[type="submit"] {
        border-radius: 5px;
        margin: 20px;
        padding: 10px;
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

    .error-container {
        background-color: #ff0000;
        color: #fff;
        padding: 10px;
        border-radius: 5px;
        margin-top: 10px;
    }

    .error {
        margin: 0;
    }

    p {
        margin-top: 20px;
        font-family: "OCR A Extended", monospace;
    }

</style>

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
            echo "<div class='error-container'>";
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