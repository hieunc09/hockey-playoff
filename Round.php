<?php

    class Round
    {
        /**
         * @var int
         */
        private int $number;

        /**
         * @var Team []
         */
        private array $teams;

        /**
         * @param $number
         * @param $series
         */
        public function __construct($number, $teams)
        {
            $this->number = $number;
            $this->teams = $teams;
        }

        /**
         * @return Team []
         */
        public function playRound(): array
        {
            echo "\n";
            echo "Round #" . $this->number . ":";

            $winners = [];
            for ($i = 0; $i < count($this->teams); $i += 2) {
                $serie = new Serie($this->teams[$i], $this->teams[$i + 1]);
                $winners[] = $serie->playSerie("Serie");
            }

            return $winners;
        }
    }
