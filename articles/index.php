<?php
include '../config/header.php';

require_once '../db/db_connect.php';

$query = "SELECT * FROM articles ORDER BY id DESC";
$result = mysqli_query($connect, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $array[] = $row;
}
?>

<section>
    <header class="major">
        <h2>Artigos sobre <?php echo $_GET['cat']; ?></h2>
    </header>
    <div class="posts">
        <?php
        foreach ($array as $a) {
            if ($a['category'] == $_GET['cat']) {
                echo "<article><a class='image' style='cursor: pointer;'><img src=" . $a['main_image'] . " alt=''></a>" .
                    "<h3>" . $a['title'] . "</h3>" .
                    "<p>" . $a['time'] . "</p>" .
                    "<ul class='actions'>" .
                    "<li><a class='button' style='cursor: pointer;'>Sobre</a></li></ul></article>";
            }
        }
        ?>
    </div>
</section>

<?php
include '../config/footer.php';
