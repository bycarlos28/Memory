var back = document.getElementsByClassName('back');
var obverse = document.getElementsByClassName('obverse');
var letters = document.getElementsByClassName('letter');
var counter = document.getElementById('counter');
var attempts = 0;
var playedCard = 0;
var failures = 0;
var cardId = [];
var firstCard = null;
var secondCard = null;
var rows = document.getElementsByTagName('tr').length;

var totalMarks = 0;
const noContext = document.getElementById('tableMemory');

noContext.addEventListener('contextmenu', e => {
  e.preventDefault();
});

function rightClick(c){
	if (playedCard==0){

		if (letters[c].getAttribute("marked")== 'false'){
			if (totalMarks<rows){
				if (letters[c].getAttribute('advanced')==1){
					letters[c].setAttribute("resolved",true);
				}
				letters[c].setAttribute("marked",true);
				letters[c].classList.add("cardFlag");
				back[c].hidden = true;
				letters[c].setAttribute("flipped",true);
				obverse[c].removeAttribute("hidden");
				attempts++;
				Attempts();

				if(isWin()){
					console.log("Ganado");
				
					setTimeout(function (){doNothing()},3000);	// TODO No funciona

					window.location.href="./final.php?a="+attempts+"&f="+failures;
				}
				totalMarks++;
			}
		}else {
			letters[c].setAttribute("marked",false);
			letters[c].classList.remove("cardFlag");
			obverse[c].hidden=true;
			back[c].removeAttribute("hidden");
			letters[c].setAttribute("flipped",false);
			letters[c].setAttribute("resolved",false);
			totalMarks--;º
		}
	}
	
}


function turnLetter(i) {
	if (obverse[i].hasAttribute("hidden")) {
		back[i].hidden = true;
		letters[i].setAttribute("flipped",true);
		obverse[i].removeAttribute("hidden");
		playedCard++;
		cardId.push(i);
	}


}

function onlyTwoCards(i){

	if(isCorrect()){

		if (playedCard<1){
			firstCard=i;
			turnLetter(firstCard);
		}
		else if (playedCard==1){
			secondCard=i;
			turnLetter(secondCard);
			if(firstCard != secondCard){
				checkLetter(firstCard,secondCard);
				attempts++;
				Attempts();
				playedCard = 0;
			}
		}

	}
}

function checkLetter(first, second){
	if (letters[cardId[0]].getAttribute("cardid") == letters[cardId[1]].getAttribute("cardid")) {
		letters[cardId[0]].setAttribute("resolved",true);
		letters[cardId[1]].setAttribute("resolved",true);
		
		if(isWin()){
			
			setTimeout(function (){doNothing()},3000);	// TODO No funciona

			window.location.href="./final.php?a="+attempts+"&f="+failures;
		}

	}else {
		setTimeout(function(){flipback(first,second);},2000);
		failures++;		
		
	}
	cardId = [];
}
function flipback(first, second){
		obverse[first].hidden=true;
		back[first].removeAttribute("hidden");
		letters[first].setAttribute("flipped",false);
		obverse[second].hidden=true;
		back[second].removeAttribute("hidden");
		letters[second].setAttribute("flipped",false);
}

function isWin(){
	
	FlagWin=true;

	for(i=0 ; i<letters.length;i++){
		if (letters[i].getAttribute("resolved")!="true"){
			FlagWin=false;
		}
	}
	return FlagWin;
}

function Attempts(){
	counter.innerHTML = attempts;
}

function isCorrect(){

	flipCounter=1	;

	for(i=0 ; i<letters.length;i++){
		if (letters[i].getAttribute('marked')=="true"){
			continue;
		}
		if (letters[i].getAttribute("flipped")=="true" && letters[i].getAttribute("resolved")!="true"){
			flipCounter++;
			if (flipCounter>2){
				return false;
			}
		}
	}

	return true;

}

function doNothing(){

}