<?php

use Dompdf\Dompdf;
use Dompdf\Options;

include 'home_service.php';
include 'home_middleware.php';

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;','root',"");

if (isset($_POST['profile'])) {
    $_SESSION['cv_id'] = $_POST['profile'];
    header('Location: profile.php');
}

if(isset($_POST['convert'])) {
    $_SESSION['cv_idg'] = $_POST['preset'] ?? "";
    $_SESSION['template'] = $_POST['template'] ?? "";
    if (radioChecked($_SESSION['cv_idg'],$_SESSION['template'])) {
        pdfGenerator($_POST['template'] . '.php');
//        savePdfToFile($_POST['template'] . '.php');
    } else {
        echo '<p class="errorPreset">Please select a preset and template</p>';
    }
}

if (isset($_POST['send'])) {
    if (isPresetUsed($_POST['name'],$_SESSION['id'])) {
        echo '<p class="errorPreset">name of preset is already used</p>';
    } else if (!isPresetEmpty($_POST['name'])) {
        addPreset($_SESSION['id'],$_POST['name']);
        header('Location: home.php');
    } else {
        echo '<p class="errorPreset">name of preset is empty</p>';
    }
}

if (isset($_POST['delete'])) {
    deleteUser($_SESSION['id']);
    deleteAllPresetOfUser($_SESSION['id']);
    header('Location: logout.php');
}

//function pdfGenerator($template)
//{
//    require_once '../../uploads/dompdf/autoload.inc.php';
//
//    $dompdf = new Dompdf();
//    ob_start();
//    include "../../template/models/" . $template;
//    $html = ob_get_clean();
//    $dompdf->loadHtml($html);
//    $dompdf->setPaper('A4');
//    $dompdf->render();
//    $dompdf->stream('cv.pdf');
//}


function pdfGenerator($template)
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
    $pdfFilePath = $pdfFileName;

    // Enregistrer le PDF sur le serveur
    file_put_contents($pdfFilePath, $dompdf->output());

    // Retourner le lien web vers le PDF
}



//
//function savePdfToDatabase($template)
//{
//    require_once '../../uploads/dompdf/autoload.inc.php';
//
//    $dompdf = new Dompdf();
//    $options = new Options();
//    $options->set('isPhpEnabled', true);
//    $options->set('isHtml5ParserEnabled', true);
//    $options->set('isRemoteEnabled', true);
//    $options->set('isJavascriptEnabled', true);
//    $options->set('isCssFloatEnabled', true);
//    $options->set('defaultFont', 'Arial');
//    $options->set('isFontSubsettingEnabled', true);
//
//    $options->set('marginTop', 0);
//    $options->set('marginBottom', 0);
//    $options->set('marginLeft', 0);
//    $options->set('marginRight', 0);
//    $options->set('paddingTop', 0);
//    $options->set('paddingBottom', 0);
//    $options->set('paddingLeft', 0);
//    $options->set('paddingRight', 0);
//
//    $dompdf->setOptions($options);
//
//    ob_start();
//    include "../../template/models/" . $template;
//    $html = ob_get_clean();
//    $dompdf->loadHtml($html);
//
//    $dompdf->setPaper('A4');
//    $dompdf->render();
//
//    // Get the generated PDF as binary string
//    $pdfContent = $dompdf->output();
//    $connection = new PDO('mysql:host=localhost;dbname=base;charset=utf8;','root',"");
//
//    // Prepare the SQL statement
//    $stmt = $connection->prepare("INSERT INTO history (cv) VALUES (?)");
//
//    // Bind the binary data to the parameter
//    $stmt->bindParam(1, $pdfContent, PDO::PARAM_LOB);
//
//    // Execute the query
//    $stmt->execute();
//}
