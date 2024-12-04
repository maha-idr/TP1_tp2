<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="maha.php" method="post">
        <label> Nom :</label>
        <input type="text"name="name"> <BR><BR>
        <label> Age:</label>
        <input type="number"name="age"><BR> <BR>
        <input type="submit" value="Envoyer">

    </form>
    <form action="maha.php" method="post"> 

    <label for="couleur">Choisissez votre couleur:</label>
    <select name="couleur" id="couleur">
        <option value="vert">vert</option>
        <option value="rose">rose</option>
        <option value="rouge">rouge</option>
        <option value="jaune">jaune</option>
    </select>
    <br><br>
    <input type="submit" value="Envoyer">
</form>

 <form action="maha.php" method="GET" >
  <label >entrer le premier nombre:</label>
   <input type ="text" name="number1"> <br> <br>
    <label >entrer le deuxieme nombre:</label>
      <input type ="text" name="number2"> <br> <br>
    <input type="submit" value="Envoyer">
 </form>

 <form action="maha.php" method="post"> 

    <label for="compte">Choisissez votre type de compte:</label>
    <select name="compte" id="compte">
        <option value="Administrateur">Administrateur</option>
        <option value="Utilisateur">Utilisateur</option>
        
    </select>
   
    <input type="submit" value="Envoyer">
</form>


</body>
</html>




<?php
$etudiant =  array("nom"=>"IDAR","prenom"=>"MAHA","matricule" =>"BE1245");

foreach ($etudiant as $key => $value) {
    echo "{$key}={$value} <br>";
 } 
$etudiant["note"]=12;
 
$produit = array(
array(  
   "nom"=>"twix" ,
   "prix"=>10
),
array(  
    "nom"=>"Mars" ,
    "prix"=>12
 ),
 array(  
    "nom"=>"kitkat" ,
    "prix"=>11
 )
);

 foreach ($produit as $produit_details) {
    echo "Nom: " . $produit_details['nom'] . " - Prix: " . $produit_details['prix'] . " <br>";
} 
$scores = array("etudiant1"=>12,"etudiant2"=>14,"etudiant3"=>11,"etudiant4"=>12,"etudiant5"=>16);
$sum=array_sum($scores);
$moyenne=$sum/count($scores);
echo "Les scores des étudiants :<br>";
foreach ($scores as $key => $value) {
    echo "{$key} : {$value} <br>";
}
echo "<br>La moyenne des scores est : " .$moyenne ."<br> " ;


$populations = array(  "France" => 67390000,  "Japon" => 125584838,"Canada" => 38008005,"Mexique" => 128933000);


arsort($populations);


foreach ($populations as $key => $value) {
    echo "{$key} : {$value} <br>";
}

echo "<br>Ce tableau est trié par population en ordre décroissant. <BR>";

if (isset($_POST['name']) && isset($_POST['age'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    if ((int)$age == $age && $age > 0) {
        echo "Bienvenue, {$name}, vous avez {$age} ans !";
    } else {
        echo "Erreur : L'âge doit être un entier strictement supérieur à 0.";
    }
}
if (isset($_POST['couleur']) ){
    $couleur = $_POST['couleur'];
    echo "Votre couleur préférée est : {$couleur}";
}
if (isset($_GET['number1']) && isset($_GET['number2'])) {
    $number1 = $_GET['number1'];
    $number2 = $_GET['number2'];
    $somme =  $number1 + $number2;
    echo "LA SOMME  est : {$number1} +{$number2} ={$somme}";
}

if (isset($_POST['compte']) ) {
    $compte = $_POST['compte'];
    if($compte=='Administrateur'){
        echo"Bienvenue, administrateur !";}
     else {
     echo" 'Bienvenue, utilisateur simple";   
     }
    }


?>




