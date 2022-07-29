<?php

    class Serie
    {
        const NUMBER_OF_GAME = 7;
        const SCORE_TO_WIN = 4;

        /**
         * @var Team
         */
        private $homeTeam;

        /**
         * @var Team
         */
        private $visitorTeam;

        /**
         * @param $homeTeam
         * @param $visitorTeam
         */
        public function __construct($homeTeam, $visitorTeam)
        {
            $this->homeTeam = $homeTeam;
            $this->visitorTeam = $visitorTeam;
        }

        /**
         * @param string $type
         * @return Team
         */
        public function playSerie(string $type): Team
        {
            $serieWinner = null;
            $homeTeamScore = $visitorTeamScore = $loserScore = 0;
            for ($i = 0; $i <= self::NUMBER_OF_GAME; $i++) {
                if ($homeTeamScore === self::SCORE_TO_WIN) {
                    $serieWinner = $this->homeTeam;
                    $loserScore = $visitorTeamScore;
                    break;
                }
                if ($visitorTeamScore === self::SCORE_TO_WIN) {
                    $serieWinner = $this->visitorTeam;
                    $loserScore = $homeTeamScore;
                    break;
                }
                $game = new Game($this->homeTeam, $this->visitorTeam);
                $gameWinner = $game->playGame();
                if ($gameWinner->getName() === $this->homeTeam->getName()) {
                    $homeTeamScore++;
                } else {
                    $visitorTeamScore++;
                }
            }

            $this->showSerieResult($type, $serieWinner, $loserScore);

            return $serieWinner;
        }

        /**
         * @param string $type
         * @param Team $serieWinner
         * @param int $loserScore
         * @return void
         */
        private function showSerieResult(string $type, Team $serieWinner, int $loserScore): void
        {
            echo "\n";
            echo $type . " " . $this->homeTeam->getName() . " vs " . $this->visitorTeam->getName() . " - Winner: " .
                $serieWinner->getName() . " (4/" . $loserScore . ")";
        }
    }
