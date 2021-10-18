<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>
	</title>
	
</head>
<body>
<?php 
	if (!empty($_POST['v_username'])){
		$usersFile=file_get_contents("HallOfFame.txt");
		$userInfo="NoLevel,"."NoTime,"."$_POST['a'],".$_POST['v_username'].";";
		$usersFile .= $userInfo;
		file_put_contents("HallOfFame.txt", $usersFile);
		echo "User ".$_POST['v_username']." correctly introduced.";
		}
?>
</body>
</html>