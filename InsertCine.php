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
        <label for="Ciudad">Nombre del cine:</label>
        <input type="text" name="Ciudad">
        <br>
        <br>
        <label for="Ciudad">Nombre de la ciudad:</label>
        <input list="Ciutats" name="Ciutat">
        <datalist id="Ciutats">
            <option value="Manacor">
            <option value="Palma">
        </datalist>
        <br>
        <br>
        <input type="submit" name="submit" value="Enviar form">
        <br>
        <br>
    </form>


    <?php

    $Nom = $_GET["Ciudad"];
    $Ciudad = $_GET["Ciutat"];
    switch ($Ciudad) {
        case "Palma":
            $Ciudad = 1;
            break;
        case "Manacor":
            $Ciudad = 2;
            break;
        default:
            echo "introdueix una ciutat";
    } 


    include "Connexio_BD.php";
    try {

        $sql = "INSERT INTO Cine ('Nom', 'Ciutat_idCiutat')
    VALUES ('$Nom', '$Ciudad')";
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