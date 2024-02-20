<?php
include "../../server/home/home_controller.php";
include "../../server/Language.php";
global $Language;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CVIfyPhp</title>
    <link rel="icon" href="../../img/logo.jpg">
    <link rel="stylesheet" href="../css/home.css">
</head>
<body>
<header>
    <a href="Home.php"><h1><?php echo $Language->pageHome['title']; ?></h1></a>
    <form action="" method="post" class="lang">
        <label for="lang"></label><select id="lang" name="lang">
            <option value="chinese">chinese</option>
            <option value="french">Français</option>
            <option value="english">english</option>
            <option value="spanish">spanish</option>
            <option value="german">german</option>
            <option value="russian">russian</option>
        </select>
        <button type="submit" name="submit"><?php echo $Language->pageHome['submit']; ?></button>
    </form>
    <?php
    if (isset($_SESSION['pseudo'])) {
        echo '<a href="logout.php"><h1>'.$Language->pageHome['logout'].'</h1></a>';
        if ($_SESSION['role'] == 1) {
            echo '<a href="admin.php"><h1>'.$Language->pageHome['admin'].'</h1></a>';
        }
        echo '<form action="" method="post">';
        echo '<input type="submit" class="delete" value="'. $Language->pageHome['delete'].'" name="delete">';
        echo '</form>';
    } else {
        echo '<a href="https://lesjoiesducode.fr/nicolas-cage-pedro-pascal-chef-deadline"><h1>'. $Language->pageHome['credit'].'</h1></a>';
    }
    ?>
</header>
<?php
if (!isset($_SESSION['mdp'])) {
    ?>
    <div class="center"><img src="../../img/login.svg" alt="image login"></div>
    <div class="center2">
        <a href="register2.0.php"><h1 class="center2"><?php echo $Language->pageHome['register']; ?></h1></a>
        <h1 class="center2"> / </h1>
        <a href="login2.0.php"><h1 class="center2"><?php echo $Language->pageHome['login']; ?></h1></a>
    </div>
    <?php
} else {
    echo '<h1 class="name">'. $Language->pageHome['hi'] . $_SESSION["pseudo"] . '!</h1>';
    ?>
    <section>
        <form action="" method="post">
            <div class="h backgroundTitle"><h1><?php echo $Language->pageHome['profile']; ?></h1></div>
        <section class="profile">
            <?php
            if (isset($_SESSION['id'])) {
                $presets = getPresets($_SESSION['id']);
            }
            if (!isset($presets)) {
                $presets = [];
            }
            foreach ($presets as $preset) {
                echo "<div class='container'>";
                echo "<input type='hidden' name='preset_id' value='" . $preset['id'] . "'>";
                echo "<button type='submit' autocomplete='off' class='profileButton glass' name='profile' value='" . $preset['id'] . "' >";
                echo "<p>" . $preset['title'] . "</p>";
                echo "</button>";
                echo '<input type="submit" class="sub" value='.$Language->pageHome['del'].' name="delete_preset_' . $preset['id'] . '" autocomplete="off" class="submit-btn">';

                ?>

                <br><label>
                    <input type='radio' name='preset' value='<?php echo $preset['id']; ?>'>
                </label>

                <?php
                echo '</div>';
            }
            ?>
            <div class="glass input">
                <label>
                    <input type="text" placeholder="<?php echo $Language->pageHome['preset name']; ?>" name="name" autocomplete='off'>
                </label>
                <input type="submit" class="sub" value="<?php echo $Language->pageHome['submit']; ?>" name="send">
            </div>
        </section>

        <section>
            <div class="backgroundTitle">
                <h1><?php echo $Language->pageHome['template']; ?></h1>
            </div>
            <section class="template">
                    <div class="container">
                        <div class="glass2">
                            <img src="../../img/cv1.png " alt="template1" class="cv">
                        </div>
                        <label>
                            <input type="radio" name="template" value="template1">
                        </label>
                    </div>

                    <div class="container">
                        <div class="glass2">
                            <img src="../../img/cv2.png " alt="template1" class="cv">
                        </div>
                        <label>
                            <input type="radio" name="template" value="template2">
                        </label>
                    </div>

                    <div class="container">
                        <div class="glass2">
                            <img src="../../img/cv3.png " alt="template1" class="cv">
                        </div>
                        <label>
                            <input type="radio" name="template" value="template3">
                        </label>
                    </div>
            </section>
            <div class="width">
                <input type="submit" class="convert" value="<?php echo $Language->pageHome['convert']; ?>" name="convert">
            </div>
        </section>
        </form>
    </section>
    <?php
}
?>
</body>
</html>
