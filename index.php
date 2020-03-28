<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="https://fonts.googleapis.com/css?family=Spartan&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="style.css">
	<title>Ivan Hudzynskyi ITech labs</title>
</head>
<body>
	<!-- Data from DB -->
	<?php
	include 'db_connection.php';

	$stmt = $conn->prepare("SELECT title FROM genre");
	$stmt->execute();

	$genres = $stmt->fetchAll(PDO::FETCH_NUM);

	$stmt = $conn->prepare("SELECT name FROM actor");
	$stmt->execute();

	$actors = $stmt->fetchAll(PDO::FETCH_NUM);

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
	<main>
		<!-- Genre form -->
		<h2>Select movies by genre</h2>
		<div class="container">

			<div class="form-container">
				<form action="genre.php" method="get">
					<label for="genre">Genre</label>
					<select class="input" name="genre" id="genre">
						<?php
						foreach ($genres as $genre_row){
							$genre = $genre_row[0];
							echo "<option value='$genre'>$genre</option>";
						}
						?>
					</select>
					<input class="input" type="submit" value="Submit">
				</form>
			</div>

			<div class="table-container">
				<table>
					<thead>
						<tr>
							<th>Name</th>
							<th>Date</th>
							<th>Country</th>
							<th>Director</th>
						</tr>
					</thead>
					<tbody id="tbody-genre">
					</tbody>
				</table>
			</div>

		</div>

		<!-- Actor form -->
		<h2>Select movies by actor</h2>
		<div class="container">

			<div class="form-container">
				<form action="actor.php" method="get">
					<label for="actor">Actor</label>
					<select class="input" name="actor" id="actor">
						<?php
						foreach ($actors as $actor_row){
							$actor = $actor_row[0];
							echo "<option value='$actor'>$actor</option>";
						}
						?>
					</select>
					<input class="input" type="submit" value="Submit">
				</form>
			</div>

			<div class="table-container">
				<table>
					<thead>
						<tr>
							<th>Name</th>
							<th>Date</th>
							<th>Country</th>
							<th>Director</th>
						</tr>
					</thead>
					<tbody id="tbody-actor">
					</tbody>
				</table>
			</div>

		</div>
		<!-- Time period form -->
		<h2>Select movies by time period</h2>
		<div class="container">

			<div class="form-container">
				<form action="time_period.php" method="get">
					<label for="start">Start date</label>
					<?php
					echo "<input class='input' type='date' name='start' id='start' value='$date_defaults[min]'>";
					?>

					<label for="end">End date</label>
					<?php
					echo "<input class='input' type='date' name='end' id='end' value='$date_defaults[max]'>";
					?>
					<input class="input" type="submit" value="Submit">
				</form>
			</div>

			<div class="table-container">
				<table>
					<thead>
						<tr>
							<th>Name</th>
							<th>Date</th>
							<th>Country</th>
							<th>Director</th>
						</tr>
					</thead>
					<tbody id="tbody_time">
					</tbody>
				</table>
			</div>

		</div>
	</main>
</body>
</html>
