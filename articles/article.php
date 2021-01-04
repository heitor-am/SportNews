<?php
include '../config/header.php';

require_once '../db/db_connect.php';

$subtitle_style = "color: #7f888f;font-size: 1.15em;font-weight: 400;letter-spacing: 0.075em;margin-bottom: 25px;";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $id = mysqli_escape_string($connect, $id);

    $query = "SELECT * FROM articles WHERE id=$id";
    $result = mysqli_query($connect, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<section><header class='main'>" .
            "<h1 style='margin-bottom: 5px;'>" . $row['title'] . "</h1>" .
            "<h2 style='$subtitle_style'>" . $row['subtitle'] . "</h2>" .
            "<p>Por " . $row['editor'] . "<br><time>" . $row['time'] . "</time></p></header>" .
            $row['content'] . "</section>";
    }

    mysqli_close($connect);
}

include '../config/footer.php';
?>