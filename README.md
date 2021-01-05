<h1 align="center">Documentação 📄</h1>

<p align="center">
  <img
    height="150"
    width="150"
    src="/img/logo/logo.png"
  />
</p>
<p align="center">Projeto simples de um Portal de Notícias sobre Esporte ⚽️.</p>

<hr>

<h2>🏁 Tópicos</h2>

<!--ts-->
   * [Pré-requisitos](#tecnologias) ✅
   * [Preparando o Banco de Dados](#homepage) 🎲
   * [Tecnologias](#tecnologias) 🛠
   * [Homepage](#homepage) 🏠
   * [Login e Artigos](#artigos) 🔏
   * [Página de artigo](#artigo) 🎯
   * [Sistema de pesquisa](#pesquisa) 🔎
   * [Filtragem por categoria](#categoria) 🏀
   * [API](#api) 📊
   * [Economia de código](#economia) 👨🏻‍💻
   * [LICENSE](#licenca) 📝
<!--te-->

<hr>

<h2 id="requisitos"> ✅ Pré-requisitos</h2>

<p>Antes de começar, você vai precisar ter instalado em sua máquina as seguintes ferramentas:</p>

- [x] Apache
- [x] MySQL
- [x] PHP

<p>Além disto é bom ter um editor para trabalhar com o código como <a href="https://code.visualstudio.com/">VSCode</a></p>

<hr>

<h2 id="bd">🎲 Preparando o Banco de Dados</h2>

<p>0️⃣ Acesse o diretório onde vai ficar o projeto, no terminal/cmd:</p>

```bash
$ cd /var/www/html/ 
```

<p>1️⃣ Clone este repositório:</p>

```bash
$ git clone https://github.com/heitor-am/SportNews
```

<p>2️⃣ Vá para o diretório db:</p>

```bash
$ cd /SportNews/db
```

<p>3️⃣ Execute o arquivo <code>init.sql</code>, no MySQL:</p>

```bash
$ sudo mysql

mysql> source /var/www/html/SportNews/db/init.sql;
```

<p>Pronto, agora o Banco de Dados está preparado para executar o arquivo <code>SportNews/index.php</code>.</p>

<hr>

<h2 id="tecnologias">🛠 Tecnologias</h2>

As seguintes ferramentas foram usadas na construção do projeto:

- <a href="https://www.w3.org/"><img src="https://img.shields.io/badge/html5%20-%23E34F26.svg?&style=for-the-badge&logo=html5&logoColor=white"/></a>
- <a href="https://www.w3.org/"><img src="https://img.shields.io/badge/css3%20-%231572B6.svg?&style=for-the-badge&logo=css3&logoColor=white"/></a>
- <a href="https://www.w3.org/"><img src="https://img.shields.io/badge/javascript%20-%23323330.svg?&style=for-the-badge&logo=javascript&logoColor=%23F7DF1E"/></a>
- <a href="https://www.php.net/"><img src="https://img.shields.io/badge/php%20-%23777bb3.svg?&style=for-the-badge&logo=php&logoColor=white"/></a>
- <a href="https://sass-lang.com/"><img src ="https://img.shields.io/badge/sass%20-%23cf649a.svg?&style=for-the-badge&logo=sass&logoColor=white"/></a>
- <a href="https://jquery.com/"><img src="https://img.shields.io/badge/jquery%20-%230769AD.svg?&style=for-the-badge&logo=jquery&logoColor=white"/></a>
- <a href="https://git-scm.com/"><img src="https://img.shields.io/badge/git%20-%23F05033.svg?&style=for-the-badge&logo=git&logoColor=white"/></a>

<hr>
<h2 id="homepage">🏠 Homepage</h2>

<p>No arquivo <code>index.php</code>, onde é tratado a homepage do site, logo no início do código, é feita uma requisição ao banco de dados.</p>

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

<p>Nessa requisição, os sete últimos artigos publicados no Banco de Dados são colocados em um <strong><em>array associativo</em></strong>, que por sua vez, é usado para manipular a distribuição das notícias ao longo da página.</p>

<p>Como exemplo, tem-se o artigo principal da página:</p>

<p align="center"><img src="/img/to_github/homepage.png"></p>

<p>O artigo principal sempre é o mais recente, portanto, está na posição “0” no <strong><em>array</em></strong>, e, dessa forma, é posto na página, distribuindo as informações no <strong><em>HTML</em></strong> conforme as <strong><em>keys</em></strong> do <strong><em>array associativo</em></strong> (‘title’, ‘time’, ‘subtitle’, …).</p>

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

<hr>
<h2 id="artigos">🔏 Login e Artigos</h2>

<p>Para que o redator possa criar um novo artigo, ele primeiro precisa logar no sistema. A opção para login fica na sidebar.</p>

<p align="center"><img src="/img/to_github/login.png"></p>

<p>Clicando no botão, um pop-up aparece na tela onde são solicitadas as informações de login: <strong><em>Nome do usuário</em></strong> e <strong><em>Senha</em></strong>.</p>

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

<p>Ao clicar no botão <strong><em>Login</em></strong>, todas as informações inseridas nos inputs são enviadas, através do método <strong><em>POST</em></strong>, ao arquivo <code>/redator/login.php</code>, onde é verificado se os dados recebidos estão contidos no Banco de dados.</p>

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

<p>Se as informações forem autenticadas, o redator será direcionado à página de edição de artigos.</p>

<p align="center"><img src="/img/to_github/redator.png"></p>

<p>Após preencher os campos de texto, o redator clica em <strong><em>Preview</em></strong>, onde os inputs são inseridos dentro de um <strong><em>array</em></strong>, e acaba sendo direcionado a uma página que mostra uma pré-visualização do seu artigo, dessa forma, ele pode verificar o resultado final sem que haja a necessidade de enviar ao Banco de Dados.</p>

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

<p>Trecho do código <code>preview.php</code>, onde os conteúdos dos inputs são inseridos em um <strong><em>array</em></strong>.</p>

<p align="center"><img width="700px" src="/img/to_github/preview.png"></p>

<p>Observe que há duas opções: <strong><em>Voltar</em></strong>, caso o redator não tenha gostado do resultado do artigo, e <strong><em>Enviar</em></strong>, caso a demonstração tenha sido aprovada.</p>

<p>Ao clicar em <strong><em>Enviar</em></strong>, o <strong><em>array</em></strong> com o conteúdo do artigo é enviado ao arquivo <code>/redator/commit_data.php</code>, através do método <strong><em>POST</em></strong>.</p>

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

<p>Trecho do código <code>preview.php</code>, onde o conteúdo do artigo é preparado para ser enviado ao arquivo <code>commit_data.php</code></p>

<p><b>Obs:</b> O arquivo <code>commit_data.php</code> depende do arquivo <code>/db/db_connect.php</code>, onde é estabelecida a conexão com o Banco de Dados.</p>

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

<p>No arquivo <code>commit_data.php</code>, onde os dados foram recebidos, é feito um <strong><em>INSERT</em></strong> na base de dados com todo o conteúdo do artigo.</p>

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

<p>A tabela <strong><em>articles</em></strong> possui a seguinte estrutura:</p>

<p align="center"><img src="/img/to_github/tabela.png"></p>

<hr>
<h2 id="artigo">🎯 Página do artigo</h2>

<p>Cada <strong><em>link</em></strong> de artigo localizado na homepage tem seu botão de redirecionamento para a apresentação completa, o botão <strong><em>sobre</em></strong>.</p>

<p align="center"><img src="/img/to_github/sobre.png"></p>

<p>Ao clicar no botão,  o usuário é direcionado ao arquivo <code>/articles/article.php</code>, tendo como parâmetro o <strong><em>id</em></strong> do artigo.</p>

~~~php
<ul class="actions">
            <li><a id="<?php echo $array[0]['id'];?>" class="button big" style="cursor: pointer;" href="articles/article.php?id=<?php echo $array[0]['id']; ?>">Sobre</a></li>
</ul>
~~~

<p>Recebendo o <strong><em>id</em></strong> do artigo, o arquivo <code>article.php</code> faz uma <strong><em>REQUEST</em></strong> no Banco de Dados para que as informações daquele artigo em específico sejam extraídas.</p>

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

<hr>
<h2 id="pesquisa">🔎 Sistema de pesquisa</h2>

<p>Caso o usuário procure por um artigo específico, ele pode optar por digitar uma palavra de seu interesse na barra de pesquisa localizada na sidebar.</p>

<p align="center"><img src="/img/to_github/search.png"></p>

<p>Ao digitar uma palavra e pressionar a tecla <strong><em>Enter</em></strong>, o formulário, onde está localizado a barra de pequisa, aciona o arquivo <code>/articles/search.php</code>, que, por sua vez, através do método <strong><em>GET</em></strong>, recebe o conteúdo do input e, logo após, faz uma requisição à Base de Dados para receber todos os artigos que possuam o título relacionado ao que foi digitado na barra de pesquisa.</p>

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

<hr>
<h2 id="categoria">🏀 Filtragem por categoria</h2>

<p>Na sidebar, o usuário pode filtrar os artigos existentes com base em sua categoria.</p>

<p align="center"><img src="/img/to_github/categoria.png"></p>

<p>Ao clicar em uma das categorias listadas, o usuário é redirecionado a <code>https://localhost/SportNews/articles/?cat={categoria}</code>, onde a categoria escolhida é passada como parâmetro em cat, e, dessa forma, o usuário verá apenas os artigos da categoria escolhida.</p>

~~~php
<li><a href="http://localhost/SportNews/articles/?cat=Futebol">Futebol</a></li>
<li><a href="http://localhost/SportNews/articles/?cat=NBA">NBA</a></li>
<li><a href="http://localhost/SportNews/articles/?cat=eSports">eSports</a></li>
<li><a href="http://localhost/SportNews/articles/?cat=Vôlei">Vôlei</a></li>
~~~

<hr>
<h2 id="api">📊 API</h2>

<p>A <strong><em>API</em></strong> – Interface de Programação de Aplicações – escolhida para o projeto foi a https://v2.api-football.com, exclusivamente utilizada para a coleta de dados atualizados do campeonato brasileiro de futebol.</p>

<p>O arquivo de conexão à <strong><em>API</em></strong> está em <code>/tables/api.php</code></p>

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

<p>Os dados retirados da <strong><em>API</em></strong> são inseridos em um <strong><em>array</em></strong>, para que o tratamento das informações possa ser feito de maneira mais eficiente, e depois são jogados em uma tabela gerada por tags <strong><em>HTML</em></strong>, que pode ser vista em <code>http://localhost/SportNews/tables/?serie=a</code> ou <code>http://localhost/SportNews/tables/?serie=b</code>, isso ocorre no arquivo <code>/tables/index.php</code>.</p>

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

<hr>
<h2 id="economia">👨🏻‍💻 Economia de código</h2>

<p>Como uma boa prática de código limpo, todas as páginas do site foram feitas usando-se o <strong><em>header</em></strong> e o <strong><em>footer</em></strong> localizados em <code>/config/header.php</code> e <code>/config/footer.php</code>, respectivamente.</p>

~~~php
include 'config/header.php';
~~~
~~~php
include 'config/footer.php';
~~~

<hr>
<h2 id="licenca">📝 Licença</h2>

Este projeto está sob a licença [MIT](LICENSE).
