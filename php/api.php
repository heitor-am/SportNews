<?php

// COLETA DE DADOS DA API

$curl = curl_init();

// serie-a = 1396
// serie-b = 1397
// serie-c = 1472
// serie-d = 1476

curl_setopt_array($curl, [
	CURLOPT_URL => "https://v2.api-football.com/leagueTable/1396",
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

// TRATAMENTO DE DADOS

function data_processing()
{
	global $table_values;

	$data = '<section id="banner"><div class="content"><header class="major"><h2>Tabela Brasileirão 2020 - ' .  $table_values[0]->group . '</h2></header><div class="table-wrapper"><table><thead><tr><th>Clube</th><th>Pts</th><th>PJ</th><th>VIT</th><th>E</th><th>DER</th><th>GP</th><th>GC</th><th>SG</th></tr></thead><tbody>';

	for ($x = 0; $x < 20; $x++) {
		$data .= "<tr><td style=min-width:250px;><div style=display:inline-block;width:30px;>" . $table_values[$x]->rank .
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

	$data .= "</tbody></table></div></section>";

	return $data;
}

// CONEXÃO COM BD
require_once 'db_connect.php';

$info = data_processing();

$query = "UPDATE pages SET content = '$info' WHERE page_id = 2";
$result = mysqli_query($connect, $query);
if (!$result and !mysqli_connect_error()) {
	echo "Error: " . $query . "<br>" . mysqli_error($connect);
}
mysqli_close($connect);