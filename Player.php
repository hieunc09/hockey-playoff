<?php

    class Player
    {
        /**
         * @var float|int
         */
        private $successRating;

        public function __construct()
        {
            $this->successRating = rand(0.15 * 10, 10) / 10;
        }

        /**
         * @return float|int
         */
        public function getSuccessRating()
        {
            return $this->successRating;
        }
    }
