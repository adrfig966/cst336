<?php
    $deviceNames = array();
    $deviceTypes = array();
    $dbConn;
    //Setting up connection
    function setupDeviceDB($username, $password, $host, $dbname){
        global $dbConn, $deviceTypes, $deviceNames;
        
        
        $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        
           //Will store possible values for each
  
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
            <input type='radio' name='sort' value='deviceName' checked/>  Device Name";
        echo "</br></br>";
        
    }
    function doSearch($filters){
        try{
            $sql = "SELECT deviceName, price, status FROM device" . $filters;
            global $dbConn;
            $stmt = $dbConn -> prepare ($sql);
            $stmt -> execute();
            
            
            foreach ($stmt as $row)
            {   echo "<tr>";
                echo "<td>" . $row['deviceName'] . "</td><td> " . strtolower($row['status']) ."</td><td>" . $row['price'] . "</td>";
                echo "</tr>";
            }
        }
        catch (PDOException $e){
            echo "You blew it";
        }
    
    }
    
     
?>