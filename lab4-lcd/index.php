<!DOCTYPE html>
<html>
    <head>
        <?php
            include 'inc/letters.php';
        ?>
        <link rel="stylesheet" href="css/styles.css"/ type="text/css">
        <title>  </title>
    </head>
    <body>
        <h1>Neon Sign Generator</h1>
        <div id="content">    
            <?php 
                if(sizeof($_POST) == 0 || $_POST[displayagain] == "yes"){
                    drawForm();
                }
                if(isset($_POST['buttonsubmit'])) 
                {
                
                    $message = $_POST[message];
                   // Enter the Code you want to execute after the form has been submitted
                    if (strlen($_POST[color1])+strlen($_POST[color2])+strlen($_POST[color3]) > 0){
                        $colors = [];
                        if(strlen($_POST[color1]) > 0){
                            array_push($colors, $_POST[color1]);
                        }
                        if(strlen($_POST[color2]) > 0){
                            array_push($colors, $_POST[color2]);
                        }
                        if(strlen($_POST[color3]) > 0){
                            array_push($colors, $_POST[color3]);
                        }
                        drawPhrase($message, $colors);
                    }
                    else if($_POST[rainbow] == "yes"){
                            drawPhrase($message, array("rainbow"));
                    }
                    else{
                        drawPhrase($message, array($_POST[color]));
                    }
                }
            ?>
        </div>
    

    </body>
</html>