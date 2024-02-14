<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Moderne</title>
    <style>
        /* Styles CSS pour le CV */
        @page {
            size: 21cm 29.7cm;
            margin: 0;
            padding: 0;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .left-section {
            position: absolute;
            margin: 0 0 0 0;
            width: 30%;
            background-color: #007bff;
            color: #fff;
            border-radius: 0 0 25px 0;
            padding: 20px;
            box-sizing: border-box;
            align-items: center;
            height: 27cm; /* Hauteur d'une page A4 */
        }


        .right-section {
           position: absolute;
            margin: 0 0 0 40%;
        }

        h1, h2, h3 {
            color: #007bff;
            /*margin-top: 80px;*/
        }

        .leftp {
            color: white;
        }

        p {
            /*margin-bottom: 5px;*/
        }

        .glass {
            background-color: rgba(255, 255, 255, 1);
            height: 80px;
            width: 80%;
            padding: 15px;
            border-radius: 8px 25px 8px 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 15px;
        }

        .photo {
            width: 250px;
            border-radius: 100%;
        }
    </style>
</head>
<body>
    <?php
    $user = getInfoUser2($_SESSION['id']);

    function getInfoUser2($id)
        {
            $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;', 'root', "");
            $req = $bdd->prepare('SELECT * FROM user WHERE id = ?');
            $req->execute(array($id));
            return $req->fetch();
        }


    ?>
<!--    TODO extention gd -->
    <div class="left-section">
        <?php
        if ($user['photo'] != '') {
            echo "<img class='photo' src='http://localhost/phpctrl/src/uploads/imgs/IMG-65cbe69c5998c4.93701025.png' alt='User Photo'>";
        }
        ?>
        <p class="leftp"><?php echo $user['name'] ?></p>
        <p class="leftp"><?php echo $user['firstname'] ?></p>
        <p class="leftp"><?php echo $user['address'] ?></p>
        <p class="leftp"><?php echo $user['phone'] ?></p>
        <p class="leftp"><?php echo $user['mail'] ?></p>
        <p class="leftp"><?php echo $user['birth'] ?></p>
        <p class="leftp"><?php echo $user['permisB'] ?></p>


        <h2>Hobbies</h2>
        <?php
        $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;', 'root', "");
        $req = $bdd->prepare('SELECT * FROM hobbies where id_cv = ?');
        $req->execute(array($_SESSION['cv_idg']));
        foreach ($req as $hobbie) {
            echo "<p>" . $hobbie['description'] . "</p>";
        }
        ?>

    </div>
    <div class="right-section">
        <section class="experience">
            <br>
            <h2>Education</h2>
            <?php
            $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;', 'root', "");
            $req2 = $bdd->prepare('SELECT * FROM education where id_cv = ?');
            $req2->execute(array($_SESSION['cv_idg']));
            foreach ($req2 as $hobbie) {
                echo "<div class='glass'>";
                echo "<p>" . $hobbie['name'] . "</p>";
                echo "<p>" . $hobbie['begin'] . "</p>";
                echo "<p>" . $hobbie['end'] . "</p>";
                echo "<p>" . $hobbie['description'] . "</p>";
                echo "</div>";
            }
            ?>
            <br>
            <h2>Experiences</h2>
            <?php
            $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8;', 'root', "");
            $req3 = $bdd->prepare('SELECT * FROM profesional_experience where id_cv = ?');
            $req3->execute(array($_SESSION['cv_idg']));
            foreach ($req3 as $experience) {
                echo "<div class='glass'>";
                echo "<p>" . $experience['title'] . "</p>";
                echo "<p>" . $experience['entreprise'] . "</p>";
                echo "<p>" . $experience['description'] . "</p>";
                echo "<p>" . $experience['begin'] . "</p>";
                echo "<p>" . $experience['end'] . "</p>";
                echo "</div>";
            }
            ?>
        </section>
    </div>

</body>
</html>
