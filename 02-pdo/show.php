<?php

    require_once "config/app.php";
    require_once "config/database.php";

    $pet = getPet($conx, $_GET['id']);

?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Pet</title>
    <link rel="stylesheet" href="<?php echo URLCSS . "/master.css"?>">


</head>


<body>
    <main>
    <header class="nav level-1">
            <a href="index.php">
                <img src="<?php echo URLIMGS . "/ico-back.svg"?>" alt="back">
            </a>
                <img src="<?php echo URLIMGS . "/logo.svg"?>" width="200px" alt="Logo">
            
            <a href="" class="mburger">
                <img src="<?php echo URLIMGS . "/mburger.svg"?>" alt="Hamburguer">
            </a>
        </header>
        <section class="show">
            <h1>Show Pet</h1>
            <img src="<?php echo URLIMGS . "/" . $pet['photo']?>" alt="Photo" class="photo">
            <div class="info">
                <p><?=$pet['name']?></p>
                <p><?=$pet['kind']?></p>
                <p><?=$pet['age']?> Years old</p>
                <p><?=$pet['weight']?> Lbs</p>
                <p><?=$pet['breed']?></p>
                <p><?=$pet['location']?></p>
            </div>
        </section>

        <script src="../../js/sweetalert2.js"></script>
        <script src="../../js/jquery-3.7.1.min.js"></script>


   </main>
</body>
</html>