var back = document.getElementsByClassName('back');
var obverse = document.getElementsByClassName('obverse');
var letters = document.getElementsByClassName('letter')
var counter = document.getElementById('counter');
var attempts = 0;
var playedCard = 0;
var cardId = [];

function turnLetter(i) {
	if (obverse[i].hasAttribute("hidden")) {
		back[i].hidden = true;
		obverse[i].removeAttribute("hidden");
		playedCard++;
		cardId.push(i);
	}
}

function onlyTwoCards(i){
	console.log(playedCard);
	if (playedCard<1){
		turnLetter(i);
	}
	else if (playedCard==1){
		turnLetter(i);
		checkLetter(i);
		attempts++;
		Attempts();
		playedCard = 0;
	}
}

function checkLetter(i){
	console.log(attempts);
	if (letters[cardId[0]].getAttribute("cardid") == letters[cardId[1]].getAttribute("cardid")) {
		letters[cardId[0]].setAttribute("resolved",true);
		letters[cardId[1]].setAttribute("resolved",true);
		cardId = [];
	}
}

function Attempts(){
	counter.innerHTML = attempts;
}
