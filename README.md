# Documentação
## API
A API – Interface de Programação de Aplicações – escolhida foi a https://v2.api-football.com, exclusivamente usada para a criação do dinamismo das tabelas do campeonato brasileiro de futebol.

O arquivo de conexão à API está em /tables/api.php
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
Os dados retirados da API são inseridos em um ARRAY, para que o tratamento das informações possa ser feito de maneira mais eficiente, e depois são jogados em uma tabela gerada por tags HTML, que pode ser vista em http://localhost/SportNews/tables/?serie=a ou http://localhost/SportNews/tables/?serie=b, isso ocorre no arquivo /tables/index.php.

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

## Artigos
Para que o redator possa criar um novo artigo, ele primeiro precisar logar no sistema. A opção para login fica na sidebar.

![Botão Login](/img/to_github/ARTIGOS-1.png "Botão Login")

Clicando no botão, um pop-up aparece na tela onde são solicitadas as informações de login: Nome do usuário e senha.

![POP-UP Login](/img/to_github/ARTIGOS-2.png "POP-UP Login")

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
Ao clicar no botão LOGIN, todas as informações inseridas nos inputs são atribuídas à variável modal, que, por sua vez, através do método POST, é enviada ao arquivo /redator/login.php, onde é verificado se os dados recebidos estão contidos na Base de dados.

![/redator/login.php](/img/to_github/ARTIGOS-4.png "/redator/login.php")

Se as informações forem autenticadas, o usuário será direcionado à página de edição de artigos. 

![Interface do redator](/img/to_github/ARTIGOS-5.png "Interface do redator")

Após preencher os campos de texto, o redator clica em PREVIEW, onde os inputs são inseridos dentro de um ARRAY, e acaba sendo direcionado a uma página que mostra uma pré-visualização do seu artigo, dessa forma, ele poder verificar o resultado final sem haja a necessidade de enviar ao banco.

![preview.php](/img/to_github/ARTIGOS-6.png "Trecho do código preview.php, onde os conteúdos dos inputs são inseridos em um ARRAY.")

![Preview](/img/to_github/ARTIGOS-7.png "Esse um artigo ainda na etapa de PREVIEW.")

Observe que há duas opções: VOLTAR, caso o redator não tenha gostado do resultado do artigo, e ENVIAR, caso a demonstração tenha sido aprovada.

Ao clicar em enviar, o ARRAY com o conteúdo do artigo é enviado ao arquivo /redator/commit_data.php, através do método POST.

![commit_data.php](/img/to_github/ARTIGOS-8.png "Trecho do código preview.php, onde o conteúdo do artigo é preparado para ser enviado ao arquivo commit_data.php")

**Obs:** O arquivo commit_data.php depende do arquivo /db/db_connect.php, onde é estabelecida a conexão com o banco.

![db_connect.php](/img/to_github/ARTIGOS-9.png "db_connect.php")

No arquivo commit_data.php, onde os dados foram recebidos, é feito um INSERT na base de dados com todo o conteúdo do artigo.

![commit_data.php](/img/to_github/ARTIGOS-10.png "commit_data.php")

A Base de dados possui a seguinte estrutura:

![Estrutura base de dado](/img/to_github/ARTIGOS-11.png "Estrutura base de dados")

## Homepage
No arquivo index.php, onde é tratado a homepage do site, logo no início do código, é feita uma requisição ao banco de dados.

![index.php](/img/to_github/HOMEPAGE-1.png "index.php")

Nessa requisição, os sete últimos artigos publicados no banco são associados a um ARRAY, que por sua vez, é usado para manipular o ordenamento das notícias ao longo da página.

Como exemplo, tem-se a notícia principal da página:

![Notícia principal da Homepage](/img/to_github/HOMEPAGE-2.png "Notícia principal da Homepage")

O artigo principal sempre é o mais recente, portanto, recebe a chave “0” no ARRAY, e dessa forma é posto em ordem conforme suas “subchaves”(‘title’, ‘time’, ‘subtitle’…).

![index.php](/img/to_github/HOMEPAGE-3.png "index.php")

E isso acontece com todos os demais artigos que aparecem na homepage.

## Página do artigo
Cada “Spoiler” de artigo localizado na homepage tem seu botão de redirecionamento para a apresentação completa, o botão SOBRE.

![Botão SOBRE](/img/to_github/PAGINA-DO-ARTIGO-1.png "Botão SOBRE")

Ao clicar no botão,  o usuário é direcionado ao arquivo /articles/article.php, tendo como parâmetro o ID do artigo.

![index.php](/img/to_github/PAGINA-DO-ARTIGO-2.png "index.php")

Recebendo o ID do artigo, o arquivo article.php faz uma REQUEST no Banco Dados para que as informações daquele artigo em específico sejam extraídas.

![/articles/article.php](/img/to_github/PAGINA-DO-ARTIGO-3.png "/articles/article.php")

## Filtragem de artigos
Na sidebar, o usuário pode filtrar os artigos existentes com base em sua categoria.

![Categorias](/img/to_github/FILTRAGEM-1.png "Categorias")

Ao clicar em uma das categorias listadas, o usuário é redirecionado a
https://localhost/SportNews/articles/?cat={categoria}, onde a categoria escolhida é passada como parâmetro em cat, e, dessa forma, verá apenas os artigos da categoria escolhida.

![/config/footer.php](/img/to_github/FILTRAGEM-2.png "/config/footer.php")

## Pesquisa interna do site
Caso o usuário procure por um artigo específico, ele pode optar por digitar uma palavra de seu interesse na barra de pesquisa localizada na sidebar.

![Barra de pesquisa](/img/to_github/FILTRAGEM-3.png "Barra de pesquisa")

Ao digitar uma palavra e pressionar a tecla Enter, o formulário onde está localizado a barra de pequisa aciona o arquivo /articles/search.php, que por sua vez, através do método GET, recebe o conteúdo do input e, logo após, faz uma requisição à Base de dados para receber todos os artigos que possuam o título relacionado ao que foi digitado na barra de pesquisa.

![/articles/search.php](/img/to_github/FILTRAGEM-3.png "/articles/search.php")

Caso a busca seja favorável, os artigos envolvidos são enviados à tela.

![/articles/search.php](/img/to_github/FILTRAGEM-4.png "/articles/search.php")

## Header e Footer
Como uma boa de código limpo, todas as páginas do site foram feitas usando-se o Header e o Footer localizados em /config/header.php e /config/footer.php, respectivamente.

![Começo de todos os arquivos do FrontEnd](/img/to_github/HEADER-FOOTER-1.png "Importando o cabeçalho")

![Fim de todos os arquivos do FrontEnd](/img/to_github/HEADER-FOOTER-1.png "Importando o rodapé")



