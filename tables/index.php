<?php
session_start();

$serie = $_GET['serie'];
if (isset($serie)) {
    if ($serie == 'a') {$code = 1396;};
    if ($serie == 'b') {$code = 1397;};
}

$_SESSION['code'] = $code;

include 'api.php';
include '../config/header.php';
?>

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

<?php
include '../config/footer.php';
?>