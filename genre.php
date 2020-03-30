<?php
$genre = $_GET['genre'];

require 'db_connection.php';

$cmd = <<<EOD
SELECT
	f.name,
	f.date,
	f.country,
	f.director
FROM
	film AS f JOIN film_genre AS fg ON fg.FID_Film = f.ID_FILM
	JOIN genre AS g ON g.ID_Genre = fg.FID_Genre
WHERE
	g.title = :genre;
EOD;

$stmt = $conn->prepare($cmd);
$stmt->execute([':genre' => $genre]);

$rows = $stmt->fetchAll();

foreach($rows as $row) {
	echo '<tr>';
	for($i = 0; $i < 4; $i++) {
		echo "<td>$row[$i]</td>";
	}
	echo '</tr>';
}

?>
