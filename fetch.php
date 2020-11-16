<?php
if (isset($_POST["id"])) {
    $connect = mysqli_connect("localhost", "admin", "R00t_P4sSw0Rd", "sportnews");
    $query = "SELECT * FROM pages WHERE page_id = '" . $_POST["id"] . "'";
    $result = mysqli_query($connect, $query);
    while ($row = mysqli_fetch_array($result)) {
        $output = $row["content"];
    }
    echo $output;
}
?>