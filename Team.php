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
         * @param $players
         */
        public function __construct(
            $name,
            $players
        ) {
            $this->name = $name;
            $this->players = $players;
            $this->oddsOfSuccess = $this->calculateOddsOfSuccess();
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
