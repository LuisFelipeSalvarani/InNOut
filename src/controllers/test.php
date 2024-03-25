<?php
// Controller temporário

loadModel("WorkingHours");

$wh = WorkingHours::loadFromUserAndDate(1, date("Y-m-d"));

$wi = $wh->getWorkedInterval()->format("%H:%I:%S");
print_r($wi);
echo "<br>";

$li = $wh->getLunchInterval()->format("%H:%I:%S");
print_r($li);
echo "<br>";

print_r($wh->getExitTimes());