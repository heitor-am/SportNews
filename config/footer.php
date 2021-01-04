</div>
</div>

<div id="sidebar" class="inactive">

    <!-- Sidebar -->
    <div class="inner">
        <section id="search" class="alt">
            <form method="get" action="http://localhost/SportNews/articles/search.php"><input type="text" name="query" id="query" placeholder="Pesquisar">
            </form>
        </section>

        <!-- Menu -->
        <nav id="menu">
            <header class="major">
                <h2>Menu</h2>
            </header>
            <ul>
                <li><a href="http://localhost/SportNews/">Página inicial</a></li>
                <li><a href="http://localhost/SportNews/articles/?cat=Futebol">Futebol</a></li>
                <li><a href="http://localhost/SportNews/articles/?cat=NBA">NBA</a></li>
                <li><a href="http://localhost/SportNews/articles/?cat=eSports">eSports</a></li>
                <li><a href="http://localhost/SportNews/articles/?cat=Vôlei">Vôlei</a></li>
                <li><span class="opener">Tabela do Brasileirão</span>
                    <ul>
                        <li><a name="serie-a" href="http://localhost/SportNews/tables/?serie=a" style="cursor: pointer;">Série A</a></li>
                        <li><a name="serie-b" href="http://localhost/SportNews/tables/?serie=b" style="cursor: pointer;">Série B</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        <!-- Notificações por email -->
        <section>
            <header class="major">
                <h2>Notificaçoẽs</h2>
            </header>
            <div><input type="email" name="demo-email" id="demo-email" value="" placeholder="Informe seu email"></div>
        </section>

        <!-- Section -->


        <!-- Section -->
        <section>
            <header class="major">
                <h2>Login</h2>
            </header>

            <!-- Botão para abrir o formulário de login -->
            <button onclick="document.getElementById('modal-login').style.display='block'">Acessar como redator</button>

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

            <!-- Alert modificado -->
            <script type="text/javascript">
                function alerta(type, title, mensagem) {
                    Swal.fire({
                        icon: type,
                        title: title,
                        text: mensagem,
                        showConfirmButton: false,
                        timer: 5000,
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        }
                    });
                }
            </script>
        </section>

        <!-- Section -->
        <section>
            <header class="major">
                <h2>Contato</h2>
            </header>
            <ul class="contact">
                <li class="icon solid fa-envelope">contato.sportnews@outlook.com</li>
                <li class="icon solid fa-phone">(86) 98816-9381</li>
            </ul>
        </section>

        <!-- Footer -->
        <footer id="footer">
            <p class="copyright">Design: <a href="https://html5up.net">HTML5 UP</a></p>
        </footer>
    </div><a href="#sidebar" class="toggle">Toggle</a>
</div>
</div>

<!-- Scripts -->
<script src="http://localhost/SportNews/assets/js/jquery.min.js"></script>
<script src="http://localhost/SportNews/assets/js/browser.min.js"></script>
<script src="http://localhost/SportNews/assets/js/breakpoints.min.js"></script>
<script src="http://localhost/SportNews/assets/js/util.js"></script>
<script src="http://localhost/SportNews/assets/js/main.js"></script>
</body>

</html>