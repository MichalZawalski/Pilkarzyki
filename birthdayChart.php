<?php
    include "plot.php";
    
    $servername = "mysql.cba.pl";
    $username = "do_not_be_hasty";
    $password = ;
    
    $conn = new mysqli($servername, $username, $password, "do_not_be_hasty");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
        $sql = "select overall_rating, year(birthday) as xValue from Player_Attributes A join Player B on A.id=B.id where 1";
        
        if ($_GET["height"] <> "") {
            $sql = $sql . " and ABS(height-" . $_GET["height"] . ")<=5";
        }
        
        if ($_GET["weight"] <> "") {
            $sql = $sql . " and ABS(weight-" . $_GET["weight"] . ")<=5";
        }
        
        if ($_GET["birthday"] <> "") {
            $sql = $sql . " and birthday like \"" . $_GET["birthday"] . "%\"";
        }
        
        $rate = ['niska'=>'\'low\'', 'normalna'=>'\'medium\'', 'wysoka'=>'\'high\''];
        
        if ($_GET["attack"] <> "") {
            $sql = $sql . " and attacking_work_rate=" . $rate[$_GET["attack"]];
        }
        
        if ($_GET["defence"] <> "") {
            $sql = $sql . " and defensive_work_rate=" . $rate[$_GET["defence"]];
        }
        
        $foot = ['lewa'=>'\'left\'', 'prawa'=>'\'right\''];
        
        if ($_GET["foot"] <> "") {
            $sql = $sql . " and preferred_foot=" . $foot[$_GET["foot"]];
        }
    
    $result = $conn->query($sql);
    
    chart(1965, 2000, 5, $result);
    
    $conn->close();
?>