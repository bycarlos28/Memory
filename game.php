<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
	<title>Game</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="function.js"></script>
</head>
<body>
    <div>
        <p id="counter"></p>
    </div>
    <table class="game">
        <?php 
        
            include("Functions/functions.php");

            $CardDir = "Media/Images/";

            $cards=loadImages($CardDir);

            $row=2;
            $col=4;
            $cardCounter=1;

            $cardIDs;

            $cardIdCounter=1;
            foreach($cards["cards"] as $card){
                $cardIDs[$card]=$cardIdCounter;
                array_push($cards["cards"],$card);
                $cardIdCounter++;
            }

            $cardCounter=0;
            for($i=1;$i<=$row;$i++){
                echo "<tr>";
                for($j=1;$j<=$col;$j++){
                    $rand=random_int(0,count($cards["cards"])-1);
                    echo '<td>
                            <div flipped="false" cardid='.$cardIDs[$cards["cards"][$rand]].' resolved="false" onclick="onlyTwoCards('.$cardCounter.')">
                                <img class="back" src="Media/Images/cardReverse.jpg">
                                <img class ="obverse" hidden src="'.$CardDir.$cards["cards"][$rand].'">
                            </div>
                        </td>';
                    unset($cards["cards"][$rand]);
                    $cards["cards"] = array_values($cards["cards"]);
                    $cardCounter++;
                }
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>
