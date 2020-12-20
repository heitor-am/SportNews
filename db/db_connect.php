<?php
// Conexão com BD
$servername = "localhost";
$username = "admin";
$password = "R00t_P4sSw0Rd";
$database = "sportnews";

$connect = mysqli_connect($servername, $username, $password, $database);

if (mysqli_connect_error()) {
    echo "Connection failed: " . mysqli_connect_error();
}