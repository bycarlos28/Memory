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
				<p id="level"><?php echo $_GET['dif']; ?></p>
			</div>	
			<div>
				<h2>Time</h2>
				<p id="time"><?php echo $_GET['t']; ?></p></div>
			<div>
				<h2>Fails</h2>
				<p id="Tries"><?php echo $_GET['f']; ?></p>
			</div>
		</div>
		<p id="fsc_username">
        <?php 
            session_start();
            echo $_SESSION['username']; 
        ?>
   		</p>

		<?php 
			session_start();
			if (!empty($_SESSION['username'])){
					$usersFile=file_get_contents("HallOfFame.txt");
					$userInfo=$_GET["dif"].",".$_GET["t"].",".$_GET["ft"].",".$_GET['f'].",".$_GET["ma"].",".$_SESSION['username'].";";
					$usersFile .= $userInfo;
					file_put_contents("HallOfFame.txt", $usersFile);
					echo "<p class='submitVer' >User ".$_SESSION['username']." correctly introduced.</p>";
				}
		?>
<div id=navigationbuttons>
		<form id="homeBut" action="index.php">
	  	<button>HOME</button>
	  </form>
		<form id="rankBut" action="HallOfFame.php">
	  	<button>Hall of Fame</button>
	  </form>
</div>


</body>
</html>