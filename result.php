<!DOCTYPE html>
<html lang="en">

<?php
    $sql = "select * from Player_Attributes A join Player B on A.id=B.id where 1";
    
    if ($_POST["wzrost_sub"] <> "") {
        $sql = $sql . " and ABS(height-" . $_POST["wzrost_sub"] . ")<=5";
    }
    
    if ($_POST["waga_sub"] <> "") {
        $sql = $sql . " and ABS(weight-" . $_POST["waga_sub"] . ")<=5";
    }
    
    if ($_POST["urodziny_sub"] <> "") {
        $sql = $sql . " and birthday like \"" . $_POST["urodziny_sub"] . "%\"";
    }
    
    $rate = ['niska'=>'\'low\'', 'normalna'=>'\'medium\'', 'wysoka'=>'\'high\''];
    
    if ($_POST["atak_sub"] <> "") {
        $sql = $sql . " and attacking_work_rate=" . $rate[$_POST["atak_sub"]];
    }
    
    if ($_POST["obrona_sub"] <> "") {
        $sql = $sql . " and defensive_work_rate=" . $rate[$_POST["obrona_sub"]];
    }
    
    $foot = ['lewa'=>'\'left\'', 'prawa'=>'\'right\''];
    
    if ($_POST["noga_sub"] <> "") {
        $sql = $sql . " and preferred_foot=" . $foot[$_POST["noga_sub"]];
    }
    
    $sql = $sql . " order by overall_rating desc limit 100";
    
    $servername = "mysql.cba.pl";
    $username = "do_not_be_hasty";
    $password = ;
    
    $conn = new mysqli($servername, $username, $password, "do_not_be_hasty");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $result = $conn->query($sql);
?>

<head>
  <title>Podobieństwo</title>
  <meta charset="utf-8">
  <link rel="icon" href="/ball.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<style>
body {
    background-color: #dbeeff;
}
td {
    padding: 20px;
}
th {
    padding: 20px;
    text-align: center;
    font-size: 18px;
    width: 33%;
}
.button {
  display: inline-block;
  border-radius: 4px;
  background-color: #0a17d1;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 20px;
  padding: 15px;
  width: 150px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00ab';
  position: absolute;
  opacity: 0;
  top: 0;
  left: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-left: 25px;
}

.button:hover span:after {
  opacity: 1;
  left: 0;
}
</style>
<body>
<div style="height:20px"> </div>
<table align="center" width="900">
  <tr>
    <td colspan="6" bgcolor="#101bb5" align="center" style="color:#ffffff">
        <h1><b>I ty możesz zostać piłkarzem!</b></h1>
    </td>
  </tr>

<?php

    function makeField($content) {
        echo "<td align=\"center\">";
        echo $content;
        echo "</td>";
    }

    function makeName($content) {
        echo "<td align=\"left\">";
        echo $content;
        echo "</td>";
    }
    
    function makeHead($content) {
        echo "<th>";
        echo $content;
        echo "</th>";
    }
    
    if ($result->num_rows == 0) {
        echo "<tr><td bgcolor=\"#ffffff\" align=\"center\" colspan=\"6\">
            Jesteś wyjątkowym człowiekiem - w świecie futbolu nie ma nikogo podobnego do Ciebie.
            <br>Kariera stoi otworem!</td></tr>";
    }
    else {
        echo "
          <tr>
            <td colspan=\"6\" bgcolor=\"#ffffff\" align=\"center\">
              <p style=\"margin: 10px 2cm\">
                Gratulacje! Jesteś uderzająco podobny do następujących piłkarzy:
              <p>
            </td>
          </tr>";
        
        echo "<tr><td bgcolor=\"#ffffff\"><div><table>";
        
        echo "<tr bgcolor=\"#1068b5\" style=\"color:#ffffff\"><th style=\"width:100%\">Piłkarz</th>";
        makeHead("Ranking");
        makeHead("Gra głową");
        makeHead("Szybkość");
        makeHead("Strzelanie");
        makeHead("Bramka");
        echo "</tr>";
    }
    
    while($row = ($result->fetch_assoc())) {
        echo "<tr bgcolor=\"#dbddff\">";
        
        makeName($row["player_name"]);
        makeField($row["overall_rating"]);
        makeField($row["heading_accuracy"]);
        makeField($row["sprint_speed"]);
        makeField($row["shot_power"]);
        makeField($row["gk_reflexes"]);
        
        echo "</tr>";
    }
    
    if ($result->num_rows >= 100) {
        echo "<tr bgcolor=\"#dbddff\"><td colspan=\"6\" align=\"center\">";
        echo "<i>I wielu innych</i>";
        echo "</td></tr>";
    }
    
    if ($result->num_rows != 0) {
        echo "</table></td></tr>";
    }
?>

  <tr align="center">
    <td colspan="6" bgcolor="#abcdef" align="center">
      <button class="button" style="vertical-align:middle" onclick="history.go(-1);"><span>Wróć </span></button>
    </td>
  </tr>

</table>
</body>
<?php
    $conn->close();
?>	