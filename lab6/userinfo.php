<?php session_start();
ob_start();
?>
<!DOCTYPE html>
<html>
<head>
    <?php 
        session_start();
        $dbConn = new PDO("mysql:host=localhost;dbname=lab6", "adrfigu966", "336");
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        if(!isset($_SESSION[login_user])){
            header("Location: index.php");
        }
    ?>
  
    <title>Log in page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css"/ type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
   
    <div class="container">
        <?php
            $username=  $_GET[username];
            echo "<h1>Editing account details for $username</h1>";
            $sql = "SELECT * FROM users WHERE username = '$username'";
            $stmt = $dbConn -> prepare ($sql);
            $stmt -> execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
            echo"<form action='' method='post'>";
            echo "<h3>User name</h3>" . $row[username] . "<input type='text' name='username'>
            <h3>First name</h3>" . $row[firstname] . "<input type='text' name='firstname'>
            <h3>Last name</h3>" . $row[lastname] . "<input type='text' name='lastname'>";
        ?>
         </br>
            <button type="submit" class="btn btn-info" name="changeinfo">Change user info</button>
        </form>
        <form action='' method='post'>
            Check this box to confirm deletion 
            <input type="checkbox" name="delete" value="yes" />
            <button type="submit" class="btn btn-info" name="deleteuser">Delete user</button>
        </form>
    </div>
    <hr>
    <div>
        <form action="" method="post">
            <button type="submit" class="btn btn-info" name="logout">Log Out</button>
        </form>
    </div>
    
    
    
    <?php
        if(isset($_POST[deleteuser])){
            if(isset($_POST[delete])){
                echo "User deleted";
                $sql = "DELETE FROM users WHERE username='$username'";
                $stmt = $dbConn -> prepare ($sql);
                $stmt -> execute();
                header("Location: dashboard.php");
            }
        }
        if(isset($_POST[changeinfo])){
            
        }
    
    ?>
    <?php
        if(isset($_POST[logout])){
            if(session_destroy()) {
                header("Location: index.php");
                
            }
        }
    ?>
</body>
</html>