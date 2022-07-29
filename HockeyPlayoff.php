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
            $finalWinner = $finnalSerie->playSerie();
            $finnalSerie->showSerieResult("Final", $finalWinner);

        }

        /**
         * @param string $divisionName
         * @return Division
         */
        private function generateDivision(string $divisionName): Division
        {
            return new Division($divisionName);
        }
    }
