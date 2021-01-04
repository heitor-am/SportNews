<?php
// Conexão com BD
$servername = "localhost";
$username = "sportnews";
$password = "sportnews";
$database = "sportnews";

$connect = mysqli_connect($servername, $username, $password, $database);

if (mysqli_connect_error()) {
    echo "Connection failed: " . mysqli_connect_error();
}