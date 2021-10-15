var reverso = document.getElementsByClassName('reverso');
var anverso = document.getElementsByClassName('anverso');
var playedCard = 0;

function comprobarCarta(i) {
	if (anverso[i].hasAttribute("hidden")) {
		reverso[i].hidden = true;
		anverso[i].removeAttribute("hidden");
		playedCard++;

	} 

}
function onlyTwoCards(i){
	if (playedCard<2){
		comprobarCarta(i);

	}
}