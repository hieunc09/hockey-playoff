<?php
    require 'Player.php';
    require 'Team.php';
    require 'Division.php';
    require 'Game.php';
    require 'Serie.php';
    require 'Round.php';
    require 'HockeyPlayoff.php';
    $newPlayoffSession = new HockeyPlayoff();
    $newPlayoffSession->simulatePlayoff();
