<?php

$short = $_SERVER['REQUEST_URI'];
$short = explode('/', $short);
$short = $short[count($short) - 1];

include("db.php");

$query = "SELECT * FROM links WHERE short_url='$short'";
$run = mysqli_query($db, $query);
$link = mysqli_fetch_array($run) ?? array();
if (count($link) > 0) {
    header("location:" . $link['long_url']);
} else {
    header("location:index.php");
}
