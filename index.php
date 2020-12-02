<!DOCTYPE html>
<html>

<head>
    <script src="js/template/jquery.min.js"></script>
    <script src="js/template/browser.min.js"></script>
    <script src="js/template/breakpoints.min.js"></script>
    <script src="js/template/util.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <title>SportNews</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="">
    <!-- PÁGINA -->
    <div id="wrapper">

        <!-- TOPO -->
        <div id="main">
            <div class="inner">
                <header id="header"><a href="index.html" class="logo"><strong>Artigos</strong> por Douglas Gomes</a>
                    <ul class="icons">
                        <li><a class="icon brands fa-twitter" style="cursor: pointer;"><span class="label">Twitter</span></a></li>
                        <li><a class="icon brands fa-facebook-f" style="cursor: pointer;"><span class="label">Facebook</span></a></li>
                        <li><a class="icon brands fa-snapchat-ghost" style="cursor: pointer;"><span class="label">Snapchat</span></a></li>
                        <li><a class="icon brands fa-instagram" style="cursor: pointer;"><span class="label">Instagram</span></a></li>
                        <li><a class="icon brands fa-medium-m" style="cursor: pointer;"><span class="label">Medium</span></a></li>
                    </ul>
                </header>

                <!-- CONTEÚDO -->
                <?php include "api.php";?>
                <!-- Conexão com API -->
                <div id="conteudo"></div>
            </div>
        </div>

        <!-- MENU -->
        <div id="sidebar" class="inactive">
            <div class="inner">
                <section id="search" class="alt">
                    <form method="post" action="#"><input type="text" name="query" id="query" placeholder="Pesquisar">
                    </form>
                </section>
                <nav id="menu">
                    <header class="major">
                        <h2>Menu</h2>
                    </header>
                    <ul>
                        <li><a id="1" href="#">Página inicial</a></li>
                        <li><a id="3" href="#">Futebol</a></li>
                        <li><a href="#">NBA</a></li>
                        <li><a href="#">eSports</a></li>
                        <li><a href="#">Vôlei</a></li>
                        <li><span class="opener">Tabela do Brasileirão</span>
                            <ul>
                                <li><a id="2" name="serie-a" href="#" style="cursor: pointer;">Série A</a></li>
                                <li><a id="2" name="serie-b" href="#" style="cursor: pointer;">Série B</a></li>
                                <li><a id="2" name="serie-c" href="#" style="cursor: pointer;">Série C</a></li>
                                <li><a id="2" name="serie-d" href="#" style="cursor: pointer;">Série D</a></li>

                                <!-- <script>
                                    $('#2').click(function() {
                                        var serie = $("#2").attr("name");

                                        $.ajax({
                                            type: 'POST',
                                            url: 'api.php',
                                            data: {
                                                'serie': serie
                                            }
                                        });
                                    });
                                </script> -->
                            </ul>
                        </li>
                    </ul>
                </nav>
                <section>
                    <header class="major">
                        <h2>Notificaçoẽs</h2>
                    </header>
                    <div class="col-6 col-12-xsmall"><input type="email" name="demo-email" id="demo-email" value="" placeholder="Informe seu email"></div>
                </section>
                <section>
                    <header class="major">
                        <h2>Artigos populares</h2>
                    </header>
                    <div class="mini-posts">
                        <article><a class="image" style="cursor: pointer;"><img src="img/img1.jpg" alt=""></a>
                            <p>Gabriel Jesus assume importância na Seleção</p>
                        </article>
                        <article><a class="image" style="cursor: pointer;"><img src="img/img2.jpg" alt=""></a>
                            <p>Orçamento do Inter prevê semi da Copa do Brasil e quartas da Libertadores.</p>
                        </article>
                        <article><a class="image" style="cursor: pointer;"><img src="img/img3.jpg" alt=""></a>
                            <p>Alonso coloca Russell como promessa para futuro: "Surpreende a cada final de semana"</p>
                        </article>
                    </div>
                    <ul class="actions">
                        <li><a class="button" style="cursor: pointer;">Mais artigos</a></li>
                    </ul>
                </section>
                <section>
                    <header class="major">
                        <h2>Contato</h2>
                    </header>
                    <ul class="contact">
                        <li class="icon solid fa-envelope"><a style="cursor: pointer;">information@untitled.tld</a></li>
                        <li class="icon solid fa-phone">(000) 000-0000</li>
                    </ul>
                </section>
                <footer id="footer">
                    <p class="copyright">© h3it0r. All rights reserved.</p>
                </footer>
            </div><a href="#sidebar" class="toggle">Toggle</a>
        </div>
    </div>

    <!-- CÓDIGO DO TEMPLATE -->
    <script>
        (function($) {
            var $window = $(window),
                $head = $('head'),
                $body = $('body');
            breakpoints({
                xlarge: ['1281px', '1680px'],
                large: ['981px', '1280px'],
                medium: ['737px', '980px'],
                small: ['481px', '736px'],
                xsmall: ['361px', '480px'],
                xxsmall: [null, '360px'],
                'xlarge-to-max': '(min-width: 1681px)',
                'small-to-xlarge': '(min-width: 481px) and (max-width: 1680px)'
            });
            $window.on('load', function() {
                window.setTimeout(function() {
                    $body.removeClass('is-preload');
                }, 100);
            });
            var resizeTimeout;
            $window.on('resize', function() {
                $body.addClass('is-resizing');
                clearTimeout(resizeTimeout);
                resizeTimeout = setTimeout(function() {
                    $body.removeClass('is-resizing');
                }, 100);
            });
            if (!browser.canUse('object-fit') || browser.name == 'safari') $('.image.object').each(function() {
                var $this = $(this),
                    $img = $this.children('img');
                $img.css('opacity', '0');
                $this.css('background-image', 'url("' + $img.attr('src') + '")').css('background-size', $img.css('object-fit') ? $img.css('object-fit') : 'cover').css('background-position', $img.css('object-position') ? $img.css('object-position') : 'center');
            });
            var $sidebar = $('#sidebar'),
                $sidebar_inner = $sidebar.children('.inner');
            breakpoints.on('<=large', function() {
                $sidebar.addClass('inactive');
            });
            breakpoints.on('>large', function() {
                //$sidebar.removeClass('inactive');
            });
            if (browser.os == 'android' && browser.name == 'chrome') $('<style>#sidebar .inner::-webkit-scrollbar { display: none; }</style>').appendTo($head);
            $('<a href="#sidebar" class="toggle">Toggle</a>').appendTo($sidebar).on('click', function(event) {
                event.preventDefault();
                event.stopPropagation();
                $sidebar.toggleClass('inactive');
            });
            $sidebar.on('click', 'a', function(event) {
                if (breakpoints.active('>large')) return;
                var $a = $(this),
                    href = $a.attr('href'),
                    target = $a.attr('target');
                event.preventDefault();
                event.stopPropagation();
                if (!href || href == '#' || href == '') return;
                $sidebar.addClass('inactive');
                setTimeout(function() {
                    if (target == '_blank') window.open(href);
                    else window.location.href = href;
                }, 500);
            });
            $sidebar.on('click touchend touchstart touchmove', function(event) {
                if (breakpoints.active('>large')) return;
                event.stopPropagation();
            });
            $body.on('click touchend', function(event) {
                if (breakpoints.active('>large')) return;
                $sidebar.addClass('inactive');
            });
            $window.on('load.sidebar-lock', function() {
                var sh, wh, st;
                if ($window.scrollTop() == 1) $window.scrollTop(0);
                $window.on('scroll.sidebar-lock', function() {
                    var x, y;
                    if (breakpoints.active('<=large')) {
                        $sidebar_inner.data('locked', 0).css('position', '').css('top', '');
                        return;
                    }
                    x = Math.max(sh - wh, 0);
                    y = Math.max(0, $window.scrollTop() - x);
                    if ($sidebar_inner.data('locked') == 1) {
                        if (y <= 0) $sidebar_inner.data('locked', 0).css('position', '').css('top', '');
                        else $sidebar_inner.css('top', -1 * x);
                    } else {
                        if (y > 0) $sidebar_inner.data('locked', 1).css('position', 'fixed').css('top', -1 * x);
                    }
                }).on('resize.sidebar-lock', function() {
                    wh = $window.height();
                    sh = $sidebar_inner.outerHeight() + 30;
                    $window.trigger('scroll.sidebar-lock');
                }).trigger('resize.sidebar-lock');
            });
            var $menu = $('#menu'),
                $menu_openers = $menu.children('ul').find('.opener');
            $menu_openers.each(function() {
                var $this = $(this);
                $this.on('click', function(event) {
                    event.preventDefault();
                    $menu_openers.not($this).removeClass('active');
                    $this.toggleClass('active');
                    $window.triggerHandler('resize.sidebar-lock');
                });
            });
        })(jQuery);
    </script>
</body>

</html>

<!-- PAGINAÇÂO DINÂMICA -->
<script>
    $(document).ready(function() {
        function load_page(id) {
            $.ajax({
                url: "fetch.php",
                method: "POST",
                data: {
                    id: id
                },
                success: function(data) {
                    $('#conteudo').html(data);
                }
            });
        }

        load_page(1); // Carregar página inicial

        $('nav a').click(function() {
            var page_id = $(this).attr("id");
            if (page_id) {
                load_page(page_id);
            }
        });
    });
</script>