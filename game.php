<?php
// Point d'entrée

$scores = ['1' => null, '2' => null, '3' => null];

require 'level1.php';
require 'level2.php';
require 'level3.php';

// Récap final scores
echo "\n=============================\n";
echo "        FIN DU JEU\n";
echo "=============================\n";
echo "Niveau 1 : " . ($scores['1'] ?? 'non joué') . " essais\n";
echo "Niveau 2 : " . ($scores['2'] ?? 'non joué') . " essais\n";
echo "Niveau 3 : " . ($scores['3'] ?? 'non joué') . " essais\n";
echo "=============================\n";
