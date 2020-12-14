<?php
require_once 'db_connect.php';

if (isset($_POST["id"])) {
    $query = "SELECT * FROM pages WHERE page_id = '" . $_POST["id"] . "'";
    $result = mysqli_query($connect, $query);
    while ($row = mysqli_fetch_array($result)) {
        $output = $row["content"];
    }
    echo $output;
    mysqli_close($connect);
}