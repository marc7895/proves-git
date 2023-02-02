<html>
<?php
class Client
{

  public function connectar_bd($servername, $username, $password)
  {
    try {
      $conn = new PDO("mysql:host=$servername;dbname=pelicules", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "Connected successfully";
    } catch (PDOException $e) {
      echo "Connection failed2: " . $e->getMessage();
    }
    return $conn;
  }
  public function inserir($servername, $username, $password, $nom, $email, $website, $comments, $gender)
  {
    $conn = $this->connectar_bd($servername, $username, $password);
    try {
      $conn = new PDO("mysql:host=$servername;dbname=clients", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "Connected successfully";
    } catch (PDOException $e) {
      echo "Connection failed2: " . $e->getMessage();
    }
    try {
      $sql = "INSERT INTO client (nom, email, website, comments, gender) VALUES ('$nom','$email','$website','$comments','$gender')";
      // use exec() because no results are returned
      $conn->exec($sql);
      $last_id = $conn->lastInsertId();
    } catch (PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }
    $conn = null;
  }


  public function consultaTots($servername, $username, $password)
  {
    $conn = $this->connectar_bd($servername, $username, $password);

    try {
      $stmt = $conn->prepare("SELECT * FROM client");
      $result = $stmt->execute();
      $conn = null;
      return ($stmt);
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
  }

  function modificar($servername, $username, $password, $id, $nom, $email, $website, $comments, $gender)
  {
    $conn = $this->connectar_bd($servername, $username, $password);
    try {

      $sql = "UPDATE client SET nom='$nom' ,
    email='$email', gender='$gender', website='$website',
    comments='$comments'
    WHERE id='$id'";

      // Prepare statement
      $stmt = $conn->prepare($sql);

      // execute the query
      $stmt->execute();
      $conn = null;
      // echo a message to say the UPDATE succeeded
      return $stmt->rowCount();
    } catch (PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;

  }

  function eliminar($servername, $username, $password, $id)
  {
    $conn = $this->connectar_bd($servername, $username, $password);
    try {

      // sql to delete a record
      $sql = "DELETE FROM client WHERE id='$id'";

      // use exec() because no results are returned
      $conn->exec($sql);
    } catch (PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;
  }
}


?>