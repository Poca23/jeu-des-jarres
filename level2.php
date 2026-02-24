<?php
// Niveau 2 — Trouver 3 clés de suite

echo "\n=============================\n";
echo "         NIVEAU 2\n";
echo "=============================\n";
echo "Objectif : trouver 3 clés consécutives.\n";
echo "-----------------------------\n";
echo "Scores actuels :\n";
echo "  Niveau 1 : " . ($scores['1'] ?? 'pas encore joué') . "\n";
echo "  Niveau 2 : " . ($scores['2'] ?? 'pas encore joué') . "\n";
echo "  Niveau 3 : " . ($scores['3'] ?? 'pas encore joué') . "\n";
echo "=============================\n\n";

$essais = 0;
$clesuite = 0;
$gagne = false;

while (!$gagne) {
    $jarres = ['serpent', 'clé', 'clé', 'clé', 'clé'];
    shuffle($jarres);

    // Saisie validée
    do {
        echo "Clés consécutives : {$clesuite}/3 — Choisissez une jarre (1 à 5) : ";
        $saisie = trim(fgets(STDIN));
    } while (!is_numeric($saisie) || (int) $saisie < 1 || (int) $saisie > 5);

    $choix = (int) $saisie;
    $essais++;

    if ($jarres[$choix - 1] === 'serpent') {
        echo "Aïe ! Un serpent ! retour à zéro.\n\n";
        $clesuite = 0;
    } else {
        $clesuite++;
        echo "Clé trouvée ! ({$clesuite}/3)\n";
        if ($clesuite === 3) {
            echo "Bravo ! 3 clés consécutives, quelle chance !\n";
            $gagne = true;
        }
    }
}

$scores['2'] = $essais;

echo "\n-----------------------------\n";
echo "Scores mis à jour :\n";
echo "  Niveau 1 : " . ($scores['1'] ?? 'pas encore joué') . "\n";
echo "  Niveau 2 : " . $scores['2'] . " essais\n";
echo "  Niveau 3 : " . ($scores['3'] ?? 'pas encore joué') . "\n";
echo "-----------------------------\n";
echo "→ Passage au niveau 3...\n\n";
