var back = document.getElementsByClassName('back');
var obverse = document.getElementsByClassName('obverse');
var letters = document.getElementsByTagName('div')
var playedCard = 0;
var cardId = [];
var firstCard = null;
var secondCard = null;
function turnLetter(i) {
	if (obverse[i].hasAttribute("hidden")) {
		console.log("La carta"+i);
		back[i].hidden = true;
		obverse[i].removeAttribute("hidden");
		playedCard++;
		cardId.push(i);
		console.log("La esta girando");
	}


}

function onlyTwoCards(i){
	console.log(playedCard);
	if (playedCard<1){
		firstCard=i;
		turnLetter(firstCard);
		console.log("firstCard"+firstCard);

	}
	else if (playedCard==1){
		secondCard=i;
		turnLetter(secondCard);
		console.log("secondCard"+secondCard);
		checkLetter(firstCard,secondCard);
		playedCard = 0;
	}
}

function checkLetter(first, second){
	console.log("fuera");
	console.log(letters[cardId[0]],letters[cardId[1]])
	if (letters[cardId[0]].getAttribute("cardid") == letters[cardId[1]].getAttribute("cardid")) {
		console.log("dentro");
		letters[cardId[0]].setAttribute("resolved",true);
		letters[cardId[1]].setAttribute("resolved",true);
		
	}else {
		setTimeout(function(){flipback(first,second);},2000);
		
	}
	cardId = [];
}
function flipback(first, second){
		obverse[first].hidden=true;
		back[first].removeAttribute("hidden");
		obverse[second].hidden=true;
		back[second].removeAttribute("hidden");
		console.log("todo amagat");
}
