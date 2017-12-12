<?php
    if (strlen(getenv("sqluser")) == 0 || strlen(getenv("sqlpw")) == 0 || strlen(getenv("sqlhost")) == 0 || strlen(getenv("dbname2")) == 0){
            
        $dbname = "tattooshop";
        $username = 'adrfigu966';
        $password = '336';
        $host = 'localhost';
    }
    else{
        $dbname = getenv("dbname4");
        $username = getenv("sqluser");
        $password = getenv("sqlpw");
        $host = getenv("sqlhost");
    }
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    if($_GET[q] == "sup"){
        $sql = "SELECT * FROM test";
        $stmt = $dbConn -> prepare ($sql);
        $stmt -> execute();
        echo(json_encode($stmt -> fetchAll()));
    }
    if(isset($_POST[appwd])){
        $sql = "SELECT * FROM  appointments WHERE password = '" . $_POST[appwd] . "'";
        $stmt = $dbConn -> prepare ($sql);
        $stmt -> execute();
        echo(json_encode($stmt -> fetchAll()));
    }
    if(isset($_POST[user]) && isset($_POST[pwd])){ //Someone is logging in
        $sql = "SELECT * FROM  `accounts` WHERE username = '" . $_POST[user] . "' AND PASSWORD = '" . $_POST[pwd] . "'";
        $stmt = $dbConn -> prepare ($sql);
        $stmt -> execute();
        echo(json_encode($stmt -> fetchAll()));
    }
    if(isset($_POST[uid]) && $_POST[action] == "getclients"){
        $sql = "SELECT date, color, price, time, appointments.id FROM appointments LEFT JOIN employees ON appointments.employeeid = employees.id WHERE employees.id = " . $_POST[uid];
        $stmt = $dbConn -> prepare ($sql);
        $stmt -> execute();
        echo(json_encode($stmt -> fetchAll()));
    }
    if(isset($_POST[id]) && $_POST[action] == "getap"){
        $sql = "SELECT * FROM `appointments` WHERE id = " . $_POST[id];
        $stmt = $dbConn -> prepare ($sql);
        $stmt -> execute();
        echo(json_encode($stmt -> fetchAll()));
    }
    if($_POST[action] == "updateap"){

        $sql = "UPDATE appointments SET employeeid = employeeid";
        
        if($_POST[price] != ""){
            $sql .= ", price = " . $_POST[price];
        }
        if($_POST[date] != ""){
            $sql .= ", date = '" . $_POST[date] . "'";
        }
        if($_POST[time] != ""){
            $sql .= ", time = " . $_POST[time];
        }
        if($_POST[color] != ""){
            $sql .= ", color = " . $_POST[color];
        }
      
        
        $sql.= " WHERE id = " . $_POST[id];
        $stmt = $dbConn -> prepare ($sql);
        $stmt -> execute();
        echo $sql;
    }
    if($_POST[action] == "checkopen"){
        $sql = "SELECT DISTINCT firstname, lastname, employees.id FROM employees LEFT JOIN appointments "
        ."ON employees.id = appointments.employeeid "
        ."WHERE appointments.date != '" . $_POST[date] . "' AND appointments.time != " . $_POST[time];
        $stmt = $dbConn -> prepare ($sql);
        $stmt -> execute();
        echo(json_encode($stmt -> fetchAll()));
        
    }
    if($_POST[action] == "makeap"){
        $pass = rand(1000000, 9999999);
        $date = $_POST[date];
        $time = $_POST[time];
        $empid = $_POST[empid];
        $sql = "INSERT INTO appointments (password, date, time, employeeid) VALUES ('$pass', '$date', $time, $empid)";
        $stmt = $dbConn -> prepare ($sql);
        $stmt -> execute();
        echo $pass;
    }
    if($_POST[action] == "deleteap"){
        $sql = "DELETE FROM appointments WHERE id = " . $_POST[apid];
        $stmt = $dbConn -> prepare ($sql);
        $stmt -> execute();
    }
    if($_POST[action] == "getsum"){
        $sql = "SELECT SUM(price) FROM appointments WHERE employeeid = " . $_POST[uid];
        $stmt = $dbConn -> prepare ($sql);
        $stmt -> execute();
        echo(json_encode($stmt -> fetchAll()));
    }
    if($_POST[action] == "getavg"){
        $sql = "SELECT AVG(price) FROM appointments WHERE employeeid = " . $_POST[uid];
        $stmt = $dbConn -> prepare ($sql);
        $stmt -> execute();
        echo(json_encode($stmt -> fetchAll()));
    }
    if($_POST[action] == "getcol"){
        $sql = "SELECT COUNT(color) FROM appointments WHERE color = 1 AND employeeid = " . $_POST[uid];
        $stmt = $dbConn -> prepare ($sql);
        $stmt -> execute();
        echo(json_encode($stmt -> fetchAll()));
    }
    if($_POST[action] == "getemp"){
        $sql = "SELECT * FROM employees WHERE 1";
        $stmt = $dbConn -> prepare ($sql);
        $stmt -> execute();
        echo(json_encode($stmt -> fetchAll()));
    }
?>