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
        <span id="countdown"></span>
        <p id="counter">0</p>
    </div>
    <?php
        echo'<table id="tableMemory" class="game" adv="'.$_GET["adv"].'" difficulty="'.$_GET["dffcltradio"].'")>';
    ?>
        <?php
        print_r(isset($_GET["adv"]));
        $table=$_GET['dffcltradio']; 
            include("Functions/functions.php");



            $CardDir = "Media/Images/";

            $cardsTotal=loadImages($CardDir);

            $col=(substr($table, 0,1));
            $row=(substr($table, -1));
           
            
            $cardCounter=1;



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
            
            $cardIDs;



            $cardsDuped=dupeCards($cards);

            $cards=$cardsDuped[0];
            $cardIDs=$cardsDuped[1];
            if(isset($_GET["adv"])){
                $col++;
                $cardss=modeAdvanced([$cards,$cardIDs],$cardsTotal,$row);
                $cards=$cardss[0];
                $cardIDs=$cardss[1];
            }
            
            $advanceds=[];
            

            $cnt=0;
            foreach(array_reverse($cardIDs) as $card =>$id){
                if($cnt==$row){
                    break;
                }
                array_push($advanceds,$cardIDs[$card]);
                $cnt++;
            }



            $cardCounter=0;
            for($i=1;$i<=$row;$i++){
                echo "<tr>";
                for($j=1;$j<=$col;$j++){
                    $rand=random_int(0,count($cards["cards"])-1);
                    $ad=0;
                    if(in_array($cardIDs[$cards["cards"][$rand]],$advanceds)){
                        $ad=1;
                    }
                    echo '<td>
                            <div class="letter" advanced="'.$ad.'"  flipped="false" cardid='.$cardIDs[$cards["cards"][$rand]].' resolved="false" onclick="onlyTwoCards('.$cardCounter.')" oncontextmenu="rightClick('.$cardCounter.')">
                                <img class="back" src="Media/Images/cardReverse.jpg">
                                <img class ="obverse" hidden src="'.$CardDir.$cards["cards"][$rand].'">
                            </div>
                        </td>';
                    

                    if($cards["advanced"][$rand]==0){
                        unset($cards["cards"][$rand]);
                    }else{
                        foreach($cards["cards"] as $card){
                            if($card==$cards["advanced"][$rand]){
                                unset($cards[array_search($card,$cards["cards"])]);
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
