<?php
function loadImages($dir){
    
    $cards=[];

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