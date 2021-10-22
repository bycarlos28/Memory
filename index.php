<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Welcome to Memory</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
  <link href="https://fonts.googleapis.com/css?family=Raleway:700" rel="stylesheet">

</head>
<body>



	<div id="wheel" class="steering"></div>
	<div id="body">
  
    <div class="pirate">
      <div class="text">
        <p>The</p>
        <p id="pir">Pirate</p>
        <p>Memory</p>
      </div>
      <div class="hat">
        <div class="top">
          <div class="top-color">
            <div class="hash-1"></div>
            <div class="hash-2"></div>
          </div>
        </div>
        <div class="band">
          <div class="band-color"></div>
        </div>
        <div class="brim">
          <div class="brim-color"></div>
        </div>
      </div>
    </div>
		<div id="Instructions">
			
			<h1>Instructions</h1>
			<ul>
				<li><p>To turn a card you have to click on it</p></li>
				<li><p>There can only be two cards turned</p></li>
				<li><p>If the two cards are equal they will remain turned</p></li>
				<li><p>If the two cards are different, they will remain for 2 seconds turned</p></li>
				<li><p>Time and attempts are unlimited</p></li>
			</ul>
		</div>
	</div>
  <div id="gamePlay">
      <form method="GET" action="game.php">
          <div id="diffOptions">
            <input type="radio" id="dificult1" name="dffcltradio" value="4x2">
            <label for="dificult1">Marine(4x2)</label><br>
            
            <input type="radio" id="dificult2" name="dffcltradio" value="4x3">
            <label for="dificult2">Pirate(4x3)</label><br>
            
            <input type="radio" id="dificult3" name="dffcltradio" value="4x4">
            <label for="dificult3">Vicealmirante(4x4)</label><br>
        
            <input type="radio" id="dificult4" name="dffcltradio" value="5x4">
            <label for="dificult4">Capitan(5x4)</label><br>

            <input type="radio" id="dificult5" name="dffcltradio" value="6x5">
            <label for="dificult5">Almirante(6x5)</label><br>

            <input type="radio" id="dificult6" name="dffcltradio" value="8x5">
            <label for="dificult6">Yonkou(8x5)</label><br>
          </div>
          <div id="button">      
            <button type="submit" >PLAY</button>
          </div>
      </form> 
  	</div>
  </div>
  <div id="navranking">
    <form action="ranking.php">
      <button id="rankbut">RANKING</button>
    </form>
  </div>
	<div class="wrap">
</div>
</div>

<div class="ocean"></div>
<div class="ocean-overlay"></div>
<div class="here-there">
  <div class="traslate">
    <div class="ship">
      <div class="bottom-1">
        <div class="bottom-1-top"></div>
        <div class="bottom-1-top-left"></div>
        <div class="bottom-1-top-right">
          <div class="bottom-1-top-right-window"></div>
        </div>
      </div>
      <div class="ship-body">
        <div class="middle-window"></div>
        <div class="blue-strip-top"></div>
        <div class="blue-strip-bottom"></div>
        <div class="ship-body-top-back">
          <div class="blue-strip-top-half"></div>
        </div>
        <div class="chimney-base">
          <div class="chimney"></div>
          <div class="chimney"></div>
        </div>
      </div>
      <div class="ship-body-top-front">
        <div class="top-antenna"></div>
        <div class="circular-base"></div>
        <div class="circular-base-1"></div>
      </div>
      <div class="ship-body-top-front-mirror"></div>
    </div>
  </div>
  </div>
</div>
</body>
</html>
