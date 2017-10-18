<!DOCTYPE html>
<html>
<head>
    <style>
        body{
            background-color: black;
        }
        table {
            margin: auto;
            width: 300px;
            color: white;
            border: 3px solid red;
            
        }
        td{
            color: white;
            border: 3px solid red;
            text-align:center;
        }
        h1{
            text-align: center;
            color: white;
        }
        div{
            color: white;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Useless website</h1>
    <div> I made this site for my 336 it's pretty cool actually </div>
    <?php
        echo "<table>";
        echo " <tr>
        <th>Number</th><th>Odd or even</th>
        </tr>";
        $sum = 0;
        for($i = 0; $i < 20; $i++){
            $rand  = rand(0,100);
            $sum += $rand;
            $oddeven = $rand % 2 == 0 ? odd : even ;
            echo "<tr><td>$rand</td><td>$oddeven</td></tr>";
            
        }
        echo "<tr><th>Sums</th><th>Averages</th></tr>";
        $avg = $sum/20;
        echo "<tr><td>$sum</td><td>$avg</td></tr>";
        echo "</table>"
?>

</body>
</html>