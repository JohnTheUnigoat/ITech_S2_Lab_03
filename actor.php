<?php
header("Content-Type: text/xml");

$actor = $_GET['actor'];

require 'db_connection.php';

$cmd = <<<EOD
SELECT
	f.name,
	f.date,
	f.country,
	f.director
FROM
	film AS f JOIN film_actor AS fa ON fa.FID_Film = f.ID_FILM
	JOIN actor AS a ON a.ID_Actor = fa.FID_Actor
WHERE
	a.name = :actor
EOD;

$stmt = $conn->prepare($cmd);
$stmt->execute([':actor' => $actor]);

$rows = $stmt->fetchAll();

?>

<movies>
	<?php foreach($rows as $row): ?>
	<movie>
		<name><?=htmlspecialchars($row['name'])?></name>
		<date><?=$row['date']?></date>
		<country><?=$row['country']?></country>
		<director><?=htmlspecialchars($row['director'])?></director>
	</movie>
	<?php endforeach; ?>
</movies>
