<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/final.css">

</head>
<body>
	
  
		<div id="header">
			<h1 class="text_shadows">CONGRATULATIONS!</h1>
		</div>
		<div id="info">
	
			<div>
				<h2>Level</h2>
				<p id="level">0</p>
			</div>	
			<div>
				<h2>Time</h2>
				<p id="time">0</p></div>
			<div>
				<h2>Tries</h2>
				<p id="Tries"><?php echo $_GET['a']; ?></p>
			</div>
		</div>
		<form method="POST">
			<label>Enter new Name:</label>
			<input type="text" name="userName">
			<input type="submit" name="button" value="Send">
		</form>

		<?php 
			if (!empty($_POST['userName'])){
				$usersFile=file_get_contents("HallOfFame.txt");
				$userInfo="NoLevel,"."NoTime,".$_GET['a'].",".$_POST['userName'].";";
				$usersFile .= $userInfo;
				file_put_contents("HallOfFame.txt", $usersFile);
				echo "<p class='submitVer' >User ".$_POST['userName']." correctly introduced.</p>";
				}
		?>

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