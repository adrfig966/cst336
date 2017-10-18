<!DOCTYPE html>
<html>
<head>
    <?php 
    $username = "adrfigu966";
    $password ="336";
    $host = "localhost";
    $dbname = "techcheckout";
    ?>
    <style>
        body{
            background-color: white;
        }
        table {
            margin: auto;
            width: 300px;
            color: black;
            border: 3px solid red;
            border-radius: 10px;
            padding: 3px;
        }
        td{
            color: black;
            border: 1px solid red;
        }
        td:hover{
            color: white;
            background-color: black;
        }
        h1{
            text-align: center;
            color: black;
        }
        div{
            color: black;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Choose your weapon</h1>
    </br>
    <?php
        //Setting up connection
        $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        
        //Will store possible values for each
        $deviceNames = array();
        $deviceTypes = array();
        
        //Grabbing all possible device names
        $sql = "SELECT DISTINCT deviceName FROM device";
        $stmt = $dbConn -> prepare ($sql);
        $stmt -> execute();
        $i = 0;
        foreach($stmt as $row){
            $deviceNames[$i] = $row['deviceName'];
            $i++;
        }
        //Grabbing all possible device types 
        $sql = "SELECT DISTINCT deviceType FROM device";
        $stmt = $dbConn -> prepare ($sql);
        $stmt -> execute();
        $i = 0;
        foreach($stmt as $row){
            $deviceTypes[$i] = $row['deviceType'];
            $i++;
        }
        function drawForms(){
            global $deviceTypes, $deviceNames;
            echo "<select name='deviceType'>";
            echo "<option value='showall'>Show All Device Types</option>";
            for($i = 0; $i < sizeof($deviceTypes); $i++){
                echo "<option value='" . $deviceTypes[$i] . "'>" . $deviceTypes[$i] . "</option>";
            } 
            echo "</select>";
            
            echo "</br>";
            echo "<select name='deviceName'>";
            echo "<option value='showall'>Show All Devices</option>";
            for($i = 0; $i < sizeof($deviceNames); $i++){
                echo "<option value='" . $deviceNames[$i] . "'>" . $deviceNames[$i] . "</option>";
            } 
            echo "</select>";
            
            echo "</br>";
            echo "<select name='availability'>
                <option value='Available'>Available</option>
                <option value='CheckedOut'>Checked Out</option>
                </select>
                </br>
                Sort by
                <input type='radio' name='sort' value='price' checked/> Price
                <input type='radio' name='sort' value='type' checked/>  Device Name";
        }
        drawForms();
        
         
    ?>
    <div id="searchform">
        
    </div>
    
    <div id="results">
        <table>
            <?php
                try{
                    $sql = "SELECT deviceName, price, status FROM device ORDER BY status, price DESC";
                    $stmt = $dbConn -> prepare ($sql);
                    $stmt -> execute();
                    
                    echo "<tr><th>Name</th><th>Availablity</th><th>Price</th></tr>";
                    
                    foreach ($stmt as $row)
                    {   echo "<tr>";
                        echo "<td>" . $row['deviceName'] . "</td><td> " . $row['status'] ."</td><td>" . $row['price'] . "</td>";
                        echo "</tr>";
                    }
                }
                catch (PDOException $e){
                    echo "You blew it";
                }
    
            ?>
        </table>
    </div>
</body>
</html>