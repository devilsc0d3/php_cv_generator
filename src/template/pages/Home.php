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
    if (isset($_SESSION['pseudo'])) {
        echo '<a href="logout.php"><h1>logout</h1></a>';
        echo '<form action="" method="post">';
        echo '<input type="submit" value="delete_account" name="delete">';
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
        <form action="" method="post">
            <div class="h backgroundtitle"><h1>Profils</h1></div>
        <section class="profile">
            <?php
            global $presets;
            if (!isset($presets)) {
                $presets = [];
            }
            foreach ($presets as $preset) {
                echo "<div class='glass'>";
                echo "<input type='hidden' name='preset_id' value='" . $preset['id'] . "'>";
                echo "<button type='submit' name='profile' value='" . $preset['id'] . "'>";
                echo "<p>" . $preset['title'] . "</p>";
                echo "</button>";
                ?>
                <label>
                    <input type='radio' name='preset' value='<?php echo $preset['id']; ?>'>
                </label>

                <?php
                echo '</div>';
            }
            ?>
            <div class="glass">
                <label>
                    <input type="text" placeholder="name of preset" name="name">
                </label>
                <input type="submit" value="send" name="send">
            </div>
        </section>

        <section>
            <div class="backgroundtitle">
                <h1>CV template</h1>
            </div>
            <section class="template">
                    <div class="glass2">
                        <label>
                            <input type="radio" name="template" value="template1">
                        </label>
                    </div>
                    <div class="glass2">
                        <label>
                            <input type="radio" name="template" value="template2">
                        </label>
                    </div>
                    <div class="glass2">
                        <label>
                            <input type="radio" name="template" value="template3">
                        </label>
                    </div>
                    <input type="submit" class="convert" value="convert to pdf" name="convert">
            </section>
        </section>
        </form>
    </section>
    <?php
}
?>
</body>
</html>
