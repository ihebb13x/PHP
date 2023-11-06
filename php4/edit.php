<?php

$servername = "localhost";  // Définit le nom du serveur de base de données .
$username = "root";         // Définit le nom d'utilisateur de la base de données.
$password = "";             // Définit le mot de passe de la base de données (vide dans ce cas).
$id = $_GET['id'];         // Récupère l'ID à partir des données GET pour spécifier quel enregistrement doit être modifié.
//pour creation de data base
try {
  // Établit une connexion à la base de données "isetta" en utilisant PDO.
  $conn = new PDO("mysql:host=$servername;dbname=isetta", $username, $password);
  // Prépare une requête SQL pour sélectionner toutes les colonnes de la table "etudiants" où l'ID correspond à la valeur récupérée.
  $stmt = $conn->prepare("select * from etudiants where id=$id");
  // Exécute la requête préparée.
  $stmt->execute();     
  // Récupère les résultats de la requête dans un tableau.
  $result = $stmt->fetchAll();
  
?>

<form action="modify.php" method="post">
        <h1>New student</h1>
        <label for="">id</label>
        <input type="number" name="id"><br>
        <label for="">nom</label>
        <input type="text" name="nom" value="<?php echo $result[0]['nom'] ?>"><br>
        <label for="">prenom</label>
        <input type="text" name="prenom" value="<?php echo $result[0]['prenom'] ?>"><br>
        <label for="">age</label>
        <input type="number" name="age" value="<?php echo $result[0]['age'] ?>"><br>
        <label for="">moyenne</label>
        <input type="text" name="moyenne" value="<?php echo $result[0]['moyenne'] ?>"><br>
        <br><br>
        <!-- Champ caché pour transmettre l'ID de l'étudiant à modifier lors de la soumission -->
        <input type="hidden" name="id" value="<?php echo $result[0]['id'] ?>">
        <!-- Bouton de soumission du formulaire pour effectuer la modification -->
        <input type="submit" value="Modifier">
        
</form>
<?php
} catch(PDOException $e) {
  // En cas d'échec de la connexion à la base de données, affiche un message d'erreur.
    echo "Connection failed: " . $e->getMessage();
  }
?>
