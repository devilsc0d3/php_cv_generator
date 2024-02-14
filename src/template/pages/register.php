<?php
include '../../server/authentication/register_controller.php'
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
    <svg class="svg1" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
        <path fill="#0372B2" d="M37.6,-54.1C50.1,-42.6,62.6,-33.5,61.9,-23.1C61.1,-12.7,47.1,-1,43.7,15.7C40.3,32.3,47.6,53.9,42.1,63.1C36.6,72.2,18.3,69,4.1,63.3C-10,57.6,-20,49.4,-24.2,39.9C-28.5,30.3,-27,19.3,-26.5,10.9C-26.1,2.5,-26.8,-3.2,-29.7,-14.4C-32.6,-25.6,-37.7,-42.3,-33.2,-56.4C-28.6,-70.4,-14.3,-81.9,-0.9,-80.6C12.5,-79.4,25,-65.5,37.6,-54.1Z" transform="translate(100 100)" />
    </svg>
    <svg class="svg2" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
        <path fill="#08BDBA" d="M35.1,-51.5C47.1,-39.6,59.4,-31.5,65.8,-19.6C72.1,-7.7,72.5,8,66.6,20.2C60.7,32.4,48.5,41.2,36.3,46.3C24.2,51.4,12.1,52.9,3.3,48.3C-5.4,43.7,-10.8,33,-17.5,26.1C-24.2,19.2,-32.2,16.1,-43.7,7.8C-55.2,-0.5,-70.2,-14.1,-70,-25.2C-69.7,-36.2,-54.2,-44.8,-40,-55.9C-25.9,-67,-12.9,-80.7,-0.7,-79.8C11.6,-78.8,23.1,-63.3,35.1,-51.5Z" transform="translate(100 100)" />
    </svg>
    <div class="selection">
        <div class="backgroundTitle">
            <h1>Register</h1>
        </div>
        <form action="" method='POST'>
            <label for="pse">Username :</label>
            <input type="text" name='pseudo' id="pse" autocomplete="off">

            <label for="mail">email :</label>
            <input type="email" name="mail" id="mail" autocomplete="off">

            <label for="mdp">password :</label>
            <input type="password" name="mdp" id="mdp" autocomplete="off">
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

            <input type="submit" value="Send" name='send' autocomplete="off" class="submit-btn">
            <a href="login.php"><p>Do you already have an account?</p></a>
        </form>
    </div>
</body>
</html>