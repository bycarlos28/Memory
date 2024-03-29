<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
	<title>Game</title>
	<link rel="stylesheet" type="text/css" href="css/game.css">
</head>
<body>
    



    <div class="header" >    
        <div class="div_logo"><img onclick="easterEgg()" class="logo" src="Media/Images/OnePiceLogo.png" alt="gameLogo"></div>
    </div>
    <div id="container_video" hidden>
        <video height=600>
            <source src="Media/Video/gomu.mp4" type="video/mp4">
        </video>
    </div>
    <div id="container_video" hidden>
        <video height=600>
            <source src="Media/Video/gomu.mp4" type="video/mp4">
        </video>
    </div>
    <p class="curruser">
        <?php 
            session_start();
            if (empty($_GET['name'])){
                echo "Current User: ".$_SESSION['username']." Pts <span id='nameCurrentUser'></span>";     
            }else {
                $_SESSION['username']=$_GET['name'];
                echo "Current User: ".$_SESSION['username']." Pts <span id='nameCurrentUser'></span>"; 
            }

            echo "<span id='userName' hidden >".$_SESSION['username']."</span>";

        ?>
    </p>
    <p class="maxUser curruser">
        Top 1: <span id="nameMaxUser"></span>
    </p>
    <div class="counter_container">
        <span id="countdown"></span>
        <p id="counter">0</p>
    </div>

    <?php
        echo'<table id="tableMemory" class="game" adv="'.$_GET["adv"].'" difficulty="'.$_GET["dffcltradio"].'")>';
    ?>
        <?php
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


            session_start();
            $_SESSION['saveGame'];
            $_SESSION['saveCardId'];
            $cardCounter=0;
            if (empty($_SESSION['saveGame'])){
                for($i=1;$i<=$row;$i++){
                    echo "<tr>";
                    $_SESSION['saveGame'][$i]=[];
                    $_SESSION['saveCardId'][$i]=[];
                    for($j=1;$j<=$col;$j++){
                        
                        $rand=random_int(0,count($cards["cards"])-1);
                        array_push($_SESSION['saveGame'][$i],$CardDir.$cards["cards"][$rand]);
                        array_push($_SESSION['saveCardId'][$i],$cardIDs[$cards["cards"][$rand]]);
                        $ad=0;
                        if(in_array($cardIDs[$cards["cards"][$rand]],$advanceds)){
                            $ad=1;
                        }
                        echo '<td>
                                <div class="letter" advanced="'.$ad.'"  flipped="false" cardid='.$cardIDs[$cards["cards"][$rand]].' resolved="false" marked="false" onclick="onlyTwoCards('.$cardCounter.')" oncontextmenu="rightClick('.$cardCounter.')">
                                    <img class="back" src="Media/Images/cardReverse.jpg">
                                    <img class ="vmark" hidden src="Media/Images/OnePieceLogo.png">
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
            }else {
                $cardCounter=0;
                for ($i=1; $i < count($_SESSION['saveGame'])+1 ; $i++) { 
                    echo "<tr>";
                    for ($j=1; $j < count($_SESSION['saveGame'][$i])+1 ; $j++) { 
                        $ad=0;
                        if(in_array($_SESSION['saveCardId'][$i][$j-1],$advanceds)){
                            $ad=1;
                        }
                        echo '<td>
                                <div class="letter" advanced="'.$ad.'"  flipped="false" cardid='.$_SESSION['saveCardId'][$i][$j-1].' resolved="false" marked="false" onclick="onlyTwoCards('.$cardCounter.')" oncontextmenu="rightClick('.$cardCounter.')">
                                    <img class="back" src="Media/Images/cardReverse.jpg">
                                    <img class ="vmark" hidden src="Media/Images/OnePieceLogo.png">
                                    <img class ="obverse" hidden src="'.$_SESSION['saveGame'][$i][$j-1].'">
                                </div>
                            </td>';
                            
                    $cardCounter++;
                    }
                    echo "</tr>";
                }
                
            }
        
        ?>
    </table>
    <script type="text/javascript" src="Functions/function.js"></script>
    <form action="index.php">
        <button id=cancelGame>Cancel Game</button>
    </form>
    
</body>
</html>
