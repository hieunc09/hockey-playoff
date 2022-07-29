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
         * @return Team
         */
        public function playGame(): Team
        {
            $randomNumberHomeTeam = rand(0, 10) / 10;
            $randomNumberVisitorTeam = rand(0, 10) / 10;
            $result = $this->homeTeam->getOddsOfSuccess() * $randomNumberHomeTeam >
                $this->visitorTeam->getOddsOfSuccess() * $randomNumberVisitorTeam;

            return $result ? $this->homeTeam : $this->visitorTeam;
        }
    }
