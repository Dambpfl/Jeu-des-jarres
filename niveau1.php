<?php

$jarres = [];

for ($i = 0; $i < 4; $i++) {
    $jarres[] = "clé";
}

$jarres[] = "serpent";

shuffle($jarres);

echo "Selectionnez une jarre parmi les 5. Entrez un numéro de 1 à 5.";

$choix = readline();

if (!in_array($choix, ["1", "2", "3", "4", "5"])) {
    echo "Le choix est invalide. Tapez un numéro entre 1 et 5.";
    exit;
}

$index = $choix - 1;
$resultat = $jarres[$index];

if ($resultat === "clé") {
    echo "Bien joué ! Vous avez gagné !\n";
} else {
    echo "Perdu, le serpent vous a mordu !\n";
}

echo "Les jarres contenaient :\n";
foreach($jarres as $i => $contenu) {
    echo "Jarre ".($i+1).": $contenu\n";
}