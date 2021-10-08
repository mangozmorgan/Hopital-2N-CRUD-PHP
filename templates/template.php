<!DOCTYPE html>
<html>

<head>
    <title>Gestion template : ob_start()</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <title>Hopital 2N - Le Crud</title>
</head>

<body>
    <header>
        <div class="titleDiv">
            <h1>Hopital 2N</h1>
            <div class="redCross"></div>

        </div>
        <h2><?= $titre ?></h2>
       
    </header>
    <div class="container">
        <?= $rendu ; ?>
    </div>


   
    <footer>
        MVC par Picard Morgan 
    </footer>
</body>

</html>