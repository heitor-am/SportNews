<?php
require_once '../db_connect.php';

session_start();

// Verificação
if (!isset($_SESSION['logado'])) {
	header('Location: ../../index.php');
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
	<link rel="shortcut icon" href="../../img/logo/favicon.png">
	<title>Redator</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<link rel="stylesheet" href="../../css/template.css">

	<style>
		.content {
			width: 400px;
			padding: 10px;
		}

		.content input,
		.content select,
		.content textarea {
			margin: 20px;
		}
	</style>
</head>

<body>
	<div class="content">
		<header>
			<h1> Olá, <?php echo $redator['username']; ?> </h1>
			<h3>Escreva um novo artigo</h3>
		</header>

		<form action="preview.php" method="post" target="_self">
			<label for="category">Categoria:</label>
			<select name="category" placeholder="Escreva a categoria do artigo" required autofocus>
				<option value="futebol">Futebol</option>
				<option value="nba">NBA</option>
				<option value="esports">eSports</option>
				<option value="volei">Vôlei</option>
			</select>

			<label for="editor">Redator:</label>
			<input type="text" name="editor" placeholder="Escreva o nome do redator" required autofocus>

			<label for="title">Título:</label>
			<input type="text" name="title" placeholder="Escreva o título do artigo" required>

			<label for="subtitle">Subtítulo:</label>
			<input type="text" name="subtitle" placeholder="Escreva o subtítulo do artigo" required>

			<label for="content">Escreva o conteúdo em HTML:</label>
			<textarea name="content"></textarea>

			<input type="submit" value="Preview">
		</form>
		<a href="logout.php">Sair</a>
	</div>
</body>

</html>