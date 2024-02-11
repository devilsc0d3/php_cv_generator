<?php
$bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;','root',"");
session_start();
use Dompdf\Dompdf;

if (isset($_SESSION['id'])) {
    $presets = getPresets();
}

if (isset($_POST['cvs'])) {
    $_SESSION['cv_id'] = $_POST['cvs'];

    header('Location: newCV.php');
}

if(isset($_POST['convert'])) {
    $_SESSION['cv_idg'] = $_POST['preset'];

    $_SESSION['template'] = $_POST['template'];
    pdf($_POST['template'] . '.php');
//    header('Location: generate.php');

}


function pdf($template)
{
    require_once '../../dompdf/autoload.inc.php';
    $dompdf = new Dompdf();
    ob_start();
    require_once $template;
    $html = ob_get_clean();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    $dompdf->stream('cv.pdf');
}

if (isset($_POST['send'])) {
   addPreset($_SESSION['id'],$_POST['name']);
   header('Location: home.php');

}

if (isset($_POST['delete'])) {
    deleteUser($_SESSION['id']);
    session_destroy();
    header('Location: login.php');
}


function addPreset($id,$name)
{
    $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;','root',"");
    $addPreset = $bdd->prepare('INSERT INTO preset(id_user,title) VALUES(?, ?)');
    $addPreset->execute(array($id,$name));
}

function getPresets()
{
    $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;','root',"");
    $getPresets = $bdd->prepare('SELECT * FROM preset where id_user = ? ');
    $getPresets->execute(array($_SESSION['id']));
    return $getPresets;
}

function deleteUser($id)
{
    $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;','root',"");
    $deleteUser = $bdd->prepare('DELETE FROM user WHERE id = ?');
    $deleteUser->execute(array($id));
}