<?php

$inventaire = [];
$victoire = 3;
$premiereTentative = true;

echo "Choissisez un niveau de difficulté :\n";
echo "facile : 1 serpent dans les jarres.\n";
echo "moyen : 2 serpent dans les jarres.\n";
echo "difficile : 3 serpent dans les jarres.\n";

$difficulty = readline("Entrez 1 pour facile, 2 pour moyen ou 3 pour difficile.");

if (!in_array($difficulty, [1, 2, 3])) {
    echo "Choix invalide ! Le jeu démarre en facile\n";
    $difficulty = 1;
}

while(count($inventaire) < $victoire) {

    if($premiereTentative) {
        echo "\nBienvenue sur le jeu des jarres\n";
        $premiereTentative = false;
    }else {
        echo "\nNouvelle tentative\n";
    }

    $jarres_content = [];

    for ($i = 0; $i < $difficulty; $i++) {
        $jarres_content[] = "serpent";
    }

    for ($i = count($jarres_content); $i < 6; $i++) {
        $jarres_content[] = "clé";
    }

    shuffle($jarres_content);

    $jarres = [0, 1, 2, 3, 4, 5];


    while(!empty($jarres)) {
        echo "Nombre de jarres restante :".count($jarres)."\n";

        echo "Selectionnez une jarre entre 1 et 6.";
        $choix = readline();

         if ($choix === "q") {
            echo "Vous avez quitté le jeu.\n";
            exit;
        }
    
        if (!in_array($choix, ["1", "2", "3", "4", "5", "6"])) {
            echo "Le choix est invalide. Tapez un numéro entre 1 et 6.";
            continue;
        }
        
        $index = $choix - 1;

        if (!in_array($index, $jarres)) {
            echo "Vous avez déjà choisi cette jarre, prenez en une autre.\n";
            continue;
        }

        $jarres = array_diff($jarres, [$index]);
        $resultat = $jarres_content[$index];

        if ($resultat === "clé") {
            echo "Bien joué ! Vous avez trouvé une clé !\n";
            $inventaire[] = "clé";

            if (count($inventaire) >= $victoire) {
                break 2;
            }
        } else {
            echo "Perdu, le serpent vous a mordu !\n";
            $inventaire = [];
            break;
        }

        echo "Vous avez : ".count($inventaire)."/".$victoire." clés.\n";
    }
}

echo "Félicitation vous avez gagné, le niveau $difficulty est terminé !";