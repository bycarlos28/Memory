<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
	<title>Game</title>
	<link rel="stylesheet" type="text/css" href="css/gameOver.css">
</head>
<body>
    <div id="header" class="bg-6">
        <h1 class="glitch" data-text="YOU LOSE">YOU LOSE</h1>
    </div>
    <div id="info">
        <div id="lvl">
            <h2>Level</h2>
            <p id="level">0</p>
        </div>	
        <div id="fls">
            <h2>Fails</h2>
            <p id="Fails"><?php echo $_GET['a']; ?></p>
        </div>
    </div>
    <div id="buttons">
        <button id="button1" href="game.php">Home</button>
        <button href="index.php">Ranking</button>
    </div>
</body>
</html>