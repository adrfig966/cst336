<?php session_start();
ob_start();
?>
<!DOCTYPE html>
<html>
<head>
    <?php 
        include 'inc/connect.php';
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
    <?php
        echo $_GET[username];
    ?>
    <div class="container">
      <h2>Please enter log in</h2>
      <form action="" method="post">
        <div class="form-group">
          <label for="user">Username:</label>
          <input type="text" class="form-control" id="user" placeholder="Enter username" name="username">
        </div>
        <div class="form-group">
          <label for="pwd">Password:</label>
          <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
        </div>
        <button type="submit" class="btn btn-info" name="login">Log In</button>
      </form>
    </div>
    <div>
        <?php
            if(isset($_POST[login])){
                if($_POST[username] == "" || $_POST[pwd] == ""){
                    echo "Missing log in information, please try again.";
                }else{
                    $username = $_POST[username];
                    
                    $sql = "SELECT username, password, isadmin FROM users WHERE username = '$username'";
                    $stmt = $dbConn -> prepare ($sql);
                    $stmt -> execute();
                    if($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                        if(password_verify($_POST[pwd], $row[password])){
                            $_SESSION['login_user'] = $row[username];
                            $_SESSION['login_admin'] = $row[isadmin];
                            header("location: dashboard.php");
                        }
                        else{
                            echo "Invalid password";
                        }
                    }
                    else{
                        echo "Invalid user";
                    }
                    
                }
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
        if(isset($_POST[logout])){
            if(session_destroy()) {
                header("Location: index.php");
            }
        }
    ?>
</body>

</html>