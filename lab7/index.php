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
        <h1>Super Secret Club Sign Up</h1>
       
        <div id="content">
            <form>
                <div class="form-group">
                    
                    <strong>*</strong> Indicates required fields <br>
                    <label for="usr">User name* :</label>
                    <input type="text" class="form-control" id="usr" oninput="verif()" required>
                    <label id="usrstatus">Awaiting Input</label>
                    <br>
                    
                    <label for="email">Email address* :</label>
                    <input type="email" class="form-control" id="email" oninput="verif()" required>
                    <label id="emailstatus">Awaiting Input</label>
                    <br>
                    
                    <label for="phone">Phone number* :</label>
                    <input type="number" class="form-control" id="phone" oninput="verif()" max="9999999999" required>
                    <label id="phonestatus">Awaiting Input</label>
                    <br>
                    
                    <label for="pwd">Password* :</label>
                    <input type="password" class="form-control" id="pwd" oninput="verif()" required>
                    <label id="pwdstatus">Awaiting Input</label>
                    <br>
                    
                    <label for="zip">Zipcode:</label>
                    <input type="number" class="form-control" id="zip" oninput="zipinput()">
                    <label id="city"></label>
                    <br>
                    
                    <label for="state">Select state:</label>
                    <select class="form-control" id="states" onchange="stateinput()"></select>
                    <select class="form-control" id="counties"></select>
                     
                </div>
                <br>
                <br>
                <label id="formstatus"></label>
                <br>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
      
    </body>
</html>