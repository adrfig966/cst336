<!DOCTYPE html>
<html>
<head>
    <?php 
    include 'inc/forms.php';
    
    if (strlen(getenv("sqluser")) == 0 || strlen(getenv("sqlpw")) == 0 || strlen(getenv("sqlhost")) == 0 || strlen(getenv("dbname")) == 0){
        $dbname = "techcheckout";
        $username = 'adrfigu966';
        $password = '336';
        $host = 'localhost';
    }
    else{
        $dbname = getenv("dbname");
        $username = getenv("sqluser");
        $password = getenv("sqlpw");
        $host = getenv("sqlhost");
    }
    
    setupDeviceDB($username, $password, $host, $dbname);
    ?>
    <link rel="stylesheet" href="css/styles.css"/ type="text/css">
   
</head>
<body>
    <h1>Tech Check Out</h1>
    </br>
   
    <div id="searchform">
        <form action="" method="post">
            <?php
                drawForms();
            ?>
            <input type='submit' name='buttonsubmit' value='Search'/>
            
        </form>
    </div>
    
    <div id="results">
        <?php
            echo "<table>";
            echo "<tr><th>Name</th><th>Availablity</th><th>Price</th></tr>";
            if(isset($_POST['buttonsubmit'])){
                $filter = " WHERE";
                
                $deviceType = $_POST[deviceType];
                $deviceName = $_POST[deviceName];
                $availability = $_POST[availability];
                $sort = $_POST[sort];
                if($_POST[deviceType] == "showall"){
                    $filter .= "  1 AND";
                }else{
                    $filter .= " deviceType = '$deviceType' AND";
                }
                if($_POST[deviceName] == "showall"){
                    $filter .= " 1 AND";
                }else{
                    $filter .= " deviceName = '$deviceName' AND";
                }
                $filter .= " status = '$availability'";
                $filter .= " ORDER BY $sort";
                doSearch($filter);
            }
            else{
                doSearch("");
            }
            echo "</table>";
        ?>
    </div>
</body>
</html>