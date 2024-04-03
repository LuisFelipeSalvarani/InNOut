<?php
session_start();
requireValidSession(true);

$activeUsersCount = User::getActiveUsersCount();
$absentsUsers = WorkingHours::getAbsentUsers();

$yearAndMonth = (new DateTime())->format("Y-m");
$seconds = WorkingHours::getWorkedTimeInMonth($yearAndMonth);
$hoursInMonth = explode(':', getTimeStringFromSeconds($seconds))[0];

loadTemplateView("menager_report", [
    "activeUsersCount" => $activeUsersCount,
    "absentsUsers" => $absentsUsers,
    "hoursInMonth" => $hoursInMonth,
]);