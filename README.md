# Tournament Utilities
This is a handful of utility classes for handling group generation, seeding etc. for pinball match-play tournaments

TODO: 

* BalancedHeadToHeadPairing: Balanced pairing of head to head groups based on a seeded list of players
* Arena/Machine randomizer: Input two or more players including how many times they've played a machine and a list of available machines. Picks the most "foreign" machine
* Add support for up to 128 players in GroupPairing

## DanishHeadToHeadPairing
Input an array of seeded players and it'll pair them up according to the Danish system. Seed #1 will play Seed #2, Seed #3 will play seed #4 and so on. Returns an associative array with `groups` and `byes`. The bye will always go to the last seed. Example in `example/DanishHeadToHeadPaiting`.

## GroupPairing
Input an array of seeded players and it'll generate 4 player groups based on your seeds and a predefined map of increasingly smaller tiers (so players will be playing opponents at roughly their own level). Just like Pinburgh.

### Visual explanation
* Check out this repository
* Start a webserver
* Run `example/GroupPairing/index.php`

Or go to [http://seeder.slapsave.com/](http://seeder.slapsave.com/)

### Example

```php
    <?php
    require('TournamentUtils/src/GroupPairing.php');

    // Make some fake player objects
    $players_list = array();
    for($i=0;$i<45;$i++) {
      $players_list[] = 'Seed #'.($i+1);
    }

    // Define number of rounds (5 or 10)
    $rounds = 5;

    // Make group builder instance
    $groupBuilder = new haugstrup\TournamentUtils\GroupPairing($rounds, $players_list);

    // Generate groups for all possible rounds
    $round = 0;
    while($round < $groupBuilder->rounds) {
      print "\n------------------------------------------------\n\n";
      print "Round: ".((string)$round)."\n";

      // Actually make the groups
      $groups = $groupBuilder->build($round);

      // Print the groups for this round
      foreach ($groups as $index => $group) {
        print "\nGroup {$index}: ".implode(', ', $group)."\n";
      }

      $round++;
    }
    print "\n------------------------------------------------\n\n";
```
