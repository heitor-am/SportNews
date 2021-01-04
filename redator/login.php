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

if (isset($_POST['btn-login'])) {
    $errors = array();
    $username = mysqli_escape_string($connect, $_POST['uname']);
    $password = mysqli_escape_string($connect, $_POST['psw']);

    $query = "SELECT username FROM redator WHERE username = '$username'";
    $result = mysqli_query($connect, $query);

    if (mysqli_num_rows($result) > 0) {
        $password = md5($password);
        $query = "SELECT * FROM redator WHERE username = '$username' AND password = '$password'";

        $result = mysqli_query($connect, $query);

        if (mysqli_num_rows($result) == 1) {
            $redator = mysqli_fetch_array($result);
            mysqli_close($connect);
            $_SESSION['logado'] = true;
            $_SESSION['user_id'] = $redator['id'];
            header('Location: ./');
        } else {
            $errors[] = "Senha incorreta";
        }
    } else {
        $errors[] = "Usuário inexistente";
    }
}

if (!empty($errors)) {
    foreach ($errors as $error) {
        alerta("error", "Oops...", $error);
        echo "<script>setTimeout('javascript:fechar();',3500);</script>";
      
    }
}

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