<?php
$id = $_POST['id'];        // Récupère l'identifiant à partir des données POST du formulaire.
$nom = $_POST['nom'];      // Récupère le nom à partir des données POST du formulaire.
$prenom = $_POST['prenom'];  // Récupère le prénom à partir des données POST du formulaire.
$age = $_POST['age'];      // Récupère l'âge à partir des données POST du formulaire.
$moyenne = $_POST['moyenne'];  // Récupère la moyenne à partir des données POST du formulaire.

$servername = "localhost";  // Définit le nom du serveur de base de données (dans ce cas, en local).
$username = "root";         // Définit le nom d'utilisateur de la base de données.
$password = "";             // Définit le mot de passe de la base de données (vide dans ce cas).

// Pour la création de la base de données
try {
  // Établit une connexion à la base de données "isetta" en utilisant PDO.
  $conn = new PDO("mysql:host=$servername;dbname=isetta", $username, $password);
  
  // Prépare la requête d'insertion SQL avec les données récupérées du formulaire.
  $sql = "INSERT INTO etudiants (id, nom, prenom, age, moyenne)
  VALUES ('$id', '$nom', '$prenom', '$age', '$moyenne')";
  
  // Utilise exec() car aucune valeur de résultat n'est renvoyée.
  $conn->exec($sql);
  
  // Redirige vers la page "index.php" après l'insertion réussie.
  header('location:index.php');
} catch(PDOException $e) {
  // En cas d'échec de la connexion à la base de données, affiche un message d'erreur.
  echo "Connection failed: " . $e->getMessage();
}
?>
