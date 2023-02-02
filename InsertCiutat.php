<!DOCTYPE HTML>
<html>

<head>
    <style>
        .error {
            color: #FF0000;
        }
    </style>
</head>

<body>

    <?php
    include "dades_connexio_BD.php";
    include "classe_client.php";


    ?>

    <h2>Insert en tabla Ciutat</h2>
    <form method="GET">
        <label for="Ciudad">Ciudad:</label>
        <input type="text" name="Ciudad">
        <br>
        <br>
        <input type="submit" name="submit" value="Enviar form">
        <br>
        <br>
    </form>


    <?php

    $Nom = $_GET["Ciudad"];


    include "Connexio_BD.php";
    try {

        $sql = "INSERT INTO Ciutat (Nom)
    VALUES ('$Nom')";
        // use exec() because no results are returned
        $conn->exec($sql);
        $last_id = $conn->lastInsertId();
        echo "Nova entrada a la base de dades creada, darrer ID creat: " . $last_id;
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;
    ?>

</body>

</html>