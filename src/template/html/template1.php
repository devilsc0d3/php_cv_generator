<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <section>
        <h1>Hobbies</h1>
        <?php
            $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;', 'root', "");
            $req = $bdd->prepare('SELECT * FROM hobbies where id_cv = ?');
            $req->execute(array(23));
            foreach ($req as $hobbie) {
                echo "<div class='glass'>";
                echo "<p>" . $hobbie['description'] . "</p>";
                echo "</div>";
            }
        ?>
        <h1>Education</h1>
        <?php
            $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;', 'root', "");
            $req2 = $bdd->prepare('SELECT * FROM education where id_cv = ?');
            $req2->execute(array(23));
            foreach ($req2 as $hobbie) {
                echo "<div class='glass'>";
                echo "<p>" . $hobbie['description'] . "</p>";
                echo "</div>";
            }
        ?>
    </section>
</body>
</html>
