<?php

header('Content-Type: application/json');

class Movie {
	var $name;
	var $date;
	var $country;
	var $director;

	function __construct($name, $date, $country, $director) {
		$this->name = $name;
		$this->date = $date;
		$this->country = $country;
		$this->director = $director;
	}
}

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

$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$movies = [];

foreach ($rows as $row) {
	$movie = new Movie($row['name'], $row['date'], $row['country'], $row['director']);
	$movies[] = $movie;
}

echo(json_encode($movies));

?>
