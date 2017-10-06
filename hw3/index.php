<!DOCTYPE html>
<html>
    <head>
        <?php
        ?>
        <link rel="stylesheet" href="css/styles.css"/ type="text/css">
        <title>  </title>
    </head>
    <body>
        <h1>C a l c u l a t o r</h1> <!-- So aesthetic -->
        <div id="banner">        
            <?php
                
            ?>
        </div>
        <div id="content">    
            <form action='' method='post'>
                Specifiy two numbers and an operation
                </br>
                <input type='number' name='lhs' step='any' placeholder='Enter a number' required>
                <input type='number' name='rhs' step='any' placeholder='Enter a number' required>
                <select name='operation'>
                    <option value='add'>Add</option>
                    <option value='subtract'>Subtract</option>
                    <option value='multiply'>Multiply</option>
                    <option value='divide'>Divide</option>
                </select>
                
                </br> </br>
                Floating point options 
                </br>
                <input type='radio' name='floatop' value='none' checked/> Do nothing
                <input type='radio' name='floatop' value='floor'/> Floor 
                <input type='radio' name='floatop' value='ceiling'/> Ceiling
                <input type='radio' name='floatop' value='round'/> Round
                
                </br> </br>
                
                <input type='submit' name='buttonsubmit' value='Calculate'/>
            </form>
        </div>
        <?php
            if(isset($_POST[buttonsubmit])){
                if(strlen($_POST[lhs]) == 0 & strlen($_POST[rhs]) == 0){
                    echo "Error: No input";
                }
                else {
                    $result;
                    if($_POST[operation] == "add"){
                        $result = $_POST[lhs] + $_POST[rhs];
                    }
                    if($_POST[operation] == "subtract"){
                        $result = $_POST[lhs] - $_POST[rhs];
                    }
                    if($_POST[operation] == "multiply"){
                        $result = $_POST[lhs] * $_POST[rhs];
                    }
                    if($_POST[operation] == "divide"){
                        $result = $_POST[lhs] / $_POST[rhs];
                    }
                    
                    
                    
                    if($_POST[floatop] == "floor"){
                        $result = floor($result);
                    }
                    if($_POST[floatop] == "ceiling"){
                        $result = ceil($result);
                    }
                    if($_POST[floatop] == "round"){
                        $result = round($result);
                    }
                
                    echo "<div id='result'>$result</div>";
                }
            }
        ?>
    </body>
</html>