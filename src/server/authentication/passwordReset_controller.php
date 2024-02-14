<?php
include 'user_service.php';

if (isset($_POST['send'])) {
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mdp = sha1($_POST['newPassword']);
    $mail = htmlspecialchars($_POST['mail']);
    if (check($mail, $pseudo) != null) {
        updatePassword($mail, $mdp, $pseudo);
        header('Location: login2.0.php');
    } else {
        echo '<p class="errorUser">bad email or nickname</p>';
    }
}
?>


