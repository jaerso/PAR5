<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "PAR5";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName)
or die("Datenbank momentan nicht erreichbar");