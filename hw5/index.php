
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
        <img src="https://giphy.com/embed/W3QKEujo8vztC">
        <h1>Search for gifs</h1>
       
        <div id="content">
            <form>
                <div class="form-group">
            
                    <label for="queryinput">Enter a query :</label>
                    <input type="text" class="form-control" id="queryinput" oninput="verif()" required>
                    <label id="searchstatus">Awaiting Input</label>
                    <br>
                    
                    <label for="pageinput">Page number to display (1 by default) :</label>
                    <input type="number" class="form-control" id="pageinput" oninput="verif()" required>
                    <label id="pagestatus">Awaiting Input</label>
                    <br>
                     
                </div>
                <label id="formstatus"></label>
                <br>
                <button id="submitbtn" type="submit" class="btn btn-default" >Submit</button>
            </form>
            <div id="searchcount"></div>
            <div id="results"></div>
        </div>
      
    </body>
</html>