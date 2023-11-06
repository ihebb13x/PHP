<?php

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$age = $_POST['age'];
$moyenne = $_POST['moyenne'];
$id = $_POST['id'];



$servername = "localhost";
$username = "root";
$password = "";
//pour creation de data base
try {
  // Établit une connexion à la base de données "isetta" en utilisant PDO.
  $conn = new PDO("mysql:host=$servername;dbname=isetta", $username, $password);
  
  $sql = "UPDATE etudiants set nom='$nom',prenom='$prenom',age='$age',moyenne='$moyenne' where id='$id'";
  // use exec() because no results are returned
  $conn->exec($sql);
  header('location:index.php');

} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>