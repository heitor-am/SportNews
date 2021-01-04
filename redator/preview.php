<?php
session_start();

$content = array(
    "category" => $_POST["category"],
    "editor" => $_POST["editor"],
    "main_image" => $_POST["main_image"],
    "title" => $_POST["title"],
    "subtitle" => $_POST["subtitle"],
    "content" => $_POST["content"]
);

$_SESSION['content'] = $content;
$time = date("d/m/Y H:i");;
?>

<html>

<head>
    <link rel="shortcut icon" href="../img/logo/favicon.png">
    <title>Redator | Preview</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="stylesheet" href="http://localhost/SportNews/assets/css/main_modified.css">

    <style>
        body {
            background-color: #eef0f2;
        }

        a {
            font-weight: bold;
            margin-right: 40px;
        }

        h1 {
            margin-bottom: 5px;
        }

        h2 {
            color: #7f888f;
            font-size: 1.15em;
            font-weight: 400;
            letter-spacing: 0.075em;
            margin-bottom: 25px;

        }
    </style>
</head>

<body>
    <div id="main">
        <div class="inner">
            <form action="commit_data.php" method="post">
                <div id="preview-content">
                    <section>
                        <header class="main">
                            <h1><?php echo $content['title']; ?></h1>
                            <h2><?php echo $content['subtitle']; ?></h2>
                            <p><?php echo "Por " . $content['editor'] . "<br><time>" . $time . "</time>"; ?></p>
                        </header>

                        <?php echo $_POST["content"]; ?>
                    </section>
                </div>
                <a href="./">Voltar</a>
                <input type="submit" value="Enviar">
            </form>
        </div>
    </div>
</body>

</html>