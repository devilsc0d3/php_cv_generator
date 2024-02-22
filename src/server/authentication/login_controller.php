<?php
include 'user_middleware.php';
include 'user_service.php';

session_start();

/**
 * Vérifie les données de connexion utilisateur.
 * Si les données sont valides, connecte l'utilisateur et redirige vers la page d'accueil.
 * Sinon, affiche un message d'erreur.
 */
if (isset($_POST['send'])) {
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mdp = sha1($_POST['mdp']);

    controller($mdp, $pseudo);
    $getUser = getUser($pseudo, $mdp);

    if ($getUser->rowCount() > 0) {
        $user = $getUser->fetch();
        $_SESSION['pseudo'] = $pseudo;
        $_SESSION['mdp'] = $mdp;
        $_SESSION['id'] = $user['id'];
        $_SESSION['lang'] = 'english';
        $_SESSION['role'] = $user['role'];

        header('Location: Home.php');
    } else {
        echo "<p class='error'>bad user or password</p>";
    }
}

/**
 * Contrôleur pour les données de connexion utilisateur.
 * Vérifie que le pseudo et le mot de passe ne sont pas vides.
 * @param string $mdp Le mot de passe à vérifier.
 * @param string $pseudo Le pseudo à vérifier.
 * @return array Tableau contenant les erreurs rencontrées.
 */
function controller($mdp, $pseudo): array
{
    $errors = [];
    $middlewares = [
        pseudoIsEmpty($pseudo),
        passwordIsEmpty($mdp),
    ];
    foreach ($middlewares as $result) {
        if ($result !== null) {
            $errors[] = $result;
        }
    }
    return $errors;
}
