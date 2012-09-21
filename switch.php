<?php
$exp_date = "2011-08-28";
$todays_date = date("Y-m-d");

$today = strtotime($todays_date);
$expiration_date = strtotime($exp_date);

if ($expiration_date > $today) {
    include('live.php');
} else {
    include('urlaub.php');
}