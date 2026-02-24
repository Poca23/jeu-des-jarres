<?php
// Niveau 3 — Choisir sa difficulté puis trouver une clé

echo "\n=============================\n";
echo "         NIVEAU 3\n";
echo "=============================\n";
echo "Objectif : choisir une difficulté, puis trouver 3 clés consécutives.\n";
echo "-----------------------------\n";
echo "Scores actuels :\n";
echo "  Niveau 1 : " . ($scores['1'] ?? 'pas encore joué') . "\n";
echo "  Niveau 2 : " . ($scores['2'] ?? 'pas encore joué') . "\n";
echo "  Niveau 3 : " . ($scores['3'] ?? 'pas encore joué') . "\n";
echo "=============================\n\n";

// Choix de la difficulté
do {
    echo "Choisissez une difficulté (1 = facile, 2 = moyen, 3 = difficile) : ";
    $saisie = trim(fgets(STDIN));
} while (!is_numeric($saisie) || (int) $saisie < 1 || (int) $saisie > 3);

$difficulte = (int) $saisie;
$nbSerpents = $difficulte;
$nbCles = 5 - $nbSerpents;
echo "Difficulté {$difficulte} choisie : {$nbSerpents} serpent(s), {$nbCles} clé(s).\n\n";

$essais = 0;
$clesuite = 0;

while ($clesuite < 3) {
    $jarres = array_merge(
        array_fill(0, $nbSerpents, 'serpent'),
        array_fill(0, $nbCles, 'clé')
    );
    shuffle($jarres);

    // Saisie validée
    do {
        echo "Choisissez une jarre (1 à 5) : ";
        $saisie = trim(fgets(STDIN));
    } while (!is_numeric($saisie) || (int) $saisie < 1 || (int) $saisie > 5);

    $choix = (int) $saisie;
    $essais++;

    if ($jarres[$choix - 1] === 'serpent') {
        echo "Aïe ! Un serpent ! Retour à zéro.\n\n";
        $clesuite = 0;
    } else {
        $clesuite++;
        echo "Clés trouvées ! Bravo ! ({$clesuite}/3)\n\n";
    }
}

$scores['3'] = $essais;

echo "\n-----------------------------\n";
echo "Scores finaux :\n";
echo "  Niveau 1 : " . ($scores['1'] ?? 'pas encore joué') . " essais\n";
echo "  Niveau 2 : " . ($scores['2'] ?? 'pas encore joué') . " essais\n";
echo "  Niveau 3 : " . $scores['3'] . " essais\n";
echo "-----------------------------\n";
echo "Félicitations, vous avez terminé le Jeu des Jarres !\n\n";
