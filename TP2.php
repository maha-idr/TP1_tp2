<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche Employé et Connexion</title>
</head>
<body>
<h2>Recherche d'un employé par nom</h2>
<form action="NEW.php" method="post">
    <label for="nom">Nom de l'employé :</label>
    <input type="text" id="nom" name="nom" required>
    <input type="submit" value="Rechercher"> <br><br>
</form>

<h2>Connexion</h2>
<form action="NEW.php" method="post">
    <label>Veuillez saisir votre email :</label>
    <input type="email" name="email" required><br><br>
    <label>Mot de passe :</label>
    <input type="password" name="password" required><br><br>
    <input type="submit" value="Entrer">
</form>
<form action="" method="post">
        
        <input type="checkbox" name="produits[]" value="twix|10"> Twix - 10 dh<br>
        <input type="checkbox" name="produits[]" value="mars|12"> Mars - 12dh<br>
        <input type="checkbox" name="produits[]" value="kitkat|11"> Kitkat - 11dh<br>
        <input type="checkbox" name="produits[]" value="snickers|9"> Snickers - 9dh <br>
        <input type="checkbox" name="produits[]" value="m&m's|8"> M&M's - 8dh <br>
        
        <input type="submit" value="Soumettre">
    </form>
</body>
</html>
<form method="POST" action="NEW.php">
        <label for="commentaire">Votre commentaire :</label><br>
        <textarea name="commentaire" id="commentaire" rows="4" cols="50" required></textarea><br><br>
        <button type="submit">Envoyer</button>
    </form>

<?php
// Tableau des employés
$employes = [
    ["nom" => "Lara", "poste" => "Développeuse Web", "salaire" => 40000],
    ["nom" => "Lilia", "poste" => "Chef de Projet", "salaire" => 55000],
    ["nom" => "Ali", "poste" => "Analyste de Données", "salaire" => 45000],
    ["nom" => "Oualid", "poste" => "Designer UX/UI", "salaire" => 38000],
    ["nom" => "Sophie", "poste" => "Spécialiste SEO", "salaire" => 42000]
];
function calculerSalaireMoyen($employes) {
    $totalSalaire = 0;
    

    foreach ($employes as $employe) {
        $totalSalaire = $totalSalaire + $employe["salaire"];
    }

    $salaireMoyen = $totalSalaire / count($employes);
    return $salaireMoyen;}
    echo "<h3>Informations des employés :</h3>";
foreach ($employes as $employe) {
    echo "Nom : " . $employe["nom"] . "<br>";
    echo "Poste : " . $employe["poste"] . "<br>";
    echo "Salaire : " . $employe["salaire"] . " dh<br><br>";
}

// Calcul et affichage du salaire moyen
$salaireMoyen = calculerSalaireMoyen($employes);
echo "<h3>Salaire moyen des employés :</h3> <br>";
echo $salaireMoyen . " dh <br>";

// Recherche par nom
if (!empty($_POST["nom"])) {
    $searchName = $_POST["nom"];
    $found = false;

    echo "<h3>Résultat de la recherche :</h3>";
    foreach ($employes as $employe) {
        if (strcasecmp($employe["nom"], $searchName) == 0) {
            echo "Nom : " . $employe["nom"] . "<br>";
            echo "Poste : " . $employe["poste"] . "<br>";
            echo "Salaire : " . $employe["salaire"] . " dh<br>";
            $found = true;
            break;
        }
    }

    if (!$found) {
        echo "Aucun employé trouvé avec le nom : $searchName.<br>";
    }
}

// Tableau des informations pour la connexion
$information = [
    ["email" => "Aliab@gmail.com", "password" => "ali1234@"],
    ["email" => "OUALIDRT45@gmail.com", "password" => "oual1234@"],
    ["email" => "Larativ_@gmail.com", "password" => "lara1234@"]
];

// Vérification des informations de connexion
if (!empty($_POST["email"]) && !empty($_POST["password"])) {
    $searchemail = $_POST["email"];
    $searchpassword = $_POST["password"];
    $found = false;
 
    foreach ($information as $info) {
        if (strcasecmp($info["email"], $searchemail) == 0 && $info["password"] === $searchpassword) {
            echo "<h3>Connexion réussie :</h3>";
            echo "Email : " . $info["email"] . "<br>";
            $found = true;
            break;
        }
    }

    if (!$found) {
        echo "<h3>Erreur :</h3> Email ou mot de passe incorrect.<br>";
    }
}

$panier = [
    [
        "nom" => "Pomme",
        "quantite" => 3,
        "prix" => 20
    ],
    [
        "nom" => "Banane",
        "quantite" => 2,
        "prix" => 30
    ],
    [
        "nom" => "Orange",
        "quantite" => 4,
        "prix" => 70
    ]
];

// Fonction pour calculer le total du panier
function calculerTotal($panier) {
    $total = 0;
    foreach ($panier as $produit) {
        $total += $produit['quantite'] * $produit['prix'];
    }
    return $total;
}

// Affichage des détails du panier et du total
echo "Détails du panier :<br>";
foreach ($panier as $produit) {
    echo "- " . $produit['nom'] . " : " . $produit['quantite'] . " x " . number_format($produit['prix'], 2) . " Dh = " . number_format($produit['quantite'] * $produit['prix'], 2) . " Dh<br>";
}

$totalPanier = calculerTotal($panier);
echo "Total du panier : " . number_format($totalPanier, 2) . " Dh<br>";

if (!isset($_SESSION['commentaires'])) {
    $_SESSION['commentaires'] = [];
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['commentaire'])) {
   
    $commentaire = $_POST['commentaire']; 
    $horodatage = date("Y-m-d H:i:s"); // Horodatage actuel

    // Ajouter le commentaire au tableau
    $_SESSION['commentaires'][] = [
        'texte' => $commentaire,
        'date' => $horodatage
    ];
}


// Tableau associatif : villes et leurs températures
$villes = [
    "Paris" => 15,
    "Lyon" => 18,
    "Marseille" => 22,
    "Toulouse" => 20,
    "Lille" => 12
];


function villeTempMax($villes) {
    $villeMax = null;
    $tempMax =null;

    foreach ($villes as $ville => $temperature) {
        if ($temperature > $tempMax) {
            $tempMax = $temperature;
            $villeMax = $ville;
        }
    }

    return ["ville" => $villeMax, "temperature" => $tempMax];
}

// Appel de la fonction pour obtenir le résultat
$resultat = villeTempMax($villes);
$villeMax = $resultat['ville'];
$tempMax = $resultat['temperature'];

// Affichage des résultats
echo "Villes et leurs températures :<br>";
foreach ($villes as $ville => $temperature) {
    echo "- $ville : $temperature °C\n";
}

echo "\nLa ville ayant la température la plus élevée est $villeMax avec $tempMax °C.<br>";
if (isset($_POST['produits']) && !empty($_POST['produits'])) {
    
    $produitsSelectionnes = $_POST['produits'];
    $prixTotal = 0;

    echo "Produits sélectionnés :";
  

   
    foreach ($produitsSelectionnes as $produit) {
        // Divise chaque valeur pour obtenir le nom et le prix
        list($nomProduit, $prixProduit) = explode('|', $produit);
        echo "{$nomProduit} - {$prixProduit}dh";
        $prixTotal += $prixProduit;  // Ajoute le prix du produit au total
    }

    
    echo "Prix total : {$prixTotal}dh";
} else {
    echo "<p>Aucun produit sélectionné.</p>";
}
$etudiants = array(
    "Maha" => array(
        "Mathématiques" => 15,
        "Français" => 13,
        "Histoire" => 18
    ),
    "Jennie" => array(
        "Mathématiques" => 12,
        "Français" => 10,
        "Histoire" => 14
    ),
    "Blaire" => array(
        "Mathématiques" => 17,
        "Français" => 16,
        "Histoire" => 19
    )
);


foreach ($etudiants as $nom => $notes) {
    echo "<h3>État de l'étudiant : {$nom}</h3>";
    
   
    $totalNotes = 0;
    $nombreMatières = count($notes);
    
    foreach ($notes as $matiere => $note) {
        echo "{$matiere} : {$note} <br>";
        $totalNotes += $note;
    }
    
  
    $moyenne = $totalNotes / $nombreMatières;
    
    // Afficher la moyenne
    echo "Moyenne : " . $moyenne . "<br><br>";
}
?>



