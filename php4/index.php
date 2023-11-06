<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
  // Établit une connexion à la base de données "isetta" en utilisant PDO.
  $conn = new PDO("mysql:host=$servername;dbname=isetta", $username, $password);  //dbname nom de bdd
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
  // Prépare une requête SQL pour sélectionner tous les enregistrements de la table "etudiants"
  $stmt = $conn->prepare("SELECT * from etudiants");
  // Exécute la requête préparée.
  $stmt->execute();
  // Récupère tous les résultats de la requête dans un tableau.
  $result = $stmt->fetchAll();
  
  

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        a{
            border:2px solid black;
            padding:8px;
            background-color:#009999;
            text-decoration:none;
          }
          a.c1{
            border:1px solid red;
            padding:8px;
            background-color:#CC0000;
            text-decoration:none;
          }
          a.c2{
            border:1px solid black;
            padding:8px;
            background-color:rgb(120,220,125);
            text-decoration:none;
          }
        a:hover{
          color:blue;
        }
    </style>
</head>
<body>
<h1>liste etudiants</h1>
<a href="ajouter.html">ajouter etudiants</a><br>
<br>


    <table border="2px">
      <tr>
        <th>id</th>
        <th>nom</th>
        <th>prenom</th>
        <th>age</th>
        <th>moyenne</th>
      </tr>

<?php
// Parcours chaque enregistrement d'étudiant dans le tableau $result.
  foreach($result as $etudiants){
    echo "<tr>";
    echo " <td>".$etudiants['id']."</td>";
    echo " <td>".$etudiants['nom']."</td>";
    echo " <td>".$etudiants['prenom']."</td>";
    echo " <td>".$etudiants['age']."</td>";
    echo " <td>".$etudiants['moyenne']."</td>";
    echo "<td>
    
    <a class='c1' href='delete.php?id=$etudiants[id]'>supprimer</a>
    <a class='c2' href='edit.php?id=$etudiants[id]'>modifier</a>
    </td>";
    echo "</tr>";
  }
} catch(PDOException $e) {
  // En cas d'échec de la connexion à la base de données, affiche un message d'erreur.
    echo "Connection failed: " . $e->getMessage();
  }
?>

        
        
  </table>
</body>
</html>