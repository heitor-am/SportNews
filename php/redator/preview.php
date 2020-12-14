<?php
session_start();

$content = array(
    "category" => $_POST["category"],
    "editor" => $_POST["editor"],
    "title" => $_POST["title"],
    "subtitle" => $_POST["subtitle"],
    "content" => $_POST["content"]
);

$_SESSION['content'] = $content;
?>


<html>

<head>
    <link rel="shortcut icon" href="../../img/logo/favicon.png">
    <title>Redator | Preview</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="stylesheet" href="../../css/template.css">
</head>

<body>
    <form action="commit_data.php" method="post">
        <section id="content">
            <div id="preview-content">
                <?php echo $_POST["content"]; ?>
            </div>
        </section>

        <input type="submit" value="Enviar">
        <a href="redator.php">Voltar</a>
    </form>
</body>

</html>