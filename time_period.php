<?php

header('Content-Type: application/json');

$start = $_GET['start'];
$end = $_GET['end'];

require 'db_connection.php';

$cmd = <<<EOD
SELECT
	name,
	date,
	country,
	director
FROM film
WHERE date BETWEEN :start AND :end
ORDER BY date
EOD;

$stmt = $conn->prepare($cmd);
$stmt->execute([':start' => $start, ':end' => $end]);

$rows = $stmt->fetchAll(PDO::FETCH_OBJ);

echo(json_encode($rows));

?>
