<!DOCTYPE html>
<html lang="pt-br">

<head>
      <meta charset="utf-8">
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

</html>

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
      alerta("success", "Artigo enviado com sucesso!", false);
      echo "<script>setTimeout('javascript:fechar();',3500);</script>";

      // Encerrando a sessão
      session_start();
      session_unset();
      session_destroy();
} else {
      echo "Error: " . $query . "<br>" . mysqli_error($connect);
}

mysqli_close($connect);

function alerta($type, $title, $msg)
{
      echo "<script type='text/javascript'>
			Swal.fire({
			  icon: '$type',
			  title: '$title',
			  text: '$msg',
			  showConfirmButton: false
			});
			</script>";
}
?>

<script>
      function fechar() {
            window.location.href = "../"
      }
</script>