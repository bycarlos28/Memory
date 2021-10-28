<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HallOfFame</title>
    <link rel="stylesheet" href="css/halloffame.css">
</head>
<body>
    <div id="header" >    
        <div id="div_logo">
            <img id="logo" src="Media/Images/OnePiceLogo.png" alt="gameLogo">
        </div>
    </div>
    <h1>Hall Of Fame</h1>

    <table>

    <tr class="tableH">
        <td>Ranking</td>
        <td>Level</td>
        <td>Time</td>
        <td>Total Time</td>
        <td>Fails</td>
        <td>Mode Advanced</td>
        <td>Name</td>
        <td>Points</td>
    </tr>

    <?php

        $rank=1;

        include("Functions/functions.php");
        
        $file = file_get_contents("HallOfFame.txt");

        $ranking=[];

        

        foreach(explode(";",$file) as $player){
            if($player!=""){

                $parameters=explode(",",$player);
                
                array_push($ranking,array("dif"=>$parameters[0],"t"=>$parameters[1],"ft"=>$parameters[2],"f"=>$parameters[3],"ma"=>$parameters[4],"name"=>$parameters[5],"points"=>calculatePoints($parameters[3],$parameters[0],$parameters[2],$parameters[1],$parameters[4])));
                

            }

        }

        $sortArray = array();

        foreach($ranking as $person){
            foreach($person as $key=>$value){
                if(!isset($sortArray[$key])){
                    $sortArray[$key] = array();
                }
                $sortArray[$key][] = $value;
            }
        }

        $orderby = "points";

        array_multisort($sortArray[$orderby],SORT_DESC,$ranking);

        foreach($ranking as $player){

            echo "<tr>";
            echo "<td>".$rank++."</td>";
            foreach($player as $parameter){
                echo "<td>".$parameter."</td>";
            }

            echo "</tr>";
            

        }
    ?>
    </table>
    <div id="ContainerButton"
        <form action="index.php">
            <button id=buttonhome>Home</button>
        </form>
</body>
</html>