
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/styles.css"/ type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="functions.js"></script>
        <title>  </title>

    </head>
    <body>
        
        
        <div id="navbar">
            <nav>
                <a href="google.com"><span>Home</span></a>
                <span>Adoptions</span>
                <span>About Us</span>
                
            </nav>
        </div>
        <h1>CSUMB Pet Shelter</h1>
        <div id="petcarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li data-target="#petcarousel" data-slide-to="0" class="active"></li>
              <?php
                $filelist = scandir('img');
                for($i = 3; $i < sizeof($filelist); $i++){
                    $fixed = $i-2;
                    echo "<li data-target='#petcarousel' data-slide-to='$fixed'></li>";
                    
                }
            ?>
            </ol>
            
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
              <div class="item active">
                <img src="img/alex.jpg" alt="Los Angeles" style="width:100%;">
              </div>
              <?php
                $filelist = scandir('img');
                for($i = 3; $i < sizeof($filelist); $i++){
                    $img = $filelist[$i];
                    echo "<div class='item'>
                            <img src='img/$img' alt='$img'>
                            </div>";
                }
              ?>
            </div>
            
            <!-- Left and right controls -->
            <a class="left carousel-control" href="#petcarousel" data-slide="prev">
              <
            </a>
            <a class="right carousel-control" href="#petcarousel" data-slide="next">
              >
            </a>
        </div>
      
    </body>
</html>