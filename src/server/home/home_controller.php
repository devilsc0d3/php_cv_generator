<?php

use Dompdf\Dompdf;

include 'home_service.php';

//use Dompdf\Dompdf;

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
   addPreset($_SESSION['id'],$_POST['name']);
   header('Location: home.php');

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
    include "../../template/model/template1.php";
    $html = ob_get_clean();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    $dompdf->stream('cv.pdf');

}
