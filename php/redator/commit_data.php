<?php
require_once '../db_connect.php';

session_start();

$content = $_SESSION['content'];
$now = date("Y-m-d H:i:s");

$query = "INSERT INTO articles (category, editor, time, title, subtitle, content) VALUES (" .
      "'" . $content["category"] . "'," .
      "'" . $content["editor"] . "'," .
      "'" . $now . "'," .
      "'" . $content["title"] . "'," .
      "'" . $content["subtitle"] . "'," .
      "'" . $content["content"] . "');";

if (mysqli_query($connect, $query)) {
      echo "New record created successfully";
} else {
      echo "Error: " . $query . "<br>" . mysqli_error($connect);
}

mysqli_close($connect);