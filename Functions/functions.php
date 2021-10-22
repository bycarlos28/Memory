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
        array_push($cards["advanced"],0);
        array_push($cards["advanced"],0);
        $cardIdCounter++;
    }

    return [$cards, $cardIDs];

}

function modeAdvanced($cards,$dificulty){

    for($l=0;$l<=$dificulty;$l++){

        $rand=random_int(0,(count($cards["cards"])-1)/2);

        print_r($rand);

        $cards["advanced"][$rand]=1;

    }

    return $cards;

}