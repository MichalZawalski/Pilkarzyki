<!DOCTYPE html>
<html lang="en">
<head>
  <title>Piłkarzyki</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="http://mz.c0.pl/ball.png" type="image/x-icon">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <script language="JavaScript">
    function printer(in_id, out_id, ch_id, sub_id) {
      var val = document.getElementById(in_id).value;
      document.getElementById(out_id).value = val;
      document.getElementById(ch_id).value = val;
      document.getElementById(sub_id).value = val;
    }
    
    function set(out_id, value, sub_id) {
      document.getElementById(out_id).value = value;
      document.getElementById(sub_id).value = value;
    }
    
    function finder() {
    /*
      var wz = document.getElementById('wzrost_ch').value;
      var wa = document.getElementById('waga_ch').value;
      var ur = document.getElementById('urodziny_ch').value;
      var at = document.getElementById('atak_ch').value;
      var ob = document.getElementById('obrona_ch').value;
      var no = document.getElementById('noga_ch').value;
      document.location.href='result.php' + '?wz=' + wz + '&wa=' + wa + '&ur=' + ur + '&at=' + at + '&ob=' + ob + '&no=' + no;
      */
      document.forms["find"].submit();
    }
    
    function chart(name) {
      var wz = document.getElementById('wzrost_ch').value;
      var wa = document.getElementById('waga_ch').value;
      var ur = document.getElementById('urodziny_ch').value;
      var at = document.getElementById('atak_ch').value;
      var ob = document.getElementById('obrona_ch').value;
      var no = document.getElementById('noga_ch').value;
      
      var link = name + 'Chart.php?' + 'height=' + wz + '&weight=' + wa + '&birthday=' + ur + '&attack=' + at + '&defence=' + ob + '&foot=' + no + '&' + name + '=';
      
      document.getElementById(name + "_img").src = link;
    }
  </script>
</head>

<body>

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
}
div {
    display: block;
}
.descr {
    width: 100%;
    height: 160px;
    padding: 20px;
}
.input {
    width: 100%;
    height: 140px;
    padding: 20px;
}
input.output {
    height: 40px;
    width: 100%;
    background: transparent;
    border: 0 none;
    text-align: center;
    font-size: 18px;
}
input.chosen {
    height: 26px;
    width: 100%;
    background: transparent;
    border: 0 none;
    text-align: center;
    font-size: 18px;
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
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}

input[type=range] {
  -webkit-appearance: none;
  margin: 18px 0;
  width: 100%;
}
input[type=range]:focus {
  outline: none;
}
input[type=range]::-webkit-slider-runnable-track {
  width: 100%;
  height: 8.4px;
  cursor: pointer;
  animate: 0.2s;
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
  background: #3071a9;
  border-radius: 1.3px;
  border: 0.2px solid #010101;
}
input[type=range]::-webkit-slider-thumb {
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
  border: 1px solid #000000;
  height: 36px;
  width: 16px;
  border-radius: 3px;
  background: #ffffff;
  cursor: pointer;
  -webkit-appearance: none;
  margin-top: -14px;
}
input[type=range]:focus::-webkit-slider-runnable-track {
  background: #367ebd;
}
input[type=range]::-moz-range-track {
  width: 100%;
  height: 8.4px;
  cursor: pointer;
  animate: 0.2s;
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
  background: #3071a9;
  border-radius: 1.3px;
  border: 0.2px solid #010101;
}
input[type=range]::-moz-range-thumb {
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
  border: 1px solid #000000;
  height: 36px;
  width: 16px;
  border-radius: 3px;
  background: #ffffff;
  cursor: pointer;
}
input[type=range]::-ms-track {
  width: 100%;
  height: 8.4px;
  cursor: pointer;
  animate: 0.2s;
  background: transparent;
  border-color: transparent;
  border-width: 16px 0;
  color: transparent;
}
input[type=range]::-ms-fill-lower {
  background: #2a6495;
  border: 0.2px solid #010101;
  border-radius: 2.6px;
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
}
input[type=range]::-ms-fill-upper {
  background: #3071a9;
  border: 0.2px solid #010101;
  border-radius: 2.6px;
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
}
input[type=range]::-ms-thumb {
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
  border: 1px solid #000000;
  height: 36px;
  width: 16px;
  border-radius: 3px;
  background: #ffffff;
  cursor: pointer;
}
input[type=range]:focus::-ms-fill-lower {
  background: #3071a9;
}
input[type=range]:focus::-ms-fill-upper {
  background: #367ebd;
}
</style>

<div style="height:20px"> </div>

<table align="center" width="900">
  <tr>
    <td colspan="2" bgcolor="#101bb5" align="center" style="color:#ffffff">
        <h1><b>I ty możesz zostać piłkarzem!</b></h1>
    </td>
  </tr>
  
  <tr>
    <td colspan="2" bgcolor="#ffffff" align="center">
      <p style="margin: 10px 2cm">
        Chyba każdy jako dziecko marzył, by zostać wielkim piłkarzem, takim jak Lewandowski, Messi, czy Ronaldo, a może nawet Radović.
        Życie jednak nie zawsze daje taką szansę - idzie się do szkoły, robi maturę, licencjat, doktorat, habilitację i dziecięce marzenia pryskają.
        A jeśli nawet ktoś spróbuje swoich sił w tym sporcie, to często okazuje się, że jest za wysoki, za niski, za gruby, za chudy, za młody, za stary, 
        albo coś w tym guście.<br><br>
        Oto rozwiązanie! Ktoś zniechęca Cię do kariery piłkarza? Myślisz, że sobie nie poradzisz? Że przeszkodzi ci nadwaga lub lewonożność? 
        Wszyscy w Ciebie wątpią? Pokaż im, że się mylą! Sprawdź, który zawodowy piłkarz jest do ciebie podobny, jakie miałbyś umiejętności po 
        profesjonalnym treningu! Kto wie, może akurat twoje parametry cechują największych mistrzów...
      <p>
    </td>
  </tr>
  
  <tr>
    <td bgcolor="#ffffff">
      <table style="margin: 0px; width:900px; text-align: center; align: center">
        <tr>
          <td colspan="6" bgcolor="#1068b5">
            <h3 align="center" style="color:#ffffff"><b>Twoje dane</b></h3>
          </td>
        </tr>
        <tr bgcolor="#dbddff">
          <th style="width:17%">
          Wzrost
          </th>
          <th style="width:16%">
          Waga
          </th>
          <th style="width:17%">
          Urodziny
          </th>
          <th style="width:17%">
          Skuteczność ataku
          </th>
          <th style="width:17%">
          Skuteczność obrony
          </th>
          <th style="width:16%">
          Noga
          </th>
        </tr>
        <tr bgcolor="#dbddff">
          <td>
            <input type="textarea" readonly class="chosen" id="wzrost_ch">
          </td>
          <td>
            <input type="textarea" readonly class="chosen" id="waga_ch">
          </td>
          <td>
            <input type="textarea" readonly class="chosen" id="urodziny_ch">
          </td>
          <td>
            <input type="textarea" readonly class="chosen" id="atak_ch">
          </td>
          <td>
            <input type="textarea" readonly class="chosen" id="obrona_ch">
          </td>
          <td>
            <input type="textarea" readonly class="chosen" id="noga_ch">
          </td>
        </tr>
      </table>
    </td>
  </tr>
  
  <tr>
  <td bgcolor="#ffffff">
    <ul class="nav nav-pills">
      <li class="active"><a data-toggle="tab" href="#menu1" onclick="chart('height')">Wzrost</a></li>
      <li><a data-toggle="tab" href="#menu2" onclick="chart('weight')">Waga</a></li>
      <li><a data-toggle="tab" href="#menu3" onclick="chart('birthday')">Urodziny</a></li>
      <li><a data-toggle="tab" href="#menu4" onclick="chart('attack')">Skuteczność ataku</a></li>
      <li><a data-toggle="tab" href="#menu5" onclick="chart('defence')">Skuteczność obrony</a></li>
      <li><a data-toggle="tab" href="#menu6" onclick="chart('foot')">Noga</a></li>
    </ul>
    
    <div class="tab-content">
      
      <div id="menu1" class="tab-pane fade in active">
          <table style="width:100%">
          <tr>
            <td>
              <div class="descr">
                <p>
                <i>'Judge me by my size, do you? And well you should not!'</i><br><br> Tak mówił mistrz Yoda. I słusznie, bo taki na przykład Messi mierzy zaledwie
                170cm wzrostu. Co prawda wzrost ma znaczenie przy takich elementach gry jak np. gra głową, ale przecież to piłka nożna... Myślisz, że jesteś za niski na piłkarza? A może za wysoki? Sprawdź to!
                </p>
              </div>
              <div class="input">
                <input type="range" id="wzrost" value="180" min="140" max="220" onmousemove="printer('wzrost', 'wzrost_val', 'wzrost_ch', 'wzrost_sub')">
                <input type="textarea" readonly class="output" id="wzrost_val" value="180" align="center">
              </div>
            </td>
            
            <td width="100">
              <img id="height_img" src="heightChart.php">
            </td>
          </tr>
          </table>
      </div>
      
      <div id="menu2" class="tab-pane fade">
          <table style="width:100%">
          <tr>
            <td>
              <div class="descr">
                <p>
                Piłkarze robią wiele, aby utrzymać odpowiednią wagę. Czy słusznie? Co prawda nikt chyba nie wyobraża sobie sumity ganiającego za piłką
                (chociaż jako bramkarz mógłby być niezły...), ale zawodowcy znacząco różnią się między sobą wagą. Uwaga - podaj swoją wagę w funtach!
                (ja też nie wiem, dlaczego FIFA zapisuje wagę piłkarzy w funtach...)
                </p>
              </div>
              <div class="input">
                <input type="range" id="waga" value="175" min="100" max="250" onmousemove="printer('waga', 'waga_val', 'waga_ch', 'waga_sub')">
                <input type="textarea" readonly class="output" id="waga_val" value="175" align="center">
              </div>
            </td>
            
            <td width="100">
              <img id="weight_img" src="">
            </td>
          </tr>
          </table>
      </div>
      
      <div id="menu3" class="tab-pane fade">
          <table style="width:100%">
          <tr>
            <td>
              <div class="descr">
                <p>
                Czy piłka nożna to sport dla młodych? Okazuje się, że nie tylko. Nie nawiązuję tu jedynie do znanej książki <i>Stary człowiek i może</i>
                o pewnym emerycie, który zagrał w Lidze Mistrzów, ale przede wszyskim do faktów - wiek to bariera wyłącznie mentalna!
                </p>
              </div>
              <div class="input">
                <input type="range" id="urodziny" value="1990" min="1900" max="2017" onmousemove="printer('urodziny', 'urodziny_val', 'urodziny_ch', 'urodziny_sub')">
                <input type="textarea" readonly class="output" id="urodziny_val" value="1990" align="center">
              </div>
            </td>
            
            <td width="100">
              <img id="birthday_img" src="birthdayChart.php">
            </td>
          </tr>
          </table>
      </div>
      
      <div id="menu4" class="tab-pane fade">
          <table style="width:100%">
          <tr>
            <td>
              <div class="descr">
                <p>
                Ile razy amator strzela do bramki, by zdobyć gola? Raz.<br>A prawdziwy piłkarz? Ile trzeba.
                </p>
              </div>
              <div class="input">
                <form id="attack">
                  <input type="radio" name="attack" onclick="set('atak_ch', 'niska', 'atak_sub')"> niska <br>
                  <input type="radio" name="attack" onclick="set('atak_ch', 'normalna', 'atak_sub')"> normalna <br>
                  <input type="radio" name="attack" onclick="set('atak_ch', 'wysoka', 'atak_sub')"> wysoka <br>
                </form>
              </div>
            </td>
            
            <td width="100">
              <img id="attack_img" src="attackChart.php">
            </td>
          </tr>
          </table>
      </div>
      
      <div id="menu5" class="tab-pane fade">
          <table style="width:100%">
          <tr>
            <td>
              <div class="descr">
                <p>
                <i>- Obrona musi wytrzymać!<br>- Wytrzyma.</i><br><br>
                Jak wiemy, solidna defensywa jest filarem każdej drużyny. Formacja najważniejsza i najbardziej niedoceniana, bo 
                spektakularne są tylko jej błędy. Nie załamuj się jednak! Jeśli masz w sobie ducha prawdziwego obrońcy, nic Cię nie powstrzyma!
                </p>
              </div>
              <div class="input">
                <form>
                  <input type="radio" name="obrona" onclick="set('obrona_ch', 'niska', 'obrona_sub')"> niska <br>
                  <input type="radio" name="obrona" onclick="set('obrona_ch', 'normalna', 'obrona_sub')"> normalna <br>
                  <input type="radio" name="obrona" onclick="set('obrona_ch', 'wysoka', 'obrona_sub')"> wysoka <br>
                </form>
              </div>
            </td>
            
            <td width="100">
              <img id="defence_img" src="defenceChart.php">
            </td>
          </tr>
          </table>
      </div>
      
      <div id="menu6" class="tab-pane fade">
          <table style="width:100%">
          <tr>
            <td>
              <div class="descr">
                <p>
                <i>'Ręka umywa rękę, noga nogi wspiera'</i><br><br>
                Każda noga w dużynie jest najważniejsza. Bez względu na to, czy lewa, czy prawa.
                </p>
              </div>
              <div class="input">
                <form>
                  <input type="radio" name="noga" onclick="set('noga_ch', 'lewa', 'noga_sub')"> lewa <br>
                  <input type="radio" name="noga" onclick="set('noga_ch', 'prawa', 'noga_sub')"> prawa <br>
                </form>
              </div>
            </td>
            
            <td width="100">
              <img id="foot_img" src="footChart.php">
            </td>
          </tr>
          </table>
      </div>
    </div>
  </td>
  </tr>
  
  <tr>
    <td bgcolor="#abcdef" align="center">
      <button class="button" style="vertical-align:middle" onclick="finder()"><span>Szukaj </span></button>
      <form id="find" name="find" method="post" action="result.php">
        <input type="hidden" name="wzrost_sub"   id="wzrost_sub"   value="" />
        <input type="hidden" name="waga_sub"     id="waga_sub"     value="" />
        <input type="hidden" name="urodziny_sub" id="urodziny_sub" value="" />
        <input type="hidden" name="atak_sub"     id="atak_sub"     value="" />
        <input type="hidden" name="obrona_sub"   id="obrona_sub"   value="" />
        <input type="hidden" name="noga_sub"     id="noga_sub"     value="" />
      </form>
    </td>
  </tr>
</table>

</body>
</html>
