<?php
	$rows = $stmt->fetchAll();

	foreach($rows as $row) {
		echo '<tr>';
		for($i = 0; $i < 4; $i++) {
			echo "<td>$row[$i]</td>";
		}
		echo '</tr>';
	}
?>
