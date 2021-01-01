<?php
include 'config/header.php';
?>

<!-- CONTEÚDO -->

<?php
require_once 'db/db_connect.php';

$query = "SELECT * FROM articles ORDER BY id DESC LIMIT 0,7";
$result = mysqli_query($connect, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $array[] = $row;
}

mysqli_close($connect);
?>

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
<section>
    <header class="major">
        <h2>Por que nos acompanhar?</h2>
    </header>
    <div class="features">
        <article><span class="icon fas fa-futbol"></span>
            <div class="content">
                <h3>Fique por dentro</h3>
                <p>Acompanhe as últimas notícias sobre o futebol nacional e internacional.</p>
            </div>
        </article>
        <article><span class="icon solid fa-gamepad"></span>
            <div class="content">
                <h3>Esportes eletrônicos</h3>
                <p>Entre no mundo dos esportes eletrônicos e acompanhe os campeonatos do seu jogo favorito.</p>
            </div>
        </article>
        <article><span class="icon solid fa-table"></span>
            <div class="content">
                <h3>Cobertura de Campeonatos</h3>
                <p>Saiba a qualquer hora como anda o seu time favorito em campeonatos nacionais e internacionais.</p>
            </div>
        </article>
        <article><span class="icon solid fa-basketball-ball"></span>
            <div class="content">
                <h3>Conteúdo variado</h3>
                <p>Leia artigos exclusivos sobre os mais variados tipos de esportes.</p>
            </div>
        </article>
    </div>
</section>
<section>
    <header class="major">
        <h2>Artigos</h2>
    </header>
    <div class="posts">
        <?php
        for ($x = 1; $x <= 6; $x++) {
            echo "<article><a class='image' style='cursor: pointer;'><img src=" . $array[$x]['main_image'] . " alt=''></a>" .
                "<h3>" . $array[$x]['title'] . "</h3>" .
                "<p>" . $array[$x]['time'] . "</p>" .
                "<ul class='actions'>" .
                "<li><a id='". $array[$x]['id'] ."' class='button' " .
                "href='articles/article.php?id=" . $array[$x]['id'] . "' style='cursor: pointer;'>Sobre</a></li></ul></article>";
        }
        ?>
    </div>
</section>

<?php
include 'config/footer.php';
?>