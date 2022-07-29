<?php

    class Serie
    {
        const NUMBER_OF_MATCH = 7;
        const SCORE_TO_WIN = 4;

        /**
         * @var Team
         */
        private $homeTeam;

        /**
         * @var Team
         */
        private $awayTeam;

        /**
         * @param $homeTeam
         * @param $awayTeam
         */
        public function __construct($homeTeam, $awayTeam)
        {
            $this->homeTeam = $homeTeam;
            $this->awayTeam = $awayTeam;
        }

        /**
         * @param string $type
         * @return Team
         */
        public function playSerie(string $type): Team
        {
            $serieWinner = null;
            $homeTeamScore = $awayTeamScore = $loserScore = 0;
            for ($i = 0; $i <= self::NUMBER_OF_MATCH; $i++) {
                if ($homeTeamScore === self::SCORE_TO_WIN) {
                    $serieWinner = $this->homeTeam;
                    $loserScore = $awayTeamScore;
                    break;
                }
                if ($awayTeamScore === self::SCORE_TO_WIN) {
                    $serieWinner = $this->awayTeam;
                    $loserScore = $homeTeamScore;
                    break;
                }
                $match = new Match($this->homeTeam, $this->awayTeam);
                $matchWinner = $match->playMatch();
                if ($matchWinner->getName() === $this->homeTeam->getName()) {
                    $homeTeamScore++;
                } else {
                    $awayTeamScore++;
                }
            }

            echo "\n";
            echo $type . " " . $this->homeTeam->getName() . " vs " . $this->awayTeam->getName() . " - Winner: " .
                $serieWinner->getName() . " (4/" . $loserScore . ")";

            return $serieWinner;
        }
    }
