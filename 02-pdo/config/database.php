<?php
    //-------------------------------------------
    // Connection
    try {
        $conx = new PDO("mysql:host=".HOST.";dbname=".DBNAME."", USER, PASS);

        //if ($conx) {
        //    echo "<h4> Connection DB Success ✔ </h4>";
        //}
        
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }


    //-------------------------------------------
    // get All Records
    function getAllPets($conx){
        try {
            $sql = "SELECT * FROM pets";
            $stm = $conx->prepare($sql);
            $stm->execute();
            return $stm->fetchAll();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    //-------------------------------------------
    // Add Pet
    function addPet($conx, $data){
        try {
            $sql = "INSERT INTO pets (name, photo, kind, weight, age, breed, location)
            VALUES (:name, :photo, :kind, :weight, :age, :breed, :location)";
            $smt = $conx->prepare($sql);

            if ($smt->execute($data)){
                $_SESSION['msg'] = 'The ' . $data['name'] . ' pet was added sucessfully.';
                return true;
            } else{
                return false;
            }

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    //-------------------------------------------
    // get Record
    function getPet($conx, $id){
        try {
            $sql = "SELECT * FROM pets WHERE id = :id";
            $stm = $conx->prepare($sql);
            //$stm->bindParam(['id' -> $id]);
            //$stm->execute();
            $stm->execute(['id' => $id]);
            return $stm->fetch();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    //-------------------------------------------
    // Update Pet
    function updatePet($conx, $data){
        try {
            if(count($data) == 7){
                $sql = "UPDATE pets SET name=:name, kind=:kind, 
                                    weight=:weight, age=:age, breed=:breed,
                                    location=:location WHERE id = :id";
            } else {
                $sql = "UPDATE pets SET name=:name, photo=:photo, kind=:kind, 
                weight=:weight, age=:age, breed=:breed,
                location=:location WHERE id = :id";
            }
            $smt = $conx->prepare($sql);

            if ($smt->execute($data)){
                $_SESSION['msg'] = 'The ' . $data['name'] . ' pet was updated sucessfully.';
                return true;
            } else{
                return false;
            }

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    //-------------------------------------------
    // delete Records
    function deletePet($conx, $id){
        try {
            $sql = "DELETE FROM pets WHERE id = :id";
            $stm = $conx->prepare($sql);
            if($stm->execute(['id' => $id])){
                $_SESSION['msg'] = 'The pet was deleted sucessfully.';
                return true;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }