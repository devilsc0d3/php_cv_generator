<?php
use Dompdf\Dompdf;
use Dompdf\Options;

include 'home_service.php';
include 'home_middleware.php';

session_start();

/**
 * @var PDO $bdd Connexion à la base de données.
 */
$bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;', 'root', "");

/**
 * Redirige vers la page de profil lorsqu'un formulaire de profil est soumis.
 */
if (isset($_POST['profile'])) {
    $_SESSION['cv_id'] = $_POST['profile'];
    header('Location: profile.php');
}

/**
 * Convertit le CV en PDF lorsqu'une demande de conversion est soumise.
 */
if (isset($_POST['convert'])) {
    $_SESSION['cv_idg'] = $_POST['preset'] ?? "";
    $_SESSION['template'] = $_POST['template'] ?? "";
    if (radioChecked($_SESSION['cv_idg'], $_SESSION['template'])) {
        savePdfToFile($_POST['template'] . '.php');
    } else {
        echo '<p class="errorPreset">Please select a preset and template</p>';
    }
}

/**
 * Traite l'ajout d'un nouveau preset.
 */
if (isset($_POST['send'])) {
    if (isPresetUsed($_POST['name'], $_SESSION['id'])) {
        echo '<p class="errorPreset">name of preset is already used</p>';
    } else if (!isPresetEmpty($_POST['name'])) {
        addPreset($_SESSION['id'], $_POST['name']);
        header('Location: home.php');
    } else {
        echo '<p class="errorPreset">name of preset is empty</p>';
    }
}

/**
 * Supprime l'utilisateur et tous ses presets.
 */
if (isset($_POST['delete'])) {
    deleteUser($_SESSION['id']);
    deleteAllPresetOfUser($_SESSION['id']);
    header('Location: logout.php');
}

/**
 * Supprime un preset et toutes ses données associées.
 */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'delete_preset_') === 0) {
            $presetId = substr($key, 14);
            deletePresetAndData($presetId);
            header('Location: Home.php');
        }
    }
}

/**
 * Enregistre le CV converti au format PDF sur le serveur.
 * @param string $template Le modèle de CV à utiliser.
 */
function savePdfToFile($template)
{
    require_once '../../uploads/dompdf/autoload.inc.php';

    $dompdf = new Dompdf();
    $options = new Options();
    $options->set('isPhpEnabled', true);
    $options->set('isHtml5ParserEnabled', true);
    $options->set('isRemoteEnabled', true);
    $options->set('isJavascriptEnabled', true);
    $options->set('isCssFloatEnabled', true);
    $options->set('defaultFont', 'Arial');
    $options->set('isFontSubsettingEnabled', true);

    $options->set('marginTop', 0);
    $options->set('marginBottom', 0);
    $options->set('marginLeft', 0);
    $options->set('marginRight', 0);
    $options->set('paddingTop', 0);
    $options->set('paddingBottom', 0);
    $options->set('paddingLeft', 0);
    $options->set('paddingRight', 0);

    $dompdf->setOptions($options);

    ob_start();
    include "../../template/models/" . $template;
    $html = ob_get_clean();
    $dompdf->loadHtml($html);

    $dompdf->setPaper('A4');
    $dompdf->render();

    // Générer un nom de fichier unique pour le PDF
    $pdfFileName = uniqid() . ".pdf";

    // Chemin où enregistrer le PDF sur le serveur
    $pdfFilePath = '../../uploads/history/' . $pdfFileName;
    addHistory($_SESSION['id'], $pdfFileName);
    // Enregistrer le PDF sur le serveur
    file_put_contents($pdfFilePath, $dompdf->output());

    $dompdf->stream('cv.pdf');
    header('Location: home.php');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // delete history
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'delete_history_') === 0) {
            $historyId = substr($key, 15);
            $path = '../../uploads/history/' . getHistoryId($historyId)['cv'];
            if (file_exists($path)) {
                if (unlink($path)) {
                    header('Location: home.php');
                } else {
                    echo "Erreur lors de la suppression du fichier : " . error_get_last()['message'];
                }
            }
            deleteHistory($historyId);
        }
    }
}