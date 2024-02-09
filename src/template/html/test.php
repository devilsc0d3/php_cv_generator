<?php
include "../../server/home/home_controller.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HOME</title>
    <link rel="stylesheet" href="../css/home.css">
</head>

<body>
<header>
    <h1>CvGeneratorPhp</h1>
    <?php
    if (isset($_SESSION['mdp'])) {
        echo '<a href="logout.php"><h1>logout</h1></a>';
        echo '<form method="post">';
        echo '<input type="submit" value="delete account" name="delete">';
        echo '</form>';
    }
    ?>
</header>

<?php
if (!isset($_SESSION['mdp'])) {
    ?>
    <div class="center"><img src="../../img/login.svg" alt="image login"></div>
    <div class="center2">
        <a href="register.php"><h1 class="center2">Register</h1></a>
        <h1 class="center2"> / </h1>
        <a href="login.php"><h1 class="center2">Login</h1></a>
    </div>
    <?php
} else {
    ?>
    <section>
        <div class="h backgroundtitle"><h1>Profils</h1></div>
        <section class="profile">
            <form></form>
            <?php
            global $presets;
            if (!isset($presets)) {
                $presets = [];
            }
            foreach ($presets as $preset) {
                echo "<div class='glass'>";
                echo "<form action='newCV.php' method='post'>";
                echo "<input type='hidden' name='preset_id' value='" . $preset['id'] . "'>";
                echo "<button type='submit' name='cvs'>";
                echo "<p>" . $preset['title'] . "</p>";
                echo "</button>";
                echo "</form>";
                ?>
                <input type='radio' name='preset' value='<?php echo $preset['id']; ?>'>
                <?php
            }
            ?>
            <a href="newCV.php">
                <div class="glass">
                    <p>+</p>
                </div>
            </a>
            <div class="glass">
                <form method="post">
                    <input type="text" placeholder="name of preset" name="name">
                    <input type="submit" value="send" name="send">
                </form>
            </div>
        </section>

        <section>
            <div class="backgroundtitle">
                <h1>CV template</h1>
            </div>
            <section class="template">
                <form method="post" action=""> <!-- Form added here -->
                    <div class="glass2">
                        <input type="radio" name="template" value="template1">
                    </div>
                    <div class="glass2">
                        <input type="radio" name="template" value="template2">
                    </div>
                    <div class="glass2">
                        <input type="radio" name="template" value="template3">
                    </div>
                    <input type="submit" class="convert" value="convert to pdf" name="convert">
                    <?php

                    if(isset($_POST['convert'])) {
                        $preset_id = $_POST['preset'];
                        $template = $_POST['template'];
                        echo $preset_id;
                        echo $template;
                    }

                    ?>
                </form>
            </section>
        </section>
    </section>
    <?php
}
?>
</body>
<!--TODO: change form-->