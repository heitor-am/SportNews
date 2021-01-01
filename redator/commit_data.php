<?php
require_once '../db/db_connect.php';

session_start();

$content = $_SESSION['content'];
$now = date("d/m/Y H:i");

$query = "INSERT INTO articles (category, editor, time, main_image, title, subtitle, content) VALUES (" .
      "'" . $content["category"] . "'," .
      "'" . $content["editor"] . "'," .
      "'" . $now . "'," .
      "'" . $content["main_image"] . "'," .
      "'" . $content["title"] . "'," .
      "'" . $content["subtitle"] . "'," .
      "'" . $content["content"] . "');";

if (mysqli_query($connect, $query)) {
      $msg = "Artigo enviado com sucesso!" ;
} else {
      $msg = "Error: " . $query . "<br>" . mysqli_error($connect);
}

mysqli_close($connect);
?>

<script>
      function fechar(){
            window.location.href = "/SportNews"
      }
      setTimeout("javascript:fechar();",10);
      alert('<?php echo $msg; ?>');
</script>