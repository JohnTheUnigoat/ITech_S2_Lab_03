var ajax = new XMLHttpRequest;

function getByGenre() {
	let genre = document.getElementById('genre').value;

	ajax.onreadystatechange = function() {
		if (ajax.readyState === 4 && ajax.status === 200) {
			document.getElementById('tbody-genre').innerHTML = ajax.responseText;
		}
	};

	ajax.open('GET', `genre.php?genre=${genre}`);
	ajax.send();
}
