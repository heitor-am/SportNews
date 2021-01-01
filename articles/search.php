<?php
include '../config/header.php';

require_once '../db/db_connect.php';

if (isset($_GET['query'])) {
  $search = $_GET['query'];
  $search = mysqli_escape_string($connect, $search);

  $query = "SELECT * FROM articles WHERE title LIKE '%$search%' ORDER BY id DESC";
  $result = mysqli_query($connect, $query);

  while ($row = mysqli_fetch_assoc($result)) {
    $array[] = $row;
  }

  mysqli_close($connect);
}

?>

<section>
  <header class="major">
    <h2> Resultado </h2>
  </header>
    <?php
    if (!empty($array)) {
      echo "<div class='posts'>";
      foreach ($array as $a) {
        echo "<article><a class='image' style='cursor: pointer;'><img src=" . $a['main_image'] . " alt=''></a>" .
          "<h3>" . $a['title'] . "</h3>" .
          "<p>" . $a['time'] . "</p>" .
          "<ul class='actions'>" .
          "<li><a id='". $a['id'] ."' class='button' " . 
          "href='./article.php?id=" . $a['id'] . "'style='cursor: pointer;'>Sobre</a></li></ul></article>";
      }
      echo "</div>";
    } else {
      echo "<div style='text-align:center;margin-top:1.5em;'><p style='font-size:24px;margin-bottom:10px;'>Nenhum resultado encontrado :(</p>" .
           "<p style='font-size:1em;'>Sua busca por \"" . $search . "\" não retornou resultados.<br>" .
           "Tente novamente com outros termos.</p></div>";
    }
    ?>
</section>

<?php
include '../config/footer.php';
