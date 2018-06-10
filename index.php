<?php

require 'TimeTravel.php';

$start = new TimeTravel('31-12-1985');
$end = new TimeTravel('now');
$intervalToStart = new DateInterval('PT1000000000S');
$intervalStep = new DateInterval('P1M8D');
/*$dateRange = new DatePeriod($start, $intervalStep, $end);*/

echo $start->getTravelInfo($start, $end);

echo '<hr/>';

echo $start->findDate($intervalToStart);

echo '<hr/>';

echo backToFutureStepByStep($intervalStep);
