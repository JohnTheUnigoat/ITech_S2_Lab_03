<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="https://fonts.googleapis.com/css?family=Spartan&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="style.css">
	<title>Ivan Hudzynskyi ITech labs</title>
	<script src="ajax.js"></script>
	<?php require 'get_form_data.php'; ?>
</head>
<body>
	<main>
		<!-- Genre form -->
		<h2>Select movies by genre</h2>
		<div class="container">

			<div class="form-container">
				<label for="genre">Genre</label>
				<select class="input" name="genre" id="genre">
					<?php foreach ($genres as $genre): ?>
					<option value="<?=$genre?>"> <?=$genre?> </option>
					<?php endforeach; ?>
				</select>
				<input class="input" type="button" value="Submit" onclick="getByGenre()">
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
				<label for="actor">Actor</label>
				<select class="input" name="actor" id="actor">
					<?php foreach ($actors as $actor): ?>
					<option value="<?=$actor?>"> <?=$actor?> </option>
					<?php endforeach; ?>
				</select>
				<input class="input" type="button" value="Submit">
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
				<label for="start">Start date</label>
				<input class="input" type="date" name="start" id="start" value=<?=$date_defaults['min']?>>

				<label for="end">End date</label>
				<input class="input" type="date" name="end" id="end" value=<?=$date_defaults['max']?>>

				<input class="input" type="button" value="Submit">
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
