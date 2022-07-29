<?php
    include 'Team.php';
    include 'Player.php';
    include 'Division.php';
    include 'Match.php';
    include 'Round.php';
    include 'Serie.php';
    include 'HockeyPlayoff.php';
    $newPlayoffSession = new HockeyPlayoff();
    $newPlayoffSession->simulatePlayoff();
