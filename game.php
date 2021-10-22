<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
	<title>Game</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="header" >    
        <div class="div_logo"><img class="logo" src="Media/Images/OnePiceLogo.png" alt="gameLogo"></div>
    </div>
    <div class="counter_container">
        <p id="counter">0</p>
    </div>

    <table class="game">
        <?php 
        
            include("Functions/functions.php");

            $CardDir = "Media/Images/";

            $cardsTotal=loadImages($CardDir);
            print_r($cardsTotal);

            $row=2;
            $col=4;

            $total=($col*$row)/2;

            $cards=$cardsTotal;
            $cards['cards']=[];
            $cardIndex=[];
            for ($i=0; $i < $total ; $i++) { 
                $cardpush=random_int(0,count($cardsTotal['cards'])-1);
                
                array_push($cards['cards'],$cardsTotal['cards'][$cardpush]);  
                unset($cardsTotal['cards'][$cardpush]);
                $cardsTotal["cards"] = array_values($cardsTotal["cards"]);
            }
            
            echo "cartas";
            print_r($cards);

            $cardIDs;

            $cardsDuped=dupeCards($cards);

            $cards=$cardsDuped[0];
            $cardIDs=$cardsDuped[1];

            print_r($cards);

            $cards=modeAdvanced($cards,2);


            $cardCounter=0;
            for($i=1;$i<=$row;$i++){
                echo "<tr>";
                for($j=1;$j<=$col;$j++){
                    $rand=random_int(0,count($cards["cards"])-1);
                    echo '<td>
                            <div class="letter" advanced="'.$cards["advanced"][$rand].'" flipped="false" cardid='.$cardIDs[$cards["cards"][$rand]].' resolved="false" onclick="onlyTwoCards('.$cardCounter.')">
                                <img class="back" src="Media/Images/cardReverse.jpg">
                                <img class ="obverse" hidden src="'.$CardDir.$cards["cards"][$rand].'">
                            </div>
                        </td>';
                    

                    if($cards["advanced"][$rand]==0){
                        unset($cards["cards"][$rand]);
                    }else{
                        for($k=0; $k<count($cards["cards"]);$k++){
                            if($cards["cards"][$k]==$cards["cards"][$rand]){
                                echo "borrando la carta ".$cards["cards"][$k];
                                unset($cards["cards"][$k]);
                            }
                        }
                    }

                    $cards["cards"] = array_values($cards["cards"]);
                    $cardCounter++;
                }
                echo "</tr>";
            }
        ?>
    </table>
    <script type="text/javascript" src="Functions/function.js"></script>
    <form action="index.php">
        <button id=cancelGame>Cancel Game</button>
    </form>
    
</body>
</html>
