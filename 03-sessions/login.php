<?php

    require_once "config/app.php";
    require_once "config/database.php";


    if($_POST){
        $email = $_POST['email'];
        $pass = $_POST['password'];
        //echo var_dump($_POST);

        if(loginUser($conx, $email, $pass)){
            header("Location: dashboard.php");
        } else{
            header("Location: index.php");
        }
    }
