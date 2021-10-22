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
        array_push($);
        $cardIdCounter++;
    }

    return [$cards, $cardIDs];

}

function modeAdvanced($cards,$dificulty){

    $index=[];


    for($l=0;$l<$dificulty;$l++){

        $rand=random_int(0,count($cards["cards"])-1);

        if(in_array($rand,$index)){
            $l--;
        }else{
            unset($cards["cards"][$rand]);
            $cards["cards"]=array_values($cards["cards"]);
            $cards["advanced"][$rand]=1;
            array_push($rand,$index);
        }

        




    }

    return $cards;

}