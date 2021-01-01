<?php
include '../config/header.php';

require_once '../db/db_connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $id = mysqli_escape_string($connect, $id);

    $query = "SELECT * FROM articles WHERE id=$id";
    $result = mysqli_query($connect, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<section><header class='main'>" .
            "<h1>" . $row['title'] . "</h1>" .
            "<h2>" . $row['subtitle'] . "</h2>" .
            "<p>Por " . $row['editor'] . "<br><time>" . $row['time'] . "</time></p></header>" .
            $row['content'] . "</section>";
    }

    mysqli_close($connect);
}

include '../config/footer.php';
?>