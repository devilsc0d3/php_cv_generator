<?php

use Dompdf\Dompdf;
use Dompdf\Options;

include 'home_service.php';
include 'home_middleware.php';

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;','root',"");

if (isset($_SESSION['id'])) {
    $presets = getPresets();
}

if (isset($_POST['profile'])) {
    $_SESSION['cv_id'] = $_POST['profile'];
    header('Location: profile.php');
}

if(isset($_POST['convert'])) {
    $_SESSION['cv_idg'] = $_POST['preset'] ?? "";
    $_SESSION['template'] = $_POST['template'] ?? "";
    if (radioChecked($_SESSION['cv_idg'],$_SESSION['template'])) {
        pdfGenerator($_POST['template'] . '.php');
    } else {
        echo '<p class="errorPreset">Veuillez selectionner un preset et un template</p>';
    }
}

if (isset($_POST['send'])) {
    if (isPresetUsed($_POST['name'],$_SESSION['id'])) {
        echo '<p class="errorPreset">Le nom du preset est déjà utilisé</p>';
    } else if (!isPresetEmpty($_POST['name'])) {
        addPreset($_SESSION['id'],$_POST['name']);
        header('Location: home.php');
    } else {
        echo '<p class="errorPreset">Le nom du preset est vide.</p>';
    }
}

if (isset($_POST['delete'])) {
    deleteUser($_SESSION['id']);
    $_SESSION = array();
    session_destroy();
    header('Location: login.php');
}

//function pdfGenerator($template)
//{
//    require_once '../../uploads/dompdf/autoload.inc.php';
//
//    $dompdf = new Dompdf();
//    ob_start();
//    include "../../template/model/" . $template;
//    $html = ob_get_clean();
//    $dompdf->loadHtml($html);
//    $dompdf->setPaper('A4');
//    $dompdf->render();
//    $dompdf->stream('cv.pdf');
//}


function pdfGenerator($template)
{
    require_once '../../uploads/dompdf/autoload.inc.php';

    // Chargement de Dompdf et configuration des options
    $dompdf = new Dompdf();
    $options = new Options();
    $options->set('isPhpEnabled', true);
    $options->set('isHtml5ParserEnabled', true);
    $options->set('isRemoteEnabled', true);
    $options->set('isJavascriptEnabled', true);
    $options->set('isCssFloatEnabled', true);
    $options->set('defaultFont', 'Arial');
    $options->set('isFontSubsettingEnabled', true);

    // Définition des marges et des paddings à zéro
    $options->set('marginTop', 0);
    $options->set('marginBottom', 0);
    $options->set('marginLeft', 0);
    $options->set('marginRight', 0);
    $options->set('paddingTop', 0);
    $options->set('paddingBottom', 0);
    $options->set('paddingLeft', 0);
    $options->set('paddingRight', 0);

    // Application des options à Dompdf
    $dompdf->setOptions($options);

    // Chargement du contenu HTML
    ob_start();
    include "../../template/model/" . $template;
    $html = ob_get_clean();
    $dompdf->loadHtml($html);

    // Rendu du PDF
    $dompdf->setPaper('A4');
    $dompdf->render();

    // Envoi du PDF au navigateur
    $dompdf->stream('cv.pdf');
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'delete_preset_') === 0) {
            $presetId = substr($key, 14);
            deletePresetAndData($presetId);
            header('Location: Home.php');
        }
    }
}

