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
  
    <title>User Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css"/ type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <?php
        //echo password_hash("sk8ordie", PASSWORD_BCRYPT);
    ?>

    <div class="container">
        <h2>Welcome <?php echo $_SESSION[login_user]?></h2>
        Below is a list of users, click username for more info.
        <hr>
        <?php 
            $sql = "SELECT * FROM users";
            $stmt = $dbConn -> prepare ($sql);
            $stmt -> execute();
            
            if($_SESSION[login_admin] == 1){
                echo "Account has admin privileges</br>
                Use form below to add user
                </br>
                <form action='' method='post'>
                <input type='text' placeholder='Enter username' name='username'>
                <input type='password' placeholder='Enter password' name='password'>
                <button type='submit' name='createuser' class='btn btn-info'>Create User</button>
                </form>
                </br>";
            }
            foreach ($stmt as $row)
            {   
                $username = $row[username];
                $firstname = $row[firstname];
                $lastname = $row[lastname];
                if($_SESSION[login_admin] == 1){
                      $adminoptions = "<a href='userinfo.php?username=$username'>Click to edit user</a>";
                }
                echo "
                <button type='button' class='btn btn-info' data-toggle='collapse' data-target='#$username'>$username</button>
                <div id='$username' class='collapse'>
                    User name - $username | First name - $firstname | Last name - $lastname
                    </br>$adminoptions
                </div></br>";
            }
        ?>

    </div>
    <hr>
    <div>
        <form action="" method="post">
            <button type="submit" class="btn btn-info" name="logout">Log Out</button>
        </form>
    </div>
    <?php
        if(isset($_POST[createuser])){
            $username = $_POST[username];
            $hash = password_hash($_POST[password], PASSWORD_BCRYPT);
            $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hash')";
            $stmt = $dbConn -> prepare ($sql);
            $stmt -> execute();
            header("Location: dashboard.php");
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