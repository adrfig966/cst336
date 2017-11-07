<!DOCTYPE html>
<html>
    <head>
        <?php
        $dbConn = new PDO("mysql:host=localhost;dbname=midterm", "adrfigu966", "336");
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
  
        //Grabbing all possible device names
        

        ?>
        <link rel="stylesheet" href="css/styles.css"/ type="text/css">
        <title>  </title>
    </head>
    <body>
       <?php
            echo "</br>Name and country of birth of female actresses who were NOT born in the USA, ordered by last names </br>";
       
            $sql = "SELECT firstName, lastName, country_of_birth FROM `celebrity` WHERE country_of_birth <> 'USA' AND gender = 'F' ORDER BY lastName";
            $stmt = $dbConn -> prepare ($sql);
            $stmt -> execute();
            foreach($stmt as $row){
                echo $row['firstName'] . " " . $row['lastName'] . " " . $row["country_of_birth"];
                echo "</br>";
            }
            
            echo "</br>Number of movies per category and their average duration in minutes </br>";
            
            $sql = "SELECT movie_category, COUNT(movie_category), AVG(duration) FROM movie GROUP BY movie_category;";
            $stmt = $dbConn -> prepare ($sql);
            $stmt -> execute();
            foreach($stmt as $row){
                echo $row['movie_category'] . " " . $row['COUNT(movie_category)'] . " " . $row["AVG(duration)"];
                echo "</br>";
            }
            
            echo "</br>Top three longest movies released after 2000 </br>";
            
            $sql = "SELECT movie_title, movie_category, company, duration, release_year from movie WHERE release_year > 2000 ORDER BY duration DESC LIMIT 1,3";
            $stmt = $dbConn -> prepare ($sql);
            $stmt -> execute();
            foreach($stmt as $row){
                echo $row['movie_title'] . " " . $row['movie_category'] . " " . $row["company"] . " " . $row["duration"] . " " . $row["release_year"];
                echo "</br>";
            }
       ?>
    </body>
</html>