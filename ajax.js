function getByGenre() {
	var ajax = new XMLHttpRequest();

	var genre = document.getElementById('genre').value;

	ajax.onreadystatechange = function() {
		if (ajax.readyState === 4 && ajax.status === 200) {
			document.getElementById('tbody-genre').innerHTML = ajax.responseText;
		}
	};

	ajax.open('GET', `genre.php?genre=${genre}`);
	ajax.send();
}

function getByActor() {
	var ajax = new XMLHttpRequest();

	var actor = document.getElementById('actor').value;

	ajax.onload = () => {
		let tbodyActor = document.getElementById('tbody-actor');
		tbodyActor.innerHTML='';

		let xml = ajax.responseXML;

		if (xml == null)
			return;

		let names = xml.getElementsByTagName('name');
		let dates = xml.getElementsByTagName('date');
		let countries = xml.getElementsByTagName('country');
		let directors= xml.getElementsByTagName('director');

		for (var i = 0; i < names.length; i++) {
			let tr = document.createElement('tr');

			let td = document.createElement('td');
			td.innerHTML = names[i].textContent;
			tr.appendChild(td);

			td = document.createElement('td');
			td.innerHTML = dates[i].textContent;
			tr.appendChild(td);

			td = document.createElement('td');
			td.innerHTML = countries[i].textContent;
			tr.appendChild(td);

			td = document.createElement('td');
			td.innerHTML = directors[i].textContent;
			tr.appendChild(td);

			tbodyActor.appendChild(tr);
		}
	};

	ajax.open('GET', `actor.php?actor=${actor}`);
	ajax.send();
}

function getByTimePeriod() {
	var ajax = new XMLHttpRequest();

	var start = document.getElementById('start').value;
	var end = document.getElementById('end').value;

	ajax.onload = () => {
		let tbodyTime = document.getElementById('tbody-time');
		tbodyTime.innerHTML='';

		response = ajax.responseText;

		if (response == null)
			return;

		let movies = JSON.parse(response);

		movies.forEach(movie => {
			let tr = document.createElement('tr');

			let td = document.createElement('td');
			td.innerHTML = movie.name;
			tr.appendChild(td);

			td = document.createElement('td');
			td.innerHTML = movie.date;
			tr.appendChild(td);

			td = document.createElement('td');
			td.innerHTML = movie.country;
			tr.appendChild(td);

			td = document.createElement('td');
			td.innerHTML = movie.director;
			tr.appendChild(td);

			tbodyTime.appendChild(tr);
		});
	};

	ajax.open('GET', `time_period.php?start=${start}&end=${end}`);
	ajax.send();
}