<?php
function loadImages($dir){
    
    $cards=[];

    $cards["advanced"]=[];

    $cards["cards"]=[];

    $scanned_directory = array_diff(scandir($dir), array('..', '.'));

    foreach($scanned_directory as $file){
        if(strpos($file,"card") !== false){
            if($file=="cardReverse.jpg"){
                $cards["reverse"]=$file;
            }else{
                array_push($cards["cards"],$file);
                array_push($cards["advanced"],0);
            }
        }
    }

    return $cards;


}

function dupeCards($cards){

    $cardIDs;


    $cardIdCounter=1;
    foreach($cards["cards"] as $card){
        $cardIDs[$card]=$cardIdCounter;
        array_push($cards["cards"],$card);
        $cardIdCounter++;
    }

    return [$cards, $cardIDs];

}

function modeAdvanced($cardsDuped,$cardsTotal,$row){

    $cards=$cardsDuped[0];
    $cardIDs=$cardsDuped[1];


    $cardIdCounter=end($cardIDs);
    $cardIdCounter++;
    for($i=1;$i<=$row;$i++){

        $rand=random_int(0,count($cardsTotal['cards'])-1);
        $cardIDs[$cardsTotal["cards"][$rand]]=$cardIdCounter;
        array_push($cards["cards"],$cardsTotal["cards"][$rand]);
        unset($cardsTotal["cards"][$rand]);
        $cardsTotal['cards']=array_values($cardsTotal['cards']);
        $cardIdCounter++;
        
    }

    

    return [$cards,$cardIDs];

}

function calculatePoints($errors,$dificulty,$timeTotal,$time,$advanced){
    
    return explode(".",($dificulty*(($time*100)/$timeTotal))/(sqrt($errors+1))*$advanced)[0];

}