<?php

    class Team
    {
        const NUMBER_OF_PLAYER = 21;

        /**
         * @var string
         */
        private string $name;

        /**
         * @var Player[]
         */
        private array $players;

        /**
         * @var float|int
         */
        private float $oddsOfSuccess;

        /**
         * @param $name
         */
        public function __construct(
            $name
        ) {
            $this->name = $name;
            $this->players = $this->generatePlayers();
            $this->oddsOfSuccess = $this->calculateOddsOfSuccess();
        }

        /**
         * @return Player []
         */
        private function generatePlayers(): array
        {
            $players = [];
            for ($i = 1; $i <= Team::NUMBER_OF_PLAYER; $i++) {
                $players[] = new Player();
            }

            return $players;
        }

        /**
         * @return float|int
         */
        private function calculateOddsOfSuccess(): float
        {
            $totalRating = 0;
            foreach ($this->players as $player) {
                $totalRating += $player->getSuccessRating();
            }

            return $totalRating / 21;
        }

        /**
         * @return float
         */
        public function getOddsOfSuccess(): float
        {
            return $this->oddsOfSuccess;
        }

        /**
         * @return string
         */
        public function getName(): string
        {
            return $this->name;
        }

        /**
         * @param $name
         * @return void
         */
        public function setName($name): void
        {
            $this->name = $name;
        }
    }
