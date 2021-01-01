<?php
require_once '../db/db_connect.php';

session_start();

// Verificação
if (!isset($_SESSION['logado'])) {
	header('Location: ../');
}

// Dados
$id = $_SESSION['user_id'];
$query = "SELECT * FROM redator WHERE id = '$id'";
$result = mysqli_query($connect, $query);
$redator = mysqli_fetch_array($result);
mysqli_close($connect);
?>

<html>

<head>
	<link rel="shortcut icon" href="../img/logo/favicon.png">
	<title>Redator</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<link rel="stylesheet" href="http://localhost/SportNews/assets/css/main_modified.css">

	<style>
		body {
			background-color: #eef0f2;
		}

		input,
		select,
		textarea {
			margin: 10px 0 20px 0;
		}

		textarea {
			min-width: 100%;
			max-width: 100%;
			min-height: 200px;
		}

		label {
			font-weight: bolder;
		}

		a {
			font-weight: bold;
			margin-right: 40px;
		}
	</style>
</head>

<body>
	<div id="main">
		<div class="inner">
			<header>
				<h1> Bem vindo, <?php echo $redator['username']; ?>! </h1>
				<h2>Escreva um novo artigo:</h2>
			</header>

			<form action="preview.php" method="post" target="_self">
				<label for="category">Categoria:</label>
				<select name="category" placeholder="Escreva a categoria do artigo" required autofocus>
					<option value="futebol">Futebol</option>
					<option value="nba">NBA</option>
					<option value="esports">eSports</option>
					<option value="vôlei">Vôlei</option>
				</select>

				<label for="editor">Redator:</label>
				<input type="text" name="editor" placeholder="Escreva o nome do redator" required autofocus>

				<label for="main_image">Imagem de capa:</label>
				<input type="url" name="main_image" placeholder="Cole o link da imagem de capa" required autofocus>

				<label for="title">Título:</label>
				<input type="text" name="title" placeholder="Escreva o título do artigo" required>

				<label for="subtitle">Subtítulo:</label>
				<input type="text" name="subtitle" placeholder="Escreva o subtítulo do artigo" required>

				<label for="content">Escreva o conteúdo em HTML (comprimido):</label>
				<textarea name="content"></textarea>
				<pre><b>Importante:</b> Não utilize aspas simples ['']</pre>

				<a href="logout.php">Sair</a>
				<input type="submit" value="Preview">
			</form>
		</div>
	</div>
</body>

</html>