<!DOCTYPE html>
<html>
    <head>
        <?php
            include 'inc/functions.php';
        ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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