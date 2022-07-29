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
         */
        public function __construct($name)
        {
            $this->name = $name;
            $this->teams = $this->generateTeams();
        }

        /**
         * @return Team []
         */
        private function generateTeams(): array
        {
            $teamNames = range("A", "H");
            $teams = [];
            foreach ($teamNames as $teamName) {
                $teams[] = new Team($teamName);
            }
            return $teams;
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
