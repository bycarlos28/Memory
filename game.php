<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
	<title>Game</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="header" >    
        <div class="div_logo"><img onclick="easterEgg()" class="logo" src="Media/Images/OnePiceLogo.png" alt="gameLogo"></div>
    </div>
    <div id="container" hidden>
        <video id="video" width="1836" height="650">
            <source src="Media/Video/gomu.mp4">
        </video>
    </div>
    <div class="counter_container">
        <p id="counter">0</p>
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
                            <div class="letter" flipped="false" cardid='.$cardIDs[$cards["cards"][$rand]].' resolved="false" onclick="onlyTwoCards('.$cardCounter.')">
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
    <script type="text/javascript" src="Functions/function.js"></script>
</body>
</html>
