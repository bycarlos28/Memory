var back = document.getElementsByClassName('back');
var obverse = document.getElementsByClassName('obverse');
<<<<<<< HEAD
var letters = document.getElementsByTagName('div')
var playedCard = 0;
var cardId = [];
=======
>>>>>>> f2457ff0234f91e95eb7f0de3c914a4536997440

function turnLetter(i) {
	if (obverse[i].hasAttribute("hidden")) {
		back[i].hidden = true;
		obverse[i].removeAttribute("hidden");
<<<<<<< HEAD
		playedCard++;
		cardId.push(i);
	}
}

function onlyTwoCards(i){
	if (playedCard<2){
		turnLetter(i);
	}else{
		checkLetter(i);
		playedCard = 0;
	}
}
=======
>>>>>>> f2457ff0234f91e95eb7f0de3c914a4536997440

function checkLetter(i){
	if (letters[cardId[0]].getAttribute("cardid") == letters[cardId[1]].getAttribute("cardid")) {
		alert(cardId);
		letters[cardId[0]].setAttribute("resolved",true);
		letters[cardId[1]].setAttribute("resolved",true);
		cardId = [];
	}
}
