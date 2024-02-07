<?php
include '../../server/cvs/cvs_controller.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>cv</title>
</head>
<style>

    h1 {
        margin: 50px;
        color: #0372B2;
        font-size: 50px;
        font-family: "OCR A Extended", monospace;
        text-align: center;
    }

    h2 {
        margin: 50px;
        color: #0372B2;
        font-size: 30px;
        font-family: "OCR A Extended", monospace;
        text-align: center;
    }

    body {
        display: flex;
        justify-content: center;
        align-items: center;
        background: rgb(228, 250, 255);
    }
    form {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    input {
        padding: 10px;
        border: none;
        border-radius: 5px;
        outline: none;
        margin: 10px;
        width: 500px;
        /*font-size: 20px;*/
    }
    input[type="submit"] {
        background-color: #0372B2;
        color: white;
        cursor: pointer;
    }
    input[type="submit"]:hover {
        background-color: #08BDBA;
    }
    input[type="submit"]:active {
        background-color: #0372B2;
    }
    input[type="text"]:focus {
        border: 1px solid #0372B2;
    }
    input[type="text"]::placeholder {
        color: #0372B2;
    }
    input[type="submit"] {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        outline: none;
        cursor: pointer;
    }
    input[type="submit"]:hover {
        background-color: #08BDBA;
    }
    input[type="submit"] {
        background-color: #0372B2;
        color: white;
    }
    input[type="submit"]:hover {
        background-color: #08BDBA;
    }
    input[type="submit"] {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        outline: none;
        cursor: pointer;
    }
    input[type="submit"]:hover {
        background-color: #08BDBA;
    }

    input[type="submit"] {
        background-color: #0372B2;
        color: white;
    }
    input[type="submit"]:hover {
        background-color: #
    }

</style>
<body>
    <div>
        <h1>Create new CV</h1>
        <div class="general">
            <h2>General</h2>
            <form action="" method='POST'>
                <input type="text" name="name" placeholder="nom">
                <input type="text" name="firstname" placeholder="prenom">
                <input type="text" name="addresse" placeholder="adresse">
                <input type="tel" name="phone" placeholder="telephone">
                <input type="email" placeholder="email">
                <input type="date" placeholder="date de naissance">
                <input type="text" placeholder="permis de conduire">
                <input type="submit" value="Send" name='send' autocomplete="off" class="submit-btn">
            </form>
        </div>

        <div class="education">
            <h2>Education</h2>
            <form method="post">
                <input type="text" name="education" placeholder="name of etablisment">
                <input type="text" name="desc" placeholder="description">
                <input type="date" name="begin_date" placeholder="date">
                <input type="date" name="end_date" placeholder="date">
                <input type="submit" value="Send" name='send' autocomplete="off" class="submit-btn">
            </form>
        </div>
        <div class="hobbies">
            <h2>Hobbies</h2>
            <form method="post">
                <input type="text" name="hobbies" placeholder="name of etablisment">
                <input type="submit" value="Send" name='send' autocomplete="off" class="submit-btn">
            </form>
        </div>

        <div class="prof">
            <h2>experience profesionnel</h2>
            <form method="post">
                <input type="text" name="education" placeholder="name of entreprise">
                <input type="text" name="desc" placeholder="description">
                <input type="date" name="begin_date" placeholder="date">
                <input type="date" name="end_date" placeholder="date">
                <input type="submit" value="Send" name='send' autocomplete="off" class="submit-btn">
            </form>
        </div>
    </div>
</body>
</html>
