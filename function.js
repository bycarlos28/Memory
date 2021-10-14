var reverso = document.getElementsByClassName('reverso');
var anverso = document.getElementsByClassName('anverso');

function comprobarCarta(i) {
	if (anverso[i].hasAttribute("hidden")) {
		reverso[i].hidden = true;
		anverso[i].removeAttribute("hidden");

	}
}