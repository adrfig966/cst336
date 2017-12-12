
<!DOCTYPE html>
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/main.css"/ type="text/css">
       
       
        <title>Tattoo Shop</title>
        <script>
            function getData(){
                $.get("api/interface.php?q=sup").done(function(data){
                
                });
            }
            
        </script>
    </head>
    <body>
        <h1>Adrian's Tattoo Emporium</h1>
        <nav id="sidebar">
            <ul id="bar-group">
                <li class="bar-item active" onclick="home()">Home</li>
                <li class="bar-item" onclick="find()">Find appointment</li>
                <li class="bar-item" onclick="manage()">Manage appointment</li>
                <li class="bar-item" onclick="login()" id="loginbtn">Employee log in</li>
            </ul>
        </nav>
        <div id="content">
            <input type="button" value="Test Stuff" onclick="getData()">
        </div>
        
        
    </body>
    <script src="scripts/pagecontroller.js"></script>
    <script>
            wrapper();
    </script>
</html>