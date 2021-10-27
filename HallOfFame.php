<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/halloffame.css">
</head>
<body>
    

    <table>

    <tr>
        <td>Level</td>
        <td>Time</td>
        <td>Total Time</td>
        <td>Fails</td>
        <td>Mode Advanced</td>
        <td>Name</td>
        <td>Points</td>
    </tr>

    <?php

        include("Functions/functions.php");
        
        $file = file_get_contents("HallOfFame.txt");

        foreach(explode(";",$file) as $player){
            if($player!=""){
                echo "<tr>";
                $parameters=explode(",",$player);
                foreach($parameters as $parameter){
                    echo "<td>".$parameter."</td>";
                }

                echo "<td>".calculatePoints($parameters[3],$parameters[0],$parameters[2],$parameters[1],$parameters[4])."</td>";

                echo "</tr>";
            }

        }

    ?>
    </table>


</body>
</html>