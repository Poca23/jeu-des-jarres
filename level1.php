<?php
// Niveau 1 — Trouver une clé

echo "\n=============================\n";
echo "         NIVEAU 1\n";
echo "=============================\n";
echo "Objectif : trouver la jarre avec la clé.\n";
echo "-----------------------------\n";
echo "Scores actuels :\n";
echo "  Niveau 1 : " . ($scores['1'] ?? 'pas encore joué') . "\n";
echo "  Niveau 2 : " . ($scores['2'] ?? 'pas encore joué') . "\n";
echo "  Niveau 3 : " . ($scores['3'] ?? 'pas encore joué') . "\n";
echo "=============================\n\n";

$essais = 0;
$gagne = false;

while (!$gagne) {
    $jarres = ['serpent', 'clé', 'clé', 'clé', 'clé'];
    shuffle($jarres);

    // Saisie validée
    do {
        echo "Choisissez une jarre (1 à 5) : ";
        $saisie = trim(fgets(STDIN));
    } while (!is_numeric($saisie) || (int) $saisie < 1 || (int) $saisie > 5);

    $choix = (int) $saisie;
    $essais++;

    if ($jarres[$choix - 1] === 'serpent') {
        echo "Aïe ! Un serpent ! Essayez encore :) \n\n";
    } else {
        echo "Bravo ! Vous avez trouvé la clé ! Vous êtes un champion ! \n";
        $gagne = true;
    }
}

$scores['1'] = $essais;

echo "\n-----------------------------\n";
echo "Scores mis à jour :\n";
echo "  Niveau 1 : " . $scores['1'] . " essais\n";
echo "  Niveau 2 : " . ($scores['2'] ?? 'pas encore joué') . "\n";
echo "  Niveau 3 : " . ($scores['3'] ?? 'pas encore joué') . "\n";
echo "-----------------------------\n";
echo "→ Passage au niveau 2...\n\n";
