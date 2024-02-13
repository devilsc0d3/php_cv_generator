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
    <a href="Home.php"><h1>CvGeneratorPhp</h1></a>
    <?php
    if (isset($_SESSION['pseudo'])) {
        echo '<a href="logout.php"><h1>logout</h1></a>';
        if ($_SESSION['role'] == 1) {
            echo '<a href="admin.php"><h1>admin</h1></a>';
        }
        echo '<form action="" method="post">';
        echo '<input type="submit" class="delete" value="delete account" name="delete">';
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
    echo '<h1 class="name">Hello ' . $_SESSION["pseudo"] . '!</h1>';
    ?>
    <section>
        <form action="" method="post">
            <div class="h backgroundtitle"><h1>Profils</h1></div>
        <section class="profile">
            <?php
            global $presets;
            if (!isset($presets)) {
                $presets = [];
            }
            foreach ($presets as $preset) {
                echo "<div class='container'>";
                echo "<input type='hidden' name='preset_id' value='" . $preset['id'] . "'>";
                echo "<button type='submit' autocomplete='off' class='profileButton glass' name='profile' value='" . $preset['id'] . "' >";
                echo "<p>" . $preset['title'] . "</p>";
                echo "</button>";
                echo '<input type="submit" class="sub" value="delete" name="delete_preset_' . $preset['id'] . '" autocomplete="off" class="submit-btn">';

                ?>

                <br><input type='radio' name='preset' value='<?php echo $preset['id']; ?>'>

                <?php
                echo '</div>';
            }
            ?>
            <div class="glass input">
                <label>
                    <input type="text" placeholder="name of preset" name="name" autocomplete='off'>
                </label>
                <input type="submit" class="sub" value="send" name="send">
            </div>
        </section>

        <section>
            <div class="backgroundtitle">
                <h1>CV template</h1>
            </div>
            <section class="template">
                    <div class="container">
                        <div class="glass2">
                        </div>
                        <input type="radio" name="template" value="template1">
                    </div>

                    <div class="container">
                        <div class="glass2">
                        </div>
                        <input type="radio" name="template" value="template2">
                    </div>

                    <div class="container">
                        <div class="glass2">
                        </div>
                        <input type="radio" name="template" value="template3">
                    </div>
            </section>
            <div class="width">
                <input type="submit" class="convert" value="convert to pdf" name="convert">
            </div>
        </section>
        </form>
    </section>
    <?php
}
?>
</body>
</html>
