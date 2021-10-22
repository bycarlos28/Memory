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
				$userInfo="NoLevel,"."NoTime,".$_GET['f'].",".$_POST['userName'].";";
				$usersFile .= $userInfo;
				file_put_contents("HallOfFame.txt", $usersFile);
				echo "<p class='submitVer' >User ".$_POST['userName']." correctly introduced.</p>";
				}
		?>
<div id=navigationbuttons>
		<form id="homeBut" action="index.php">
	  	<button>HOME</button>
	  </form>
		<form id="rankBut" action="ranking.php">
	  	<button>RANKING</button>
	  </form>
</div>


</body>
</html>