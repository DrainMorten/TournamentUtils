<?php

require('../../src/CrossPairing.php');

// Prep list of players
$players_list = array();
for($i=0;$i<15;$i++) {
  $players_list[] = 'Seed #'.($i+1);
}

$builder = new haugstrup\TournamentUtils\CrossPairing($players_list);

$groups = $builder->build();

print_r($groups);
