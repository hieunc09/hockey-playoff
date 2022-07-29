<?php

    class HockeyPlayoff
    {
        /**
         * @return void
         */
        public function simulatePlayoff()
        {
            $eastDivision = $this->generateDivision('East');
            $winnerEastDivision = $eastDivision->playDivision();
            $winnerEastDivision->setName($eastDivision->getName() . " " . $winnerEastDivision->getName());
            echo "\n";
            echo "---------";
            $westDivision = $this->generateDivision('West');
            $winnerWestDivision = $westDivision->playDivision();
            $winnerWestDivision->setName($westDivision->getName() . " " . $winnerWestDivision->getName());

            echo "\n";
            echo "---------";
            $finnalSerie = new Serie($winnerEastDivision, $winnerWestDivision);
            $finnalSerie->playSerie('Final');
        }

        /**
         * @return Player []
         */
        public function generatePlayers(): array
        {
            $players = [];
            for ($i = 1; $i <= Team::NUMBER_OF_PLAYER; $i++) {
                $players[] = new Player();
            }

            return $players;
        }

        /**
         * @return Team []
         */
        private function generateTeams(): array
        {
            $teamNames = range("A", "H");
            $teams = [];
            foreach ($teamNames as $teamName) {
                $players = $this->generatePlayers();
                $teams[] = new Team($teamName, $players);
            }
            return $teams;
        }

        /**
         * @param string $divisionName
         * @return Division
         */
        private function generateDivision(string $divisionName): Division
        {
            $teams = $this->generateTeams();

            return new Division($divisionName, $teams);
        }
    }
