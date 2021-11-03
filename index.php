<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Welcome to Memory</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Raleway:700" rel="stylesheet">

</head>
<body>
	<div id="body">
    <div id="containerLogo">
      <img id="logo" src="Media/Images/thePirateMemory.png">
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
    <form id ="hola" method="GET" action="game.php">
        <div id="diffOptions">
          <input type="radio" id="dificult1" name="dffcltradio" value="4x2" required>
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
          <div id="adva">
            <input type="checkbox" name="adv" id="adv">
            <label for="adv">Mode Advanced</label>
          </div>
        </div>
        <label for="name"></label>
        <input id="name" name="name" type="text" placeholder="Name*" required>
        <div id="button">      
          <button type="submit" >PLAY</button>
        </div>
    </form> 
  </div>
  <div id="halloffame">    
    <form action="HallOfFame.php">
      <button>HallOfFame</button>
    </form>
  </div>
</body>
</html>
