var difficulty = document.getElementsByClassName('game');
var totalTime = determineTime();
window.onload = updateClock(totalTime);
var back = document.getElementsByClassName('back');
var obverse = document.getElementsByClassName('obverse');
var letters = document.getElementsByClassName('letter');
var counter = document.getElementById('counter');
var container_video = document.getElementById('container_video');
var video = document.getElementsByTagName("video");
var attemptsVideo = 0;
var attempts = 0;
var playedCard = 0;
var failures = 0;
var cardId = [];
var firstCard = null;
var secondCard = null;

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
function determineTime() {
	if (difficulty[0].getAttribute('difficulty') == '4x2' && difficulty[0].getAttribute('adv') != '') {
	  time=10;
	}else if (difficulty[0].getAttribute('difficulty') == '4x2' && difficulty[0].getAttribute('adv') == '') {
	  time = 20;
	}else if (difficulty[0].getAttribute('difficulty') == '4x3' && difficulty[0].getAttribute('adv') != '') {
	  time = 30;
	}else if (difficulty[0].getAttribute('difficulty') == '4x3' && difficulty[0].getAttribute('adv') == ''){
	  time = 40;
	}else if (difficulty[0].getAttribute('difficulty') == '4x4' && difficulty[0].getAttribute('adv') != '') {
	  time = 50;
	}else if (difficulty[0].getAttribute('difficulty') == '4x4' && difficulty[0].getAttribute('adv') == '') {
	  time = 60;
	}else if (difficulty[0].getAttribute('difficulty') == '5x4' && difficulty[0].getAttribute('adv') != '') {
	  time = 70;
	}else if (difficulty[0].getAttribute('difficulty') == '5x4' && difficulty[0].getAttribute('adv') == '') {
	  time = 80;
	}else if (difficulty[0].getAttribute('difficulty') == '6x5' && difficulty[0].getAttribute('adv') != '') {
	  time = 90;
	}else if (difficulty[0].getAttribute('difficulty') == '6x5' && difficulty[0].getAttribute('adv') == '') {
	  time = 100;
	}else if (difficulty[0].getAttribute('difficulty') == '8x5' && difficulty[0].getAttribute('adv') != '') {
	  time = 120;
	}else if (difficulty[0].getAttribute('difficulty') == '8x5' && difficulty[0].getAttribute('adv') == '') {
		time = 130
	}
	return time;
  }

function updateClock(totalTime) {
	console.log("updateclock");
	document.getElementById('countdown').innerHTML = totalTime;
	if(totalTime==0){
		if(isWin()){
			
			setTimeout(function (){doNothing()},3000);	// TODO No funciona

			window.location.href="./final.php?a="+attempts+"&f="+failures+"&t="+totalTime;
		}else{
			window.location.href="./gameOver.php?a="+attempts+"&f="+failures+"&t="+totalTime;
		}
	}else{
	  setTimeout("updateClock(totalTime--)",1000);
	}
  }

  function easterEgg(){
	  if (attemptsVideo == 4) {
		  container_video.removeAttribute("hidden");
		  video[0].play(); 
		  setTimeout(hiddenVideo,10000);
	  }else{
		  attemptsVideo++;
	  }
  }
  
  function hiddenVideo(){
	  console.log("entramos");
	  video[0].pause();
	  container_video.setAttribute("hidden",true);
	  console.log("holaaa.");
  }