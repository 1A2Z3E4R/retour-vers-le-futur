<?php

require 'TimeTravel.php';

$start = new DateTime('31-12-1985');
$end = new DateTime('now');
$timeTravel = new TimeTravel($start, $end);
$intervalToStart = new DateInterval('PT1000000000S');
$intervalStep = new DateInterval('P1M8D');

echo $timeTravel->getTravelInfo($start, $end);

echo '<hr/>';

echo $timeTravel->findDate($intervalToStart);

echo '<hr/>';

var_dump($timeTravel->backToFutureStepByStep($intervalStep)) ;
