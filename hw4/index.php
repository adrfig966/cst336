<!DOCTYPE html>
<html>
    <head>
        <?php
            include 'inc/functions.php';
        ?>
        <link rel="stylesheet" href="css/styles.css"/ type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="functions.js"></script>
        <title>  </title>
    </head>
    <body>
        <h1>Adrian's Gran Turismo</h1>
        <div id="banner">        
            <?php
                drawbanner();
            ?>
    
            <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#carinfo">Show car info</button>
            <div id="carinfo" class="collapse">
                Bug w/ top speed of 90. Bugatti w/ top speed of 250. Challenger w/ top speed of 120. Charger w/ top speed of 160. Ford w/ top speed of 70. 
            </div>
        </div>
        <div id="content">
            <button type="button" class="btn btn-primary btn-lg" onclick="playGame()">Race!</button>
        </div>
    

    </body>
</html>