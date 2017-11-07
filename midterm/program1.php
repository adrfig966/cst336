<!DOCTYPE html>
<html>
    <head>
        <?php
            function contains($value, $array){
                for($i = 0; $i < sizeof($array); $i++){
                    if($value == $array[$i]){
                        return "y";
                    }
                }
                return "n";
            }
        ?>
        <link rel="stylesheet" href="css/styles.css"/ type="text/css">
    </head>
    <body>
        <h1>Vacation Planner</h1> <!-- So aesthetic -->
        <div id="banner">        
            <?php
                
            ?>
        </div>
        <div id="content">    
            <form action='' method='post'>
                Select Month
                <select name='month'>
                    <option value='none'>Select</option>
                    <option value='nov'>November</option>
                    <option value='dec'>December</option>
                    <option value='jan'>January</option>
                    <option value='feb'>February</option>
                </select>
                </br>
                Number of locations
                <input type='radio' name='locnum' value='3' checked/> Three
                <input type='radio' name='locnum' value='4'/> Four
                <input type='radio' name='locnum' value='5'/> Five
                </br>
                Select Country
                <select name='country'>
                    <option value='USA'>USA</option>
                    <option value='Mexico'>Mexico</option>
                    <option value='Norway'>Norway</option>
                </select>
                </br>
                Sort from:
                <input type='radio' name='sortby' value='az'/> A-Z
                <input type='radio' name='sortby' value='za' checked/> Z-A
                
                </br>
                <input type='submit' name='buttonsubmit' value='Generate Calender'/>
            </form>
        </div>
        <?php
            if(isset($_POST[buttonsubmit])){
                if($_POST[month] != "none"){
                    $countrydays = array("nov" => 30, "dec" => 31, "jan" => 31, "feb" => 28);
                    $mexico = array("acapulco", "cabos", "cancun", "chichenitza", "huatulco", "mexico_city");
                    $norway = array("alesund", "bergen", "hammerfest", "oslo", "stavanger", "trondheim");
                    $usa = array("chicago", "hollywood", "las_vegas", "ny", "washington_dc", "yosemite");
                    
                    
                    $month = $_POST[month];
                    $locamt= $_POST[locnum];
                    $country = $_POST[country];
                    $sort = $_POST[sortby];
                    
                    $countrycities = array();
                    if($country == "USA"){
                        $countrycities = array_rand(array_flip($usa), $locamt);
                        
                    }
                    if($country == "Mexico"){
                        $countrycities = array_rand(array_flip($mexico), $locamt);
                        
                    }
                    if($country == "Norway"){
                        $countrycities = array_rand(array_flip($norway), $locamt);
                    }
                    if($_POST[sortby] == "az"){
                        asort($countrycities);
                    }
                    if($_POST[sortby] == "za"){
                        arsort($countrycities);
                    }
                    
                    $numsindex = 0;
                    $monthdays = $countrydays[$_POST[month]];
                    
                    $numbersarr = range(1, $monthdays);
                    shuffle($numbersarr);
                    (contains(40, $numbersarr));
        
                    $count = 1;
                    echo "Schedule for: $month </br>";
                    echo "Visiting: $locamt places in $country";
                    echo "<table>";
                    for($i = 0; $i < 5; $i++){
                        echo "<tr>";
                        for($k = 0; $k < 7; $k++){
                            
                            if($count <= $monthdays){
                                if($count == $numbersarr[$numsindex] && $numsindex < $locamt){
                                    $currentcity = $countrycities[$numsindex];
                                    echo "<td>$count </br> <img src='img/$country/$currentcity.png'> $currentcity</td>";
                                    $numsindex++;
                                }else{
                                    echo "<td>$count</td>";
                                }
                            }
                            else{
                                echo "<td></td>";
                            }
                            $count++;
                             
                        }
                        echo "</tr>";
                    }
                    echo "</table>";
                }
                else{
                    echo "Please select a month";
                }
            }
        ?>
    </body>
</html>