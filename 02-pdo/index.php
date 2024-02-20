<?php

    require_once "config/app.php";
    require_once "config/database.php";

    $pets = getAllPets($conx);

?>



<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Module Pets</title>
    <link rel="stylesheet" href="<?php echo URLCSS . "/master.css"?>">


</head>


<body>
    <main>
        <header class="nav level-0">
            <a href="../dashboard.html">
                <img src="<?php echo URLIMGS . "/ico-back.svg"?>" alt="back">
            </a>
            <img src="<?php echo URLIMGS . "/logo.svg"?>" width="200px" alt="Logo">
            
            <a href="" class="mburger">
                <img src="<?php echo URLIMGS . "/mburger.svg"?>" alt="Hamburguer">
            </a>
        </header>
        <section class="module">
            <h1>MODULE PETS</h1>
            <a class="add" href="add.html">
                <img src="<?php echo URLIMGS . "/ico-add.svg"?>"alt="Add" width="30px">
                Add Pet
            </a>
            <table>
                <tbody>
                <?php foreach($pets as $pet): ?>
                    <tr>
                        <td><img src="<?php echo URLIMGS . "/icopet.svg"?>" alt="Pet"></td>
                        <td>
                            <span><?php echo $pet['name'] ?></span>
                            <span><?php echo $pet['kind'] ?></span>
                        </td>
                        <td>
                            <a href="show.html" class="show">
                                <img src="<?php echo URLIMGS . "/search.svg"?>"alt="">
                            </a>
                            <a href="edit.html" class="edit">
                                <img src="<?php echo URLIMGS . "/pen.svg"?>" alt="">
                            </a>
                            <a href="javascript:;" class="delete">
                                <img src="<?php echo URLIMGS . "/delete.svg"?>" alt="">
                            </a>
                        </td>
                    </tr>
                    <tr>
                <?php endforeach ?>
                </tbory>    
            </table>

        </section>
        <script src="../../js/sweetalert2.js"></script>
        <script src="../../js/jquery-3.7.1.min.js"></script>
        <script>
            $(document).ready(function () {
                $('body').on('click', '.delete', function () {
                    Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#7F5539",
                    cancelButtonColor: "#B08968",
                    confirmButtonText: "Yes, delete it!"
                    }).then((result) => {
                    if (result.isConfirmed) {
                    Swal.fire({
                        title: "Deleted!",
                        text: "The user was deleted.",
                        icon: "success",
                        confirmButtonColor: "#7F5539",
                    })
                }                   
            })
        })
    })
        </script>
   </main>
</body>
</html>