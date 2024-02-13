<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page A4</title>
    <style>
        /* Styles CSS pour le PDF */
        @page body{
            size: 21cm 29.7cm;
            margin: 0;
            padding: 0;
        }
        html {
            margin: 0;
        }

        body {
            margin: 0;
            padding: 0;
        }

        .left-section {
            width: 300%;
            margin: 10px 0 0 40px;
            height: 100px;
            background-color: #007bff;
            color: #fff;
            border-radius: 8px 0 0 8px;
        }

        .middle {
            margin: 0 0 0 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: 100px;
        }
    </style>
</head>
<body>
<div class="left-section">
    <div class="middle">
        <h1>John Doe</h1>
        <p>Web Developer</p>
    </div>
</div>
</body>
</html>
