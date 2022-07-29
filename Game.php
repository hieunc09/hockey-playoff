<?php

    class Game
    {
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
         * @return Team
         */
        public function playGame(): Team
        {
            $randomNumberHomeTeam = rand(0, 10) / 10;
            $randomNumberAwayTeam = rand(0, 10) / 10;
            $result = $this->homeTeam->getOddsOfSuccess() * $randomNumberHomeTeam >
                $this->awayTeam->getOddsOfSuccess() * $randomNumberAwayTeam;

            return $result ? $this->homeTeam : $this->awayTeam;
        }
    }
