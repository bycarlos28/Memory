var back = document.getElementsByClassName('back');
var obverse = document.getElementsByClassName('obverse');

function turnLetter(i) {
	if (obverse[i].hasAttribute("hidden")) {
		back[i].hidden = true;
		obverse[i].removeAttribute("hidden");

	}
}
