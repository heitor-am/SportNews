<h1 align="center">Documentação</h1>

<p align="center">
  <img
    height="150"
    width="150"
    src="/img/logo/logo.png"
  />
</p>
<p align="center">Projeto simples de um Portal de Notícias.</p>

<hr>


🏁 Tópicos
=================
<!--ts-->
   * [Tecnologias](#tecnologias)
   * [Homepage](#homepage)
   * [Artigos](#artigos)
   * [Página de artigo](#artigo)
   * [Sistema de pesquisa](#pesquisa)
   * [Filtragem por categoria](#categoria)
   * [API](#api)
   * [Economia de código](#economia)
   * [LICENSE](#licenca)
<!--te-->

<hr>

<h2 id="tecnologias">🛠 Tecnologias</h2>

As seguintes ferramentas foram usadas na construção do projeto:

- [HTML](https://www.w3.org/)
- [CSS](https://www.w3.org/)
- [JavaScript](https://www.w3.org/)
- [PHP](https://www.php.net/)
- [Sass](https://sass-lang.com/)
- [JQuery](https://jquery.com/)
- [Git](https://git-scm.com/)

<br>
<h2 id="homepage">✅ Homepage</h2>

<p>No arquivo index.php, onde é tratado a homepage do site, logo no início do código, é feita uma requisição ao banco de dados.</p>

~~~php
<?php
require_once 'db/db_connect.php';

$query = "SELECT * FROM articles ORDER BY id DESC LIMIT 0,7";
$result = mysqli_query($connect, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $array[] = $row;
}

mysqli_close($connect);
?>
~~~

<p>Nessa requisição, os sete últimos artigos publicados no banco são associados a um ARRAY, que por sua vez, é usado para manipular o ordenamento das notícias ao longo da página.</p>

<p>Como exemplo, tem-se a notícia principal da página:</p>

<p align="center"><img src="/img/to_github/homepage.png"></p>

<p>O artigo principal sempre é o mais recente, portanto, recebe a chave “0” no ARRAY, e dessa forma é posto em ordem conforme suas “subchaves” (‘title’, ‘time’, ‘subtitle’, …).</p>

~~~php
<section id="banner">
    <div class="content">
        <header>
            <h1><?php echo $array[0]['title']; ?></h1>
            <p><?php echo $array[0]['time']; ?></p>
        </header>
        <p><?php echo $array[0]['subtitle']; ?></p>
        <ul class="actions">
            <li><a id="<?php echo $array[0]['id'];?>" class="button big" style="cursor: pointer;" href="articles/article.php?id=<?php echo $array[0]['id']; ?>">Sobre</a></li>
        </ul>
    </div><span class="image object"><img src="<?php echo $array[0]['main_image']; ?>" alt=""></span>
</section>
~~~

<p>E isso acontece com todos os demais artigos que aparecem na homepage.</p>

<br>
<h2 id="artigos">✅ Artigos</h2>

<p>Para que o redator possa criar um novo artigo, ele primeiro precisar logar no sistema. A opção para login fica na sidebar.</p>

<p align="center"><img src="/img/to_github/login.png"></p>

<p>Clicando no botão, um pop-up aparece na tela onde são solicitadas as informações de login: Nome do usuário e senha.</p>

<p align="center"><img src="/img/to_github/modal.png"></p>

~~~php
<!-- Modal -->
<div id="modal-login" class="modal">
    <!-- Conteúdo do modal -->
    <form class="modal-content" action="http://localhost/SportNews/redator/login.php" method="POST">
        <div class="imgcontainer">
            <span onclick="document.getElementById('modal-login').style.display='none'" class="close" title="Close Modal">&times;</span>
            <img src="http://localhost/SportNews/img/avatar.png" alt="Avatar" class="avatar">
        </div>
        <div class="container">
            <label for="uname">Nome do usuário</label>
            <input type="text" placeholder="Digite o nome de usuário" name="uname" required>

            <label for="psw">Senha</label>
            <input type="password" placeholder="Digite a senha" name="psw" required>
        </div>

        <div class="container" style="background-color:#f1f1f1">
            <button type="submit" name="btn-login">Login</button>
            <span class="psw">Esqueceu a <a onclick="alerta('question', 'Esqueceu sua senha?', 'Por favor, entre em contato com o administrador da página!');">senha?</a></span>
        </div>
    </form>
</div>

<script>
    // Pegar o modal
    var modal = document.getElementById('modal-login');

    // Quando o usuário clicar em qualquer lugar fora do modal, feche-o
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
~~~

<p>Ao clicar no botão LOGIN, todas as informações inseridas nos inputs são atribuídas à variável modal, que, por sua vez, através do método POST, é enviada ao arquivo /redator/login.php, onde é verificado se os dados recebidos estão contidos na Base de dados.</p>

~~~php
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
~~~

<p>Se as informações forem autenticadas, o usuário será direcionado à página de edição de artigos.</p>

<p align="center"><img src="/img/to_github/redator.png"></p>

<p>Após preencher os campos de texto, o redator clica em PREVIEW,onde os inputs são inseridos dentro de um ARRAY, e acaba sendo direcionado a uma página que mostra uma pré-visualização do seu artigo, dessa forma, ele poder verificar o resultado final sem haja a necessidade de enviar ao banco.</p>

~~~php
$content = array(
    "category" => $_POST["category"],
    "editor" => $_POST["editor"],
    "main_image" => $_POST["main_image"],
    "title" => $_POST["title"],
    "subtitle" => $_POST["subtitle"],
    "content" => $_POST["content"]
);
~~~

<p>Trecho do código preview.php, onde os conteúdos dos inputs são inseridos em um ARRAY.</p>

<p align="center"><img src="/img/to_github/preview.png"></p>

<p>Observe que há duas opções: VOLTAR, caso o redator não tenha gostado do resultado do artigo, e ENVIAR, caso a demonstração tenha sido aprovada.</p>

<p>Ao clicar em enviar, o ARRAY com o conteúdo do artigo é enviado ao arquivo /redator/commit_data.php, através do método POST.</p>

~~~php
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
~~~

<p>Trecho do código preview.php, onde o conteúdo do artigo é preparado para ser enviado ao arquivo commit_data.php</p>

<p><b>Obs:</b> O arquivo commit_data.php depende do arquivo /db/db_connect.php, onde é estabelecida a conexão com o banco.</p>

~~~php
<?php
// Conexão com BD
$servername = "localhost";
$username = "sportnews";
$password = "sportnews";
$database = "sportnews";

$connect = mysqli_connect($servername, $username, $password, $database);

if (mysqli_connect_error()) {
    echo "Connection failed: " . mysqli_connect_error();
}
~~~

<p>No arquivo commit_data.php, onde os dados foram recebidos, é feito um INSERT na base de dados com todo o conteúdo do artigo.</p>

~~~php
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
~~~

<p>A Base de dados possui a seguinte estrutura:</p>

<p align="center"><img src="/img/to_github/tabela.png"></p>

<br>
<h2 id="artigo">✅ Página do artigo</h2>

<p>Cada “Spoiler” de artigo localizado na homepage tem seu botão de redirecionamento para a apresentação completa, o botão SOBRE.</p>

<p align="center"><img src="/img/to_github/sobre.png"></p>

<p>Ao clicar no botão,  o usuário é direcionado ao arquivo /articles/article.php, tendo como parâmetro o ID do artigo.</p>

~~~php
<ul class="actions">
            <li><a id="<?php echo $array[0]['id'];?>" class="button big" style="cursor: pointer;" href="articles/article.php?id=<?php echo $array[0]['id']; ?>">Sobre</a></li>
</ul>
~~~

<p>Recebendo o ID do artigo, o arquivo article.php faz uma REQUEST no Banco Dados para que as informações daquele artigo em específico sejam extraídas.</p>

~~~php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $id = mysqli_escape_string($connect, $id);

    $query = "SELECT * FROM articles WHERE id=$id";
    $result = mysqli_query($connect, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<section><header class='main'>" .
            "<h1 style='margin-bottom: 5px;'>" . $row['title'] . "</h1>" .
            "<h2 style='$subtitle_style'>" . $row['subtitle'] . "</h2>" .
            "<p>Por " . $row['editor'] . "<br><time>" . $row['time'] . "</time></p></header>" .
            $row['content'] . "</section>";
    }

    mysqli_close($connect);
}
~~~

<br>
<h2 id="pesquisa">✅ Sistema de pesquisa</h2>

<p>Caso o usuário procure por um artigo específico, ele pode optar por digitar uma palavra de seu interesse na barra de pesquisa localizada na sidebar.</p>

<p align="center"><img src="/img/to_github/search.png"></p>

<p>Ao digitar uma palavra e pressionar a tecla Enter, o formulário, onde está localizado a barra de pequisa, aciona o arquivo /articles/search.php, que, por sua vez, através do método GET, recebe o conteúdo do input e, logo após, faz uma requisição à Base de dados para receber todos os artigos que possuam o título relacionado ao que foi digitado na barra de pesquisa.</p>

~~~php
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
~~~

<p>Caso a busca seja favorável, os artigos envolvidos são enviados à tela.</p>

~~~php
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
~~~

<br>
<h2 id="categoria">✅ Filtragem por categoria</h2>

<p>Na sidebar, o usuário pode filtrar os artigos existentes com base em sua categoria.</p>

<p align="center"><img src="/img/to_github/categoria.png"></p>

<p>Ao clicar em uma das categorias listadas, o usuário é redirecionado a
https://localhost/SportNews/articles/?cat=, onde a categoria escolhida é passada como parâmetro em cat, e, dessa forma, verá apenas os artigos da categoria escolhida.</p>

~~~php
<li><a href="http://localhost/SportNews/articles/?cat=Futebol">Futebol</a></li>
<li><a href="http://localhost/SportNews/articles/?cat=NBA">NBA</a></li>
<li><a href="http://localhost/SportNews/articles/?cat=eSports">eSports</a></li>
<li><a href="http://localhost/SportNews/articles/?cat=Vôlei">Vôlei</a></li>
~~~

<br>
<h2 id="api">✅ API</h2>

<p>A API – Interface de Programação de Aplicações – escolhida para o projeto foi a https://v2.api-football.com, exclusivamente usada para a criação do dinamismo das tabelas do campeonato brasileiro de futebol.</p>

<p>O arquivo de conexão à API está em /tables/api.php</p>

~~~php
<?php
session_start();
$code = $_SESSION['code'];

// COLETA DE DADOS DA API

$curl = curl_init();

// serie-a = 1396
// serie-b = 1397
// serie-c = 1472
// serie-d = 1476

curl_setopt_array($curl, [
	CURLOPT_URL => "https://v2.api-football.com/leagueTable/$code",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"x-rapidapi-host: v2.api-football.com",
		"x-rapidapi-key: 9e34581cb10ffc42a0527ed497342f96"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	$content_php = json_decode($response);
	$table_values = $content_php->api->standings[0];
}
~~~

<p>Os dados retirados da API são inseridos em um ARRAY, para que o tratamento das informações possa ser feito de maneira mais eficiente, e depois são jogados em uma tabela gerada por tags HTML, que pode ser vista em http://localhost/SportNews/tables/?serie=a ou http://localhost/SportNews/tables/?serie=b, isso ocorre no arquivo /tables/index.php.</p>

~~~php
<section id="banner">
    <div class="content">
        <header class="major">
            <h2>Tabela Brasileirão 2020 - <?php echo $table_values[0]->group ?></h2>
        </header>
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>Clube</th>
                        <th>Pts</th>
                        <th>PJ</th>
                        <th>VIT</th>
                        <th>E</th>
                        <th>DER</th>
                        <th>GP</th>
                        <th>GC</th>
                        <th>SG</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    for ($x = 0; $x < 20; $x++) {
                        echo "<tr><td style=min-width:250px;><div style=display:inline-block;width:30px;>" . $table_values[$x]->rank .
                            "</div><div style=display:inline-block;><img src=" . $table_values[$x]->logo . " style=width:20px;margin-bottom:-5px;margin-right:20px;> " .
                            $table_values[$x]->teamName . "</div></td>" .
                            "<td>" . $table_values[$x]->points . "</td>" .
                            "<td>" . $table_values[$x]->all->matchsPlayed . "</td>" .
                            "<td>" . $table_values[$x]->all->win . "</td>" .
                            "<td>" . $table_values[$x]->all->draw . "</td>" .
                            "<td>" . $table_values[$x]->all->lose . "</td>" .
                            "<td>" . $table_values[$x]->all->goalsFor . "</td>" .
                            "<td>" . $table_values[$x]->all->goalsAgainst . "</td>" .
                            "<td>" . $table_values[$x]->goalsDiff . "</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
</section>
~~~

<br>
<h2 id="economia">✅ Economia de código</h2>

<p>Como uma boa prática de código limpo, todas as páginas do site foram feitas usando-se o Header e o Footer localizados em /config/header.php e /config/footer.php, respectivamente.</p>

~~~php
include 'config/header.php';
~~~
~~~php
include 'config/footer.php';
~~~

<h2 id="licenca">LICENSE</h2>

[MIT](LICENSE)
