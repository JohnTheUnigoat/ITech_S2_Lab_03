<?php
require 'db_connection.php';

$stmt = $conn->prepare("SELECT title FROM genre");
$stmt->execute();

$genre_rows = $stmt->fetchAll(PDO::FETCH_NUM);

$genres = [];

foreach ($genre_rows as $row) {
	$genres[] = $row[0];
}

$stmt = $conn->prepare("SELECT name FROM actor");
$stmt->execute();

$actor_rows = $stmt->fetchAll(PDO::FETCH_NUM);

$actors = [];

foreach ($actor_rows as $row) {
	$actors[] = $row[0];
}

$cmd = <<<EDO
SELECT
	MIN(date) AS min,
	MAX(date) AS max
FROM film
EDO;
$stmt = $conn->prepare($cmd);
$stmt->execute();

$date_defaults = $stmt->fetch(PDO::FETCH_ASSOC);
?>
