<?php
include "../../server/Language.php";
global $Language;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $Language->page404['title']; ?></title>
    <link rel="stylesheet" href="../css/404.css">
</head>

<body>

    <div class="center">
        <img src="../../img/error404.svg" alt="<?php echo $Language->page404['error']; ?>">
    </div>
    <a href="Home.php">
        <h1><?php echo $Language->page404['return']; ?></h1>
    </a>
</body>
</html>
