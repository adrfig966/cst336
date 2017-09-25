<!DOCTYPE html>
<html>
    <head>
        <?php
            include 'inc/functions.php';
        ?>
        <link rel="stylesheet" href="css/styles.css"/ type="text/css">
        <title>  </title>
    </head>
    <body>
        <h1>Adrian's Gran Turismo</h1>
        <div id="banner">        
            <?php
                drawbanner();
            ?>
        </div>
        <div id="content">    
            <form>
            <input type="submit" value="Race"/>
            </form>
    
            <?php 
                play();
            ?>
        </div>
    

    </body>
</html>