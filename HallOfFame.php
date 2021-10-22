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
        <td>Fails</td>
        <td>Name</td>
    </tr>

    <?php

        $file = file_get_contents("HallOfFame.txt");

        foreach(explode(";",$file) as $player){
            echo "<tr>";
            foreach(explode(",",$player) as $parameter){
                echo "<td>".$parameter."</td>";
            }
            echo "</tr>";
        }

    ?>
    </table>


</body>
</html>