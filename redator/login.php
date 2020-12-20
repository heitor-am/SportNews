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
            header('Location: redator.php');
        } else {
            $errors[] = "Senha incorreta";
        }
    } else {
        $errors[] = "Usuário inexistente";
    }
}

if (!empty($errors)) {
    foreach ($errors as $error) {
        echo "<script>" .
        'setTimeout("javascript:fechar();",10);' .
        'alert("' . $error . '");' .
        '</script>';
    }
}
?>

<script>
      function fechar(){
            window.location.href = "/SportNews"
      }
</script>