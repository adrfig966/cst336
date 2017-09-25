<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/styles.css"/ type="text/css">
    </head>
    <body>
            
            <?php
                $cars['bug'] = "90";
                $cars['bugatti'] = "250";
                $cars['challenger'] = "120";
                $cars['charger'] = "160";
                $cars['ford'] = "70";
                function drawbanner(){
                    global $cars;
                    
                    foreach($cars as $key => $value) {
                        echo "<img class='bannerimages' src='img/$key.png' alt='$key' >";
                    }
                }

                function play(){
                    global $cars;
                    foreach($cars as $key => $value) {
                        echo "Car: $key Top Speed: $value <br>";
                    }
                    //I totally don't need to do this but I gotta meet those conditions :
                    $contestants=array();
                    
                    array_push($contestants, array_rand($cars)); //Two array functions 
                    array_push($contestants, array_rand($cars)); //Technically I am also using a random function :)
                    echo "Up next to race: <br>";
                    for($i = 0; $i < sizeof($contestants); $i++){ //Another array function
                        
                        $k = $i+1;
                        echo "<img src='img/" . $contestants[$i] . ".png' alt='" . $contestants[$i]. "'>";
                        echo " Contestant $k: " . $contestants[$i] . ", top speed: " . $cars[$contestants[$i]];
                        echo "<br>";
                    }
                    
                    if($cars[$contestants[0]] > $cars[$contestants[1]]){
                        echo $contestants[0] . " wins";
                    }
                    else if($cars[$contestants[0]] < $cars[$contestants[1]]){
                        echo $contestants[1] . " wins";
                    }
                    else{
                        echo "There is a tie";
                    }
                }
            
            ?>
    

    </body>
</html>