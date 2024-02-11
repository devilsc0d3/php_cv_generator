<?php

use Dompdf\Dompdf;

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
    $_SESSION['cv_idg'] = $_POST['preset'];
    $_SESSION['template'] = $_POST['template'];
    pdfGenerator($_POST['template'] . '.php');
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

function pdfGenerator($template)
{
    require_once '../../uploads/dompdf/autoload.inc.php';

    $dompdf = new Dompdf();
    ob_start();
    include "../../template/model/" . $template;
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

