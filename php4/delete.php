<?php
$id = $_GET['id'];

$servername = "localhost";  // Définit le nom du serveur de base de données .
$username = "root";         // Définit le nom d'utilisateur de la base de données.
$password = "";             // Définit le mot de passe de la base de données (vide dans ce cas).
//pour creation de data base
try {
  // Établit une connexion à la base de données "isetta" en utilisant PDO.
  $conn = new PDO("mysql:host=$servername;dbname=isetta", $username, $password);
  // Prépare une requête SQL pour supprimer l'enregistrement de la table "etudiants" où l'ID correspond à la valeur récupérée.
  $sql = "delete from etudiants where id=$id";

  // use exec() because no results are returned
  // Exécute la requête préparée.
  $conn->exec($sql);
  // Redirige vers la page "index.php" après la suppression réussie.
  header('location:index.php');
} catch(PDOException $e) {
  // En cas d'échec de la connexion à la base de données, affiche un message d'erreur.
  echo "Connection failed: " . $e->getMessage();
}
?>