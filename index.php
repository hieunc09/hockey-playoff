<?php
    include 'Player.php';
    include 'Team.php';
    include 'Division.php';
    include 'Game.php';
    include 'Serie.php';
    include 'Round.php';
    include 'HockeyPlayoff.php';
    $newPlayoffSession = new HockeyPlayoff();
    $newPlayoffSession->simulatePlayoff();
