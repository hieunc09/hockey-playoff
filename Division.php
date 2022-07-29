<?php

    class Division
    {
        /**
         * @var Team[]
         */
        private array $teams;

        /**
         * @var string
         */
        private string $name;

        /**
         * @param $name
         * @param $teams
         */
        public function __construct($name, $teams)
        {
            $this->name = $name;
            $this->teams = $teams;
        }

        /**
         * @return string
         */
        public function getName(): string
        {
            return $this->name;
        }

        /**
         * @return Team
         */
        public function playDivision(): Team
        {
            $round0 = new Round(0, $this->teams);
            $winnerRound0 = $round0->playRound();

            $round1 = new Round(1, $winnerRound0);
            $winnerRound1 = $round1->playRound();

            $round2 = new Round(2, $winnerRound1);

            return $round2->playRound()[0];
        }
    }
