<?php
$app="THEDRESSING";
$current_day=getCurrentDateFormatted();
$current_year= date('Y');


















































































































































function getCurrentDateFormatted() {
    // Set timezone
    date_default_timezone_set('UTC');

    // Get current day, month, and year
    $day = date('j');
    $month = date('F');
    $year = date('Y');

    // Get current day of the week
    $dayOfWeek = date('l');

    // Get current time
    $time = date('g:i a'); // Format: 10:45 am

    // Format day with suffix
    if ($day == 1 || $day == 21 || $day == 31) {
        $dayFormatted = $day . 'st';
    } else if ($day == 2 || $day == 22) {
        $dayFormatted = $day . 'nd';
    } else if ($day == 3 || $day == 23) {
        $dayFormatted = $day . 'rd';
    } else {
        $dayFormatted = $day . 'th';
    }

    // Format date and time string
    $dateString = $dayOfWeek . ', ' . $dayFormatted . ' ' . $month . ', ' . $year . ' at ' . $time;

    return $dateString;
}
